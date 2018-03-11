@extends('layouts.app')

@section('title')
    Crear película
@endsection

@push('scripts')
    <script src="{{asset('js/contributeAutocomplete.js')}}" defer></script>
@endpush
@section('content')
    <h1 class="">Create film</h1>
    <form action="{{route('film.edit') ? '/films/'.$film->id : '/films'}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if(route('film.edit'))
            {{method_field('PATCH')}}
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   name="name" id="name" class="form-control" placeholder="Name"
                   value="{{route('film.edit') ? $film->name : old('name')}}">
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
            <textarea id="synopsis" name="synopsis" class="form-control"
                      placeholder="Synopsis">{{route('film.edit') ? $film->synopsis : old('synopsis')}}</textarea>
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
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date"
                           name="date" id="date" class="form-control" placeholder="Date" value="{{ old('date')}}">
                </div>
            </div>
            <div class="col-lg-4">

                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="number"
                           name="duration" id="duration" class="form-control" placeholder="duration"
                           value="{{route('film.edit') ? $film->duration : old('duration')}}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number"
                           name="rating" id="rating" class="form-control" placeholder="Rating"
                           value="{{ route('film.edit') ? $film->rating : old('rating')}}">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="actors">Actors</label>
            <input type="text"
                   name="actors" id="actors" class="form-control autoComplete" placeholder="Actors"
                   value="{{old('actors')}}">
        </div>
        <div class="form-group">

            <div class="form-group">
                <label for="directors">Director</label>
                <input type="text"
                       name="directors" id="directors" class="form-control autoComplete" placeholder="Director"
                       value="{{old('directors')}}">
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4">
                <label for="category">Category</label>
                <select name="category" id="category" class="custom-select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(route('film.edit'))
                                @if($category->id == $film->category_id)
                                selected
                                @endif
                                @else
                                @if($category->name == 'none')
                                selected
                                @endif
                                @endif
                        >{{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-4">
                <label for="producer">Producer</label>
                <select class="custom-select" name="producer" id="producer">
                    @foreach($producers as $producer)
                        <option value="{{$producer->id}}"
                                @if(route('film.edit'))
                                @if($producer->id == $film->producer_id)
                                selected
                                @endif
                                @else
                                @if($producer->name == 'none')
                                selected
                                @endif
                            @endif
                        >{{$producer->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <select class="custom-select" name="nationality" id="nationality">
                        @foreach($nationalities as $nationality)
                            <option value="{{$nationality->id}}"
                                    @if(route('film.edit'))
                                    @if($nationality->id == $film->nationality_id)
                                    selected
                                    @endif
                                    @else
                                    @if($nationality->name == 'none')
                                    selected
                                    @endif
                                @endif
                            >{{$nationality->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <input type="submit" class="btn btn-primary" value="Submit">

    </form>
@endsection