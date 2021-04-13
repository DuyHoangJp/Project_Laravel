<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function get_login(){
    return view('Login.login');
   }
   public function post_login(Request $request){
      $this->validate($request,[
         'email' =>'required',
         'password' =>'required|min:3|max:32'],[
          'email.required' =>'Ban chua nhap email',
          'password.required' =>'Ban chua nhap pass',
          'password.min' =>'ko nho hon 3 kyt tu',
          'password.max' =>'ko nho hon 32 kyt tu',
      ]);
      if (Auth::attempt(['email' => $email, 'password' => $password])){
         return redirect('/');
      }
      else{
         return redirect('/login');
      }
     }
}
