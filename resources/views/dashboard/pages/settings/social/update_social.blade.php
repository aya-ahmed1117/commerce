

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
                   <div class="card-header bg-primary text-center text-light">Social Media</div>

                 <form action="{{route('edit.social',$Socials->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden"  name="old_image" value="{{ $Socials->image}}">
                   <div class="card-body text-right">
                       <div class="form-group">
                           <label for="name">Member Name</label>
                           <input type="text" class="form-control" value="{{$Socials->name}}" disabled
                           placeholder="اسم الوجبة">
                       </div>
                       <div class="form-group">
                        <label for="name">Social Link</label>
                        <input type="text" class="form-control" value="{{$Socials->link}}" name="link"
                        placeholder="Social Link">
                    </div>

                   <div class="form-group">

                           <div class="form-group">
                               <label>صورة الوجبة</label>
                               <input type="file" name="image" class="form-control" id="image">
                           </div>
                           <br>
                           <div class="form-group">
                               <img id="showImage" src="{{asset("storage/$Socials->image")}}"
                               value="{{asset("storage/$Socials->image")}}" style="width: 100px; height: 100px;">
                            </div>
                           <br>
                           <div class="form-group text-center">
                               <button class="btn btn-primary" type="submit">Update social member</button>
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
