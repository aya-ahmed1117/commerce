@extends('frontend.layouts.master')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Contact US'])


    <div class="aon-farm-faq-area">
        <div class="site-top-line"></div>
        <div class="container">

            <div class="aon-con-map ">
                <!--Google Map-->
                <iframe class="grayscle-area" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                <!--Contact Info-->
                <div class="aon-con-info-box">
                    <h3 class="aon-con-info-title">Contact 24/7</h3>
                    <p class="aon-con-info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut  sagittis tortor.</p>
                    <ul class="aon-con-info-list">
                        <!--Phone-->
                        <li class="d-flex">
                            <div class="aon-con-icon">
                                <i class="flaticon-telephone"></i>
                            </div>
                            <div class="aon-con-text">
                                <span>Contact Phone</span>
                                <strong>+55 (9900) 666 22</strong>
                            </div>
                        </li>
                        <!--Email-->
                        <li class="d-flex">
                            <div class="aon-con-icon">
                                <i class="flaticon-mail-1"></i>
                            </div>
                            <div class="aon-con-text">
                                <span>Contact Mail</span>
                                <strong>info.atrik @gmail.com</strong>
                            </div>
                        </li>
                        <!--Address-->
                        <li class="d-flex">
                            <div class="aon-con-icon">
                                <i class="flaticon-location-pin-1"></i>
                            </div>
                            <div class="aon-con-text">
                                <span>Contact Location</span>
                                <strong>18/2, Topkhana Road, Australia.</strong>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="aon-contact-wrap">
                <div class="sf-con-form-title text-center">
                    <span class="aon-sub-title">Contact Us</span>
                    <h2 class="m-b30">Contact Information</h2>
                </div>
                <!--Contact Information-->
                <form class="contact-form" method="post">
                    <div class="row">

                        <!-- COLUMNS 1 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="fullname" placeholder="Your Full Name" class="form-control" required="">
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="email" placeholder="info.lawlead@gmail.com" class="form-control" required="">
                            </div>
                        </div>
                        <!-- COLUMNS 3 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="+55 (121) 234 444" class="form-control">
                            </div>
                        </div>
                        <!-- COLUMNS 4 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Enter Your Address" class="form-control" required="">
                            </div>
                        </div>
                        <!-- COLUMNS 5 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Additional Message" class="form-control" rows="4" required=""></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="aon-con-us-text text-center">
                                * Call us 24/7 at 869-5414-5 or fill out the form below to receive a free and confidential initial consultation.</div>
                        </div>

                        <div class="col-md-12">
                            <div class="g-recaptcha" data-sitekey="6LfcCr0eAAAAAN2P-3cJJC1StgxbUWvwELbMVjnp"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-iuqg9c4xvibf" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfcCr0eAAAAAN2P-3cJJC1StgxbUWvwELbMVjnp&amp;co=aHR0cHM6Ly9hb25ldGhlbWUuY29tOjQ0Mw..&amp;hl=en&amp;v=vj7hFxe2iNgbe-u95xTozOXW&amp;size=normal&amp;cb=kuqu4h3ktkis"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
                        </div>

                    </div>
                    <div class="sf-contact-submit-btn text-center">
                        <button class="site-button-secondry btn-animate-one">Submit Now <i class="btn-arrow-icon fa fa-angle-right"></i></button>
                    </div>
                </form>
                <!--Contact Information End-->
            </div>

        </div>
        <div class="site-bot-line"></div>
    </div>
@endsection
