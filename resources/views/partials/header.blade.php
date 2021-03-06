<!--Header section start-->
<header class="header header-sticky">
    <div class="header-bottom menu-center">
        <div class="container">
            <div class="row justify-content-between">
                
                <!--Logo start-->
                <div class="col mt-10 mb-10">
                    <div class="logo">
                        <h5 class="font-weight-bold">BXU Property Finder</h5>
                        {{-- <a href="/"><img src="assets/images/logo.png" alt=""></a> --}}
                    </div>
                </div>
                <!--Logo end-->
                
                <!--Menu start-->
                <div class="col d-none d-lg-flex">
                    <nav class="main-menu">
                        <ul>
                            <li>
                                <a href="{{ route('pages.home') }}">Home</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('pages.about') }}">About</a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('pages.contact') }}">Contact</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('pages.owners.index') }}">Property Owners</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">Property Listings</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('pages.properties.index', ['status' => 'for-rent']) }}">For Rent</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.properties.index', ['status' => 'for-sale']) }}">For Sale</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.home', ['status' => 'apartment']) }}">Apartment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.home', ['status' => 'boarding-house']) }}">Boarding House</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.home', ['status' => 'for-sale-for-rent']) }}">For Sale / For Rent</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--Menu end-->
                
                <!--User start-->
                <div class="col mr-sm-50 mr-xs-50">
                    <div class="header-user">
                        @guest()
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('login') }}" class="user-toggle"><i class=""></i><span>Login</span></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('register', ['lister' => true]) }}" class="user-toggle"><i class=""></i><span>Submit Property</span></a>
                                </div>
                            </div>
                        @endguest
                        @auth()
                            @if(Auth::user()->role == 1)
                                <a href="{{ route('admin.approval.list') }}" class="user-toggle"><i class="pe-7s-user"></i><span>My Account</span></a>
                            @elseif(Auth::user()->role == 2)
                                <a href="{{ route('lister.profile') }}" class="user-toggle"><i class="pe-7s-user"></i><span>My Account</span></a>
                            @elseif(Auth::user()->role == 3)
                                <a href="{{ route('client.bookings') }}" class="user-toggle"><i class="pe-7s-user"></i><span>My Account</span></a>
                            @endif
                        @endauth
                    </div>
                </div>
                <!--User end-->
            </div>
            
            <!--Mobile Menu start-->
            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
            <!--Mobile Menu end-->
            
        </div>
    </div>
</header>
<!--Header section end-->