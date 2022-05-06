<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function show()
    {   
        $transactions = Transaction::with('user')->with('lister')->with('property')->latest()->paginate(5);  

        return view('pages.admin.transaction', compact('transactions'));
    }  
}
