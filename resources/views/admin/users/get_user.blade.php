@extends('admin.dashboard')

@section('title')
    بيانات العملاء
@endsection
@section('header')
    بيانات العملاء
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')

    <a href="{{route('user.export')}}"  class="btn btn-success btn-min-width box-shadow-3 mr-1 mb-1">
        <i class="fa fa-add"></i> اكسيل تصدير
    </a>
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الاميل</th>
            <th>الفوان</th>
            <th>وقت التسجيل</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0?>
        @foreach($users as $user)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{$user -> name}}</td>
                <td>{{$user ->  email}}</td>
                <td>{{$user ->  phone}}</td>
                <td>{{$user -> created_at}}</td>

                <td>
                    <a href="{{route('admin.users.destroy_user', $user->id)}}"  class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1">
                        حذف
                    </a>
                </td>
            </tr>
            <!-- delete_modal_Grade -->
        @endforeach
        <!-- edit services -->

        </div>
        <!--end edit-->

        </tbody>
    </table>
    <!-- end add-->
    <!--edit-->

@endsection

