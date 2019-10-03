<?php
$asset = asset('/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{$asset}}plugins/mCustomScrollbar/jquery.mCustomScrollbar.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{$asset}}css/style.css" />
    <title>Attendance System</title>
</head>

<body class="dashboard dashboard-auth">

    <main id="main-content-auth">
        <div class="auth-bg" style="background-image: url('{{$asset}}images/bg_login.jpg');"></div>
        <div class="auth-header">
            <div class="container-fluid">
                <div class="auth-brand">
                    <img src="{{$asset}}images/logo.png" alt="">
                </div>
            </div>
        </div>
        <div class="card-auth">
            @include('custom_extras.success_error')
            <div class="auth-body">
                <h5 class="auth-title">Login to Attendance System</h5>
                <form action="/login" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="in__email" class="auth-form-label">Email</label>
                        <input type="text" id="in__email" class="form-control" name="email" required="">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <span style="color:red;">{{ $errors->first('email') }}</span>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="in__password" class="auth-form-label">Password</label>
                        <input type="password" id="in__password" class="form-control" name="password" required="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <span style="color:red;">{{ $errors->first('password') }}</span>
                            </span>
                        @endif
                    </div>
                    <!-- <div class="form-group">
                        <ul class="auth-form-meta">
                            <li>
                                <a href="" class="forgot-password">Forgot Password?</a>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                    <div class="form-gruop mb-0">
                        <button type="submit" class="btn btn-custom-primary btn-block btn-lg">Sign in</button>
                    </div>
                </form>
            </div>
            <!-- <div class="auth-footer">
                <span>Don't have an account? <a href="">Sign up</a></span>
            </div> -->
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{$asset}}plugins/jquery/jquery-3.2.1.js"></script>
    <script src="{{$asset}}plugins/popper/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="{{$asset}}plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{$asset}}js/script.js"></script>
</body>

</html>