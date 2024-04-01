


@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Contact US'])


  <!-- Content -->
  <div class="page-content">
    <!-- Banner Area -->

    {{-- <div class="aon-page-benner-area2">
      <div class="aon-page-banner-row2">
        <div class="aon-page-benner-overlay2"></div>
        <div class="sf-banner-heading-wrap2">
          <div class="sf-banner-heading-area2">
            <div class="sf-banner-breadcrumbs-nav2">
              <ul class="list-inline">
                <li><a href="index.html"> Home </a></li>
                <li>Gallery</li>
              </ul>
            </div>
            <div class="sf-banner-heading-large2">Gallery Page</div>
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
    </div> --}}
    <!-- Banner Area End -->

    <!-- Gallery section -->
    <section class="aon-innerpage-area">
      <div class="site-top-line"></div>
      <div class="container">
        <div class="section-content">
          <div class="aon-gallery-section">
            <div class="row">
              <!--block 1-->
              @if (count($Gallerys) > 0)

                    @foreach ($Gallerys as $Gallery)

              <div class="col-md-5">
                <div class="aon-project-box">
                  <div class="aon-project-pic">
                    <img src="{{asset('storage/' . $Gallery->image)}}" alt="" />
                  </div>
                  <div class="aon-project-overlay"></div>
                  <h2 class="aon-project-name">
                    Visit Our planned modern farm
                  </h2>
                  <a href="javascript:;" class="aon-project-more"
                    ><i class="fa fa-angle-right"></i
                  ></a>
                </div>
              </div>
              <!--block 1-->
              <div class="col-md-7">
                <div class="aon-project-box aon-pro-large">
                  <div class="aon-project-pic">
                    <img src="{{asset('storage/' . $Gallery->image)}}"  alt="" />
                  </div>
                  <div class="aon-project-overlay"></div>
                  <h2 class="aon-project-name">
                    Visit Our planned modern farm
                  </h2>
                  <div class="aon-project-more">
                    <i class="fa fa-angle-right"></i>
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
            <div class="aon-paging-control">
              <div class="site-pagination2">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#">01</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">02</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">03</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">04</a>
                  </li>
                </ul>
              </div>

              <div class="aon-paging-arrow">
                <div class="aon-paging-arrow-inner">
                  <button type="button">
                    <i class="flaticon-left-arrow"></i>
                  </button>
                  <button type="button">
                    <i class="flaticon-right-arrows"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

    <!-- Testimonial section  END -->

    <section class="aon-add-area">
      <div class="container">
        <div class="section-content">
          <img src="images/add-one.png" alt="" />
        </div>
      </div>
      <div class="site-bot-line"></div>
    </section>
  </div>
  <!-- Content END-->
@endsection

