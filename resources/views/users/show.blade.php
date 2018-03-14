@extends('layouts.app')

@push('scripts')
    <script src="{{asset('js/showReviews.js')}}" defer></script>
@endpush

@section('content')

    @include('users.partials.base')

@endsection