
@extends('dashboard.layouts.app')

@section('content')

    <section class="pb-4">
        <div class="bg-white border rounded-5">

            <section class="py-4 px-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>

                        <div class="card-tools">
                            <div class="input-group-append">
                                <a href="{{route('store.product')}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                    +
                                  </button>
                                </a>
                            </div>

                        </div>
                      </div>
                      @if (session('message'))
                      <div class="alert alert-success" role="alert">
                          {{ session('message') }}
                      </div>
                  @endif
                <div id="table_confirm_delete" class="table-editor">
                    <div class="table-editor__inner table-responsive ps" style="overflow: auto; position: relative;">
                        <table id="example1" class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="" scope="col"> ID</th>
                                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="company"
                                            class="table-editor__sort-icon fas fa-arrow-up"></i> Name</th>
                                    <th style="" scope="col"> Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Products as $Product)

                                <tr scope="row" data-mdb-index="2">
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                        {{$Product->id}}
                                    </td>
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                        {{$Product->name}}
                                    </td>
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                        {{$Product->titel}}

                                    </td>
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                        <div class="media">
                                            <img src='{{asset("storage/$Product->image")}}' class="img-size-50 mr-3 img-circle">
                                            </div>
                                    </td>

                                    <td><a href="{{ Route('update.product',$Product->id) }}"
                                        class="me-2 btn btn-lg text-dark edit-button">
                                        <i class="far fa-edit"></i>Edit</a> </td>
                                        <td> <a href="{{ Route('delete.product',$Product->id) }}" id="delete"
                                             class="btn btn-lg text-dark popconfirm-toggle ">
                                        <i class="far fa-trash-alt"></i>Delete</a>
                                    </td>
                                </tr>


                                @endforeach

                        <tfoot>
                         <tr>
                            <th style="cursor: pointer;" scope="col"><i data-mdb-sort="company"
                                    class="table-editor__sort-icon fas fa-arrow-up"></i> ID</th>
                            <th style="" scope="col"> Name</th>
                            <th style="cursor: pointer;" scope="col"><i data-mdb-sort="employees"
                                    class="table-editor__sort-icon fas fa-arrow-up"></i> Email</th>
                            <th scope="col">Actions</th>
                          </tr>
                            </tfoot>

                        </tbody>

                    </table>
                    </div>


                </div>
            </section>
        </div>
    </section>

    @if (session('message'))
    <script>
      // $('.toastrDefaultSuccess').click(function() {
    toastr.success({{ session('message') }});
  // });
  </script>
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
{{-- <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}


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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
