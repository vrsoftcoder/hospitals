<?php

namespace App\Http\Controllers\doctors;

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

class SignupController extends Controller
{
    public function index(){

        if(Auth::check() && Auth::user()->role == "doctor") {
            return View('doctors.dashboard');
        }
        else{

            return View('doctors.signup');
        }
    }

    public function register(Request $request){
        
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->youremail;
        $user->password = Hash::make($request->password);
        $user->role = 'doctor';

        if($user->save()){
            if (Auth::attempt(['email' => $request->youremail, 'password' => $request->password])) {
                $user = Auth::user();
                $user_login_token = $user->createToken('MyApp')->accessToken;
                return (new Response(['status'=>'success','token'=>$user_login_token], '200'));
            }
            else{
                return (new Response(['status'=>'error'], '200'));
            }
        }
        else{
            return (new Response(['status'=>'error'], '200'));
        }
    }
}
