
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
                    <h3 class="card-title">Services</h3>

                    <div class="card-tools">
                        <div class="input-group-append">
                            <a href="{{route('store.service')}}">
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Discription</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
{{--
                        @foreach ($aboutus as $about=>$aID)
                        <tr>
                            <th scope="row">{{$aboutus = $about+1 }}</th>

                             --}}
                        @if (count($Services) > 0)

                             @foreach ($Services as $service=>$aID)
                             <tr>
                                 <th scope="row">{{$Services = $service+1 }}</th>

                             <td>{{$aID->name}}</td>
                             <td>{{$aID->title}}</td>
                             <td>{!!$aID->descriptionEN!!}</td>

                 <td>

                    <a type="button" class="btn btn-primary" href="{{route('update.service',$aID->id)}}">
                        Update
                      </a>
                    </td>

                 <td> <a href="{{ route('delete.service',$aID->id) }}" class="btn btn-danger" id="delete">Deete</a></td>
                 <td>
                 <div class="media">
                    <img src='{{asset("storage/$aID->image")}}'  class="img-size-50 mr-3 img-circle">
                  </div>
                </td>
                         </tr>
                     @endforeach

                     @else
                             <p>لا يوجد خدمات</p>
                     @endif

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Discription</th>
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







@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('scripts')
<script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/toastr/toastr.min.js') }}"></script>
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
