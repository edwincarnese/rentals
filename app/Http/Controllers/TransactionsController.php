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
        //  dd($id);
        return view('pages.lister.approve', compact('bookings','user'));    
           
    }  

    public function show()
    {   
        $user = Auth::user();
        $userphone=$user->phone;
        // $date = Carbon::now()->subDays(30);         
        // transaction::where('created_at', '<=', $date)->delete();         
        $transactions = transaction::with('user')->with('property')->where('owner_id', $user->id)->orwhere('client_id', $user->id)->paginate(5);  
        // dd($transactions);
        return view('pages.lister.transaction', compact('transactions','userphone','user'));
    }  

    public function destroy(Request $request,$id)    
    {   
        //delete booking table
        $user = Auth::user(); 
        $booking = Booking::where('id', $id)->where('client_id', $user->id)->firstOrFail()->delete();  
       
         //add transaction table
        $transactions = new transaction(); 
        $transactions->book_id = $id;
        $transactions->owner_id = $request->input('owner_id'); 
        $transactions->client_id = $user->id;
        $transactions->property_id = $request->input('property_id');  
        $transactions->save(); 
        $getPropertyId = $transactions->property_id;

        //update properties availability_at column        
        $Property = property::find($getPropertyId);
        $Property->availability_at = $request->input('availability');    
        // $s = $Property->availability_at;     
        $Property->update();

     
     return redirect()->route('lister.transaction')->with('success', 'Payment has been send');

    }  
    // $availability_at = Carbon::now();
      
    
}
