<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="{{$user->name}}" class="form-control">
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input class="form-control" type="text" name="lastName" id="lastName"
                       placeholder="{{$user->last_name}}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="{{$user->email}}">
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
        <div class="form-group col-lg-12 my-3">
            <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
    </div>
</div>