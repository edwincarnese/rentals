<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Property;
use Auth;

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

    public function clients()
    {
        $users = User::where('role', 3)->latest()->get();

        return view('pages.admin.clients',compact('users'));
    }

    public function listers()
    {
        $users = User::where('role', 2)->latest()->get();

        return view('pages.admin.listers',compact('users'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if(!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Your current password is incorrect.');
        }
        if($request->new_password != $request->new_confirm_password) {

            return redirect()->back()->with('error', 'Your passwords do not match.');
        }   

        $user->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Your password has been successfully updated.');
    }

    public function changePassword()
    {
        return view('pages.admin.change-password');
    }
}
