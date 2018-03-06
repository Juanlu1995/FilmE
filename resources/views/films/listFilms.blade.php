@forelse($films as $film)
    <div class="row py-5 border-bottom">
        <div class="col-lg-4">
            <div class="imagebox border border-dark">
                <a href="/films/show/{{ $film['id'] }}">
                    <img src="{{$film->cover}}" alt="{{$film['name']}} cover" class="lozad img-fluid"
                         data-src="{{$film->cover}}">
                    <span class="imagebox-desc">{{$film->name}}</span>
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <a href="/films/show/{{ $film['id'] }}">
                    <h1 class="display-4">{{ $film['name'] }}</h1>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="ml-1">
                            <h3 class="text-danger">Rating: {{ $film['rating'] }}</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="ml-1">
                            <b> Author:
                                <a href="/users/show/{{$film->user->username}}">{{ $film->user->name }}</a>
                            </b>
                        </div>
                    </div>

                    <div class="row">
                        <div class="ml-1">
                            <a href="/reviews/show/film/{{$film->id}}" class="text-dark">

                                <b>Reviews:
                                    <a href="/reviews/show/film/{{$film->id}}">{{$film->reviews->count()}}</a>
                                </b>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="ml-1">
                            <b>Views: <span class="text-success">{{$film->views_count}}</span></b>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row border-bottom">
                        <h3 class="text-success">Synopsis</h3>
                    </div>
                    <div class="row mt-3">
                        <p class="text-justify">{{ $film->synopsis }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <h4 class="offset-3">No hay datos a mostrar</h4>
@endforelse