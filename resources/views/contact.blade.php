@extends('layouts.app')

@section('title', 'Tea Concierge & Customer Care — Leaf N Dawn')
@section('meta_description', 'Contact the Leaf N Dawn tea concierge for botanical blend advice, bulk corporate gifting, brewing inquiries, and express order assistance.')

@section('styles')
<style>
    /* Contact Hero Banner */
    .contact-hero-banner {
        background: linear-gradient(135deg, #122414 0%, #1E3A20 100%);
        color: #FAF8F3;
        padding: 60px 24px;
        text-align: center;
        border-bottom: 3px solid var(--color-gold);
    }

    .contact-hero-inner {
        max-width: 820px;
        margin: 0 auto;
    }

    .contact-hero-tag {
        font-family: var(--font-accent);
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--color-gold-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
        display: inline-block;
    }

    .contact-hero-title {
        font-family: var(--font-heading);
        font-size: 2.8rem;
        font-weight: 700;
        color: #FFFFFF;
        margin-bottom: 12px;
    }

    .contact-hero-desc {
        color: #CBD7CE;
        font-size: 1rem;
        line-height: 1.6;
    }

    .contact-container {
        max-width: 1360px;
        margin: 60px auto 90px;
        padding: 0 24px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.25fr;
        gap: 50px;
    }

    /* Left Concierge Card */
    .concierge-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 40px 34px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }

    .concierge-card h3 {
        font-family: var(--font-heading);
        color: var(--color-primary-dark);
        font-size: 1.6rem;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 12px;
    }

    .concierge-card h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 38px;
        height: 2px;
        background: var(--color-gold);
    }

    .concierge-item {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        margin-bottom: 28px;
    }

    .concierge-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--color-cream);
        border: 1.5px solid var(--color-gold);
        color: var(--color-primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        flex-shrink: 0;
    }

    .concierge-item h4 {
        font-family: var(--font-heading);
        font-size: 1.1rem;
        color: var(--color-primary-dark);
        margin-bottom: 2px;
    }

    .concierge-item p,
    .concierge-item a {
        color: #4A5568;
        font-size: 0.92rem;
        text-decoration: none;
    }

    .concierge-item a:hover {
        color: var(--color-gold-dark);
    }

    .btn-whatsapp-concierge {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: #25D366;
        color: #FFFFFF;
        padding: 13px 28px;
        border-radius: var(--radius-pill);
        font-family: var(--font-accent);
        font-weight: 700;
        font-size: 0.90rem;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3);
        margin-top: 24px;
        transition: var(--transition);
    }

    .btn-whatsapp-concierge:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.45);
    }

    /* Right Form Card */
    .inquiry-form-card {
        background: var(--color-cream);
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-lg);
        padding: 40px 34px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }

    .inquiry-form-card h3 {
        font-family: var(--font-heading);
        color: var(--color-primary-dark);
        font-size: 1.6rem;
        margin-bottom: 24px;
    }

    .form-group-field {
        margin-bottom: 20px;
    }

    .form-group-field label {
        display: block;
        font-family: var(--font-accent);
        font-size: 0.82rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .form-group-field input,
    .form-group-field textarea,
    .form-group-field select {
        width: 100%;
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 0.92rem;
        font-family: var(--font-body);
        outline: none;
        transition: border 0.2s;
    }

    .form-group-field input:focus,
    .form-group-field textarea:focus,
    .form-group-field select:focus {
        border-color: var(--color-gold);
    }

    @media (max-width: 992px) {
        .contact-grid { grid-template-columns: 1fr; }
        .contact-hero-title { font-size: 2.2rem; }
    }
</style>
@endsection

@section('content')

<!-- Contact Hero Banner -->
<div class="contact-hero-banner">
    <div class="contact-hero-inner">
        <span class="contact-hero-tag">✦ LEAF N DAWN CONCIERGE ✦</span>
        <h1 class="contact-hero-title">
            Tea Concierge & Customer Care
        </h1>
        <p class="contact-hero-desc">
            Whether you seek tailored Ayurvedic blend guidance, bulk curated corporate gifting, or assistance with your tea basket, our master tea specialists are dedicated to your service.
        </p>
    </div>
</div>

<div class="contact-container">
    <div class="contact-grid">
        <!-- Direct Concierge Channels -->
        <div class="concierge-card">
            <h3>Direct Concierge Channels</h3>

            <div class="concierge-item">
                <div class="concierge-icon"><i class="fa-solid fa-phone"></i></div>
                <div>
                    <h4>Direct Voice Concierge</h4>
                    <p><a href="tel:+919211050888">+91 92110 50888</a></p>
                    <small style="color: #94A3B8;">Monday through Saturday, 9:00 AM – 7:00 PM IST</small>
                </div>
            </div>

            <div class="concierge-item">
                <div class="concierge-icon"><i class="fa-solid fa-envelope"></i></div>
                <div>
                    <h4>Client Inquiries & Care</h4>
                    <p><a href="mailto:leafndawncare@gmail.com">leafndawncare@gmail.com</a></p>
                    <small style="color: #94A3B8;">Guaranteed reply within 24 business hours</small>
                </div>
            </div>

            <div class="concierge-item">
                <div class="concierge-icon"><i class="fa-solid fa-gift"></i></div>
                <div>
                    <h4>Custom & Corporate Gifting</h4>
                    <p>Curated wooden tea chests, personalized gift boxes & festive wellness hampers.</p>
                </div>
            </div>

            <a href="https://wa.me/919211050888?text=Hello%20Leaf%20N%20Dawn%20Concierge,%20I%20would%20like%20to%20inquire%20about%20your%20herbal%20teas." target="_blank" class="btn-whatsapp-concierge">
                <i class="fa-brands fa-whatsapp" style="font-size: 1.3rem;"></i> Direct WhatsApp Concierge
            </a>
        </div>

        <!-- Inquiry Form -->
        <div class="inquiry-form-card">
            <h3>Send a Message to Our Tea Master</h3>

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group-field">
                    <label for="contact_name">Full Name *</label>
                    <input type="text" id="contact_name" name="name" required placeholder="e.g. Mayur Patel">
                </div>

                <div class="form-group-field">
                    <label for="contact_email">Email Address *</label>
                    <input type="email" id="contact_email" name="email" required placeholder="e.g. mayur@example.com">
                </div>

                <div class="form-group-field">
                    <label for="contact_phone">Contact Phone (Optional)</label>
                    <input type="tel" id="contact_phone" name="phone" placeholder="+91 92110 50888">
                </div>

                <div class="form-group-field">
                    <label for="contact_message">Your Wellness Inquiry or Gifting Request *</label>
                    <textarea id="contact_message" name="message" rows="4" required placeholder="Tell us how we can assist your tea ritual..."></textarea>
                </div>

                <button type="submit" class="btn-gold" style="width: 100%; justify-content: center; padding: 14px;">
                    <span>Submit Inquiry</span> <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
