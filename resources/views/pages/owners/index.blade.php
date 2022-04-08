@extends('layouts.app')

@section('content')
<!--Page Banner Section start-->
{{-- <div class="page-banner-section section"> --}}
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
{{-- </div> --}}
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
                    <form>                            
                        <div>
                            <input type="text" name="search" placeholder="Search Company" form="formSearch" value = "{{ Request::get('search') }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="property-search">
                    <form method="GET" action="{{ route('pages.owners.index') }}" id="formSearch">
                        <div>
                            <button type="submit">search</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

        <div class="agency-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
        
            <div class="row">
                @foreach ($owners as $owner)
                <div class="col-lg-4 col-sm-6 col-12 mb-30">
                    <div class="agency">
                        <div class="image">
                            <a class="img" href="{{ route('pages.owners.show',$owner->id) }}">
                                <img src="{{asset('storage/'.$owner->logo)}}">
                            </a>
                        </div> 
                        <div class="content">
                            <h4 class="title"><a href="agency-details.html">{{$owner->company}}</a></h4>
                            <span>{{$owner->properties_count}} Properties</span>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
            {{-- {{ $Users->links() }}       --}}
            
            {{-- <div class="row mt-20">
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
            </div> --}}
        
            </div>
        </div> 
@endsection
