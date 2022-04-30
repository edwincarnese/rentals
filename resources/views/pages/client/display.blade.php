@extends('layouts.app')

@section('content')
{{-- <div class="page-banner-section section"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Property</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Property</li>
                </ul>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8 col-12 order-1 mb-sm-50 mb-xs-50">
                <div class="row">

                    <div class="single-property col-12 mb-50">
                        <div class="property-inner">
                           
                            <div class="head">
                                <div class="left">
                                    <h1 class="title">{{ $property->title }}</h1>
                                    <span class="location">
                                        <img src="{{ asset('assets/images/icons/marker.png') }}">
                                        {{ $property->address }}
                                    </span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">₱{{ $property->price ?? 0 }}<span>{{ $property->period }}</span></span>
                                        <span class="type">{{ $property->property_status }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="image mb-30">
                                <div class="single-property-gallery">
                                    @if($property->images)
                                        @foreach(json_decode($property->images) as $image)
                                            <div class="item">
                                                <img src="{{ asset('storage/'.$image) }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="single-property-thumb">
                                    @if($property->images)
                                        @foreach(json_decode($property->images) as $image)
                                            <div class="item">
                                                <img src="{{ asset('storage/'.$image) }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            
                            <div class="content">
                                <h3>Description</h3>
                                <p>
                                    {{ $property->description }}
                                </p>
                                
                                <div class="row mt-30 mb-30">
                                    <div class="col-md-5 col-12 mb-xs-30">
                                        <h3>Condition</h3>
                                        <ul class="feature-list">
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/area.png') }}">
                                                </div>Area 550 sqft
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/bed.png') }}">
                                                </div>Bedroom 6
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/bath.png') }}">
                                                </div>Bathroom 4
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/parking.png') }}">
                                                </div>Garage 2
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/kitchen.png') }}">
                                                </div>Kitchen 2
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    @if($property->amenities)
                                        <div class="col-md-7 col-12">
                                            <h3>Amenities</h3>
                                            <ul class="amenities-list">
                                                @foreach(json_decode($property->amenities) as $amenity)
                                                    <li>{{ $amenity }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="row">
                                    @if($property->videos)
                                        <div class="col-12 mb-30">
                                            <h3>Video</h3>
                                            @foreach(json_decode($property->videos) as $video)
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset('storage/'.$video) }}" type="video/mp4">
                                                </video>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <h3>Location</h3>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <div id="single-property-map" class="embed-responsive-item google-map" data-lat="40.740178" data-Long="-74.190194"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-30">
                                    <a class="btn btn-block" href="">Book Now</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="comment-wrap col-12">
                        <h3>3 Feedback</h3>

                        <ul class="comment-list">
                            <li>
                                <div class="comment">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/review/review-1.jpg') }}">
                                    </div>
                                    <div class="content">
                                        <h5>Alvaro Santos</h5>
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <span class="time">10 August, 2018  |  10 Min ago</span>
                                            <a href="#" class="reply">reply</a>
                                        </div>
                                        <div class="decs">
                                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain  borand I will give you a complete account of the system</p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="child-comment">
                                    <li>
                                        <div class="comment">
                                            <div class="image"><img src="{{ asset('assets/images/review/review-2.jpg') }}"></div>
                                            <div class="content">
                                                <h5>Silvia Anderson</h5>
                                                <div class="d-flex flex-wrap justify-content-between">
                                                    <span class="time">10 August, 2018  |  25 Min ago</span>
                                                    <a href="#" class="reply">reply</a>
                                                </div>
                                                <div class="decs">
                                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain  borand I will give you a complete account of the system</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="image"><img src="assets/images/review/review-3.jpg"></div>
                                    <div class="content">
                                        <h5>Nicolus Christopher</h5>
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <span class="time">10 August, 2018  |  35 Min ago</span>
                                            <a href="#" class="reply">reply</a>
                                        </div>
                                        <div class="decs">
                                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain  borand I will give you a complete account of the system</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <h3>Leave a Feedback</h3>

                        <div class="comment-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-30"><input type="text" placeholder="Name"></div>
                                    <div class="col-md-6 col-12 mb-30"><input type="email" placeholder="Email"></div>
                                    <div class="col-12 mb-30"><textarea placeholder="Message"></textarea></div>
                                    <div class="col-12"><button class="btn">send now</button></div>
                                </div>
                            </form>
                        </div>
                    
                    </div> --}}

                </div>
            </div>
            
            <div class="col-lg-4 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">
                
                <div class="sidebar">
                    <h4 class="sidebar-title"><span class="text">Book Property</span><span class="shape"></span></h4>
                    <div class="property-search sidebar-property-search">

                       
                        <form method = "GET" action="{{route('client.store', $property->id) }}">
                            @csrf                      
                            <label for="birthdaytime">SELECT (date and time):</label>
                            <input type="datetime-local" id="reserve" name="reserve_date">
                            <input type = "hidden" name = "property_id" value ={{$property->id}}>
                            
                            <input type = "hidden" name = "owners_id" value ={{$property->user_id}}>
                        <input type = "submit" class="btn btn-block" value="Book now">
                    </form>
                    </div>
                </div>
                <div class="sidebar">
                    <h4 class="sidebar-title"><span class="text">Featured Property</span><span class="shape"></span></h4>
                    <div class="sidebar-property-list">
                        @foreach($featured_properties as $property)
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type">{{ $property->property_status }}</span>
                                    <a href="{{ route('pages.properties.show', $property->id) }}">
                                        @if($property->main_photo)
                                            <img src="{{ asset('storage/'.$property->main_photo) }}">
                                        @else
                                            <img src="{{ asset('assets/images/property/sidebar-property-1.jpg') }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title">
                                        <a href="{{ route('pages.properties.show', $property->id) }}">{{ $property->title }}</a>
                                    </h5>
                                    <span class="location">
                                        <img src="{{ asset('assets/images/icons/marker.png') }}">{{ $property->address }}
                                    </span>
                                    <span class="price">
                                        ₱{{ $property->price ?? 0 }} <span>{{ $property->period }}</span>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="sidebar">
                    <h4 class="sidebar-title"><span class="text">Featured Owners</span><span class="shape"></span></h4>
                    
                    <div class="sidebar-agent-list">
                        <div class="sidebar-agent">
                            @foreach($featured_owners as $owner)
                                <div class="image">
                                    <a href="{{ $owner->id }}">
                                        @if($owner->logo)
                                            <img src="{{ asset('storage/'.$owner->logo) }}">
                                        @else
                                            <img src="{{ asset('assets/images/agent/agent-1.jpg') }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title">
                                        @if($owner->company)
                                            <a href="{{ $owner->id }}">{{ $owner->company }}</a>
                                        @else
                                            <a href="{{ $owner->id }}">{{ $owner->firstname }} {{ $owner->lastname }}</a>
                                        @endif
                                    </h5>
                                    <a href="#" class="phone">{{ $owner->phone }}</a>
                                    <span class="properties">{{ $owner->properties_count }} Properties</span>
                                    <div class="social">
                                        @if($owner->facebook)
                                            <a href="$owner->facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                                        @endif
                                        @if($owner->twitter)
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                        @endif
                                        @if($owner->linkedin)
                                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                        @endif
                                        @if($owner->google)
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
