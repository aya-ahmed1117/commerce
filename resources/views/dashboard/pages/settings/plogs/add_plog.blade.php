



@extends('dashboard.layouts.app')
@section('content')




              <form method="POST" action="{{route('add.plog')}}" enctype="multipart/form-data">
                @csrf

                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Plogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plogs</li>
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
                   <h3 class="card-title">Add Plogs</h3>
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
                                    descriptions
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>descriptionEN</label>
                                    <textarea class="form-control" name="descriptionEN" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>descriptionIT</label>
                                    <textarea class="form-control" name="descriptionIT" rows="3" placeholder="Enter ..."></textarea>
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
                                      <!--    $table->string('name');
                                       $table->string('title')->nullable();

                                       $table->string('descriptionIT')->nullable();/.card-header -->
                                      <div class="card-body">
                                        <textarea id="summernote" name="descriptionAR">
                                          Place <em>some</em> <u>text</u> <strong>here</strong>
                                        </textarea>

                                      </div>
                                    </div>
                                  </div>

                                </div>

                              </section>



                            {{-- <div class="card-body">
                                <div class="form-group">
                                    <label>description AR</label>
                                    <textarea class="form-control" name="descriptionAR" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                            </div> --}}
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
    </form>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection
