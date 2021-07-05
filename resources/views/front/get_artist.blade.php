@extends('front.site')

@section('content')
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">فنانين zooba</h2>
                <h3 class="section-subheading text-muted">افضل الفنانين</h3>
            </div>
            <div class="row">
                @foreach($artists as $artist)
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{asset( $artist->image)}}" alt="..." />
                        <h4>{{$artist -> name}}</h4>
                        <p class="text-muted">{{$artist -> email}}</p>
                        <p class="text-muted">{{$artist -> phone}}</p>
                    </div>
                </div>
               @endforeach
            </div>

        </div>
    </section>


@endsection
