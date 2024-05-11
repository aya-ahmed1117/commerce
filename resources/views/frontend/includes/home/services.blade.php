        <!-- Services Section -->
<br>
<br>
<br>
        <section class="aon-news-area p-t0">
            <div class="container">
              <!--Title Section Start-->
              <div class="section-head center">
                <span class="aon-sub-title">Top News & Blog</span>
                <h2 class="aon-title">Our Latest News</h2>
              </div>
              <!--Title Section End-->


              <div class="section-content">
                <div class="owl-carousel latest-news-slider aon-owl-arrow">

                    @if (count($Services) > 0)
                    @foreach ($Services as $Service)
                  <!--block 1-->
                  <div class="item">
                    <div
                      class="aon-latest-new-one wow fadeInDown"
                      data-wow-duration="1000ms">
                      <div class="aon-post-wrap shine-hover">
                        <!-- Content section for blogs start -->
                        <div class="aon-post-media shine-box">
                            {{-- @if(empty($Service)) --}}
                          {{-- <img
                            title="title" alt="" src="{{ asset('/frontend/images/wetaly/186.jpg') }}" /> --}}
                            {{-- @else --}}
                            <img
                            title="title" alt="" src="{{ asset('storage/' . $Service->image) }}"/>
                            {{-- @endif --}}
                        </div>
                        <div class="aon-post-info">
                          <div class="aon-post-date">
                            <i class="flaticon-calendar-1"></i>
                            <span class="date-dd">18</span>
                            <span class="date-mm">Aug,</span>
                            <span class="date-yy">2022</span>
                          </div>

                          <h4 class="aon-post-title">
                            <a href=""
                              >{{$Service->title}}</a
                            >
                          </h4>
                          <p>
                            {{$Service->descriptionEN}}
                          </p>

                          <div class="aon-post-meta">
                            <ul>
                              <li class="post-author">
                                <span class="post-author-pic">
                                  <img src="images/author.jpg" alt="" />
                                </span>
                                By <a href="#">Creativemela</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <!-- Content section for blogs end -->
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="item">
                    <div
                      class="aon-latest-new-one wow fadeInDown"
                      data-wow-duration="1000ms">
                      <div class="aon-post-wrap shine-hover">
                        <!-- Content section for blogs start -->
                        <div class="aon-post-media shine-box">
                          <img
                            title="title"alt="" src="{{ asset('/frontend/images/wetaly/186.jpg') }}" />
                        </div>
                        <div class="aon-post-info">
                          <div class="aon-post-date">
                            <i class="flaticon-calendar-1"></i>
                            <span class="date-dd">18</span>
                            <span class="date-mm">Aug,</span>
                            <span class="date-yy">2022</span>
                          </div>

                          <h4 class="aon-post-title">
                            <a href=""
                              >No DATA Found</a
                            >
                          </h4>
                          <p>
                            No DATA Found
                          </p>

                          <div class="aon-post-meta">
                            <ul>
                              <li class="post-author">
                                <span class="post-author-pic">
                                  <img src="images/author.jpg" alt="" />
                                </span>
                                By <a href="#">Creativemela</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <!-- Content section for blogs end -->
                      </div>
                    </div>
                  </div>


                   @endif



              </div>
            </div>
        </div>
    </section>


        {{-- <section class="aon-service-area">
            <div class="site-top-line"></div>
            <div class="container">
              <!--Title Section Start-->
              <div class="section-head center">
                <span class="aon-sub-title">Our Great Services</span>
                <h2 class="aon-title">Services we Offer</h2>
              </div>
              <!--Title Section End-->

              <div class="section-content">
                <div class="aon-service-section">
                  <div class="owl-carousel aon-services-slider aon-owl-arrow">
                    <!-- COLUMNS 1 -->
                    @if (count($Services) > 0)
                    @foreach ($Services as $Service)

                    <div class="item">
                      <div
                        class="aon-service-box shine-hover wow fadeInDown"
                        data-wow-duration="2000ms">
                        <div class="aon-service-content">
                          <h4 class="aon-service-title">{{$Service->title}}</h4>
                          <p>
                            {{$Service->descriptionEN}}
                          </p>
                        </div>
                        <div class="aon-service-pic shine-box">
                          <img src="{{asset('assets/frontend/images/wetaly/153.jpg')}}" alt="" />
                        </div>
                      </div>
                    </div>
                    @endforeach
            @else
            <div
            class="aon-service-box shine-hover wow fadeInDown"
            data-wow-duration="3000ms" >
            <div class="aon-service-content">
              <h4 class="aon-service-title">No Service Found</h4>
              <p>No Service Found
            </div>
            <div class="aon-service-pic shine-box">
              <img src="{{asset('assets/frontend/images/wetaly/164.jpg')}}" alt="" />
            </div>
          </div>
        </div>
             @endif --}}




                    {{-- <div class="item">
                      <div
                        class="aon-service-box shine-hover wow fadeInDown"
                        data-wow-duration="3000ms" >
                        <div class="aon-service-content">
                          <h4 class="aon-service-title">Oraganic Butter</h4>
                          <p>
                            Mauris iaculis urna eget est euismod, in auctor dui
                            porta. Mauris non porta lacus. Mauris non porta lacus.
                          </p>
                        </div>
                        <div class="aon-service-pic shine-box">
                          <img src="{{asset('assets/frontend/images/wetaly/164.jpg')}}" alt="" />
                        </div>
                      </div>
                    </div> --}}

                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="site-bot-line"></div> --}}
          </section>
          <!-- Services Section End -->
