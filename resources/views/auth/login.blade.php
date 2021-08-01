@extends('layouts.app')

@section('content')
    <div class="cont">
        <div class="form sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2> {{ __('Login') }}</h2>
                <label for="email">
                    <span>Email</span>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label for="password">
                    <span>Password</span>
                    <input input id="password" type="password" class=" @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="text-decoration: none;">
                        <p class="forgot-pass">Forgot password?</p>
                    </a>
                @endif
                <button type="submit" class="submit">Sign In</button>
            </form>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <a href="{{ route('register') }}">
                    <div class="img__btn">
                        <span class="m--up"> Sign Up </span>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
