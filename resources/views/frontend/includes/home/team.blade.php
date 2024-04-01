<!-- Team Section -->
<section class="aon-team2-area">
    <div class="site-top-line"></div>
    <div class="container">
        <!--Title Section Start-->
        <div class="section-head center">
            <span class="aon-sub-title">Our Great Teem</span>
            <h2 class="aon-title">Meet Our Farmer</h2>
        </div>
        <!--Title Section End-->



        <div class="section-content">

            <div class="aon-team-section">
                <div class="row">
                    <!-- Column 1 -->
                    @if (count($Teams) > 0)

                    @foreach ($Teams as $Team)

                    <div class="col-lg-4 col-md-6">
                        <div class="aon-team-box text-center wow fadeInDown" >
                            <div class="aon-team-pic" >
                                <img src="{{asset('storage/' . $Team->image)}}" data-wow-duration="1000ms" />
                                <div class="aon-team-social">
                                    <i class="aon-social-circle feather-plus"></i>
                                    <div class="social-icons">
                                        <a class="social-icon social-icon--twitter">
                                            <i class="fa fa-twitter"></i>
                                            <div class="tooltip">Twitter</div>
                                        </a>
                                        <a class="social-icon social-icon--linkedin">
                                            <i class="fa fa-linkedin"></i>
                                            <div class="tooltip">LinkedIn</div>
                                        </a>
                                        <a class="social-icon social-icon--facebook">
                                            <i class="fa fa-facebook"></i>
                                            <div class="tooltip">Facebook</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="aon-team-name">Daniel Samuel</h4>
                            <span class="aon-team-positopn">Field Farmer Maintanancer</span>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="aon-footer-logo">
                      <img src="{{asset('assets/frontend/images/wetaly/removebg-.png')}}" alt="" />
                    </div>
                     @endif

                </div>
            </div>
        </div>




    <div class="aon-insta-gallery">
        <div class="section-head center">
            <a href="{{Route('frontend.gallery')}}">
            <span class="aon-sub-title">Our Gallery</span>
            <h2 class="aon-title">Check Our Gallery</h2>
            </a>
        </div>
        <div class="row">
            <!--block 1-->
            @if (count($Gallerys) > 0)

            @foreach ($Gallerys as $Gallery)

            <div class="col-lg-4 col-md-6">
                <div class="aon-insta-block wow fadeInDown" data-wow-duration="1000ms">
                    <img src="{{asset('storage/' . $Gallery->image)}}" alt="" />
                    <div class="aon-insta-overlay">
                        <a class="elem" href="{{asset('storage/' . $Gallery->image)}}"
                            title="Nh-16 Highway Bridge" data-lcl-thumb="{{ asset('images/insta-gallery/img-1.png') }}">
                            <i class="feather-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="aon-footer-logo">
              <img src="{{asset('assets/frontend/images/wetaly/removebg-.png')}}" alt="" />
            </div>
             @endif

        </div>
    </div>
</div>
    <div class="site-bot-line"></div>
</section>
<!-- Team Section End -->
