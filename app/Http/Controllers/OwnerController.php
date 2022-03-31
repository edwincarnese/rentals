<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request; 
use App\Models\Property;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $owners = User::query()
            ->withCount('properties')
            ->when($search, function($q) use($search) {
                $q->where('company', 'LIKE', '%'.$search.'%');
            })
            ->where('role', '2')
            ->get();     
            
        return view('pages.owners.index',compact('owners') );        
    }

    
        public function show($id)
        {
            $user = User::withCount('properties')-> where('id', $id)->firstOrFail();          
            $properties = Property::where('user_id', $id)->paginate(3);
            // $featured_properties = Property::inRandomOrder()->limit(5)->get();
            //  $count_property = User::withCount('properties')->where('role', $id)->get();             
            return view('pages.owners.show',compact('user','properties'));
        }
      //  return view('pages.owners.show');        
    }
