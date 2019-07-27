<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Anypixel Admin - Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/responsive.css') }}'">
</head>

<body>
<div id="preloader">
    <div class="loader"></div>
</div>
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="{{ route('admin.login.submit') }}" method="post">
                {{ csrf_field() }}
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Site</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp focused">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" id="exampleInputEmail1">
                        <i class="ti-email"></i>
                        @if ($errors->login->has('email'))
                            <p>{{ $errors->login->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-gp focused">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" id="exampleInputPassword1">
                        <i class="ti-lock"></i>
                        @if ($errors->login->has('password'))
                            <p>{{ $errors->login->first('password') }}</p>
                        @endif
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" name="remember" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="{{ asset('/admin/assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/preloader.js') }}"></script>
</body>

</html>
