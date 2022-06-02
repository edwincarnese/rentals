<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Property;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $status = $request->status;

        if($request->popular) {
            $properties = Property::query()
                ->where('is_approved', 1)
                ->where('ratings', '<>', 0)
                ->when($status, function($q) use($status) {
                    if($status == 'apartment') {
                        $q->where('type', 'Apartment');
                    }
                    else if($status == 'boarding-house') {
                        $q->where('type', 'Boarding House');
                    }
                    else if($status == 'for-sale-for-rent') {
                        $q->whereIn('status', [1,2]);
                    }
                })
                ->orderBy('ratings', 'DESC')
                ->get();
        }
        else {
            $properties = Property::query()
                ->where('is_approved', 1)
                ->when($status, function($q) use($status) {
                    if($status == 'apartment') {
                        $q->where('type', 'Apartment');
                    }
                    else if($status == 'boarding-house') {
                        $q->where('type', 'Boarding House');
                    }
                    else if($status == 'boarding-house') {
                        $q->where('type', 'Boarding House');
                    }
                    else if($status == 'for-sale-for-rent') {
                        $q->whereIn('status', [1,2]);
                    }
                })
                ->get();
        }

        $rent_property = Property::query()
            ->where('is_approved', 1)
            ->where('status', 1)
            ->get();

        $sale_property = Property::query()
            ->where('is_approved', 1)
            ->where('status', 2)
            ->get();

        return view('pages.home', compact('properties','sale_property','rent_property'));
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
