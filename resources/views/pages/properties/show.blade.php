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
                                    <h1 class="title">{{ $property->title }} - {{ $property->type }}</h1>
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
                                                    <img src="{{ asset('assets/images/icons/bed.png') }}">
                                                </div>Bedroom {{ $property->bedroom }}
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/bath.png') }}">
                                                </div>Bathroom {{ $property->bathroom }}
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/icons/kitchen.png') }}">
                                                </div>Kitchen {{ $property->kitchen }}
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
                                        <div id="hero-map"></div>
                                    </div>
                                </div>
                            </div>

                            @if(count($rooms) > 0)
                                @guest()
                                    <div class="mt-4">
                                        <form style="display: none;" id="formRegister">
                                            <input class="mb-2" type="text" id="firstname" placeholder="First Name" required>
                                            <input class="mb-2" type="text" id="lastname" placeholder="Last Name" required>
                                            <input class="mb-2" type="text" id="phone" placeholder="Phone Number" required>
                                            <input class="mb-2" type="text" id="email" placeholder="Email" required>
                                            <input class="mb-2" type="password" id="password" placeholder="Password" required>
                                            <button type="button" onclick="submitRegister()" class="btn btn-block btn-secondary">Register</button>
                                        </form>
        
                                        <div class="btn btn-block" onclick="formRegister()" id="btnRegister">Register To Book This Property</div>
                                        
                                        <h4 class="text-center m-2">OR</h4>
        
                                        <form style="display: none;" id="formLogin">
                                            <input class="mb-2" type="text" id="user_email" placeholder="Email" required>
                                            <input class="mb-2" type="password" id="user_password" placeholder="Password" required>
                                            <button type="button" onclick="submitLogin()" class="btn btn-block btn-secondary">Login</button>
                                        </form>
        
                                        <div class="btn btn-block" onclick="formLogin()" id="btnLogin">Login To Book This Property</div>
                                    </div>
                                @endguest

                                <h3 class="mt-4">Available Rooms</h3>
                                <div class="row mt-4">
                                    @foreach($rooms as $room)
                                    <div class="col-md-6" style="margin-top: 50px;">
                                        <div class="image">
                                            <span class="type">{{ $room->property_status }}</span>
                                            @if($room->images)
                                                <img style="max-height: 275px;" src="{{ asset('storage/'.$room->images) }}">
                                            @else
                                                <img style="max-height: 275px;" src="{{ asset('assets/images/property/sidebar-property-1.jpg') }}">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <h2 class="title mt-1 text-center">
                                                {{ $room->name }}
                                            </h2>
                                            <h4 class="location mt-1 text-center">
                                                Capacity: {{ $room->capacity }}
                                            </h4>
                                            <h4 class="price mt-1 text-center">
                                                Price: ₱{{ $room->price ?? 0 }}</span>
                                            </h4>
                                        </div>
                                        <div class="content">
                                            @auth()
                                                <div class="property-search sidebar-property-search">   
                                                    @if(count($room->bookings) > 0)
                                                        <label class="btn btn-block">YOU HAVE BOOKED THIS PROPERTY</label>
                                                    @else
                                                        @if(!$room->status)
                                                            <label class="btn btn-block">PROPERTY IS UNAVAILABLE</label>                                     
                                                        @else 
                                                            <form method = "GET" action="{{route('pages.lister.show', $property->id) }}">
                                                                @csrf                      
                                                                <label for="birthdaytime">SELECT (date and time):</label>
                                                                <input type="datetime-local" id="reserve" name="reserve_date" required>
                                                                <input type = "hidden" name = "property_id" value ={{$property->id}}>
                                                                <input type = "hidden" name = "owners_id" value ={{$property->user_id}}>
                                                                <input type = "hidden" name = "room_id" value ={{$room->id}}>
                                                                <input type = "submit" class="btn btn-block" value="Book now">
                                                            </form>
                                                        @endif 
                                                    @endif  
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="comment-wrap col-12">
                        <h3>{{$count_feedback}} Feedback</h3>

                        <ul class="comment-list">
                            <li>
                                @foreach($get_message as $feedback)
                                <div class="comment">
                                    {{-- <div class="image">
                                        <img src="{{ asset('assets/images/review/review-1.jpg') }}">
                                    </div> --}}
                                    
                                    <div class="content">
                                        <h5>{{$feedback->user->firstname}}  &nbsp; {{$feedback->user->lastname}}</h5>
                                        <div class="d-flex flex-wrap justify-content-between">
                                            <span class="time">{{ \Carbon\Carbon::parse($feedback->created_at)->diffForHumans() }} </span>
                                        </div>
                                        @if($feedback->ratings)
                                        <h5>Ratings:
                                            @for($i=0; $i < $feedback->ratings; $i++)
                                                <svg style="color: green;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            @endfor
                                        </h5>
                                        @endif
                                        <div class="decs">
                                            <p>{{$feedback->message}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                 
                            </li>
                            <li>
                                
                            </li>
                        </ul>

                        <h3>Leave a Feedback</h3>
                        @guest()
                        <a class="btn" href="{{ route('login') }}">sign in</a>
                        @endguest 
                        @auth
                            @if($property->user_id != Auth::user()->id)
                            <div class="comment-form">
                                <form method = "GET" action="{{route('pages.feedback.store', $property->id) }}">                                       
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-30"><input type="text" name = "name" value = "{{$user->firstname}} &nbsp;{{$user->lastname}}" readonly required></div>
                                        <div class="col-md-6 col-12 mb-30"><input type="email" name = "email" value="{{$user->email}}" placeholder="Email" readonly required></div>
                                        <div class="col-md-12 col-12 mb-30">
                                            <select class="form-control" name="ratings" required>
                                                <option value="5">5 Stars</option>
                                                <option value="4">4 Stars</option>
                                                <option value="3">3 Stars</option>
                                                <option value="2">2 Stars</option>
                                                <option value="1">1 Star</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-30"><textarea placeholder="Message" name = "message" required></textarea></div>
                                        <div class="col-12"><button class="btn">Send Feedback Now</button></div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        @endauth
                    
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">
                
                @if(count($rooms) == 0)
                    <div class="sidebar">
                        @guest()
                            <form style="display: none;" id="formRegister">
                                <input class="mb-2" type="text" id="firstname" placeholder="First Name" required>
                                <input class="mb-2" type="text" id="lastname" placeholder="Last Name" required>
                                <input class="mb-2" type="text" id="phone" placeholder="Phone Number" required>
                                <input class="mb-2" type="text" id="email" placeholder="Email" required>
                                <input class="mb-2" type="password" id="password" placeholder="Password" required>
                                <button type="button" onclick="submitRegister()" class="btn btn-block btn-secondary">Register</button>
                            </form>

                            <div class="btn btn-block" onclick="formRegister()" id="btnRegister">Register To Book This Property</div>
                            
                            <h4 class="text-center m-2">OR</h4>

                            <form style="display: none;" id="formLogin">
                                <input class="mb-2" type="text" id="user_email" placeholder="Email" required>
                                <input class="mb-2" type="password" id="user_password" placeholder="Password" required>
                                <button type="button" onclick="submitLogin()" class="btn btn-block btn-secondary">Login</button>
                            </form>

                            <div class="btn btn-block" onclick="formLogin()" id="btnLogin">Login To Book This Property</div>
                        @endguest                    
                        @auth()
                            <div class="property-search sidebar-property-search">   
                                @if($is_booked)
                                    <label class="btn btn-block">YOU HAVE BOOKED THIS PROPERTY</label>
                                @else
                                    @if(!$property->availability_at)
                                        <label class="btn btn-block">PROPERTY IS UNAVAILABLE</label>                                     
                                    @else 
                                        <h4 class="sidebar-title"><span class="text">Book Property</span><span class="shape"></span></h4>
                                        <form method = "GET" action="{{route('pages.lister.show', $property->id) }}">
                                            @csrf                      
                                            <label for="birthdaytime">SELECT (date and time):</label>
                                            <input type="datetime-local" id="reserve" name="reserve_date" required>
                                            <input type = "hidden" name = "property_id" value ={{$property->id}}>
                                            <input type = "hidden" name = "owners_id" value ={{$property->user_id}}>
                                            <input type = "submit" class="btn btn-block" value="Book now">
                                        </form>
                                    @endif 
                                @endif  
                            </div>
                        @endauth
                    </div>
                @endif

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
                    
                    <!--Sidebar Agents start-->
                    @foreach($featured_owners as $owner)
                    <div class="sidebar-agent-list">
                       
                        <div class="sidebar-agent">
                            
                            <div class="image">
                              
                                <a href="single-properties.html"><img src="assets/images/agent/agent-1.jpg" alt=""></a>
                                
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
                        </div> 
                        
                    </div> @endforeach
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<input type="hidden" id="pages-home" value="{{ route('pages.home') }}">
@endsection

@section('js')
<script>
    const urlEndpoint = '/properties/';
    const locationData = {!! $properties !!};

    function formLogin()
    {
        $('#formLogin').show();
        $('#btnLogin').hide();
    }

    function submitLogin()
    {
        const email = $('#user_email').val();
        const password = $('#user_password').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/property-login',
            data: {
                'email': email,
                'password': password,
            },
            success: function (data) {
                if(data == 'Success') {
                    location.reload();
                } 
                else {
                    alert('Incorrect Email or Password');
                }
            },
            error: function (data) {
                alert('Wrong password');
            }
        });
    }

    function formRegister()
    {
        $('#formRegister').show();
        $('#btnRegister').hide();
    }

    function submitRegister()
    {
        const email = $('#email').val();
        const firstname = $('#firstname').val();
        const lastname = $('#lastname').val();
        const phone = $('#phone').val();
        const password = $('#password').val();

        if(!email || !firstname || !lastname || !phone || !password) {
            alert('Please fill up the emtpy fields.');
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/property-register',
                data: {
                    'email': email,
                    'password': password,
                    'firstname': firstname,
                    'lastname': lastname,
                    'phone': phone,
                },
                success: function (data) {
                    if(data == 'Success') {
                        location.reload();
                    } 
                    else {
                        alert('Email is already exists');
                    }
                },
                error: function (data) {
                    
                }
            });
        }
    }
</script>
<script type="text/javascript" src="{{ asset('assets/js/infobox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app/location.js') }}"></script>
@endsection