<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use Mail;
use App\Mail\MailPass;
use Auth;

class PageController extends Controller
{
    function forgot_password_form(){
        return view('auth.forgot_password');
    }
    function forgot_password_mail(Request $request){
        $user = User::where('email',$request->email)->first();
       if ($user == null) {
            return redirect('/user/account/forget/password')->with('error','Please Use a Valid Registered Email');
        }
        else{

            $user = User::where('email',$request->email)->first();
            $details = [
                'username' => $user->username,
                'password' => $user->username
            ];
            Mail::to($user->email)->send(new MailPass($details));
            // dd("Email is Sent.");
            $user = User::where('email',$request->email)->first();
            $user->password = md5($user->username);
            $user->save();
            return redirect('/login')->with('success','Password Reset: Please check your email');
        }
    }


    public function checker(){
        if(Auth::user()->role->id == '1'){
            return redirect('/student/dashboard');
        }
        elseif(Auth::user()->role->id == '2'){
            return redirect('/coor/dashboard');
        }
        elseif(Auth::user()->role->id == '3'){
            return redirect('/partners/dashboard');
        }
        elseif(Auth::user()->role->id == '4'){
            return redirect('/admin/academic/year/list');
        }else{
            return redirect('/');
        }
    }
    public function access_invalid(){
        Auth::logout();
        return redirect('/')->with('error','Invalid Access Please Login!');
    }


}
