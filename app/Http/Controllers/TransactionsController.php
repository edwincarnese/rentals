<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use App\Models\Transaction;
use Auth;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    //
    public function index($id)
    {   
        $user = Auth::user();  
        $bookings = Booking::query()
            -> where('id',$id)
            ->with('cient')
            ->with('booking')
            ->with('property')
            ->orwhere('owner_id', $user->id)
            ->orwhere('client_id', $user->id)->firstOrFail();  
        return view('pages.lister.approve', compact('bookings','user'));    
           
    }  

    public function show()
    {   
        $user = Auth::user();
        $userphone=$user->phone;
        // $date = Carbon::now()->subDays(30);         
        // transaction::where('created_at', '<=', $date)->delete();         
        $transactions = transaction::with('user')->with('property')->where('owner_id', $user->id)->orwhere('client_id', $user->id)->paginate(5);  
        return view('pages.lister.transaction', compact('transactions','userphone','user'));
    }  

    public function destroy(Request $request, $id)    
    {   
        $user = Auth::user(); 
        $booking = Booking::where('id', $id)->firstOrFail()->delete();  
       
        $transactions = new transaction(); 
        $transactions->owner_id = $user->id; 
        $transactions->client_id = $request->client_id;
        $transactions->property_id = $request->property_id;  
        $transactions->save(); 
        $getPropertyId = $transactions->property_id;

        //update properties availability_at column        
        $Property = property::find($getPropertyId);
        $Property->availability_at = $request->availability;    
        $Property->update();

     
     return redirect()->route('lister.transaction')->with('success', 'Payment has been send');

    }  
    // $availability_at = Carbon::now();
      
    
}
