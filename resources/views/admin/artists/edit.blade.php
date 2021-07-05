@extends('admin.dashboard')

@section('title')
    اضافة لفنانين
@endsection
@section('header')
    اضافة لفنانين
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')

    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">

                    <section class="panel">
                        <div class="panel-body">

                            <form class="form-horizontal " method="post" action="{{route('artists.update', 'test')}}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                <input type="hidden" name="id" value="{{$artist->id}}">
                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">الاسم</label>
                                        <input class="form-control input-lg m-bot15" type="text" placeholder=".input-lg" name="name" value="{{$artist->name}}">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">الاميل</label>
                                        <input class="form-control input-lg m-bot15" type="email" placeholder=".input-lg" name="email" value="{{$artist->email}}">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">الباسورد</label>
                                        <input class="form-control input-lg m-bot15" type="password" name="password" autocomplete="on">
                                    </div>
                                    <hr>
                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">العنوان</label>
                                        <input class="form-control input-lg m-bot15" type="text" placeholder=".input-lg" name="Address" value="{{$artist->Address}}">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-sm-4 control-label">الرقم القومي</label>
                                        <input class="form-control input-lg m-bot15" type="text" placeholder=".input-lg" name="National_ID" value="{{$artist->National_ID}}">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">الفوان</label>
                                        <input class="form-control input-lg m-bot15" type="text" placeholder=".input-lg" name="phone" value="{{$artist->phone}}">
                                    </div>
                                    <hr>

                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">تقيم</label>
                                        <select class="form-control input-lg m-bot15" name="rating_id">
                                            <option value="{{$artist -> rating -> id}}">{{ $artist -> rating -> rating }}</option>
                                            @foreach($ratings as $rating)
                                                <option value="{{$rating -> id}}">{{$rating->rating}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">المدينة</label>
                                        <select class="form-control input-lg m-bot15" name="area_id" id="area">
                                            <option value="{{$artist -> area -> id}}">{{ $artist -> area -> name }}</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">المحافظات</label>
                                        <select class="form-control input-lg m-bot15" name="citie_id" id="citie">
                                            <option value="{{$artist -> citie -> id}}">{{ $artist -> citie -> Name }}</option>
                                            @foreach($cities as $citie)
                                                <option value="{{$citie -> id}}">{{$citie->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">الخدمات</label>
                                        <select class="form-control input-lg m-bot15" name="service_id">
                                            <option {{$artist -> service -> id}}>{{$artist -> service -> name}}</option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="col-sm-2 control-label">تقيم</label>
                                        <input class="form-control input-lg m-bot15" type="file" placeholder=".input-lg" name="image">
                                    </div>
                                    <div class="col-lg-4">
                                        <input class="form-control input-lg m-bot15 btn btn-primary" type="submit">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </section>
                </div>
            </div>

        </div>
    </section>

@endsection

