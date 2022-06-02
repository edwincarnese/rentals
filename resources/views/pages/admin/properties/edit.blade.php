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
                
                <div class="add-property-wrap col">
                    <h3 class="mb-30">Edit Property</h3>
                                
                    <ul class="add-property-tab-list nav mb-50">
                        <li class="working"><a href="#basic_info" data-toggle="tab">1. Property</a></li>
                        <li><a href="#image_video" data-toggle="tab">2. Images & Video</a></li>
                        <li><a href="#detailed_info" data-toggle="tab">3. Information</a></li>
                        <li><a href="#property_rooms" data-toggle="tab">4. Rooms</a></li>
                    </ul>

                    <form action="{{ route('admin.properties.update',$property->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="add-property-form tab-content">
                            <div class="tab-pane show active" id="basic_info">
                                <div class="tab-body">
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <label>Property Title</label>
                                            <input type="text" name="title" value = "{{$property->title}}">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <label>Address</label>
                                            <input type="text" name="address" value = "{{$property->address}}">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Status</label>
                                            <select class="nice-select" name="status">
                                                <option value="1"@if($property->status == "1") selected @endif >For Rent</option>
                                                <option value="2"@if($property->status == "2") selected @endif>For Sale</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Period</label>
                                            <select class="nice-select" name="period">
                                                <option value="Daily"@if($property->period == "Daily") selected @endif >Daily</option>
                                                <option value="Weekly" @if($property->period == "Weekly") selected @endif >Weekly</option>
                                                {{-- <option value="Monthly" selected>Monthly</option> --}}
                                                <option value="Monthly" @if($property->period == "Monthly") selected @endif>Monthly</option>
                                                <option value="Yearly" @if($property->period == "Yearly") selected @endif >Yearly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Availability</label>
                                            <select class="nice-select" name="availability_at">
                                                <option value="1"@if($property->availability_at == "1") selected @endif>Yes</option>
                                                <option value="0" @if($property->availability_at == "0") selected @endif>No</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Type</label>
                                            <select class="nice-select" name="type">
                                                <option value="Apartment" @if($property->type == "Apartment") selected @endif>Apartment</option>
                                                <option value="Boarding House" @if($property->type == "Boarding House") selected @endif>Boarding House</option>
                                                {{-- <option value="Cafe" @if($property->type == "Cafe") selected @endif>Cafe</option> --}}
                                                {{-- <option value="Restaurant" @if($property->type == "Restaurant") selected @endif>Restaurant</option>
                                                <option value="Store"@if($property->type == "Store") selected @endif>Store</option>
                                                <option value="Villa"@if($property->type == "Villa") selected @endif>Villa</option> --}}
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Price</label>
                                            <input type="text" name="price" value=  "{{$property->price}}">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Area <span>(SqFt)</span></label>
                                            <input type="text" name="area" value = "{{$property->area}}">
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
                                            <textarea name="description">{{$property->description}}</textarea>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Bedrooms</label>
                                            <select class="nice-select" name="bedroom">
                                                <option value="1" @if($property->bedroom == 1) selected @endif>1</option>
                                                <option value="2" @if($property->bedroom == 2) selected @endif>2</option>
                                                <option value="3" @if($property->bedroom == 3) selected @endif>3</option>
                                                <option value="4" @if($property->bedroom == 4) selected @endif>4</option>
                                                <option value="5" @if($property->bedroom == 5) selected @endif>5</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Bathrooms</label>
                                            <select class="nice-select" name="bathroom">
                                                <option value="1" @if($property->bathroom == 1) selected @endif>1</option>
                                                <option value="2" @if($property->bathroom == 2) selected @endif>2</option>
                                                <option value="3" @if($property->bathroom == 3) selected @endif>3</option>
                                                <option value="4" @if($property->bathroom == 4) selected @endif>4</option>
                                                <option value="5" @if($property->bathroom == 5) selected @endif>5</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Kitchen</label>
                                            <select class="nice-select" name="kitchen">
                                                <option value="1" @if($property->kitchen == 1) selected @endif>1</option>
                                                <option value="2" @if($property->kitchen == 2) selected @endif>2</option>
                                                <option value="3" @if($property->kitchen == 3) selected @endif>3</option>
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
                                                    <input type="text" id="map_lan" name="latitude" value="{{$property->latitude}}" required>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 mb-30">
                                                    <label for="map_long">Longitude</label>
                                                    <input type="text" id="map_long" name="longitude" value="{{$property->longitude}}" required>
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
                                    <div class="rooms">
                                        @foreach($rooms as $room)
                                            <div class="row room-{{ $room->id }}-">
                                                <div class="col-6 mb-30">
                                                    <label>Room Name</label>
                                                    <input name="room_name[]" value="{{ $room->name }}" type="text" required>
                                                </div>
                                    
                                                <div class="col-6 mb-30">
                                                    <label>Room Number</label>
                                                    <input name="room_number[]" value="{{ $room->number }}" type="text" required>
                                                </div>
                                    
                                                <div class="col-6 mb-30">
                                                    <label>Room Price</label>
                                                    <input name="room_price[]" value="{{ $room->price }}" type="text" required>
                                                </div>
                                                
                                                <div class="col-3 mb-30">
                                                    <label>Room Capacity</label>
                                                    <input name="room_capacity[]" value="{{ $room->capacity }}" type="text" required>
                                                </div>
                                                
                                                <div class="col-md-3 col-12 mb-30">
                                                    <label>Status</label>
                                                    <select class="nice-select" style="padding: 14px;" name="room_status[]">
                                                        <option value="1" @if($room->status == 1) selected @endif>Available</option>
                                                        <option value="2" @if($room->status == 0) selected @endif>Not Available</option>
                                                    </select>
                                                </div>
                                    
                                                <div class="col-12 mb-30">
                                                    <label>Images</label>
                                                    <input type="file" name="room_images[]" accept="image/*">
                                                </div>
                                                
                                                <div class="col-12 mb-30">
                                                    <button type="button" onclick="deleteRoom('room-{{ $room->id }}-')" class="btn btn-danger float-right" style="background-color: red">Delete Room</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <button type="button" onclick="addRoom()" class="property-submit btn btn-block">Add Room</button>
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <button class="property-submit btn btn-block">Update Property</button>
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