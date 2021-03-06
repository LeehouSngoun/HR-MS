<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class CustomloginController extends Controller
{
    function login(){
        return view("Auth.logincustom");
    }

    function loginAction(Request $request){
        $credential = [
            "email"=> $request->email,
            "password"=>$request->password
        ];

        if(Auth::attempt($credential))
        {
            return redirect("/home");
        }
    }

    function logout(){
        Auth::logout();
        return redirect("/login");
    }
}
