@extends('layouts.app')

@section('title', 'Shop - VoltCart')
@section('content')

<div class="container" style="margin-top: 80px;">
    <div class="row">
        <!-- filter section -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3" style="color: #44ACFF;">Categories</h5>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                                   class="text-decoration-none {{ $category->name == $categoryName ? 'font-weight-bold' : '' }}"
                                   style="color: {{ $category->name == $categoryName ? '#44ACFF' : '#6c757d' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

    
                </div>
            </div>
        </div>

        <!-- products section -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 font-weight-bold" style="color: #44ACFF;">{{ $categoryName }}</h4>
                <div>
                    <span class="text-muted mr-2">Sort by:</span>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'tag'=> request()->tag, 'sort' => 'low_high']) }}"
                       class="text-decoration-none mr-2 {{ request()->sort == 'low_high' ? 'font-weight-bold' : '' }}"
                       style="color: {{ request()->sort == 'low_high' ? '#44ACFF' : '#6c757d' }}">
                        Low to High
                    </a>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'tag'=> request()->tag, 'sort' => 'high_low']) }}"
                       class="text-decoration-none {{ request()->sort == 'high_low' ? 'font-weight-bold' : '' }}"
                       style="color: {{ request()->sort == 'high_low' ? '#44ACFF' : '#6c757d' }}">
                        High to Low
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="{{ route('shop.show', $product->slug) }}" class="text-decoration-none">
                                <img src="{{ productImage($product->image) }}"
                                     class="card-img-top"
                                     alt="{{ $product->name }}"
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h6 class="card-title text-dark mb-2">{{ $product->name }}</h6>
                                    <p class="card-text font-weight-bold mb-3" style="color: #44ACFF;">${{ format($product->price) }}</p>
                                    <button class="btn btn-sm w-100 add-to-cart-btn"
                                            style="background: #44ACFF; color: white; border: none;"
                                            data-product-id="{{ $product->id }}"
                                            data-product-name="{{ $product->name }}"
                                            data-product-price="{{ $product->price }}">
                                        <i class="fas fa-cart-plus mr-1"></i> Add to Cart
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* تصغير أزرار pagination */
.pagination {
    display: flex;
    gap: 5px;
    margin: 0;
    padding: 0;
}

.pagination .page-item {
    list-style: none;
}

.pagination .page-link {
    padding: 5px 10px;
    font-size: 13px;
    border-radius: 5px;
    color: #44ACFF;
    border: 1px solid #dee2e6;
    background: white;
}

.pagination .page-item.active .page-link {
    background: #44ACFF;
    border-color: #44ACFF;
    color: white;
}

.pagination .page-link:hover {
    background: #89D4FF;
    color: white;
    border-color: #89D4FF;
}
</style>
@endpush

@push('scripts')
<script>
// Add to cart functionality
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const id = parseInt(this.dataset.productId);
            const name = this.dataset.productName;
            const price = parseFloat(this.dataset.productPrice);

            if (typeof addToCart === 'function') {
                addToCart(id, name, price, this);
            } else {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                const existing = cart.find(item => item.id === id);

                if (existing) {
                    existing.quantity++;
                } else {
                    cart.push({ id, name, price, quantity: 1 });
                }

                localStorage.setItem('cart', JSON.stringify(cart));
                alert(name + ' added to cart!');

                if (typeof updateCartUI === 'function') {
                    updateCartUI();
                }
            }
        });
    });
});
</script>
@endpush
