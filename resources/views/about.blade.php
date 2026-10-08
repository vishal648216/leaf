@extends('layouts.app')

@section('title', 'Sourced with Care & Our Botanical Heritage — Leaf N Dawn')
@section('meta_description', 'Discover how Leaf N Dawn sources high-altitude Ayurvedic botanicals with utmost care, eco-friendly biodegradable pyramid bags, and ISO 22000 certified purity.')

@section('styles')
<style>
    /* Heritage Hero Banner */
    .about-hero-banner {
        background: linear-gradient(135deg, #122414 0%, #1E3A20 100%);
        color: #FAF8F3;
        padding: 70px 24px;
        text-align: center;
        border-bottom: 3px solid var(--color-gold);
        position: relative;
    }

    .about-hero-inner {
        max-width: 860px;
        margin: 0 auto;
    }

    .about-hero-tag {
        font-family: var(--font-accent);
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--color-gold-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 12px;
        display: inline-block;
    }

    .about-hero-title {
        font-family: var(--font-heading);
        font-size: 3.2rem;
        font-weight: 700;
        color: #FFFFFF;
        line-height: 1.15;
        margin-bottom: 16px;
    }

    .about-hero-title span {
        color: var(--color-gold-light);
        font-style: italic;
        font-weight: 400;
    }

    .about-hero-desc {
        color: #CBD7CE;
        font-size: 1.05rem;
        line-height: 1.7;
    }

    .about-container {
        max-width: 1360px;
        margin: 70px auto 100px;
        padding: 0 24px;
    }

    /* Twinings-Style Dual Column Storytelling */
    .heritage-story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        margin-bottom: 90px;
    }

    .heritage-text h2 {
        font-family: var(--font-heading);
        font-size: 2.4rem;
        color: var(--color-primary-dark);
        margin-bottom: 18px;
        line-height: 1.2;
    }

    .heritage-text p {
        font-size: 1rem;
        color: #4A5568;
        line-height: 1.8;
        margin-bottom: 16px;
    }

    .heritage-img-frame {
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--color-sage-border);
        background: #FFFFFF;
        padding: 14px;
    }

    .heritage-img-frame img {
        width: 100%;
        height: auto;
        border-radius: var(--radius-md);
        display: block;
    }

    /* 3 Pillars of Sourced with Care */
    .sourced-pillars-wrap {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 60px 40px;
        margin-bottom: 90px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.03);
    }

    .pillars-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        margin-top: 40px;
    }

    .pillar-card {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 34px 26px;
        text-align: center;
        transition: var(--transition);
        position: relative;
    }

    .pillar-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
        border-color: var(--color-gold);
    }

    .pillar-icon-circle {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background: #FFFFFF;
        border: 1.5px solid var(--color-gold);
        color: var(--color-primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin: 0 auto 20px;
    }

    .pillar-card h3 {
        font-family: var(--font-heading);
        font-size: 1.3rem;
        color: var(--color-primary-dark);
        margin-bottom: 10px;
    }

    .pillar-card p {
        font-size: 0.90rem;
        color: #64748B;
        line-height: 1.6;
    }

    /* Certifications Trust Strip */
    .cert-strip-section {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 44px;
        text-align: center;
        margin-bottom: 80px;
    }

    .cert-badges-row {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 24px;
    }

    .cert-box {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-pill);
        padding: 10px 24px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: var(--font-accent);
        font-size: 0.84rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        box-shadow: var(--shadow-sm);
    }

    .cert-box i {
        color: var(--color-gold-dark);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .heritage-story-grid { grid-template-columns: 1fr; gap: 40px; }
        .pillars-grid { grid-template-columns: 1fr; }
        .about-hero-title { font-size: 2.4rem; }
    }
</style>
@endsection

@section('content')

<!-- Heritage Hero Banner -->
<div class="about-hero-banner">
    <div class="about-hero-inner">
        <span class="about-hero-tag">✦ SOURCED WITH CARE & AYURVEDIC MASTERY ✦</span>
        <h1 class="about-hero-title">
            Rooted in <span>Ancient Purity</span>, Crafted for Modern Living
        </h1>
        <p class="about-hero-desc">
            At Leaf N Dawn, we honor the sacred synergy between raw Himalayan botanicals and certified Ayurvedic science. Each blend is harvested at peak sunrise freshness to elevate your daily tea ceremony.
        </p>
    </div>
</div>

