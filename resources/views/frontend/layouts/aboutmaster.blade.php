<!DOCTYPE html>
<html lang="zxx">
  <head>
    {{-- @foreach ($data as $key => $value) {
        @if(!empty($value)){

        @elseif(settings::where('key', $key)->exists()) {
          settings::where('key', $key)->update(['value' => $value]);
        }
      }
    }
    @endif
    @endforeach --}}
    <!-- META -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="{{$keywordsSetting}}" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('assets/frontend/images/logo3.png')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon"
    href="{{asset('assets/frontend/images/logo3.png')}}" />

    <!-- MOBILE SPECIFIC -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- BOOTSTRAP STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Feather STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/feather.css')}}" rel="stylesheet" />
    <!-- FLATICON STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/flaticon.min.css')}}" rel="stylesheet" />
    <!-- WOW ANIMATE STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/animate.css')}}" rel="stylesheet" />
    <!-- WOW CAROUSEL STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/magnific-popup.min.css')}}" rel="stylesheet" />
    <!-- Lc light box popup -->
    <link href="{{asset('assets/frontend/css/lc_lightbox.css')}}" rel="stylesheet" />
    <!-- MAIN STYLE SHEET -->
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet" />
    <!-- REVOLUTION SLIDER CSS -->
<!-- REVOLUTION SLIDER CSS -->

    <!-- REVOLUTION SLIDER CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('assets/frontend/plugins/revolution/revolution/css/settings.css')}}"
    />
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link  rel="stylesheet"
      type="text/css"
      href="{{asset('assets/frontend/plugins/revolution/revolution/css/navigation.css')}}"
    />
  </head>

  <body>
    <!-- LOADING AREA START ===== -->
    @include('frontend.includes.loading')
    <!-- LOADING AREA  END ====== -->

    <div class="page-wraper">

      @include('frontend.includes.header')


      {{-- @include('frontend.includes.home.slider') --}}


      <!-- CONTENT START -->
      <div class="page-content">


        @yield('content')

      </div>
      <!-- CONTENT END -->

      <!-- FOOTER START -->
      @include('frontend.includes.footer')
      <!-- FOOTER END -->

      <!-- BUTTON TOP START -->
      <button class="scroltop">
        <span class="fa fa-angle-up relative" id="btn-vibrate"></span>
      </button>

      <!-- Header Woo Cart START -->
      <div class="aon-woocart-wrap">
        <div class="aon-woocart-close">
          <i class="fa fa-close feather-x"></i>
        </div>
        <div class="aon-woocart-inner">
          <div class="aon-woocart-header">
            <div class="aon-woocart-head-left"><h4>Order Summery</h4></div>
            <div class="aon-woocart-head-right">
              Clear All <i class="feather-x"></i>
            </div>
          </div>
          <div class="aon-woocart-body">
            <div class="aon-woocart-body-mini-cart-scroll">
              <ul class="woocommerce-mini-cart cart_list product_list_widget">

            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    @php
                      $product = $Products->where('id', $order->product_id)->first();
                    @endphp

                <div class="product">
                    @if ($product)
                <li class="woocommerce-mini-cart-item mini_cart_item">
                  <a href="#" class="remove remove_from_cart_button">×</a>
                  <a class="woocommerce-price-title" href="#">
                    <img src="{{asset("storage/$product->image")}}"alt="" />{{ $product->name }}</a>
                  <span class="quantity"
                    >{{ $product->quantity }} ×
                    <span class="woocommerce-price-amount amount">
                      <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $product->price }}
                        </bdi>
                    </span>
                  </span>
                </li>
                @endif
                @endforeach
                @else
                <li class="woocommerce-mini-cart-item mini_cart_item">
                    No data found
                </li>
                @endif




              </ul>
            </div>
          </div>
          <div class="aon-woocart-footer">
            <div class="aon-woocart-foo-top">
              <div class="aon-woocart-foo-top-left">Product :</div>
              <div class="aon-woocart-foo-top-right"></div>
            </div>
            <div class="aon-woocart-foo-bot">
              <div class="aon-woocart-foo-bot-left">
                <a href="http://wetaly-commerce.test/cart" ><button
                  class="site-button-amore site-button-secondry btn-animate-one">
                  Add More
                </button></a>
              </div>
              <div class="aon-woocart-foo-bot-right">
                <a href=""></a>
                <button
                  class="site-button-chechout site-button btn-animate-one">
                  CheckOut
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="{{asset('assets/frontend/js/jquery-3.6.1.min.js')}}"></script>
    <!-- JQUERY.MIN JS -->
    <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
    <!-- POPPER.MIN JS -->
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <!-- BOOTSTRAP.MIN JS -->
    <script src="{{asset('assets/frontend/js/wow.js')}}"></script>
    <!-- WOW JS -->
    <script src="{{asset('assets/frontend/js/jquery.bootstrap-touchspin.js')}}"></script>
    <!-- FORM JS -->
    <script src="{{asset('assets/frontend/js/magnific-popup.min.js')}}"></script>
    <!-- MAGNIFIC-POPUP JS -->
    <script src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
    <!-- WAYPOINTS JS -->
    <script src="{{asset('assets/frontend/js/counterup.min.js')}}"></script>
    <!-- COUNTERUP JS -->
    <script src="{{asset('assets/frontend/js/waypoints-sticky.min.js')}}"></script>
    <!-- STICKY HEADER -->
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <!-- OWL  SLIDER  -->
    <script src="{{asset('assets/frontend/js/theia-sticky-sidebar.js')}}"></script>
    <!-- STICKY SIDEBAR  -->
    <script src="{{asset('assets/frontend/js/lc_lightbox.lite.js')}}"></script>
    <!-- IMAGE POPUP -->
    <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
    <!-- CUSTOM FUCTIONS  -->

    <!-- REVOLUTION JS FILES -->

    <script src="{{asset('assets/frontend/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('assets/frontend/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution-plugin.js')}}"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="{{asset('assets/frontend/js/rev-script-1.js')}}"></script>
  </body>
</html>
