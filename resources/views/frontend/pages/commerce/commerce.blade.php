


@extends('frontend.layouts.aboutmaster')
@section('content')
<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>E-commerce</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">E-commerce</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12">
                  <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                  <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                  <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                  <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                  <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                  <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <h3 class="my-3">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

                <hr>
                <h4>Available Colors</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-default text-center active">
                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                    Green
                    <br>
                    <i class="fas fa-circle fa-2x text-green"></i>
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                    Blue
                    <br>
                    <i class="fas fa-circle fa-2x text-blue"></i>
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                    Purple
                    <br>
                    <i class="fas fa-circle fa-2x text-purple"></i>
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                    Red
                    <br>
                    <i class="fas fa-circle fa-2x text-red"></i>
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                    Orange
                    <br>
                    <i class="fas fa-circle fa-2x text-orange"></i>
                  </label>
                </div>

                <h4 class="mt-3">Size <small>Please select one</small></h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-xl">S</span>
                    <br>
                    Small
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                    <span class="text-xl">M</span>
                    <br>
                    Medium
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                    <span class="text-xl">L</span>
                    <br>
                    Large
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                    <span class="text-xl">XL</span>
                    <br>
                    Xtra-Large
                  </label>
                </div>

                <div class="bg-gray py-2 px-3 mt-4">
                  <h2 class="mb-0">
                    $80.00
                  </h2>
                  <h4 class="mt-0">
                    <small>Ex Tax: $80.00 </small>
                  </h4>
                </div>

                <div class="mt-4">
                  <div class="btn btn-primary btn-lg btn-flat">
                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                    Add to Cart
                  </div>

                  <div class="btn btn-default btn-lg btn-flat">
                    <i class="fas fa-heart fa-lg mr-2"></i>
                    Add to Wishlist
                  </div>
                </div>

                <div class="mt-4 product-share">
                  <a href="#" class="text-gray">
                    <i class="fab fa-facebook-square fa-2x"></i>
                  </a>
                  <a href="#" class="text-gray">
                    <i class="fab fa-twitter-square fa-2x"></i>
                  </a>
                  <a href="#" class="text-gray">
                    <i class="fas fa-envelope-square fa-2x"></i>
                  </a>
                  <a href="#" class="text-gray">
                    <i class="fas fa-rss-square fa-2x"></i>
                  </a>
                </div>

              </div>
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

  <script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
    })
  </script>
@endsection
