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
                <div class="agency-image">
                    <img src="{{ asset('assets/images/agencies/agency-1.jpg') }}" alt="">
                </div>
            </div>

            <!--Agency Content-->
            <div class="col-lg-7 col-12">
                <div class="agency-content">
                    <h3 class="title">Royao Estates</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, fugit. Quibusdam eveniet voluptate minima, est veritatis ea quod expedita facere harum tempore sapiente maxime recusandae quisquam cupiditate beatae nihil deserunt eum incidunt, porro rerum doloribus cum. Magnam quia voluptates quae?</p>
                    <ul>
                        <li><i class="pe-7s-map"></i>246, 2st AVE, Manchester 126 , Noth England</li>
                        <li><i class="pe-7s-phone"></i><a href="#">(756) 447 5744</a></li>
                        <li><i class="pe-7s-mail-open"></i><a href="#">info@example.com</a></li>
                        <li><i class="pe-7s-global"></i><a href="#">www.example.com</a></li>
                        <li><i class="pe-7s-credit"></i>AB7876A6</li>
                        <li><i class="pe-7s-users"></i>4 Agents</li>
                        <li><i class="pe-7s-photo"></i>6 Properties</li>
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

<!--Feature property section start-->
<div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="section-title center">
                    <h1>Royao Estates Properties</h1>
                </div>
            </div>
        </div>
        <!--Section Title end-->
        
        <div class="row">
           
            <!--Property Slider start-->
            <div class="property-carousel section">

                <!--Property start-->
                <div class="property-item col">
                    <div class="property-inner">
                        <div class="image">
                            <a href="single-properties.html"><img src="assets/images/property/property-1.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="single-properties.html"><img src="assets/images/property/property-2.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">Marvel de Villa</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$2550</span>
                                    <span class="type">For Sale</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">popular</span>
                            <a href="single-properties.html"><img src="assets/images/property/property-3.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">Ruposi Bangla Cottage</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt="">215 L AH Rod, California</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col">
                    <div class="property-inner">
                        <div class="image">
                            <a href="single-properties.html"><img src="assets/images/property/property-4.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">MayaKanon de Villa</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt="">12 EA 1st Ave, Washington</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col">
                    <div class="property-inner">
                        <div class="image">
                            <a href="single-properties.html"><img src="assets/images/property/property-5.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">Azorex de South Villa</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt="">668 L 2nd Ave, Boston</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$2550</span>
                                    <span class="type">For Sale</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

                <!--Property start-->
                <div class="property-item col">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="single-properties.html"><img src="assets/images/property/property-6.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">Radison de Villa</a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt="">12 1st Ave, New Yourk</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Property end-->

            </div>
            <!--Property Slider end-->
            
        </div>
        
    </div>
</div>
<!--Feature property section end-->
@endsection
