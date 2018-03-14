<carousel :autoplay="true" :navigation-enabled="true" :easing="'ease-out'"
          pagination-color="#3CA4E3" :pagination-padding=6 class="my-3"
          id="userCarousel">
    @foreach($user->reviews as $review)
        <slide>
            <div class="imagebox border border-dark">
                <a href="/reviews/{{$review->id}}">
                    <img class="d-block w-100 imageCarousel" src="{{$review->film->cover}}"
                         alt="First slide">
                    <span class="imagebox-desc">{{$review->film->name}}</span>
                </a>
            </div>
        </slide>
    @endforeach
</carousel>