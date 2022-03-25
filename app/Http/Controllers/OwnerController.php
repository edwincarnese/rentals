<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('pages.owners.index');
    }

    public function show()
    {
        return view('pages.owners.show');
    }
}
