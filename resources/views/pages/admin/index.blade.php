@extends('layouts.app')

@section('content')
{{-- <div class="page-banner-section section"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">My Account</h1>
                <ul class="page-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    @include('partials._message')
    <div class="container">
        <div class="row row-25">

            @include('pages.admin._sidebar')

            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    <div id="profile-tab" class="tab-pane show active">
                        <form action="{{ route('lister.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-30">
                                    <h3 class="mb-0">Personal Profile</h3>
                                </div>
                                
                                <div class="col-md-6 col-12 mb-30">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" value="{{ Auth::user()->firstname }}">
                                </div>

                                <div class="col-md-6 col-12 mb-30">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" value="{{ Auth::user()->lastname }}">
                                </div>

                                <div class="col-12 mb-30">
                                    <label>Company</label>
                                    <input type="text" name="company" value="{{ Auth::user()->company }}">
                                </div>

                                <div class="col-12 mb-30">
                                    <label>About</label>
                                    <textarea name="about">{{ Auth::user()->about }}</textarea>
                                </div>

                                <div class="@if(Auth::user()->logo) col-6 @else col-12 @endif mb-30">
                                    <label>Logo</label>
                                    <input type="file" name="logo" accept="image/*">
                                </div>

                                @if(Auth::user()->logo)
                                    <div class="col-6 mb-30">
                                        <img src="{{ asset('storage/'.Auth::user()->logo) }}" class="text-center">
                                    </div>
                                @endif

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-30">
                                            <label>Address</label>
                                            <input type="text" name="address" value="{{ Auth::user()->address }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label>Website</label>
                                            <input type="text" name="website" value="{{ Auth::user()->website }}">
                                        </div>
                                    </div>
                                    <h4>Social</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_facebook"><i class="fa fa-facebook-official"></i>Facebook</label>
                                            <input type="text" name="facebook" value="{{ Auth::user()->facebook }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_twitter"><i class="fa fa-twitter"></i>Twitter</label>
                                            <input type="text" name="twitter" value="{{ Auth::user()->twitter }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_linkedin"><i class="fa fa-linkedin"></i>Linkedin</label>
                                            <input type="text" name="linkedin" value="{{ Auth::user()->linkedin }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_google"><i class="fa fa-google"></i>Google Plus</label>
                                            <input type="text" name="google" value="{{ Auth::user()->google }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_instagram"><i class="fa fa-instagram"></i>Instagram</label>
                                            <input type="text" name="instagram" value="{{ Auth::user()->instagram }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_pinterest"><i class="fa fa-pinterest"></i>Pinterest</label>
                                            <input type="text" name="pinterest" value="{{ Auth::user()->pinterest }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_skype"><i class="fa fa-skype"></i>Skype</label>
                                            <input type="text" name="skype" value="{{ Auth::user()->skype }}">
                                        </div>
                                        <div class="col-md-6 col-12 mb-30">
                                            <label for="personal_social_tumblr"><i class="fa fa-tumblr"></i>Tumblr</label>
                                            <input type="text" name="tumblr" value="{{ Auth::user()->tumblr }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-30"><button class="btn btn-block">Approve Profile</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
