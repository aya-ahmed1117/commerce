

@extends('dashboard.layouts.app')

@section('content')
{{-- <div class="content-wrapper"> --}}
    <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Producs</li>
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
                   <h3 class="card-title">Quick Example</h3>
                 </div>
                   <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control"  name="name"
                        placeholder="Name">
                    </div>
                     <div class="form-group">
                         <label for="name">Title</label>
                         <input type="text" class="form-control"  name="title"
                         placeholder="title">
                     </div>
                     <div class="form-group">
                         <label for="name">Price</label>
                         <input type="number" class="form-control"  name="price"
                         placeholder="price">
                     </div>
                    {{-- <div class="form-group">
                        <label for="description">Description English</label>
                        <textarea class="form-control"
                         name="descriptionEN"></textarea>
                    </div>
                    <div class="form-group">
                     <label for="description">Description Arabic</label>
                     <textarea class="form-control"
                      name="descriptionAR"></textarea>
                 </div>
                 <div class="form-group">
                     <label for="description">Description Italy</label>
                     <textarea class="form-control"
                      name="descriptionIT"></textarea>
                 </div> --}}
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
    </form>


 @endsection
