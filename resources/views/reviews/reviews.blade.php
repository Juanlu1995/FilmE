@extends('layouts.app')
@push('scripts')
    <script src="{{asset('js/paginateReviews.js')}}" defer></script>
@endpush
@section('content')
    <h1 class="text-primary text-center">Last reviews</h1>
    <div class="content">
        @include('reviews.reviewsList')
    </div>
    <div class="offset-md-3 my-3">
        {{ $reviews->links("pagination::bootstrap-4") }}
    </div>
@endsection