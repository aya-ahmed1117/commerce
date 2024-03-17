<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.includes.styles.stylelogin')
</head>

<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>WEtaly</b>Dashboard</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>


      @include('dashboard.pages.auth.index')

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->



@include('dashboard.includes.scripts.scriptslogin')
</body>
</html>
