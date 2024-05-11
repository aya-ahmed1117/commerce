<!-- HEADER START -->
<header class="site-header header-style-2 mobile-sider-drawer-menu">
    <div class="top-bar site-bg-primary">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between">
          <div class="aon-topbar-left d-flex flex-wrap">
            <ul class="aon-topbar-info d-flex flex-wrap">
              <li class="aon-tb-tagline">
                We provide <span class="text-primary">100%</span> fresh
                service to our customers.
              </li>
              <li class="aon-tb-email">Email: info.dairy@gmail.com</li>
              <li class="aon-tb-phone">Phone : +122 555 444 22</li>
            </ul>
          </div>

          <div class="aon-topbar-right d-flex flex-wrap">
            <ul class="topbar-social-icons list-unstyled m-0">
                <li>
                    @if(empty($SocialFac))
                      <a href="www.facebook.com" class="fa fa-facebook"></a>
                    @else
                      <a href="{{$SocialFac->link}}" class="fa fa-facebook"></a>
                     @endif
                    </li>
                    <li>
                      @if(empty($SocialTwi))
                      <a href="www.twitter.com" class="fa fa-twitter"></a>
                    @else
                      <a href="{{$SocialTwi->link}}" class="fa fa-twitter"></a>
                      @endif
                    </li>
                    <li>
                      @if(empty($SocialInsta))
                      <a href="www.instagram.com" class="fa fa-instagram"></a>
                    @else
                      <a href="{{$SocialInsta->link}}"class="fa fa-instagram"></a>
                      @endif
                    </li>

                    <li>
                      @if(empty($SocialYout))
                      <a href="www.youtube.com" class="fa fa-youtube"></a>
                    @else
                      <a href="{{$SocialYout->link}}" class="fa fa-youtube"></a>
                      @endif
                    </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
      <div class="main-bar">
        <div class="container clearfix">
          <!--Logo section start-->
          <div class="logo-header">
            <div class="logo-header-inner logo-header-one">
              <a href="{{ route('frontend.homepage') }}">
                @if(empty($logo))

                <img src="{{asset('assets/frontend/images/wetaly/186-removebg-preview.png')}}"   alt="" />
                @else
                <img src="{{ asset('storage/'.$logo->image) }}"  alt="" />
                @endif
              </a>
            </div>
          </div>
          <!--Logo section End-->

          <!-- NAV Toggle Button -->
          <button
            id="mobile-side-drawer"
            data-target=".header-nav"
            data-toggle="collapse"
            type="button"
            class="navbar-toggler collapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar icon-bar-first"></span>
            <span class="icon-bar icon-bar-two"></span>
            <span class="icon-bar icon-bar-three"></span>
          </button>

          <!-- MAIN Vav -->
          <div
            class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">
            <ul class="nav navbar-nav">
              <li class="current-menu-item">
                <a href="{{ route('frontend.homepage') }}">Home </a>
              </li>
              <li><a href="{{ route('frontend.about') }}">About us</a></li>
             @if (Auth()->check())
                    @if(Auth()->user()->is_admin == 1)
                <li class="has-child">
                    <a href="javascript:;">Services</a>
                    <ul class="sub-menu">
                    <li><a href="{{ route('frontend.services') }}">Services</a></li>
                    {{-- <li><a href="{{ route('frontend.service-details') }}">Service detail</a></li> --}}
                    </ul>
                </li>

            @endif

            @endif

              <li class="">
                <a href="{{ route('frontend.products') }}">Products</a>
              </li>

              <li class="has-child">
                <a href="javascript:;">Blog</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                  <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                </ul>
              </li>
              <li><a href="{{ route('frontend.contact') }}">Contact us</a></li>


{{--
              @if (Auth()->check())
              <li><a href=""> <samp style="color: green;">Welcome:</samp> {{ Auth::user()->name }}</a></li>

              @endif --}}

            </ul>
          </div>


                {{-- <a href="#" class="aon-btn-search">
                  <i class="flaticon-search"></i>
                </a> --}}
                <!-- SITE Search -->
               <div >

                        @guest
                        @if (Route::has('postLogin'))
                            {{-- <li class="nav-item "> --}}
                                <a class="btn btn-success" href="{{ route('postLogin') }}">{{ __('Sign In') }}   </a>
                            {{-- </li> --}}
                        @endif

                    @else
                        {{-- <li class="nav-item dropdown"> --}}
                            <a id="navbarDropdown1" class="dropdown-toggle"
                            role="button" data-toggle="dropdown1" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        {{-- </li> --}}
                    @endguest


                </div>
               <!-- Header Right Section-->
          <div class="extra-nav header-2-nav" style="margin-left: 20px;">
            <div class="extra-cell">
              <!--Sign up-->
              <div class="cart-add-btn">
              <!--Add Listing up-->
              <div class="cart-add-btn aon-btn-woocart">
                <span class="cart-add-pic">
                  <i class="flaticon-shopping-cart"></i>
                </span>
                <span class="cart-add-num">0</span>
              </div>
            </div>



          </div>

        </div>


  </header>

  <script>
    // Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get all dropdown toggles
    var dropdownToggles = document.querySelectorAll('[data-toggle="dropdown1"]');

    // Add event listeners to each dropdown toggle
    dropdownToggles.forEach(function(toggle) {
        // Add event listener for click event
        toggle.addEventListener("click", function(event) {
            // Prevent default action of the toggle
            event.preventDefault();

            // Get the dropdown menu associated with this toggle
            var dropdownMenu = toggle.nextElementSibling;

            // Toggle the visibility of the dropdown menu
            if (dropdownMenu.classList.contains("show")) {
                // Hide the dropdown menu
                dropdownMenu.classList.remove("show");
            } else {
                // Hide all other open dropdown menus
                var openDropdowns = document.querySelectorAll('.dropdown-menu.show');
                openDropdowns.forEach(function(openDropdown) {
                    openDropdown.classList.remove("show");
                });

                // Show the dropdown menu
                dropdownMenu.classList.add("show");
            }
        });

        // Add event listener to close dropdown when clicking outside
        // document.addEventListener("click", function(event) {
        //     var target = event.target;
        //     if (!toggle.contains(target) && !dropdownMenu.contains(target)) {
        //         dropdownMenu.classList.remove("show");
        //     }
        // });
    });
});

</script>

<!-- HEADER END -->
