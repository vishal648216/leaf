<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->with('category')
            ->orderBy('id', 'asc')
            ->get();

        $categories = Category::where('is_active', true)
            ->withCount('products')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        return back()->with('success', 'Thank you! Your wellness inquiry has reached Leaf N Dawn. We will respond within 24 hours.');
    }
}
