@extends('layouts.app')

@section('content')
    <div class="cont">
        <div class="form sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>{{ __('Register') }}</h2>
                <label label for="name">
                    <span>Name</span>
                    <input input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label for="email">
                    <span>Email</span>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label for="password">
                    <span>Password</span>
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label for="password-confirm">
                    <span>Password Confirm</span>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"/>
                </label>
                <button type="submit" class="submit">Sign Up</button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <a href="{{ route('login') }}">
                    <div class="img__btn">
                        <span>Sign In</span>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
