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
           
            @include('pages.lister._sidebar')
            
            <div class="col-lg-8 col-12">
                    
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane show active">
                            @auth()
                            {{-- @foreach ($bookings as $booking)  --}}
                            <form action="{{route('booking.lister.destroy',$bookings->id)}}" method="POST">
                            @csrf   
                            @method('DELETE') 
                                <div class="row">
                                    <div class="col-12 mb-25"><h3 class="mb-0">Booking Confirmation</h3></div>
                                    {{-- <div class="col-md-6 col-12 mb-30"><label for="f_name">{{$booking->id}}</label></div><br> --}}
                                    <div class="col-8 mb-25"><label>Title:</label><input type="text" name="title" value="{{$bookings->property->title}}" readonly></div>
                                   
                                    <div class="col-8 mb-25"><label>Type:</label><input type="text" name="type" value="{{$bookings->property->type}}" readonly ></div>
                                    <div class="col-8 mb-25"><label>price:</label><input type="text" name="price" value="{{$bookings->property->price}}" readonly></div>
                                    <div class="col-8 mb-25"><label>Period:</label><input type="text" name="owner" value="{{$bookings->property->period}}" readonly></div>
                                    <input type = "hidden" name = "property_id"  value="{{$bookings->property->id }}"   >                                
                                    <input type = "hidden" name = "owner_id"  value="{{$bookings->cient->id }}"   > 
                                    <div class="col-12 mb-30">
                                        <ul class="other-features">
                                            <li>
                                                <input type="checkbox" id="air_condition" name="availability" value="0">
                                                <label for="air_condition">Set this property as unavailable</label>
                                            </li>
                                        </ul>
                                    </div>
                                   {{-- <div class="col-md-6 col-12 mb-30"><label for="f_name">Your Payment</label>  <input type="text" name="company"></div> --}}
                                    <div class="col-12 mb-30"><button class="btn">Save</button></div>
                                </div>
                            </form>
                            {{-- @endforeach --}}
                            @endauth
                        </div>                        
               
                        
                    </div>
                    
                </div>
        </div>
    </div>
</div>
@endsection
