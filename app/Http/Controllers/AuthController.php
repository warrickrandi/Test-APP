<?php

namespace App\Http\Controllers;

use App\User;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    //auth middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function viewusers(){
        $users = User::with('category')->paginate(10);
        //dd($users);
        $users = [
            'users' => $users
        ];
        return view('users')->with($users);
    }


    public function search(Request $request)
    {
        
        if ($request['name']) {
            $users = User::where('name','like','%'.$request['name'].'%')->with('category')->paginate(10);
            $users = [
                'users' => $users,
                'name' => $request['name']
            ];
            return view('users')->with($users);
        }else{
            return redirect()->route('view-users');
        }
        
    }
}
