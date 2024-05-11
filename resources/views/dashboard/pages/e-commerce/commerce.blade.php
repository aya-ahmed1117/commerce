@extends('dashboard.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            <form action="{{ route('add.cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="number" name="quantities" min="1" required>
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    @endforeach

    {{-- @foreach ($cartItems as $cartItem)
        <div class="cart-item">
            <p>Quantity: {{ $cartItem->quantity }}</p>
            <form action="{{ route('cart.remove', $cartItem->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Remove from Cart</button>
            </form>
        </div>
    @endforeach --}}


{{-- <pre>{{ json_encode($jsonData) }}</pre> --}}
{{-- <h1>Shopping Cart</h1>
<div id="cart" class="cart">
    <!-- Cart items will be displayed here -->
</div>

<!-- Include JavaScript for the shopping cart -->
<script src="{{ asset('product.js') }}"></script>
<script>
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
