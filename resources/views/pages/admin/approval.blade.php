@extends('layouts.app')

@section('content')
<div class="page-banner-section section">
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
</div>

<div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    @include('partials._message')
    <div class="container">
        <div class="row row-25">
           
            @include('pages.admin._sidebar')
            
            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    <div class="row">
                        <div class="property-item col-md-12 col-12 mb-40">
                            <a href = ""> <h3 class="mb-30">Pending for Approval</h3> </a>                           
                           
                            <table class="table table-bordered">                                
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Actions</th>
                                <tr>
                                    
                                    @foreach ($users as $user) 
                                    @if(empty($user->approved_at))
                                    
                               
                                    <td class="text-center">    
                                        <a href="" class="link">{{$user->firstname}}</a></td>
                                    <td class="text-center"> {{$user->lastname}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{$user->address}}</td>                                   
                                    <form action="{{route('admin.approve',$user->id)}}" method="POST"> 
                                        @csrf
                                        @method('PUT')  
                                    <td class="text-center">
                                      <button class="btn-success"onclick="return confirm('Are you sure you want to Approve &nbsp {{$user->firstname}} ?')">
                                         Pending...</button>                  
                                        @csrf                                        
                                    </td>
                                </tr>
                             </form>
                             @endif
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
