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
    <div class="accordion" id="accordionPanelsStayOpenExample">
        @foreach($processes as $processe)

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    {{$processe-> service -> name}}
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <h1 class="text-center">معلومات الخدمة</h1>
                    <span style="color: #0b97c4">الوصف</span>   {{$processe-> service -> description}}
                    <span style="color: #0b97c4">السعر</span>   {{$processe-> service -> price}}
                    <span style="color: #0b97c4">السعر بعد الخصم</span> {{number_format(100 /$processe-> service->discount_percentage * $processe-> service->price - $processe-> service->price)}}
                    <span style="color: #0b97c4">انتهاء العرض</span>   {{$processe-> service -> Expiry_date	}}
                </div>
                <div class="accordion-body">
                    <h1 class="text-center">معلومات العميل</h1>
                    <span style="color: #0b97c4">الاسم</span>   {{$processe-> user -> name}}
                    <span style="color: #0b97c4">الاميل</span>   {{$processe-> user -> email}}
                    <span style="color: #0b97c4"> رقم الفوان</span>   {{$processe-> user -> phone}}
                    <hr>
                        <span style="color: #0b97c4"> تقيم الفني </span>   {{$processe->rating}}

                    <hr>
                    <span style="color: #0b97c4">  نسبة الشركة</span>     {{$processe-> artist->rating->Rate}}
                </div>

            </div>
        </div>
        @endforeach

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
