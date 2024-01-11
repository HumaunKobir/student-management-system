<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    //__password change__//
    public function password_change(){
        return view('password_change');
    }
    public function update_password(Request $request) {
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:6|max:16|string|confirmed',
            'password_confirmation'=>'required',

        ]);
        $user=Auth::user();
        if(Hash::check($request->current_password,$user->password)){
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }
        else
        {
            return redirect()->back()->with('error','Current Password Dosent Match!');
        }
    }
}
