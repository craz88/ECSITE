<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Login;
class LoginController extends Controller
{
    //
    public function index(){

    	return view('index');
    }

  	public function  login(Request $request){

  			$email=$request->username;
              $password=$request->password;
             if(Auth::attempt(['username'=>$email,'password'=>$password]))
             {
                 return redirect()->action('ProductController@index');
             }

      return view('index');

  	} 
}
