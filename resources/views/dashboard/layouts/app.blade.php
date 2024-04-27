<!DOCTYPE html>
<html lang="en">

   @include('dashboard.includes.header')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">


        @include('dashboard.includes.loader')
        @include('dashboard.includes.navbar')
        @include('dashboard.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">

        @yield('breadcrumb')
        </div>

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

      @yield('content')
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        @include('dashboard.includes.control_sid')
        @include('dashboard.includes.footer')
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    {{-- <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
    {{-- <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'هل تريد تأكيد الحذف',
                icon: 'question',
                iconHtml: '؟',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                showCancelButton: true,
                showCloseButton: true

                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = link;
                                        Swal.fire(
                                            'تم الحذف!',
                                            'تم الحذف بنجاح.',
                                            'نجاح'
                                        )
                                    }
                                });
                            });
                        </script>


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
           <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        </body>
    </html>
