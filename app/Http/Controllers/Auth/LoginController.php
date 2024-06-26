<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
        public function login(Request $request){
            $request->validate([
                'email'     => 'required|email',
                'password'  => 'required'
            ]);
            $credentials = $request->only('email', 'password');
                if(auth()->attempt($credentials)){   
                    if(auth()->user()->role=="User"){
                        
                        return redirect()->route('home.user');
                    }
                    if(auth()->user()->role=="Admin"){

                        return to_route('home.admin');

                }
                if(auth()->user()->role=="Manager"){

                    return to_route('home.manager');

                }
        
            }
 
            else{
                return to_route('welcome')->with('message','your cresinatials is wrong man ');

            }  
        }
}

