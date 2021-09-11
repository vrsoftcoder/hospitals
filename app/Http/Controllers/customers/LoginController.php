<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Hash;
use Auth;
use App\Passport\Passport;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LoginController extends Controller
{
    
    public function index(){
        if(Auth::check() && Auth::user()->role == "customer") {
            return View('customers.dashboard');
        }
        else{

            return View('customers.signup');
        }
        return View('customers.login');
    }

    public function login(Request $request){
        
        $useremail = $request->useremail;
        $userpass = $request->userpassword;
        
        if (Auth::attempt(['email' => $useremail, 'password' => $userpass])) {
            $token = Auth::user()->createToken('my token');
            return (new Response(['status'=>'success','token'=>$token], '200'));
        }
        else{
            return (new Response(['status'=>'error'], '200'));
        }
       
    }

}
