
@extends('frontend.layouts.aboutmaster')

@section('content')
    @include('frontend.includes.page-banner', ['title' => 'Products'])

    <div class="aon-shop-wrap">
        <div class="site-top-line"></div>
        <div class="container">
            <div class="product-filter-wrap d-flex justify-content-between align-items-center">
                <div class="product-filter-left d-flex">
                    <button class="shop-list-btn m-r10">
                        <i class="feather-grid"></i>
                    </button>
                    <button class="shop-list-btn m-r10">
                        <i class="feather-list"></i>
                    </button>
                    <form class="woocommerce-ordering select-box-border-style1-wrapper" method="get">
                        <select class="form-select" aria-label="Default select example">
                            <option value="menu_order">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>
                </div>
                <div class="product-filter-right d-flex align-items-center">
                    <span class="woocommerce-result-count">Milcandy <span>25, 316, 00</span> Products Available.</span>
                    <div class="aon-pro-search ">
                        <input class="form-control sf-form-control" name="company_name" type="text" placeholder="Search">
                        <button class="pro-search-btn"><i class="fs-input-icon feather-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="product-listing-area">
                <form action="{{ route('add.cart') }}" method="post">
                    @csrf
                <div class="row">

                    @if (count($Products)>0)
                    @foreach ($Products as $Product)

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="{{asset("storage/$Product->image")}}" alt="">
                            </div>
                            <h4 class="aon-shop-title">{{$Product->name}}</h4>
                            <p class="aon-shop-text">{{$Product->name}}</p>
                                <input type="hidden" name="product_id" value="{{ $Product->id }}">
                                <input type="hidden" name="price" value="{{ $Product->price }}">
                                <input type="hidden" name="quantities" value="1">
                            <div class="aon-shop-bot d-flex">
                                <div class="aon-shop-price">{{$Product->price}} LE</div>
                                <div class="aon-shop-add-to d-flex">
                                    {{-- <button class="aon-shop-btn" type="button"><i class="fa fa-heart"></i></button> --}}
                                    <button class="aon-shop-btn" type="submit"><i class="fa fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <div class="aon-shop-box">
                        <h4 class="aon-shop-title"> No Data Found </h4>
                    </div>
                     @endif
{{--
                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-2.png" alt="">
                            </div>
                            <h4 class="aon-shop-title">Organic Food</h4>
                            <p class="aon-shop-text">There are many variations of passages Lorem.</p>

                            <div class="aon-shop-bot d-flex">
                                <div class="aon-shop-price">$29.00</div>
                                <div class="aon-shop-add-to d-flex">
                                    <button class="aon-shop-btn" type="button"><i class="fa fa-heart"></i></button>
                                    <button class="aon-shop-btn" type="button"><i class="fa fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
