



@extends('dashboard.layouts.app')
@section('content')



        <form method="POST" action="{{route('add.team')}}" enctype="multipart/form-data">
            @csrf

                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Teames</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Teames</li>
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
                                <h3 class="card-title">Add Teames</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" class="form-control" requiredid="exampleInputName" name="name"
                                placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputTitle">Title</label>
                                    <input type="text" class="form-control" id="exampleInputTitle" name="title"
                                 placeholder="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress">Address</label>
                                    <input type="text" class="form-control" id="exampleInputAddress" name="address"
                                placeholder="address">
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
