@extends('layouts.app')
@section('title', 'VoltCart - Premium Electronics Store')
@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="hero-badge">
                    <i class="fas fa-bolt me-1"></i> Welcome to VoltCart
                </span>
                <h1 class="hero-title">
                    Shop the Latest <br>
                    <span class="gradient-text">Electronics</span>
                </h1>
                <p class="hero-text">
                    Discover premium smartphones, powerful laptops, and professional cameras.
                    Quality tech products with unbeatable prices and warranty.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('shop.index') }}" class="btn-primary-custom">
                        Shop Now <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <a href="#products" class="btn-outline-custom">
                        Browse Products
                    </a>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="feature-card">
                            <i class="fas fa-truck-fast"></i>
                            <div>
                                <small>Free Shipping</small>
                                <h6>On Orders $50+</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <small>Warranty</small>
                                <h6>1 Year Standard</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <i class="fas fa-headset"></i>
                            <div>
                                <small>Support</small>
                                <h6>24/7 Tech Support</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-logo-wrapper">
                    <?php $logo = Voyager::setting('admin.icon_image', ''); ?>
                    @if($logo)
                        <img src="{{ Voyager::image($logo) }}" alt="VoltCart Logo" class="main-logo">
                    @else
                        <div class="default-logo">
                            <i class="fas fa-bolt"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="wave-bottom"></div>
</section>

<!-- Products Section -->
<section id="products" class="products-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <span class="section-badge">
                    <i class="fas fa-bolt me-1"></i> Premium Collection
                </span>
                <h2 class="section-title">Featured Electronics</h2>
                <p class="section-text">Curated selection of premium tech products just for you</p>
                <div class="section-divider"></div>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('shop.show', $product->slug) }}" class="product-link">
                        <div class="product-card">
                            <div class="product-badge">
                                <span>New</span>
                            </div>
                            <div class="product-img">
                                <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
                                <div class="product-overlay">
                                    <i class="fas fa-eye"></i>
                                    <span>Quick View</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name">{{ Str::limit($product->name, 35) }}</h3>
                                <div class="product-price">
                                    <span class="current-price">${{ format($product->price) }}</span>
                                    @if($product->old_price ?? false)
                                        <span class="old-price">${{ format($product->old_price) }}</span>
                                    @endif
                                </div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(24)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No products available</p>
                </div>
            @endforelse
        </div>

        @if($products->count() > 0)
            <div class="text-center mt-5">
                <a href="{{ route('shop.index') }}" class="btn-view-all">
                    View All Products <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        @endif
    </div>
</section>

<style>
/* ========== GLOBAL STYLES ========== */
:root {
    --volt-blue: #44ACFF;
    --volt-dark: #1a1a2e;
    --volt-gray: #6c757d;
    --volt-light: #f8f9fa;
}

/* ========== HERO SECTION ========== */
.hero-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 0;
    position: relative;
    margin-top: -20px;
}

