

@extends('frontend.layouts.aboutmaster')
@section('content')

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

                  @if (count($orders) > 0)
                  @php
                      $totalPrice = 0; // Initialize total price variable
                  @endphp
                  @foreach ($orders as $order)
                      @php
                          $subtotal = $order->price * $order->quantity; // Calculate subtotal for each item
                          $totalPrice += $subtotal; // Add subtotal to total price
                      @endphp
                      <!-- Output order details here if needed -->
                  @endforeach
                  {{-- Total Price: ${{ number_format($totalPrice, 2) }}  --}}
              @endif



                  <tbody>
                    @if (count($orders) > 0)
                    @foreach ($orders as $order)

                    <tr>
                      <td data-title="product">
                        <div class="aon-ct-product">
                          <div class="media">
                            <img src="images/cart/Img-1.jpg" alt="" />
                          </div>

                        @php
                          $product = $Products->where('id', $order->product_id)->first();
                        @endphp

                      <!-- Check if the product exists -->
                      @if ($product)
                      <div class="content">
                        <h4 class="aon-ct-pro-title">
                            {{ $product->name }}
                        </h4>
                        {{-- <p>19” DIAMETER (19” x 8.5”), White/Sliver</p> --}}
                      </div>
                          {{-- <div class="product">
                              <p>Product Name: {{ $product->name }}</p>
                              <p>Product Price: {{ $product->price }}</p>
                              <!-- Display other product details as needed -->
                          </div> --}}
                      @endif



                        </div>
                      </td>
                      <td data-title="price">
                        <div class="aon-ct-product-price">${{ $order->price }}</div>
                      </td>
                      <td data-title="qty" class="numeric">
                        <div class="itm-Quantity-wrap"style="width:150px">
                             {{-- id="itm-Quantity" --}}
                          <input
                            id="itm-Quantity"
                            type="number" disabled class="quantity" data-price="{{$order->price}}"
                            value="{{ $order->quantity }}"
                            name="quantity"/>
                        </div>
                      </td>
                      <td data-title="subtotal" class="numeric">
                        <div class="aon-ct-product-total" id="totalPrice">${{$order->price * $order->quantity}}</div>
                      </td>
                      <td data-title="remove" class="numeric">

                        <a href="{{ route('delete.cart', $order->id) }}" class="aon-ct-remove">
                            <i class="feather-x"></i></a>
                      </td>
                    </tr>
                    @endforeach
                        @else
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            No data found
                        </li>
                        @endif


                  </tbody>
                </table>
              </div>


              {{-- @foreach ($Products as $product) --}}
              <div class="product">
                  <form action="{{ route('check.out') }}" method="post">
                      @csrf

              {{-- <div class="row">
                <div class="col-md-6">
                  <div class="aon-cart-coupon">
                    <div class="input-group mb-3">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Enter Your Coupon Code"/>
                      <button class="site-button" type="button">
                        Apply Coupon
                      </button>
                    </div>
                  </div>
                </div> --}}

                <div class="col-md-6">
                  <div class="cart-total-table shopping-cart-total">
                    <div class="sub_total">
                      <h4>Check Out</h4>
                      <ul class="top">
                        <li>Total before discount</li>
                        <li><span>${{ $order->price * $order->quantity }}</span></li>
                        <li>Discount</li>
                        <li><span>50
                    </span></li>
                        <li>Subtotal</li>
                        <li><span>

                    @php
                     $total_befor = $order->price * $order->quantity;
                     $disco = $total_befor - 0;

                    @endphp
                    <input type="hidden" name="total_amount"
                    value="{{$disco}}">
                                        {{$disco}}
                        </span>
                    </li>
                      </ul>
                      <div class="total">
                        <ul>
                          <li>Total</li>
                          <li><span>{{$disco}}</span></li>
                        </ul>
                      </div>
                      <input type="hidden" name="order" value="{{ $order->id }}">



                      <div class="proceed-to-checkout">
                        <button type="submit"class="site-button-secondry" style="color: white;">
                            Proceed to checkout <i class="fa fa-angle-right"></i></button>
{{--
                        <a href="#" class="site-button-secondry"
                          >Proceed to checkout <i class="fa fa-angle-right"></i></a> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>


          </form>
      </div>
  {{-- @endforeach --}}


            </div>
          </div>
        </section>

{{--
        <div class="product">
            <h2>Product 2</h2>
            <p>Price: {{$order->price}}</p>
            <input type="number" class="quantity" data-price="{{$order->price}}" value="1" min="1" />
        </div> --}}


        <!-- Cart section  END -->

        <section class="aon-add-area">
          <div class="container">
            <div class="section-content">
              <img src="{{asset('assets/frontend/images/add-one.png')}}" alt="" />
            </div>
          </div>
          <div class="site-bot-line"></div>
        </section>
      </div>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include TouchSpin plugin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.min.js"></script>


<!-- Script to control quantity -->
<script>
    $(document).ready(function() {
        // Function to calculate total price
        function calculateTotalPrice() {
            var totalPrice = 0;
            // Loop through each quantity input field
            $('.bootstrap-touchspin-up, .bootstrap-touchspin-down').each(function() {
                // Get the price of the corresponding product (assuming price is stored in a data attribute)
                var price = parseFloat($(this).closest('.input-group').find('input.quantity').data('price'));
                // Get the quantity value
                var quantity = parseInt($(this).closest('.input-group').find('input.quantity').val());
                // Check if price and quantity are valid numbers
                if (!isNaN(price) && !isNaN(quantity)) {
                    // Calculate subtotal for this item
                    var subtotal = price * quantity;
                    // Add subtotal to total price
                    totalPrice += subtotal;
                }
            });
            // Update the total price in the DOM
            $('#totalPrice').totalPrice.toFixed(2);

            // $('#totalPrice').text('Total Amount: $' + totalPrice.toFixed(2));
        }

        // Add event listener to TouchSpin buttons
        $('.bootstrap-touchspin-up, .bootstrap-touchspin-down').click(calculateTotalPrice);

        // Calculate total price initially
        calculateTotalPrice();
    });
</script>

<!-- Place this script tag at the end of your HTML, just before the closing </body> tag -->
 <script>

    // function calculateTotalPrice() {
    //     var totalPrice = 0;
    //     // Loop through each quantity input field
    //     document.querySelectorAll('.quantity').forEach(function(input) {
    //         // Get the price of the corresponding product (assuming price is stored in a data attribute)
    //         var price = parseFloat(input.dataset.price);
    //         // Get the quantity value
    //         var quantity = parseInt(input.value);
    //         // Check if price and quantity are valid numbers
    //         if (!isNaN(price) && !isNaN(quantity)) {
    //             // Calculate subtotal for this item
    //             var subtotal = price * quantity;
    //             // Add subtotal to total price
    //             totalPrice += subtotal;
    //         }
    //     });
    //     // Update the total price in the DOM
    //     document.getElementById('totalPrice').textContent = 'Total Amount: $' + totalPrice.toFixed(2);
    // }

    // // Add event listeners to quantity input fields
    // document.querySelectorAll('.quantity').forEach(function(input) {
    //     input.addEventListener('input', calculateTotalPrice);
    // });

    // // Calculate total price initially
    // calculateTotalPrice();

</script>

      @endsection
