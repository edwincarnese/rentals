@extends('layouts.app')

@section('content')
{{-- <div class="page-banner-section section"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">My Account</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Account</li>
                </ul>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    @include('partials._message')
    <div class="container">
        <div class="row row-25">
           
            @include('pages.client._sidebar')

            <div class="col-lg-8 col-12">
                <div id="password-tab" class="tab-pane">
                    <form action="{{ route('client.update.password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-30">
                                <h3 class="mb-0">Change Password</h3>
                            </div>
                            <div class="col-12 mb-30">
                                <label>Current Password</label>
                                <input type="password" name="current_password" required>
                            </div>
                            <div class="col-12 mb-30">
                                <label>New Password</label>
                                <input type="password" name="new_password" required>
                            </div>
                            <div class="col-12 mb-30">
                                <label>Confirm New Password</label>
                                <input type="password" name="new_confirm_password" required>
                            </div>

                            <div class="col-12 mb-30">
                                <button type="submit" class="btn btn-block">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
