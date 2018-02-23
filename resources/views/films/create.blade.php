@extends('layouts.app')

@section('title')
    Crear película
@endsection

@push('scripts')
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/contributeAutocomplete.js')}}" defer></script>
@endpush
@section('content')
    <h1 class="">Create film</h1>
    <form action="{{ url('/') }}/films/create" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   name="name" id="name" class="form-control" placeholder="Name">
        </div>
        @if($errors->has('name'))
            @foreach($errors->get('name') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif
        <div class="form-group">
            <label for="synopsis">Synopsis</label>
            <textarea id="synopsis" name="synopsis" class="form-control" placeholder="Synopsis"></textarea>
        </div>


        <div class="form-group">
            <label for="cover">Cover</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cover" name="cover">
                    <label class="custom-file-label" for="inputGroupFile01">Choose cover</label>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date"
                           name="date" id="date" class="form-control" placeholder="Date">
                </div>
            </div>
            <div class="col-md-4">

                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="number"
                           name="duration" id="duration" class="form-control" placeholder="duration">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number"
                           name="rating" id="rating" class="form-control" placeholder="Rating">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text"
                   name="category" id="category" class="form-control" placeholder="Categorys">
        </div>
        <div class="form-group">
            <label for="actors">Actors</label>
            <input type="text"
                   name="actors" id="actors" class="form-control autoComplete" placeholder="Actors">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="directors">Director</label>
                    <input type="text"
                           name="directors" id="directors" class="form-control autoComplete" placeholder="Director">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="producer">Producer</label>
                    <input type="text"
                           name="producer" id="producer" class="form-control" placeholder="Producer">
                </div>
            </div>
            <div class="col-md-4">

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text"
                           name="country" id="country" class="form-control" placeholder="Country">
                </div>
            </div>


        </div>
        <input type="submit" class="btn btn-primary" value="Submit">

    </form>
@endsection