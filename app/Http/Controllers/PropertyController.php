<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use App\Models\Message;
use Auth;
use Carbon\Carbon;

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

        $property = Property::where('id', $id)->where('is_approved', 1)->firstOrFail(); 
       
        $is_booked = false;
        
        if($user) {
            $is_booked = Booking::where('client_id', $user->id)->where('property_id', $property->id)->first();  
        }
            
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

        $current_date = Carbon::now();
         $get_message = Message::with('user')->with('property')->where('property_id', $id)->limit(10)->get();  
         $count_feedback= (count($get_message));
        
        return view('pages.properties.show', compact(
            'property',
            'featured_properties', 
            'featured_owners',
            'is_booked',
            'get_message',
            'count_feedback',
            'current_date',
            'user',
        ));
    }   

    public function stored (Request $request)
    {  
        $user = Auth::user();
        $user_role = $user->role;

        $booking = new booking();
        $booking->owner_id =$request->input('owners_id');  
        $booking->client_id = $user->id;
        $booking->property_id = $request->input('property_id');  
        $booking->reserved_at = $request->input('reserve_date');  
        $booking->save();  

        if ($user_role ==3)
        {
            return redirect('client/bookings'); 
        }
        elseif($user_role ==2)
        {           
            return redirect('lister/bookings');          
        }
        else
        {
            return redirect('admin/bookings');      
        }
       
    }

    public function display_bookings($id)
    {
        $user = Auth::user();    
        $bookings = Booking::where('id', $user->id)->firstOrFail();
      
        return view('owners', 
            compact('bookings'));
    }
       
}
