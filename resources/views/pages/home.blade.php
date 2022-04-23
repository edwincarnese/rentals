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
                @foreach($properties as $property)
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="/properties/{{ $property->id }}"> <span class="location">                                    
                                    @if($property->main_photo)
                                    <img src="{{ asset('storage/'.$property->main_photo) }}">
                                @else
                                    <img src="{{ asset('assets/images/property/property-1.jpg') }}">
                                @endif</a>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="/properties/{{ $property->id }}">{{$property->title}}</a></h3>
                                    <span class="location"> 
                                        <img src="{{ asset('assets/images/icons/bed.png')}}" alt="">{{$property->address}}</span>
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
                                <a href="/properties/{{$properties->id}}">
                                    @if($properties->main_photo)
                                        <img src="{{ asset('storage/'.$properties->main_photo) }}">
                                    @else
                                        <img src="{{ asset('assets/images/property/property-1.jpg') }}">
                                    @endif 
                                </a>                       
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="/properties/{{$properties->id}}">{{$properties->title}}</a></h3>
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

@endsection

@section('js')
<script>
let LocsA = [];
let USER_LATITUDE = null;
let USER_LONGITUDE = null;

if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    console.log("Geolocation is not supported by this browser.");
}
    
function showPosition(position) {
    console.log(position.coords.latitude);
    console.log(position.coords.longitude);

    USER_LATITUDE = position.coords.latitude;
    USER_LONGITUDE = position.coords.longitude;
}
</script>

<script>
if($('#hero-map').length) {
    $(function() {

        const locationData = {!! $properties !!};

        //         SJIT
        // 8.951097684123816
        // 125.54126008205894

        LocsA.push(
        {
            lat: 8.954303347528557,
            lon: 125.53336350757372,
            html: '<h3>I am here</h3>',
            icon: 'assets/images/icons/user.png',
            animation: google.maps.Animation.BOUNCE,
            type: 'circle',
            circle_options: {
                radius: 1000,
                fillColor: "#FFFFCC"
            },
        });

        for(let i = 0; i < locationData.length; i++) {
            const propertyStatus = locationData[i]['status'] == 1 ? 'For Rent' : 'For Sale';
            const propertyTitle = locationData[i]['title'];
            const propertyAddress = locationData[i]['address'];
            const propertyImage = 'storage/'+locationData[i]['main_photo'];

            LocsA.push(
                {
                    lat: locationData[i]['latitude'],
                    lon: locationData[i]['longitude'],
                    imageUrl: "${propertyImage}",
                    title: "${propertyTitle}",
                    address: "${propertyAddress}",
                    html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="/properties/'+locationData[i]['id']+'"><img src="'+propertyImage+'" height="250"></a>',
                            '<div class="content"><div class="left"><h3 class="title"><a href="/properties/'+locationData[i]['id']+'">'+locationData[i]['title']+'</a></h3><span class="location"><img src="/assets/images/icons/marker.png">'+locationData[i]['address']+'</span></div>',
                            '<div class="right"><div class="type-wrap"><span class="price">'+locationData[i]['price']+'<span>M</span></span><span class="type">'+propertyStatus+'</span></div></div></div></div></div>',
                        ].join(''),
                    icon: 'assets/images/icons/map-marker-2.png',
                    animation: google.maps.Animation.BOUNCE
                },
            );
        }

    var mapPlace = new Maplace({
            map_div: '#hero-map',
            controls_div: '.map-property-controls',
            controls_on_map: false,
            controls_type: 'list',
            controls_cssclass: 'map-property-slider',
            view_all: false,
            locations: LocsA,
            map_options: {
                zoom: 13,
                scrollwheel: false,
                stopover: true
            },
            start: 1,
            shared: {
                zoom: 16,
                html: '%index'
            },
            circleRadiusChanged: function(index, point, marker) {
            }
        }).Load();

        mapPlace.AddLocations(LocsA);
    });
}
</script>

@endsection
