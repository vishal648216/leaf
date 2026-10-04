@extends('layouts.app')

@section('title', 'Leaf N Dawn — Nature at its Brightest | Handcrafted Herbal Wellness Teas')

@section('styles')
<style>
    /* Hero Section Matching Exact Mockup */
    .hero-section {
        position: relative;
        background: linear-gradient(110deg, #F8FAF7 0%, #F3F8F4 50%, #E6F0E8 100%);
        padding: 50px 24px 70px;
        overflow: hidden;
        border-bottom: 1px solid var(--color-sage-border);
    }

    .hero-container {
        max-width: 1360px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.05fr 0.95fr;
        align-items: center;
        gap: 32px;
    }

    .hero-title {
        font-family: var(--font-heading), 'Inter', sans-serif;
        font-size: 4.2rem;
        font-weight: 900;
        color: #1A1A2E;
        line-height: 1.04;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        margin-bottom: 22px;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: #4A5568;
        line-height: 1.6;
        margin-bottom: 34px;
        max-width: 520px;
        font-weight: 400;
    }

    .hero-cta-group {
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 36px;
    }

    .btn-mockup-shop {
        background: #2A5A31;
        color: #FFFFFF;
        padding: 13px 34px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.98rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 6px 18px rgba(42, 90, 49, 0.25);
        transition: var(--transition);
        border: 2px solid #2A5A31;
    }

    .btn-mockup-shop:hover {
        background: #1E3F23;
        border-color: #1E3F23;
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(42, 90, 49, 0.35);
    }

    .btn-mockup-outline {
        background: transparent;
        color: #1A1A2E;
        padding: 13px 30px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.98rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 2px solid #1A1A2E;
        transition: var(--transition);
    }

    .btn-mockup-outline:hover {
        background: #1A1A2E;
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    /* Hero Visual with Floating Radiance Pouch */
    .hero-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-pouch-frame {
        position: relative;
        max-width: 520px;
        width: 100%;
        animation: floatPouch 5s ease-in-out infinite;
    }

    @keyframes floatPouch {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-12px) rotate(0.6deg); }
    }

    .hero-pouch-frame img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(42, 90, 49, 0.14);
    }

    /* Product Highlight Section Matching Mockup */
    .product-highlight-wrap {
        max-width: 1280px;
        margin: 70px auto 40px;
        padding: 0 24px;
    }

    .section-headline {
        text-align: center;
        font-family: var(--font-heading);
        font-size: 2.4rem;
        color: #1A1A2E;
        font-weight: 700;
        margin-bottom: 40px;
    }

    .highlight-cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    .highlight-card {
        border-radius: 28px;
        padding: 34px 28px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        min-height: 290px;
        box-shadow: 0 14px 34px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #FFFFFF;
        text-decoration: none;
    }

    .highlight-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.16);
    }

    /* Card 1: Aureva Green */
    .card-aureva {
        background: linear-gradient(145deg, #4F9359 0%, #367841 50%, #25582E 100%);
    }

    /* Card 2: Sugara Terracotta */
    .card-sugara {
        background: linear-gradient(145deg, #C56658 0%, #AC5043 50%, #8A3B30 100%);
    }

    /* Card 3: Masala Chai Burgundy */
    .card-masala {
        background: linear-gradient(145deg, #521D28 0%, #39111B 50%, #240A10 100%);
    }

    .hl-title {
        font-family: var(--font-heading);
        font-size: 2.1rem;
        font-weight: 800;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        line-height: 1.1;
    }

    .hl-tag {
        display: inline-block;
        background: rgba(255, 255, 255, 0.22);
        backdrop-filter: blur(8px);
        font-family: var(--font-accent);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 24px;
        width: fit-content;
    }

    /* Golden Seal in the middle matching mockup */
    .golden-seal {
        position: absolute;
        top: 50%;
        right: 28px;
        transform: translateY(-50%);
        width: 78px;
        height: 78px;
        border-radius: 50%;
        background: radial-gradient(circle, #FBE096 0%, #E8AC41 65%, #C2821E 100%);
        border: 2px dashed #FFF8E6;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #4A2E05;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.22);
        text-align: center;
        padding: 4px;
        z-index: 2;
    }

    .seal-number {
        font-size: 1.4rem;
        font-weight: 900;
        line-height: 1;
    }

    .seal-text {
        font-size: 0.58rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.1;
    }

    .hl-bottom-row {
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 24px;
    }

    .hl-price {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .btn-hl-shop {
        background: #FFFFFF;
        color: #1A1A2E;
        font-weight: 700;
        font-size: 0.90rem;
        padding: 9px 24px;
        border-radius: 30px;
        text-decoration: none;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-hl-shop:hover {
        transform: scale(1.05);
        background: #FFFDF9;
    }

    /* Why Choose Us Cards from Mockup */
    .why-section-wrap {
        max-width: 1280px;
        margin: 60px auto 80px;
        padding: 0 24px;
    }

    .why-choose-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .why-choose-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .why-choose-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: var(--color-primary);
    }

    .why-icon-wrap {
        width: 64px;
        height: 64px;
        margin: 0 auto 16px;
        border-radius: 50%;
        background: var(--color-sage);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--color-primary);
    }

    .why-choose-card h4 {
        font-family: var(--font-heading);
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        margin: 0 0 6px 0;
    }

    .section-headline {
        font-family: var(--font-heading);
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--color-primary-dark);
        text-align: center;
        margin-bottom: 36px;
    }

    /* Signature Blends Section & Global Cards */
    .section-wrap {
        max-width: 1320px;
        margin: 70px auto 90px;
        padding: 0 24px;
        box-sizing: border-box;
    }

    .section-header {
        text-align: center;
        max-width: 760px;
        margin: 0 auto 50px;
    }

    .section-tag {
        font-family: var(--font-accent);
        font-size: 0.80rem;
        font-weight: 700;
        color: var(--color-primary);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
        display: inline-block;
    }

    .section-title {
        font-family: var(--font-heading);
        font-size: 2.6rem;
        font-weight: 800;
        color: var(--color-primary-dark);
        line-height: 1.2;
        margin-bottom: 14px;
        text-align: center;
    }

    .section-desc {
        color: var(--color-slate);
        font-size: 1.05rem;
        line-height: 1.65;
        text-align: center;
        margin: 0 auto;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        max-width: 1280px;
        margin: 0 auto;
    }

    .product-card {
        background: #FFFFFF;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid var(--color-sage-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: transform 0.35s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.35s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(42, 90, 49, 0.14);
        border-color: var(--color-primary-light);
    }

    .card-top-tag {
        position: absolute;
        top: 14px;
        left: 14px;
        background: rgba(26, 26, 46, 0.90);
        backdrop-filter: blur(4px);
        color: #FFFFFF;
        font-family: var(--font-accent);
        font-size: 0.70rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 20px;
        z-index: 2;
        letter-spacing: 0.8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .card-discount-tag {
        position: absolute;
        top: 14px;
        right: 14px;
        background: var(--color-gold);
        color: #1A1A2E;
        font-family: var(--font-accent);
        font-size: 0.72rem;
        font-weight: 800;
        padding: 5px 12px;
        border-radius: 20px;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(245, 166, 35, 0.35);
    }

    .card-image-wrap {
        height: 310px;
        background: #F8FAF7;
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
        transform: scale(1.05);
    }

    .card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card-category {
        font-family: var(--font-accent);
        font-size: 0.74rem;
        color: var(--color-primary);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
    }

    .card-title {
        font-family: var(--font-heading);
        font-size: 1.35rem;
        color: var(--color-primary-dark);
        margin: 6px 0 8px;
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
        font-size: 0.88rem;
        color: var(--color-slate);
        margin-bottom: 16px;
        font-style: italic;
    }

    .card-herbs-pills {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .herb-pill {
        background: var(--color-sage);
        border: 1px solid var(--color-sage-border);
        color: var(--color-primary-dark);
        font-size: 0.74rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
    }

    .card-price-row {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px solid #F1F5F9;
        margin-bottom: 20px;
    }

    .price-current {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--color-primary-dark);
    }

    .price-mrp {
        font-size: 0.96rem;
        color: #94A3B8;
        text-decoration: line-through;
    }

    .price-per-cup {
        margin-left: auto;
        font-size: 0.78rem;
        color: #64748B;
        font-weight: 500;
    }

    .card-actions {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 12px;
    }

    .btn-card-cart {
        background: #FFFFFF;
        border: 1.5px solid var(--color-primary);
        color: var(--color-primary);
        padding: 11px;
        border-radius: 25px;
        font-size: 0.88rem;
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
        color: #1A1A2E;
        padding: 11px;
        border-radius: 25px;
        font-size: 0.88rem;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: var(--transition);
        box-shadow: 0 4px 12px rgba(245, 166, 35, 0.25);
    }

    .btn-card-buy:hover {
        box-shadow: 0 6px 16px rgba(245, 166, 35, 0.4);
        transform: translateY(-1px);
    }

    /* Comprehensive Mobile & Tablet Responsive */
    @media (max-width: 992px) {
        .hero-container { grid-template-columns: 1fr; text-align: center; gap: 40px; }
        .hero-subtitle { margin: 0 auto 28px; }
        .hero-cta-group { justify-content: center; }
        .hero-title { font-size: 3rem; }
        .highlight-cards-grid { grid-template-columns: 1fr; }
        .why-choose-grid { grid-template-columns: 1fr 1fr; }
        .products-grid { grid-template-columns: 1fr; max-width: 440px; margin: 0 auto; }
        .testimonial-grid { grid-template-columns: 1fr !important; }
    }

    @media (max-width: 640px) {
        .hero-section { padding: 30px 16px 50px; }
        .hero-title { font-size: 2.2rem; }
        .hero-subtitle { font-size: 0.98rem; margin-bottom: 24px; }
        .hero-cta-group { flex-direction: column; width: 100%; gap: 12px; }
        .btn-mockup-shop, .btn-mockup-outline { width: 100%; justify-content: center; }
        .why-choose-grid { grid-template-columns: 1fr; }
        .section-wrap { padding: 0 16px; margin: 50px auto 60px; }
        .section-title { font-size: 1.95rem; }
        .section-desc { font-size: 0.95rem; }
        .product-highlight-wrap { padding: 0 16px; }
        .highlight-card { padding: 26px 20px; }
        .hl-title { font-size: 1.7rem; }
    }
</style>
@endsection

@section('content')

    <!-- Hero Section (Matches Approved Mockup Exactly) -->
    <section class="hero-section" id="hero">
        <div class="hero-container">
            <div class="hero-text-content">
                <h1 class="hero-title">
                    NATURE AT ITS<br>BRIGHTEST
                </h1>
                <p class="hero-subtitle">
                    Premium Herbal Teas crafted with 17+ botanicals for your daily wellness ritual
                </p>
                <div class="hero-cta-group">
                    <a href="{{ route('products.index') }}" class="btn-mockup-shop" id="btn-hero-shop-now">
                        Shop Now
                    </a>
                    <a href="{{ route('products.index') }}" class="btn-mockup-outline" id="btn-hero-explore-products">
                        Explore Products
                    </a>
                </div>
                <div style="display: flex; gap: 24px; color: #4A5568; font-size: 0.88rem; font-weight: 600;">
                    <span><i class="fa-solid fa-leaf" style="color: var(--color-primary); margin-right: 6px;"></i> 100% Ayurvedic</span>
                    <span><i class="fa-solid fa-shield-halved" style="color: var(--color-primary); margin-right: 6px;"></i> ISO 22000:2018</span>
                    <span><i class="fa-solid fa-truck-fast" style="color: var(--color-primary); margin-right: 6px;"></i> Free Shipping > ₹499</span>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-pouch-frame">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Leaf N Dawn Premium Herbal Tea Floating Pouch with Golden Sunburst Radiance">
                </div>
            </div>
        </div>
    </section>

    <!-- Product Highlight Section (Matches Mockup 3-Card Layout) -->
    <section class="product-highlight-wrap" id="product-highlight">
        <h2 class="section-headline">Product Highlight</h2>

        <div class="highlight-cards-grid">
            <!-- 1. AUREVA Card -->
            <div class="highlight-card card-aureva">
                <h3 class="hl-title">AUREVA</h3>
                <span class="hl-tag">SLIMMING & DETOX</span>

                <div class="golden-seal">
                    <span class="seal-number">17</span>
                    <span class="seal-text">Premium<br>Herbs</span>
                </div>

                <div class="hl-bottom-row">
                    <span class="hl-price">₹549</span>
                    <a href="{{ route('products.show', 'aureva-slimming-detox') }}" class="btn-hl-shop">
                        Shop Now
                    </a>
                </div>
            </div>

            <!-- 2. SUGARA Card -->
            <div class="highlight-card card-sugara">
                <h3 class="hl-title">SUGARA</h3>
                <span class="hl-tag">BLOOD SUGAR MANAGEMENT</span>

                <div class="golden-seal">
                    <span class="seal-number">14</span>
                    <span class="seal-text">Premium<br>Herbs</span>
                </div>

                <div class="hl-bottom-row">
                    <span class="hl-price">₹599</span>
                    <a href="{{ route('products.show', 'sugara-blood-sugar-care') }}" class="btn-hl-shop">
                        Shop Now
                    </a>
                </div>
            </div>

            <!-- 3. MASALA CHAI Card -->
            <div class="highlight-card card-masala">
                <h3 class="hl-title">MASALA CHAI</h3>
                <span class="hl-tag">BOLD • RICH • AROMATIC</span>

                <div class="golden-seal">
                    <span class="seal-number">5</span>
                    <span class="seal-text">Premium<br>Spices</span>
                </div>

                <div class="hl-bottom-row">
                    <span class="hl-price">₹399</span>
                    <a href="{{ route('products.show', 'masala-chai-spice-blend') }}" class="btn-hl-shop">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section (Matches Mockup 4 Badges) -->
    <section class="why-section-wrap" id="why-choose-us">
        <h2 class="section-headline">Why Choose Us</h2>

        <div class="why-choose-grid">
            <div class="why-choose-card">
                <div class="why-icon-wrap"><i class="fa-solid fa-award"></i></div>
                <h4>HACCP Certified</h4>
                <p style="font-size: 0.82rem; color: #64748B; margin-top: 6px;">Highest Food Safety Standards</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon-wrap"><i class="fa-solid fa-shield-halved"></i></div>
                <h4>ISO 22000:2018</h4>
                <p style="font-size: 0.82rem; color: #64748B; margin-top: 6px;">Certified Quality Management</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon-wrap" style="color: #FF9933;"><i class="fa-solid fa-flag"></i></div>
                <h4>Made in India</h4>
                <p style="font-size: 0.82rem; color: #64748B; margin-top: 6px;">100% Ethically Sourced</p>
            </div>

            <div class="why-choose-card">
                <div class="why-icon-wrap" style="color: #2E7D32;"><i class="fa-solid fa-leaf"></i></div>
                <h4>100% Natural</h4>
                <p style="font-size: 0.82rem; color: #64748B; margin-top: 6px;">Zero Artificial Additives</p>
            </div>
        </div>
    </section>

    <!-- Detailed Products Grid -->
    <section class="section-wrap" id="featured-blends" style="padding-top: 20px;">
        <div class="section-header">
            <span class="section-tag">Signature Blends</span>
            <h2 class="section-title">Formulated for Your Daily Well-Being</h2>
            <p class="section-desc">Each blend is packed in eco-friendly pyramid bags to allow whole botanicals and spices to fully unfurl and infuse their active phyto-nutrients.</p>
        </div>

        <div class="products-grid">
            @foreach($featuredProducts as $prod)
                <div class="product-card" id="card-product-{{ $prod->id }}">
                    <span class="card-top-tag">
                        @if($prod->herb_count)
                            {{ $prod->herb_count }} POTENT HERBS
                        @else
                            AYURVEDIC
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
                                <span class="herb-pill">🌿 Oolong & Green Tea</span>
                                <span class="herb-pill">🍃 Peppermint & Moringa</span>
                                <span class="herb-pill">🌱 Tulsi & Ginger</span>
                            @elseif($prod->slug === 'sugara-blood-sugar-care')
                                <span class="herb-pill">🌿 Karela & Gudmar</span>
                                <span class="herb-pill">🍃 Jamun Seed & Cinnamon</span>
                                <span class="herb-pill">🌱 Fenugreek & Amla</span>
                            @else
                                <span class="herb-pill">☕ Assam CTC Tea</span>
                                <span class="herb-pill">🌿 Malabar Cardamom</span>
                                <span class="herb-pill">🌱 Sun-Dried Ginger</span>
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
                            <button class="btn-card-cart" onclick="quickAddToCart({{ $prod->id }})" id="btn-add-{{ $prod->id }}">
                                <i class="fa-solid fa-bag-shopping"></i> Add
                            </button>
                            <a href="{{ route('products.show', $prod->slug) }}" class="btn-card-buy" id="btn-view-{{ $prod->id }}">
                                <span>Buy Now</span> <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-wrap" id="testimonials" style="background: #FDFBF7; border-top: 1px solid var(--color-sage-border);">
        <div class="section-header">
            <span class="section-tag">Real Stories</span>
            <h2 class="section-title">Loved by Wellness Seekers</h2>
            <p class="section-desc">Hear how thousands of individuals have integrated Leaf N Dawn into their morning and evening self-care routines.</p>
        </div>

        <div class="testimonial-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px;">
            <div class="testimonial-card" style="background: #FFF; border: 1px solid var(--color-sage-border); border-radius: var(--radius-md); padding: 28px;">
                <div class="testimonial-stars" style="color: var(--color-gold); margin-bottom: 14px;">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p style="font-size: 0.94rem; color: #334155; font-style: italic; line-height: 1.6; margin-bottom: 20px;">"Aureva Detox has completely transformed my mornings! Within two weeks, the persistent bloating after meals disappeared. The mint and oolong combination is so crisp and soothing."</p>
                <div class="testimonial-author" style="display: flex; align-items: center; gap: 12px; border-top: 1px solid #F1F5F9; padding-top: 16px;">
                    <div class="author-avatar" style="width: 42px; height: 42px; border-radius: 50%; background: var(--color-primary); color: #FFF; display: flex; align-items: center; justify-content: center; font-weight: 700;">P</div>
                    <div>
                        <div class="author-name" style="font-weight: 700; color: var(--color-primary-dark);">Pooja Sharma</div>
                        <div class="author-loc" style="font-size: 0.78rem; color: #94A3B8;">Verified Buyer • Mumbai</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" style="background: #FFF; border: 1px solid var(--color-sage-border); border-radius: var(--radius-md); padding: 28px;">
                <div class="testimonial-stars" style="color: var(--color-gold); margin-bottom: 14px;">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p style="font-size: 0.94rem; color: #334155; font-style: italic; line-height: 1.6; margin-bottom: 20px;">"My father has been taking Sugara Tea twice daily for 2 months. His fasting sugar readings are noticeably more stable, and he loves the natural herbal taste without artificial sweetness."</p>
                <div class="testimonial-author" style="display: flex; align-items: center; gap: 12px; border-top: 1px solid #F1F5F9; padding-top: 16px;">
                    <div class="author-avatar" style="width: 42px; height: 42px; border-radius: 50%; background: var(--color-primary); color: #FFF; display: flex; align-items: center; justify-content: center; font-weight: 700;">R</div>
                    <div>
                        <div class="author-name" style="font-weight: 700; color: var(--color-primary-dark);">Rohit Mehra</div>
                        <div class="author-loc" style="font-size: 0.78rem; color: #94A3B8;">Verified Buyer • Bengaluru</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" style="background: #FFF; border: 1px solid var(--color-sage-border); border-radius: var(--radius-md); padding: 28px;">
                <div class="testimonial-stars" style="color: var(--color-gold); margin-bottom: 14px;">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p style="font-size: 0.94rem; color: #334155; font-style: italic; line-height: 1.6; margin-bottom: 20px;">"The Masala Chai is royal! Real cardamom and crushed ginger aromas hit you as soon as you open the pouch. It tastes like authentic winter chai prepared in aristocratic havelis."</p>
                <div class="testimonial-author" style="display: flex; align-items: center; gap: 12px; border-top: 1px solid #F1F5F9; padding-top: 16px;">
                    <div class="author-avatar" style="width: 42px; height: 42px; border-radius: 50%; background: var(--color-primary); color: #FFF; display: flex; align-items: center; justify-content: center; font-weight: 700;">A</div>
                    <div>
                        <div class="author-name" style="font-weight: 700; color: var(--color-primary-dark);">Ananya Sengupta</div>
                        <div class="author-loc" style="font-size: 0.78rem; color: #94A3B8;">Verified Buyer • New Delhi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
