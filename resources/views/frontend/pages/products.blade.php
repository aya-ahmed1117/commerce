@extends('frontend.layouts.master')

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
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-1.png" alt="">
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
                    </div>

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
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-3.png" alt="">
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
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-4.png" alt="">
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
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-4.png" alt="">
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
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-3.png" alt="">
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
                    </div>

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
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="aon-shop-box">
                            <div class="aon-shop-pic">
                            <img src="images/products/pic-1.png" alt="">
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
    </div>
@endsection
