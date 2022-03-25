@extends('layouts.app')

@section('content')
<div class="page-banner-section section">
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
</div>

<div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    @include('partials._message')
    <div class="container">
        <div class="row row-25">
           
            @include('pages.lister._sidebar')
            
            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    <div class="row">
                        <div class="property-item col-md-12 col-12 mb-40">
                            <h3 class="mb-30">Bookings</h3>
                            {{-- <div class="property-inner">
                                <div class="image">
                                    <a href="single-properties.html"><img src="{{ asset('assets/images/property/property-1.jpg') }}" alt=""></a>
                                    <ul class="property-feature">
                                        <li>
                                            <span class="area"><img src="{{ asset('assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                        </li>
                                        <li>
                                            <span class="bed"><img src="{{ asset('assets/images/icons/bed.png') }}" alt="">6</span>
                                        </li>
                                        <li>
                                            <span class="bath"><img src="{{ asset('assets/images/icons/bath.png') }}" alt="">4</span>
                                        </li>
                                        <li>
                                            <span class="parking"><img src="{{ asset('assets/images/icons/parking.png') }}" alt="">3</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h3>
                                        <span class="location"><img src="{{ asset('assets/images/icons/marker.png') }}" alt="">568 E 1st Ave, Miami</span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">$550<span>M</span></span>
                                            <span class="type">For Rent</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="content mt-4">
                                    <div class="left">
                                        <h3 class="title">
                                            <a href="single-properties.html">No. of Bookings</a>
                                        </h3>
                                    </div>
                                    <div class="right text-center">
                                        <div class="type-wrap">
                                            <span class="price">2 people</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <table class="table table-bordered">
                                <th class="text-center">Property</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Renter</th>
                                <th class="text-center">Date Time</th>
                                <th class="text-center">Actions</th>
                                <tr>
                                    <td class="text-center">
                                        <a href="" class="link">Property 1</a>
                                    </td>
                                    <td class="text-center">For Rent</td>
                                    <td class="text-center">₱1,000 / monthly</td>
                                    <td class="text-center">
                                        Juan Dela Cruz
                                    </td>
                                    <td class="text-center">
                                        3/16/2022
                                    </td>
                                    <td class="text-center">
                                        <button class="btn-success mr-2">Book</button>
                                        <button class="btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
