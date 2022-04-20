<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GSO | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page bg-info">
<div class="register-box">
  <div class="card">
    <div class="card-body register-card-body">
      <h4 class="login-box-msg">Get started</h4>

      <form action=" {{ route('auth.save_register') }}" method="post">
        @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
                  <div class="alert-message">
                    <strong>Well done </strong>{{ Session::get('success')}}
                  </div>
          </div>
        @endif
        @if(Session::get('fail'))
          <div class="alert alert-danger alert-dismissible" role="alert">
              <div class="alert-message">
                <strong>Oppps!</strong>{{ Session::get('fail')}}
              </div>
            </div>
          @endif	

        @csrf
        <div class="input-group">
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" value="{{ old('firstname')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('firstname') {{$message}} @enderror</span>
        <div class="input-group mt-3">
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" value="{{ old('lastname') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('lastname') {{$message}} @enderror</span>
        <div class="input-group mt-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
        <div class="input-group mt-3">
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ old('phone')}}">
          <div class="input-group-append"> 
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('phone') {{$message}} @enderror</span>
        <div class="input-group mt-3">
          <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('password') {{$message}} @enderror</span>
        <div class="row mt-3">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="/auth/login" class="text-center">I already have a account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
