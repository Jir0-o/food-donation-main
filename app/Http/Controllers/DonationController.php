<?php

namespace App\Http\Controllers;
use App\Models\Donation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            if(auth()->user()->isadmin == 1 || auth()->user()->isadmin == 2) {
                $donation = Donation::with('users')->get();
            } else {
                $donation = Donation::with('users')->where('user_id', auth()->user()->id)->get();
            }
        } else {
            return redirect()->route('login'); 
        }
        
        return view('user.donation', compact('donation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
        {
            $donation = Donation::find($id);
            return view('user.edit_donation', compact('donation'));
        }
        
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|string',
            'criteria' => 'required|string|in:Food,Water',
        ]);
        $donation = Donation::find($id);

        if($donation){
            $donation->update([
                'amount' => $request->input('amount'),
                'criteria' => $request->input('criteria'),
            ]);
        }
    
        return redirect('donations')->with('success', 'Donation updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Donation::find($id);

        Donation::destroy($id);

        return redirect()->back()->with('success', ' Donation deleted successfully!');
    }
}
