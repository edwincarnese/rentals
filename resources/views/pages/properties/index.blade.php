@extends('layouts.app')

@section('content')
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Properties</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Properties</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                <div class="row">
                    @foreach($properties as $property)
                   
                    <div class="property-item col-md-6 col-12 mb-40">
                        <div class="property-inner">
                            <div class="image">
                                <a href="{{ route('pages.properties.show', $property->id) }}">
                                    @if($property->main_photo)
                                        <img src="{{ asset('storage/'.$property->main_photo) }}">
                                    @else
                                        <img src="{{ asset('assets/images/property/property-1.jpg') }}">
                                    @endif
                                </a>
                                {{-- <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="assets/images/icons/area.png">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="assets/images/icons/bed.png">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="assets/images/icons/bath.png">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="assets/images/icons/parking.png">3</span>
                                    </li>
                                </ul> --}}
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title">
                                        <a href="{{ route('pages.properties.show', 1) }}">
                                        {{ $property->title }}
                                        </a>
                                    </h3>
                                    <span class="location">
                                        <img src="assets/images/icons/marker.png">{{ $property->address }}
                                    </span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">₱{{ $property->price ?? 0 }}</span>
                                       
                                        {{-- <span class="price">₱{{ $property->price ?? 0 }}<span>{{ $property->period }}</span></span> --}}
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
                        {{-- <ul class="page-pagination">
                            <li><a href="#"><i class="fa fa-angle-left"></i> Prev</a></li>
                            <li class="active"><a href="#">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">04</a></li>
                            <li><a href="#">05</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Next</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                
                <div class="sidebar">
                    <h4 class="sidebar-title"><span class="text">Search Property</span><span class="shape"></span></h4>
                
                    <div class="property-search sidebar-property-search">

                        <form action="{{ route('pages.properties.index') }}" method="GET">

                            <div>
                                <select class="nice-select" name="status">
                                    <option value="for-rent" {{ Request::get('status') == 'for-rent' ? 'selected' : ''  }}>For Rent</option>
                                    <option value="for-sale" {{ Request::get('status') == 'for-sale' ? 'selected' : ''  }}>For Sale</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select" name="type">
                                    <option value="">Type</option>
                                    <option value="Apartment" {{ Request::get('type') == 'Apartment' ? 'selected' : ''  }}>Apartment</option>
                                    <option value="Cafe" {{ Request::get('type') == 'Cafe' ? 'selected' : ''  }}>Cafe</option>
                                    <option value="House" {{ Request::get('type') == 'House' ? 'selected' : ''  }}>House</option>
                                    <option value="Restaurant" {{ Request::get('type') == 'Restaurant' ? 'selected' : ''  }}>Restaurant</option>
                                    <option value="Store" {{ Request::get('type') == 'Store' ? 'selected' : ''  }}>Store</option>
                                    <option value="Villa" {{ Request::get('type') == 'Villa' ? 'selected' : ''  }}>Villa</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select" name="bedroom">
                                    <option value="">Bedrooms</option>
                                    <option value="1" {{ Request::get('bedroom') == 1 ? 'selected' : ''  }}>1</option>
                                    <option value="2" {{ Request::get('bedroom') == 2 ? 'selected' : ''  }}>2</option>
                                    <option value="3" {{ Request::get('bedroom') == 3 ? 'selected' : ''  }}>3</option>
                                    <option value="4" {{ Request::get('bedroom') == 4 ? 'selected' : ''  }}>4</option>
                                    <option value="5" {{ Request::get('bedroom') == 5 ? 'selected' : ''  }}>5</option>
                                    <option value="6" {{ Request::get('bedroom') == 6 ? 'selected' : ''  }}>6</option>
                                </select>
                            </div>

                            <div>
                                <select class="nice-select" name="bathroom">
                                    <option value="">Bathrooms</option>
                                    <option value="1" {{ Request::get('bathroom') == 1 ? 'selected' : ''  }}>1</option>
                                    <option value="2" {{ Request::get('bathroom') == 2 ? 'selected' : ''  }}>2</option>
                                    <option value="3" {{ Request::get('bathroom') == 3 ? 'selected' : ''  }}>3</option>
                                    <option value="4" {{ Request::get('bathroom') == 4 ? 'selected' : ''  }}>4</option>
                                    <option value="5" {{ Request::get('bathroom') == 5 ? 'selected' : ''  }}>5</option>
                                    <option value="6" {{ Request::get('bathroom') == 6 ? 'selected' : ''  }}>6</option>
                                </select>
                            </div>

                            {{-- <div>
                                <div id="search-price-range"></div>
                            </div> --}}

                            <div>
                                <input type="text" value="{{ Request::get('address') }}" name="address" placeholder="Location">
                            </div>

                            <div>
                                <button>search</button>
                            </div>

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
