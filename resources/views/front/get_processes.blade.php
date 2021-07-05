@extends('front.site')

@section('content')
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">الخدمات السابقة</h2>
            </div>
            <div class="row">
                @foreach($get_processes as $get_processe)
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
                                    <p style="color: #0044cc">اسم الخدمة</p>
                                    {{$get_processe->service->name}}
                                    <p style="color: #0044cc">السعر </p>
                                    {{$get_processe->service->price}}
                                    <p style="color: #0044cc">اسم الفني</p>
                                    {{$get_processe->artist->name}}
                                    <p style="color: #0044cc">تاريخ الخدمة </p>
                                    {{$get_processe->created_at}}

                                        <p style="color: #0044cc">التقيم</p>
                                        {{$get_processe->rating}}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
