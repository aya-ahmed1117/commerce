@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Services'])

    <section class="aon-about-area aon-about-area-padding">
        <div class="site-top-line"></div>
        <div class="container">
            <div class="section-content">
                <div class="aon-med-team-section">
                    <div class="row">
                        <!-- Column 1 -->
                        @if (count($Services) > 0)
                        @foreach ($Services as $Service)


                        <div class="col-lg-3 col-md-6">
                            <div class="aon-about-box aon-icon-effect">
                                <div class="aon-about-icon">
                                    <i class="flaticon-milk-2 aon-icon"></i>
                                    <img src="{{ asset('storage/' . $Service->image) }}">
                                </div>
                                {{-- <div class="aon-shop-pic">
                                    <img src="{{ asset('storage/' . $Service->image) }}">
                                </div> --}}
                                <div class="aon-about-circle"></div>
                                <h4 class="aon-about-title">{{$Service->title}}</h4>
                                <p class="aon-about-text">{{$Service->descriptionEN}}</p>
                                <a class="aon-about-btn" href="javascript:;"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        @endforeach
                        <!-- Column 2 -->


            @else

            <div class="col-lg-3 col-md-6">
                <div class="aon-about-box aon-icon-effect">
                    <div class="aon-about-icon">
                        <i class="flaticon-paint-palette aon-icon"></i>
                    </div>
                    <div class="aon-about-circle"></div>
                    <h4 class="aon-about-title">No service Found</h4>
                    <p class="aon-about-text">No service Found</p>
                    <a class="aon-about-btn" href="javascript:;"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
             @endif



                    </div>
                </div>
            </div>
        </div>
        <div class="site-bot-line"></div>
    </section>
@endsection
{{-- /*
<i class="flaticon-milk-2 aon-icon"></i>
<i class="flaticon-fruit aon-icon"></i>
<i class="flaticon-paint-palette aon-icon"></i>
<i class="flaticon-dairy-products aon-icon"></i>
<i class="flaticon-milk-2 aon-icon"></i>
<i class="flaticon-fruit aon-icon"></i>
<i class="flaticon-milk-box aon-icon"></i>


*/ --}}
