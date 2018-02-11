@forelse($films as $film)
    <div class="row py-5 border-bottom">
        <div class="col-md-4">
            <div class="imagebox border border-dark">
                <a href="/films/show/{{ $film['id'] }}">
                    <img src="{{$film['cover']}}" alt="{{$film['name']}} cover" class="img-fluid">
                    <span class="imagebox-desc">{{$film->name}}</span>
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="row">
                    <a href="/films/show/{{ $film['id'] }}">
                        <h1 class="display-4 col">{{ $film['name'] }}</h1>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="row offset-1">
                            <h3 class="display-5 text-danger">Rating: {{ $film['rating'] }}</h3>
                        </div>

                        <div class="row offset-1">

                            <b> Author:
                                <a href="/users/{{$film->user->username}}">{{ $film->user->name }}</a>
                            </b>
                        </div>
                        {{--TODO enlace a las reviews de una película--}}
                        <div class="row offset-1">
                            <b>Reviews: <a href="/reviews/show/film/{{$film->id}}">{{$film->getReviewsCount()}}</a></b>
                        </div>
                        <div class="row offset-1">
                            <b>Views: <span class="text-success">{{$film->getViewsCount()}}</span></b>
                        </div>
                    </div>
                    <div class="col-md-6 mx-2"><p class="text-justify">{{ $film['synopsis'] }}</p></div>
                </div>
            </div>
        </div>
    </div>
@empty
    <h4 class="offset-3">No hay datos a mostrar</h4>
@endforelse