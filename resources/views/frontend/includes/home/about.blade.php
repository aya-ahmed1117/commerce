
<!-- About Section -->
<section class="aon-about-area">
    <div class="site-top-line"></div>
    <div class="container">
        <!--Title Section Start-->
        <div class="section-head center">
            <span class="aon-sub-icon"><img src="{{ asset('assets/frontend/images/icon.png') }}" alt="" /></span>
            <h2 class="aon-title aon-title-line">
                Welcome to <span>WEtaly</span>
            </h2>
            <?php  //echo $aboutus->name ?>
            <p>
                @foreach ($aboutus as $about)
                {{$about->name}}
                @endforeach

                Fusce sollicitudin eros id ex maximus gravida non vitae ante.
                Cras ac mi a dolor suscipit rutrum ut vitae mi. Morbi eget magna
                mauris. Pellentesque id ornare augue. Duis dictum dui quis neque
                fringilla, in dignissim purus sodales. Etiam volutpat mattis t
                urpis
            </p>

        </div>
        <!--Title Section End-->

        <div class="section-content">
            <div class="about-year-top d-flex justify-content-center align-items-center">
                <div class="about-year-since">Since 2022</div>
                <div class="about-year-pic">
                    <img src="{{ asset('assets/frontend/images/about.png') }}" alt="" />
                </div>
                <div class="about-year-sign">
                    <img src="{{ asset('assets/frontend/images/sign.png') }}" alt="" />
                </div>
            </div>


        </div>

        <!--Welcome Pic Circle-->
        <div class="aon-welcome-pic animate-v">
            <img src="{{ asset('assets/frontend/images/wetaly/122.jpg') }}" alt="" />
        </div>
    </div>
    <div class="site-bot-line"></div>
</section>
<!-- About Section End -->

<!-- About 2 Section -->
<section class="aon-about-area">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <!-- Column 1 -->
                @foreach ($aboutus as $about=>$aID)
                <div class="col-lg-6">
                    <div class="aon-product-left2 wow fadeInDown" data-wow-duration="2000ms">
                        <div class="aon-pro-pic">
                            <img src="{{asset("storage/$aID->image")}}" alt="" />
                            <div class="aon-pro-get-to d-flex align-items-center">
                                <div class="aon-pro-get-left">
                                    <span>Call to get us.</span>
                                    <strong>{{$Contactus->phone}}</strong>
                                </div>
                                <div class="aon-pro-get-right">
                                    <div class="aon-pro-get-icon">
                                        <i class="flaticon-telephone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column 2 -->

                <div class="col-lg-6"  >
                    <div class="aon-product-right2 wow fadeInDown" data-wow-duration="2000ms">
                        <span class="aon-sub-title">Why Choose Us ?</span>
                        <h2 class="aon-pro-title">
                            {{$aID->name}}
                        </h2>
                        <div class="aon-pro-tagline2">

                            {{$aID->title}}

                        </div>
                        <p>
                            {{$aID->descriptionEN}}
                        </p>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="aon-pro-box">
                                    <div class="aon-pro-icon">
                                        <i class="flaticon-fruit aon-icon"></i>
                                    </div>
                                    <h4 class="aon-pro-title2">Organic <br />Food.</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="aon-pro-box">
                                    <div class="aon-pro-icon">
                                        <i class="flaticon-milk-1 aon-icon"></i>
                                    </div>
                                    <h4 class="aon-pro-title2">Natural <br />Milk..</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="site-bot-line"></div>
</section>
<!-- About 2 Section End -->
