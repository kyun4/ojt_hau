<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $username;
    public function username(){
        return 'username';
    }

    protected function login(Request $request){

        // Bypass Authetication
        // $input = $request->all();

        // $user = User::where('username', $request->username)->first();

        // if ($user) {
        //     $user->password = md5($input['password']);

        //     $user->save();
        //     return response()->json(['message' => 'Password updated successfully'], 200);
        // } else {
        //     return response()->json(['message' => 'User not found'], 404);
        // }

        // return bcrypt($request->password);
        $input = $request->all();
        $user = User::where([
            'username' => $request->username,
            'password' => md5($request->password)
        ])->first();
        // return $user->profile;
        if($user == null){
            return redirect()->back()->with('error', 'Authentication Error');
        }else{
            if($user->stat == 1) return redirect()->back()->with('error', 'Authentication Error');
            // elseif($user->stat == 1 && $user->status=="Inactive") return redirect()->back()->with('error', 'Account Disabled. Please Contact your Admin');
            // elseif($user->stat == 0 && $user->status=="Archived") return redirect()->back()->with('error' , 'Account Disabled. Please Contact your Admin');
            else{
                // student
                if($user->role_id==1){

                    // if($user->student->school->status != 'Active')  return redirect()->back()->with('error', 'Account Disabled. Please Contact your Admin');


                    Auth::login($user);
                    if(md5($user->username) == $user->password) return redirect('/student/password/update');
                    else return redirect('/students/job/list');
                }
                    // partners
                elseif($user->role_id==3){

                    // if($user->profile->school->status != 'Active')  return redirect()->back()->with('error', 'Account Disabled. Please Contact your Admin');

                    Auth::login($user);
                    if(md5($user->username) == $user->password) return redirect('/partners/password/update');
                    else return redirect('/partners/dashboard');
                }
                // coor
                elseif($user->role_id==2){

                    // if($user->profile->school->status != 'Active')  return redirect()->back()->with('error', 'Account Disabled. Please Contact your Admin');

                    Auth::login($user);
                    if(md5($user->username) == $user->password) return redirect('/coor/password/update');
                    else return redirect('/coor/dashboard');
                }
                // admin
                elseif($user->role_id==4) {
                    Auth::login($user);
                    return redirect('/admin/dashboard');
                }
            }
        }
    }
}
