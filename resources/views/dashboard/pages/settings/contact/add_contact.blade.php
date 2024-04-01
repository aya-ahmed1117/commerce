



@extends('dashboard.layouts.app')
@section('content')

              <form method="POST" action="{{route('add.contact')}}" enctype="multipart/form-data">
                @csrf

                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Contacts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
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
                   <h3 class="card-title">Add Contacts</h3>
                 </div>
                   <div class="card-body">
                     <div class="form-group">
                       <label for="exampleInputName">Name</label>
                       <input type="number" class="form-control" id="exampleInputName" name="phone"
                       placeholder="Enter name">
                     </div>

                     <div class="form-group">
                       <label for="exampleInputAddress">Address</label>
                       <input type="text" class="form-control" id="exampleInputAddress" name="address"
                        placeholder="add address">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputMap">Title</label>
                        <input type="text" class="form-control" id="exampleInputMap" name="map"
                         placeholder="add map">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email"
                         placeholder="add email">
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


            @endsection
