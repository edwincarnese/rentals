<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking; 
use App\Models\Property;
use Auth;

class BookingController extends Controller
{
    // public function index()
    // {
    //     return view('pages.lister.bookings');

    // }



    public function index()
    {   
        $user = Auth::user();  
        $user_id = $user->id;
        $username = $user->firstname;
        // $bookings = Booking:: all();
        $bookings = Booking::with('property')->where('owner_id', $user_id)->get();
        $property = Property::with('bookings')->get();
        // dd($property);                             
        return view('pages.lister.bookings',compact('bookings','property','username'));
    }
      

    
    
    // public function destroy1(Booking $id)
    // {
    //     $id->delete();
    //     return redirect('pages.lister.bookings');
    // }
    public function destroy($id)
    {
        $user = Auth::user(); 
        $property = Booking::where('id', $id)->where('owner_id', $user->id)->firstOrFail()->delete();      
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }
}
