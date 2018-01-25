@extends("layouts.app")

@section('content')

    <div class="col-md-4"><img src="{{ $film["cover"] }}"/></div>
    <div class="col-md-8 row">
        <div class="row">
            <h1>{{$film["name"]}}</h1>
        </div>
        <div class="row">
            <h6>{{$film["date"]}}</h6>
            <h6>{{$film["country"]}}</h6>
        </div>
    </div>

@endsection
