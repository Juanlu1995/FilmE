@extends('layouts.app')

@push('scripts')
    <script src="js/paginateIndex.js"></script>
@endpush

@section('content')

    <div class="content">
        @include('films.listFilms')
    </div>

    <div class="offset-md-3 my-3">
        {{ $films->links("pagination::bootstrap-4") }}
    </div>
@endsection
