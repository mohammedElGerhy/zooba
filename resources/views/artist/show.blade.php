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
            <form id="successForm">
                @csrf
                <input type="hidden" name="request_id" value="{{$showdate->id}}" id="request_id">
                <input type="submit" value=" بدا الخدمة" class="btn btn-success">
            </form>
<span style="color: #0aa2c0" id="success-statues" class="text-center"></span>

        <form id="endForm" style="position: absolute; right: 20px; top: 61px">
            @csrf
            <input type="hidden" name="request_id" value="{{$showdate->id}}" id="request_id">
            <input type="submit" value=" انتهاء الخدمة" class="btn btn-danger">
        </form>
        <span  id="end-statues" class="text-center" style="position: absolute; right: 20px; top: 100px; color: #a10000"></span>
        <div class="row">
            <div class="col order-last">
                <p style="color: #0b97c4">الاسم</p>
                {{$showdate-> user->name}}
            </div>
            <div class="col">
                <p style="color: #0b97c4">الاميل</p>
                {{$showdate-> user->email}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">فوان نمبر</p>
                {{$showdate-> user->phone}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">المحافظة</p>
                {{$showdate-> citie->Name}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">المدينة</p>
                {{$showdate-> area->name}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">الحي</p>
                {{$showdate-> address}}
            </div>
        </div>
        <!--بيانات الخدمة-->
        <hr>
        <h1 class="text-center">بينات الخدمة</h1>
        <div class="row">
            <div class="col order-last">
                <p style="color: #0b97c4">اسم الخدمة</p>
                {{$showdate-> service->name}}
            </div>
            <div class="col">
                <p style="color: #0b97c4">الوصف</p>
                {{$showdate-> service->description}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">السعر</p>
                {{$showdate-> service->price}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">السعر بعد الخصم</p>
                {{ number_format(100 /$showdate-> service->discount_percentage * $showdate-> service->price - $showdate-> service->price)}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4">تاريع انتهاء الخصم</p>
                {{$showdate-> service->Expiry_date}}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4"> نسبة الشركة</p>
                {{$showdate-> artist->rating->Rate}}
            </div>
        </div>
        <hr>
        <h1 class="text-center">نسبة الشركة</h1>
        <div class="row">
            <div class="col order-first">
                <p style="color: #0b97c4"> نسبة الشركة قبل الخصم</p>
                {{number_format(100/$showdate-> artist->rating->Rate * $showdate-> service->price - $showdate-> service->price) }}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4"> نسبة الشركة بعد الخصم</p>
                {{number_format(100/$showdate-> artist->rating->Rate * 100 /$showdate-> service->discount_percentage * $showdate-> service->price - $showdate-> service->price - 100 /$showdate-> service->discount_percentage * $showdate-> service->price - $showdate-> service->price) }}
            </div>
            <div class="col order-first">
                <p style="color: #0b97c4"> تقيم العميل</p>

                {{$showdate->rating}}
                <br>

            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
    $('#successForm').on('submit',function(e){
        e.preventDefault();
        let request_id = $('#request_id').val();
        $.ajax({
            url: "{{URL::to('/artists/form-success')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                request_id:request_id,
            },
            success:function(response){
                console.log(response);
                if (response) {
                    $('#success-statues').text(response.success);
                    $("#successForm")[0].reset();
                }
            },
        });
    });
</script>
<script type="text/javascript">
    $('#endForm').on('submit',function(e){
        e.preventDefault();
        let request_id = $('#request_id').val();
        $.ajax({
            url: "{{URL::to('/artists/form-end')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                request_id:request_id,
            },
            success:function(response){
                console.log(response);
                if (response) {
                    $('#end-statues').text(response.success);
                    $("#successForm")[0].reset();
                }
            },
        });
    });
</script>
</body>

</html>
