@extends('layouts.app')

@section('title', 'Get in Touch — Leaf N Dawn')

@section('styles')
<style>
    .contact-wrap {
        max-width: 1200px;
        margin: 50px auto 100px;
        padding: 0 24px;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .contact-header h1 {
        font-family: var(--font-heading);
        font-size: 2.8rem;
        color: var(--color-primary-dark);
        margin-bottom: 12px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 48px;
    }

    .contact-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 36px;
        box-shadow: var(--shadow-sm);
    }

    .contact-info-item {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        margin-bottom: 28px;
    }

    .contact-info-item .icon-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--color-sage);
        color: var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .contact-info-item h4 {
        font-family: var(--font-heading);
        font-size: 1.15rem;
        color: var(--color-primary-dark);
        margin-bottom: 4px;
    }

    .contact-info-item p,
    .contact-info-item a {
        color: #475569;
        font-size: 0.95rem;
        text-decoration: none;
    }

    .contact-info-item a:hover {
        color: var(--color-primary);
    }

    .btn-whatsapp-chat {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #25D366;
        color: #FFFFFF;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.92rem;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3);
        margin-top: 14px;
        transition: var(--transition);
    }

    .btn-whatsapp-chat:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(37, 211, 102, 0.45);
    }

    .form-input-field {
        margin-bottom: 18px;
    }

    .form-input-field label {
        display: block;
        font-size: 0.86rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }

    .form-input-field input,
    .form-input-field textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid var(--color-sage-border);
        border-radius: 8px;
        font-size: 0.92rem;
        outline: none;
        font-family: inherit;
        transition: border 0.2s;
    }

    .form-input-field input:focus,
    .form-input-field textarea:focus {
        border-color: var(--color-primary);
    }

    @media (max-width: 868px) {
        .contact-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="contact-wrap">
    <div class="contact-header">
        <span style="font-family: var(--font-accent); font-size: 0.78rem; font-weight: 700; color: var(--color-primary); letter-spacing: 1.6px; text-transform: uppercase;">Connect With Us</span>
        <h1>We are Here to Listen</h1>
        <p style="color: #64748B; max-width: 540px; margin: 0 auto;">Have questions regarding brewing rituals, bulk gifting or herb specifications? Our wellness specialists are always available.</p>
    </div>

    <div class="contact-grid">
        <!-- Contact Information -->
        <div class="contact-card">
            <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.5rem; margin-bottom: 24px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">
                Direct Channels
            </h3>

            <div class="contact-info-item">
                <div class="icon-circle"><i class="fa-solid fa-phone"></i></div>
                <div>
                    <h4>Phone & Customer Care</h4>
                    <p><a href="tel:+919211050888">+91 92110 50888</a></p>
                    <small style="color: #94A3B8;">Mon - Sat, 9:00 AM - 7:00 PM IST</small>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="icon-circle"><i class="fa-solid fa-envelope"></i></div>
                <div>
                    <h4>Email Inquiries</h4>
                    <p><a href="mailto:leafndawncare@gmail.com">leafndawncare@gmail.com</a></p>
                    <small style="color: #94A3B8;">We respond within 24 business hours</small>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="icon-circle"><i class="fa-brands fa-instagram"></i></div>
                <div>
                    <h4>Instagram Community</h4>
                    <p><a href="https://instagram.com/leafndawn" target="_blank">@leafndawn</a></p>
                    <small style="color: #94A3B8;">Join daily wellness & brewing reels</small>
                </div>
            </div>

            <a href="https://wa.me/919211050888?text=Hello%20Leaf%20N%20Dawn,%20I%20have%20an%20inquiry%20regarding%20your%20herbal%20teas." target="_blank" class="btn-whatsapp-chat">
                <i class="fa-brands fa-whatsapp" style="font-size: 1.2rem;"></i> Chat Directly on WhatsApp
            </a>
        </div>

        <!-- Contact Form -->
        <div class="contact-card">
            <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.5rem; margin-bottom: 24px; padding-bottom: 12px; border-bottom: 1px solid #F1F5F9;">
                Send Us a Note
            </h3>

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-input-field">
                    <label for="contact_name">Your Name *</label>
                    <input type="text" id="contact_name" name="name" required placeholder="e.g. Mayur">
                </div>

                <div class="form-input-field">
                    <label for="contact_email">Email Address *</label>
                    <input type="email" id="contact_email" name="email" required placeholder="e.g. mayur@example.com">
                </div>

                <div class="form-input-field">
                    <label for="contact_phone">Phone Number (Optional)</label>
                    <input type="tel" id="contact_phone" name="phone" placeholder="+91 92110 50888">
                </div>

                <div class="form-input-field">
                    <label for="contact_message">How Can We Assist Your Wellness? *</label>
                    <textarea id="contact_message" name="message" rows="4" required placeholder="Write your message here..."></textarea>
                </div>

                <button type="submit" class="btn-shop-now" style="width: 100%; justify-content: center; padding: 13px;">
                    <i class="fa-solid fa-paper-plane"></i> Send Wellness Inquiry
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
