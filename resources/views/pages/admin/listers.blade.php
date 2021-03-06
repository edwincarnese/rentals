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
           
            @include('pages.admin._sidebar')
            
            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    <div class="row">
                        <div class="property-item col-md-12 col-12 mb-40">
                            <a href = ""> <h3 class="mb-30">All Listers</h3> </a>                           
                           
                            <table class="table table-bordered">                                
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Date Registered</th>
                                <tr>
                                    @foreach ($users as $user) 
                                        <td class="text-center">{{$user->firstname}} {{$user->lastname}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('M. d, Y') }}
                                        </td>
                                    </tr>
                                    @endforeach
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
