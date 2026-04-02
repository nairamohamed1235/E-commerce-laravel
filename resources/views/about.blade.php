@extends('layouts.app')
@section('title', 'About Us - VoltCart')
@section('content')

<div class="container" style="margin-top: 80px;">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold mb-3" style="color: #44ACFF;">About VoltCart</h1>
            <div class="mx-auto" style="width: 80px; height: 3px; background: linear-gradient(135deg, #44ACFF, #89D4FF); margin-bottom: 20px;"></div>
            <p class="lead text-muted">Powering Your Tech Life with Quality Electronics</p>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h2 class="mb-4" style="color: #44ACFF;">Our Story</h2>
            <p class="text-muted" style="line-height: 1.8;">
                Founded in 2024, VoltCart was born from a simple idea: to provide high-quality electronics
                at affordable prices without compromising on customer service. We believe that everyone
                deserves access to the latest technology, and we're committed to making that a reality.
            </p>
            <p class="text-muted mt-3" style="line-height: 1.8;">
                What started as a small online store has grown into a trusted destination for tech enthusiasts
                across the country. Our passion for innovation and dedication to our customers drives everything
                we do.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <div class="p-4" style="background: linear-gradient(135deg, rgba(68,172,255,0.1), rgba(137,212,255,0.1)); border-radius: 20px;">
                <i class="fas fa-bolt" style="font-size: 80px; color: #44ACFF;"></i>
                <h3 class="mt-3" style="color: #44ACFF;">⚡ Powered by Innovation</h3>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-rocket" style="font-size: 40px; color: #44ACFF;"></i>
                    </div>
                    <h4 class="mb-3" style="color: #44ACFF;">Our Mission</h4>
                    <p class="text-muted">
                        To empower individuals with cutting-edge technology that enhances their daily lives,
                        making premium electronics accessible to everyone.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-eye" style="font-size: 40px; color: #44ACFF;"></i>
                    </div>
                    <h4 class="mb-3" style="color: #44ACFF;">Our Vision</h4>
                    <p class="text-muted">
                        To become the most trusted online destination for electronics, known for quality
                        products, exceptional service, and customer satisfaction.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Values -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 style="color: #44ACFF;">Our Core Values</h2>
            <div class="mx-auto" style="width: 60px; height: 2px; background: #89D4FF;"></div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="text-center p-3">
                <i class="fas fa-gem" style="font-size: 35px; color: #44ACFF;"></i>
                <h6 class="mt-2 font-weight-bold">Quality First</h6>
                <small class="text-muted">Premium products only</small>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="text-center p-3">
                <i class="fas fa-smile" style="font-size: 35px; color: #44ACFF;"></i>
                <h6 class="mt-2 font-weight-bold">Customer Focus</h6>
                <small class="text-muted">Your satisfaction matters</small>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="text-center p-3">
                <i class="fas fa-shield-alt" style="font-size: 35px; color: #44ACFF;"></i>
                <h6 class="mt-2 font-weight-bold">Trust & Integrity</h6>
                <small class="text-muted">Honest business practices</small>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="text-center p-3">
                <i class="fas fa-charging-station" style="font-size: 35px; color: #44ACFF;"></i>
                <h6 class="mt-2 font-weight-bold">Innovation</h6>
                <small class="text-muted">Always up to date</small>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 style="color: #44ACFF;">Why Choose VoltCart?</h2>
            <div class="mx-auto" style="width: 60px; height: 2px; background: #89D4FF;"></div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <i class="fas fa-truck-fast mt-1" style="font-size: 24px; color: #44ACFF;"></i>
                <div class="ms-3">
                    <h6 class="font-weight-bold">Free Shipping</h6>
                    <small class="text-muted">On orders over $50</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <i class="fas fa-undo-alt mt-1" style="font-size: 24px; color: #44ACFF;"></i>
                <div class="ms-3">
                    <h6 class="font-weight-bold">Easy Returns</h6>
                    <small class="text-muted">30-day return policy</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <i class="fas fa-shield-alt mt-1" style="font-size: 24px; color: #44ACFF;"></i>
                <div class="ms-3">
                    <h6 class="font-weight-bold">1 Year Warranty</h6>
                    <small class="text-muted">On all products</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <i class="fas fa-headset mt-1" style="font-size: 24px; color: #44ACFF;"></i>
                <div class="ms-3">
                    <h6 class="font-weight-bold">24/7 Support</h6>
                    <small class="text-muted">Always here to help</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <i class="fas fa-lock mt-1" style="font-size: 24px; color: #44ACFF;"></i>
                <div class="ms-3">
                    <h6 class="font-weight-bold">Secure Payments</h6>
                    <small class="text-muted">100% secure checkout</small>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-start">
                <i class="fas fa-gem mt-1" style="font-size: 24px; color: #44ACFF;"></i>
                <div class="ms-3">
                    <h6 class="font-weight-bold">Premium Quality</h6>
                    <small class="text-muted">Only the best products</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center p-5" style="background: linear-gradient(135deg, #44ACFF, #89D4FF); border-radius: 20px;">
                <h3 class="text-white mb-3">Ready to Shop?</h3>
                <p class="text-white mb-4">Discover amazing deals on the latest electronics</p>
                <a href="{{ route('shop.index') }}" class="btn btn-light px-4 py-2" style="border-radius: 8px; color: #44ACFF; font-weight: 600;">
                    Start Shopping Now <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(68, 172, 255, 0.15) !important;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }

    .card {
        margin-bottom: 1rem;
    }
}
</style>
@endpush
