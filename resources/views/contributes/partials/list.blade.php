    @foreach($contributes->chunk(3) as $row)
        <div class="card-deck m-5">
            @foreach($row as $contribute)
                <div class="card">
                    <div class="imagebox border border-dark">
                        <a href="/contributes/show/{{$contribute->slug}}">
                            <img src="{{$contribute->photo}}" alt="{{$contribute->name}} photo" class="img-fluid">
                            <span class="imagebox-desc">{{$contribute->name}}</span>
                        </a>

                    </div>
                    <div class="card-body">
                        <h3 class="card-header">{{$contribute->name}} {{$contribute->last_name}}</h3>
                        <p class="card-text">Birth date: <span class="text-danger">{{ $contribute->birth_date}}</span>
                        </p>
                        <p class="card-text">Nationality: <span
                                    class="text-danger">{{ $contribute->nationality->name}}</span></p>
                    </div>
                </div>

            @endforeach
        </div>
    @endforeach
