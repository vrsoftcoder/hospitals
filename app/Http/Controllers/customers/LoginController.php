<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Hash;
use Auth;
use Validator;
use App\Passport\Passport;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Passport\HasApiTokens;

class LoginController extends Controller
{
     use HasApiTokens;

    public function index(){
        if(Auth::check() && Auth::user()->role == "customer") {
            return View('customers.dashboard');
        }
        else{

            return View('customers.login');
        }
        return View('customers.login');
    }

    public function login(Request $request){
        
        $useremail = $request->useremail;
        $userpass = $request->userpassword;
        
        $login_credentials=[
            'email'=>$request->useremail,
            'password'=>$request->userpassword,
        ];
        if(auth()->attempt($login_credentials)){
            //generate the token for the user
            $user = Auth::user();
            $user_login_token = $user->createToken('MyApp')->accessToken;
            return (new Response(['status'=>'success','token'=>$user_login_token], '200'));
           } 
           else{
            return (new Response(['status'=>'error','msg'=>'Wrong Credentials!'], '200'));
        }
       
    }

}
