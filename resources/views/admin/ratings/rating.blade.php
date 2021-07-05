@extends('admin.dashboard')

@section('title')
    تقيم الفنانين
@endsection
@section('header')
    تقيم الفنانين
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       اضافة الفنانين
    </button>
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th style="color: white">التقيم</th>
            <th style="color: white">نسبة الشركة</th>
            <th style="color: white">controller</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0?>
        @foreach($ratings as $rating)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{$rating -> rating}}</td>
                <td>{{$rating -> Rate}}%</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit{{ $rating->id }}"
                            title="{{ trans('Grades_trans.Edit') }}"><i
                            class="fa fa-edit"></i></button>
                    <a href="{{route('admin.rating.destroy', $rating->id)}}"  class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <!-- edit services -->
            <div class="modal fade" id="edit{{$rating -> id}}" tabindex="-1" role="dialog"
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
                            <form action="{{route('ratings.update','test')}}" method="POST">
                                @csrf
                                {{ method_field('patch') }}
                                <input type="hidden" name="id" value="{{$rating->id}}">
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">نسبة الشركة :</label>

                                        <input id="name" type="text" name="Rate" class="form-control" value="{{$rating->Rate}}">
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"
                                               class="mr-sm-2">التقيم
                                            :</label>
                                        <select class="form-control" name="rating">
                                            <option value="{{$rating->rating}}">{{$rating->rating}}</option>
                                            <option value="مميز">مميز</option>
                                            <option value="ذهبي">ذهبي</option>
                                            <option value="ماسي">ماسي</option>
                                        </select>
                                    </div>
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
                    <form action="{{route('ratings.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">نسبة الشركة :</label>

                                <input id="name" type="text" name="Rate" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">التقيم
                                    :</label>
                                <select class="form-control" name="rating" required >
                                    <option>....</option>
                                    <option value="مميز">مميز</option>
                                    <option value="ذهبي">ذهبي</option>
                                    <option value="ماسي">ماسي</option>
                                </select>
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

