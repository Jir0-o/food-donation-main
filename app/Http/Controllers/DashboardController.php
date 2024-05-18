<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalAmount = donation::sum('amount');
        $totalDonations = donation::count();
    
        $highestDonation = donation::max('amount');
        $highestDonator = donation::where('amount', $highestDonation)->value('name');
    
        $stat = donation::with('users')->orderBy('amount', 'desc')->take(4)->get();
        $user = User::count('id');
    
        return view('dashboard', compact('totalAmount', 'totalDonations', 'stat', 'user', 'highestDonation', 'highestDonator'));
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
