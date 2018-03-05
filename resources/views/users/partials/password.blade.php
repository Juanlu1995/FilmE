<div>
    <div class="row form-group">
        <label for="current_passwor$errod">Current Password</label>
        <input type="password" placeholder="******" name="current_password" class="form-control {{$errors->has('current_password') ? 'is-invalid' : ''}}"
               id="current_password">
        @if($errors->has('current_password'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('current_password') }}</strong>
            </div>
        @endif
    </div>

    <div class="row form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="******" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password">
        @if($errors->has('password'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group row">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" placeholder="******" name="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
               id="password_confirmation">
        @if($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group row my-3">
        <button type="submit" class="btn btn-warning btn-block">Update</button>
    </div>
</div>