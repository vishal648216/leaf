@extends('layouts.app')

@section('title', 'Leaf N Dawn — Nature at its Brightest | Luxury Herbal Teas & Ayurvedic Blends')
@section('meta_description', 'Experience the luxury of pure estate botanicals. Shop Leaf N Dawn handcrafted Ayurvedic teas, Aureva Detox, Sugara Blood Sugar Care, and Royal Masala Chai.')

@section('styles')
<style>
    /* Twinings India Exact Split Hero Banner */
    .twinings-hero-section {
        background: #FAF8F3;
        border-bottom: 1px solid var(--color-sage-border);
        overflow: hidden;
    }

    .twinings-hero-container {
        max-width: 1440px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.15fr;
        min-height: 540px;
        align-items: center;
    }

    .hero-text-pane {
        padding: 60px 48px 60px 36px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .hero-tag-accent {
        font-family: var(--font-accent);
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: #3B5838;
        text-transform: uppercase;
        margin-bottom: 14px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .hero-main-headline {
        font-family: var(--font-accent), sans-serif;
        font-size: 2.8rem;
        font-weight: 800;
        color: #3B5838;
        line-height: 1.15;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .hero-main-headline span {
        color: var(--color-gold-dark);
    }

    .hero-sub-text {
        font-size: 1.05rem;
        color: #555555;
        line-height: 1.6;
        margin-bottom: 28px;
        max-width: 480px;
    }

    .btn-twinings-hero {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: transparent;
        color: #000000;
        border: 1.5px solid #000000;
        padding: 12px 32px;
        border-radius: 4px;
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        text-decoration: none;
        width: fit-content;
        transition: var(--transition);
        margin-bottom: 30px;
    }

    .btn-twinings-hero:hover {
        background: #3B5838;
        border-color: #3B5838;
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    .hero-badges-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        padding-top: 20px;
        border-top: 1px solid rgba(0, 0, 0, 0.08);
        font-family: var(--font-accent);
        font-size: 0.78rem;
        font-weight: 600;
        color: #3B5838;
    }

    .hero-badges-row span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .hero-image-pane {
        position: relative;
        height: 100%;
        min-height: 480px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FAF8F3;
        padding: 24px;
    }

    .hero-composite-grid {
        position: relative;
        width: 100%;
        max-width: 620px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-main-pouch {
        width: 100%;
        max-height: 460px;
        object-fit: contain;
        border-radius: 16px;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
        animation: floatPouch 6s ease-in-out infinite;
    }

    @keyframes floatPouch {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
    }

    /* 2. "Explore Our Finest Tea Blends!" (Twinings 5 Pastel Pill Category Section) */
    .explore-blends-section {
        background: #FAF8F3;
        padding: 70px 24px 80px;
    }

    .section-twinings-header {
        text-align: center;
        max-width: 780px;
        margin: 0 auto 50px;
    }

    .section-twinings-title {
        font-family: var(--font-accent), sans-serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #3B5838;
        margin-bottom: 12px;
        letter-spacing: -0.3px;
    }

    .section-twinings-desc {
        color: #555555;
        font-size: 0.98rem;
        line-height: 1.6;
    }

    .pastel-pills-carousel {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
        max-width: 1360px;
        margin: 0 auto;
    }

    .pastel-pill-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .pastel-pill-container:hover {
        transform: translateY(-8px);
    }

    .pill-capsule-box {
        width: 100%;
        height: 250px;
        border-radius: 28px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        position: relative;
        padding: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
        transition: box-shadow 0.3s ease;
    }

    .pastel-pill-container:hover .pill-capsule-box {
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.10);
    }

    .pill-green { background: #D7E7DD; }
    .pill-peach { background: #F8D8D8; }
    .pill-lavender { background: #E3EAF5; }
    .pill-cream { background: #F8F0E2; }
    .pill-mauve { background: #F5E3F3; }

    .pill-pack-img {
        position: absolute;
        top: -24px;
        width: 82%;
        max-height: 200px;
        object-fit: contain;
        filter: drop-shadow(0 10px 16px rgba(0, 0, 0, 0.15));
        transition: transform 0.3s ease;
    }

    .pastel-pill-container:hover .pill-pack-img {
        transform: scale(1.08) translateY(-4px);
    }

    .pill-label-title {
        font-family: var(--font-accent), sans-serif;
        font-size: 1.02rem;
        font-weight: 700;
        color: #000000;
        margin-top: 16px;
        text-align: center;
        letter-spacing: 0.2px;
    }

    .pill-badge-tag {
        font-size: 0.72rem;
        color: #3B5838;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 2px;
    }

    /* 3. "The Most Loved" (Twinings Exact Bestseller Grid) */
    .most-loved-section {
        background: #FFFFFF;
        padding: 80px 24px;
        border-top: 1px solid var(--color-sage-border);
        border-bottom: 1px solid var(--color-sage-border);
    }

    .most-loved-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        max-width: 1360px;
        margin: 0 auto 48px;
    }

    .twinings-product-card {
        background: #FAF8F3;
        border: 1px solid var(--color-sage-border);
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .twinings-product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.08);
        border-color: #3B5838;
    }

    .card-photo-box {
        position: relative;
        height: 310px;
        background: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        overflow: hidden;
    }

    .card-photo-box img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    .twinings-product-card:hover .card-photo-box img {
        transform: scale(1.06);
    }

    .card-content-pane {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card-stars-row {
        display: flex;
        align-items: center;
        gap: 4px;
        color: var(--color-gold);
        font-size: 0.85rem;
        margin-bottom: 6px;
    }

    .card-stars-row span {
        color: #64748B;
        font-size: 0.78rem;
        font-weight: 600;
        margin-left: 4px;
    }

    .card-product-heading {
        font-family: var(--font-accent), sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 6px;
        line-height: 1.3;
    }

    .card-product-heading a {
        text-decoration: none;
        color: inherit;
        transition: color 0.2s;
    }

    .card-product-heading a:hover {
        color: #3B5838;
    }

    .card-product-desc {
        font-size: 0.86rem;
        color: #555555;
        line-height: 1.5;
        margin-bottom: 16px;
    }

    .card-price-container {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #EAE6DD;
        margin-bottom: 18px;
    }

    .price-value-main {
        font-size: 1.4rem;
        font-weight: 800;
        color: #000000;
    }

    .price-mrp-strike {
        font-size: 0.90rem;
        color: #94A3B8;
        text-decoration: line-through;
    }

    .card-button-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .btn-twinings-add {
        background: #FFFFFF;
        border: 1.5px solid #000000;
        color: #000000;
        padding: 10px;
        border-radius: 4px;
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: var(--transition);
    }

    .btn-twinings-add:hover {
        background: #000000;
        color: #FFFFFF;
    }

    .btn-twinings-buy {
        background: #3B5838;
        border: 1.5px solid #3B5838;
        color: #FFFFFF;
        padding: 10px;
        border-radius: 4px;
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: var(--transition);
    }

    .btn-twinings-buy:hover {
        background: #1E3A20;
        border-color: #1E3A20;
    }

    .browse-all-btn-wrap {
        text-align: center;
    }

    .btn-twinings-browse-all {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: transparent;
        color: #000000;
        border: 1.5px solid #000000;
        padding: 12px 36px;
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-twinings-browse-all:hover {
        background: #000000;
        color: #FFFFFF;
    }

    /* 4. Brand Master Blender & Stories Carousel ("Watch, Choose & Buy Now!") */
    .watch-choose-section {
        background: #FAF8F3;
        padding: 80px 24px;
    }

    .video-cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        max-width: 1360px;
        margin: 0 auto;
    }

    .video-portrait-card {
        background: #FFFFFF;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--color-sage-border);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        display: flex;
        flex-direction: column;
        position: relative;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .video-portrait-card:hover {
        transform: translateY(-6px);
    }

    .video-thumb-frame {
        position: relative;
        height: 280px;
        background: #1E3A20;
        overflow: hidden;
    }

    .video-thumb-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.90);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #3B5838;
        font-size: 1.2rem;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
    }

    .video-card-body {
        padding: 20px;
    }

    .video-card-title {
        font-family: var(--font-accent);
        font-size: 1rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 6px;
    }

    .video-card-subtitle {
        font-size: 0.82rem;
        color: #64748B;
    }

    /* 5. The Exclusive Gifting Collection */
    .gifting-section {
        background: #FFFFFF;
        padding: 80px 24px;
        border-top: 1px solid var(--color-sage-border);
    }

    .gifting-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        max-width: 1360px;
        margin: 0 auto;
    }

    .gifting-card {
        background: #FAF8F3;
        border: 1px solid var(--color-sage-border);
        border-radius: 16px;
        padding: 30px;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s ease;
    }

    .gifting-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.06);
    }

    .gifting-card img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        margin-bottom: 20px;
    }

    .gifting-card h3 {
        font-family: var(--font-accent);
        font-size: 1.2rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 8px;
    }

    .gifting-card p {
        font-size: 0.88rem;
        color: #555555;
        line-height: 1.5;
        margin-bottom: 16px;
    }

    .gifting-link-cta {
        margin-top: auto;
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #3B5838;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .pastel-pills-carousel { grid-template-columns: repeat(3, 1fr); }
        .video-cards-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 992px) {
        .twinings-hero-container { grid-template-columns: 1fr; }
        .hero-text-pane { padding: 40px 20px; text-align: center; }
        .hero-sub-text { margin: 0 auto 24px; }
        .btn-twinings-hero { margin: 0 auto 24px; }
        .hero-badges-row { justify-content: center; }
        .pastel-pills-carousel { grid-template-columns: repeat(2, 1fr); }
        .most-loved-grid { grid-template-columns: 1fr; max-width: 440px; margin: 0 auto 40px; }
        .gifting-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
        .hero-main-headline { font-size: 2rem; }
        .pastel-pills-carousel { grid-template-columns: 1fr; }
        .video-cards-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

    <!-- 1. Twinings India Exact Split Hero Banner -->
    <section class="twinings-hero-section" id="hero-banner">
        <div class="twinings-hero-container">
            <div class="hero-text-pane">
                <span class="hero-tag-accent">✦ Sourced with Care ✦</span>
                <h1 class="hero-main-headline">
                    THE GREEN GOODNESS, <span>EVERYDAY.</span>
                </h1>
                <p class="hero-sub-text">
                    A refreshing antioxidant & Ayurvedic vitality boost formulated with pure whole-leaf botanicals harvested from pristine mountain gardens.
                </p>
                <a href="{{ route('products.index') }}" class="btn-twinings-hero" id="btn-hero-shop-all">
                    <span>Shop All Blends</span> <i class="fa-solid fa-arrow-right"></i>
                </a>

                <div class="hero-badges-row">
                    <span><i class="fa-solid fa-seedling"></i> 100% Ayurvedic</span>
                    <span><i class="fa-solid fa-award"></i> ISO 22000 & HACCP</span>
                    <span><i class="fa-solid fa-truck-fast"></i> Free Shipping > ₹499</span>
                </div>
            </div>

            <div class="hero-image-pane">
                <div class="hero-composite-grid">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Leaf N Dawn Ayurvedic Herbal Teas" class="hero-main-pouch">
                </div>
            </div>
        </div>
    </section>

    <!-- 2. "Explore Our Finest Tea Blends!" (Twinings Exact 5 Pastel Pill Cards) -->
    <section class="explore-blends-section" id="explore-finest-blends">
        <div class="section-twinings-header">
            <h2 class="section-twinings-title">Explore Our Finest Tea Blends!</h2>
            <p class="section-twinings-desc">
                Discover a world of taste with our expertly crafted teas. From daily vitality infusions to royal spiced haveli chai, there's a blend for every wellness mood.
            </p>
        </div>

        <div class="pastel-pills-carousel">
            <!-- 1. Green Teas (Mint Pastel) -->
            <a href="{{ route('products.show', 'aureva-slimming-detox') }}" class="pastel-pill-container">
                <div class="pill-capsule-box pill-green">
                    <img src="{{ asset('assets/images/mockup_product.jpg') }}" alt="Green & Detox Teas" class="pill-pack-img">
                </div>
                <h4 class="pill-label-title">Green & Detox Teas</h4>
                <span class="pill-badge-tag">Aureva & Oolong</span>
            </a>

            <!-- 2. Sugar Care (Peach Pastel) -->
            <a href="{{ route('products.show', 'sugara-blood-sugar-care') }}" class="pastel-pill-container">
                <div class="pill-capsule-box pill-peach">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Sugar Care Teas" class="pill-pack-img">
                </div>
                <h4 class="pill-label-title">Sugar Care Teas</h4>
                <span class="pill-badge-tag">Sugara Glycemic</span>
            </a>

            <!-- 3. Herbal Infusions (Lavender Pastel) -->
            <a href="{{ route('products.index', ['category' => 'wellness-health']) }}" class="pastel-pill-container">
                <div class="pill-capsule-box pill-lavender">
                    <img src="{{ asset('assets/images/mockup_product.jpg') }}" alt="Herbal Infusions" class="pill-pack-img">
                </div>
                <h4 class="pill-label-title">Herbal Infusions</h4>
                <span class="pill-badge-tag">Tulsi & Chamomile</span>
            </a>

            <!-- 4. Assam Spiced Chai (Warm Cream Pastel) -->
            <a href="{{ route('products.show', 'masala-chai-spice-blend') }}" class="pastel-pill-container">
                <div class="pill-capsule-box pill-cream">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Royal Spiced Chai" class="pill-pack-img">
                </div>
                <h4 class="pill-label-title">Royal Spiced Chai</h4>
                <span class="pill-badge-tag">Assam CTC & Cardamom</span>
            </a>

            <!-- 5. Curated Gifting (Mauve Pastel) -->
            <a href="{{ route('products.index') }}" class="pastel-pill-container">
                <div class="pill-capsule-box pill-mauve">
                    <img src="{{ asset('assets/images/mockup_product.jpg') }}" alt="Curated Gifting" class="pill-pack-img">
                </div>
                <h4 class="pill-label-title">Curated Gifting</h4>
                <span class="pill-badge-tag">Tea Chests & Hampers</span>
            </a>
        </div>
    </section>

    <!-- 3. "The Most Loved" (Twinings Exact Bestseller Cards Grid) -->
    <section class="most-loved-section" id="the-most-loved">
        <div class="section-twinings-header">
            <h2 class="section-twinings-title">The Most Loved</h2>
            <p class="section-twinings-desc">
                Sip the blends that have captured hearts across India. Loved for their therapeutic purity, cherished for their taste.
            </p>
        </div>

        <div class="most-loved-grid">
            @foreach($featuredProducts as $prod)
                <div class="twinings-product-card" id="most-loved-{{ $prod->id }}">
                    <a href="{{ route('products.show', $prod->slug) }}" class="card-photo-box">
                        <img src="{{ asset($prod->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $prod->name }}">
                    </a>

                    <div class="card-content-pane">
                        <div class="card-stars-row">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <span>{{ number_format($prod->avg_rating, 1) }} ({{ $prod->total_reviews ?: 140 }}+)</span>
                        </div>

                        <h3 class="card-product-heading">
                            <a href="{{ route('products.show', $prod->slug) }}">{{ $prod->name }}</a>
                        </h3>
                        <p class="card-product-desc">{{ $prod->short_description ?: $prod->tagline }}</p>

                        <div class="card-price-container">
                            <span class="price-value-main">₹{{ number_format($prod->price, 0) }}</span>
                            @if($prod->mrp)
                                <span class="price-mrp-strike">₹{{ number_format($prod->mrp, 0) }}</span>
                            @endif
                        </div>

                        <div class="card-button-row">
                            <button type="button" class="btn-twinings-add" onclick="quickAddToCart({{ $prod->id }})" id="btn-quick-add-{{ $prod->id }}">
                                <i class="fa-solid fa-bag-shopping"></i> Add
                            </button>
                            <a href="{{ route('products.show', $prod->slug) }}" class="btn-twinings-buy" id="btn-view-{{ $prod->id }}">
                                <span>Buy Now</span> <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="browse-all-btn-wrap">
            <a href="{{ route('products.index') }}" class="btn-twinings-browse-all">
                <span>Browse All Teas</span> <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- 4. "Watch, Choose & Buy Now!" (Stephen Twining / Master Blender Video Cards) -->
    <section class="watch-choose-section" id="watch-choose-buy">
        <div class="section-twinings-header">
            <h2 class="section-twinings-title">Watch, Choose & Experience!</h2>
            <p class="section-twinings-desc">
                See the blends, feel the flavours, find your perfect cup. Experience tea shopping made simple, seamless, and satisfying.
            </p>
        </div>

        <div class="video-cards-grid">
            <a href="{{ route('about') }}" class="video-portrait-card">
                <div class="video-thumb-frame">
                    <img src="{{ asset('assets/images/tea_estate_heritage.jpg') }}" alt="Art of Ayurvedic Blending">
                    <div class="video-play-btn"><i class="fa-solid fa-play"></i></div>
                </div>
                <div class="video-card-body">
                    <h4 class="video-card-title">The Art of Botanical Mastery</h4>
                    <p class="video-card-subtitle">Master Blender Story • 2 Mins</p>
                </div>
            </a>

            <a href="{{ route('products.show', 'aureva-slimming-detox') }}" class="video-portrait-card">
                <div class="video-thumb-frame">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Aureva Detox Morning Ritual">
                    <div class="video-play-btn"><i class="fa-solid fa-play"></i></div>
                </div>
                <div class="video-card-body">
                    <h4 class="video-card-title">Morning Detox Infusion Ritual</h4>
                    <p class="video-card-subtitle">Aureva Herbal Cleansing • 1.5 Mins</p>
                </div>
            </a>

            <a href="{{ route('products.show', 'sugara-blood-sugar-care') }}" class="video-portrait-card">
                <div class="video-thumb-frame">
                    <img src="{{ asset('assets/images/mockup_product.jpg') }}" alt="Sugara Post Meal Balance">
                    <div class="video-play-btn"><i class="fa-solid fa-play"></i></div>
                </div>
                <div class="video-card-body">
                    <h4 class="video-card-title">Post-Meal Glycemic Balance</h4>
                    <p class="video-card-subtitle">Sugara Herbal Science • 2 Mins</p>
                </div>
            </a>

            <a href="{{ route('products.show', 'masala-chai-spice-blend') }}" class="video-portrait-card">
                <div class="video-thumb-frame">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Brewing Royal Masala Chai">
                    <div class="video-play-btn"><i class="fa-solid fa-play"></i></div>
                </div>
                <div class="video-card-body">
                    <h4 class="video-card-title">Brewing Authentic Masala Chai</h4>
                    <p class="video-card-subtitle">Malabar Cardamom & Assam CTC • 2.5 Mins</p>
                </div>
            </a>
        </div>
    </section>

    <!-- 5. The Exclusive Gifting Collection (Twinings Illustrated Cards) -->
    <section class="gifting-section" id="exclusive-gifting">
        <div class="section-twinings-header">
            <h2 class="section-twinings-title">The Exclusive Gifting Collection</h2>
            <p class="section-twinings-desc">
                Elevate celebrations with handcrafted wooden tea chests, assorted samplers, and festive wellness hampers.
            </p>
        </div>

        <div class="gifting-grid">
            <a href="{{ route('products.index') }}" class="gifting-card">
                <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="The Feel Good Collection">
                <h3>The Feel-Good Collection</h3>
                <p>An invigorating trio of metabolic slimming, digestive, and calming herbal infusions.</p>
                <span class="gifting-link-cta">Discover Gifting &rarr;</span>
            </a>

            <a href="{{ route('products.index') }}" class="gifting-card">
                <img src="{{ asset('assets/images/mockup_product.jpg') }}" alt="The Explorers Collection">
                <h3>The Ayurvedic Explorer Box</h3>
                <p>Explore 6 single-estate botanical blends packed in biodegradable pyramid pouches.</p>
                <span class="gifting-link-cta">Discover Gifting &rarr;</span>
            </a>

            <a href="{{ route('products.index') }}" class="gifting-card">
                <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="The Imperial Chai Chest">
                <h3>The Imperial Chai Chest</h3>
                <p>Vintage wooden tea chest containing whole Malabar spices and premium Assam leaf tea.</p>
                <span class="gifting-link-cta">Discover Gifting &rarr;</span>
            </a>
        </div>
    </section>

@endsection
