


@if (count($Footers) > 0)

        @foreach ($Footers as $img)

        <footer class="site-footer footer-gradient"
        style="background-image: url({{ asset('storage/' . $img->image) }});  background-repeat: no-repeat;
            background-size: cover; ">

        @endforeach
    @else
        <footer class="site-footer footer-gradient">
    @endif


    <!-- FOOTER BLOCKES START -->
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!-- COLUMNS 1 -->
          <div class="col-lg-3 col-md-6">
            <div class="sf-site-link sf-widget-link f-margin">

                {{-- @if (count($slider_img) > 0)

                @foreach ($slider_img as $img)

                <div class="aon-footer-logo">
                    <img src="{{asset('storage/' . $img->image)}}" alt="" />
                  </div>

          @endforeach
            @else
          @endif --}}
          <div class="aon-footer-logo">
            <img src="{{asset('assets/frontend/images/wetaly/186-removebg-preview.png')}}" alt="" />
          </div>

              <div class="aon-footer-text">
                Morbi vehicula luctus feugiat. In sapien id odio tempor
                iaculis.
              </div>
              <ul class="aon-footer-coinfo">
                <li><i class="feather-phone-call"></i> {{ optional($Contactus)->phone }}
                </li>
                <li><i class="feather-mail"></i>{{ optional($Contactus)->email }}</li>
              </ul>
            </div>
          </div>
          <!-- COLUMNS 2 -->
          <div class="col-lg-6 col-md-6">
            <div class="aon-site-link aon-widget-link f-margin">
              <h4 class="aon-f-title">About</h4>
              <ul class="aon-widget-foo-list">
                <li><a href="index.html">Home Page</a></li>
                <li><a href="about-1.html">Counter</a></li>
                <li><a href="service-page.html">Service Page</a></li>
                <li><a href="about-1.html">Terms & Condition</a></li>
                <li><a href="blog-grid.html">Blog Page</a></li>
                <li><a href="about-1.html">Acount Ds</a></li>
                <li><a href="contact.html">Contact Page</a></li>
                <li><a href="our-team.html">Team Member</a></li>
                <li><a href="gallery.html">Gallery Look</a></li>
              </ul>
            </div>
          </div>
          <!-- COLUMNS 3 -->
          <div class="col-lg-3 col-md-12">
            <div class="sf-widget-newsletter f-margin">
              <h4 class="aon-f-title">Newsletter</h4>
              <div class="aon-news-text">
                Nulla et aliquam ligula. Praesent vel rhoncus dui, nec
                aliquet leo.
              </div>
              {{-- <form>
                <div class="aon-news-form">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Your Email"
                  />
                  <button type="submit" class="aon-news-btn">
                    <i class="feather-corner-down-left"></i>
                  </button>
                </div>
              </form> --}}
              <ul class="aon-socila-icon d-flex">
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
    </div>

    <!-- FOOTER COPYRIGHT -->
    <div class="footer-bottom">
      <div class="container">
        <div class="aon-footer-bottom-area">
          <div class="aon-foo-copyright">
            © Copyright 2024 <span>WeTaly</span> - All Rights Reserved.
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Vverlay -->
    <div class="footer-overlay"></div>
    <!-- Footer Patter -->
    <div class="footer-patter"></div>
  </footer>
