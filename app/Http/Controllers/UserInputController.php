<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\donation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserInputController extends Controller
{
   public function index()
    {
        return view('welcome');
}
public function __construct()
{
    $this->middleware('auth.user')->only('store');
}
     public function store(Request $request)
     {

        $request->validate([
            'criteria' => 'required',
            'amount' => 'required|numeric',
        ]);

       $store = new donation();

       $store->user_id = Auth::user()->id;
       $store->criteria = $request->input('criteria');
       $store->amount = $request->input('amount');
       $store->isadmin = Auth::user()->isadmin;
       $store->name = Auth::user()->name;
       $store->save();

       return redirect()->back()->with('success', 'Donation added successfully!');
     }
     public function edit($id)
     {
       $user= User::find($id);

         return view('user.edit',compact('user'));
     }     
     public function delete($id){

    $user = User::find($id);

    if($user->isadmin == 0){
        return redirect()->back()->with('error', 'Regular users cannot delete other users!');
    }

    if($user->isadmin == 1){

        if(auth()->user()->isadmin == 1 && auth()->user()->isadmin != 2){
            return redirect()->back()->with('error', 'Admin users cannot delete Super Admin users!');
        }

        Donation::where('user_id', $id)->delete();
        User::destroy($id);

        return redirect()->back()->with('success', ' user deleted successfully!');
    }

    if($user->isadmin == 2){

        if(auth()->user()->isadmin == 2){
            Donation::where('user_id', $id)->delete();
            User::destroy($id);
            return redirect()->back()->with('success', 'Super Admin user and associated data deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Super Admin users cannot be deleted by non-Super Admin users!');
        }
        }

        return redirect()->back()->with('error', 'Invalid user or user type!');
    }
    

    public function update(request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'role' => 'required|string|in:regular_user,administrator',
        ]);

        $data= User::find($id);

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->isadmin = $request->role === 'administrator' ? 1 : 0;
        $data->save();

      return redirect('/settings')->with('success', 'New user added successfully!');
    } 
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:regular_user,administrator',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isadmin = $request->role === 'administrator' ? 1 : 0;
        $user->save();
    
        return redirect('settings')->with('success', 'User added successfully!');
    }
    
}