@extends('layouts.app')

@section('content')
<!--Page Banner Section start-->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Agency Details</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Agency Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Page Banner Section end-->

<!--Agency Section start-->
<div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        
        <div class="row row-25">

            <!--Agency Image-->
            <div class="col-lg-5 col-12 mb-sm-30 mb-xs-30">
                {{-- <div class="agency-image">
                    <img src="{{ asset('assets/images/agencies/agency-1.jpg') }}" alt="">
                --}}
                 
                    <div class="item">
                        <img src="{{ asset('storage/'.$user->logo) }}">
                    </div>
               
                {{-- </div> --}}
            </div>

            <!--Agency Content-->
            <div class="col-lg-7 col-12">
                <div class="agency-content">
                    <h3 class="title">{{$user->company}}</h3>
                    <p>{{$user->about}}</p>
                    <ul>
                        <li><i class="pe-7s-map"></i>{{$user->address}}</li>
                        <li><i class="pe-7s-phone"></i><a href="#">{{$user->phone}}</a></li>
                        <li><i class="pe-7s-mail-open"></i><a href="#">{{$user->email}}</a></li>
                        <li><i class="pe-7s-global"></i><a href="#">{{$user->email}}</a></li>
                        {{-- <li><i class="pe-7s-credit"></i>AB7876A6</li> --}}
                        {{-- <li><i class="pe-7s-users"></i>4 Agents</li> --}}
                        <li><i class="pe-7s-photo"></i>{{$user->properties_count}} Properties</li>
                    </ul>
                    <div class="social">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
<!--Agency Section end-->

<div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <h1>List of Properties</h1>
        <div class="row row-25">
            @foreach($properties as $property)
                <div class="property-item col-md-4 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                            <a href="{{ route('pages.properties.show', $property->id) }}">
                                @if($property->main_photo)
                                    <img src="{{ asset('storage/'.$property->main_photo) }}">
                                @else
                                    <img src="{{ asset('assets/images/property/property-1.jpg') }}">
                                @endif
                            </a>                  
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title">
                                    <a href="{{ route('pages.properties.show', 1) }}">
                                    {{ $property->title }}
                                    </a>
                                </h3>
                                <span class="location">
                                    <img src="{{ asset('assets/images/icons/marker.png') }}">{{ $property->address }}
                                </span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">₱{{ $property->price ?? 0 }}</span>
                                    <span class="type">
                                        {{ $property->property_status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>

        <div class="row mt-20">
            <div class="col" style = "text-align:center;">
                {{
                    $properties->appends([
                        'show' => request()->query('show'), 
                    ])->links()
                }}
            </div>
        </div>               
    </div>
</div>
@endsection
