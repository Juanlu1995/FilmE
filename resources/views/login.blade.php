@extends("layouts.app")

@section('title')
    Bienvenido!
@endsection

@section('content')
    <h1 class="title mt-5">Bienvenido!</h1>

    <div class="row">
        <div class="mt-3 py-3 col">
            <h3 class="subtitle">Loguearse</h3>
            <form action="/login" method="post">
                <div class="form-group">
                    <label for="EmailInputLogin">Email</label>
                    <input type="email"
                           name="EmailInputLogin" id="EmailInputLogin" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="PasswordInputLogin">Password</label>
                    <input type="password"
                           name="PasswordInputLogin" id="PasswordInputLogin" class="form-control"
                           placeholder="Pass">
                </div>
            </form>
        </div>
    </div>
    {{--@todo contraseña olvidada--}}
@endsection
