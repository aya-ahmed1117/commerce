

@extends('frontend.layouts.aboutmaster')
@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .store, .cart {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        display: inline-block;
        vertical-align: top;
    }

    h2 {
        margin-top: 0;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    button {
        margin-left: 10px;
    }

    </style>

<h1>مثال عربة تسوق</h1>
<div class="store">
    <h2>المنتجات</h2>
    <ul id="product-list">
        <li data-id="1" data-name="المنتج 1" data-price="10.00">المنتج 1 - $10.00 <button class="add-to-cart">إضافة إلى السلة</button></li>
        <li data-id="2" data-name="المنتج 2" data-price="20.00">المنتج 2 - $20.00 <button class="add-to-cart">إضافة إلى السلة</button></li>
        <li data-id="3" data-name="المنتج 3" data-price="30.00">المنتج 3 - $30.00 <button class="add-to-cart">إضافة إلى السلة</button></li>
    </ul>
</div>

<div class="cart">
    <h2>السلة</h2>
    <ul id="cart-list"></ul>
    <button id="submit-cart">شراء</button>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const cartList = document.getElementById('cart-list');
    const submitCartButton = document.getElementById('submit-cart');

    // Load cart from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    updateCartUI();

    // Add event listeners to "إضافة إلى السلة" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const li = this.parentElement;
            const product = {
                id: li.getAttribute('data-id'),
                name: li.getAttribute('data-name'),
                price: li.getAttribute('data-price')
            };
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
        cartList.innerHTML = '';
        cart.forEach((item, index) => {
            const li = document.createElement('li');
            li.textContent = `${item.name} - $${item.price} x ${item.quantity}`;
            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.addEventListener('click', function() {
                removeFromCart(index);
            });
            li.appendChild(removeButton);
            cartList.appendChild(li);
        });
    }

    // Remove item from cart
    function removeFromCart(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartUI();
    }

    // Submit cart
    submitCartButton.addEventListener('click', function() {
        if (cart.length === 0) {
            alert('السلة فارغه!');
            return;
        }

        const cartData = cart.map(item => ({
            product_id: item.id,
            price: item.price,
            quantity: item.quantity
        }));

        // For demonstration, we'll just log the cart data and clear it
        console.log('Cart submitted:', cartData);
        alert('تم التنفيذ, شوفي الconsole');

        cart = [];
        localStorage.removeItem('cart');
        updateCartUI();
    });
});

</script>
@endsection