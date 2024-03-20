



@extends('dashboard.layouts.app')
@section('content')



   <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('add.slider')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name"
                    placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDescription">description</label>
                    <input type="text" class="form-control" id="exampleInputDescription" name="description" placeholder="description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            </div>
        </div>
    </div>

    @if (session('message'))
    <script>
      // $('.toastrDefaultSuccess').click(function() {
    toastr.success({{ session('message') }});
  // });
  </script>
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection
