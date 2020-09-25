<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\User;

class LoginController extends Controller
{
    function index(){

    	return view('mlogin.index');
    }

    function verify(loginRequest $request){
      $user= new User;
      $data = $user->where('username',$request->username)
                  ->where('password',$request->password)
                  ->get();

        	if(count($data) > 0){
        		//session
                if($data[0]['userType']=="manager"){

                  $request->session()->put('username',$request->username);
                  $request->session()->put('type',$data[0]['userType']);
              		return redirect('/manager');
                }else{
                  return redirect('/login');
                }
        	}
          else{
            $request->session()->flash('msg','Invalid username/password');
            return redirect('/login');
          }
    }
}
