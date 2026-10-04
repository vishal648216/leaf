@extends('layouts.app')

@section('title', 'Your Wellness Basket — Leaf N Dawn')

@section('styles')
<style>
    .cart-page-wrap {
        max-width: 1280px;
        margin: 40px auto 80px;
        padding: 0 24px;
    }

    .cart-title {
        font-family: var(--font-heading);
        font-size: 2.4rem;
        color: var(--color-primary-dark);
        margin-bottom: 30px;
    }

    .cart-layout {
        display: grid;
        grid-template-columns: 1.8fr 1fr;
        gap: 40px;
        align-items: start;
    }

    .cart-table-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 24px;
        box-shadow: var(--shadow-sm);
    }

    /* Free Shipping Bar */
    .shipping-bar-box {
        background: var(--color-sage);
        border: 1px solid var(--color-sage-border);
        border-radius: 10px;
        padding: 14px 18px;
        margin-bottom: 24px;
    }

    .shipping-bar-text {
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--color-primary-dark);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .progress-track {
        height: 8px;
        background: #E2E8F0;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--color-primary) 0%, var(--color-gold) 100%);
        border-radius: 10px;
        transition: width 0.4s ease;
    }

    /* Items List */
    .cart-item-row {
        display: grid;
        grid-template-columns: 80px 1.8fr 120px 100px 40px;
        gap: 16px;
        align-items: center;
        padding: 18px 0;
        border-bottom: 1px solid #F1F5F9;
    }

    .cart-item-row:last-child {
        border-bottom: none;
    }

    .cart-img-wrap {
        width: 80px;
        height: 80px;
        background: #F9FAF7;
        border-radius: 8px;
        border: 1px solid var(--color-sage-border);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .cart-img-wrap img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    }

    .cart-item-info h4 {
        font-family: var(--font-heading);
        font-size: 1.05rem;
        color: var(--color-primary-dark);
        margin-bottom: 4px;
    }

    .cart-item-info small {
        color: #64748B;
        font-size: 0.82rem;
    }

    .cart-stepper {
        display: flex;
        align-items: center;
        border: 1px solid var(--color-sage-border);
        border-radius: 20px;
        overflow: hidden;
        background: #FFFFFF;
        width: fit-content;
    }

    .cart-stepper button {
        background: none;
        border: none;
        width: 30px;
        height: 32px;
        cursor: pointer;
        font-size: 0.95rem;
        color: var(--color-charcoal);
    }

    .cart-stepper input {
        width: 34px;
        height: 32px;
        border: none;
        text-align: center;
        font-weight: 700;
        font-size: 0.88rem;
        outline: none;
    }

    .cart-item-subtotal {
        font-weight: 800;
        color: var(--color-primary-dark);
        font-size: 1.05rem;
    }

    .btn-remove-item {
        background: none;
        border: none;
        color: #94A3B8;
        cursor: pointer;
        font-size: 1.1rem;
        transition: color 0.2s;
    }

    .btn-remove-item:hover {
        color: #EF4444;
    }

    /* Summary Card */
    .summary-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 28px;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 100px;
    }

    .summary-title {
        font-family: var(--font-heading);
        font-size: 1.4rem;
        color: var(--color-primary-dark);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #F1F5F9;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 14px;
        font-size: 0.94rem;
        color: #475569;
    }

    .summary-row.total-row {
        border-top: 2px dashed #E2E8F0;
        padding-top: 16px;
        margin-top: 18px;
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--color-primary-dark);
    }

    .coupon-box {
        display: flex;
        gap: 8px;
        margin: 20px 0;
    }

    .coupon-box input {
        flex: 1;
        padding: 10px 14px;
        border: 1.5px solid var(--color-sage-border);
        border-radius: 8px;
        font-size: 0.88rem;
        outline: none;
        text-transform: uppercase;
        font-weight: 600;
    }

    .coupon-box button {
        background: var(--color-charcoal);
        color: #FFFFFF;
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-checkout-cta {
        width: 100%;
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dark) 100%);
        color: #1A1A2E;
        border: none;
        border-radius: 30px;
        padding: 14px;
        font-size: 1.02rem;
        font-weight: 800;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        box-shadow: 0 6px 18px rgba(245, 166, 35, 0.35);
        transition: var(--transition);
        margin-top: 20px;
    }

    .btn-checkout-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(245, 166, 35, 0.5);
    }

    @media (max-width: 992px) {
        .cart-layout { grid-template-columns: 1fr; }
        .cart-item-row { grid-template-columns: 70px 1fr 40px; gap: 12px; }
        .cart-stepper { grid-column: 2; margin-top: 8px; }
        .cart-item-subtotal { grid-column: 2; font-size: 0.95rem; }
    }
</style>
@endsection

