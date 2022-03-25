<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $properties = Property::where('user_id', $user->id)->get();

        return view('pages.lister.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('pages.lister.properties.create');
    }

    public function edit($id)
    {
        $user = Auth::user();

        $property = Propery::where('id', $id)->where('user', $user->id)->firstOrFail();

        return view('pages.lister.properties.edit', compact('property'));
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

        $user->properties()->create($data);

        return redirect()->back()->with('success', 'Your property has been successfully created.');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $property = Property::where('id', $id)->where('user_id', $user->id)->firstOrFail()->delete();
        
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }
}
