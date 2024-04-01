

@extends('dashboard.layouts.app')

@section('content')

    {{-- <form action="{{route('update.about')}}" method="POST" enctype="multipart/form-data">
        @csrf

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update About us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About us</li>
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
                   <h3 class="card-title">Update About us</h3>
                 </div>
                   <div class="card-body">
                     <div class="form-group">
                       <label for="exampleInputName">Name</label>
                       <input type="text" class="form-control" id="exampleInputName" name="name"
                       placeholder="Enter name">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputDescription">Title</label>
                       <input type="text" class="form-control" id="exampleInputDescription" name="title"
                        placeholder="description">
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


    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Summernote
              </h3>
            </div>

            <div class="card-body">
              <textarea id="summernote"  name="descriptionEN" >

              </textarea>

            </div>
          </div>
        </div>

      </div>

    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Summernote
                </h3>
              </div>

              <div class="card-body">
                <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" name="descriptionIT" rows="3" placeholder="Enter ..."></textarea>
                  </div>

              </div>
            </div>
          </div>

        </div>

      </section>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
</div>
</div>
</div>
    </form> --}}

    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-4">

           @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-primary">
                                @foreach ($errors->all() as $error)
                                    <p> {{ $error }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
               <div class="card">
                   <div class="card-header bg-primary text-center text-light">الوجبة</div>

                 <form action="{{route('edit.about',$aboutus->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden"  name="old_image" value="{{ $aboutus->image}}">
                   <div class="card-body text-right">
                       <div class="form-group">
                           <label for="name">اسم الوجبة</label>
                           <input type="text" class="form-control" value="{{$aboutus->name}}" name="name"
                           placeholder="اسم الوجبة">
                       </div>
                       <div class="form-group">
                        <label for="name">title</label>
                        <input type="text" class="form-control" value="{{$aboutus->title}}" name="title"
                        placeholder="اسم الوجبة">
                    </div>
                       <div class="form-group">
                           <label for="description">وصف الوجبة</label>
                           <textarea class="form-control" value="{{$aboutus->descriptionEN}}" name="descriptionEN">
                            {{$aboutus->descriptionEN}}</textarea>
                       </div>



                   <div class="form-group">
                       <h5>اختر صنف <span class="text-danger">*</span></h5>
                       <div class="controls">

                          {{-- <select name="category" value="{{$aboutus->category}}" class="form-control" required="">
                            {{$aboutus->category}}
                               <option value="" selected="" disabled="">اختر صنف</option>
                               @foreach  ($aboutus as $row)
                                   <option value="{{ $row->cat_name }}">
                                       {{ $row->cat_name }}</option>
                               @endforeach
                           </select> --}}

                           <br>

                           <div class="form-group">
                               <label>صورة الوجبة</label>
                               <input type="file" name="image" class="form-control" id="image">
                           </div>
                           <br>
                           <div class="form-group">
                               <img id="showImage" style="width: 100px; height: 100px;"> </div>


                           <br>
                           <div class="form-group text-center">
                               <button class="btn btn-primary" type="submit">تعديل الوجبة</button>
                           </div>
                       </div>
                   </div>
               </div>
           </form>
       </div>
   </div>
   </div>
   </div>

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
