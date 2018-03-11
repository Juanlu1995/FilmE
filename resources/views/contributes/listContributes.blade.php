@extends('layouts.app')

@section('content')
@include('contributes.partials.list')

    <div class="offset-md-3 my-3">
        {{ $contributes->links("pagination::bootstrap-4") }}
    </div>

@endsection
