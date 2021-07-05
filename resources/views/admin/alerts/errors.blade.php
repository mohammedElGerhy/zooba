@if(\Session::has('errors'))
    <div class="alert alert-danger text-center" role="alert">
            {{\Session::get('errors')}}

    </div>
@endif

