<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset('NiceAdmin/img/favicon.png')}}">

    <title>Login Admin </title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('NiceAdmin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('NiceAdmin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('NiceAdmin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('NiceAdmin/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset('NiceAdmin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="{{asset('NiceAdmin/js/html5shiv.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

<div class="container">

    <form class="login-form" action="{{route('admin.auth')}}" method="post">
        {!! csrf_field() !!}
        <div class="login-wrap">
            @include('admin.alerts.success')
            @include('admin.alerts.errors')
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="email" class="form-control" placeholder="email" autofocus name="email">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me" name="remember_me"> Remember me
                <span class="pull-right"></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
    </form>
    <div class="text-right">
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</div>


</body>

</html>
