<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Time Mall</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('adminasset/vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
  
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('adminasset/css/bootstrap.min.css')}}" rel="stylesheet">
   
    <!-- Mystic styles -->
    <link href="{{ asset('adminasset/css/style.css')}}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('adminasset/img/85055897_2290538387910995_9008169895875051520_n.png')}}">

</head>

<body class="ms-body   ms-primary-theme ms-has-quickbar">
    <div class="row no-gutters justify-content-center login-wrapper">
        <div class="col-md-6 col-10">
            <div class="login mt-5 p-5 bg-white">
                <div class="logo mb-4">
                    <img src="{{ asset('adminasset/img/85055897_2290538387910995_9008169895875051520_n.png')}}" class="img-fluid" alt="">
                </div>
                Admin
                <form method="POST" action="{{ route('admin-login') }}">
                    @csrf
                    
                        <div class="mb-3">
                          <label for="userName">User Name</label>
                          <div class="input-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="Password">Password</label>
                          <div class="input-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 d-block w-100">
                            {{ __('Login') }}
                        </button>

                 </form>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="{{ asset('adminasset/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('adminasset/js/popper.min.js')}}"></script>
    <script src="{{ asset('adminasset/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('adminasset/js/perfect-scrollbar.js')}}"> </script>
    <!-- Global Required Scripts End -->
<!-- Circular Progress Bar -->
<script src="{{ asset('adminasset/vendors/jquery-circle-progress/dist/circle-progress.min.js')}}"></script>

    <!-- Settings -->
    <script src="{{ asset('adminasset/js/settings.js')}}"></script>

</body>

</html>
                  
                       