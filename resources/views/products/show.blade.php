@extends('layouts.app')

@section('title', $product->name . ' — Leaf N Dawn')
@section('meta_description', $product->meta_description ?? $product->short_description)

@section('styles')
<style>
    .product-detail-wrap {
        max-width: 1280px;
        margin: 40px auto 80px;
        padding: 0 24px;
    }

    .breadcrumb-nav {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: #64748B;
        margin-bottom: 28px;
    }

    .breadcrumb-nav a {
        color: #64748B;
        text-decoration: none;
        transition: color 0.2s;
    }

    .breadcrumb-nav a:hover {
        color: var(--color-primary);
    }

    .product-main-grid {
        display: grid;
        grid-template-columns: 1fr 1.15fr;
        gap: 56px;
        align-items: start;
        margin-bottom: 64px;
    }

    /* Product Gallery */
    .product-gallery {
        position: sticky;
        top: 100px;
    }

    .gallery-main-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 40px 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: var(--shadow-sm);
        height: 480px;
    }

    .gallery-main-card img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .product-pill-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: var(--color-charcoal);
        color: #FFFFFF;
        font-family: var(--font-accent);
        font-size: 0.76rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 20px;
        letter-spacing: 0.8px;
    }

    .product-savings-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--color-gold);
        color: #1A1A2E;
        font-family: var(--font-accent);
        font-size: 0.78rem;
        font-weight: 800;
        padding: 6px 14px;
        border-radius: 20px;
    }

    /* Product Info Area */
    .product-info-col {
        display: flex;
        flex-direction: column;
    }

    .product-cat-label {
        font-family: var(--font-accent);
        font-size: 0.82rem;
        color: var(--color-primary);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.4px;
        margin-bottom: 8px;
    }

    .product-header-title {
        font-family: var(--font-heading);
        font-size: 2.5rem;
        color: var(--color-primary-dark);
        line-height: 1.2;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .product-header-tagline {
        font-size: 1.05rem;
        color: var(--color-slate);
        font-style: italic;
        margin-bottom: 16px;
    }

    .rating-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid #E2E8F0;
    }

    .stars {
        color: var(--color-gold);
        font-size: 1rem;
    }

    .rating-count {
        font-size: 0.88rem;
        color: #64748B;
        font-weight: 500;
    }

    .pricing-box {
        display: flex;
        align-items: baseline;
        gap: 16px;
        margin-bottom: 24px;
    }

    .detail-price {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--color-primary-dark);
    }

    .detail-mrp {
        font-size: 1.2rem;
        color: #94A3B8;
        text-decoration: line-through;
    }

    .detail-tax-note {
        font-size: 0.82rem;
        color: #10B981;
        font-weight: 600;
    }

    .short-desc {
        font-size: 1rem;
        color: #334155;
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .pouch-spec-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        background: var(--color-sage);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 16px 20px;
        margin-bottom: 30px;
    }

    .spec-item {
        text-align: center;
    }

    .spec-item small {
        font-size: 0.72rem;
        color: #64748B;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        display: block;
    }

    .spec-item strong {
        font-size: 1.02rem;
        color: var(--color-primary-dark);
    }

    /* Actions form */
    .purchase-actions-wrap {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-bottom: 32px;
        flex-wrap: wrap;
    }

    .quantity-stepper {
        display: flex;
        align-items: center;
        border: 1.5px solid var(--color-sage-border);
        border-radius: 30px;
        background: #FFFFFF;
        overflow: hidden;
    }

    .quantity-stepper button {
        background: none;
        border: none;
        width: 40px;
        height: 46px;
        font-size: 1.1rem;
        cursor: pointer;
        color: var(--color-charcoal);
        transition: background 0.2s;
    }

    .quantity-stepper button:hover {
        background: var(--color-sage);
    }

    .quantity-stepper input {
        width: 44px;
        height: 46px;
        border: none;
        text-align: center;
        font-size: 1rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        outline: none;
    }

    .btn-detail-cart {
        background: #FFFFFF;
        border: 2px solid var(--color-primary);
        color: var(--color-primary);
        padding: 12px 28px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
    }

    .btn-detail-cart:hover {
        background: var(--color-primary);
        color: #FFFFFF;
    }

    .btn-detail-buy {
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dark) 100%);
        border: none;
        color: #1A1A2E;
        padding: 13px 32px;
        border-radius: 30px;
        font-weight: 800;
        font-size: 0.98rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
        box-shadow: 0 6px 18px rgba(245, 166, 35, 0.35);
        text-decoration: none;
    }

    .btn-detail-buy:hover {
        box-shadow: 0 8px 22px rgba(245, 166, 35, 0.5);
        transform: translateY(-2px);
    }

    .trust-bullets {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        border-top: 1px solid #E2E8F0;
        padding-top: 24px;
    }

    .bullet-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.88rem;
        color: #334155;
        font-weight: 500;
    }

    .bullet-item i {
        color: var(--color-primary);
    }

    /* Tabs / Detail Sections */
    .details-tabs-wrap {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 40px;
        margin-bottom: 64px;
        box-shadow: var(--shadow-sm);
    }

    .tab-title {
        font-family: var(--font-heading);
        font-size: 1.8rem;
        color: var(--color-primary-dark);
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 12px;
    }

    .tab-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 44px;
        height: 3px;
        background: var(--color-gold);
    }

    .ingredients-pill-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 28px;
    }

    .ing-tag {
        background: var(--color-sage);
        border: 1px solid var(--color-sage-border);
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        color: var(--color-primary-dark);
        font-weight: 600;
    }

    .benefits-checklist {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-top: 20px;
    }

    .benefit-box {
        display: flex;
        gap: 12px;
        background: #F8FAF8;
        border: 1px solid #E2E8F0;
        border-radius: var(--radius-sm);
        padding: 14px 18px;
    }

    .benefit-box i {
        color: var(--color-gold);
        font-size: 1.1rem;
        margin-top: 2px;
    }

    .benefit-box span {
        font-size: 0.92rem;
        color: #334155;
        font-weight: 500;
    }

    /* Reviews */
    .reviews-container {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 48px;
        margin-top: 36px;
    }

    .review-form-card {
        background: #F8FAF8;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 28px;
    }

    .review-form-card input,
    .review-form-card textarea,
    .review-form-card select {
        width: 100%;
        background: #FFFFFF;
        border: 1.5px solid var(--color-sage-border);
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 0.92rem;
        margin-bottom: 16px;
        outline: none;
        font-family: inherit;
    }

    .review-form-card input:focus,
    .review-form-card textarea:focus {
        border-color: var(--color-primary);
    }

    .review-item {
        border-bottom: 1px solid #F1F5F9;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .review-item:last-child {
        border-bottom: none;
    }

    @media (max-width: 992px) {
        .product-main-grid { grid-template-columns: 1fr; }
        .gallery-main-card { height: 360px; }
        .reviews-container { grid-template-columns: 1fr; }
        .benefits-checklist { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

<div class="product-detail-wrap">
    <!-- Breadcrumb -->
    <nav class="breadcrumb-nav">
        <a href="{{ route('home') }}">Home</a>
        <i class="fa-solid fa-angle-right" style="font-size: 0.7rem;"></i>
        <a href="{{ route('products.index') }}">Our Blends</a>
        <i class="fa-solid fa-angle-right" style="font-size: 0.7rem;"></i>
        <span>{{ $product->name }}</span>
    </nav>

    <!-- Main Detail Grid -->
    <div class="product-main-grid">
        <!-- Gallery -->
        <div class="product-gallery">
            <div class="gallery-main-card">
                <span class="product-pill-badge">
                    @if($product->herb_count)
                        {{ $product->herb_count }} AYURVEDIC BOTANICALS
                    @else
                        100% ORGANIC
                    @endif
                </span>
                @if($product->discount_percent > 0)
                    <span class="product-savings-badge">SAVE {{ $product->discount_percent }}%</span>
                @endif
                <img src="{{ asset($product->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $product->name }}">
            </div>
        </div>

        <!-- Info & Actions -->
        <div class="product-info-col">
            <span class="product-cat-label">{{ $product->category ? $product->category->name : 'Herbal Blend' }}</span>
            <h1 class="product-header-title">{{ $product->name }}</h1>
            <p class="product-header-tagline">"{{ $product->tagline }}"</p>

            <div class="rating-row">
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                </div>
                <span class="rating-count"><strong>{{ number_format($product->avg_rating, 1) }}</strong> ({{ $product->total_reviews ?: 140 }}+ Verified Customer Reviews)</span>
            </div>

            <div class="pricing-box">
                <span class="detail-price">₹{{ number_format($product->price, 0) }}</span>
                @if($product->mrp)
                    <span class="detail-mrp">₹{{ number_format($product->mrp, 0) }}</span>
                @endif
                <span class="detail-tax-note"><i class="fa-solid fa-circle-check"></i> Inclusive of all taxes</span>
            </div>

            <p class="short-desc">
                {{ $product->short_description }}
            </p>

            <div class="pouch-spec-grid">
                <div class="spec-item">
                    <small>Pack Size</small>
                    <strong>{{ $product->total_bags ?: 20 }} Pyramid Bags</strong>
                </div>
                <div class="spec-item">
                    <small>Cost Per Cup</small>
                    <strong>₹{{ $product->total_bags ? round($product->price / $product->total_bags, 1) : 27.5 }} / cup</strong>
                </div>
                <div class="spec-item">
                    <small>Availability</small>
                    <strong style="color: #2E7D32;"><i class="fa-solid fa-circle-check"></i> In Stock</strong>
                </div>
            </div>

            <!-- Purchase Controls -->
            <div class="purchase-actions-wrap">
                <div class="quantity-stepper">
                    <button type="button" onclick="decrementQty()">-</button>
                    <input type="text" id="product-qty" value="1" readonly>
                    <button type="button" onclick="incrementQty()">+</button>
                </div>

                <button type="button" class="btn-detail-cart" onclick="addCurrentProduct()" id="btn-add-detail">
                    <i class="fa-solid fa-bag-shopping"></i> Add to Cart
                </button>

                <button type="button" class="btn-detail-buy" onclick="buyCurrentProduct()" id="btn-buy-detail">
                    <span>Buy Now &rarr;</span>
                </button>
            </div>

            <div class="trust-bullets">
                <div class="bullet-item"><i class="fa-solid fa-truck-fast"></i> Free Shipping Above ₹499</div>
                <div class="bullet-item"><i class="fa-solid fa-rotate-left"></i> 100% Satisfaction Guarantee</div>
                <div class="bullet-item"><i class="fa-solid fa-shield-heart"></i> HACCP & ISO 22000 Certified</div>
                <div class="bullet-item"><i class="fa-solid fa-leaf"></i> Zero Artificial Colors or Flavors</div>
            </div>
        </div>
    </div>

    <!-- Product Deep-Dive Tabs -->
    <div class="details-tabs-wrap">
        <h2 class="tab-title">Ayurvedic Botanical Ingredients</h2>
        <p style="color: #4A5568; margin-bottom: 20px;">
            Every single botanical inside {{ $product->name }} is sustainably harvested at peak potency and gently shade-dried to conserve vital bio-compounds:
        </p>

        <div class="ingredients-pill-list">
            @foreach(explode(',', $product->ingredients) as $ing)
                <span class="ing-tag"><i class="fa-solid fa-seedling" style="color: var(--color-primary); margin-right: 6px;"></i> {{ trim($ing) }}</span>
            @endforeach
        </div>

        <div style="margin-top: 40px;">
            <h2 class="tab-title">Targeted Health Benefits</h2>
            <div class="benefits-checklist">
                @foreach(explode('|', $product->benefits) as $benefit)
                    <div class="benefit-box">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ trim($benefit) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="margin-top: 40px;">
            <h2 class="tab-title">Sacred Brewing Instructions</h2>
            <div style="background: var(--color-sage); border: 1px solid var(--color-sage-border); border-radius: var(--radius-md); padding: 24px; line-height: 1.8; color: #1A1A2E;">
                <p><strong><i class="fa-solid fa-mug-hot" style="color: var(--color-gold-dark); margin-right: 8px;"></i> Recommended Ritual:</strong> {{ $product->brewing_guide }}</p>
                <p style="margin-top: 10px; font-size: 0.9rem; color: #4A5568;">
                    <strong>Tip:</strong> For iced wellness infusion, brew double strength with 2 bags in 150ml water for 5 minutes, then pour over chilled fresh ice with a slice of cucumber or lime.
                </p>
            </div>
        </div>

        <!-- Reviews & Ratings -->
        <div style="margin-top: 50px;">
            <h2 class="tab-title">Customer Reviews ({{ $product->total_reviews ?: 140 }})</h2>
            <div class="reviews-container">
                <div class="review-form-card">
                    <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.3rem; margin-bottom: 14px;">Share Your Wellness Experience</h3>
                    <form action="{{ route('products.review', $product->slug) }}" method="POST">
                        @csrf
                        <input type="text" name="reviewer_name" placeholder="Your Name" required>
                        <select name="rating" required>
                            <option value="5">★★★★★ (5/5 Excellent)</option>
                            <option value="4">★★★★☆ (4/5 Very Good)</option>
                            <option value="3">★★★☆☆ (3/5 Average)</option>
                        </select>
                        <input type="text" name="title" placeholder="Review Title (e.g. Refreshing & Effective!)">
                        <textarea name="body" rows="4" placeholder="How did this tea make you feel?" required></textarea>
                        <button type="submit" class="btn-shop-now" style="width: 100%; justify-content: center;">
                            Submit Verified Review
                        </button>
                    </form>
                </div>

                <div class="reviews-list">
                    @forelse($product->reviews as $rev)
                        <div class="review-item">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                                <strong style="color: var(--color-primary-dark);">{{ $rev->reviewer_name }}</strong>
                                <span class="stars">
                                    @for($i = 1; $i <= $rev->rating; $i++) <i class="fa-solid fa-star"></i> @endfor
                                </span>
                            </div>
                            @if($rev->title)
                                <h4 style="font-size: 0.98rem; color: #1E293B; margin-bottom: 4px;">{{ $rev->title }}</h4>
                            @endif
                            <p style="font-size: 0.9rem; color: #64748B;">{{ $rev->body }}</p>
                        </div>
                    @empty
                        <div class="review-item">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                                <strong style="color: var(--color-primary-dark);">Kavita Singhania</strong>
                                <span class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <h4 style="font-size: 0.98rem; color: #1E293B; margin-bottom: 4px;">Remarkable Taste & Energy</h4>
                            <p style="font-size: 0.9rem; color: #64748B;">
                                I switched from regular black coffee to this tea 3 weeks ago. The difference in my digestion and natural alertness is incredible. No jitters, just clean plant energy!
                            </p>
                        </div>
                        <div class="review-item">
                            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
                                <strong style="color: var(--color-primary-dark);">Dr. Rajiv Nambiar</strong>
                                <span class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <h4 style="font-size: 0.98rem; color: #1E293B; margin-bottom: 4px;">Genuine Ayurvedic Proportions</h4>
                            <p style="font-size: 0.9rem; color: #64748B;">
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
