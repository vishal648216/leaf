@extends('layouts.app')

@section('title', 'Artisanal Herbal Tea Collections — Leaf N Dawn')
@section('meta_description', 'Explore Leaf N Dawn full range of handcrafted Ayurvedic herbal blends, detox infusions, glycemic care, and royal spiced Assam teas.')

@section('styles')
<style>
    /* Collection Hero Banner (Twinings India Style) */
    .catalog-hero-banner {
        background: linear-gradient(135deg, #122414 0%, #1E3A20 100%);
        color: #FAF8F3;
        padding: 55px 24px;
        text-align: center;
        border-bottom: 3px solid var(--color-gold);
        margin-bottom: 40px;
    }

    .catalog-hero-inner {
        max-width: 820px;
        margin: 0 auto;
    }

    .catalog-hero-tag {
        font-family: var(--font-accent);
        font-size: 0.76rem;
        font-weight: 700;
        color: var(--color-gold-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 8px;
        display: inline-block;
    }

    .catalog-hero-title {
        font-family: var(--font-heading);
        font-size: 2.8rem;
        font-weight: 700;
        color: #FFFFFF;
        margin-bottom: 12px;
        letter-spacing: -0.2px;
    }

    .catalog-hero-desc {
        color: #CBD7CE;
        font-size: 1rem;
        line-height: 1.6;
    }

    .catalog-container {
        max-width: 1360px;
        margin: 0 auto 90px;
        padding: 0 24px;
    }

    /* Filter & Sort Bar */
    .catalog-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-pill);
        padding: 10px 24px;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
    }

    .category-pills-list {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .cat-filter-btn {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        color: var(--color-primary-dark);
        padding: 8px 18px;
        border-radius: var(--radius-pill);
        font-family: var(--font-accent);
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        text-decoration: none;
        transition: var(--transition);
    }

    .cat-filter-btn.active, 
    .cat-filter-btn:hover {
        background: var(--color-primary);
        color: #FFFFFF;
        border-color: var(--color-primary);
    }

    .sort-dropdown select {
        padding: 8px 16px;
        border-radius: var(--radius-pill);
        border: 1px solid var(--color-sage-border);
        font-family: var(--font-accent);
        font-size: 0.80rem;
        font-weight: 600;
        color: var(--color-charcoal);
        outline: none;
        background: var(--color-cream);
        cursor: pointer;
    }

    /* Catalog Product Cards Grid */
    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
    }

    .product-card {
        background: #FFFFFF;
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid var(--color-sage-border);
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
        transition: transform 0.35s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.35s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--color-gold);
    }

    .card-top-tag {
        position: absolute;
        top: 14px;
        left: 14px;
        background: rgba(18, 36, 20, 0.90);
        backdrop-filter: blur(4px);
        color: #FFFFFF;
        font-family: var(--font-accent);
        font-size: 0.68rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 20px;
        z-index: 2;
        letter-spacing: 0.8px;
    }

    .card-discount-tag {
        position: absolute;
        top: 14px;
        right: 14px;
        background: var(--color-gold);
        color: #111812;
        font-family: var(--font-accent);
        font-size: 0.70rem;
        font-weight: 800;
        padding: 4px 12px;
        border-radius: 20px;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(200, 155, 60, 0.3);
    }

    .card-image-wrap {
        height: 310px;
        background: #FAF8F3;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    .card-image-wrap img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        border-radius: 12px;
        transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .product-card:hover .card-image-wrap img {
        transform: scale(1.06);
    }

    .card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card-meta-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 6px;
    }

    .card-category {
        font-family: var(--font-accent);
        font-size: 0.72rem;
        color: var(--color-gold-dark);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .card-rating {
        font-size: 0.78rem;
        color: var(--color-gold-dark);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .card-title {
        font-family: var(--font-heading);
        font-size: 1.35rem;
        color: var(--color-primary-dark);
        margin: 4px 0 6px;
        font-weight: 700;
        line-height: 1.3;
    }

    .card-title a {
        text-decoration: none;
        color: inherit;
        transition: color 0.2s;
    }

    .card-title a:hover {
        color: var(--color-gold-dark);
    }

    .card-tagline {
        font-size: 0.86rem;
        color: var(--color-slate);
        margin-bottom: 14px;
        font-style: italic;
    }

    .card-herbs-pills {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        margin-bottom: 18px;
    }

    .herb-pill {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        color: var(--color-primary-dark);
        font-size: 0.72rem;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
    }

    .card-price-row {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px solid #EAE6DD;
        margin-bottom: 18px;
    }

    .price-current {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--color-primary-dark);
    }

    .price-mrp {
        font-size: 0.92rem;
        color: #94A3B8;
        text-decoration: line-through;
    }

    .price-per-cup {
        margin-left: auto;
        font-size: 0.76rem;
        color: #64748B;
        font-weight: 500;
    }

    .card-actions {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 10px;
    }

    .btn-card-cart {
        background: #FFFFFF;
        border: 1.5px solid var(--color-primary);
        color: var(--color-primary);
        padding: 10px;
        border-radius: var(--radius-pill);
        font-family: var(--font-accent);
        font-size: 0.84rem;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: var(--transition);
    }

    .btn-card-cart:hover {
        background: var(--color-primary);
        color: #FFFFFF;
    }

    .btn-card-buy {
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dark) 100%);
        border: none;
        color: #111812;
        padding: 10px;
        border-radius: var(--radius-pill);
        font-family: var(--font-accent);
        font-size: 0.84rem;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: var(--transition);
        box-shadow: 0 4px 12px rgba(200, 155, 60, 0.25);
    }

    .btn-card-buy:hover {
        box-shadow: 0 6px 16px rgba(200, 155, 60, 0.4);
        transform: translateY(-1px);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .catalog-grid { grid-template-columns: 1fr; max-width: 440px; margin: 0 auto; }
        .catalog-toolbar { flex-direction: column; align-items: stretch; }
    }