.min-vh-75 {
    min-height: 85vh;
    padding: 80px 0 60px;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(68, 172, 255, 0.1);
    color: var(--volt-blue);
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    color: var(--volt-dark);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.gradient-text {
    background: linear-gradient(135deg, #44ACFF, #89D4FF);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.hero-text {
    font-size: 1.1rem;
    color: var(--volt-gray);
    margin-bottom: 2rem;
    line-height: 1.6;
    max-width: 90%;
}

.btn-primary-custom {
    background: linear-gradient(135deg, #44ACFF, #89D4FF);
    color: white;
    padding: 12px 32px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(68, 172, 255, 0.3);
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(68, 172, 255, 0.4);
    color: white;
}

.btn-outline-custom {
    background: transparent;
    border: 2px solid #44ACFF;
    color: #44ACFF;
    padding: 12px 32px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-outline-custom:hover {
    background: linear-gradient(135deg, #44ACFF, #89D4FF);
    border-color: transparent;
    color: white;
    transform: translateY(-2px);
}

.feature-card {
    display: flex;
    align-items: center;
    gap: 12px;
    background: white;
    padding: 12px 16px;
    border-radius: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.feature-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 20px rgba(68, 172, 255, 0.15);
}

.feature-card i {
    font-size: 1.5rem;
    color: #44ACFF;
}

.feature-card small {
    font-size: 0.7rem;
    color: #6c757d;
    display: block;
}

.feature-card h6 {
    font-size: 0.85rem;
    font-weight: 700;
    margin: 0;
    color: #1a1a2e;
}

/* ========== HERO LOGO ========== */
.hero-logo-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    animation: float 4s ease-in-out infinite;
}

.main-logo {
    max-width: 280px;
    width: 100%;
    height: auto;
    filter: drop-shadow(0 10px 25px rgba(68, 172, 255, 0.2));
    transition: all 0.3s ease;
}

.main-logo:hover {
    transform: scale(1.02);
    filter: drop-shadow(0 15px 35px rgba(68, 172, 255, 0.3));
}

.default-logo {
    width: 250px;
    height: 250px;
    background: linear-gradient(135deg, rgba(68,172,255,0.1), rgba(137,212,255,0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.default-logo i {
    font-size: 6rem;
    color: #44ACFF;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

.wave-bottom {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    height: 70px;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='1' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
    background-size: cover;
    background-repeat: no-repeat;
}

/* ========== PRODUCTS SECTION ========== */
.products-section {
    padding: 80px 0;
    background: white;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(68, 172, 255, 0.1);
    color: #44ACFF;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #1a1a2e;
    margin-bottom: 1rem;
}

.section-text {
    color: #6c757d;
    font-size: 1rem;
}

.section-divider {
    width: 60px;
    height: 3px;
    background: linear-gradient(135deg, #44ACFF, #89D4FF);
    margin: 20px auto 0;
    border-radius: 3px;
}

.product-link {
    text-decoration: none;
}

.product-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    position: relative;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(68, 172, 255, 0.15);
}

.product-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 2;
}

.product-badge span {
    background: linear-gradient(135deg, #FE9EC7, #ff6b9d);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
}

.product-img {
    position: relative;
    height: 240px;
    overflow: hidden;
    background: #f5f5f5;
}

.product-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card:hover .product-img img {
    transform: scale(1.05);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(68, 172, 255, 0.9);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    opacity: 0;
    transition: all 0.3s ease;
    color: white;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.product-overlay i {
    font-size: 1.8rem;
}

.product-overlay span {
    font-size: 0.8rem;
    font-weight: 500;
}

.product-info {
    padding: 1.2rem;
}

.product-name {
    font-size: 0.95rem;
    font-weight: 600;
    color: #1a1a2e;
    margin-bottom: 0.5rem;
    line-height: 1.4;
    min-height: 48px;
}

.product-price {
    display: flex;
    align-items: baseline;
    gap: 8px;
    margin-bottom: 0.5rem;
}

.current-price {
    font-size: 1.2rem;
    font-weight: 700;
    color: #44ACFF;
}

.old-price {
    font-size: 0.85rem;
    color: #999;
    text-decoration: line-through;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 4px;
}

.product-rating i {
    font-size: 0.7rem;
    color: #ffc107;
}

.product-rating span {
    font-size: 0.7rem;
    color: #999;
    margin-left: 4px;
}

.btn-view-all {
    display: inline-flex;
    align-items: center;
    background: transparent;
    border: 2px solid #44ACFF;
    color: #44ACFF;
    padding: 12px 32px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-view-all:hover {
    background: linear-gradient(135deg, #44ACFF, #89D4FF);
    border-color: transparent;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(68, 172, 255, 0.3);
}

.btn-view-all i {
    transition: transform 0.3s ease;
}

.btn-view-all:hover i {
    transform: translateX(5px);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .min-vh-75 {
        min-height: auto;
        padding: 60px 0 40px;
    }

    .hero-title {
        font-size: 2.5rem;
    }

    .hero-text {
        max-width: 100%;
    }

    .main-logo {
        max-width: 220px;
    }

    .default-logo {
        width: 200px;
        height: 200px;
    }

    .default-logo i {
        font-size: 5rem;
    }
}

@media (max-width: 768px) {
    .min-vh-75 {
        padding: 50px 0 30px;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-text {
        font-size: 1rem;
    }

    .btn-primary-custom,
    .btn-outline-custom {
        padding: 10px 24px;
        font-size: 0.9rem;
    }

    .feature-card {
        padding: 10px 12px;
    }

    .feature-card i {
        font-size: 1.2rem;
    }

    .main-logo {
        max-width: 180px;
    }

    .default-logo {
        width: 160px;
        height: 160px;
    }

    .default-logo i {
        font-size: 4rem;
    }

    .products-section {
        padding: 50px 0;
    }

    .section-title {
        font-size: 1.8rem;
    }

    .product-img {
        height: 200px;
    }

    .product-name {
        font-size: 0.85rem;
        min-height: 40px;
    }

    .current-price {
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 1.6rem;
    }

    .feature-card h6 {
        font-size: 0.75rem;
    }

    .main-logo {
        max-width: 140px;
    }

    .default-logo {
        width: 120px;
        height: 120px;
    }

    .default-logo i {
        font-size: 3rem;
    }

    .product-img {
        height: 180px;
    }
}
</style>

@endsection
