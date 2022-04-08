@extends('layouts.app')

@section('content')
{{-- <div class="page-banner-section section"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">User Approval</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">User Approval</li>
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
                    <div class="row">
                        <div class="property-item col-md-12 col-12 mb-40">
                            <h3 class="mb-30">{{ $user->firstname }} {{ $user->lastname }}</h3> 
                            @if($user->logo)
                                <a href="{{ asset('storage/'.$user->logo) }}" target="_blank">
                                    <img src="{{ asset('storage/'.$user->logo) }}" height="150" class="text-center">
                                </a>
                            @endif                         
                            <p class="mb-0">Valid Id:</p>  
                            @if($user->valid_id)
                                <a href="{{ asset('storage/'.$user->valid_id) }}" target="_blank">
                                    <img src="{{ asset('storage/'.$user->valid_id) }}" height="150" class="text-center">
                                </a>
                            @endif    
                            <p>Email: {{ $user->email  }}</p>                   
                            <p>Complete Adress: {{ $user->address }}</p>                         
                            <p>Phone: {{ $user->phone }}</p>                         
                            <p>Company: {{ $user->company }}</p>                         
                            <p>Website: {{ $user->website }}</p>                         
                            <p>Facebook: {{ $user->facebook }}</p>                         
                            <p>Twitter: {{ $user->twitter }}</p>                         
                            <p>LinkedIn: {{ $user->linkedin }}</p>                         
                            <p>Google: {{ $user->google }}</p>                         
                            <p>Instagram: {{ $user->instagram }}</p>                         
                            <p>Pinterest: {{ $user->pinterest }}</p>                         
                            <p>Skype: {{ $user->skype }}</p>                         
                            <p>Tumblr: {{ $user->tumblr }}</p>                         
                            <p>About: {{ $user->about }}</p>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
