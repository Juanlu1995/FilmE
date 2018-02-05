@extends('layouts.app')

@push('scripts')
    <script src="js/validateLogin.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-6">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/register') }}" id="registerForm">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right" for="name">Name</label>

                                    <div class="col-lg-6">
                                        <input
                                                type="text"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name"
                                                value="{{ old('name') }}"
                                                required
                                                id="name"
                                        >
                                    @if ($errors->has('name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right" for="lastName">Last Name</label>

                                <div class="col-lg-6">
                                    <input
                                            type="text"
                                            class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                                            name="lastName"
                                            value="{{ old('lastName') }}"
                                            required
                                            id="lastName"
                                    >
                                @if ($errors->has('lastName'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </div>
                                    @endif

                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right" for="username">Username</label>

                                <div class="col-lg-6">
                                    <input
                                            type="text"
                                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                            name="username"
                                            value="{{ old('username') }}"
                                            required
                                            id="username"
                                    >
                                @if ($errors->has('username'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </div>
                                    @endif

                                </div>
                                @include('layouts.spinner')

                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right" for="email">E-Mail Address</label>

                                <div class="col-lg-6">
                                    <input
                                            type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            id="email"
                                    >

                                @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif

                                </div>
                                @include('layouts.spinner')

                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right" for="password">Password</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password"
                                            required
                                            id="password"
                                    >
                                    @include('layouts.spinner')
                                @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right" for="repassword">Confirm
                                    Password</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation"
                                            required
                                            id="repassword"
                                    >
                                    @include('layouts.spinner')
                                @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" class="btn btn-primary" id="registerButton">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
