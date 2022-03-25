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
        
        var LocsA = [
            {
                lat: 7.0483968,
                lon: 125.5964672,
                imageUrl: 'assets/images/property/property-1.jpg',
                title: 'Friuli-Venezia Giulia',
                address: '568 E 1st Ave, Miami',
                html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-1.jpg" alt=""></a>',
                        '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                        '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                        '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                        '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                        '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span></div>',
                        '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                    ].join(''),
                icon: 'assets/images/icons/map-marker-2.png',
                animation: google.maps.Animation.BOUNCE
            },
        ];

        

        var tester = [
        {
            lat: 40.740178,
            lon: -74.190194,
            imageUrl: 'assets/images/property/property-1.jpg',
            title: 'Friuli-Venezia Giulia',
            address: '568 E 1st Ave, Miami',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-1.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.733617,
            lon: -74.171150,
            imageUrl: 'assets/images/property/property-2.jpg',
            title: 'Marvel de Villa',
            address: '450 E 1st Ave, New Jersey',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-2.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Marvel de Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.743011,
            lon: -74.247100,
            title: 'Ruposi Bangla Cottage',
            imageUrl: 'assets/images/property/property-3.jpg',
            address: '215 L AH Rod, California',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-3.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Ruposi Bangla Cottage</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">215 L AH Rod, California</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.711150,
            lon: -74.214998,
            title: 'MayaKanon de Villa',
            imageUrl: 'assets/images/property/property-4.jpg',
            address: '12 EA 1st Ave, Washington',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-4.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">MayaKanon de Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">12 EA 1st Ave, Washington</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.690010,
            lon: -74.151753,
            title: '668 L 2nd Ave, Boston',
            imageUrl: 'assets/images/property/property-5.jpg',
            address: '568 E 1st Ave, Miami',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-5.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Azorex de South Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">668 L 2nd Ave, Boston</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.697590,
            lon: -74.263164,
            title: 'Radison de Villa',
            imageUrl: 'assets/images/property/property-6.jpg',
            address: '12 1st Ave, New Yourk',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-6.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Radison de Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">12 1st Ave, New Yourk</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.729979,
            lon: -74.271992,
            title: 'Marvel de Villa',
            imageUrl: 'assets/images/property/property-7.jpg',
            address: '450 E 1st Ave, New Jersey',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-7.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Marvel de Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.749702,
            lon: -74.163631,
            title: 'MayaKanon de Villa',
            imageUrl: 'assets/images/property/property-8.jpg',
            address: '12 EA 1st Ave, Washington',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-8.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">MayaKanon de Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">12 EA 1st Ave, Washington</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.718971,
            lon: -74.323219,
            title: 'Azorex de South Villa',
            imageUrl: 'assets/images/property/property-9.jpg',
            address: '668 L 2nd Ave, Boston',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-9.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Azorex de South Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">668 L 2nd Ave, Boston</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        },
        {
            lat: 40.748350,
            lon: -74.323219,
            title: 'Radison de Villa',
            imageUrl: 'assets/images/property/property-10.jpg',
            address: '12 1st Ave, New Yourk',
            html: ['<div class="property-item map-property-item"><div class="property-inner"><div class="image"><a href="single-properties.html"><img src="assets/images/property/property-10.jpg" alt=""></a>',
                    '<ul class="property-feature"><li><span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span></li>',
                    '<li><span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span></li>',
                    '<li><span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span></li>',
                    '<li><span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span></li></ul></div>',
                    '<div class="content"><div class="left"><h3 class="title"><a href="single-properties.html">Radison de Villa</a></h3><span class="location"><img src="assets/images/icons/marker.png" alt="">12 1st Ave, New Yourk</span></div>',
                    '<div class="right"><div class="type-wrap"><span class="price">$550<span>M</span></span><span class="type">For Rent</span></div></div></div></div></div>',
                ].join(''),
            icon: 'assets/images/icons/map-marker-2.png',
            animation: google.maps.Animation.BOUNCE
        }


    ];

    var mapPlace = new Maplace({
            map_div: '#hero-map',
            controls_div: '.map-property-controls',
            controls_on_map: false,
            controls_type: 'list',
            controls_cssclass: 'map-property-slider',
            view_all: false,
            locations: tester,
            map_options: {
                zoom: 13,
                scrollwheel: false,
                stopover: true
            },
        }).Load();

        mapPlace.AddLocations(tester);
    });
}
</script>
@endsection