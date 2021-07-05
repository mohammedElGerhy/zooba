@extends('admin.dashboard')

@section('title')
    الطلابات
@endsection
@section('header')
    الطلابات
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الاميل</th>
            <th>الفوان</th>
            <th>المحافظات</th>
            <th>المدينة</th>
            <th>العنوان</th>
            <th>الفني</th>
            <th>الخدمة</th>
            <th>وقت التنفيذ</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0?>
        @foreach($requests as $request)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{$request ->user-> name}}</td>
                <td>{{$request -> user -> email}}</td>
                <td>{{$request -> user -> phone}}</td>
                <td>{{$request -> citie -> Name}}</td>
                <td>{{$request -> area -> name}}</td>
                <td>{{$request -> address}}</td>
                <td>{{$request -> artist -> name}}</td>
                <td>{{$request -> service -> name}}</td>
                <td>{{$request -> created_at}}</td>

                <td>
                    <a href="{{route('admin.users.destroy', $request->id)}}"  class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1">
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


