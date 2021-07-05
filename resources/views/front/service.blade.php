@extends('front.site')

@section('content')
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                        </a>
                        <div class="portfolio-caption">

                            <div class="portfolio-caption-heading">
                                <h1 style="color: #0044cc">اسم الخدمة</h1>
                                {{$service->name}}
                            </div>
                            <div class="portfolio-caption-subheading text-muted">
                                <h1 style="color: #0044cc">السعر </h1>
                                {{$service->price}}</div>
                            <div class="portfolio-caption-heading">
                                <h1 style="color: #0044cc">وصف الخدمة</h1>
                                {{$service->description}}</div>
                            <div class="portfolio-caption-subheading text-muted">
                                <h1 style="color: #0044cc">  السعر بعد الخصم</h1>
                                {{100 / $service -> discount_percentage * $service -> price - $service -> price}}</div>
                            <div class="portfolio-caption-heading">
                                <h1 style="color: #0044cc">
                                تاريخ انتها صلاحية الخصم
                                    </h1>
                                {{$service->Expiry_date}}</div>
                            <div class="portfolio-caption-heading">
                               <a href="{{route('get_artist', $service->id)}}" class="btn btn-info btn-min-width box-shadow-3 mr-1 mb-1">الفنانين</a>
                               </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>


@endsection
