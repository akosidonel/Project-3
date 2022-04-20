<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GSO | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>General Services Office </b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('auth.check') }}" method="post">

      @if(Session::get('fail'))
          <div class="alert alert-danger alert-dismissible" role="alert">
              <div class="alert-message">
                <strong>Oppps!</strong>{{ Session::get('fail')}}
              </div>
            </div>
      @endif

      @csrf

      <div class="form-group row mb-3">
          <div class="col-sm">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
          </div>
      </div>
      <div class="form-group row mb-3">
            <div class="col-sm">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
      </div>

        <div class="row mb-3">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-2">
        <a href="/auth/recover-password">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
