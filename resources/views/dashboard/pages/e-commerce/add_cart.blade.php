@extends('dashboard.layouts.app')

@section('content')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

<title>Shopping Cart</title>
    <style>
        /* CSS styles for the shopping cart */
        .cart {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .cart-item {
            margin-bottom: 10px;
        }
        .cart-item img {
            width: 50px;
            height: 50px;
            vertical-align: middle;
        }
        .cart-item-name {
            margin-left: 10px;
        }
    </style>
</head>

<h1>Products</h1>

@foreach ($Products as $product)
    <div class="product">
        <h2>{{ $product->name }}</h2>
        <p>Price: ${{ $product->price }}</p>
        <form action="{{ route('cart.add') }}" class="theme-form" method="post">
            @csrf
            <input type="" name="order_id" value="{{ $product->id }}">
            <input type="number" name="quantity" value="1" min="1" required>
            <button type="submit">Add to Cart</button>
        </form>
    </div>
@endforeach

@foreach ($cartItems as $cartItem)
<div class="form-group">
    <input type="text"data-role="tagsinput"   class="form-control">
        <div class="cart-item">
            <h2>{{ $cartItem->product->name }}</h2>
            <p>Quantity: {{ $cartItem->quantity }}</p>
            <form action="{{ route('cart.remove', $cartItem->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Remove from Cart</button>
            </form>
        </div>
    @endforeach


<!-- Include JavaScript for the shopping cart -->
{{-- <script src="{{ asset('product.js') }}"></script> --}}
{{-- <script>
    // Add CSRF token to AJAX requests
$(document).ready(function() {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
});
</script> --}}

@endsection
