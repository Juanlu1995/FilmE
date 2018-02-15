@extends('layouts.app')

@section('content')
    @include('contributes.contribute')
    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}

            {{--<div id="actorCarrousel" class="carousel slide" data-ride="carousel">--}}
                {{--<div class="carousel-inner">--}}
                    {{--todo arreglar carrousel--}}
                    {{--@foreach($contribute->actor as $film)--}}
                        {{--<div class="carousel-item active">--}}
                            {{--<img src="{{$film->cover}}" class="d-block img-fluid" alt="">--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
        {{--<div class="col-md-6">--}}
            {{--carrousel peliculas como director--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection