@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Service Detail'])


    <div class="aon-page-jobs-wrap">
        <div class="site-top-line"></div>
        <div class="container">
            <div class="row">
                @if (count($Services) > 0)
                @foreach ($Services as $Service)
                <p>ID: {{ $Service->id }}</p>



                <!-- Left part start -->
                <div class="col-lg-8 col-md-12">

                    <div class="aon-service-detail">
                        <div class="aon-service-top-media">
                            <img src="{{ asset('storage/' . $Service->image) }}" alt="">
                        </div>
                        <div class="aon-service-detail-content" id="strategy" >
                            <div class="aon-sd-mid">
                                <div class="aon-sd-title">
                                    <div class="aon-sd-title-icon">
                                        <i class="flaticon-milk-2 aon-icon"></i>
                                    </div>
                                    <div class="aon-sd-title-content">
                                        <span>Natural Milk</span>
                                        <h4>Milk Online Sales System.</h4>
                                    </div>
                                </div>
                                <p>
                                    Dignissim, et dictum nisl tempor. Sed eleifend justo eu metus fringilla posuere nec sit amet nunc. In at nibh velit. Sed congue malesuada nibh ut mattis. Integer eu hendrerit magna. Integer at lacinia leo. Aliquam varius dignissim urna. Massa nisl, sagittis a pharetra in, vestibulum lobortis turpis. Proin aliquet convallis purus bibendum ultricies. Aene sed lobortis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Interger Maecenas commodo a leo in egestas.
                                </p>
                            </div>

                            <div class="aon-sd-mid">
                                <h4 class="aon-sd-title2">What you'll learn</h4>
                                <div class="aon-list-check-style1">
                                    <ul>
                                        <li><i class="feather-check"></i><span>Vestibulum lobortis turpis-</span> Proin aliquet convallis purus bibendum ultricies. </li>
                                        <li><i class="feather-check"></i><span>Vestibulum lobortis turpis-</span> Proin aliquet convallis purus bibendum ultricies. </li>
                                        <li><i class="feather-check"></i><span>Vestibulum lobortis turpis-</span> Proin aliquet convallis purus bibendum ultricies. </li>
                                        <li><i class="feather-check"></i><span>Vestibulum lobortis turpis-</span> Proin aliquet convallis purus bibendum ultricies. </li>
                                    </ul>
                                </div>

                                <p>Dignissim, et dictum nisl tempor. Sed eleifend justo eu metus fringilla posuere nec sit amet nunc. In at nibh velit. Sed congue malesuada nibh ut mattis. Integer eu hendrerit magna. Integer at lacinia leo. Aliquam varius dignissim urna. Massa nisl, sagittis a pharetra in, vestibulum lobortis turpis. Proin aliquet convallis purus bibendum ultricies. Aene sed lobortis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Interger Maecenas commodo a leo in egestas.
                                </p>
                            </div>

                            <div class="aon-sd-mid">

                                <h4 class="aon-sd-title2">Engineering</h4>

                                <p>Posuere nec sit amet nunc. In at nibh velit. Sed congue malesuada nibh ut mattis. Integer eu hendrerit magna. Integer at lacinia leo. Aliquam varius dignissim urna. Massa nisl, sagittis a pharetra in, vestibulum lobortis turpis. Proin aliquet convallis purus bibendum ultricies. Aene sed lobortis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                            </div>

                            <div class="aon-sd-mid">
                                <h4 class="aon-sd-title2">Thesis Help</h4>
                                <p>Sed congue malesuada nibh ut mattis. Integer eu hendrerit magna. Integer at lacinia leo. Aliquam varius dignissim urna. Massa nisl, sagittis a pharetra in, vestibulum lobortis turpis. Proin aliquet convallis purus bibendum ultricies. Aene sed lobortis diam. Class aptent taciti sociosqu per conubia nostra, per inceptos himenaeos.</p>

                                <p>Sed congue malesuada nibh ut mattis. Integer eu hendrerit magna. Integer at lacinia leo. Aliquam varius dignissim urna. Massa nisl, sagittis a pharetra in, vestibulum lobortis turpis. Proin aliquet convallis purus bibendum ultricies. Aene sed lobortis diam. Class aptent taciti sociosqu per conubia nostra, per inceptos himenaeos.</p>
                            </div>
                        </div>

                    </div>

                    <div class="aon-paging-control">

                        <div class="site-pagination2">
                            <ul class="pagination">
                            <li class="page-item">{{ $Services->links() }}</li>
                            </ul>
                        </div>


                    </div>
                    <br>


                </div>


                <div class="col-lg-4 col-md-12">

                    <aside class="side-bar2 ">

                        <!-- SEARCH -->
                        <div class="widget ">
                             <div class="widget_search_bx2">
                                <div class="text-left m-b30">
                                    <h3 class="widget-title">Search Here</h3>
                                </div>
                                 <form role="search" method="post">
                                     <div class="input-group">
                                         <input name="news-letter" type="text" class="form-control"
                                         placeholder="Enter your keyword...">
                                         <span class="input-group-btn">
                                             <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                         </span>
                                     </div>
                                 </form>
                             </div>
                         </div>



                        <!-- CATEGORY -->
                        <div class="widget widget_services ">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">Services List</h3>
                            </div>
                            <ul>
                                <li><a href="#strategy">UX strategy</a></li>
                                <li class="active"><a href="javascript:void(0);">Information architecture</a></li>
                                <li><a href="javascript:void(0);">Prototyping</a></li>
                                <li><a href="javascript:void(0);">Wireframing</a></li>
                                <li><a href="javascript:void(0);">UI Design</a></li>
                                <li><a href="javascript:void(0);">Figma Design</a></li>
                            </ul>
                        </div>

                        <!-- CATEGORY -->
                        {{-- <div class="widget widget_download-file">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">Download Now</h3>
                            </div>

                            <a href="javascript:;" class="file-btn site-button-secondry btn-animate-one btn-block">
                                <i class="flaticon-pdf"></i> Download PDF File
                            </a>
                            <a href="javascript:;" class="file-btn site-button btn-animate-one btn-block">
                                <i class="flaticon-doc"></i> Download DOC File
                            </a>

                        </div> --}}

                        {{-- <div class="aon-widget-help">
                            <div class="aon-widget-help-top">
                                <img src="images/need-help.jpg" alt="">
                                <div class="aon-widget-help-mid">
                                    <h3 class="help-title">We Need Help?</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse.</p>
                                </div>
                            </div>


                        </div> --}}



                    </aside>

                </div>
                <!-- Side bar END -->

        @endforeach

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

@endsection
