{{--register.blade.php--}}
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <form action="{{ route('register') }}" method="POST">--}}
{{--        @csrf--}}
{{--        <div>--}}
{{--            <label for="name">Name:</label>--}}
{{--            <input type="text" id="name" name="name" placeholder="Name" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="email">Email:</label>--}}
{{--            <input type="email" id="email" name="email" placeholder="Email" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="password">Password:</label>--}}
{{--            <input type="password" id="password" name="password" placeholder="Password" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="password_confirmation">Confirm Password:</label>--}}
{{--            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>--}}
{{--        </div>--}}
{{--        <button type="submit">Register</button>--}}
{{--    </form>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Register</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
