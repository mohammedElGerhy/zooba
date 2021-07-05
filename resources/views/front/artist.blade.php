@extends('front.site')

@section('content')

    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <form class="form-horizontal" action="{{ route('Filter_area') }}" method="post">
               @csrf
                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="col-lg-12">
                        <label class="col-sm-2 control-label">المحافظات</label>
                        <select class="form-control input-lg m-bot15" name="citie_id" id="citie">
                            <option>.....</option>
                            @foreach($cities as $citie)
                                <option value="{{$citie -> id}}">{{$citie->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-sm-2 control-label">المدينة</label>
                        <select class="form-control input-lg m-bot15" name="area_id" id="area"  onchange="this.form.submit()">

                        </select>
                    </div>
                </form>
                <h2 class="section-heading text-uppercase">الفنانين</h2>
            </div>


            <div class="row">
                @if (isset($details))

                    <?php $List_Classes = $details; ?>
                @else

                    <?php $List_Classes = $artists; ?>
                @endif

                @foreach($List_Classes as $artist)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset( $artist->image)}}" style="height: 200px; width: 400px; border-radius: 50px; background-size: cover" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">الاسم:</span> {{$artist->name}}</div>
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">الاميل:</span><p>{{$artist->email}}</p></div>
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">الموبيل:</span><p>{{$artist->phone}}</p></div>
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">المحافظة:</span>{{$artist->citie->Name}}</div>
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">المدينة:</span>{{$artist->area->name}}</div>
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">المنطقة:</span>{{$artist->Address}}</div>
                            <div class="portfolio-caption-heading"><span style="color: #d9ce00">التقيم:</span>{{$artist->rating->rating}}</div>

                            <form action="{{route('get_all')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$artist->id}}" name="id_artist">
                                <input type="hidden" value="{{$id}}" name="id_service">
                                <input type="submit" class="btn btn-success" value="التالي">
                            </form>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
