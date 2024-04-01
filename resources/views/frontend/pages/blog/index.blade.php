@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Blogs'])

    <div class="aon-innerpage-area">
        <div class="site-top-line"></div>
        <div class="container">
            <div class="aon-blog-section">
                <div class="row">
                    <!-- Column 1 -->
                    @if (count($Plogs) > 0)

                    @foreach ($Plogs as $Plog)

                    <div class="col-lg-6 col-md-12 m-b30">
                        <div class="aon-latest-new-one  wow fadeInDown" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInDown;">
                            <div class="aon-post-wrap">
                                <!-- Content section for blogs start -->
                                <div class="aon-post-media">
                                    <img title="title" alt="" src="{{asset('storage/' . $Plog->image)}}">
                                </div>
                                <div class="aon-post-info">

                                    <div class="aon-post-date">
                                        <span class="date-dd">18</span>
                                        <span class="date-mm">Aug</span>
                                        <span class="date-yy">2022</span>
                                    </div>

                                    <h4 class="aon-post-title">
                                        <a href="blog-detail.html">Farm improvement depend on Their farm plan.</a>
                                    </h4>
                                    <p>There are many variations of passages of Lorem Ipsum available.</p>

                                    <div class="aon-post-meta">
                                        <ul>
                                            <li class="post-author">
                                                <span class="post-author-pic">
                                                    <img src="images/author.jpg" alt="">
                                                </span> By
                                                <a href="#">Creativemela</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- Content section for blogs end -->
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
                <div class="aon-paging-control">

                    <div class="site-pagination2">
                        <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">01</a></li>
                        <li class="page-item active"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                        </ul>
                    </div>

                    <div class="aon-paging-arrow">
                        <div class="aon-paging-arrow-inner">
                            <button type="button"><i class="flaticon-left-arrow"></i></button>
                            <button type="button"><i class="flaticon-right-arrows"></i></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
