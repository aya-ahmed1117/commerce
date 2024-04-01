

@extends('dashboard.layouts.app')

@section('content')
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

                 <form action="{{route('edit.service',$Services->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden"  name="old_image" value="{{ $Services->image}}">
                   <div class="card-body text-right">
                       <div class="form-group">
                           <label for="name">اسم الوجبة</label>
                           <input type="text" class="form-control" value="{{$Services->name}}" name="name"
                           placeholder="اسم الوجبة">
                       </div>
                       <div class="form-group">
                        <label for="name">title</label>
                        <input type="text" class="form-control" value="{{$Services->title}}" name="title"
                        placeholder="اسم الوجبة">
                    </div>
                       <div class="form-group">
                           <label for="description">وصف الوجبة</label>
                           <textarea class="form-control" value="{{$Services->descriptionEN}}"
                            name="descriptionEN">{{$Services->descriptionEN}}</textarea>
                       </div>



                   <div class="form-group">
                       <h5>اختر صنف <span class="text-danger">*</span></h5>
                       <div class="controls">

                          {{-- <select name="category" value="{{$Services->category}}" class="form-control" required="">
                            {{$Services->category}}
                               <option value="" selected="" disabled="">اختر صنف</option>
                               @foreach  ($Services as $row)
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
                               <img id="showImage" src="{{asset("storage/$Services->image")}}" value="{{asset("storage/$Services->image")}}" style="width: 100px; height: 100px;"> </div>


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
