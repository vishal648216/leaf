<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');
        $search = $request->query('q');
        $sort = $request->query('sort', 'latest');

        $query = Product::where('is_active', true)->with('category');

        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('tagline', 'like', "%{$search}%")
                  ->orWhere('ingredients', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('avg_rating', 'desc');
                break;
            default:
                $query->orderBy('id', 'asc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::where('is_active', true)->withCount('products')->get();
        $currentCategory = $categorySlug ? Category::where('slug', $categorySlug)->first() : null;

        return view('products.index', compact('products', 'categories', 'currentCategory', 'search', 'sort'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with(['category', 'reviews' => function ($q) {
                $q->latest();
            }])
            ->firstOrFail();

        $relatedProducts = Product::where('is_active', true)
            ->where('id', '!=', $product->id)
            ->where(function ($q) use ($product) {
                if ($product->category_id) {
                    $q->where('category_id', $product->category_id);
                }
            })
            ->limit(3)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::where('is_active', true)
                ->where('id', '!=', $product->id)
                ->limit(3)
                ->get();
        }

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function storeReview(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate([
            'reviewer_name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:150',
            'body' => 'required|string|max:1000',
        ]);

        Review::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'reviewer_name' => $request->reviewer_name,
            'rating' => $request->rating,
            'title' => $request->title,
            'body' => $request->body,
            'is_approved' => true, // Auto-approve for demo
        ]);

        // Recalculate average rating
        $avg = $product->reviews()->avg('rating') ?: $request->rating;
        $count = $product->reviews()->count();
        $product->update([
            'avg_rating' => round($avg, 2),
            'total_reviews' => $count,
        ]);

        return back()->with('success', 'Thank you for sharing your experience! Your review is live.');
    }
}
