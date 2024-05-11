


// fetch("products.json")
// .then(function(response){
//     return response.json();
// })
// .then(function(data){
//     localStorage.setItem("products",JSON.stringify(data));
//     if(!localStorage.getItem("cart")){
//         localStorage.setItem("cart","[]");
//     }
// })
// let products = JSON.parse(localStorage.getItem("products"));
// let cart = JSON.parse(localStorage.getItem("cart"));

// function addItemToCart(productId){
//     let product = products.find(function(item){
//        return item.id == productId;
//     });

//     if(cart.length == 0){
//        cart.push(product);
//     }else{
//        let res = cart.find(element => element.id == productId);
//        if(res === undefined){
//           cart.push(product);
//        }
//     }
//     localStorage.setItem("cart", JSON.stringify(cart));
//  }
//  addItemToCart(1); // adding the product with id=1 to the cart.
//  function removeItemFromCart(productId){
//     let tempCart = cart.filter(item => item.id != productId);
//     localStorage.setItem("cart", JSON.stringify(tempCart));
//  }
//  removeItemFromCart(1);
//  function updateQuantity(productId, quantity){
//     for(let product of cart){
//        if(product.id == productId){
//           product.quantity = quantity;
//        }
//     }
//     localStorage.setItem("cart", JSON.stringify(cart));
//  }
//  updateQuantity(1, 8);

// // Retrieve the products data from local storage
// // var storedProducts = localStorage.getItem('products');

// // // Check if there is any stored data
// // if (storedProducts) {
// //     // Parse the JSON string back to an array
// //     var products = JSON.parse(storedProducts);

// //     // Now you can use the `products` array as needed
// //     console.log(products);
// // } else {
// //     console.log('No products data found in local storage.');
// // }
// Function to get cart items from local storage
function getCartItems() {
    return JSON.parse(localStorage.getItem('cartItems')) || [];
}

// Function to save cart items to local storage
function saveCartItems(cartItems) {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

// Function to render cart items
function renderCart() {
    var cartElement = document.getElementById('cart');
    cartElement.innerHTML = ''; // Clear existing cart items
    var cartItems = getCartItems();
    cartItems.forEach(function(item) {
        var cartItemElement = document.createElement('div');
        cartItemElement.classList.add('cart-item');
        cartItemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <span class="cart-item-name">${item.name}</span>
            <span>Quantity: ${item.quantity}</span>
            <span>Price: $${item.price.toFixed(2)}</span>
        `;
        cartElement.appendChild(cartItemElement);
    });
}

// Initialize the cart
renderCart();




