{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Login</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group mb-3">--}}
{{--                                <label for="email">Email address</label>--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">--}}
{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="form-group mb-3">--}}
{{--                                <label for="password">Password</label>--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">--}}
{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="form-group form-check mb-3">--}}
{{--                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                <label class="form-check-label" for="remember">Remember Me</label>--}}
{{--                            </div>--}}

{{--                            <button type="submit" class="btn btn-primary btn-block">Login</button>--}}

{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>--}}
{{--                            @endif--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Login</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            @endif

                            <p class="mt-3">Don't have an account? <a href="{{ route('register') }}" class="btn btn-link">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
