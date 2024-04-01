

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
                   <div class="card-header bg-primary text-center text-light"></div>

                 <form action="{{route('add.about')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden"  name="old_image" >
                   <div class="card-body text-right">
                       <div class="form-group">
                           <label for="name">اسم </label>
                           <input type="text" class="form-control"  name="name"
                           placeholder="اسم ">
                       </div>
                       <div class="form-group">
                        <label for="name">title</label>
                        <input type="text" class="form-control"  name="title"
                        placeholder="اسم ">
                    </div>
                       <div class="form-group">
                           <label for="description">Descriotion </label>
                           <textarea class="form-control"  name="descriptionEN"></textarea>
                       </div>



                   <div class="form-group">

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
                               <label>صورة </label>
                               <input type="file" name="image" class="form-control" id="image">
                           </div>
                           <br>
                           <div class="form-group">
                               <img id="showImage"  style="width: 100px; height: 100px;"> </div>


                           <br>
                           <div class="form-group text-center">
                               <button class="btn btn-primary" type="submit">Add </button>
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
