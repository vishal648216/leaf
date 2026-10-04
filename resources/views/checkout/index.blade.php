@extends('layouts.app')

@section('title', 'Secure Checkout — Leaf N Dawn')

@section('styles')
<style>
    .checkout-wrap {
        max-width: 1200px;
        margin: 40px auto 80px;
        padding: 0 24px;
    }

    .checkout-title {
        font-family: var(--font-heading);
        font-size: 2.2rem;
        color: var(--color-primary-dark);
        margin-bottom: 24px;
    }

    .checkout-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 40px;
        align-items: start;
    }

    .checkout-form-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 32px;
        box-shadow: var(--shadow-sm);
    }

    .step-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #F1F5F9;
    }

    .step-num {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--color-primary);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.88rem;
    }

    .step-header h3 {
        font-family: var(--font-heading);
        font-size: 1.25rem;
        color: var(--color-primary-dark);
    }

    .form-group-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 16px;
    }

    .form-field {
        margin-bottom: 16px;
    }

    .form-field label {
        display: block;
        font-size: 0.84rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }

    .form-field input,
    .form-field select,
    .form-field textarea {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid var(--color-sage-border);
        border-radius: 8px;
        font-size: 0.92rem;
        outline: none;
        transition: var(--transition);
        font-family: inherit;
    }

    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(58, 125, 68, 0.12);
    }

    /* Payment Selector */
    .payment-options {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 16px;
    }

    .payment-option-label {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 18px;
        border: 1.5px solid var(--color-sage-border);
        border-radius: 10px;
        cursor: pointer;
        transition: var(--transition);
    }

    .payment-option-label:hover,
    .payment-option-label.active {
        border-color: var(--color-primary);
        background: var(--color-sage);
    }

    .payment-option-label input[type="radio"] {
        accent-color: var(--color-primary);
        width: 18px;
        height: 18px;
    }

    /* Order Review Card */
    .review-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 28px;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 100px;
    }

    .mini-item {
        display: flex;
        gap: 14px;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #F1F5F9;
    }

    .mini-img {
        width: 54px;
        height: 54px;
        border-radius: 6px;
        border: 1px solid var(--color-sage-border);
        object-fit: contain;
        background: #F9FAF7;
    }

    .mini-info h5 {
        font-family: var(--font-heading);
        font-size: 0.96rem;
        color: var(--color-primary-dark);
        margin-bottom: 2px;
    }

    .mini-info small {
        color: #64748B;
        font-size: 0.8rem;
    }

    .btn-place-order {
        width: 100%;
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dark) 100%);
        color: #1A1A2E;
        border: none;
        border-radius: 30px;
        padding: 15px;
        font-size: 1.05rem;
        font-weight: 800;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 6px 20px rgba(245, 166, 35, 0.4);
        margin-top: 24px;
        transition: var(--transition);
    }

    .btn-place-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(245, 166, 35, 0.55);
    }

    @media (max-width: 992px) {
        .checkout-grid { grid-template-columns: 1fr; }
        .form-group-row { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="checkout-wrap">
    <h1 class="checkout-title">Complete Your Herbal Order</h1>

    <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
        @csrf
        <div class="checkout-grid">
            <!-- Left: Shipping & Payment -->
            <div class="checkout-form-card">
                <div class="step-header">
                    <span class="step-num">1</span>
                    <h3>Shipping Address</h3>
                </div>

                <div class="form-group-row">
                    <div class="form-field">
                        <label for="ship_name">Full Recipient Name *</label>
                        <input type="text" name="ship_name" id="ship_name" required placeholder="e.g. Mayur Patel" value="{{ old('ship_name', 'Mayur Patel') }}">
                    </div>
                    <div class="form-field">
                        <label for="ship_phone">Mobile Number (For Courier Updates) *</label>
                        <input type="tel" name="ship_phone" id="ship_phone" required placeholder="e.g. +91 92110 50888" value="{{ old('ship_phone', '+91 92110 50888') }}">
                    </div>
                </div>

                <div class="form-field">
                    <label for="ship_address">Street Address / House / Flat No. *</label>
                    <input type="text" name="ship_address" id="ship_address" required placeholder="e.g. 102, Green Meadows, S.G. Highway" value="{{ old('ship_address', '102, Green Meadows, S.G. Highway') }}">
                </div>

                <div class="form-group-row">
                    <div class="form-field">
                        <label for="ship_city">City *</label>
                        <input type="text" name="ship_city" id="ship_city" required placeholder="e.g. Ahmedabad" value="{{ old('ship_city', 'Ahmedabad') }}">
                    </div>
                    <div class="form-field">
                        <label for="ship_state">State *</label>
                        <select name="ship_state" id="ship_state" required>
                            <option value="Gujarat" selected>Gujarat</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Other">Other State</option>
                        </select>
                    </div>
                </div>

                <div class="form-field">
                    <label for="ship_pincode">Pincode *</label>
                    <input type="text" name="ship_pincode" id="ship_pincode" required placeholder="e.g. 380054" value="{{ old('ship_pincode', '380054') }}">
                </div>

                <div class="form-field">
                    <label for="notes">Delivery Instructions (Optional)</label>
                    <textarea name="notes" id="notes" rows="2" placeholder="e.g. Please leave package at front security desk."></textarea>
                </div>

                <!-- Payment Method -->
                <div class="step-header" style="margin-top: 36px;">
                    <span class="step-num">2</span>
                    <h3>Select Payment Method</h3>
                </div>

                <div class="payment-options">
                    <label class="payment-option-label active">
                        <input type="radio" name="payment_method" value="upi" checked>
                        <div>
                            <strong style="color: var(--color-primary-dark); font-size: 0.95rem;">Instant UPI / QR Code</strong>
                            <small style="display:block; color: #64748B;">Pay via Google Pay, PhonePe, Paytm, BHIM</small>
                        </div>
                    </label>

                    <label class="payment-option-label">
                        <input type="radio" name="payment_method" value="cod">
                        <div>
                            <strong style="color: var(--color-primary-dark); font-size: 0.95rem;">Cash on Delivery (COD)</strong>
                            <small style="display:block; color: #64748B;">Pay conveniently in cash when courier delivers</small>
                        </div>
                    </label>

                    <label class="payment-option-label">
                        <input type="radio" name="payment_method" value="razorpay">
                        <div>
                            <strong style="color: var(--color-primary-dark); font-size: 0.95rem;">Debit / Credit Card & Netbanking</strong>
                            <small style="display:block; color: #64748B;">Secured by Razorpay • All Indian banks supported</small>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Right: Order Review -->
            <div class="review-card">
                <h3 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.35rem; margin-bottom: 18px; padding-bottom: 10px; border-bottom: 1px solid #F1F5F9;">
                    Your Selection ({{ $items->count() }} Items)
                </h3>

                @foreach($items as $item)
                    <div class="mini-item">
                        <img src="{{ asset($item->product->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $item->product->name }}" class="mini-img">
                        <div class="mini-info" style="flex: 1;">
                            <h5>{{ $item->product->name }}</h5>
                            <small>Qty: {{ $item->quantity }} × ₹{{ number_format($item->product->price, 0) }}</small>
                        </div>
                        <strong style="color: var(--color-primary-dark); font-size: 0.95rem;">
                            ₹{{ number_format($item->product->price * $item->quantity, 0) }}
                        </strong>
                    </div>
                @endforeach

                <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid #F1F5F9;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.92rem; color: #475569;">
                        <span>Subtotal</span>
                        <span>₹{{ number_format($subtotal, 0) }}</span>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.92rem; color: #475569;">
                        <span>Shipping</span>
                        @if($shipping == 0)
                            <span style="color: #10B981; font-weight: 700;">FREE</span>
                        @else
                            <span>₹{{ number_format($shipping, 0) }}</span>
                        @endif
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.92rem; color: #10B981;">
                        <span>First Order Discount (LEAF15)</span>
                        <span>- ₹{{ number_format($subtotal * 0.15, 0) }}</span>
                    </div>

                    <input type="hidden" name="coupon_code" value="LEAF15">

                    <div style="display: flex; justify-content: space-between; margin-top: 16px; padding-top: 16px; border-top: 2px dashed #E2E8F0; font-size: 1.3rem; font-weight: 800; color: var(--color-primary-dark);">
                        <span>Total Payable</span>
                        <span>₹{{ number_format(max(0, ($subtotal * 0.85) + $shipping), 0) }}</span>
                    </div>
                </div>

                <button type="submit" class="btn-place-order" id="btn-submit-order">
                    <i class="fa-solid fa-lock"></i> Place Order Now
                </button>

                <div style="margin-top: 18px; text-align: center; font-size: 0.78rem; color: #64748B; line-height: 1.5;">
                    <i class="fa-solid fa-shield-halved" style="color: var(--color-primary);"></i>
                    Your order qualifies for 100% money-back satisfaction guarantee.
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
