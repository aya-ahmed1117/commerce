



@extends('dashboard.layouts.app')
@section('content')




              <form method="POST" action="{{route('add.gallery')}}" enctype="multipart/form-data">
                @csrf

                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                    </div>
                </div>
                </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <!-- general form elements -->
               <div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">Add Gallery</h3>
                 </div>
                   <div class="card-body">
                     <div class="form-group">
                       <label for="exampleInputName">Name</label>
                       <input type="text" class="form-control" id="exampleInputName" name="name"
                       placeholder="Enter name">
                     </div>

                     <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                        <input type="file" name="image" class="form-control" id="image">
                        </div>
                    </div>

                     {{-- <div class="form-group">
                       <label for="image">File input</label>
                       <div class="input-group">
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                           <input type="file" name="image" class="form-control" id="image">
                           <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                         </div>
                       <div class="input-group-append">
                           <span class="input-group-text">Upload</span>
                         </div>
                       </div>
                     </div> --}}

                     <div class="form-group">
                        <img id="showImage" style="width: 100px; height: 100px;">
                      </div>

                   </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#image').on('change',function(a){
                            const reader = new FileReader();
                            reader.onload = function(a){
                             $('#showImage').attr('src',a.target.result);
                            }
                            reader.readAsDataURL(a.target.files['0']);

                        })
                    });
                </script>


@endsection
