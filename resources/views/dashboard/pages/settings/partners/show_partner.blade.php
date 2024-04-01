
{{-- @extends('dashboard.layouts.main') --}}
{{-- @extends('dashboard.settings.index') --}}
@extends('dashboard.layouts.app')
@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Partners</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Partners</li>
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
                    <h3 class="card-title">Partners</h3>

                    <div class="card-tools">
                        <div class="input-group-append">
                            <a href="{{route('store.partner')}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                +
                              </button>
                            </a>
                        </div>
                    </div>
                  </div>


                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Link</th>
                      <th>Image</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                        @if (count($Partners) > 0)

                             @foreach ($Partners as $partner=>$aID)
                             <tr>
                                <td scope="row">{{$Partners = $partner+1 }}</td>
                                <td>{{$aID->name}}</td>
                                <td>{{$aID->link}}</td>
                                <td>
                                    <div class="media">
                                        <img src='{{asset("storage/$aID->image")}}'  class="img-size-50 mr-3 ">
                                    </div>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary" href="{{route('update.partner',$aID->id)}}">
                                        Update
                                    </a>
                                </td>

                                <td> <a href="{{ route('delete.partner',$aID->id) }}" class="btn btn-danger" id="delete">
                                    Delete</a>
                                </td>

                         </tr>
                     @endforeach

                     @else
                             <p>No data Found</p>
                     @endif

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Image</th>
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

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>



    @endsection
@endsection
