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
    @livewireStyles
</head>
<body id="page-top">

<section class="page-section bg-light" id="portfolio">
    <div class="container px-4">
        <livewire:success />
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <h1 class="text-center">الخدمة</h1>
                    @foreach($services as $service)
                        <p>{{$service->name}}</p>
                        <p>{{$service->price}}ج.م</p>
                        <p>{{$service->description}}</p>
                        <p>{{ number_format(100 / $service->discount_percentage * $service->price - $service->price)}}</p>
                        <p>{{$service->Expiry_date}}</p>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <h1 class="text-center">الفني</h1>
                    @foreach($artists as $artist)
                        <p>{{$artist->name}}</p>
                        <p>{{$artist->email}}</p>
                        <p>{{$artist->citie->Name}}</p>
                        <p>{{$artist->area->name}}</p>
                        <p>{{$artist->Address}}</p>
                        <p>{{$artist->phone}}</p>
                        <p>{{$artist->rating->rating}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">
                    <h1 class="text-center">بياناتك</h1>

                    <p>{{auth()->user()->name}}</p>
                    <p>{{auth()->user()->email}}</p>
                    <p>{{auth()->user()->phone}}</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <span class="text-center">تقيم الفني</span>
                    <form id="commentForm">
                        @csrf
                        @foreach($services as $service)
                            <input type="hidden" name="service_id" value="{{$service->id}}" id="service_id">
                        @endforeach
                        @foreach($artists as $artist)
                            <input type="hidden" name="artist_id" value="{{$artist->id}}" id="artist_id">
                        @endforeach
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="user_id">

                        <select class="form-select" name="comment" id="comment" size="3" aria-label="size 3 select example">
                            <option value="جيد">جيد</option>
                            <option value="جيد جدا">جيد جدا</option>
                            <option value="ممتاز">ممتاز</option>
                        </select>
                        <span class="text-danger" id="comment-error"></span>
                        <input type="submit" value=" تقيم" class="btn btn-success">

                    </form>
                   <span id="success-comment" class="text-success"></span>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <div class="alert alert-primary text-center" role="alert" id="success-message">
    </div>

    <livewire:notif-comment />

@if(!empty($Presence->presence))
        @if($Presence->presence == 'حضور')
            <form id="contactForm">
                @foreach($services as $service)
                    <input type="hidden" name="service_id" value="{{$service->id}}" id="service_id">
                @endforeach
                @foreach($artists as $artist)
                    <input type="hidden" name="artist_id" value="{{$artist->id}}" id="artist_id">
                @endforeach
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="user_id">
                <div class="col-lg-12">
                    <label class="col-sm-2 control-label">المحافظات</label>
                    <select class="form-control input-lg m-bot15" name="citie_id" id="citie_id">
                        <option>.....</option>
                        @foreach($cities as $citie)
                            <option value="{{$citie -> id}}">{{$citie->Name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="citie_id-error"></span>
                </div>
                <div class="col-lg-12">
                    <label class="col-sm-2 control-label">المدينة</label>
                    <select class="form-control input-lg m-bot15" name="area_id" id="area_id">

                    </select>
                    <span class="text-danger" id="area_id-error"></span>
                </div>
                <div class="col-lg-12">
                    <label class="col-sm-2 control-label">العنوان بلتفصيل</label>
                    <input class="form-control input-lg m-bot15" type="texet" name="address" id="address">
                    <span class="text-danger" id="address-error"></span>
                </div>
                <h1 class="text-center">
                    <input type="submit" value="ارسال طلب" class="btn btn-success" id="hidden">

                </h1>
            </form>
            <hr>

        @else
            <p class="text-center" style="color: #a10000">الفني غير متواجد الان</p>
        @endif
    @else
        <p class="text-center" style="color: #a10000">الفني غير متواجد الان</p>
    @endif
</section>
@include('front.layouts.footer')
