<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use Auth;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $address = $request->address;
        $bathroom = $request->bathroom;
        $bedroom = $request->bedroom;
        $type = $request->type;
        $status = $request->status;

        $properties = Property::query()
            ->when($address, function($q) use($address) {
                $q->where('address', 'LIKE', '%'.$address.'%');
            })
            ->when($bathroom, function($q) use($bathroom) {
                $q->where('bathroom', $bathroom);
            })
            ->when($bedroom, function($q) use($bedroom) {
                $q->where('bedroom', $bedroom);
            })
            ->when($type, function($q) use($type) {
                $q->where('type', $type);
            })
            ->when($status, function($q) use($status) {
                if($status == 'for-rent') {
                    $q->where('status', 1);
                } else {
                    $q->where('status', 2);
                }
            })
            ->where('is_approved', 1)
            ->latest()
            ->paginate(10);

        $featured_properties = Property::query()
            ->where('is_approved', 1)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $featured_owners = User::query()
            ->withCount('properties')
            ->where('role', 2)
            ->whereNotNull('approved_at')
            ->inRandomOrder()
            ->limit(5)
            ->get();

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

        $user = Auth::user(); 
        if($user == null)
        {
            $user =1;
            $userID = $user;
            $property = Property::where('id', $id)->where('is_approved', 1)->firstOrFail();
            $getProperty_id = $property->id;
            $booking = Booking::where('client_id', $userID)->where('property_id', $id)->count();      
        }
        else
        {                  
            $userID = $user->id;
            $property = Property::where('id', $id)->where('is_approved', 1)->firstOrFail();
            $getProperty_id = $property->id;
            $booking = Booking::where('client_id', $userID)->where('property_id', $id)->count();      
                
        }
        // dd($booking);
        //check if any subscription plan exists
        if($booking ==0)
        {  
                   
            $featured_properties = Property::query()
                ->inRandomOrder()
                ->limit(5)
                ->get();

            $featured_owners = User::query()
                ->withCount('properties')
                ->where('role', 2)
                ->whereNotNull('approved_at')
                ->inRandomOrder()
                ->limit(5)
                ->get();

            return view('pages.properties.show', 
                compact(
                    'property',
                    'featured_properties', 
                    'featured_owners',
                    'booking'
                )
            );
         
        }
        else
        {        
            
            $featured_properties = Property::query()
                ->inRandomOrder()
                ->limit(5)
                ->get();

            $featured_owners = User::query()
                ->withCount('properties')
                ->where('role', 2)
                ->whereNotNull('approved_at')
                ->inRandomOrder()
                ->limit(5)
                ->get();

            return view('pages.properties.show', 
                compact(
                    'property',
                    'featured_properties', 
                    'featured_owners',
                    'booking'
                )
                );
        }
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
        return redirect('lister/bookings');   


        // $user = Auth::user();

        // $property = Property::where('id', $id)->where('user_id', $user->id)->firstOrFail()->delete();
        // $p_id = $property->id;       
        // $booking = Booking::where('property_id', $p_id)->where('owner_id', $user->id)->firstOrFail()->delete();
        // // dd($p_id);       
        //  return redirect()->back()->with('success', 'Your property has been successfully deleted.');




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
