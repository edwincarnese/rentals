<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Property;
use App\Models\User;
use App\Models\Booking;
use App\Models\message;

class MessageController extends Controller
{
  
    public function stored (Request $request,$id)
    {                
        $user = Auth::user();

        $property = Property::where('id', $id)->firstOrFail();         
        $message = new Message();

        $message->owner_id = $property->user_id;;
        $message->client_id = $user->id;
        $message->property_id =  $property->id;
        $message->name = $request->input('name');  
        $message->email = $request->input('email');  
        $message->message = $request->input('message');  
        $message->ratings = $request->input('ratings');  
        $message->save();  

        $property->ratings = $property->ratings + $request->input('ratings');  
        $property->ratings_count = 1 + $property->ratings_count;
        $property->save();

        return redirect()->back()->with('success', 'Your feedback has been added.');   
    } 
    
}
