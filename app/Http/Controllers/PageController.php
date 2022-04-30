<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Property;

class PageController extends Controller
{
    public function home(Request $request)
    {
        if($request->popular) {
            $properties = Property::query()
                ->where('is_approved', 1)
                ->where('ratings', '<>', 0)
                ->orderBy('ratings', 'DESC')
                ->get();
        }
        else {
            $properties = Property::query()
                ->where('is_approved', 1)
                ->get();
        }

        $rent_property = Property::where('is_approved', 1)->where('status', 1)->get();
        $sale_property = Property::where('is_approved', 1)->where('status', 2)->get();

        return view('pages.home', compact('properties','sale_property', 'rent_property'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function index()
    {
        return redirect()->route('pages.contact')->with('success', 'Message send');
       // return view('pages.contact')->with('success', 'Message send');
        
    }
}
