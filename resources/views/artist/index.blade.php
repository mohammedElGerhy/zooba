<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset(auth()->guard('artist')->user()->image)}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>بروفيل</title>
    <link href="{{asset('startbootstrap-agency-gh-pages/style.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    @livewireStyles
</head>

<body>
<!-- container section start -->



<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Zooba</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('artist.profile')}}">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('artist.processes')}}">العمليات السابقة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img alt="" style="width: 30px; height: 30px" src="{{asset(auth()->guard('artist')->user()->image)}}">
                        <span class="username">{{auth()->guard('artist')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">{{auth()->guard('artist')->user()->name}}</a></li>
                        <li><a class="dropdown-item" href="#"> {{auth()->guard('artist')->user()->email}}</a></li>
                        <li><a class="dropdown-item" href="#">{{auth()->guard('artist')->user()->phone}}</a></li>
                        <li><a class="dropdown-item" href="#"> {{auth()->guard('artist')->user()->rating->rating}}</a></li>
                        <li><a class="dropdown-item" href="{{route('artist.logout')}}"><i class="icon_key_alt"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        @if (Session::has('errors'))
            <div class="alert alert-danger text-center" role="alert">
                {{\Session::get('errors')}}

            </div>
        @endif
            @if(\Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{\Session::get('success')}}

                </div>
            @endif

            @if(auth()->guard('artist')->user()->Expiration == 1)
            <form action="{{route('artist.presence')}}" method="post">
                @csrf

                <input type="hidden" name="artist_id" value="{{auth()->guard('artist')->user()->id}}">
                <h1 class="text-center"> تسجيل حضور و انصراف</h1>

                <div class="col-lg-12">
                    @if(!empty($Presence))
                    @if($Presence->presence == 'حضور' )
                    <span class="notif"></span>
                    @endif
                        @if($Presence->presence == 'انصراف' )
                    <span class="notifred"></span>
                        @endif
                    @endif
                    <select class="form-control " name="presence">
                            <option value="حضور">حضور</option>
                        <option value="انصراف">انصراف</option>
                    </select>
                        <input type="submit" value="تسجيل" class="btn btn-success form-control">
                </div>
            </form>
                @else
       <h1 class="text-center"> {{  'عليك تجديد الاشتراك' }}</h1>
                @endif
    </div>
<br>
<div class="container-fluid" >

<livewire:artist-user />
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@livewireScripts

<script>
    $('#click').on('click', function () {
        $('#hidden').hide();
    });
</script>

</body>

</html>
