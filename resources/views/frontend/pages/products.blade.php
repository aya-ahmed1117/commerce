@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Products'])

    <div class="aon-shop-wrap">
        <div class="site-top-line"></div>
        <div class="container">
            <div class="product-filter-wrap d-flex justify-content-between align-items-center">
                <div class="product-filter-left d-flex">
                    <button class="shop-list-btn m-r10">
                        <i class="feather-grid"></i>
                    </button>
                    <button class="shop-list-btn m-r10">
                        <i class="feather-list"></i>
                    </button>
                    <form class="woocommerce-ordering select-box-border-style1-wrapper" method="get">
                        <select class="form-select" aria-label="Default select example">
                            <option value="menu_order">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>
                </div>
                <div class="product-filter-right d-flex align-items-center">
                    <span class="woocommerce-result-count">Milcandy <span>25, 316, 00</span> Products Available.</span>
                    <div class="aon-pro-search ">
                        <input class="form-control sf-form-control" name="company_name" type="text" placeholder="Search">
                        <button class="pro-search-btn"><i class="fs-input-icon feather-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="product-listing-area">
                {{-- <form action="{{ route('add.cart') }}" method="post">
                    @csrf --}}
                <div class="row">

                    @if (count($Products)>0)
                    @foreach ($Products as $Product)

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="{{asset("storage/$Product->image")}}" alt="">
                            </div>
                            <h4 class="aon-shop-title">{{$Product->name}}</h4>
                            <p class="aon-shop-text">{{$Product->name}}</p>
                                <input type="hidden" name="product_id" value="{{ $Product->id }}">
                                <input type="hidden" name="price" value="{{ $Product->price }}">
                                <input type="hidden" name="quantities" value="1">
                            <div class="aon-shop-bot d-flex">
                                <div class="aon-shop-price">{{$Product->price}} LE</div>

                                <div class="aon-shop-add-to d-flex" id="product-list">
                                    {{-- <button class="aon-shop-btn" type="button"><i class="fa fa-heart"></i></button> --}}
                                    {{-- <button class="aon-shop-btn" type="submit"><i class="fa fa-cart-plus"></i></button> --}}

        <button data-id="{{$Product->id}}" data-name="{{$Product->name}}" data-price="{{$Product->price}}" class="aon-shop-btn add-to-cart" type="button">
            <i class="fa fa-cart-plus"></i>
        </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <div class="aon-shop-box">
                        <h4 class="aon-shop-title"> No Data Found </h4>
                    </div>
                     @endif
                </div>
            {{-- </form> --}}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Define the updateCartCount function outside of the event listener
        function updateCartCount(cart, count) {
            const cartCountElement = document.querySelector('.cart-add-num');
            if (cartCountElement) {
                cartCountElement.textContent = count;
            }
            // Make an AJAX request to update the cart count on the server
            updateCartCountAjax(count);
        }

        // Function to make an AJAX request to update the cart count on the server
        // function updateCartCountAjax(count) {
        //     const xhr = new XMLHttpRequest();
        //     xhr.open('POST', '/your-endpoint-for-updating-cart-count');
        //     xhr.setRequestHeader('Content-Type', 'application/json');
        //     xhr.onload = function() {
        //         if (xhr.status === 200) {
        //             const response = JSON.parse(xhr.responseText);
        //             console.log('Updated cart count:', response.cartCount);
        //             // Update the cart count on the frontend
        //             updateCartCount(response.cartCount);
        //         } else {
        //             console.error('Error updating cart count:', xhr.status);
        //         }
        //     };
        //     xhr.onerror = function() {
        //         console.error('Error updating cart count:', xhr.status);
        //     };
        //     xhr.send(JSON.stringify({ count: count }));
        // }
        function updateCartCountAjax(count) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/update-cart-count'); // Update the URL here
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            console.log('Updated cart count:', response.cartCount);
            // Update the cart count on the frontend
            updateCartCount(response.cartCount);
        } else {
            console.error('Error updating cart count:', xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error('Error updating cart count:', xhr.status);
    };
    xhr.send(JSON.stringify({ count: count }));
}


        document.addEventListener('DOMContentLoaded', function() {
            const cartList = document.getElementById('cart-list');
            const submitCartButton = document.getElementById('submit-cart');

            // Load cart from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartUI();

            // Add event listeners to "إضافة إلى السلة" buttons
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const product = {
                        id: this.getAttribute('data-id'),
                        name: this.getAttribute('data-name'),
                        price: parseFloat(this.getAttribute('data-price'))
                    };

                    console.log('Product ID:', product.id);
                    console.log('Product Name:', product.name);
                    console.log('Product Price:', product.price);

                    if (!product.id || !product.name || isNaN(product.price)) {
                        console.error('Invalid product data', product);
                        alert('Error: Invalid product data');
                        return;
                    }

                    addToCart(product);
                });
            });

            // Add product to cart
            function addToCart(product) {
                const existingProduct = cart.find(item => item.id === product.id);
                if (existingProduct) {
                    existingProduct.quantity += 1;
                } else {
                    product.quantity = 1;
                    cart.push(product);
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
            }

            // Update cart UI
            function updateCartUI() {
                const cartPagePath = "{{ route('frontend.show.cart') }}";
                // Fetch cart data from server and update cart list
                fetch(cartPagePath)
                    .then(response => response.text())
                    .then(data => {
                        cartList.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error fetching cart data:', error);
                    });

                // After updating the cart UI, update the cart count
                updateCartCount(cart, cart.length);
            }

            // Remove item from cart
            function removeFromCart(index) {
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
            }

            // Update cart UI when the page loads
            updateCartUI();
        });
    </script>

@endsection
