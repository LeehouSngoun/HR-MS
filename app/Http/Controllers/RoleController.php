<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $roles = Role::all();
        return view('Role.role',compact("roles"));
    }

    function insert(Request $request){
        $roles = new Role();
        $roles->role = $request->role;
        $roles->save();
        return redirect("/role");
    }

    function edit($id, Request $request){
        $role = Role::find($id);
        $role->role = $request->role;
        $role->save();
        return redirect("/role");
    }

    function delete($id){
        Role::destroy($id);
        return redirect("/role");
    }
}
