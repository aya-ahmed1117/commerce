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
                <a href="javascript:void(0);" class="fa fa-facebook"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-twitter"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-vimeo"></a>
              </li>
              <li>
                <a href="javascript:void(0);" class="fa fa-skype"></a>
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
              <a href="index.html">
                <img src="{{asset('assets/frontend/images/wetaly/186-removebg-preview.png')}}" alt="" />
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
            class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center"
          >
            <ul class="nav navbar-nav">
              <li class="current-menu-item">
                <a href="{{ route('frontend.homepage') }}">Home</a>
              </li>
              <li><a href="{{ route('frontend.about') }}">About us</a></li>
              <li class="has-child">
                <a href="javascript:;">Services</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('frontend.services') }}">Services</a></li>
                  <li><a href="{{ route('frontend.service-details') }}">Service detail</a></li>
                </ul>
              </li>

              <li class="">
                <a href="{{ route('frontend.products') }}">Products</a>
              </li>

              <li class="has-child">
                <a href="javascript:;">Blog</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                  <li><a href="{{ route('frontend.blog-details') }}">Blog Detail</a></li>
                </ul>
              </li>
              <li><a href="{{ route('frontend.contact') }}">Contact us</a></li>
            </ul>
          </div>

          <!-- Header Right Section-->
          {{-- <div class="extra-nav header-2-nav">
            <div class="extra-cell">
              <!--Sign up-->
              <div class="cart-add-btn">
                <a href="#" class="aon-btn-search">
                  <i class="flaticon-search"></i>
                </a>
                <!-- SITE Search -->
               <div id="search">
                  <span class="aon-seach-close"></span>
                  <form
                    role="search"
                    id="searchform"
                    action="/search"
                    method="get"
                    class="radius-xl"
                  >
                    <input
                      class="form-control"
                      value=""
                      name="q"
                      type="search"
                      placeholder="Type to search"
                    />
                    <span class="input-group-append">
                      <button type="button" class="search-btn">
                        <i class="flaticon flaticon-search"></i>
                      </button>
                    </span>
                  </form>
                </div>
              </div>
              <!--Add Listing up-->
              <div class="cart-add-btn aon-btn-woocart">
                <span class="cart-add-pic">
                  <i class="flaticon-shopping-cart"></i>
                </span>
                <span class="cart-add-num">0</span>
              </div>
            </div>
          </div>--}}
        </div>
      </div>
    </div>
  </header>
<!-- HEADER END -->
