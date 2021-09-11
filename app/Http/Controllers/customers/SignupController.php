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
class SignupController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        // $this->middleware('auth');
       
    }

    public function index(){

        if(Auth::check() && Auth::user()->role == "customer") {
            return View('customers.dashboard');
        }
        else{

            return View('customers.signup');
        }
    }

    public function register(Request $request){
        
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->youremail;
        $user->password = Hash::make($request->password);
        $user->role = 'customer';

        if($user->save()){
            if (Auth::attempt(['email' => $request->youremail, 'password' => $request->password])) {
                $token = $user->createToken('my token');
                return (new Response(['status'=>'success','token'=>$token], '200'));
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
 