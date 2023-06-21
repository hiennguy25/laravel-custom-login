<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
                'name'=>'required|min:5|max:50',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6|max:20'
            ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        if (User::create($data)) {
            return back()->with('success', 'You have registered successfully!');
        }
        return back()->with('fail', 'Something is wrong!');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('loggedId', $user->id);
                return redirect('dashboard');
            }
        return back()->with('fail', 'Password is not matches!');
        }
        return back()->with('fail', 'This email is not registered!');
    }

    public function dashboard()
    {
        // $data = array();
        if (Session::has('loggedId')) $data = User::where('id', Session::get('loggedId'))->first();
        // dd($data->toArray());
        return view('auth.dashboard', compact('data'));
    }

    public function logoutUser()
    {
        if (Session::has('loggedId')) {
            Session::pull('loggedId');
            return redirect('login');
        }
    }
}
