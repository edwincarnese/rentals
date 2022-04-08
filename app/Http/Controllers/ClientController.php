<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use Auth;
use Carbon\Carbon;


class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();  
        $userphone=$user->phone;
        $date = Carbon::now()->subDays(7);  

        Booking::where('reserved_at', '<=', $date)->where('client_id', $user->id)->delete();      
        $bookings = Booking::with('cient')->with('property')->where('client_id', $user->id)->paginate(15);
       
        return view('pages.client.bookings',compact('bookings','userphone'));       
    }

    public function show()
    {
        $user = Auth::user();

        $properties = Property::where('user_id', $user->id)->paginate(2);    

        return view('pages.client.show', compact('properties'));
    }

     public function stored (Request $request)
    {  
        $user = Auth::user();        
        $booking = new booking();         
        $booking->owner_id =$request->input('owners_id');  
        $booking->client_id = $user->id;
        $booking->property_id = $request->input('property_id');  
        $booking->reserved_at = $request->input('reserve_date');  
        $booking->save(); 

        return redirect('properties');   
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

    public function display($id)
    {
        $property = Property::where('id', $id)->firstOrFail();
        $featured_properties = Property::inRandomOrder()->limit(5)->get();
        $featured_owners = User::withCount('properties')->where('role', 2)->inRandomOrder()->limit(5)->get();

        return view('pages.client.display', 
            compact(
                'property',
                'featured_properties', 
                'featured_owners'
            )
        );
    }
    public function destroy($id)    
    {
        $user = Auth::user(); 
        $booking = Booking::where('id', $id)->where('client_id', $user->id)->firstOrFail()->delete();     
     
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }
}
