<div class="row">
    <div class="col-lg-4">
        <img src="{{$user->avatar}}" class="img-thumbnail img-fluid" alt="avatar">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                <label class="custom-file-label" for="inputGroupFile01">Chose Avatar</label>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row form-group">
            <div class="col-lg-6">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="{{$user->phone}}">
            </div>
            <div class="col-lg-6">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" class="form-control" placeholder="{{$user->website}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="about">About</label>
                <textarea name="about" id="about" class="form-control" placeholder="{{$user->about}}">
            </textarea>
            </div>
        </div>
    </div>
</div>