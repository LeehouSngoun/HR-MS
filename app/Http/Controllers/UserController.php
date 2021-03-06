<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $users = User::all();
        $roles = Role::all();
        
        return view('User.user', compact("users","roles"));
    }

    function insert(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->save();
         return redirect("/user");
    }

    function edit($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->save();
        return redirect("/user");
    }

    function delete($id){
        User::destroy($id);
        return redirect("/user");
    }
}
