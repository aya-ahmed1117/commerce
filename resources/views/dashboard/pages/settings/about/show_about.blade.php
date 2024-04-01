
{{-- @extends('dashboard.layouts.main') --}}
{{-- @extends('dashboard.settings.index') --}}
@extends('dashboard.layouts.app')
@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                {{-- <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div> --}}


                <div class="card-header">
                    <h3 class="card-title"> About Us</h3>

                    <div class="card-tools">
                        @if (count($aboutus) == 0)
                        <div class="input-group-append">
                            <a href="{{route('store.about')}}">
                            <button type="button" class="btn btn-primary">
                                +
                              </button>
                            </a>
                        </div>
                    @else

                     @endif
                      </div>
                    </div>
                  </div>


                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Admin / user</th>
                      <th>Email</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                 @if (count($aboutus) > 0)
                        @foreach ($aboutus as $about=>$aID)
                         <tr>
                             <th scope="row">{{$aboutus = $about+1 }}</th>

                             <td>{{$aID->name}}</td>
                             <td>{{$aID->title}}</td>
                             <td>{{$aID->descriptionEN}}</td>

                             <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                <div class="media">
                                    <img src='{{asset("storage/$aID->image")}}' class="img-size-50 mr-3 img-circle">
                                  </div>
                            </td>
                            <td><a href="{{route('updated.about',$aID->id)}}">
                                <button class="btn btn-primary">Update</button></a>
                            </td>

                            <td> <a href="{{ route('delete.about',$aID->id) }}" class="btn btn-danger"
                                id="delete">Delete</a>
                            </td>


                            </tr>
                            @endforeach

                     @else
                             <p>No Data Found</p>
                     @endif

                        </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      @if (session('message'))

      <div class="alert alert-success" role="alert">
          {{ session('message') }}
      </div>
  @endif


     <script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>
     <script>
        @if(Session::has('message_id'))
        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case'info':
            toastr.info("{{Session::get('message_id')}}");

            break;

             case'success':
            toastr.success("{{Session::get('message_id')}}");
            break;

            case'warning':
            toastr.warning ("{{Session::get('message_id')}}");
            break;

             case'error':
            toastr.error ("{{Session::get('message_id')}}");
            break;
        }

         @endif
        </script>
      @section('styles')
      <!-- DataTables -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @endsection

    @section('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('assets/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    @endsection
@endsection
