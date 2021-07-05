@if(auth()->guard('admin')->user()->statues == 1)

@extends('admin.dashboard')

@section('title')
    المسئولين
@endsection
@section('header')
    المسئولين
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        اضافة مسئول
    </button>
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الاميل</th>
           <th>منصب</th>
            <th>وقت التسجيل</th>
            <th>وقت التعديل</th>
            <th>التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0?>
        @foreach($admins as $admin)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{$admin -> name}}</td>
                <td>{{$admin -> email}}</td>
                    <td>
                        @if($admin -> statues == 1)

                            <strong>مدير</strong>
                        @elseif($admin -> statues == 0)

                            <strong>موظف</strong>
                        @endif
                    </td>                <td>{{$admin -> created_at}}</td>
                <td>{{$admin -> updated_at}}</td>

                <td>
                    <button type="button" class="btn btn-danger btn-s" data-toggle="modal"
                            data-target="#delete{{ $admin->id }}"
                            title="{{ trans('Grades_trans.Delete') }}"><i
                            class="fa fa-trash"></i></button>

                    <button type="button" class="btn btn-info btn-s" data-toggle="modal"
                            data-target="#edit{{ $admin->id }}"
                            title="{{ trans('Grades_trans.Delete') }}">
                        <i class="fa fa-edit"></i>
                            </button>
                </td>
            </tr>
            <!-- delete_modal_Grade -->
            <div class="modal fade" id="delete{{ $admin->id }}" tabindex="-1" role="dialog"
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
                            <form action="{{ route('admin.admins.destroy') }}"
                                  method="post">
                                @csrf
                                هل متاكد من الحذف
                                <input id="id" type="hidden" name="id" class="form-control"
                                       value="{{ $admin->id }}">
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
            <div class="modal fade" id="edit{{ $admin->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                id="exampleModalLabel">
                                تعديل
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{route('admin.admins.update')}}" method="POST">
                                @csrf
                                <input id="id" type="hidden" name="id" class="form-control" value="{{$admin->id}}">

                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">الاسم :</label>

                                        <input id="name" type="text" name="name" class="form-control" value="{{$admin->name}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="email"
                                               class="mr-sm-2">الاميل
                                            :</label>
                                        <input type="email" class="form-control" name="email" required value="{{$admin->email}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"
                                               class="mr-sm-2">باسورد
                                            :</label>
                                        <input type="password" class="form-control" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"
                                               class="mr-sm-2">المنصب
                                            :</label>
                                        <select class="form-control form-select-lg mb-3" name="statues"  required>
                                            <option value="{{$admin->statues}}">
                                                @if($admin->statues ==1 )
                                                مسئول
                                                    @endif
                                                    @if($admin->statues ==0 )
                                                        موظف
                                                    @endif
                                            </option>
                                            <option value="1">مسئول</option>
                                            <option value="0">موظف</option>
                                        </select>
                                        @error('statues')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">غلق</button>
                            <button type="submit"
                                    class="btn btn-success">حفظ</button>
                        </div>
                        </form>

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
                      اضافة مسئول
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{route('admin.admins.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">الاسم :</label>

                                <input id="name" type="text" name="name" class="form-control">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="email"
                                       class="mr-sm-2">الاميل
                                    :</label>
                                <input type="email" class="form-control" name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">باسورد
                                    :</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">المنصب
                                    :</label>
                                <select class="form-control form-select-lg mb-3" name="statues"  required>
                                    <option value="1">مسئول</option>
                                    <option value="0">موظف</option>
                                </select>
                                @error('statues')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">غلق</button>
                    <button type="submit"
                            class="btn btn-success">حفظ</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <!-- end add-->
    <!--edit-->

@endsection

    @endif
