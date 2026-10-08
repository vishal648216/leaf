@extends('layouts.app')

@section('title', 'Leaf N Dawn — Nature at its Brightest | Luxury Herbal Teas & Ayurvedic Blends')
@section('meta_description', 'Experience the luxury of pure estate botanicals. Shop Leaf N Dawn handcrafted Ayurvedic teas, Aureva Detox, Sugara Blood Sugar Care, and Royal Masala Chai.')

@section('styles')
<style>
    /* Twinings-Style Hero Campaign Section */
    .hero-campaign {
        position: relative;
        background: linear-gradient(135deg, #FAF8F3 0%, #F5F1E8 50%, #EBF2E8 100%);
        padding: 60px 24px 80px;
        overflow: hidden;
        border-bottom: 1px solid var(--color-sage-border);
    }

    .hero-container {
        max-width: 1360px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        align-items: center;
        gap: 40px;
    }

    .hero-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FFFFFF;
        border: 1px solid var(--color-gold);
        padding: 6px 16px;
        border-radius: var(--radius-pill);
        font-family: var(--font-accent);
        font-size: 0.76rem;
        font-weight: 700;
        color: var(--color-gold-dark);
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        box-shadow: var(--shadow-sm);
    }

    .hero-title {
        font-family: var(--font-heading);
        font-size: 3.8rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        line-height: 1.1;
        letter-spacing: -0.5px;
        margin-bottom: 20px;
    }

    .hero-title span {
        color: var(--color-gold-dark);
        font-style: italic;
        font-weight: 400;
    }

    .hero-subtitle {
        font-size: 1.12rem;
        color: var(--color-slate);
        line-height: 1.7;
        margin-bottom: 34px;
        max-width: 540px;
    }

    .hero-cta-group {
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 36px;
    }

    .hero-trust-bar {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
        padding-top: 24px;
        border-top: 1px solid rgba(30, 58, 32, 0.12);
        color: var(--color-primary-dark);
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .hero-trust-bar span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .hero-trust-bar i {
        color: var(--color-gold);
        font-size: 0.95rem;
    }

    .hero-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-pouch-frame {
        position: relative;
        max-width: 500px;
        width: 100%;
        animation: floatHero 6s ease-in-out infinite;
    }

    @keyframes floatHero {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(0.5deg); }
    }

    .hero-pouch-frame img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: var(--radius-lg);
        box-shadow: 0 24px 50px rgba(30, 58, 32, 0.15);
    }

    /* Floating Crest Badge */
    .hero-crest-badge {
        position: absolute;
        top: 20px;
        right: -15px;
        background: #FFFFFF;
        border: 2px solid var(--color-gold);
        border-radius: 50%;
        width: 90px;
        height: 90px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: var(--shadow-md);
        padding: 6px;
        z-index: 2;
    }

    .hero-crest-badge .crest-num {
        font-family: var(--font-heading);
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--color-gold-dark);
        line-height: 1;
    }

    .hero-crest-badge .crest-txt {
        font-family: var(--font-accent);
        font-size: 0.58rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* 2. "Explore Our Finest Blends" Pastel Pill Collection Carousel */
    .collections-section {
        padding: 80px 24px 60px;
        max-width: 1360px;
        margin: 0 auto;
    }

    .pastel-cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    .pastel-card {
        border-radius: var(--radius-lg);
        padding: 32px 28px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 320px;
        text-decoration: none;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .pastel-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }

    .card-pastel-sage {
        background: linear-gradient(145deg, #EEF5EC 0%, #DFECDC 100%);
        border-left: 5px solid #367841;
    }

    .card-pastel-terracotta {
        background: linear-gradient(145deg, #FAF0EE 0%, #F5E2DE 100%);
        border-left: 5px solid #AC5043;
    }

    .card-pastel-ochre {
        background: linear-gradient(145deg, #FAF4E6 0%, #F5EACC 100%);
        border-left: 5px solid #C89B3C;
    }

    .pastel-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .pastel-category-tag {
        font-family: var(--font-accent);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--color-primary-dark);
        background: rgba(255, 255, 255, 0.7);
        padding: 4px 12px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 12px;
    }

    .pastel-card-title {
        font-family: var(--font-heading);
        font-size: 2rem;
        font-weight: 800;
        color: var(--color-primary-dark);
        line-height: 1.15;
        margin-bottom: 8px;
    }

    .pastel-card-desc {
        font-size: 0.88rem;
        color: #4A5568;
        line-height: 1.5;
        max-width: 260px;
    }

    .pastel-card-seal {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background: #FFFFFF;
        border: 1.5px solid var(--color-gold);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-sm);
        text-align: center;
        flex-shrink: 0;
    }

    .pastel-card-seal .seal-qty {
        font-family: var(--font-heading);
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--color-gold-dark);
        line-height: 1;
    }

    .pastel-card-seal .seal-lbl {
        font-family: var(--font-accent);
        font-size: 0.52rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        text-transform: uppercase;
    }

    .pastel-card-bottom {
        margin-top: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 18px;
        border-top: 1px solid rgba(0, 0, 0, 0.06);
    }

    .pastel-price-tag {
        font-family: var(--font-body);
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--color-primary-dark);
    }

    .btn-pastel-explore {
        background: #FFFFFF;
        color: var(--color-primary-dark);
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        padding: 9px 20px;
        border-radius: var(--radius-pill);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .pastel-card:hover .btn-pastel-explore {
        background: var(--color-primary-dark);
        color: #FFFFFF;
    }

    /* 3. "The Most Loved" (Elevated Product Grid) */
    .bestsellers-section {
        background: #FFFFFF;
        padding: 85px 24px 95px;
        border-top: 1px solid var(--color-sage-border);
        border-bottom: 1px solid var(--color-sage-border);
    }

    .bestsellers-container {
        max-width: 1360px;
        margin: 0 auto;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
    }

    .product-card {
        background: var(--color-cream);
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
        background: #FFFFFF;
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
        background: #FFFFFF;
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

    /* 4. Master Blender / Heritage Story Section (Stephen Twining Style) */
    .master-blender-section {
        background: linear-gradient(135deg, #122414 0%, #1E3A20 100%);
        color: #FAF8F3;
        padding: 90px 24px;
        position: relative;
        overflow: hidden;
    }

    .master-blender-container {
        max-width: 1360px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 0.95fr 1.05fr;
        align-items: center;
        gap: 50px;
    }

    .blender-image-box {
        position: relative;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.4);
        border: 2px solid rgba(200, 155, 60, 0.35);
    }

    .blender-image-box img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.6s ease;
    }

    .blender-image-box:hover img {
        transform: scale(1.03);
    }

    .blender-text-content {
        padding: 20px 0;
    }

    .blender-quote {
        font-family: var(--font-heading);
        font-size: 2.2rem;
        line-height: 1.3;
        color: #FFFFFF;
        margin-bottom: 20px;
        letter-spacing: -0.2px;
    }

    .blender-quote span {
        color: var(--color-gold-light);
        font-style: italic;
    }

    .blender-desc {
        color: #CBD7CE;
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .blender-features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 34px;
    }

    .blender-feature-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }

    .feature-icon-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(200, 155, 60, 0.2);
        border: 1px solid var(--color-gold);
        color: var(--color-gold-light);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 0.95rem;
    }

    .feature-text-block h5 {
        font-family: var(--font-heading);
        font-size: 1rem;
        color: #FFFFFF;
        margin-bottom: 3px;
    }

    .feature-text-block p {
        font-size: 0.82rem;
        color: #9EAEA0;
        line-height: 1.4;
    }

    /* 5. Interactive Tea Rituals & Brewing Guide Infographic */
    .brewing-rituals-section {
        padding: 85px 24px;
        background: #FAF8F3;
    }

    .brewing-cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        max-width: 1360px;
        margin: 0 auto;
    }

    .brewing-step-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 30px 22px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        position: relative;
    }

    .brewing-step-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
        border-color: var(--color-gold);
    }

    .step-number-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--color-cream);
        color: var(--color-gold-dark);
        font-family: var(--font-accent);
        font-size: 0.72rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--color-sage-border);
    }

    .brewing-icon {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background: var(--color-sage);
        color: var(--color-primary);
        font-size: 1.8rem;
        margin: 10px auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .brewing-step-card:hover .brewing-icon {
        background: var(--color-primary);
        color: #FFFFFF;
        transform: rotate(10deg);
    }

    .brewing-step-card h4 {
        font-family: var(--font-heading);
        font-size: 1.15rem;
        color: var(--color-primary-dark);
        margin-bottom: 6px;
    }

    .brewing-step-card p {
        font-size: 0.84rem;
        color: var(--color-slate);
        line-height: 1.5;
    }

    /* 6. FAQ Accordion Section */
    .faq-section {
        background: #FFFFFF;
        padding: 85px 24px;
        border-top: 1px solid var(--color-sage-border);
    }

    .faq-container {
        max-width: 860px;
        margin: 0 auto;
    }

    .faq-item {
        border-bottom: 1px solid var(--color-sage-border);
        padding: 20px 0;
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        font-family: var(--font-heading);
        font-size: 1.2rem;
        color: var(--color-primary-dark);
        font-weight: 700;
    }

    .faq-question i {
        color: var(--color-gold-dark);
        font-size: 0.95rem;
        transition: transform 0.3s ease;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
        color: var(--color-slate);
        font-size: 0.94rem;
        line-height: 1.7;
    }

    .faq-item.active .faq-answer {
        max-height: 250px;
        margin-top: 12px;
    }

    /* Responsive Queries */
    @media (max-width: 992px) {
        .hero-container { grid-template-columns: 1fr; text-align: center; gap: 40px; }
        .hero-subtitle { margin: 0 auto 28px; }
        .hero-cta-group { justify-content: center; }
        .hero-trust-bar { justify-content: center; }
        .hero-title { font-size: 2.9rem; }
        .pastel-cards-grid { grid-template-columns: 1fr; }
        .products-grid { grid-template-columns: 1fr; max-width: 440px; margin: 0 auto; }
        .master-blender-container { grid-template-columns: 1fr; }
        .brewing-cards-grid { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 640px) {
        .hero-campaign { padding: 40px 16px 50px; }
        .hero-title { font-size: 2.2rem; }
        .hero-subtitle { font-size: 0.96rem; margin-bottom: 24px; }
        .hero-cta-group { flex-direction: column; width: 100%; gap: 12px; }
        .btn-gold, .btn-outline-heritage { width: 100%; justify-content: center; }
        .brewing-cards-grid { grid-template-columns: 1fr; }
        .blender-quote { font-size: 1.7rem; }
        .blender-features-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

    <!-- 1. Hero Campaign Section (Twinings India Luxury Heritage) -->
    <section class="hero-campaign" id="hero-campaign">
        <div class="hero-container">
            <div class="hero-text-content">
                <div class="hero-badge-pill">
                    <span>✦</span> Sourced with Care • Himalayan Estate Botanicals
                </div>
                <h1 class="hero-title">
                    Crafted for Your <span>Elevated</span> Tea Ritual
                </h1>
                <p class="hero-subtitle">
                    Immerse yourself in pure whole-leaf botanical infusions formulated with 5,000-year-old Ayurvedic wisdom. Unfurl vitality, digestion, and tranquility in every cup.
                </p>
                <div class="hero-cta-group">
                    <a href="{{ route('products.index') }}" class="btn-gold" id="btn-hero-explore-blends">
                        <span>Explore Our Blends</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('about') }}" class="btn-outline-heritage" id="btn-hero-our-story">
                        <span>Our Heritage Story</span>
                    </a>
                </div>
                <div class="hero-trust-bar">
                    <span><i class="fa-solid fa-seedling"></i> 100% Ayurvedic Formula</span>
                    <span><i class="fa-solid fa-award"></i> ISO 22000 & HACCP</span>
                    <span><i class="fa-solid fa-truck-fast"></i> Free Express Shipping > ₹499</span>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-pouch-frame">
                    <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Leaf N Dawn Luxury Herbal Teas Collection">
                </div>
                <div class="hero-crest-badge">
                    <span class="crest-num">100%</span>
                    <span class="crest-txt">Pure<br>Botanicals</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. "Explore Our Finest Tea Blends!" Pastel Pill Collection Cards -->
    <section class="collections-section" id="collections-pills">
        <div class="section-header">
            <span class="section-tag">Curated Collections</span>
            <h2 class="section-title">Explore Our Finest Tea Blends</h2>
            <p class="section-desc">From metabolic slimming teas to pure spiced Assam haveli chai, discover the purposeful blend crafted specifically for your wellness rhythm.</p>
        </div>

        <div class="pastel-cards-grid">
            <!-- Card 1: Aureva Sage -->
            <a href="{{ route('products.show', 'aureva-slimming-detox') }}" class="pastel-card card-pastel-sage">
                <div class="pastel-card-top">
                    <div>
                        <span class="pastel-category-tag">Slimming & Detox</span>
                        <h3 class="pastel-card-title">AUREVA</h3>
                        <p class="pastel-card-desc">Oolong, Moringa, Peppermint & Lemongrass for natural metabolism cleansing.</p>
                    </div>
                    <div class="pastel-card-seal">
                        <span class="seal-qty">17</span>
                        <span class="seal-lbl">Herbs</span>
                    </div>
                </div>
                <div class="pastel-card-bottom">
                    <span class="pastel-price-tag">₹549</span>
                    <span class="btn-pastel-explore">
                        Shop Blend <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- Card 2: Sugara Terracotta -->
            <a href="{{ route('products.show', 'sugara-blood-sugar-care') }}" class="pastel-card card-pastel-terracotta">
                <div class="pastel-card-top">
                    <div>
                        <span class="pastel-category-tag">Glycemic Wellness</span>
                        <h3 class="pastel-card-title">SUGARA</h3>
                        <p class="pastel-card-desc">Karela, Jamun, Gudmar & Cinnamon to support balanced glucose vitality.</p>
                    </div>
                    <div class="pastel-card-seal">
                        <span class="seal-qty">14</span>
                        <span class="seal-lbl">Herbs</span>
                    </div>
                </div>
                <div class="pastel-card-bottom">
                    <span class="pastel-price-tag">₹599</span>
                    <span class="btn-pastel-explore">
                        Shop Blend <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </a>

            <!-- Card 3: Masala Chai Ochre -->
            <a href="{{ route('products.show', 'masala-chai-spice-blend') }}" class="pastel-card card-pastel-ochre">
                <div class="pastel-card-top">
                    <div>
                        <span class="pastel-category-tag">Royal Spice Reserve</span>
                        <h3 class="pastel-card-title">MASALA CHAI</h3>
                        <p class="pastel-card-desc">Assam CTC infused with Malabar Cardamom, Ginger, Clove & Cinnamon.</p>
                    </div>
                    <div class="pastel-card-seal">
                        <span class="seal-qty">5</span>
                        <span class="seal-lbl">Spices</span>
                    </div>
                </div>
                <div class="pastel-card-bottom">
                    <span class="pastel-price-tag">₹399</span>
                    <span class="btn-pastel-explore">
                        Shop Blend <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </a>
        </div>
    </section>

    <!-- 3. "The Most Loved" (Elevated Product Grid with Quick Add) -->
    <section class="bestsellers-section" id="the-most-loved">
        <div class="bestsellers-container">
            <div class="section-header">
                <span class="section-tag">The Most Loved</span>
                <h2 class="section-title">Signature Formulations</h2>
                <p class="section-desc">Each pyramid tea bag allows whole botanicals and crushed aromatic spices to gently unfurl and infuse active phyto-nutrients into your water.</p>
            </div>

            <div class="products-grid">
                @foreach($featuredProducts as $prod)
                    <div class="product-card" id="card-product-{{ $prod->id }}">
                        <span class="card-top-tag">
                            @if($prod->herb_count)
                                {{ $prod->herb_count }} WHOLE HERBS
                            @else
                                ESTATE BLEND
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
                                <span class="card-category">{{ $prod->category ? $prod->category->name : 'Herbal Tea' }}</span>
                                <span class="card-rating">
                                    <i class="fa-solid fa-star"></i> {{ number_format($prod->avg_rating, 1) }} ({{ $prod->review_count ?? 120 }}+)
                                </span>
                            </div>

                            <h3 class="card-title">
                                <a href="{{ route('products.show', $prod->slug) }}">{{ $prod->name }}</a>
                            </h3>
                            <p class="card-tagline">"{{ $prod->tagline }}"</p>

                            <div class="card-herbs-pills">
                                @if($prod->slug === 'aureva-slimming-detox')
                                    <span class="herb-pill">🌿 Oolong & Green Tea</span>
                                    <span class="herb-pill">🍃 Peppermint</span>
                                    <span class="herb-pill">🌱 Moringa & Tulsi</span>
                                @elseif($prod->slug === 'sugara-blood-sugar-care')
                                    <span class="herb-pill">🌿 Karela & Gudmar</span>
                                    <span class="herb-pill">🍃 Jamun Seed</span>
                                    <span class="herb-pill">🌱 Ceylon Cinnamon</span>
                                @else
                                    <span class="herb-pill">☕ Assam CTC Tea</span>
                                    <span class="herb-pill">🌿 Malabar Cardamom</span>
                                    <span class="herb-pill">🌱 Dried Ginger & Clove</span>
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
                                <button class="btn-card-cart" onclick="quickAddToCart({{ $prod->id }})" id="btn-quick-add-{{ $prod->id }}">
                                    <i class="fa-solid fa-bag-shopping"></i> Add
                                </button>
                                <a href="{{ route('products.show', $prod->slug) }}" class="btn-card-buy" id="btn-buy-{{ $prod->id }}">
                                    <span>Buy Now</span> <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. Master Ayurvedic Formulator & Heritage Story (Twinings Stephen Twining Style) -->
    <section class="master-blender-section" id="master-blender-story">
        <div class="master-blender-container">
            <div class="blender-image-box">
                <img src="{{ asset('assets/images/tea_estate_heritage.jpg') }}" onerror="this.src='{{ asset('assets/images/hero_pouch.jpg') }}'" alt="Leaf N Dawn Master Blender and Ayurvedic Formulations">
            </div>

            <div class="blender-text-content">
                <span class="section-tag" style="color: var(--color-gold-light);">The Art of Botanical Mastery</span>
                <h2 class="blender-quote">
                    "We don't just blend tea — we compose <span>restorative moments</span> of pure balance."
                </h2>
                <p class="blender-desc">
                    Leaf N Dawn was born from a singular passion: honoring the ancient botanical wisdom of the Himalayas while delivering a luxurious, uncompromised tea experience for modern lifestyles.
                </p>

                <div class="blender-features-grid">
                    <div class="blender-feature-item">
                        <div class="feature-icon-circle"><i class="fa-solid fa-mountain"></i></div>
                        <div class="feature-text-block">
                            <h5>High-Altitude Sourcing</h5>
                            <p>Hand-plucked leaves harvested at first light for maximal antioxidant retention.</p>
                        </div>
                    </div>
                    <div class="blender-feature-item">
                        <div class="feature-icon-circle"><i class="fa-solid fa-flask"></i></div>
                        <div class="feature-text-block">
                            <h5>Ayurvedic Precision</h5>
                            <p>Formulated in collaboration with certified herbalists and food scientists.</p>
                        </div>
                    </div>
                    <div class="blender-feature-item">
                        <div class="feature-icon-circle"><i class="fa-solid fa-recycle"></i></div>
                        <div class="feature-text-block">
                            <h5>Zero Plastic Pyramids</h5>
                            <p>100% biodegradable corn-starch bags that dissolve safely into the earth.</p>
                        </div>
                    </div>
                    <div class="blender-feature-item">
                        <div class="feature-icon-circle"><i class="fa-solid fa-shield-check"></i></div>
                        <div class="feature-text-block">
                            <h5>Triple Quality Tested</h5>
                            <p>ISO 22000 and HACCP certified purity with zero synthetic chemicals.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="btn-gold" id="btn-blender-read-more">
                    <span>Discover Our Philosophy</span> <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 5. Interactive Tea Rituals & Brewing Guide Infographics -->
    <section class="brewing-rituals-section" id="brewing-rituals">
        <div class="section-header">
            <span class="section-tag">The Perfect Infusion</span>
            <h2 class="section-title">The Art of Brewing Your Ritual</h2>
            <p class="section-desc">Follow these 4 simple steps to extract the richest aromas and bioactive herbal compounds from your Leaf N Dawn pyramid bag.</p>
        </div>

        <div class="brewing-cards-grid">
            <div class="brewing-step-card">
                <span class="step-number-badge">01</span>
                <div class="brewing-icon"><i class="fa-solid fa-mug-hot"></i></div>
                <h4>Warm Your Teaware</h4>
                <p>Rinse your favorite ceramic mug or teapot with hot water to maintain optimal brewing heat.</p>
            </div>

            <div class="brewing-step-card">
                <span class="step-number-badge">02</span>
                <div class="brewing-icon"><i class="fa-solid fa-temperature-three-quarters"></i></div>
                <h4>90°C Fresh Spring Water</h4>
                <p>Heat freshly drawn water just short of a rolling boil (approx 90°C) to protect delicate herbal oils.</p>
            </div>

            <div class="brewing-step-card">
                <span class="step-number-badge">03</span>
                <div class="brewing-icon"><i class="fa-solid fa-hourglass-half"></i></div>
                <h4>3 - 5 Minutes Steep</h4>
                <p>Place 1 pyramid tea bag and let the whole botanicals fully expand and infuse their rich golden hue.</p>
            </div>

            <div class="brewing-step-card">
                <span class="step-number-badge">04</span>
                <div class="brewing-icon"><i class="fa-solid fa-spa"></i></div>
                <h4>Sip & Rejuvenate</h4>
                <p>Inhale the crisp natural aromatics, sip slowly, and embrace mindful tranquility.</p>
            </div>
        </div>
    </section>

    <!-- 6. FAQ Accordion Section (Twinings India Model) -->
    <section class="faq-section" id="frequently-asked-questions">
        <div class="faq-container">
            <div class="section-header">
                <span class="section-tag">Answers to Your Questions</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-desc">Learn more about our sourcing standards, health benefits, and shelf life.</p>
            </div>

            <div class="faq-accordion">
                <div class="faq-item active">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Are Leaf N Dawn tea bags 100% plastic-free and biodegradable?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Yes, absolutely! Our pyramid tea bags are crafted from 100% biodegradable corn-starch mesh (PLA). They contain zero nylon, zero microplastics, and zero toxic chemical bleach, making them safe for you and the planet.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>When is the best time to consume Aureva Detox & Sugara Tea?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        We recommend drinking **Aureva Slimming Detox** once in the morning after waking up or 30 minutes before lunch to ignite your metabolism. For **Sugara Blood Sugar Care**, drinking a warm cup 20–30 minutes after your principal meals helps optimize post-meal glycemic balance.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>How long does delivery take across India?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        All orders are freshly packed and dispatched within 24 hours. Metro cities typically receive deliveries within 2–3 business days, while other regions take 3–5 business days. All orders above ₹499 qualify for Free Express Shipping.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Do these teas contain added sugar or artificial flavorings?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        No. Every single Leaf N Dawn formulation is 100% natural and contains zero refined sugars, zero artificial colors, and zero chemical preservatives. The sweetness and flavors come entirely from natural sun-dried herbs and spices.
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    function toggleFaq(element) {
        const item = element.parentElement;
        const allItems = document.querySelectorAll('.faq-item');
        
        allItems.forEach(i => {
            if (i !== item) i.classList.remove('active');
        });
        
        item.classList.toggle('active');
    }
</script>
@endsection
