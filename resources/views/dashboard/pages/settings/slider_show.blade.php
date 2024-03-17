{{-- @extends('dashboard.layouts.main') --}}
@extends('dashboard.layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/modules/b4bca5d779777cff9d5c51553952a0a1.min.css">
    <link rel='stylesheet' id='roboto-subset.css-css'
        href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5'
        type='text/css' media='all' /> --}}

    <section class="pb-4">
        <div class="bg-white border rounded-5">

            <section class="py-4 px-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Users</h3>

                        <div class="card-tools">
                            <div class="input-group-append">
                                <a href="{{route('store.slider')}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                    +
                                  </button>
                                </a>
                            </div>

                        </div>
                      </div>
                <div id="table_confirm_delete" class="table-editor">
                    <div class="table-editor__inner table-responsive ps" style="overflow: auto; position: relative;">
                        <table id="example2" class="table table-hover">
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
                                @foreach ($sliders as $slider)

                                <tr scope="row" data-mdb-index="2">
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                        {{$slider->id}}</td>
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="company">
                                        {{$slider->name}}</td>
                                    <td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="office">
                                        {{$slider->image}}</td>

                                    <td><a href="{{ Route('update.slider',$slider->id) }}"
                                        class="me-2 btn btn-lg text-dark edit-button">
                                        <i class="far fa-edit"></i>Edit</a>
                                          <a href="{{ Route('update.slider',$slider->id) }}"
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
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

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
{{--<script>
    const advancedColumns = [{
            width: 250,
            label: 'Company',
            field: 'company',
        },
        {
            width: 250,
            sort: false,
            defaultValue: 'Warsaw',
            options: ['London', 'Warsaw', 'New York'],
            inputType: 'select',
            label: 'Office',
            field: 'office',
        },
        {
            width: 250,
            inputType: 'number',
            defaultValue: 1,
            label: 'Employees',
            field: 'employees',
        },
        {
            width: 100,
            defaultValue: false,
            inputType: 'checkbox',
            label: 'International',
            field: 'international',
        },
    ];

    const advancedRows = [{
            company: 'Smith & Johnson',
            office: 'London',
            employees: 30,
            international: true,
        },
        {
            company: 'P.J. Company',
            office: 'London',
            employees: 80,
            international: false,
        },
        {
            company: 'Food & Wine',
            office: 'London',
            employees: 12,
            international: false,
        },
        {
            company: 'IT Service',
            office: 'London',
            employees: 17,
            international: false,
        },
        {
            company: 'A. Jonson Gallery',
            office: 'London',
            employees: 4,
            international: false,
        },
        {
            company: 'F.A. Architects',
            office: 'London',
            employees: 4,
            international: false,
        },
    ];

    const tableDisableEdit = new TableEditor(
        document.getElementById('table_inputs'), {
            columns: advancedColumns,
            rows: advancedRows
        }, {
            entries: 5,
            entriesOptions: [5, 10, 15]
        }
    );
</script>--}}


@endsection
