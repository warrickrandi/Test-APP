<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    //system login function
    public function login(Request $request)
    {
        //input validation
        $validateData = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        $admin = Admin::where('email', $request['name'])->first();
        
        if ($admin) {
            if (Auth::attempt(['email' => $admin->email, 'password' => $request['password']], false, false)) {
                //check user status
                Cookie::queue('user_name', $admin->name, 7200);
                Auth::loginUsingId($admin->id); //logged in to the system
                return redirect()->route('view-users');
            } else {
                return redirect()->back()->withInput()->withErrors(['loginerr' => ['You have entered an invalid username or password']]);
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['loginerr' => ['You have entered an invalid username or password']]);
        }

        //find the use with requested credentials
        if (Auth::attempt(['']))
            dd($admin);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
