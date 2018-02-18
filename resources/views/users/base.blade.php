<div class="row">
    <div class="col-md-4 ">
        <img src="{{$user['avatar']}}" alt="avatar" class="img-fluid img-thumbnail">
    </div>
    <div class="col-md-8">
        <h1 class="offset-md-2">{{$user['name']}} {{$user['last_name']}}
            <small class="text-muted"> {{$user['username']}}</small>
        </h1>
        <div class="m-3">
            <div class="row">
                <h5>
                    <span class="text-primary">
                        Website:
                    </span>
                    <small>
                        {{$user['website']}}
                    </small>
                </h5>
            </div>

            <div class="row">

                <h5>
                    <span class="text-primary">
                        About:
                    </span>
                    <small>
                        {{$user['about']}}
                    </small>
                </h5>
            </div>

            <div class="row border-bottom">
                <h3 class="display-5 text-primary">Reviews:</h3>
            </div>
            <carousel :per-page="3" :autoplay="true" pagination-color="#3CA4E3" :pagination-padding=6 class="my-3">
                @foreach($user->reviews as $review)
                    <slide>
                        <div class="imagebox border border-dark">
                            <a href="/reviews/show/film/{{$review->film->id}}">
                                <img class="d-block w-100 imageCarousel" src="{{$review->film->cover}}" alt="First slide">
                                <span class="imagebox-desc">{{$review->film->name}}</span>
                            </a>
                        </div>
                    </slide>
                @endforeach
            </carousel>

        </div>
    </div>
</div>