<div class="about-container">

    <!-- Story 1: The Leaf N Dawn Ethos -->
    <div class="heritage-story-grid">
        <div class="heritage-text">
            <span class="section-tag">Our Founding Purpose</span>
            <h2>The Sacred Dawn Philosophy</h2>
            <p>
                In a world crowded with artificial extracts and mass-processed tea dust, Leaf N Dawn was established with a singular mission: to bring honest, chemical-free herbal rejuvenation back to your teacup.
            </p>
            <p>
                Our name reflects nature’s eternal rhythm of rejuvenation — the whole, unbruised <strong>Leaf</strong> awakened by the first golden rays of the <strong>Dawn</strong> sun.
            </p>
            <p>
                Every single blend is formulated in close consultation with experienced Ayurvedic practitioners, selecting whole leaves, sun-dried roots, and Malabar spices with documented therapeutic properties.
            </p>
        </div>

        <div class="heritage-img-frame">
            <img src="{{ asset('assets/images/tea_estate_heritage.jpg') }}" onerror="this.src='{{ asset('assets/images/hero_pouch.jpg') }}'" alt="Leaf N Dawn High Altitude Tea Plantation">
        </div>
    </div>

    <!-- Story 2: The Pyramid Revolution -->
    <div class="heritage-story-grid" style="direction: rtl;">
        <div class="heritage-text" style="direction: ltr;">
            <span class="section-tag">Uncompromised Quality</span>
            <h2>The Plant-Based Pyramid Revolution</h2>
            <p>
                Traditional flat paper tea bags compress crushed fannings and release bitter tannins, often bound by synthetic glues and non-biodegradable plastics.
            </p>
            <p>
                We exclusively utilize <strong>100% biodegradable corn-starch pyramid mesh</strong>. The spacious geometric structure gives whole botanicals, cinnamon barks, and tender tea leaves room to expand and unfurl freely in boiling water, releasing clear, intensely aromatic herbal nectar.
            </p>
            <div style="display: flex; gap: 12px; margin-top: 20px;">
                <span class="cert-badge" style="background:#1E3A20; color:#FFF; font-size:0.76rem;"><i class="fa-solid fa-seedling"></i> Zero Microplastics</span>
                <span class="cert-badge" style="background:#1E3A20; color:#FFF; font-size:0.76rem;"><i class="fa-solid fa-leaf"></i> 100% Biodegradable</span>
            </div>
        </div>

        <div class="heritage-img-frame" style="direction: ltr;">
            <img src="{{ asset('assets/images/hero_pouch.jpg') }}" alt="Leaf N Dawn Biodegradable Whole Leaf Pyramid Bags">
        </div>
    </div>

    <!-- Sourced With Care Pillars -->
    <div class="sourced-pillars-wrap">
        <div class="section-header">
            <span class="section-tag">Sourced with Care</span>
            <h2 class="section-title">Our Three Sustainability Pillars</h2>
            <p class="section-desc">From ethical high-altitude farming to sustainable zero-plastic packaging, discover how we safeguard the earth while crafting your tea.</p>
        </div>

        <div class="pillars-grid">
            <div class="pillar-card">
                <div class="pillar-icon-circle"><i class="fa-solid fa-mountain"></i></div>
                <h3>High-Altitude Estates</h3>
                <p>We source directly from pristine mountain tea gardens, empowering fair wages for local plucking communities.</p>
            </div>

            <div class="pillar-card">
                <div class="pillar-icon-circle"><i class="fa-solid fa-flask-vial"></i></div>
                <h3>Ayurvedic Balance</h3>
                <p>Blends curated in clinical proportions to harmonize digestion, metabolism, and calm the nervous system.</p>
            </div>

            <div class="pillar-card">
                <div class="pillar-icon-circle"><i class="fa-solid fa-recycle"></i></div>
                <h3>100% Eco Packaging</h3>
                <p>Plastic-free pyramid bags and recyclable pouches that naturally return to the soil without toxic waste.</p>
            </div>
        </div>
    </div>

    <!-- Quality Assurance & Certifications Strip -->
    <div class="cert-strip-section">
        <span class="section-tag">Purity Guaranteed</span>
        <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-primary-dark); margin-top: 6px;">Certified Quality Management</h2>
        <p style="color: var(--color-slate); max-width: 620px; margin: 8px auto 0;">Every batch undergoes strict multi-stage lab analysis for purity, moisture balance, and active phyto-nutrients.</p>

        <div class="cert-badges-row">
            <div class="cert-box"><i class="fa-solid fa-award"></i> ISO 22000:2018 Certified</div>
            <div class="cert-box"><i class="fa-solid fa-shield-check"></i> HACCP Food Safety Standard</div>
            <div class="cert-box"><i class="fa-solid fa-seedling"></i> 100% Pure Natural Botanicals</div>
            <div class="cert-box"><i class="fa-solid fa-ban"></i> Zero Synthetic Chemicals / Colors</div>
        </div>
    </div>

</div>

@endsection
