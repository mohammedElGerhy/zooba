@extends('admin.dashboard')

@section('title')
    artists
@endsection
@section('header')
    artists
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')

    <a href="{{route('artists.create')}}"  class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1">
        <i class="fa fa-add"></i> اضافة لفنانين
    </a>
    <a href="{{route('export')}}"  class="btn btn-success btn-min-width box-shadow-3 mr-1 mb-1">
        <i class="fa fa-add"></i> اكسيل تصدير
    </a>
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الاميل</th>
            <th>المحافظات</th>
            <th>المدينة</th>
            <th>العنوان</th>
            <th>تقيم</th>
            <th>الرقم القومي</th>
            <th>الفوان</th>
            <th>الاشتراك</th>
            <th>التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0?>
        @foreach($artists as $artist)
            <tr>
                <?php $i++; ?>
                    <td>{{ $i }}</td>
                     <td>{{$artist -> name}}</td>
                    <td>{{$artist -> email}}</td>
                    <td>{{$artist -> citie -> Name}}</td>
                    <td>{{$artist -> area -> name}}</td>
                    <td>{{$artist -> Address}}</td>
                    <td>{{$artist -> rating -> rating}}</td>
                    <td>{{$artist -> National_ID}}</td>
                    <td>{{$artist -> phone}}</td>
                    <td>
                        <a href="{{route('admin.artists.statues', $artist->id)}}"  class="btn btn-warning btn-min-width box-shadow-3 mr-1 mb-1">
                           @if($artist->Expiration === 1)
                                الغاء الاشتراك
                               @elseif($artist->Expiration === 0)
                            تجديد الاشتراك
                               @endif
                        </a>
                    </td>
                <td>
                    <button type="button" class="btn btn-danger btn-s" data-toggle="modal"
                            data-target="#delete{{ $artist->id }}"
                            title="{{ trans('Grades_trans.Delete') }}"><i
                            class="fa fa-trash"></i></button>

                    <a href="{{route('artists.edit', $artist->id)}}"  class="btn btn-info btn-min-width box-shadow-3 mr-1 mb-1">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            <!-- delete_modal_Grade -->
            <div class="modal fade" id="delete{{ $artist->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                id="exampleModalLabel">
                               حذف الفنانين
                            </h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('artists.destroy', 'test') }}"
                                  method="post">
                                {{ method_field('Delete') }}
                                @csrf
                              هل متاكد من الحذف
                                <input id="id" type="hidden" name="id" class="form-control"
                                       value="{{ $artist->id }}">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">تراجع</button>
                                    <button type="submit"
                                            class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            <!-- edit services -->

            </div>
            <!--end edit-->

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
                    <form action="" method="POST">
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

