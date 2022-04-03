<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Property;

class PageController extends Controller
{
    public function home()
    {
        $properties = Property::where('is_approved', 1)->get();

        return view('pages.home', compact('properties'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
