<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use App\Models\Room;
use Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $properties = Property::where('user_id', $user->id)->paginate(6);
        
      
        return view('pages.lister.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('pages.lister.properties.create');
    }    

    public function edit($id)
    {
        $user = Auth::user();       

        $property = Property::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        $rooms = Room::where('property_id', $property->id)->get();

        return view('pages.lister.properties.edit', compact('property','rooms'));
    }


    public function update(Request $request, $id)
    {
        $property = property::find($id);      
        $data = $request->all();

        if($request->amenities) {
            $data['amenities'] = json_encode($request->amenities);
        }

        if($request->images) {
            $images = $request->images;
            $uploaded_images = [];

            foreach($images as $key => $image) {
                $imageName = $key.time().'.'.$image->getClientOriginalExtension();  
                $image->storeAs('images', $imageName, 'public');

                $imagePath = 'images/'.$imageName;

                array_push($uploaded_images, $imagePath);
            }

            $data['images'] = json_encode($uploaded_images);
        }

        if($request->videos) {
            $videos = $request->videos;
            $uploaded_videos = [];

            foreach($videos as $key => $video) {
                $videoName = $key.time().'.'.$video->getClientOriginalExtension();  
                $video->storeAs('videos', $videoName, 'public');

                $videoPath = 'videos/'.$videoName;

                array_push($uploaded_videos, $videoPath);
            }

            $data['videos'] = json_encode($uploaded_videos);
        }
       
        $property->update($data);
        
        Room::where('property_id', $property->id)->delete();

        if(isset($data['room_name'])) {
            $total_rooms = count($data['room_name']);

            $room_index = 1;

            for($i = 0; $i < $total_rooms; $i++) {
                $room = new Room();

                if(isset($data['room_images'])) {
                    $room_image = $data['room_images'][$i];
                    $imageName = $room_index.time().'.'.$room_image->getClientOriginalExtension();  
                    $room_image->storeAs('images', $imageName, 'public');
                    $imagePath = 'images/'.$imageName;
                    $room->images = $imagePath;
                }
                
                $room->user_id = $property->user_id;
                $room->property_id = $property->id;
                $room->name = $data['room_name'][$i];
                $room->number = $data['room_number'][$i];
                $room->price = $data['room_price'][$i];
                $room->capacity = $data['room_capacity'][$i];
                $room->status = $data['room_status'][$i];
                $room->save();

                $room_index++;
            }
        }
        
        return redirect()->back()->with('success', 'Your property has been successfully updated.');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        if($request->amenities) {
            $data['amenities'] = json_encode($request->amenities);
        }

        if($request->images) {
            $images = $request->images;
            $uploaded_images = [];

            foreach($images as $key => $image) {
                $imageName = $key.time().'.'.$image->getClientOriginalExtension();  
                $image->storeAs('images', $imageName, 'public');

                $imagePath = 'images/'.$imageName;

                array_push($uploaded_images, $imagePath);
            }

            $data['images'] = json_encode($uploaded_images);
        }

        if($request->videos) {
            $videos = $request->videos;
            $uploaded_videos = [];

            foreach($videos as $key => $video) {
                $videoName = $key.time().'.'.$video->getClientOriginalExtension();  
                $video->storeAs('videos', $videoName, 'public');

                $videoPath = 'videos/'.$videoName;

                array_push($uploaded_videos, $videoPath);
            }

            $data['videos'] = json_encode($uploaded_videos);
        }

        if($user->approved_at) {
            $data['is_approved'] = 1;
        }

        $property = $user->properties()->create($data);

        if(isset($data['room_name'])) {
            $total_rooms = count($data['room_name']);

            $room_index = 1;

            for($i = 0; $i < $total_rooms; $i++) {
                $room = new Room();

                $imagePath = null;

                if(isset($data['room_images'])) {
                    $room_image = $data['room_images'][$i];
                    $imageName = $room_index.time().'.'.$room_image->getClientOriginalExtension();  
                    $room_image->storeAs('images', $imageName, 'public');
                    $imagePath = 'images/'.$imageName;
                }

                $room->user_id = $property->user_id;
                $room->property_id = $property->id;
                $room->name = $data['room_name'][$i];
                $room->number = $data['room_number'][$i];
                $room->price = $data['room_price'][$i];
                $room->capacity = $data['room_capacity'][$i];
                $room->status = $data['room_status'][$i];
                $room->images = $imagePath;
                $room->save();

                $room_index++;
            }
        }

        return redirect()->back()->with('success', 'Your property has been successfully created.');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $property = Property::where('id', $id)->where('user_id', $user->id)->firstOrFail()->delete();
        
        $booking = Booking::where('property_id', $id)->where('owner_id', $user->id)->orwhere('owner_id', $user->id)->firstOrFail()->delete();
               
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }
}