</style>
@endsection

@section('content')

<!-- Collection Hero Banner -->
<div class="catalog-hero-banner">
    <div class="catalog-hero-inner">
        <span class="catalog-hero-tag">✦ The Leaf N Dawn Reserve ✦</span>
        <h1 class="catalog-hero-title">
            @if($currentCategory)
                {{ $currentCategory->name }}
            @elseif(request('q'))
                Search Results for "{{ request('q') }}"
            @else
                Artisanal Tea Formulations
            @endif
        </h1>
        <p class="catalog-hero-desc">
            @if($currentCategory)
                {{ $currentCategory->description }}
            @else
                Explore single-estate hand-plucked botanicals and whole spices encapsulated in plastic-free pyramid tea bags for supreme infusion.
            @endif
        </p>
    </div>
</div>

<div class="catalog-container">
    <!-- Toolbar: Filter Pills & Sort Selector -->
    <div class="catalog-toolbar">
        <div class="category-pills-list">
            <a href="{{ route('products.index') }}" class="cat-filter-btn {{ !request('category') ? 'active' : '' }}">
                All Blends
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->slug]) }}" class="cat-filter-btn {{ request('category') === $cat->slug ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="sort-dropdown">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('q'))
                <input type="hidden" name="q" value="{{ request('q') }}">
            @endif
            <select name="sort" onchange="this.form.submit()">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Featured / Reserve</option>
                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated ★</option>
            </select>
        </form>
    </div>

    <!-- Catalog Grid -->
    <div class="catalog-grid">
        @forelse($products as $prod)
            <div class="product-card" id="catalog-card-{{ $prod->id }}">
                <span class="card-top-tag">
                    @if($prod->herb_count)
                        {{ $prod->herb_count }} BOTANICALS
                    @else
                        100% ORGANIC
                    @endif
                </span>
                @if($prod->discount_percent > 0)
                    <span class="card-discount-tag">{{ $prod->discount_percent }}% OFF</span>
                @endif

                <a href="{{ route('products.show', $prod->slug) }}" class="card-image-wrap">
                    <img src="{{ asset($prod->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $prod->name }}">
                </a>

                <div class="card-body">
                    <div class="card-meta-row">
                        <span class="card-category">{{ $prod->category ? $prod->category->name : 'Herbal Blend' }}</span>
                        <span class="card-rating">
                            <i class="fa-solid fa-star"></i> {{ number_format($prod->avg_rating, 1) }}
                        </span>
                    </div>

                    <h3 class="card-title">
                        <a href="{{ route('products.show', $prod->slug) }}">{{ $prod->name }}</a>
                    </h3>
                    <p class="card-tagline">"{{ $prod->tagline }}"</p>

                    <div class="card-herbs-pills">
                        @if($prod->slug === 'aureva-slimming-detox')
                            <span class="herb-pill">🌿 Oolong & Green Tea</span>
                            <span class="herb-pill">🍃 Peppermint & Moringa</span>
                        @elseif($prod->slug === 'sugara-blood-sugar-care')
                            <span class="herb-pill">🌿 Karela & Jamun</span>
                            <span class="herb-pill">🌱 Cinnamon & Fenugreek</span>
                        @else
                            <span class="herb-pill">☕ Assam CTC Tea</span>
                            <span class="herb-pill">🌿 Malabar Cardamom</span>
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
                        <button class="btn-card-cart" onclick="quickAddToCart({{ $prod->id }})" id="btn-cat-add-{{ $prod->id }}">
                            <i class="fa-solid fa-bag-shopping"></i> Add
                        </button>
                        <a href="{{ route('products.show', $prod->slug) }}" class="btn-card-buy" id="btn-cat-view-{{ $prod->id }}">
                            <span>Buy Now</span> <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #FFFFFF; border-radius: var(--radius-lg); border: 1px solid var(--color-sage-border);">
                <i class="fa-solid fa-mug-saucer" style="font-size: 3rem; color: var(--color-gold); margin-bottom: 16px;"></i>
                <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.6rem; margin-bottom: 8px;">No blends found</h3>
                <p style="color: var(--color-slate); margin-bottom: 20px;">We could not find any teas matching your selection criteria.</p>
                <a href="{{ route('products.index') }}" class="btn-gold">View All Tea Blends</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div style="margin-top: 48px; display: flex; justify-content: center;">
        {{ $products->links() }}
    </div>
</div>

@endsection
