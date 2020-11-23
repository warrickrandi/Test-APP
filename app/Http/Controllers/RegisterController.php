<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    //user registration
    public function register(Request $request)
    {
        
        //validation
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'max:10'],
            'u_type' => ['required'],
        ]);

        session_start();
        //captcha validation
            $code = rand(1000, 9999);
            $newUser = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone_no'],
                'address' => $request['address'],
                'category_id' => $request['u_type'],
                'verified' => 0,
                'code' => $code,
                'password' => Hash::make($request['password']),
                
            ]);

            if ($newUser) {
               
                $to_name = $request['name'];
                $to_email = $request['email'];
                $link = route('verification-page',['u_id'=>$newUser->id,'v_code'=>$code]);

                $data = array('name' => $to_name, 'body' => "Please use this link to verify your Acount. ".$link);
                Mail::send('emails.verification', $data, function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('Verification Code');
                    $message->from('test@test.com', 'Test App');
                });
                return view('auth.verify');
            }
    }

    //email verification
    public function verify(Request $request)
    {

        return view('auth.verify');
        
    }

    //email verification
    public function verification($u_id,$v_code){
        Session::flush();
        Auth::logout();

        $user = User::where('id',$u_id)->first();

        if($v_code == $user->code){
            $user->verified = 1;
            $user->save();
            return redirect()->route('welcome');
        }else{
            return redirect()->route('verify')->withInput()->withErrors(['verifyerr' => ['Verification unsuccessfull. Please use the link we have sent you.']]);
        }
        
    }

    //welcome
    //email verification
    public function welcome(Request $request)
    {

        return view('welcome');
        
    }
}
