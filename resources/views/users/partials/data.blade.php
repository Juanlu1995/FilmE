<div>
    <form action="/profile/edit" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="{{$user->name}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName"
                           placeholder="{{$user->last_name}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="{{$user->email}}">
                </div>
            </div>
            <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-warning btn-block">Update</button>
            </div>
        </div>
    </form>
</div>