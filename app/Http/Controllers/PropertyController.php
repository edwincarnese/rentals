<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(1);
        $featured_properties = Property::inRandomOrder()->limit(5)->get();
        $featured_owners = User::withCount('properties')->where('role', 2)->inRandomOrder()->limit(5)->get();

        return view('pages.properties.index', 
            compact(
                'properties', 
                'featured_properties', 
                'featured_owners'
            )
        );
    }

    public function show($id)
    {
        $property = Property::where('id', $id)->firstOrFail();
        $featured_properties = Property::inRandomOrder()->limit(5)->get();
        $featured_owners = User::withCount('properties')->where('role', 2)->inRandomOrder()->limit(5)->get();

        return view('pages.properties.show', 
            compact(
                'property',
                'featured_properties', 
                'featured_owners'
            )
        );
    }
}
