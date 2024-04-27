


@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Gallery'])



  <!-- Content -->
  <div class="page-content">
    <style>
         .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        /* Define styles for each grid cell */
        .gallery img {
            width: 100%;
            height: auto;
        }

        /* Example of different styles for each grid cell */
        .grid-cell-1 {
            background-color: red;
            grid-row: span 2 / auto;
    grid-column: span 2 / auto;
        }

        .grid-cell-2 {
            background-color: blue;
        }
        </style>

    <!-- Gallery section -->
    <section class="aon-innerpage-area">
      <div class="site-top-line"></div>
      <div class="container">
        <div class="section-content">
          <div class="aon-gallery-section">
            <div class="row">

                <div class="gallery">
                    @if(!$Gallerys22->isEmpty())
                        @foreach ($Gallerys22 as $key => $Gallery)
                            @php
                                $cssClass = 'grid-cell-' . ($key + 1);
                            @endphp
                            <img class="{{ $cssClass }}" src="{{ asset('storage/' . $Gallery->image) }}" title="{{ $Gallery->id }}" alt="Northern Winter Sky Image" />
                        @endforeach
                    @endif
                </div>

                <!--block 1-->
                {{-- @if (count($Gallerys) > 0) --}}
                {{-- @if  (!$Gallerys22->isEmpty()) --}}
                <div class="gallery">
                @if(!$Gallerys22->isEmpty())
                    @foreach ($Gallerys22  as $Gallery)
                        <div class="col-md-5">
                            <div class="aon-project-box">
                                <div class="aon-project-pic">
                                    {{-- <img src="{{asset('storage/' . $Gallery->image)}}" title="{{$Gallery->id}}" /> --}}
                                </div>
                                <div class="aon-project-overlay"></div>
                                <h2 class="aon-project-name">
                                    {{$Gallery-> name}}
                                </h2>
                                <a href="{{asset('storage/' . $Gallery->image)}}" target="_blank" class="aon-project-more"
                                  ><i class="fa fa-angle-right"></i
                                ></a>
                            </div>
                        </div>

                    @endforeach


                    {{-- @foreach ($Gallerys22 as $post)
                    <div class="col-md-7">
                        <div class="aon-project-box">
                            <div class="aon-project-pic">
                                <img src="{{asset('storage/' . $post->image)}}" title="{{$Gallery->id}}" />
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

                    @endforeach --}}

<br>
<br>
<br>
<br>

                    <div class="aon-paging-arrow">

                        {{ $Gallerys22->links() }}

                        </div>
                        <br>
                        <br>
                        <br>

                @else
                <div class="aon-footer-logo">
                  <img src="{{asset('assets/frontend/images/wetaly/removebg-.png')}}" alt="" />
                </div>
                 @endif


                </div>
                {{-- {{ $Gallerys22->links() }} --}}
            {{-- <div class="aon-paging-control">
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
              </div> --}}

                </div>
            </div>
        </div>

      </div>

    </section>
  </div>

  <script>
//     app.controller('BuggyController', ['$scope', function ($scope) {
//     var self = this;
//     self.currentPage = 1;
//     self.uibSize = 8;
//     self.maxShownRecords = 25;
//     self.totalRecords = 1234;

//     self.getMaxPageNumber = function () {
//         return Math.ceil(self.totalRecords / self.maxShownRecords);
//     };

//     $scope.$watch(function () {
//         return self.currentPage;
//     }, function (newValue, oldValue) {
//         if (newValue !== oldValue) {
//             self.goToPage(self.currentPage);
//         }
//     });

//     self.goToPage = function (val) {
//         console.log('Go to page:', val);
//     };
// }]);
    </script>
@endsection

