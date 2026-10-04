<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $subtotal = $items->sum(function ($item) {
            return $item->product ? ($item->product->price * $item->quantity) : 0;
        });

        $shipping = $subtotal >= 499 || $subtotal == 0 ? 0 : 50;
        $total = $subtotal + $shipping;

        return view('cart.index', compact('items', 'subtotal', 'shipping', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1|max:20',
        ]);

        $productId = $request->product_id;
        $quantity = (int) ($request->quantity ?? 1);
        $sessionId = session()->getId();
        $userId = Auth::id();

        $item = CartItem::where('product_id', $productId)
            ->when($userId, function ($q) use ($userId) {
                return $q->where('user_id', $userId);
            }, function ($q) use ($sessionId) {
                return $q->where('session_id', $sessionId);
            })->first();

        if ($item) {
            $item->quantity += $quantity;
            $item->save();
        } else {
            CartItem::create([
                'session_id' => $sessionId,
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        if ($request->wantsJson() || $request->ajax()) {
            $cartCount = $this->getCartQuery()->sum('quantity');
            return response()->json([
                'success' => true,
                'message' => 'Item added to your wellness basket! 🌿',
                'cart_count' => $cartCount,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item added to your cart!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);

        $item = $this->getCartQuery()->where('id', $id)->firstOrFail();
        $item->quantity = $request->quantity;
        $item->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove($id)
    {
        $item = $this->getCartQuery()->where('id', $id)->first();
        if ($item) {
            $item->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function count()
    {
        $count = $this->getCartQuery()->sum('quantity');
        return response()->json(['count' => $count]);
    }
}
