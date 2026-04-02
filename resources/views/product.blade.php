@extends('layouts.app')
@section('title', $product->name)
@section('content')

<div class="container" style="margin-top: 80px;">
    <div class="row" style="margin-bottom: 3em">
        <div class="col-md-5">
            <div class="product-main-image">
                <img src="{{ productImage($product->image) }}" width="100%" id="current-image" style="border-radius: 10px;">
            </div>
            @if ($images)
            <div class="product-thumbnails mt-3">
                <img src="{{ productImage($product->image) }}" class="product-thumbnail active" style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px; cursor: pointer; margin-right: 8px;">
                @foreach ($images as $image)
                    <img src="{{ productImage($image) }}" class="product-thumbnail" style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px; cursor: pointer; margin-right: 8px;">
                @endforeach
            </div>
            @endif
        </div>

        <div class="col-md-6 offset-md-1">
            <h2 class="font-weight-bold mb-3" style="color: #2c3e50;">{{ $product->name }}</h2>
            <div class="mb-3">
                <span class="badge px-3 py-2" style="background: #44ACFF; color: white; font-size: 0.9rem;">{{ $stockLevel }}</span>
            </div>
            <p class="text-muted mb-3">{{ $product->details }}</p>
            <h3 class="mb-3" style="color: #44ACFF; font-weight: bold;">${{ format($product->price) }}</h3>
            <div class="mb-4">
                {!! $product->description !!}
            </div>
            @if ($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf()
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn px-4 py-2" style="background: #44ACFF; color: white; border: none; border-radius: 8px;">
                        <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>

@include('partials.might-like')

@endsection

@push('styles')
<style>
.product-main-image {
    background: #f8f9fa;
    border-radius: 10px;
    overflow: hidden;
}

.product-thumbnail {
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.product-thumbnail:hover {
    transform: scale(1.05);
    border-color: #44ACFF;
}

.product-thumbnail.active {
    border-color: #44ACFF;
    box-shadow: 0 0 0 2px rgba(68, 172, 255, 0.3);
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function () {
    // Force the height to be as long as the width
    var w = $('#current-image').width();
    $('#current-image').css({'height': w + 'px'});

    $('.product-thumbnail').on('click', (e) => {
        $('.product-thumbnail').removeClass('active');
        $(e.currentTarget).addClass('active');
        if($(e.currentTarget).attr('src') != $('#current-image').attr('src')) {
            $('#current-image').animate({'opacity': 0}, 300, function() {
                $('#current-image').attr('src', $(e.currentTarget).attr('src'));
                $('#current-image').animate({'opacity': 1}, 400);
            });
        }
    });
});
</script>
@endpush
