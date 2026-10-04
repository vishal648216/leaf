@extends('layouts.app')

@section('title', 'Explore Our Herbal Blends — Leaf N Dawn')

@section('styles')
<style>
    .catalog-wrap {
        max-width: 1280px;
        margin: 40px auto 80px;
        padding: 0 24px;
    }

    .catalog-header {
        text-align: center;
        margin-bottom: 48px;
    }

    .catalog-title {
        font-family: var(--font-heading);
        font-size: 2.6rem;
        color: var(--color-primary-dark);
        margin-bottom: 12px;
    }

    .catalog-desc {
        color: var(--color-slate);
        max-width: 600px;
        margin: 0 auto;
        font-size: 1rem;
    }

    /* Filter Bar */
    .filter-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 16px 24px;
        margin-bottom: 36px;
        flex-wrap: wrap;
        gap: 16px;
        box-shadow: var(--shadow-sm);
    }

    .category-pills {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .cat-btn {
        background: var(--color-sage);
        border: 1px solid var(--color-sage-border);
        color: var(--color-primary-dark);
        padding: 8px 18px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
    }

    .cat-btn.active, .cat-btn:hover {
        background: var(--color-primary);
        color: #FFFFFF;
        border-color: var(--color-primary);
    }

    .sort-wrap select {
        padding: 8px 16px;
        border-radius: 20px;
        border: 1px solid var(--color-sage-border);
        font-size: 0.85rem;
        color: var(--color-charcoal);
        outline: none;
        background: #FFFFFF;
        cursor: pointer;
    }

    /* Products Grid */
    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
    }

    @media (max-width: 992px) {
        .catalog-grid { grid-template-columns: 1fr; max-width: 440px; margin: 0 auto; }
        .filter-bar { flex-direction: column; align-items: stretch; }
    }
</style>
@endsection

@section('content')
<div class="catalog-wrap">
    <div class="catalog-header">
        <span style="font-family: var(--font-accent); font-size: 0.78rem; font-weight: 700; color: var(--color-primary); text-transform: uppercase; letter-spacing: 1.5px;">Artisanal Collection</span>
        <h1 class="catalog-title">Sacred Herbal Infusions</h1>
        <p class="catalog-desc">Every blend is formulated with purpose, sustainably harvested, and packaged in whole-leaf pyramid tea bags for supreme aroma.</p>
    </div>

    <!-- Filter & Sort Bar -->
    <div class="filter-bar">
        <div class="category-pills">
            <a href="{{ route('products.index') }}" class="cat-btn {{ !request('category') ? 'active' : '' }}">All Blends</a>
            @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->slug]) }}" class="cat-btn {{ request('category') === $cat->slug ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="sort-wrap">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('q'))
                <input type="hidden" name="q" value="{{ request('q') }}">
            @endif
            <select name="sort" onchange="this.form.submit()">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Featured / Default</option>
                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
            </select>
        </form>
    </div>

    <!-- Catalog Grid -->
    <div class="catalog-grid">
        @forelse($products as $prod)
            <div class="product-card">
                <span class="card-top-tag">
                    @if($prod->herb_count)
                        {{ $prod->herb_count }} BOTANICALS
                    @else
                        100% NATURAL
                    @endif
                </span>
                @if($prod->discount_percent > 0)
                    <span class="card-discount-tag">{{ $prod->discount_percent }}% OFF</span>
                @endif

                <a href="{{ route('products.show', $prod->slug) }}" class="card-image-wrap">
                    <img src="{{ asset($prod->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $prod->name }}">
                </a>

                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <span class="card-category">{{ $prod->category ? $prod->category->name : 'Herbal Tea' }}</span>
                        <span style="font-size: 0.78rem; color: var(--color-gold-dark); font-weight: 700;">
                            <i class="fa-solid fa-star"></i> {{ number_format($prod->avg_rating, 1) }}
                        </span>
                    </div>

                    <h3 class="card-title">
                        <a href="{{ route('products.show', $prod->slug) }}">{{ $prod->name }}</a>
                    </h3>
                    <p class="card-tagline">"{{ $prod->tagline }}"</p>

                    <div class="card-herbs-pills">
                        @if($prod->slug === 'aureva-slimming-detox')
                            <span class="herb-pill">🌿 Oolong & Mint</span>
                            <span class="herb-pill">🍃 Moringa</span>
                            <span class="herb-pill">🌱 17 Botanicals</span>
                        @elseif($prod->slug === 'sugara-blood-sugar-care')
                            <span class="herb-pill">🌿 Karela & Gudmar</span>
                            <span class="herb-pill">🍃 Jamun Seed</span>
                            <span class="herb-pill">🌱 14 Herbs</span>
                        @else
                            <span class="herb-pill">☕ Assam CTC</span>
                            <span class="herb-pill">🌿 Cardamom</span>
                            <span class="herb-pill">🌱 5 Spices</span>
                        @endif
                    </div>

                    <div class="card-price-row">
                        <span class="price-current">₹{{ number_format($prod->price, 0) }}</span>
                        @if($prod->mrp)
                            <span class="price-mrp">₹{{ number_format($prod->mrp, 0) }}</span>
                        @endif
                        <span class="price-per-cup">
                            @if($prod->total_bags)
                                ₹{{ round($prod->price / $prod->total_bags, 1) }} / cup
                            @endif
                        </span>
                    </div>

                    <div class="card-actions">
                        <button class="btn-card-cart" onclick="quickAddToCart({{ $prod->id }})">
                            <i class="fa-solid fa-bag-shopping"></i> Add
                        </button>
                        <a href="{{ route('products.show', $prod->slug) }}" class="btn-card-buy">
                            <span>Details</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #FFFFFF; border-radius: 12px; border: 1px solid var(--color-sage-border);">
                <i class="fa-solid fa-leaf" style="font-size: 2.5rem; color: #CBD5E1; margin-bottom: 16px;"></i>
                <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.4rem;">No Blends Match Your Filter</h3>
                <p style="color: #64748B; margin-top: 8px;">Try clearing filters or explore our full collection.</p>
                <a href="{{ route('products.index') }}" class="btn-shop-now" style="margin-top: 20px;">View All Blends</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div style="margin-top: 48px; display: flex; justify-content: center;">
        {{ $products->links() }}
    </div>
</div>
@endsection
