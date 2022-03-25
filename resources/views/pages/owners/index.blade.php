@extends('layouts.app')

@section('content')
<!--Page Banner Section start-->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Owners</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Owners</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Page Banner Section end-->

<!--Search Section section start-->
<div class="search-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <!--Section Title start-->
        <div class="row">
            <div class="col-md-12 mb-60 mb-xs-30">
                <div class="section-title center">
                    <h1>Find Your Owner</h1>
                </div>
            </div>
        </div>
        <!--Section Title end-->
        
        <div class="row">
            <div class="col-md-10">
                <div class="property-search">
                    <form action="#">
                        <div>
                            <input type="text" placeholder="Name" form="formSearch" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="property-search">
                    <form method="GET" action="#" id="formSearch">
                        <div>
                            <button type="submit">search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Search Section section end-->

<!--Agency Section start-->
<div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        
        <div class="row">

            <!--Agencies satrt-->
            <div class="col-lg-4 col-sm-6 col-12 mb-30">
                <div class="agency">
                    <div class="image">
                        <a class="img" href="agency-details.html"><img src="assets/images/agencies/agency-1.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="agency-details.html">Royao Estates</a></h4>
                        <span>6 Properties</span>
                    </div>
                </div>
            </div>
            <!--Agencies end-->

            <!--Agencies satrt-->
            <div class="col-lg-4 col-sm-6 col-12 mb-30">
                <div class="agency">
                    <div class="image">
                        <a class="img" href="agency-details.html"><img src="assets/images/agencies/agency-2.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="agency-details.html">Luzury Homes</a></h4>
                        <span>5 Properties</span>
                    </div>
                </div>
            </div>
            <!--Agencies end-->

            <!--Agencies satrt-->
            <div class="col-lg-4 col-sm-6 col-12 mb-30">
                <div class="agency">
                    <div class="image">
                        <a class="img" href="agency-details.html"><img src="assets/images/agencies/agency-3.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="agency-details.html">Duplex Estates</a></h4>
                        <span>6 Properties</span>
                    </div>
                </div>
            </div>
            <!--Agencies end-->

            <!--Agencies satrt-->
            <div class="col-lg-4 col-sm-6 col-12 mb-30">
                <div class="agency">
                    <div class="image">
                        <a class="img" href="agency-details.html"><img src="assets/images/agencies/agency-4.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="agency-details.html">Global Homes</a></h4>
                        <span>6 Properties</span>
                    </div>
                </div>
            </div>
            <!--Agencies end-->

            <!--Agencies satrt-->
            <div class="col-lg-4 col-sm-6 col-12 mb-30">
                <div class="agency">
                    <div class="image">
                        <a class="img" href="agency-details.html"><img src="assets/images/agencies/agency-5.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="agency-details.html">Green House Homes</a></h4>
                        <span>5 Properties</span>
                    </div>
                </div>
            </div>
            <!--Agencies end-->

            <!--Agencies satrt-->
            <div class="col-lg-4 col-sm-6 col-12 mb-30">
                <div class="agency">
                    <div class="image">
                        <a class="img" href="agency-details.html"><img src="assets/images/agencies/agency-6.jpg" alt=""></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="agency-details.html">Landscape Estates</a></h4>
                        <span>6 Properties</span>
                    </div>
                </div>
            </div>
            <!--Agencies end-->
            
        </div>
        
        <div class="row mt-20">
            <div class="col">
                <ul class="page-pagination">
                    <li><a href="#"><i class="fa fa-angle-left"></i> Prev</a></li>
                    <li class="active"><a href="#">01</a></li>
                    <li><a href="#">02</a></li>
                    <li><a href="#">03</a></li>
                    <li><a href="#">04</a></li>
                    <li><a href="#">05</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Next</a></li>
                </ul>
            </div>
        </div>
        
    </div>
</div>
<!--Agency Section end-->
@endsection
