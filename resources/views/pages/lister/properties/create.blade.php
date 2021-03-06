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
           
            @include('pages.lister._sidebar')
            
            <div class="col-lg-8 col-12">
                
                <div class="add-property-wrap col">
                    <h3 class="mb-30">New Property</h3>
                                
                    <ul class="add-property-tab-list nav mb-50">
                        <li class="working"><a href="#basic_info" data-toggle="tab">1. Property</a></li>
                        <li><a href="#image_video" data-toggle="tab">2. Images & Video</a></li>
                        <li><a href="#detailed_info" data-toggle="tab">3. Information</a></li>
                        <li><a href="#property_rooms" data-toggle="tab">4. Rooms</a></li>
                    </ul>

                    <form action="{{ route('lister.properties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="add-property-form tab-content">
                            <div class="tab-pane show active" id="basic_info">
                                <div class="tab-body">
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <label>Property Title</label>
                                            <input type="text" name="title">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Address</label>
                                            <input type="text" name="address">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Status</label>
                                            <select class="nice-select" name="status">
                                                <option value="1" seleted>For Rent</option>
                                                <option value="2">For Sale</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Period</label>
                                            <select class="nice-select" name="period">
                                                <option value="Daily">Daily</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly" selected>Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Type</label>
                                            <select class="nice-select" name="type">
                                                <option value="Apartment">Apartment</option>
                                                <option value="Boarding House">Boarding House</option>
                                                {{-- <option value="Cafe">Cafe</option> --}}
                                                {{-- <option value="Restaurant">Restaurant</option> --}}
                                                {{-- <option value="Store">Store</option> --}}
                                                {{-- <option value="Villa">Villa</option> --}}
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Price</label>
                                            <input type="text" name="price">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Area <span>(SqFt)</span></label>
                                            <input type="text" name="area">
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <a href="#image_video" data-toggle="tab" class="btn btn-block">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="tab-pane" id="image_video">
                                <div class="tab-body">
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <label>Images</label>
                                            <input type="file" name="images[]" accept="image/*" multiple>
                                        </div>

                                        <div class="col-12 mb-30">
                                            <label>Videos</label>
                                            <input type="file" name="videos[]" accept="video/*" multiple>
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <a href="#detailed_info" data-toggle="tab" class="btn btn-block">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="tab-pane" id="detailed_info">
                                <div class="tab-body">
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <label>Description</label>
                                            <textarea name="description"></textarea>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Bedrooms</label>
                                            <select class="nice-select" name="bedroom">
                                                <option value="0">0</option>
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Bathrooms</label>
                                            <select class="nice-select" name="bathroom">
                                                <option value="0">0</option>
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Kitchen</label>
                                            <select class="nice-select" name="kitchen">
                                                <option value="0">0</option>
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-30">
                                            <h4>Amenities</h4>
                                            <ul class="other-features">
                                                <li>
                                                    <input type="checkbox" id="air_condition" name="amenities[]" value="Air Conditioning">
                                                    <label for="air_condition">Air Conditioning</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="bedding" name="amenities[]" value="Bedding">
                                                    <label for="bedding">Bedding</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="balcony" name="amenities[]" value="Balcony">
                                                    <label for="balcony">Balcony</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="cable_tv" name="amenities[]" value="Cable TV">
                                                    <label for="cable_tv">Cable TV</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="internet" name="amenities[]" value="Internet">
                                                    <label for="internet">Internet</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="parking" name="amenities[]" value="Parking">
                                                    <label for="parking">Parking</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="lift" name="amenities[]" value="Lift">
                                                    <label for="lift">Lift</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="pool" name="amenities[]" value="Pool">
                                                    <label for="pool">Pool</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="dishwasher" name="amenities[]" value="Dishwasher">
                                                    <label for="dishwasher">Dishwasher</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="toaster" name="amenities[]" value="Toaster">
                                                    <label for="toaster">Toaster</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="gym" name="amenities[]" value="Gym">
                                                    <label for="gym">Gym</label>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-12">
                                            <h4>Map Information</h4>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <div id="single-property-map" class="embed-responsive-item google-map" data-lat="40.740178" data-Long="-74.190194"></div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <h4>Position</h4>
                                            <div class="row mt-20">
                                                <div class="col-lg-6 col-md-6 col-12 mb-30">
                                                    <label for="map_lan">Latitude</label>
                                                    <input type="text" id="map_lan" name="latitude" required>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 mb-30">
                                                    <label for="map_long">Longitude</label>
                                                    <input type="text" id="map_long" name="longitude" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <a href="#property_rooms" data-toggle="tab" class="btn btn-block">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="property_rooms">
                                <div class="tab-body">
                                    <div class="rooms"></div>
                                    <div class="row">
                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <button type="button" onclick="addRoom()" class="property-submit btn btn-block">Add Room</button>
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <button class="property-submit btn btn-block">Save Property</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let room_id = 0;

    function addRoom() {
        room_id++;

        $(".rooms").append(`<div class="row room-${room_id}">
            <div class="col-6 mb-30">
                <label>Room Name</label>
                <input name="room_name[]" type="text" required>
            </div>

            <div class="col-6 mb-30">
                <label>Room Number</label>
                <input name="room_number[]" type="text" required>
            </div>

            <div class="col-6 mb-30">
                <label>Room Price</label>
                <input name="room_price[]" type="text" required>
            </div>
            
            <div class="col-3 mb-30">
                <label>Room Capacity</label>
                <input name="room_capacity[]" type="text" required>
            </div>
            
            <div class="col-md-3 col-12 mb-30">
                <label>Status</label>
                <select class="nice-select" style="padding: 14px;" name="room_status[]">
                    <option value="1" seleted>Available</option>
                    <option value="2">Not Available</option>
                </select>
            </div>

            <div class="col-12 mb-30">
                <label>Images</label>
                <input type="file" name="room_images[]" accept="image/*">
            </div>
            
            <div class="col-12 mb-30">
                <button type="button" onclick="deleteRoom('room-${room_id}')" class="btn btn-danger float-right" style="background-color: red">Delete Room</button>
            </div>
        </div>`);
    }

    function deleteRoom(id)
    {
        $('.'+id).remove();
    }
</script>
@endsection