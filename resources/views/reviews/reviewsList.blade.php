@foreach($reviews->chunk(3) as $row)
    <div class="card-deck m-5">

        @foreach($row as $review)
            {{--todo enlace a la review--}}

            <div class="card">
                <div class="imagebox border border-dark">
                    <a href="/reviews/show/{{$review->id}}">
                        <img src="{{$review->film->cover}}" alt="{{$review->film->name}} cover" class="img-fluid">
                        <span class="imagebox-desc">{{$review->film->name}}</span>
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="card-header">{{$review->title}}</h3>
                    <h5 class="card-title"></h5>
                    <p class="card-text">{{ mb_strimwidth($review->content, 0, 180, "...") }}</p>
                </div>
                <div class="card-footer">
                    <h4 class="text-muted">Rating: <b>{{$review->rating}}</b></h4>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
