@extends('app')

@section('title')
    Crear película
@endsection

@section('content')
    <h1 class="display-5">Create film</h1>
    <form action="{{ url('/') }}films/create" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="synopsis">Synopsis</label>
           <textarea id="synopsis" name="synopsis" class="form-control" placeholder="Synopsis"></textarea>
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text"
                   name="cover" id="cover" class="form-control" placeholder="Cover">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date"
                   name="date" id="date" class="form-control" placeholder="Date">
        </div>
        <div class="form-group">
            <label for="categorys">Categorys</label>
            <input type="text"
                   name="categorys" id="categorys" class="form-control" placeholder="Categorys">
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number"
                   name="rating" id="rating" class="form-control" placeholder="Rating">
        </div>
        <div class="form-group">
            <label for="actors">Actors</label>
            <input type="text"
                   name="actors" id="actors" class="form-control" placeholder="Actors">
        </div>

    </form>
@endsection