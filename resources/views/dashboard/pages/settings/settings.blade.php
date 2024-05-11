

@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Settings</h3>
            </div>

        </div>
    </div>
</div>

   <!-- Main content -->
   <section class="content">

    <div class="card card-solid">
      <div class="card-body">

        <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                 role="tab" aria-controls="product-desc" aria-selected="true">Logo</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                role="tab" aria-controls="product-comments" aria-selected="false">SEO</a>
                {{-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                @if (isset($logo) && $logo->count() > 0)
                            @foreach($logo as $item)
                                @if ($item instanceof App\Models\Logo)
                                    <div class="media">
                                        <img src='{{asset("storage/$item->image")}}' class="img-size-50 mr-3 img-circle">
                                    </div>
                                @endif
                            @endforeach
                         @endif
                         --}}
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">

              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="container">
                    <div class="form-group">
                        <label >LOGO</label>

                        <form action="{{route('update.logo')}}"
                        class="theme-form" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- @if (count($logo) > 0) --}}
                            {{-- @foreach($logo as $item)
                        <div class="media">
                            <img src='{{asset("storage/$item->image")}}' class="img-size-50 mr-3 img-circle">
                          </div>
                          @endforeach --}}
                          @if (isset($logo) && $logo->count() > 0)
                          {{-- @foreach($logo as $item) --}}
                              @if ($logo instanceof App\Models\Logo)
                                  <div class="form-group">
                                      <img src='{{asset("storage/$logo->image")}}' class="img-size-50 mr-3">
                                  </div>
                              @endif
                          {{-- @endforeach --}}
                       @endif
                          <br>
                          {{-- @endif --}}
                        <div class="input-group">
                        <input type="file" name="image" class="form-control" id="image">
                        </div>
                    </div>
                        <div class="form-group">
                            <img id="showImage" style="width: 100px; height: 100px;">
                          </div>
                    </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                 </div>

              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                <div class="bg-white border rounded-5">
                    <div class="row">
                        <div class="col-sm-4 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">SEO Meta title </h4>
                                        <form action="{{route('update.title')}}"  class="theme-form"method="post">
                                            @csrf

                                            {{-- @foreach ($titles as $title)

                                                {{ $title->value }}

                                        @endforeach --}}


                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                            name="title" value=""
                                                            placeholder=""/>
                                                </div>
                                            <button type="submit2"class="btn btn-primary mt-2">تحديث</button>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">SEO Meta  Description</h4>
                                        <div class="form-group">
                                                <input type="text" class="form-control"
                                                        name="Description"
                                                        value=""
                                                        placeholder=""/>
                                            </div>
                                                <button type="submit"class="btn btn-primary mt-2">تحديث</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="text-center">
                              <h1 style="margin-top: 0;">Bootstrap Tags Input</h1>
                            </div>

                            <div class="form-group">
                              <label for="city_tag">Please write a tag</label>
                              <input type="text"
                              value="Istanbul, Adana, Adiyaman, Afyon, Agri, Aksaray, Ankara"
                              data-role="tagsinput" class="form-control" />
                            </div>
                          </div>


                        <div class="col-sm-4  p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">SEO Meta keywords </h4>



                                        <div class="form-group">
                                                <input type="text"data-role="tagsinput"   class="form-control"
                                                        name="keywords"
                                                        value=""
                                                        placeholder=""/>
                                            </div>
                                                <button type="submit"class="btn btn-primary mt-2">تحديث</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              {{-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
              </div> --}}
            </div>
          </div>
    </div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#showImage').hide();
        $('#image').on('change',function(a){
            $('#showImage').show();
            const reader = new FileReader();
            reader.onload = function(a){
             $('#showImage').attr('src',a.target.result);
            }
            reader.readAsDataURL(a.target.files['0']);

        })
    });
</script>

@endsection
