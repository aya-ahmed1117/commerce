
<section
    class="aon-blog-area"
    style="background-image: url({{asset('assets/frontend/images/about-bg.png)')}}">
    <div
    class="aone-bg-cow-lb"
    style="background-image: url({{asset('assets/frontend/images/cow.png)')}}"
    ></div>
    <div
    class="aone-bg-cow-tr"
    style="background-image: url({{asset('assets/frontend/images/cow-small.png)')}}"
    ></div>
    <div class="container">
    <div class="section-content">
        <!--Title Section Start-->
        <a href="{{url('/blog')}}">
            <div class="section-head center">
            <span class="aon-sub-title">News and blogs</span>
            <h2 class="aon-title">Our Latest News</h2>
            </div>
        </a>
        <!--Title Section End-->

    <div class="aon-farm-blog-section">
        <div class="row d-flex justify-content-center">
            <!-- COLUMNS 1 -->
            @if (count($blogs_home) > 0)

                @foreach ($blogs_home as $Plog)

            <div class="col-lg-4 col-md-6">
            <div
                class="aon-farm-blog-1 shine-hover wow fadeInDown"
                data-wow-duration="2000ms">
                <div class="post-bx">
                <div class="post-thum shine-box">
                    <img
                    title="title"alt=""src="{{asset('storage/' . $Plog->image)}}" />
                </div>
                <div class="post-info">
                    <div class="aon-post-date">
                    <i class="flaticon-calendar-1"></i>
                    {{-- created_at --}}
                @if ($Plog->updated_at != null)

                    {{-- @if ($Plog->updated_at) --}}
                    <span class="date-dd">{{ $Plog->updated_at->format('d')}}</span>
                    <span class="date-mm">{{$Plog->updated_at->format('M')}}</span>
                    <span class="date-yy">{{ $Plog->updated_at->format('Y') }}
                    </span>
                {{-- @endif --}}
            @else


                        <span class="date-dd">18</span>
                        <span class="date-mm">Aug</span>
                        <span class="date-yy">2023</span>
                        @endif
                    </div>

                    <div class="post-text">
                    <h4 class="post-title">
                        <a href="blog-detail.html"
                        >{!!$Plog->descriptionAR!!}</a
                        >
                    </h4>
                    </div>

                    <div class="post-meta">
                    <ul>
                        <li class="post-author">
                        {{-- <img src="{{asset('storage/' . $Plog->image)}}" alt="" /> --}}
                        By <a href="#">Creativemelnninoie948h98h4ti4hn4h3a</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
            @endforeach
            @else
            <div class="post-text">
                <h4 class="post-title">
                    <a href="blog-detail.html">No data Found</a>
                </h4>
                </div>

          @endif


        </div>
        </div>



        <div
        class="row align-items-center justify-content-center wow fadeInDown"
        data-wow-duration="3000ms"
        >
        @if (count($Partners) > 0)

        @foreach ($Partners as $Partner)
        <!-- Column 1 -->
        <div class="mb-4 col-lg-2 col-md-3 col-sm-4 col-6 text-center">
            <img src="{{asset('storage/' . $Partner->image)}}" alt="" />
        </div>


        @endforeach
        @else
        <div class="aon-footer-logo">
          No Partners Found
        </div>
         @endif
            </div>
        </div>
    </div>
    {{-- <div class="site-bot-line2"></div> --}}
</section>

<!-- Blog Section End -->
