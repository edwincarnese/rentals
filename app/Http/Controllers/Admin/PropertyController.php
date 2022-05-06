<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(6);
      
        return view('pages.admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('pages.admin.properties.create');
    }    

    public function edit($id)
    {
        $property = Property::where('id', $id)->firstOrFail();

        return view('pages.admin.properties.edit', compact('property'));
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
        
        return redirect()->back()->with('success', 'Your property has been successfully updated.');
    }

    public function destroy($id)
    {
        $property = Property::where('id', $id)->firstOrFail()->first();
        
        $booking = Booking::where('property_id', $id)->where('owner_id', $property->user_id)->orwhere('owner_id', $property->user_id)->first();
        if($booking) {
            $booking->delete();
        }

        if($property) {
            $property->delete();
        }
                
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }
}
