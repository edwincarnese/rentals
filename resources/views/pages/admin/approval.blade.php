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
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Valid ID</th>
                                <th class="text-center">Date Registered</th>
                                <th class="text-center">Actions</th>
                                <tr>
                                    @foreach ($users as $user) 
                                        <td class="text-center">{{$user->firstname}} {{$user->lastname}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">
                                            @if($user->valid_id)
                                            <a href="{{ asset('storage/'.$user->valid_id) }}" target="_blank">
                                                <img src="{{ asset('storage/'.$user->valid_id) }}" height="50" class="text-center">
                                            </a>
                                            @endif
                                        </td>                                   
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('M. d, Y') }}
                                        </td>
                                        <td class="text-center">
                                            <button onclick="window.open('{{ route('admin.lister.approval', $user->id) }}', '_blank')" class="btn-primary btn-block mb-2">View Profile</button>
                                            <form action="{{route('admin.approve',$user->id)}}" method="POST"> 
                                                @csrf
                                                @method('PUT')  
                                                <button class="btn-success btn-block" onclick="return confirm('Are you sure you want to Approve &nbsp {{$user->firstname}} ?')">
                                                    Approve
                                                </button>   
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
