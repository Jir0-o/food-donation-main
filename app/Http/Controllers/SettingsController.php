<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingsController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if(auth()->user()->isadmin == 2) {
                $users = User::with(['donation' => function ($query) {
                    $query->select('user_id', DB::raw('sum(amount) as total_amount'))->groupBy('user_id');
                }])->get();
            } elseif (auth()->user()->isadmin == 1) {
                $users = User::with(['donation' => function ($query) {
                    $query->select('user_id', DB::raw('sum(amount) as total_amount'))->groupBy('user_id');
                }])->where('isadmin', '!=', 2)->get();
            } else {
                $users = User::with(['donation' => function ($query) {
                    $query->select('user_id', DB::raw('sum(amount) as total_amount'))->groupBy('user_id');
                }])->where('isadmin', '=', 0)->get();
            }
        } else {
            return redirect()->route('login'); 
        }
    
        return view('backend.pages.settings', compact('users'));
    }
    
}
