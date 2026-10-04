@extends('layouts.app')

@section('title', 'Order Confirmed — Leaf N Dawn')

@section('styles')
<style>
    .success-wrap {
        max-width: 860px;
        margin: 50px auto 100px;
        padding: 0 24px;
        text-align: center;
    }

    .success-icon-badge {
        width: 88px;
        height: 88px;
        background: #E8F5E9;
        border: 2px solid #81C784;
        border-radius: 50%;
        color: #2E7D32;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 24px;
        box-shadow: 0 10px 30px rgba(46, 125, 50, 0.2);
    }

    .success-title {
        font-family: var(--font-heading);
        font-size: 2.6rem;
        color: var(--color-primary-dark);
        margin-bottom: 12px;
    }

    .order-badge-pill {
        display: inline-block;
        background: var(--color-sage);
        border: 1px solid var(--color-sage-border);
        padding: 8px 22px;
        border-radius: 30px;
        font-family: var(--font-accent);
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 0.95rem;
        margin-bottom: 36px;
    }

    .order-invoice-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 36px;
        text-align: left;
        box-shadow: var(--shadow-sm);
        margin-bottom: 36px;
    }

    .invoice-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 28px;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid #F1F5F9;
    }

    .invoice-col h4 {
        font-family: var(--font-accent);
        font-size: 0.76rem;
        color: #64748B;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .invoice-col p {
        color: var(--color-charcoal);
        font-size: 0.94rem;
        line-height: 1.6;
    }

    .invoice-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 24px;
    }

    .invoice-table th {
        text-align: left;
        padding: 10px 0;
        font-family: var(--font-accent);
        font-size: 0.78rem;
        color: #64748B;
        text-transform: uppercase;
        border-bottom: 1px solid #E2E8F0;
    }

    .invoice-table td {
        padding: 14px 0;
        border-bottom: 1px solid #F1F5F9;
        font-size: 0.92rem;
        color: var(--color-charcoal);
    }

    .invoice-totals {
        margin-left: auto;
        width: 280px;
    }

    .invoice-total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 0.92rem;
        color: #64748B;
    }

    .invoice-total-row.grand {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--color-primary-dark);
        border-top: 2px dashed #CBD5E1;
        padding-top: 10px;
        margin-top: 10px;
    }

    .next-steps-box {
        background: #F8FAF8;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-sm);
        padding: 20px 24px;
        margin-top: 24px;
        display: flex;
        gap: 16px;
        align-items: center;
    }

    .next-steps-box i {
        font-size: 1.8rem;
        color: var(--color-primary);
    }

    .success-actions {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    @media (max-width: 640px) {
        .invoice-grid { grid-template-columns: 1fr; }
        .invoice-totals { width: 100%; }
    }
</style>
@endsection

@section('content')
<div class="success-wrap">
    <div class="success-icon-badge">
        <i class="fa-solid fa-check"></i>
    </div>

    <h1 class="success-title">Order Confirmed!</h1>
    <p style="color: #64748B; font-size: 1.05rem; margin-bottom: 16px;">
        Thank you, <strong>{{ $order->ship_name }}</strong>. Your artisanal teas are being freshly packed.
    </p>

    <div class="order-badge-pill">
        Order Reference: <strong>{{ $order->order_number }}</strong>
    </div>

    <div class="order-invoice-card">
        <div class="invoice-grid">
            <div class="invoice-col">
                <h4>Shipping To</h4>
                <p>
                    <strong>{{ $order->ship_name }}</strong><br>
                    {{ $order->ship_address }}<br>
                    {{ $order->ship_city }}, {{ $order->ship_state }} - {{ $order->ship_pincode }}<br>
                    Phone: {{ $order->ship_phone }}
                </p>
            </div>

            <div class="invoice-col">
                <h4>Payment & Status</h4>
                <p>
                    <strong>Method:</strong> {{ strtoupper($order->payment_method) }}<br>
                    <strong>Payment Status:</strong> <span style="color: #2E7D32; font-weight: 700;">{{ ucfirst($order->payment_status) }}</span><br>
                    <strong>Order Status:</strong> <span style="background: #E8F5E9; padding: 2px 8px; border-radius: 4px; font-weight: 600;">{{ ucfirst($order->status) }}</span><br>
                    <strong>Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}
                </p>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item Description</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: right;">Price</th>
                    <th style="text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->product_name }}</strong>
                        </td>
                        <td style="text-align: center;">{{ $item->quantity }}</td>
                        <td style="text-align: right;">₹{{ number_format($item->price, 0) }}</td>
                        <td style="text-align: right;"><strong>₹{{ number_format($item->subtotal, 0) }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="invoice-totals">
            <div class="invoice-total-row">
                <span>Subtotal</span>
                <span>₹{{ number_format($order->subtotal, 0) }}</span>
            </div>
            @if($order->discount > 0)
                <div class="invoice-total-row" style="color: #2E7D32;">
                    <span>Discount</span>
                    <span>- ₹{{ number_format($order->discount, 0) }}</span>
                </div>
            @endif
            <div class="invoice-total-row">
                <span>Shipping</span>
                <span>{{ $order->shipping == 0 ? 'FREE' : '₹' . number_format($order->shipping, 0) }}</span>
            </div>
            <div class="invoice-total-row grand">
                <span>Total Paid</span>
                <span>₹{{ number_format($order->total, 0) }}</span>
            </div>
        </div>

        <div class="next-steps-box">
            <i class="fa-solid fa-box-open"></i>
            <div>
                <strong style="color: var(--color-primary-dark); font-size: 0.95rem; display: block;">What Happens Next?</strong>
                <span style="font-size: 0.88rem; color: #475569;">
                    Our herbal apothecary will carefully inspect and seal your tea batch within 24 hours. A tracking link will be sent to your phone via SMS/WhatsApp.
                </span>
            </div>
        </div>
    </div>

    <div class="success-actions">
        <a href="{{ route('home') }}" class="btn-shop-now">
            <i class="fa-solid fa-house"></i> Return to Homepage
        </a>
        <a href="{{ route('products.index') }}" class="btn-gold">
            <i class="fa-solid fa-leaf"></i> Browse More Teas
        </a>
        <button onclick="window.print()" class="btn-card-cart" style="padding: 10px 24px; border-radius: 30px;">
            <i class="fa-solid fa-print"></i> Print Receipt
        </button>
    </div>
</div>
@endsection
