@extends('layouts.app')

@section('content')
 <!--Page Banner Section start-->
 {{-- <div class="page-banner-section section"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">About us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">About us</li>
                </ul>
            </div>
        </div>
    </div>
{{-- </div> --}}
<!--Page Banner Section end-->

<div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
    <div class="container">
        <div class="row row-25 align-items-center">
           
            <!--Feature Image start-->
            <div class="col-lg-5 col-12 order-1 order-lg-2 mb-40">
                <div class="feature-image"><img src="{{ asset('assets/images/image.jpeg') }}" alt=""></div>
            </div>
            <!--Feature Image end-->
            
            <div class="col-lg-7 col-12 order-2 order-lg-1 mb-40">
                
                <div class="row">
                    <div class="col">
                        <div class="about-content">
                            {{-- <h3>Welcome to <span>Khonike</span></h3> --}}
                            <h1>We Always Provide Priority to Our Customer</h1>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            
                            <ul class="feature-list">
                                <li>
                                    <i class="pe-7s-piggy"></i>
                                    <h4>Low Cost</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-display1"></i>
                                    <h4>Good Marketing</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-map"></i>
                                    <h4>Easy to Find</h4>
                                </li>
                                <li>
                                    <i class="pe-7s-shield"></i>
                                    <h4>Reliable</h4>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>

<!--Funfact Section start-->
<div class="funfact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            
            <!--Funfact start-->
            <div class="single-fact col-lg-3 col-6 mb-30">
                <div class="inner">
                    <div class="head">
                        <i class="pe-7s-home"></i>
                        <h3 class="counter">15</h3>
                    </div>
                    <p>Properties</p>
                </div>
            </div>
            <!--Funfact end-->
            
            <!--Funfact start-->
            <div class="single-fact col-lg-3 col-6 mb-30">
                <div class="inner">
                    <div class="head">
                        <i class="pe-7s-graph3"></i>
                        <h3 class="counter">3</h3>
                    </div>
                    <p>Property Sold</p>
                </div>
            </div>
            <!--Funfact end-->
            
            <!--Funfact start-->
            <div class="single-fact col-lg-3 col-6 mb-30">
                <div class="inner">
                    <div class="head">
                        <i class="pe-7s-users"></i>
                        <h3 class="counter">8</h3>
                    </div>
                    <p>Happy Clients</p>
                </div>
            </div>
            <!--Funfact end-->
            
            <!--Funfact start-->
            <div class="single-fact col-lg-3 col-6 mb-30">
                <div class="inner">
                    <div class="head">
                        <i class="pe-7s-medal"></i>
                        <h3 class="counter">3</h3>
                    </div>
                    <p>Awards Win</p>
                </div>
            </div>
            <!--Funfact end-->
            
        </div>
    </div>
</div>
<!--Funfact Section end-->

<!--Testimonial Section start-->
<div class="testimonial-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
       
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="text-center">
                    <h1>What Client's Say</h1>
                </div>
            </div>
        </div>
        <!--Section Title end-->
        
        <div class="row">
           
            <!--Review start-->
            <div class="review-slider section">
                
                <div class="review col">
                    <div class="review-inner">
                        <div class="image"><img src="assets/images/review/review-1.jpg" alt=""></div>
                        <div class="content">
                            <p>Definitely worth the investment.</p>
                            <h6>John Carlson - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col">
                    <div class="review-inner">
                        <div class="image"><img src="assets/images/review/review-2.jpg" alt=""></div>
                        <div class="content">
                            <p>No matter where you go, for rent is the coolest, most happening thing around!</p>
                            <h6>Virginia Henry - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col">
                    <div class="review-inner">
                        <div class="image"><img src="assets/images/review/review-3.jpg" alt=""></div>
                        <div class="content">
                            <p>I will refer everyone I know.</p>
                            <h6>Emma Romero - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col">
                    <div class="review-inner">
                        <div class="image"><img src="assets/images/review/review-4.jpg" alt=""></div>
                        <div class="content">
                            <p>It's just amazing. Buy property is the most valuable business resource we have EVER purchased. You've saved our business!</p>
                            <h6>Russell Ortiz - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col">
                    <div class="review-inner">
                        <div class="image"><img src="assets/images/review/review-5.jpg" alt=""></div>
                        <div class="content">
                            <p>I will let my mum know about this, she could really make use of great website!</p>
                            <h6>Carol Palmer - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
                <div class="review col">
                    <div class="review-inner">
                        <div class="image"><img src="assets/images/review/review-6.jpg" alt=""></div>
                        <div class="content">
                            <p>I will let my mum know about this, she could really make use of i will refer! I would also like to say thank you to all your staff. It's all good.</p>
                            <h6>David Herrera - <span>CEO</span></h6>
                        </div>
                    </div>
                </div>
                
            </div>
            <!--Review end-->
            
        </div>
    </div>
</div>
<!--Testimonial Section end-->

<!--Brand section start-->
<div class="brand-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
       
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="text-center">
                    <h1>Our Partners</h1>
                </div>
            </div>
        </div>
        <!--Section Title end-->
        
        <div class="row">
            
            <!--Brand Slider start-->
            <div class="brand-carousel section">
                <div class="brand col"><img src="assets/images/brands/brand-1.png" alt=""></div>
                <div class="brand col"><img src="assets/images/brands/brand-2.png" alt=""></div>
                <div class="brand col"><img src="assets/images/brands/brand-3.png" alt=""></div>
                <div class="brand col"><img src="assets/images/brands/brand-4.png" alt=""></div>
                <div class="brand col"><img src="assets/images/brands/brand-5.png" alt=""></div>
                <div class="brand col"><img src="assets/images/brands/brand-6.png" alt=""></div>
            </div>
            <!--Brand Slider end-->
            
        </div>
        
    </div>
</div>
<!--Brand section end-->
@endsection
