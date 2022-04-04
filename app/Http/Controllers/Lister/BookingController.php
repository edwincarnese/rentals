<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking; 
use App\Models\Property;
use Auth;
use Carbon\Carbon;


class BookingController extends Controller
{
    // public function index()
    // {
    //     return view('pages.lister.bookings');

    // }

    public function index()
    {   
        $user = Auth::user();  
        $userphone=$user->phone;
        $bookings = Booking::with('cient')->with('property')->where('client_id', $user->id)->get();     
        // dd($bookings);     
        return view('pages.lister.bookings', compact('bookings','userphone'));
    }  
   
    public function destroy($id)
    {
        $user = Auth::user(); 
        $property = Booking::where('id', $id)->where('owner_id', $user->id)->firstOrFail()->delete();      
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }
}
