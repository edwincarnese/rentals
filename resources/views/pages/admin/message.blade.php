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
           
            @include('pages.admin._sidebar')
            
            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    <div class="row">
                        <div class="property-item col-md-12 col-12 mb-40">
                            <a href = ""> <h3 class="mb-30">Bookings</h3> </a>
                            
                           
                            <table class="table table-bordered">
                                 
                                <th class="text-center">Client ID</th>
                                <th class="text-center">Property ID</th>
                                <th class="text-center">Owner ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Messages</th>
                                <th class="text-center">Actions</th>
                                <tr>
                                    @foreach ($getmessages as $message) 
                                        <td class="text-center">
                                            {{-- <a href="" class="link">{{$booking->property->title}}</a> --}}
                                              <a href="{{ route('pages.properties.show', $message->id) }}" target="_blank" class="link">{{$message->client_id}}</a>
                                      
                                            {{-- <a href="{{ route('lister.properties.index', $booking->property_id) }}" >{{$booking->property->title}}</a> --}}
                                           
                                        
                                        </td>
                                        <td class="text-center">{{ $message->property_id }}</td>
                                        <td class="text-center">{{ $message->owner_id }}</td>
                                        <td class="text-center"> {{ $message->name }}
                                        </td>  
                                        <td class="text-center"> {{ $message->email }}
                                        </td>  
                                        <td class="text-center"> {{ $message->message }}
                                        </td> 
                                        <td class="text-center">
                                            <form action="admin/message/{{$message->id}}" method="POST">                                       
                                                @method('DELETE')
                                                {{-- <button class="btn-success mr-2">Book</button> --}}
                                                {{-- <button class="btn-danger">Delete</button> --}}
                                                <button class="btn-danger" onclick="return confirm('Are you sure you want to Delete {{$message->name}}')">  DELETE</button>                  
                                                @csrf    
                                            </form>                                    
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
