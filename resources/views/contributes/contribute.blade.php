<div class="row py-5 border-bottom">
    <div class="col-md-4">
        <div class="imagebox border border-dark">
            <a href="/contribute/show/{{ $contribute['slug'] }}">
                <img src="{{$contribute['photo']}}" alt="{{$contribute['name']}} photo" class="img-fluid">
                <span class="imagebox-desc">{{$contribute->name}}</span>
            </a>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <a href="/contribute/show/{{ $contribute['id'] }}">
                <h1 class="display-4 col">{{ $contribute['name'] }} {{$contribute['last_name']}} </h1>
            </a>
        </div>
        <div class="row ml-1">
            <h3 class="display-5">Birth date:
                <span class="text-danger">{{ $contribute['birth_date'] }}</span>
                <small class="text-muted">({{$contribute->getAge()}} years)</small>
            </h3>
        </div>
        <div class="row ml-1">
            <h3 class="display-5">Nationality:
                <span class="text-danger">{{$contribute->nationality->name}}</span>
            </h3>
        </div>
        <div class="row ml-1">
            <h3 class="display-5">Contributions: <span class="text-danger">{{$contribute->numberOfContributions()}}</span></h3>
        </div>
    </div>
</div>
