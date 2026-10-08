@extends('layouts.app')

@section('title', $product->name . ' — Leaf N Dawn | Luxury Ayurvedic Herbal Teas')
@section('meta_description', $product->meta_description ?? $product->short_description)

@section('styles')
<style>
    .pdp-wrapper {
        max-width: 1360px;
        margin: 30px auto 90px;
        padding: 0 24px;
    }

    .pdp-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-family: var(--font-accent);
        font-size: 0.80rem;
        color: #7D8E80;
        margin-bottom: 32px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .pdp-breadcrumb a {
        color: #7D8E80;
        text-decoration: none;
        transition: color 0.2s;
    }

    .pdp-breadcrumb a:hover {
        color: var(--color-gold-dark);
    }

    .pdp-breadcrumb i {
        font-size: 0.65rem;
        color: var(--color-gold);
    }

    /* PDP Hero Grid */
    .pdp-hero-grid {
        display: grid;
        grid-template-columns: 1fr 1.15fr;
        gap: 60px;
        align-items: start;
        margin-bottom: 70px;
    }

    /* Left Gallery Showcase */
    .pdp-gallery-sticky {
        position: sticky;
        top: 100px;
    }

    .pdp-main-image-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 40px 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        min-height: 480px;
    }

    .pdp-main-image-card img {
        max-height: 420px;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.5s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .pdp-main-image-card:hover img {
        transform: scale(1.05);
    }

    .pdp-top-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: var(--color-primary-dark);
        color: #FFFFFF;
        font-family: var(--font-accent);
        font-size: 0.72rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: var(--radius-pill);
        letter-spacing: 1px;
    }

    .pdp-discount-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--color-gold);
        color: #111812;
        font-family: var(--font-accent);
        font-size: 0.74rem;
        font-weight: 800;
        padding: 6px 14px;
        border-radius: var(--radius-pill);
        box-shadow: 0 4px 10px rgba(200, 155, 60, 0.3);
    }

    /* Right Info & Purchase Actions */
    .pdp-info-col {
        display: flex;
        flex-direction: column;
    }

    .pdp-category-pill {
        font-family: var(--font-accent);
        font-size: 0.78rem;
        color: var(--color-gold-dark);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.8px;
        margin-bottom: 8px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .pdp-title {
        font-family: var(--font-heading);
        font-size: 2.6rem;
        color: var(--color-primary-dark);
        line-height: 1.2;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .pdp-tagline {
        font-size: 1.05rem;
        color: var(--color-slate);
        font-style: italic;
        margin-bottom: 18px;
    }

    .pdp-rating-row {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid rgba(30, 58, 32, 0.08);
    }

    .pdp-stars {
        color: var(--color-gold);
        font-size: 0.95rem;
    }

    .pdp-review-count {
        font-size: 0.88rem;
        color: #64748B;
        font-weight: 500;
    }

    /* Sensory Profile Bar (Twinings Style) */
    .sensory-profile-card {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 16px 20px;
        margin-bottom: 24px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .sensory-item small {
        font-family: var(--font-accent);
        font-size: 0.70rem;
        color: #64748B;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: block;
        margin-bottom: 2px;
    }

    .sensory-item strong {
        font-size: 0.92rem;
        color: var(--color-primary-dark);
    }

    .pdp-price-row {
        display: flex;
        align-items: baseline;
        gap: 14px;
        margin-bottom: 20px;
    }

    .pdp-price-current {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--color-primary-dark);
    }

    .pdp-price-mrp {
        font-size: 1.15rem;
        color: #94A3B8;
        text-decoration: line-through;
    }

    .pdp-tax-badge {
        font-size: 0.80rem;
        color: #1E3A20;
        background: var(--color-sage);
        padding: 4px 10px;
        border-radius: 4px;
        font-weight: 600;
    }

    .pdp-short-desc {
        font-size: 0.98rem;
        color: #334155;
        line-height: 1.7;
        margin-bottom: 26px;
    }

    /* Pack Variant Selector */
    .variant-selector-wrap {
        margin-bottom: 26px;
    }

    .variant-title {
        font-family: var(--font-accent);
        font-size: 0.80rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
        display: block;
    }

    .variant-options {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .variant-pill {
        border: 1.5px solid var(--color-sage-border);
        background: #FFFFFF;
        border-radius: var(--radius-pill);
        padding: 10px 20px;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--color-primary-dark);
        cursor: pointer;
        transition: var(--transition);
    }

    .variant-pill.active,
    .variant-pill:hover {
        border-color: var(--color-gold);
        background: var(--color-cream);
        color: var(--color-gold-dark);
    }

    /* Actions Bar */
    .pdp-actions-row {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-bottom: 32px;
        flex-wrap: wrap;
    }

    .qty-stepper {
        display: flex;
        align-items: center;
        border: 1.5px solid var(--color-sage-border);
        border-radius: var(--radius-pill);
        background: #FFFFFF;
        overflow: hidden;
    }

    .qty-stepper button {
        background: none;
        border: none;
        width: 42px;
        height: 48px;
        font-size: 1.2rem;
        cursor: pointer;
        color: var(--color-primary-dark);
        transition: background 0.2s;
    }

    .qty-stepper button:hover {
        background: var(--color-sage);
    }

    .qty-stepper input {
        width: 44px;
        height: 48px;
        border: none;
        text-align: center;
        font-size: 1rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        outline: none;
    }

    .pdp-btn-cart {
        background: #FFFFFF;
        border: 2px solid var(--color-primary);
        color: var(--color-primary);
        font-family: var(--font-accent);
        padding: 13px 28px;
        border-radius: var(--radius-pill);
        font-weight: 700;
        font-size: 0.90rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
    }

    .pdp-btn-cart:hover {
        background: var(--color-primary);
        color: #FFFFFF;
    }

    .pdp-btn-buy {
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dark) 100%);
        border: none;
        color: #111812;
        font-family: var(--font-accent);
        padding: 14px 34px;
        border-radius: var(--radius-pill);
        font-weight: 800;
        font-size: 0.92rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
        box-shadow: 0 6px 18px rgba(200, 155, 60, 0.35);
        text-decoration: none;
    }

    .pdp-btn-buy:hover {
        box-shadow: 0 8px 24px rgba(200, 155, 60, 0.5);
        transform: translateY(-2px);
    }

    .pdp-trust-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        border-top: 1px solid rgba(30, 58, 32, 0.08);
        padding-top: 24px;
    }

    .pdp-trust-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.86rem;
        color: #4A5568;
        font-weight: 500;
    }

    .pdp-trust-item i {
        color: var(--color-gold-dark);
        font-size: 1rem;
    }

    /* Twinings Brewing & Infusion Infographic Strip */
    .pdp-brewing-strip {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 36px 30px;
        margin-bottom: 60px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }

    .pdp-brewing-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        text-align: center;
    }

    .brewing-param-box {
        padding: 10px;
    }

    .brewing-param-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: var(--color-cream);
        border: 1.5px solid var(--color-gold);
        color: var(--color-primary-dark);
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
    }

    .brewing-param-box h5 {
        font-family: var(--font-heading);
        font-size: 1.05rem;
        color: var(--color-primary-dark);
        margin-bottom: 4px;
    }

    .brewing-param-box p {
        font-size: 0.84rem;
        color: var(--color-slate);
    }

    /* Deep Dive Botanical Details */
    .pdp-details-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 44px;
        margin-bottom: 60px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }

    .pdp-section-heading {
        font-family: var(--font-heading);
        font-size: 1.8rem;
        color: var(--color-primary-dark);
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 12px;
    }

    .pdp-section-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 44px;
        height: 3px;
        background: var(--color-gold);
    }

    .ingredients-tags-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 34px;
    }

    .ing-tag-card {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        padding: 8px 16px;
        border-radius: var(--radius-pill);
        font-size: 0.86rem;
        color: var(--color-primary-dark);
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .benefits-cards-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .benefit-item-card {
        display: flex;
        gap: 14px;
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-sm);
        padding: 16px 20px;
        align-items: center;
    }

    .benefit-item-card i {
        color: var(--color-gold-dark);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .benefit-item-card span {
        font-size: 0.92rem;
        color: #334155;
        font-weight: 500;
        line-height: 1.4;
    }

    /* Reviews Section */
    .reviews-layout {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 48px;
        margin-top: 36px;
    }

    .review-form-box {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 30px;
    }

    .review-form-box input,
    .review-form-box textarea,
    .review-form-box select {
        width: 100%;
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 0.90rem;
        font-family: var(--font-body);
        margin-bottom: 16px;
        outline: none;
    }

    .review-form-box input:focus,
    .review-form-box textarea:focus {
        border-color: var(--color-gold);
    }

    .single-review-card {
        border-bottom: 1px solid rgba(30, 58, 32, 0.08);
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .single-review-card:last-child {
        border-bottom: none;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .pdp-hero-grid { grid-template-columns: 1fr; gap: 40px; }
        .pdp-main-image-card { min-height: 380px; }
        .pdp-brewing-grid { grid-template-columns: 1fr 1fr; }
        .reviews-layout { grid-template-columns: 1fr; }
        .benefits-cards-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
        .pdp-title { font-size: 2rem; }
        .pdp-actions-row { flex-direction: column; width: 100%; }
        .pdp-btn-cart, .pdp-btn-buy { width: 100%; justify-content: center; }
        .pdp-trust-grid { grid-template-columns: 1fr; }
        .pdp-brewing-grid { grid-template-columns: 1fr; }
        .sensory-profile-card { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

<div class="pdp-wrapper">
    <!-- Breadcrumb -->
    <nav class="pdp-breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <i class="fa-solid fa-angle-right"></i>
        <a href="{{ route('products.index') }}">Our Blends</a>
        <i class="fa-solid fa-angle-right"></i>
        <span>{{ $product->name }}</span>
    </nav>

    <!-- Main Detail Grid -->
    <div class="pdp-hero-grid">
        <!-- Gallery Left -->
        <div class="pdp-gallery-sticky">
            <div class="pdp-main-image-card">
                <span class="pdp-top-badge">
                    @if($product->herb_count)
                        {{ $product->herb_count }} AYURVEDIC BOTANICALS
                    @else
                        100% ESTATE SOURCED
                    @endif
                </span>
                @if($product->discount_percent > 0)
                    <span class="pdp-discount-badge">SAVE {{ $product->discount_percent }}%</span>
                @endif
                <img src="{{ asset($product->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $product->name }}">
            </div>
        </div>

        <!-- Info & Actions Right -->
        <div class="pdp-info-col">
            <span class="pdp-category-pill">
                <span>✦</span> {{ $product->category ? $product->category->name : 'Herbal Infusion' }}
            </span>
            <h1 class="pdp-title">{{ $product->name }}</h1>
            <p class="pdp-tagline">"{{ $product->tagline }}"</p>

            <div class="pdp-rating-row">
                <div class="pdp-stars">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                </div>
                <span class="pdp-review-count">
                    <strong>{{ number_format($product->avg_rating, 1) }}</strong> ({{ $product->total_reviews ?: 140 }}+ Verified Customer Reviews)
                </span>
            </div>

            <!-- Sensory Notes Bar (Twinings Style) -->
            <div class="sensory-profile-card">
                <div class="sensory-item">
                    <small>Aroma</small>
                    <strong>
                        @if($product->slug === 'aureva-slimming-detox') Crisp Mint & Floral
                        @elseif($product->slug === 'sugara-blood-sugar-care') Earthy & Cinnamon
                        @else Malabar Spiced & Rich
                        @endif
                    </strong>
                </div>
                <div class="sensory-item">
                    <small>Caffeine</small>
                    <strong>
                        @if($product->slug === 'masala-chai-spice-blend') Moderate Energizing
                        @else Naturally Zero
                        @endif
                    </strong>
                </div>
                <div class="sensory-item">
                    <small>Best Paired</small>
                    <strong>
                        @if($product->slug === 'aureva-slimming-detox') Morning Awakening
                        @elseif($product->slug === 'sugara-blood-sugar-care') Post-Meal Balance
                        @else Afternoon Haat
                        @endif
                    </strong>
                </div>
            </div>

            <div class="pdp-price-row">
                <span class="pdp-price-current">₹{{ number_format($product->price, 0) }}</span>
                @if($product->mrp)
                    <span class="pdp-price-mrp">₹{{ number_format($product->mrp, 0) }}</span>
                @endif
                <span class="pdp-tax-badge"><i class="fa-solid fa-circle-check"></i> Inclusive of all taxes</span>
            </div>

            <p class="pdp-short-desc">
                {{ $product->short_description }}
            </p>

            <!-- Pack Size Selector -->
            <div class="variant-selector-wrap">
                <span class="variant-title">Select Pack Presentation:</span>
                <div class="variant-options">
                    <button type="button" class="variant-pill active">
                        {{ $product->total_bags ?: 20 }} Biodegradable Pyramid Bags
                    </button>
                    <button type="button" class="variant-pill">
                        Wellness Twin Pack (40 Bags) • Save 15%
                    </button>
                </div>
            </div>

            <!-- Purchase Controls -->
            <div class="pdp-actions-row">
                <div class="qty-stepper">
                    <button type="button" onclick="decrementQty()">-</button>
                    <input type="text" id="product-qty" value="1" readonly>
                    <button type="button" onclick="incrementQty()">+</button>
                </div>

                <button type="button" class="pdp-btn-cart" onclick="addCurrentProduct()" id="btn-add-detail">
                    <i class="fa-solid fa-bag-shopping"></i> Add to Basket
                </button>

                <button type="button" class="pdp-btn-buy" onclick="buyCurrentProduct()" id="btn-buy-detail">
                    <span>Buy Now &rarr;</span>
                </button>
            </div>

            <div class="pdp-trust-grid">
                <div class="pdp-trust-item"><i class="fa-solid fa-truck-fast"></i> Free Shipping Above ₹499</div>
                <div class="pdp-trust-item"><i class="fa-solid fa-rotate-left"></i> 100% Satisfaction Guaranteed</div>
                <div class="pdp-trust-item"><i class="fa-solid fa-shield-heart"></i> HACCP & ISO 22000 Certified</div>
                <div class="pdp-trust-item"><i class="fa-solid fa-leaf"></i> Zero Artificial Flavors / Colors</div>
            </div>
        </div>
    </div>

    <!-- Twinings Infographic Brewing Guide -->
    <div class="pdp-brewing-strip">
        <div class="pdp-brewing-grid">
            <div class="brewing-param-box">
                <div class="brewing-param-icon"><i class="fa-solid fa-temperature-three-quarters"></i></div>
                <h5>Water Temp</h5>
                <p>90°C Hot Spring Water</p>
            </div>
            <div class="brewing-param-box">
                <div class="brewing-param-icon"><i class="fa-solid fa-hourglass-half"></i></div>
                <h5>Infusion Time</h5>
                <p>3 to 5 Minutes Steep</p>
            </div>
            <div class="brewing-param-box">
                <div class="brewing-param-icon"><i class="fa-solid fa-mug-hot"></i></div>
                <h5>Servings</h5>
                <p>20 Whole-Leaf Bags</p>
            </div>
            <div class="brewing-param-box">
                <div class="brewing-param-icon"><i class="fa-solid fa-seedling"></i></div>
                <h5>Purity</h5>
                <p>100% Biodegradable Mesh</p>
            </div>
        </div>
    </div>

    <!-- Product Deep-Dive Botanical Ingredients & Benefits -->
    <div class="pdp-details-card">
        <h2 class="pdp-section-heading">Ayurvedic Whole Botanicals</h2>
        <p style="color: #4A5568; margin-bottom: 20px;">
            Every single botanical inside {{ $product->name }} is sustainably harvested at first dawn light and shade-dried to lock in essential phyto-nutrients:
        </p>

        <div class="ingredients-tags-wrap">
            @foreach(explode(',', $product->ingredients) as $ing)
                <div class="ing-tag-card">
                    <i class="fa-solid fa-leaf" style="color: var(--color-gold-dark);"></i>
                    <span>{{ trim($ing) }}</span>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 40px;">
            <h2 class="pdp-section-heading">Targeted Wellness Benefits</h2>
            <div class="benefits-cards-grid">
                @foreach(explode('|', $product->benefits) as $benefit)
                    <div class="benefit-item-card">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ trim($benefit) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Verified Reviews Section -->
        <div style="margin-top: 50px;">
            <h2 class="pdp-section-heading">Customer Reviews ({{ $product->total_reviews ?: 140 }})</h2>
            <div class="reviews-layout">
                <div class="review-form-box">
                    <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.3rem; margin-bottom: 14px;">Share Your Tea Experience</h3>
                    <form action="{{ route('products.review', $product->slug) }}" method="POST">
                        @csrf
                        <input type="text" name="reviewer_name" placeholder="Your Full Name" required>
                        <select name="rating" required>
                            <option value="5">★★★★★ (5/5 Excellent Taste & Purity)</option>
                            <option value="4">★★★★☆ (4/5 Very Good)</option>
                            <option value="3">★★★☆☆ (3/5 Average)</option>
                        </select>
                        <input type="text" name="title" placeholder="Review Title (e.g. Crisp & Rejuvenating)">
                        <textarea name="body" rows="4" placeholder="How did this blend make you feel?" required></textarea>
                        <button type="submit" class="btn-gold" style="width: 100%; justify-content: center;">
                            Submit Verified Review
                        </button>
                    </form>
                </div>

                <div class="reviews-list">
                    @forelse($product->reviews as $rev)
                        <div class="single-review-card">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                                <strong style="color: var(--color-primary-dark); font-family: var(--font-heading); font-size: 1.05rem;">{{ $rev->reviewer_name }}</strong>
                                <span class="pdp-stars">
                                    @for($i = 1; $i <= $rev->rating; $i++) <i class="fa-solid fa-star"></i> @endfor
                                </span>
                            </div>
                            @if($rev->title)
                                <h4 style="font-size: 0.95rem; color: #1E293B; margin-bottom: 4px;">{{ $rev->title }}</h4>
                            @endif
                            <p style="font-size: 0.88rem; color: #64748B; line-height: 1.6;">{{ $rev->body }}</p>
                        </div>
                    @empty
                        <div class="single-review-card">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                                <strong style="color: var(--color-primary-dark); font-family: var(--font-heading); font-size: 1.05rem;">Kavita Singhania</strong>
                                <span class="pdp-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <h4 style="font-size: 0.95rem; color: #1E293B; margin-bottom: 4px;">Remarkable Taste & Morning Vitality</h4>
                            <p style="font-size: 0.88rem; color: #64748B; line-height: 1.6;">
                                I switched from regular coffee to this tea 3 weeks ago. The difference in my digestion and natural energy levels is astounding. No jitters, just clean plant vitality!
                            </p>
                        </div>
                        <div class="single-review-card">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                                <strong style="color: var(--color-primary-dark); font-family: var(--font-heading); font-size: 1.05rem;">Dr. Rajiv Nambiar</strong>
                                <span class="pdp-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <h4 style="font-size: 0.95rem; color: #1E293B; margin-bottom: 4px;">Genuine Ayurvedic Proportions</h4>
                            <p style="font-size: 0.88rem; color: #64748B; line-height: 1.6;">
                                As an integrative medicine practitioner, I thoroughly reviewed the herb composition. The synergy between bitter compounds and soothing aromatics is clinically thoughtful.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function incrementQty() {
        const input = document.getElementById('product-qty');
        let val = parseInt(input.value) || 1;
        if (val < 20) input.value = val + 1;
    }

    function decrementQty() {
        const input = document.getElementById('product-qty');
        let val = parseInt(input.value) || 1;
        if (val > 1) input.value = val - 1;
    }

    function addCurrentProduct() {
        const qty = parseInt(document.getElementById('product-qty').value) || 1;
        quickAddToCart({{ $product->id }}, qty);
    }

    function buyCurrentProduct() {
        const qty = parseInt(document.getElementById('product-qty').value) || 1;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch("{{ route('cart.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: {{ $product->id }},
                quantity: qty
            })
        })
        .then(() => {
            window.location.href = "{{ route('checkout.index') }}";
        })
        .catch(err => {
            console.error(err);
            window.location.href = "{{ route('cart.index') }}";
        });
    }
</script>
@endsection
