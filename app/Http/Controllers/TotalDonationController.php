<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;
use App\Models\withdraw;
use Illuminate\Support\Facades\Hash;

class TotalDonationController extends Controller
{
    public function index()
    {
        $totalwithdraw = Withdraw::sum('amount');
        $totaldonation = Donation::sum('amount');
 
         $total = $totaldonation- $totalwithdraw;
 
        return view('user.withdraw')->with(compact('totalwithdraw','totaldonation','total'));
}

public function store(Request $request)
{

        $request->validate([
            'criteria' => 'required',
            'amount' => 'required|numeric',
        ]);

       $store = new withdraw();

       $store->user_id = Auth::user()->id;
       $store->amount = $request->input('amount');
       $store->name = Auth::user()->name;
       $store->save();
       
       return redirect()->back()->with('success', 'Withdrawal Requested Successfully');
}
}