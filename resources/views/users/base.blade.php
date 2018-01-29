<div class="row">
    <div class="col-md-4">
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

            {{--@todo colocal las películas que le han gustado al usuario--}}
            <div class="row">

                <h5>
                    <span class="text-warning">
                        Liked films:
                    </span>
                    <small>
                        Aquí se pondrán las películas a las cuales le ha gustado al usuario
                    </small>
                </h5>
            </div>

        </div>
    </div>
</div>