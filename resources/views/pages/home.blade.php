@extends('layouts.app')

@section('content')
<!--Hero Section start-->
<div class="hero-section section position-relative"> 
    <!--Hero Map-->
    <div id="hero-map"></div>

    <!--Hero Map Property Controler-->
    {{-- <div class="map-property-controls"></div> --}}
</div>
<!--Hero Section end-->

<!--CTA Section start-->
<div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/bg/cta-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col">
                <!--CTA start-->
                <div class="cta-content text-center">
                    <h1>Want to <span>Buy</span> New Property or <span>Sell</span> One <br> Do it in Seconds With <span>Khonike</span></h1>
                    <div class="buttons">
                        <a href="add-properties.html">Add Property</a>
                        <a href="properties.html">Browse Properties</a>
                    </div>
                </div>
                <!--CTA end-->
            </div>
        </div>
    </div>
</div>
<!--CTA Section end-->
@endsection

@section('js')
<script>
if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    console.log("Geolocation is not supported by this browser.");
}
    
function showPosition(position) {
    console.log(position.coords.latitude);
    console.log(position.coords.longitude);
}
</script>

<script>
if($('#hero-map').length) {
    $(function() {

        const locationData = {!! $properties !!};

        let LocsA = [];

        for(let i = 0; i < locationData.length; i++) {
            console.log(locationData[i]['title']);
            console.log(locationData[i]['address']);
            
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
        }).Load();

        mapPlace.AddLocations(LocsA);
    });
}
</script>
@endsection