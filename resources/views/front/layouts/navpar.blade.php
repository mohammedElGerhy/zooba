<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="zooba" />
    <meta name="author" content="zooba" />
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>zooba</title>
    <link href="https://developers.google.com/search/docs/advanced/guidelines/links-crawlable?hl=ar#use-proper-a-tags">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('startbootstrap-agency-gh-pages/assets/favicon.ico')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('startbootstrap-agency-gh-pages/css/styles.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <!--
        <a class="navbar-brand" href="#page-top">
            <img src="{{asset('startbootstrap-agency-gh-pages/assets/img/navbar-logo.svg')}}" alt="..." />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline nav-link">الرئيسية</a>
                        @else
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline nav-link">Log in</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline nav-link">Register</a>
                    @endif
                </li>
                @endauth
                @endif
                <li class="nav-item">
                    @if(auth()->user())
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('خروج') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('get_service')}}">الخدمات</a></li>
                @if(auth()->user())
                <li class="nav-item"><a class="nav-link" href="{{route('get_processes')}}">الخدمات السابقة</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{route('get_artists')}}">الفنانين</a></li>
            </ul>
        </div>
    </div>
</nav>
