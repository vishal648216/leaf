@extends('layouts.app')

@section('title', 'Our Botanical Story — Leaf N Dawn')

@section('styles')
<style>
    .about-hero {
        background: radial-gradient(circle at 50% 30%, rgba(245, 166, 35, 0.15) 0%, transparent 60%),
                    linear-gradient(135deg, #F4F9F4 0%, #E8F5E9 100%);
        padding: 80px 24px;
        text-align: center;
        border-bottom: 1px solid var(--color-sage-border);
    }

    .about-hero h1 {
        font-family: var(--font-heading);
        font-size: 3rem;
        color: var(--color-primary-dark);
        margin-bottom: 16px;
    }

    .about-hero p {
        max-width: 680px;
        margin: 0 auto;
        font-size: 1.15rem;
        color: #374151;
        line-height: 1.7;
    }

    .about-content-wrap {
        max-width: 1040px;
        margin: 60px auto 100px;
        padding: 0 24px;
    }

    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
        margin-bottom: 70px;
    }

    .story-text h2 {
        font-family: var(--font-heading);
        font-size: 2.2rem;
        color: var(--color-primary-dark);
        margin-bottom: 18px;
    }

    .story-text p {
        font-size: 1rem;
        color: #475569;
        line-height: 1.8;
        margin-bottom: 16px;
    }

    .story-img-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 20px;
        box-shadow: var(--shadow-md);
    }

    .story-img-card img {
        width: 100%;
        border-radius: var(--radius-md);
        display: block;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        margin-top: 50px;
    }

    .value-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 30px 24px;
        text-align: center;
        box-shadow: var(--shadow-sm);
    }

    .value-card i {
        font-size: 2rem;
        color: var(--color-gold);
        margin-bottom: 16px;
    }

    .value-card h3 {
        font-family: var(--font-heading);
        font-size: 1.25rem;
        color: var(--color-primary-dark);
        margin-bottom: 10px;
    }

    .value-card p {
        font-size: 0.9rem;
        color: #64748B;
        line-height: 1.6;
    }

    @media (max-width: 868px) {
        .story-grid { grid-template-columns: 1fr; }
        .values-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<section class="about-hero">
    <span style="font-family: var(--font-accent); font-size: 0.8rem; font-weight: 700; color: var(--color-primary); letter-spacing: 1.6px; text-transform: uppercase;">Our Philosophy</span>
    <h1>Awakening Sacred Vitality</h1>
    <p>We founded Leaf N Dawn on a singular conviction: that true wellness stems from the purest botanicals kissed by morning dew and radiant sunshine.</p>
</section>

<div class="about-content-wrap">
    <div class="story-grid">
        <div class="story-text">
            <h2>The Leaf N Dawn Ethos</h2>
            <p>
                In an era dominated by synthetic additives and artificial extracts, Leaf N Dawn brings you back to the sacred wisdom of Ayurveda. Our name represents the eternal cycle of renewal — the unfurling of the fresh <strong>Leaf</strong> touched by the golden warmth of <strong>Dawn</strong>.
            </p>
            <p>
                Every blend is hand-formulated in collaboration with certified Ayurvedic vaidyas. We exclusively source whole botanicals, uncrushed spices, and virgin loose tea leaves from high-altitude chemical-free plantations.
            </p>
        </div>

        <div class="story-img-card">
            <img src="{{ asset('assets/images/mockup_product.jpg') }}" alt="Leaf N Dawn Artisanal Pouches">
        </div>
    </div>

    <div class="story-grid" style="direction: rtl;">
        <div class="story-text" style="direction: ltr;">
            <h2>The Pyramid Revolution</h2>
            <p>
                Conventional paper tea bags trap dusty tea fannings, releasing micro-plastics and astringent bitterness. 
            </p>
            <p>
                Leaf N Dawn pioneered plant-based, biodegradable pyramid mesh bags. Their geometric space enables whole botanical petals, roots and cinnamon barks to circulate uninhibited in boiling water, yielding a crystal-clear, intensely aromatic nectar.
            </p>
        </div>

        <div class="story-img-card" style="direction: ltr;">
            <img src="{{ asset('assets/images/main-logo.jpeg') }}" alt="Leaf N Dawn Brand Emblem" style="max-height: 320px; object-fit: contain; margin: 0 auto;">
        </div>
    </div>

    <!-- Core Values -->
    <div style="text-align: center; margin-top: 60px;">
        <span style="font-family: var(--font-accent); font-size: 0.78rem; font-weight: 700; color: var(--color-primary); letter-spacing: 1.5px; text-transform: uppercase;">The Four Pillars</span>
        <h2 style="font-family: var(--font-heading); font-size: 2.2rem; color: var(--color-primary-dark); margin-top: 6px;">Our Uncompromising Standards</h2>
    </div>

    <div class="values-grid">
        <div class="value-card">
            <i class="fa-solid fa-leaf"></i>
            <h3>100% Pure Botanicals</h3>
            <p>Zero artificial flavoring agents, zero chemical pesticides, zero synthetic coloring.</p>
        </div>

        <div class="value-card">
            <i class="fa-solid fa-scale-balanced"></i>
            <h3>Ayurvedic Balance</h3>
            <p>Scientifically formulated ratios to pacify digestive fire and harmonize bodily doshas.</p>
        </div>

        <div class="value-card">
            <i class="fa-solid fa-earth-americas"></i>
            <h3>Eco-Conscious Packaging</h3>
            <p>Biodegradable pyramid pouches made from non-GMO plant starch, preserving our earth.</p>
        </div>
    </div>
</div>
@endsection
