

@extends('frontend.layouts.aboutmaster')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="page-content">
        <!-- Banner Area -->
        <div class="aon-page-benner-area2">
          <div class="aon-page-banner-row2">
            <div class="aon-page-benner-overlay2"></div>
            <div class="sf-banner-heading-wrap2">
              <div class="sf-banner-heading-area2">
                <div class="sf-banner-breadcrumbs-nav2">
                  <ul class="list-inline">
                    <li><a href="index.html"> Home </a></li>
                    <li>Cart</li>
                  </ul>
                </div>
                <div class="sf-banner-heading-large2">Cart Page</div>
              </div>
              <div class="sf-banner-vid-section">
                <div class="video-play-btn2">
                  <a
                    class="mfp-video"
                    href="https://www.youtube.com/watch?v=c1XNqw2gSbU">
                    <i class="fa fa-play"></i>
                  </a>
                  <span>Watch Now <br />Companey Details</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Area End -->

        <!-- Testimonial section -->
        <section class="aon-innerpage-area">
          <div class="site-top-line"></div>
          <div class="container">
            <div class="section-content">
              <div id="no-more-tables">
                <table class="cf shopping-table">
                  <thead class="cf">
                    <tr>
                      <th>Product</th>
                      <th class="numeric">Price</th>
                      <th class="numeric">Qty</th>
                      <th class="numeric">Subtotal</th>
                      <th class="numeric"></th>
                    </tr>
                  </thead>
                  <tbody id="cart-body">


                  </tbody>
                  <tfoot>
                    <tr>
                        <td colspan="3">Total:</td>
                        <td id="total"></td>
                    </tr>
                </tfoot>
                      {{-- <script type="text/javascript">
        let cart = JSON.parse(localStorage.getItem('cart'));
        console.log(cart);

        function appendListItemsToBody(data) {
            var tbody = document.getElementById('cart-body');
            data.forEach(function(item) {
                var tr = document.createElement('tr');

                // Create td elements for name and price
                var nameCell = document.createElement('td');
                nameCell.textContent = item.name;
                tr.appendChild(nameCell);

                var priceCell = document.createElement('td');
                priceCell.textContent = item.price;
                tr.appendChild(priceCell);

                // Create input element for quantity
                var quantityCell = document.createElement('td');
                var quantityInput = document.createElement('input');
                quantityInput.setAttribute('type', 'number');
                quantityInput.setAttribute('value', item.quantity);
                quantityInput.setAttribute('data-price', item.price);
                quantityInput.setAttribute('class', 'quantity');
                quantityInput.setAttribute('name', 'quantity');
                quantityInput.disabled = true; // Disabled by default
                quantityCell.appendChild(quantityInput);
                tr.appendChild(quantityCell);

                tbody.appendChild(tr);
            });
        }

        appendListItemsToBody(cart);
    </script> --}}
                </table>
                <button id="submit-cart">Submit Cart</button>


              </div>


              {{-- @foreach ($Products as $product) {{ route('check.out') }}--}}
              <div class="product">
                  <form action="" method="post">
                     {{-- - @csrf --}}


                <div class="col-md-6">
                  <div class="cart-total-table shopping-cart-total">
                    <div class="sub_total">
                      <h4>Check Out</h4>
                      <ul class="top">
                        <li>Total before discount</li>
                        <li><span></span></li>
                        <li>Discount</li>
                        <li><span>5445885850
                    </span></li>
                        <li>Subtotal</li>
                        <li><span>

                  <input type="hidden" name="total_amount"
                    value="">
                        </span>
                    </li>
                      </ul>
                      <div class="total">
                        <ul>
                          <li>Total</li>
                          <li><span></span></li>
                        </ul>
                      </div>
                      <input type="hidden" name="order" value="">
                      <div class="proceed-to-checkout"id="cart-list">
                        <button id="submit-cart" type="submit"class="site-button-secondry" style="color: white;">
                            Proceed to checkout <i class="fa fa-angle-right"></i></button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>


          </form>

      </div>


            </div>
          </div>
        </section>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                const submitCartButton = document.getElementById('submit-cart');
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                const cartBody = document.getElementById('cart-body');
                const totalElement = document.getElementById('total');

                function appendListItemToBody(item) {
                    var tr = document.createElement('tr');

                    var nameCell = document.createElement('td');
                    nameCell.textContent = item.name;
                    tr.appendChild(nameCell);

                    var priceCell = document.createElement('td');
                    priceCell.textContent = item.price;
                    tr.appendChild(priceCell);

                    var quantityCell = document.createElement('td');

                    var addButton = document.createElement('button');
                    addButton.textContent = '+';
                    addButton.className = 'btn btn-primary bootstrap-touchspin-up';
                    addButton.addEventListener('click', function() {
                        var quantityDisplay = this.parentElement.querySelector('.quantity-display');
                        var quantity = parseInt(quantityDisplay.textContent);
                        updateQuantity(quantity + 1, quantityDisplay);
                    });
                    quantityCell.appendChild(addButton);

                    var quantityDisplay = document.createElement('span');
                    quantityDisplay.textContent = item.quantity;
                    quantityDisplay.className = 'quantity';

                    quantityDisplay.setAttribute('type', 'number');
                    quantityDisplay.setAttribute('value', item.quantity);
                    quantityDisplay.setAttribute('data-price', item.price);
                    // quantityDisplay.setAttribute('class', 'quantity');
                    quantityDisplay.setAttribute('name', 'quantity');

                    quantityCell.appendChild(quantityDisplay);

                    var subtractButton = document.createElement('button');
                    subtractButton.textContent = '-';
                    subtractButton.className = 'btn btn-primary bootstrap-touchspin-down';
                    subtractButton.addEventListener('click', function() {
                        var quantityDisplay = this.parentElement.querySelector('.quantity-display');
                        var quantity = parseInt(quantityDisplay.textContent);
                        if (quantity > 1) {
                            updateQuantity(quantity - 1, quantityDisplay);
                        }
                    });
                    quantityCell.appendChild(subtractButton);




                    tr.appendChild(quantityCell);

                    var totalCell = document.createElement('td');
                    totalCell.textContent = item.price * item.quantity;
                    tr.appendChild(totalCell);

                    // var removeCell = document.createElement('td');
                    // removeCell.textContent = 'x';
                    // tr.appendChild(removeCell);

                    // function updateCartUI() {


                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.addEventListener('click', function() {
                    removeFromCart(item);
                });
                tr.appendChild(removeButton);
              //  cartList.appendChild(td);
  // Remove item from cart
        function removeFromCart(item) {
            cart.splice(item, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            appendListItemToBody();
        }
        // }

                    cartBody.appendChild(tr);
                }

                function updateQuantity(newQuantity, quantityDisplay) {
                    // Update the quantity display
                    quantityDisplay.textContent = newQuantity;

                    // Update the total
                    updateTotal();

                    // Update the cart data
                    updateCartData();
                }


                function updateTotal() {
                    var rows = document.querySelectorAll('#cart-body tr');
                    var total = 0;
                    rows.forEach(function(row) {
                        var priceCell = row.cells[1];
                        var quantityInput = row.cells[2].querySelector('.quantity-display'); // Update the selector to match the new structure
                        if (priceCell && quantityInput) { // Check if both elements are present
                            var price = parseFloat(priceCell.textContent);
                            var quantity = parseInt(quantityInput.textContent); // Update to get textContent instead of value
                            var rowTotal = price * quantity;
                            row.cells[3].textContent = rowTotal; // Update the total cell with the new total
                            total += rowTotal;
                        }
                    });
                    totalElement.textContent = total;
                }

                function updateCartData() {
                    cart = [];
                    var rows = document.querySelectorAll('#cart-body tr');
                    rows.forEach(function(row) {
                        var name = row.cells[0].textContent;
                        var price = parseFloat(row.cells[1].textContent);
                        var quantity = parseInt(row.cells[2].querySelector('.quantity-display').textContent);
                        cart.push({
                            name: name,
                            price: price,
                            quantity: quantity
                        });
                    });
                    localStorage.setItem('cart', JSON.stringify(cart));
                }

                // Add event listener to submit button
                submitCartButton.addEventListener('click', function() {
                    if (cart.length === 0) {
                        alert('السلة فاضية!');
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
                    // Clear the cart body
                    cartBody.innerHTML ="{{ route('frontend.show.cart') }}";
                    totalElement.textContent = '0';
                    appendListItemToBody();
                });

                // Append cart items to the table
                cart.forEach(function(item) {
                    appendListItemToBody(item);
                });


                // Update total when the page loads
                updateTotal();
            });
        </script>



        <section class="aon-add-area">
          <div class="container">
            <div class="section-content">
              <img src="{{asset('assets/frontend/images/add-one.png')}}" alt="" />
            </div>
          </div>
          <div class="site-bot-line"></div>
        </section>
      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>




      @endsection
