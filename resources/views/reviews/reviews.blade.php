@foreach($reviews->chunk(3) as $row)
    <div class="card-deck m-5">

        @foreach($row as $review)
            {{--todo enlace a la review--}}
            <div class="card">
                <img class="card-img-top" src="{{$review->film->cover}}" alt="{{$review->film->name}}">
                <div class="card-body">
                    <h3 class="card-header">{{$review->film->name}}</h3>
                    <h5 class="card-title"></h5>
                    <p class="card-text">{{ mb_strimwidth($review->content, 0, 100, "...") }}</p>
                </div>
                <div class="card-footer">
                    <h4 class="text-muted">Rating: <b>{{$review->rating}}</b></h4>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
