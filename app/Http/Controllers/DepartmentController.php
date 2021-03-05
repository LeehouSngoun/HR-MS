<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    function index(){
        $departments = Department::all();
        // dd($departments);
        return view('Department.department', compact("departments"));
    }

    function view($id){
        $dep = Department::find($id);
        // $article -> title ="New Title";
        // $new_article = $article->fresh();
        // echo dd($new_article);
        return $dep->department;
    }

    function insert(Request $request){
        $Dep = new Department();
        $Dep->department=$request->department;
        $Dep->save();
        // dd($Dep);
        return redirect()->route("department.all");
        // return view("Department.department");
    }

    function delete($id){
        Department::destroy($id);
        // dd($request);
        return redirect()->route("department.all");
    }

    function edit($id,Request $request){
        // dd($request);
        $dep =Department::find($id);
        $dep->department=$request->department;
        $dep->save();
        return redirect()->route("department.all");
        
    }
}
