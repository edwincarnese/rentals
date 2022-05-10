@extends('layouts.app')

@section('content')

<!--Hero Section start-->
<div class="hero-section section position-relative"> 
    <!--Hero Map-->
    <div id="hero-map"></div>

    <!--Hero Map Property Controler-->
    {{-- <div class="map-property-controls"></div> --}}
    
</div>
<div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50 mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <button type="button" onclick="findMe()" class="btn btn-block btn-primary">Near Me</button>
        </div>
        <div class="col-md-6">
            <a href="{{ route('pages.home', ['popular' => 'true']) }}" class="btn btn-block btn-primary">Popular Housing</a>
        </div>
    </div>
    <div class="container">        
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="text-center">
                    <h1>Featured For Rent Property</h1>
                </div>
            </div>
        </div>
            
        <div class="row">            
            <!--Property Slider start-->
            <div class="property-carousel section">
                <!--Property start-->  
                @foreach($rent_property as $property)
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="{{ route('pages.properties.show', $property->id) }}"> <span class="location">                                    
                                @if($property->main_photo)
                                    <img style="max-height: 275px;" src="{{ asset('storage/'.$property->main_photo) }}">
                                @else
                                    <img style="max-height: 275px;" src="{{ asset('assets/images/property/property-1.jpg') }}">
                                @endif</a>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="{{ route('pages.properties.show', $property->id) }}">{{$property->title}}</a></h3>
                                    <span class="location"> 
                                        <img style="max-height: 275px;" src="{{ asset('assets/images/icons/bed.png')}}" alt="">{{$property->address}}</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">${{$property->price}}</span>
                                        <span class="type">For Rent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach               
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="text-center">
                    <h1>Featured For Sale Property</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="property-carousel section">
                @foreach($sale_property as $properties)
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                {{-- <span class="label">Feature</span> --}}
                                <a href="{{ route('pages.properties.show', $properties->id) }}">
                                    @if($properties->main_photo)
                                        <img style="max-height: 275px;" src="{{ asset('storage/'.$properties->main_photo) }}">
                                    @else
                                        <img style="max-height: 275px;" src="{{ asset('assets/images/property/property-1.jpg') }}">
                                    @endif 
                                </a>                       
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="{{ route('pages.properties.show', $properties->id) }}">{{$properties->title}}</a></h3>
                                    <span class="location"><img src="{{ asset('assets/images/icons/bed.png')}}" alt="">{{$properties->address}}</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">{{$properties->Price}}</span>
                                        <span class="type">For Sale</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
</script>
<script type="text/javascript" src="{{ asset('assets/js/infobox.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app/location.js') }}"></script>
@endsection
