@extends('layouts.app')

@section('content')
{{-- <div class="page-banner-section section"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">My Account</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Account</li>
                </ul>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    @include('partials._message')
    <div class="container">
        <div class="row row-25">

            @include('pages.client._sidebar')
            
            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    <div id="properties-tab" class="tab-pane show active">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="mb-30">Properties</h3>
                            </div>
                            @if(count($properties) > 0)
                                @foreach($properties as $property)
                                <div class="property-item col-md-6 col-12 mb-40">
                                    <div class="property-inner">
                                        <div class="image">
                                            <a href="{{ route('client.display', $property->id) }}" target="_blank">
                                                @if($property->main_photo)
                                                    <img src="{{ asset('storage/'.$property->main_photo) }}">
                                                @else
                                                    <img src="{{ asset('assets/images/property/property-1.jpg') }}">
                                                @endif
                                            </a>
                                            {{-- <ul class="property-feature">
                                                <li>
                                                    <span class="area"><img src="{{ asset('assets/images/icons/area.png') }}" alt="">550 SqFt</span>
                                                </li>
                                                <li>
                                                    <span class="bed"><img src="{{ asset('assets/images/icons/bed.png') }}" alt="">6</span>
                                                </li>
                                                <li>
                                                    <span class="bath"><img src="{{ asset('assets/images/icons/bath.png') }}" alt="">4</span>
                                                </li>
                                                <li>
                                                    <span class="parking"><img src="{{ asset('assets/images/icons/parking.png') }}" alt="">3</span>
                                                </li>
                                            </ul> --}}
                                        </div>
                                        <div class="content">
                                            <div class="left">
                                                <h3 class="title">
                                                    <a href="{{ $property->id }}" target="_blank">{{ $property->title }}</a>
                                                </h3>
                                                @if($property->address)
                                                <span class="location">
                                                    <img src="{{ asset('assets/images/icons/marker.png') }}" alt="">{{ $property->address }}
                                                </span>
                                                @endif
                                            </div>
                                            <div class="right">
                                                <div class="type-wrap">
                                                    <span class="price">₱{{ $property->price ?? 0 }}
                                                        {{-- <span>{{ $property->period }}</span> --}}
                                                    </span>
                                                    <span class="type">
                                                        {{ $property->property_status }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- <div class="mt-4">
                                            <form action="{{ route('lister.properties.destroy', $property->id) }}" method="POST">
                                                 --}}
                                                
                                                
                                                {{-- lister/properties/{id}/edit --}}
                                                {{-- <a class="btn" style="text-decoration: none;" href="{{ route('lister.properties.edit',$property->id ) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn float-right" style="background: darkred" onclick="return confirm('Are you sure you want to Delete {{$property->title}}')">Delete</button>
                                            </form>
                                        </div> --}}
                                    </div>
                                </div>
                                @endforeach



                            @else
                                <div class="col-12">
                                    <p>You don't have any properties. <a class="btn" href="{{ route('lister.properties.create') }}">Start listing now!</a></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                

            
            <div class="row mt-20">
                <div class="col" style = "text-align:center;">
                    {{
                        $properties->appends([
                            'show' => request()->query('show'), 
                        ])->links()
                    }}
                </div>
            </div> 
            </div>

        </div>
    </div>
</div>
@endsection
