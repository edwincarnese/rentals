<?php

namespace App\Http\Controllers\Lister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.lister.profile');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if(!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error','Your current password is incorrect.');
        }

        if($request->new_password != $request->new_confirm_password) {
            return redirect()->back()->with('error','Your passwords do not match.');
        }
   
        $user->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Your password has been successfully updated.');
    }

    public function changePassword()
    {
        return view('pages.lister.change-password');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->all();

        if($request->logo) {
            $logoName = time().'.'.$request->logo->getClientOriginalExtension();  
            $request->logo->storeAs('logos', $logoName, 'public');

            $logoPath = 'logos/'.$logoName;

            $data['logo'] = $logoPath;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Your profile has been successfully updated');
    }
}