@section('content')
<div class="cart-page-wrap">
    <h1 class="cart-title">Your Wellness Basket</h1>

    @if($items->isEmpty())
        <div style="text-align: center; padding: 80px 20px; background: #FFFFFF; border-radius: var(--radius-lg); border: 1px solid var(--color-sage-border);">
            <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--color-sage); color: var(--color-primary); display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 20px;">
                <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <h2 style="font-family: var(--font-heading); color: var(--color-primary-dark); font-size: 1.6rem; margin-bottom: 10px;">Your basket is currently empty</h2>
            <p style="color: #64748B; max-width: 440px; margin: 0 auto 28px;">
                Awaken your daily vitality with our masterfully formulated Ayurvedic infusions.
            </p>
            <a href="{{ route('products.index') }}" class="btn-gold">
                <i class="fa-solid fa-leaf"></i> Explore Herbal Blends
            </a>
        </div>
    @else
        <div class="cart-layout">
            <!-- Items Column -->
            <div class="cart-table-card">
                <!-- Free Shipping Progress -->
                <div class="shipping-bar-box">
                    @php
                        $target = 499;
                        $remaining = max(0, $target - $subtotal);
                        $percent = min(100, ($subtotal / $target) * 100);
                    @endphp
                    <div class="shipping-bar-text">
                        <i class="fa-solid fa-truck-fast" style="color: var(--color-gold);"></i>
                        @if($remaining > 0)
                            Add <strong>₹{{ number_format($remaining, 0) }}</strong> more to unlock <strong>FREE Shipping!</strong>
                        @else
                            🎉 You have unlocked <strong>FREE Shipping!</strong>
                        @endif
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                    </div>
                </div>

                <!-- Products Table -->
                @foreach($items as $item)
                    <div class="cart-item-row" id="cart-row-{{ $item->id }}">
                        <div class="cart-img-wrap">
                            <img src="{{ asset($item->product->main_image ?: 'assets/images/mockup_product.jpg') }}" alt="{{ $item->product->name }}">
                        </div>

                        <div class="cart-item-info">
                            <h4>{{ $item->product->name }}</h4>
                            <small>₹{{ number_format($item->product->price, 0) }} each • {{ $item->product->total_bags ?: 20 }} Bags</small>
                        </div>

                        <div class="cart-stepper">
                            <button type="button" onclick="updateItemQty({{ $item->id }}, {{ $item->quantity - 1 }})">-</button>
                            <input type="text" value="{{ $item->quantity }}" readonly>
                            <button type="button" onclick="updateItemQty({{ $item->id }}, {{ $item->quantity + 1 }})">+</button>
                        </div>

                        <div class="cart-item-subtotal">
                            ₹{{ number_format($item->product->price * $item->quantity, 0) }}
                        </div>

                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-remove-item" title="Remove item">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Summary Column -->
            <div class="summary-card">
                <h3 class="summary-title">Order Summary</h3>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>₹{{ number_format($subtotal, 0) }}</span>
                </div>

                <div class="summary-row">
                    <span>Shipping</span>
                    @if($shipping == 0)
                        <span style="color: #10B981; font-weight: 700;">FREE</span>
                    @else
                        <span>₹{{ number_format($shipping, 0) }}</span>
                    @endif
                </div>

                <div class="summary-row total-row">
                    <span>Estimated Total</span>
                    <span>₹{{ number_format($total, 0) }}</span>
                </div>

                <div class="coupon-box">
                    <input type="text" placeholder="Promo code (e.g. LEAF15)" id="cart-coupon-input" value="LEAF15">
                    <button type="button" onclick="alert('Coupon LEAF15 applied! You will receive 15% discount on checkout step.')">Apply</button>
                </div>

                <a href="{{ route('checkout.index') }}" class="btn-checkout-cta" id="btn-proceed-checkout">
                    <span>Proceed to Checkout</span>
                    <i class="fa-solid fa-lock" style="font-size: 0.9rem;"></i>
                </a>

                <div style="margin-top: 20px; font-size: 0.8rem; color: #64748B; text-align: center; line-height: 1.5;">
                    <i class="fa-solid fa-shield-halved" style="color: var(--color-primary); margin-right: 4px;"></i>
                    Safe & Secure Checkout • 256-bit Encryption
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    function updateItemQty(itemId, newQty) {
        if (newQty < 1) {
            if (confirm("Remove this item from your basket?")) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ url('cart/remove') }}/${itemId}`;
                form.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="DELETE">`;
                document.body.appendChild(form);
                form.submit();
            }
            return;
        }

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`{{ url('cart/update') }}/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ quantity: newQty })
        })
        .then(() => window.location.reload())
        .catch(err => {
            console.error(err);
            window.location.reload();
        });
    }
</script>
@endsection
