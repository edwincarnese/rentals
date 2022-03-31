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

        $properties = Property::where('user_id', $user->id)->paginate(2);
        // $user = User::withCount('properties')-> where('id', $id)->firstOrFail();          
        //     $properties = Property::where('user_id', $id)->paginate(3);

        return view('pages.lister.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('pages.lister.properties.create');
    }

    // public function edit($id)
    // {
    //     $user = Auth::user();       

    //     $property = Property::where('id', $id)->where('user', $user->id)->firstOrFail();

    //     return view('pages.lister.properties.edit', compact('property'));
    // }

    public function edit($id)
    {
        $user = Auth::user();       

        $property = Property::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        return view('pages.lister.properties.edit', compact('property'));
    }


    public function update(Request $request, $id)
    {
        $property = property::find($id);
        //  dd($property);
        $property->	title = $request->input('title');
        $property->description = $request->input('description');
        $property->price = $request->input('price');
        $property->address = $request->input('address');
        $property->status = $request->input('status');
        $property->period = $request->input('period');
        $property->type = $request->input('type');
        $property->area = $request->input('area');
        $property->bedroom = $request->input('bedroom');
        $property->bathroom = $request->input('bathroom');
        $property->kitchen = $request->input('kitchen');
        $property->images = $request->input('images');
        $property->videos = $request->input('videos');
        $property->amenities = $request->input('amenities');
        $property->latitude = $request->input('latitude');
        $property->longitude = $request->input('longitude');
        $property->availability_at = $request->input('availability_at');
      
      
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
       
        //$user->properties()->create($data);
        $property->update($data);
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
