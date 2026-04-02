@extends('layouts.app')
@section('title', 'Cart - VoltCart')
@section('content')

<!-- start page content -->
<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            @if (Cart::instance('default')->count() > 0)
            <h3 class="mb-4" style="color: #44ACFF;">{{ Cart::instance('default')->count() }} items in the shopping cart</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="background: #f8f9fa;">
                            <th>Product</th>
                            <th>Details</th>
                            <th>Actions</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('default')->content() as $item)
                        <tr>
                            <td style="vertical-align: middle;">
                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                    <img src="{{ productImage($item->model->image) }}" height="80px" width="80px" style="object-fit: cover; border-radius: 5px;">
                                </a>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                    <h6 class="font-weight-bold mb-1" style="color: #2c3e50;">{{ $item->model->name }}</h6>
                                    <small class="text-muted">{{ $item->model->details }}</small>
                                </a>
                            </td>
                            <td style="vertical-align: middle;">
                                <form action="{{ route('cart.destroy', [$item->rowId, 'default']) }}" method="POST" id="delete-item-{{ $item->rowId }}" style="display: inline-block;">
                                    @csrf()
                                    @method('DELETE')
                                </form>
                                <form action="{{ route('cart.save-later', $item->rowId) }}" method="POST" id="save-later-{{ $item->rowId }}" style="display: inline-block;">
                                    @csrf()
                                </form>
                                <button class="btn btn-sm px-3 mb-1" style="background: #dc3545; color: white; border: none; border-radius: 5px;" onclick="document.getElementById('delete-item-{{ $item->rowId }}').submit();">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                                <br>
                                <button class="btn btn-sm px-3 mt-1" style="background: #28a745; color: white; border: none; border-radius: 5px;" onclick="document.getElementById('save-later-{{ $item->rowId }}').submit();">
                                    <i class="fas fa-bookmark"></i> Save for later
                                </button>
                            </td>
                            <td style="vertical-align: middle;">
                                <select class='quantity form-control' style="width: 80px; border-radius: 5px; border: 1px solid #dee2e6;" data-id='{{ $item->rowId }}' data-productQuantity='{{ $item->model->quantity }}'>
                                    @for ($i = 1; $i < 10; $i++)
                                        <option class="option" value="{{ $i }}" {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td style="vertical-align: middle; color: #44ACFF; font-weight: bold;">${{ format($item->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="summary">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-muted small">
                            <i class="fas fa-info-circle"></i> Free shipping on orders over $50. Returns within 30 days.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <p class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span style="color: #44ACFF;">${{ format(Cart::subtotal()) }}</span>
                                </p>
                                <p class="d-flex justify-content-between mb-2">
                                    <span>Tax (21%):</span>
                                    <span style="color: #44ACFF;">${{ format(Cart::tax()) }}</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between mb-0 font-weight-bold">
                                    <span>Total:</span>
                                    <span style="color: #44ACFF; font-size: 1.3rem;">${{ format(Cart::total()) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-actions mt-4">
                <a class="btn px-4" style="background: #6c757d; color: white; border: none; border-radius: 8px;" href="{{ route('shop.index') }}">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
                <a class="float-right btn px-4" style="background: #44ACFF; color: white; border: none; border-radius: 8px;" href="{{ route('checkout.index') }}">
                    Proceed to checkout <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            @else
            <div class="alert alert-info text-center py-5" style="background: #f8f9fa; border: 1px solid #44ACFF; border-radius: 10px;">
                <i class="fas fa-shopping-cart fa-3x mb-3" style="color: #44ACFF;"></i>
                <h4 class="mb-3">No items in the cart</h4>
                <a class="btn px-4" style="background: #44ACFF; color: white; border: none; border-radius: 8px;" href="{{ route('shop.index') }}">Start Shopping</a>
            </div>
            @endif

            <hr class="my-5">

            @if (Cart::instance('saveForLater')->count() > 0)
                <h3 class="mb-4" style="color: #44ACFF;">{{ Cart::instance('saveForLater')->count() }} item(s) saved for later</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background: #f8f9fa;">
                                <th>Product</th>
                                <th>Details</th>
                                <th>Actions</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('saveForLater')->content() as $item)
                            <tr>
                                <td style="vertical-align: middle;">
                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                        <img src="{{ productImage($item->model->image) }}" height="80px" width="80px" style="object-fit: cover; border-radius: 5px;">
                                    </a>
                                </td>
                                <td style="vertical-align: middle;">
                                    <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                        <h6 class="font-weight-bold mb-1" style="color: #2c3e50;">{{ $item->model->name }}</h6>
                                        <small class="text-muted">{{ $item->model->details }}</small>
                                    </a>
                                </td>
                                <td style="vertical-align: middle;">
                                    <form action="{{ route('cart.destroy', [$item->rowId, 'saveForLater']) }}" method="POST" id="delete-form-{{ $item->rowId }}" style="display: inline-block;">
                                        @csrf()
                                        @method('DELETE')
                                    </form>
                                    <form action="{{ route('cart.add-to-cart', $item->rowId) }}" method="POST" id="add-form-{{ $item->rowId }}" style="display: inline-block;">
                                        @csrf()
                                    </form>
                                    <button class="btn btn-sm px-3 mb-1" style="background: #dc3545; color: white; border: none; border-radius: 5px;" onclick="document.getElementById('delete-form-{{ $item->rowId }}').submit();">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                    <br>
                                    <button class="btn btn-sm px-3 mt-1" style="background: #44ACFF; color: white; border: none; border-radius: 5px;" onclick="document.getElementById('add-form-{{ $item->rowId }}').submit();">
                                        <i class="fas fa-cart-plus"></i> Add to cart
                                    </button>
                                </td>
                                <td style="vertical-align: middle; color: #44ACFF; font-weight: bold;">${{ format($item->model->price) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4" style="background: #f8f9fa; border-radius: 10px;">
                    <i class="fas fa-heart fa-2x mb-2" style="color: #FE9EC7;"></i>
                    <p class="text-muted mb-0">No items saved for later</p>
                </div>
            @endif
        </div>
    </div>
</div>
@include('partials.might-like')
<!-- end page content -->

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function () {
    $('.quantity').on('change', function() {
        const id = this.getAttribute('data-id')
        console.log(id)
        const productQuantity = this.getAttribute('data-productQuantity')
        axios.patch('/cart/' + id, {quantity: this.value, productQuantity: productQuantity})
            .then(response => {
                console.log(response)
                window.location.href = '{{ route('cart.index') }}'
            }).catch(error => {
                window.location.href = '{{ route('cart.index') }}'
            })
    });
});

</script>

@endsection
