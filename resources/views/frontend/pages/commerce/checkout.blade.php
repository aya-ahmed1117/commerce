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
                    <li>Checkout</li>
                  </ul>
                </div>
                <div class="sf-banner-heading-large2">Checkout Page</div>
              </div>
              <div class="sf-banner-vid-section">
                <div class="video-play-btn2">
                  <a
                    class="mfp-video"
                    href="https://www.youtube.com/watch?v=c1XNqw2gSbU"
                  >
                    <i class="fa fa-play"></i>
                  </a>
                  <span>Watch Now <br />Companey Details</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Area End -->

        <!-- Check out section -->
        <section class="aon-innerpage-area">
          <div class="site-top-line"></div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8 col-md-12 m-b30">
                <div class="checkout-billing-form">
                  <div class="wt-title m-b30">
                    <h3>Billing Details</h3>
                    <p>Nunc velit metus, volutpat elementum euismod eget.</p>
                  </div>
                  <form>
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>First Name :</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder=""
                          />
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Last Name :</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder=""
                          />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>info.milcandy@gmail.com :</label>
                          <input
                            type="email"
                            class="form-control"
                            placeholder=""
                          />
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Phone No :</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder=""
                          />
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Company name (optional) :</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>

                    <div class="form-group">
                      <label>Present Address:</label>
                      <input
                        type="text"
                        class="form-control mb-2"
                        placeholder="Address Line 1"
                      />
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Address Line 2"
                      />
                    </div>

                    <div class="form-group">
                      <label>Country / Region:</label>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option>Usa</option>
                        <option>China</option>
                        <option>india</option>
                        <option>australia</option>
                        <option>japan</option>
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Town / City:</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder=""
                          />
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Postal Code:</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Postal Code:"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Additional Message :</label>
                      <textarea class="form-control"></textarea>
                    </div>

                    <div class="form-info-hilite">
                      <p>
                        <span>*</span>Call us 24/7 at 869-5414-5 or fill out the
                        form below to receive a free and confidential initial
                        consultation.
                      </p>
                    </div>

                    <div class="form-group">
                      <div class="radio-inline-box">
                        <div class="checkbox sf-radio-checkbox">
                          <input
                            id="lau1"
                            name="abc"
                            value="five"
                            type="checkbox"
                          />
                          <label for="lau1"> Create an account? </label>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-4 col-md-12 m-b30">
                <div class="shopping-cart-total style2 mb-4">
                  <div class="sub_total">
                    <h4>Check Out</h4>
                    <ul class="top">
                      <li>Total before discount</li>
                      <li><span>$299.23</span></li>
                      <li>Discount</li>
                      <li><span>-10%</span></li>
                      <li>Subtotal</li>
                      <li><span>$599.366</span></li>
                    </ul>
                    <div class="total">
                      <ul>
                        <li>Total</li>
                        <li><span>$299.23</span></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="shopping-payment-method">
                  <h4 class="title">Payment Method</h4>
                  <div class="radio-inline-box">
                    <div class="checkbox sf-radio-checkbox">
                      <input id="p1" name="abc" value="1" type="checkbox" />
                      <label for="p1"> Direct Bank Transfer </label>
                    </div>
                  </div>
                  <div class="radio-inline-box">
                    <div class="checkbox sf-radio-checkbox">
                      <input id="p2" name="abc" value="1" type="checkbox" />
                      <label for="p2"> Cash on Delivery </label>
                    </div>
                  </div>
                  <div class="radio-inline-box">
                    <div class="checkbox sf-radio-checkbox">
                      <input id="p3" name="abc" value="1" type="checkbox" />
                      <label for="p3"> Card Payment </label>
                    </div>
                  </div>

                  <div class="shopping-payment-card">
                    <a href="javascript:;"
                      ><img src="images/visa.png" alt=""
                    /></a>
                    <a href="javascript:;"
                      ><img src="images/master-card.png" alt=""
                    /></a>
                    <a href="javascript:;"
                      ><img src="images/paypal.png" alt=""
                    /></a>
                  </div>
                  <p>
                    You can pay with your credit card if you don’t have a PayPal
                    account.
                  </p>
                  <div class="radio-inline-box">
                    <div class="checkbox sf-radio-checkbox">
                      <input id="p4" name="abc" value="1" type="checkbox" />
                      <label for="p4"> Your cart is Sure currently. </label>
                    </div>
                  </div>
                  <div class="proceed-to-checkout">
                    <a href="#" class="site-button-secondry"
                      >Place Your Order <i class="fa fa-angle-right"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Check out section  END -->

        <section class="aon-add-area">
          <div class="container">
            <div class="section-content">
              <img src="images/add-one.png" alt="" />
            </div>
          </div>
          <div class="site-bot-line"></div>
        </section>
      </div>

      @endsection