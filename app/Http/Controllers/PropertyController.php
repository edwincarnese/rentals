<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(3);
        $featured_properties = Property::inRandomOrder()->limit(5)->get();
        $featured_owners = User::withCount('properties')->where('role', 2)->inRandomOrder()->limit(5)->get();

        return view('pages.properties.index', 
            compact(
                'properties', 
                'featured_properties', 
                'featured_owners'
            )
        );
    }

    public function show($id)
    {
        $property = Property::where('id', $id)->firstOrFail();
        $featured_properties = Property::inRandomOrder()->limit(5)->get();
        $featured_owners = User::withCount('properties')->where('role', 2)->inRandomOrder()->limit(5)->get();

        return view('pages.properties.show', 
            compact(
                'property',
                'featured_properties', 
                'featured_owners'
            )
        );
    }

     public function stored (Request $request)
    {         
        // dd($request);
      //  $user = $request->user_id;
      $user = Auth::user();        
        $booking = new booking();         
        $booking->owner_id =$request->input('owners_id');  
        $booking->client_id = $user->id;
        $booking->property_id = $request->input('property_id');  
        $booking->reserved_at = $request->input('reserve_date');  
        $booking->save();         
        return redirect('properties');   
    }

    public function display_bookings($id)
    {
        $user = Auth::user();    
        $bookings = Booking::where('id', $user->id)->firstOrFail();
        
        // $featured_properties = Property::inRandomOrder()->limit(5)->get();
        // $featured_owners = User::withCount('properties')->where('role', 2)->inRandomOrder()->limit(5)->get();

        return view('owners', 
            compact('bookings'));
    }
       
}
