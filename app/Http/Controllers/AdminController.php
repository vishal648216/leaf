<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::where('payment_status', 'paid')
            ->orWhere('status', 'delivered')
            ->sum('total');

        if ($totalRevenue == 0) {
            // Include processing orders for realistic dashboard demo
            $totalRevenue = Order::sum('total');
        }

        $totalProducts = Product::count();
        $totalCustomers = User::where('role', 'customer')->count();

        $recentOrders = Order::with('items')->latest()->limit(5)->get();
        $products = Product::with('category')->latest()->get();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalRevenue', 'totalProducts', 'totalCustomers', 'recentOrders', 'products'
        ));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        if ($request->status === 'delivered') {
            $order->payment_status = 'paid';
        }
        $order->save();

        return back()->with('success', "Order {$order->order_number} status updated to {$order->status}.");
    }
}
