@extends('admin.dashboard')

@section('title')
    Services
    @endsection
@section('header')
    Services
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Services
    </button>
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th style="color: white">Name</th>
            <th style="color: white">Price</th>
            <th style="color: white">Description</th>
            <th style="color: white">discount percentage</th>
            <th style="color: white">total</th>
            <th style="color: white">Expiry date</th>
            <th style="color: white">controller</th>
        </tr>
        </thead>
        <tbody>
       <?php $i = 0?>
        @foreach($services as $service)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{$service -> name}}</td>
            <td>{{$service -> price}}</td>
            <td>{{$service -> description}}</td>
                <td>{{$service -> discount_percentage}}%</td>
                <td>{{ 100 / $service -> discount_percentage * $service -> price - $service -> price}}</td>
                <td>{{$service -> Expiry_date}}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#edit{{ $service->id }}"
                        title="{{ trans('Grades_trans.Edit') }}"><i
                        class="fa fa-edit"></i></button>
                <a href="{{route('admin.services.destroy', $service->id)}}"  class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1">
                    <i class="fa fa-trash"></i>
                   </a>
            </td>
        </tr>
        <!-- edit services -->
        <div class="modal fade" id="edit{{$service -> id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            Edit services
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{route('admin.services.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$service->id}}">
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">Name Services :</label>

                                    <input id="name" type="text" name="name" class="form-control" value="{{$service->name}}">
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2">Price
                                        :</label>
                                    <input type="number" class="form-control" name="price" required value="{{$service->price}}">
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2">discount percentage
                                        :</label>
                                    <input type="text" class="form-control" name="discount_percentage" value="{{$service->discount_percentage}}">
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2">Expiry date
                                        :</label>
                                    <input type="date" class="form-control" name="Expiry_date" value="{{$service->Expiry_date}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">description
                                    :</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                          rows="3">
                                {{$service->description}}
                            </textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        <button type="submit"
                                class="btn btn-success">submit</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

        </div>
        <!--end edit-->
            @endforeach
        </tbody>
    </table>
    <!-- Add services -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{route('admin.services.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">Name Services :</label>

                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">Price
                                    :</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">discount percentage
                                    :</label>
                                <input type="text" class="form-control" name="discount_percentage">
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">Expiry date
                                    :</label>
                                <input type="date" class="form-control" name="Expiry_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">description
                                :</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    <button type="submit"
                            class="btn btn-success">submit</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    </div>
<!-- end add-->
    <!--edit-->

@endsection

