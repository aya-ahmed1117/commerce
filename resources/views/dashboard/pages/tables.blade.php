
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
                    <h3 class="card-title">Update Users</h3>

                    <div class="card-tools">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                                +
                              </button>
                        </div>
                      {{-- </div> --}}
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

                        {{-- @if (count($users)>0) --}}
                        @foreach ($users as $user=>$aID)
                         <tr>
                             <th scope="row">{{$users = $user+1 }}</th>

                             <td>{{$aID->name}}</td>
                             <td>{{$aID->is_admin}}</td>
                             <td>{{$aID->email}}</td>
                             {{-- <td>{{$aID->password}}</td> --}}
                             {{--,$aID->id <td style="width: 15%"><button class="btn btn-primary editbtn">تعديل</button></td> --}}


                 <td>
                    {{-- <button class="btn btn-primary editbtn">تعديل</button> --}}
                    <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#modal-lg">
                        Update
                      </button>
                    </td>

                 <td> <a href="{{ route('users.delete',$aID->id) }}" class="btn btn-danger" id="delete">حذف</a></td>

                         </tr>
                     @endforeach

                     {{-- @else
                             <p>لا يوجد وجبات </p>
                     @endif --}}

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Admin / user</th>
                        <th>Email</th>
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

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{-- @include('dashboard.pages.auth.forms.register_form') --}}
            <form amethod="POST" action="{{route('users.store')}}" >
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Full name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </span>
                        @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>


                    <div class="rinput-group ow mb-3">
                        <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('User type') }}</label>
                        <div class="form-group">
                            <select id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror"
                            name="is_admin" value="{{ old('is_admin') }}">
                                <option selected="" value="" disabled="">نوع المستخدم</option>
                                <option value="0">عميل</option>
                                <option value="1"> موظف</option>
                            </select>

                            @error('is_admin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password-confirm"
                        name="password_confirmation" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
          </div>

        </div>

      </div>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="{{route('users.update')}}" method="POST">
                    @csrf
                <input type="hidden" class="form-control" id="id" name="id">
                    <div class="mb-3">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
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

<script>
/*
    $(document).ready(function(){
      $('.closed').on('click',function(){
         $('#modal-lg').pisplay('none');
     });

        $('.editbtn').on('click',function(){
            $('#modal-lg').modal('show');

            $tr=$(this).closest('tr');

            var data=$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#id').val(data[1]);
            $('#name').val(data[2]);
            // $('#email').val(data[3]);

                });
            });
*/
 </script>

    @endsection
@endsection
