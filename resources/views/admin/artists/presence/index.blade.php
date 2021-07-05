@extends('admin.dashboard')

@section('title')
   حضور و غياب الفنانين
@endsection
@section('header')
    حضور و غياب الفنانين
@endsection

@section('content')
    <!-- Button trigger modal -->
    @include('admin.alerts.success')
    @include('admin.alerts.errors')
    <table id="table_id" class="display">
        <thead style="background-color: black">
        <tr>
            <th>#</th>
            <th style="color: white">الغياب</th>
            <th style="color: white">اسم الفني</th>
            <th style="color: white">التاريخ و الوقت</th>
            <th style="color: white">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0?>
        @foreach($presences as $presence)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{$presence -> presence}}</td>
                <td>{{$presence -> artist -> name}}</td>
                    <td>{{$presence -> time}}</td>
                <td>
                    <a href="{{route('admin.artists.presence.destroy', $presence->id)}}"  class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

