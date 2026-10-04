<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    private function getCartQuery()
    {
        $sessionId = session()->getId();
        $userId = Auth::id();

        return CartItem::with('product')
            ->when($userId, function ($q) use ($userId) {
                return $q->where('user_id', $userId);
            }, function ($q) use ($sessionId) {
                return $q->where('session_id', $sessionId);
            });
    }

    public function index()
    {
        $items = $this->getCartQuery()->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty. Please select your wellness blends first!');
        }

        $subtotal = $items->sum(function ($item) {
            return $item->product ? ($item->product->price * $item->quantity) : 0;
        });

        $shipping = $subtotal >= 499 ? 0 : 50;
        $total = $subtotal + $shipping;

        return view('checkout.index', compact('items', 'subtotal', 'shipping', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'ship_name' => 'required|string|max:100',
            'ship_phone' => 'required|string|max:15',
            'ship_address' => 'required|string|max:255',
            'ship_city' => 'required|string|max:100',
            'ship_state' => 'required|string|max:100',
            'ship_pincode' => 'required|string|max:10',
            'payment_method' => 'required|in:cod,upi,razorpay',
            'notes' => 'nullable|string|max:500',
        ]);

        $items = $this->getCartQuery()->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = $items->sum(function ($item) {
            return $item->product ? ($item->product->price * $item->quantity) : 0;
        });

        $discount = 0;
        $couponCode = null;
        if ($request->coupon_code) {
            $coupon = Coupon::where('code', strtoupper(trim($request->coupon_code)))->first();
            if ($coupon && $coupon->isValidFor($subtotal)) {
                $discount = $coupon->calculateDiscount($subtotal);
                $couponCode = $coupon->code;
                $coupon->increment('used_count');
            }
        }

        $shipping = ($subtotal - $discount) >= 499 ? 0 : 50;
        $total = max(0, $subtotal - $discount + $shipping);

        $orderNumber = 'LND-' . date('Ymd') . '-' . strtoupper(Str::random(5));

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => $orderNumber,
                'status' => 'processing',
                'subtotal' => $subtotal,
                'discount' => $discount,
                'shipping' => $shipping,
                'tax' => 0,
                'total' => $total,
                'coupon_code' => $couponCode,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'paid',
                'ship_name' => $request->ship_name,
                'ship_phone' => $request->ship_phone,
                'ship_address' => $request->ship_address,
                'ship_city' => $request->ship_city,
                'ship_state' => $request->ship_state,
                'ship_pincode' => $request->ship_pincode,
                'notes' => $request->notes,
            ]);

            foreach ($items as $item) {
                if ($item->product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->product->name,
                        'price' => $item->product->price,
                        'quantity' => $item->quantity,
                        'subtotal' => $item->product->price * $item->quantity,
                    ]);

                    // Deduct stock safely
                    $item->product->decrement('stock', $item->quantity);
                }
            }

            // Clear Cart
            $this->getCartQuery()->delete();

            DB::commit();

            return redirect()->route('order.success', $order->order_number)
                ->with('success', 'Order placed successfully! Welcome to the Leaf N Dawn family.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Error placing order: ' . $e->getMessage());
        }
    }

    public function success($order_number)
    {
        $order = Order::where('order_number', $order_number)
            ->with(['items.product'])
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
