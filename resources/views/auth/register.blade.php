@extends('layouts.app')

@section('content')
<!--Page Banner Section start-->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Register</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Register</li>
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
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>or</li>
                    <li>
                        <a class="active" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div id="register-tab" class="tab-pane show active">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            @error('email')
                                <h3 class="text-center text-danger">
                                    These credentials does not match our records.
                                </h3 >
                            @enderror
                            @error('password')
                                <h3 class="text-center text-danger">
                                    Passwords do not matched.
                                </h3 >
                            @enderror
                            <div class="row">
                                <div class="col-6 mb-30">
                                    <input name="firstname" type="text" placeholder="First Name" required>
                                </div>
                                <div class="col-6 mb-30">
                                    <input name="lastname" type="text" placeholder="Last Name" required>
                                </div>
                                {{-- <div class="col-12 mb-30">
                                    <input name="email" type="email" placeholder="Email" required>
                                </div> --}}
                                <div class="col-6 mb-30">
                                    <input name="email" type="email" placeholder="Email" required>
                                </div>
                                <div class="col-6 mb-30">
                                    <input name="phone" type="text" placeholder="Phone Number" required>
                                </div>                                
                                <div class="col-6 mb-30">
                                    <input name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="col-6 mb-30">
                                    <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
                                </div>
                                <div class="col-12 mb-30">
                                    <ul>
                                        <li>
                                            <input type="radio" name="role" id="client" value="3" checked>
                                            <label for="client">Client</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="role" id="lister" value="2">
                                            <label for="lister">Lister</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block">Register</button>
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
