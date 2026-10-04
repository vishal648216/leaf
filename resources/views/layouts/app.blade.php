<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Leaf N Dawn — Nature at its Brightest | Premium Herbal Teas')</title>
    <meta name="description" content="@yield('meta_description', 'Discover Leaf N Dawn premium herbal wellness teas crafted with 100% natural Ayurvedic botanicals. Shop Aureva Detox, Sugara Blood Sugar Care, and Royal Masala Chai.')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --color-primary: #3A7D44;
            --color-primary-dark: #2A5A31;
            --color-primary-light: #5CB85C;
            --color-gold: #F5A623;
            --color-gold-dark: #D48806;
            --color-gold-light: #FFD580;
            --color-charcoal: #1A1A2E;
            --color-slate: #4A5568;
            --color-cream: #FFFDF9;
            --color-sage: #F4F9F4;
            --color-sage-border: #D8EAD8;
            --color-white: #FFFFFF;
            --font-heading: 'Playfair Display', Georgia, serif;
            --font-body: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-accent: 'Montserrat', sans-serif;
            --shadow-sm: 0 2px 8px rgba(26, 26, 46, 0.06);
            --shadow-md: 0 8px 24px rgba(26, 26, 46, 0.08);
            --shadow-lg: 0 16px 40px rgba(58, 125, 68, 0.12);
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 22px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--color-cream);
            color: var(--color-charcoal);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Top Bar */
        .announcement-bar {
            background: linear-gradient(90deg, #2A5A31 0%, #3A7D44 50%, #2A5A31 100%);
            color: #FFFFFF;
            font-size: 0.82rem;
            font-weight: 500;
            text-align: center;
            padding: 9px 16px;
            letter-spacing: 0.4px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 14px;
        }

        .announcement-bar .badge {
            background: var(--color-gold);
            color: #1A1A2E;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* Header Navigation */
        .site-header {
            background: rgba(255, 253, 249, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(58, 125, 68, 0.12);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .header-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 4px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .logo-brand {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            flex-shrink: 0;
            padding: 2px 0;
        }

        .logo-brand img {
            height: 110px;
            width: auto;
            object-fit: contain;
            transition: transform 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            filter: drop-shadow(0 3px 8px rgba(0, 0, 0, 0.08));
        }

        .logo-brand:hover img {
            transform: scale(1.04);
        }

        nav {
            display: flex;
            align-items: center;
            flex: 1;
            justify-content: center;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
            flex-wrap: nowrap;
            white-space: nowrap;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            white-space: nowrap;
            flex-shrink: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--color-charcoal);
            font-weight: 600;
            font-size: 0.90rem;
            transition: var(--transition);
            position: relative;
            padding: 6px 2px;
            white-space: nowrap;
            display: inline-block;
            letter-spacing: 0.2px;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background: var(--color-primary);
            transition: width 0.25s ease;
            border-radius: 2px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--color-primary);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
        }

        .search-pill {
            display: flex;
            align-items: center;
            background: #FFFFFF;
            border: 1px solid var(--color-sage-border);
            border-radius: 30px;
            padding: 6px 14px;
            gap: 8px;
            transition: var(--transition);
        }

        .search-pill:focus-within {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(58, 125, 68, 0.15);
        }

        .search-pill input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 0.84rem;
            width: 120px;
            color: var(--color-charcoal);
            transition: width 0.25s ease;
        }

        .search-pill:focus-within input {
            width: 160px;
        }

        .search-pill button {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--color-primary);
            font-size: 0.85rem;
        }

        .action-btn {
            background: #FFFFFF;
            border: 1px solid var(--color-sage-border);
            border-radius: 50%;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-charcoal);
            text-decoration: none;
            position: relative;
            transition: var(--transition);
            font-size: 1.05rem;
        }

        .action-btn:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .cart-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--color-gold);
            color: #1A1A2E;
            font-size: 0.7rem;
            font-weight: 700;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(245, 166, 35, 0.4);
        }

        .btn-shop-now {
            background: linear-gradient(135deg, var(--color-primary) 0%, #2A5A31 100%);
            color: #FFFFFF;
            padding: 10px 22px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(58, 125, 68, 0.25);
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-shop-now:hover {
            background: linear-gradient(135deg, #4A9A55 0%, var(--color-primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(58, 125, 68, 0.35);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dark) 100%);
            color: #1A1A2E;
            padding: 11px 24px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.92rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(245, 166, 35, 0.3);
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 166, 35, 0.45);
        }

        /* Global Section Utilities */
        .section-wrap {
            max-width: 1320px;
            margin: 70px auto 90px;
            padding: 0 24px;
        }

        .section-header {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 48px;
        }

        .section-tag {
            font-family: var(--font-accent);
            font-size: 0.80rem;
            font-weight: 700;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 1.8px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .section-title {
            font-family: var(--font-heading);
            font-size: 2.6rem;
            font-weight: 700;
            color: var(--color-primary-dark);
            line-height: 1.2;
            margin-bottom: 14px;
        }

        .section-desc {
            color: var(--color-slate);
            font-size: 1.05rem;
            line-height: 1.65;
        }

        /* Global Product Cards */
        .products-grid, .catalog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .product-card {
            background: #FFFFFF;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid var(--color-sage-border);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(42, 90, 49, 0.12);
            border-color: var(--color-primary-light);
        }

        .card-top-tag {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(26, 26, 46, 0.88);
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
            transform: scale(1.08);
        }

        .card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .card-category {
            font-family: var(--font-accent);
            font-size: 0.72rem;
            color: var(--color-primary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .card-title {
            font-family: var(--font-heading);
            font-size: 1.35rem;
            color: var(--color-primary-dark);
            margin-bottom: 8px;
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
            background: var(--color-sage);
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
            border-top: 1px solid #F1F5F9;
            margin-bottom: 18px;
        }

        .price-current {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--color-primary-dark);
        }

        .price-mrp {
            font-size: 0.95rem;
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
            border-radius: 25px;
            font-size: 0.86rem;
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
            padding: 10px;
            border-radius: 25px;
            font-size: 0.86rem;
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

        /* Flash Messages */
        .toast-container {
            max-width: 1280px;
            margin: 14px auto 0;
            padding: 0 24px;
        }

        .alert-box {
            padding: 14px 20px;
            border-radius: var(--radius-sm);
            font-size: 0.92rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fadeIn 0.3s ease;
        }

        .alert-success {
            background: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #A5D6A7;
        }

        .alert-error {
            background: #FFEBEE;
            color: #C62828;
            border: 1px solid #FFCDD2;
        }

        /* Footer */
        .site-footer {
            background: #111814;
            color: #E2E8F0;
            padding: 64px 0 24px;
            margin-top: 80px;
            border-top: 4px solid var(--color-primary);
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 48px;
        }

        .footer-col h4 {
            font-family: var(--font-heading);
            color: #FFFFFF;
            font-size: 1.25rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 34px;
            height: 2px;
            background: var(--color-gold);
        }

        .footer-brand p {
            color: #94A3B8;
            font-size: 0.92rem;
            margin-top: 14px;
            line-height: 1.7;
        }

        .footer-badges {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .cert-badge {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.72rem;
            color: #CBD5E1;
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #94A3B8;
            text-decoration: none;
            font-size: 0.92rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .footer-links a:hover {
            color: var(--color-gold);
            transform: translateX(4px);
        }

        .footer-newsletter p {
            font-size: 0.9rem;
            color: #94A3B8;
            margin-bottom: 16px;
        }

        .newsletter-form {
            display: flex;
            gap: 8px;
        }

        .newsletter-form input {
            flex: 1;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            padding: 10px 16px;
            color: #FFFFFF;
            font-size: 0.88rem;
            outline: none;
        }

        .newsletter-form input:focus {
            border-color: var(--color-gold);
        }

        .newsletter-form button {
            background: var(--color-gold);
            color: #1A1A2E;
            border: none;
            border-radius: 30px;
            padding: 10px 18px;
            font-weight: 700;
            font-size: 0.88rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-form button:hover {
            background: var(--color-gold-light);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.84rem;
            color: #64748B;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* Mobile Hamburger */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.4rem;
            color: var(--color-charcoal);
            cursor: pointer;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1200px) {
            .nav-links { gap: 14px; }
            .nav-links a { font-size: 0.85rem; }
            .search-pill input { width: 90px; }
            .search-pill:focus-within input { width: 130px; }
        }

        @media (max-width: 992px) {
            .nav-links { display: none; }
            .mobile-menu-btn { display: block; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .search-pill input { width: 100px; }
        }

        @media (max-width: 640px) {
            .footer-grid { grid-template-columns: 1fr; }
            .logo-brand img { height: 68px; }
            .announcement-bar { font-size: 0.74rem; padding: 7px 12px; }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Announcement Bar -->
    <div class="announcement-bar" id="top-announcement">
        <span class="badge">Special Offer</span>
        <span>🌿 Flat 15% OFF On Your First Order • Use Code: <strong>LEAF15</strong> • Free Shipping Above ₹499</span>
    </div>

    <!-- Header -->
    <header class="site-header" id="main-header">
        <div class="header-container">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="logo-brand" id="brand-logo-link">
                <img src="{{ asset('assets/images/logo_transparent.png') }}" alt="Leaf N Dawn — Nature at its Brightest">
            </a>

            <!-- Navigation Links -->
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" id="nav-home">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}" id="nav-shop">Our Blends</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'slimming-detox']) }}" id="nav-detox">Detox & Slimming</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'wellness-health']) }}" id="nav-sugar">Sugar Care</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'classic-spiced-teas']) }}" id="nav-chai">Masala Chai</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" id="nav-about">Our Story</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" id="nav-contact">Contact</a></li>
                </ul>
            </nav>

            <!-- Actions (Search, Cart, Admin) -->
            <div class="header-actions">
                <form action="{{ route('products.index') }}" method="GET" class="search-pill" id="header-search-form">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search teas, herbs..." id="header-search-input">
                    <button type="submit" aria-label="Submit search"><i class="fa-solid fa-arrow-right"></i></button>
                </form>

                <a href="{{ route('admin.dashboard') }}" class="action-btn" title="Admin Portal" id="btn-admin-portal">
                    <i class="fa-solid fa-sliders"></i>
                </a>

                <a href="{{ route('cart.index') }}" class="action-btn" title="View Cart" id="btn-view-cart">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="cart-badge" id="cart-item-count">0</span>
                </a>

                <button class="mobile-menu-btn" id="mobile-toggle" aria-label="Toggle menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Flash Notifications -->
    <div class="toast-container">
        @if(session('success'))
            <div class="alert-box alert-success" id="flash-success">
                <span><i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i> {{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" style="background:none;border:none;cursor:pointer;color:inherit;"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-box alert-error" id="flash-error">
                <span><i class="fa-solid fa-circle-exclamation" style="margin-right: 8px;"></i> {{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" style="background:none;border:none;cursor:pointer;color:inherit;"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Col 1: Brand Info -->
                <div class="footer-col footer-brand">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <img src="{{ asset('assets/images/logo_clean.png') }}" alt="Leaf N Dawn" style="height: 56px; border-radius: 8px; background: #FFFFFF; padding: 4px;">
                        <div>
                            <h3 style="font-family: var(--font-heading); color: #FFF; font-size: 1.35rem;">Leaf N Dawn</h3>
                            <small style="color: var(--color-gold); font-family: var(--font-accent); letter-spacing: 1.2px; font-weight: 600;">NATURE AT ITS BRIGHTEST</small>
                        </div>
                    </div>
                    <p>
                        Leaf N Dawn brings you authentic herbal infusions rooted in Ayurvedic wisdom. Sourced ethically from high-altitude estates, our pyramid tea bags preserve the pure essence of raw botanicals for daily rejuvenation.
                    </p>
                    <div class="footer-badges">
                        <span class="cert-badge"><i class="fa-solid fa-check"></i> HACCP Certified</span>
                        <span class="cert-badge"><i class="fa-solid fa-award"></i> ISO 22000:2018</span>
                        <span class="cert-badge"><i class="fa-solid fa-seedling"></i> 100% Natural</span>
                        <span class="cert-badge"><i class="fa-solid fa-leaf"></i> Biodegradable Bags</span>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="footer-col">
                    <h4>Wellness Blends</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('products.show', 'aureva-slimming-detox') }}"><i class="fa-solid fa-angle-right"></i> Aureva Detox Tea</a></li>
                        <li><a href="{{ route('products.show', 'sugara-blood-sugar-care') }}"><i class="fa-solid fa-angle-right"></i> Sugara Glycemic Care</a></li>
                        <li><a href="{{ route('products.show', 'masala-chai-spice-blend') }}"><i class="fa-solid fa-angle-right"></i> Royal Masala Chai</a></li>
                        <li><a href="{{ route('products.index') }}"><i class="fa-solid fa-angle-right"></i> Explore All Teas</a></li>
                    </ul>
                </div>

                <!-- Col 3: Company -->
                <div class="footer-col">
                    <h4>Customer Care</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}"><i class="fa-solid fa-angle-right"></i> Our Botanical Philosophy</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fa-solid fa-angle-right"></i> Contact Us</a></li>
                        <li><a href="{{ route('cart.index') }}"><i class="fa-solid fa-angle-right"></i> Track My Basket</a></li>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-angle-right"></i> Admin Dashboard</a></li>
                    </ul>
                </div>

                <!-- Col 4: Newsletter & Contact -->
                <div class="footer-col footer-newsletter">
                    <h4>Join the Herbal Circle</h4>
                    <p>Subscribe for exclusive herbal wellness secrets, doctor advice & seasonal harvests.</p>
                    <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Welcome to the Leaf N Dawn family! Your 15% discount code is LEAF15.');">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit">Join</button>
                    </form>
                    <div style="margin-top: 20px; font-size: 0.88rem; color: #94A3B8; line-height: 1.8;">
                        <div><i class="fa-solid fa-phone" style="color: var(--color-gold); margin-right: 8px;"></i> +91 92110 50888</div>
                        <div><i class="fa-solid fa-envelope" style="color: var(--color-gold); margin-right: 8px;"></i> leafndawncare@gmail.com</div>
                        <div><i class="fa-brands fa-instagram" style="color: var(--color-gold); margin-right: 8px;"></i> @leafndawn</div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div>© {{ date('Y') }} Leaf N Dawn. All Rights Reserved. Crafted with care for wellness seekers.</div>
                <div style="display: flex; gap: 16px; align-items: center;">
                    <span><i class="fa-brands fa-cc-visa"></i> Visa</span>
                    <span><i class="fa-brands fa-cc-mastercard"></i> Mastercard</span>
                    <span><i class="fa-solid fa-mobile-screen"></i> UPI / GPay / PhonePe</span>
                    <span><i class="fa-solid fa-shield-halved"></i> 256-Bit SSL Encrypted</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cart Badge Dynamic Updater Script -->
    <script>
        function updateCartCounter() {
            fetch("{{ route('cart.count') }}")
                .then(res => res.json())
                .then(data => {
                    const badge = document.getElementById('cart-item-count');
                    if (badge) {
                        badge.textContent = data.count || 0;
                    }
                })
                .catch(err => console.error("Could not fetch cart count", err));
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateCartCounter();
        });

        // Global Add To Cart Ajax Handler
        function quickAddToCart(productId, qty = 1) {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: qty
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const badge = document.getElementById('cart-item-count');
                    if (badge) badge.textContent = data.cart_count;
                    
                    // Simple Toast Notification
                    const toast = document.createElement('div');
                    toast.className = 'alert-box alert-success';
                    toast.style.position = 'fixed';
                    toast.style.bottom = '24px';
                    toast.style.right = '24px';
                    toast.style.zIndex = '9999';
                    toast.style.boxShadow = '0 10px 30px rgba(0,0,0,0.15)';
                    toast.innerHTML = `<i class="fa-solid fa-circle-check" style="margin-right:8px;"></i> ${data.message} <a href="{{ route('cart.index') }}" style="color:#1B5E20;font-weight:700;margin-left:12px;text-decoration:underline;">View Cart &rarr;</a>`;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 4000);
                }
            })
            .catch(err => {
                console.error(err);
                window.location.href = "{{ route('cart.index') }}";
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
