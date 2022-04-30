<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use App\Models\Booking; 
use App\Models\User;
use Auth;
use Carbon\Carbon;


class BookingController extends Controller
{
    
    public function index()
    {   
        $user = Auth::user();  
        $userphone=$user->phone;
        $date = Carbon::now()->subDays(7);  

        Booking::where('reserved_at', '<=', $date)->where('owner_id', $user->id)->delete();         
        $bookings = Booking::with('cient')->with('property')->where('owner_id', $user->id)->orwhere('client_id', $user->id)->paginate(5);  

        return view('pages.lister.bookings', compact('bookings','userphone'));
    }      
   
    public function destroy($id)
    {
        $user = Auth::user(); 
        
        $property = Booking::where('id', $id)->where('owner_id', $user->id)->orwhere('client_id', $user->id)->firstOrFail()->delete();              
        return redirect()->back()->with('success', 'Your property has been successfully deleted.');
    }

    public function showClient($id)
    {
        $user = User::find($id);

        return view('pages.lister.bookings-client', compact('user'));
    }
}
