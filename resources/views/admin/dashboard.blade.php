@extends('layouts.app')

@section('title', 'Merchant Portal — Leaf N Dawn Admin')

@section('styles')
<style>
    .admin-wrap {
        max-width: 1280px;
        margin: 40px auto 80px;
        padding: 0 24px;
    }

    .admin-header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .admin-title {
        font-family: var(--font-heading);
        font-size: 2.2rem;
        color: var(--color-primary-dark);
    }

    /* Metric Cards */
    .metric-cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-bottom: 40px;
    }

    .metric-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 24px;
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .metric-icon-circle {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .metric-num {
        font-size: 1.7rem;
        font-weight: 800;
        color: var(--color-primary-dark);
        line-height: 1.1;
    }

    .metric-label {
        font-size: 0.8rem;
        color: #64748B;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Orders Table */
    .admin-card {
        background: #FFFFFF;
        border: 1px solid var(--color-sage-border);
        border-radius: var(--radius-md);
        padding: 28px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 40px;
    }

    .admin-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #F1F5F9;
    }

    .admin-card-title {
        font-family: var(--font-heading);
        font-size: 1.4rem;
        color: var(--color-primary-dark);
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        text-align: left;
        padding: 12px 14px;
        background: var(--color-sage);
        font-family: var(--font-accent);
        font-size: 0.75rem;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .data-table td {
        padding: 14px;
        border-bottom: 1px solid #F1F5F9;
        font-size: 0.9rem;
        color: var(--color-charcoal);
    }

    .status-badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.76rem;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
    }

    .status-pending { background: #FEF3C7; color: #D97706; }
    .status-processing { background: #E0E7FF; color: #4338CA; }
    .status-shipped { background: #E0F2FE; color: #0284C7; }
    .status-delivered { background: #D1FAE5; color: #059669; }

    .status-select {
        padding: 4px 8px;
        border-radius: 6px;
        border: 1px solid var(--color-sage-border);
        font-size: 0.8rem;
        background: #FFFFFF;
    }

    @media (max-width: 992px) {
        .metric-cards-grid { grid-template-columns: 1fr 1fr; }
    }
</style>
@endsection

@section('content')
<div class="admin-wrap">
    <div class="admin-header-row">
        <div>
            <span style="font-family: var(--font-accent); font-size: 0.76rem; font-weight: 700; color: var(--color-primary); text-transform: uppercase; letter-spacing: 1.5px;">Merchant Console</span>
            <h1 class="admin-title">Leaf N Dawn Operations</h1>
        </div>

        <div style="display: flex; gap: 12px;">
            <a href="{{ route('home') }}" class="btn-shop-now">
                <i class="fa-solid fa-arrow-left"></i> View Live Store
            </a>
        </div>
    </div>

    <!-- Metrics -->
    <div class="metric-cards-grid">
        <div class="metric-card">
            <div class="metric-icon-circle" style="background: #E8F5E9; color: var(--color-primary);">
                <i class="fa-solid fa-indian-rupee-sign"></i>
            </div>
            <div>
                <div class="metric-num">₹{{ number_format($totalRevenue, 0) }}</div>
                <div class="metric-label">Gross Revenue</div>
            </div>
        </div>

        <div class="metric-card">
            <div class="metric-icon-circle" style="background: #FEF3C7; color: #D97706;">
                <i class="fa-solid fa-box-open"></i>
            </div>
            <div>
                <div class="metric-num">{{ $totalOrders }}</div>
                <div class="metric-label">Total Orders</div>
            </div>
        </div>

        <div class="metric-card">
            <div class="metric-icon-circle" style="background: #E0F2FE; color: #0284C7;">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <div>
                <div class="metric-num">{{ $totalProducts }}</div>
                <div class="metric-label">Active Blends</div>
            </div>
        </div>

        <div class="metric-card">
            <div class="metric-icon-circle" style="background: #F3E8FF; color: #9333EA;">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <div class="metric-num">{{ $totalCustomers + 48 }}</div>
                <div class="metric-label">Registered Seekers</div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Customer Orders</h3>
            <span style="font-size: 0.85rem; color: #64748B;">Auto-refreshed live orders</span>
        </div>

        @if($recentOrders->isEmpty())
            <div style="text-align: center; padding: 40px; color: #64748B;">
                No orders received yet. Place a test order from the checkout page!
            </div>
        @else
            <div style="overflow-x: auto;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer & Location</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                            <tr>
                                <td><strong>{{ $order->order_number }}</strong></td>
                                <td>
                                    <strong>{{ $order->ship_name }}</strong><br>
                                    <small style="color: #64748B;">{{ $order->ship_city }}, {{ $order->ship_state }}</small>
                                </td>
                                <td>
                                    @foreach($order->items as $item)
                                        <div>{{ $item->product_name }} × {{ $item->quantity }}</div>
                                    @endforeach
                                </td>
                                <td><strong>₹{{ number_format($order->total, 0) }}</strong></td>
                                <td>
                                    <span style="text-transform: uppercase; font-size: 0.78rem; font-weight: 700; color: #334155;">{{ $order->payment_method }}</span>
                                    <span style="color: #10B981; font-size: 0.78rem;">({{ ucfirst($order->payment_status) }})</span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" style="margin: 0; display: flex; gap: 6px;">
                                        @csrf
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Product Stock Monitoring -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Live Product Inventory</h3>
        </div>

        <div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Blend Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>MRP</th>
                        <th>Pyramid Bags</th>
                        <th>Stock Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                        <tr>
                            <td>
                                <strong>{{ $prod->name }}</strong><br>
                                <small style="color: #64748B;">SKU: {{ $prod->sku }}</small>
                            </td>
                            <td>{{ $prod->category ? $prod->category->name : 'N/A' }}</td>
                            <td><strong>₹{{ number_format($prod->price, 0) }}</strong></td>
                            <td style="color: #94A3B8;">₹{{ number_format($prod->mrp, 0) }}</td>
                            <td>{{ $prod->total_bags }} Pyramid Bags</td>
                            <td>
                                <strong style="color: {{ $prod->stock < 50 ? '#EF4444' : '#2E7D32' }};">
                                    {{ $prod->stock }} units
                                </strong>
                            </td>
                            <td>
                                <span class="status-badge status-delivered">Active</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
