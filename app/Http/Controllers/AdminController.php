<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\booking;
use App\Models\message;
use Auth;
use carbon\carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('pages.admin.index');
    }
    
    public function store(Request $request)
    {
       
    }

    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('pages.admin.approval-profile',compact('user'));
    }
  
    public function update(Request $request, $id)
    {
        $user = User::find($id); 
        $current_date = date('Y-m-d H:i:s');
        $user->approved_at = $current_date;

        $user->update();

        Property::where('user_id', $user->id)->update(['is_approved' => 1]);

        return redirect()->back()->with('success', 'Your Account has been successfully Approved');
    }

   
    public function destroy($id)
    {
        
    }

    public function list()
    {
        $users = User::whereNull('approved_at')->latest()->get();

        return view('pages.admin.approval',compact('users'));
    }
}
