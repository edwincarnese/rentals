@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!--Page Banner Section start-->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Login</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Page Banner Section end-->

<!--Login & Register Section start-->
<div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-12 ml-auto mr-auto">
                
                <ul class="login-register-tab-list nav">
                    <li>
                        <a class="active" href="{{ route('login') }}">Login</a>
                    </li>
                    <li>or</li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div id="login-tab" class="tab-pane show active">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @error('email')
                                <h3 class="text-center text-danger">
                                    These credentials does not match our records.
                                </h3 >
                            @enderror
                            <div class="row">
                                <div class="col-12 mb-30">
                                    <input name="email" id="email" type="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <div class="col-12 mb-30">
                                    <input name="password" id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                                </div>

                                <div class="col-12 mb-30">
                                    <button type="submit" class="btn btn-block">Login</button>
                                </div>

                                <div class="col-12 d-flex justify-content-between">
                                    <span>New User?&nbsp; <a href="{{ route('register') }}">Register!</a></span>
                                    <span><a href="{{ route('password.request') }}">Forgot Password ?</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Login & Register Section end-->
@endsection
