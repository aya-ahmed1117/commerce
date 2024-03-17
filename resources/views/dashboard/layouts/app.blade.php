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


        </body>
    </html>
