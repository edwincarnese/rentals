<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Message;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Mail\BookingMail;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $address = $request->address;
        $bathroom = $request->bathroom;
        $bedroom = $request->bedroom;
        $type = $request->type;
        $status = $request->status;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $distance = $request->distance;
        $user_latitude = $request->latitude;
        $user_longitude = $request->longitude;

        if($distance && $user_latitude && $user_longitude) {
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
                ->when($min_price && $max_price, function($q) use($min_price, $max_price) {
                    $q->whereBetween('price', [(int)$min_price, (int)$max_price]);
                })
                ->when($status, function($q) use($status) {
                    if($status == 'for-rent') {
                        $q->where('status', 1);
                    } else {
                        $q->where('status', 2);
                    }
                })
                ->selectRaw("
                    id,user_id,title,description,price,address,status,period,type,area,bedroom,bathroom,kitchen,images,videos,amenities,latitude,longitude,availability_at,is_approved,created_at,updated_at,ratings,ratings_count,
                    ( FLOOR(6371 * ACOS( COS( RADIANS( ".$user_latitude." ) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) - RADIANS( ".$user_longitude." ) ) + SIN( RADIANS( ".$user_latitude." ) ) * SIN( RADIANS( latitude ) ) )) ) distance")
                ->havingRaw("distance <= " . $distance)
                ->where('is_approved', 1)
                ->latest()
                ->paginate(10);
        } 
        else {
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
                ->when($min_price && $max_price, function($q) use($min_price, $max_price) {
                    $q->whereBetween('price', [(int)$min_price, (int)$max_price]);
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
        }

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
        $properties = Property::where('id', $id)->where('is_approved', 1)->get(); 
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

        $rooms = Room::where('property_id', $id)->get();
        
        return view('pages.properties.show', compact(
            'property',
            'featured_properties', 
            'featured_owners',
            'is_booked',
            'get_message',
            'count_feedback',
            'current_date',
            'user',
            'properties',
            'rooms',
        ));
    }   

    public function stored (Request $request)
    {  
        $user = Auth::user();
        $user_role = $user->role;

        $owner = User::find($request->input('owners_id'));
        $property = Property::find($request->input('property_id'));
        $room = Room::where('property_id', $property->id)->first();

        $booking = new booking();
        $booking->owner_id = $request->input('owners_id');  
        $booking->client_id = $user->id;
        $booking->room_id = $room->id ?? null;
        $booking->property_id = $request->input('property_id');  
        $booking->reserved_at = date("Y-m-d h:i:s", strtotime($request->input('reserve_date')));
        $booking->save();  

        $booking_info = array(
            'full_name' => Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'reserverd_at' => $booking->reserved_at,
            'property' => $property->title,
            'room' => $room->name ?? 'N/A',
            'price' => $room->price ?? $property->price,
            'type' => $property->type,
        );

        Mail::to($owner->email)->send(new BookingMail($booking_info));

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
 
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return 'Success';
        }

        return 'Failed';
    }

    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {
            return 'Email';
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 3,
            'phone' => $request->phone,
        ]);

        Auth::loginUsingId($user->id);

        return 'Success';
    }
}
