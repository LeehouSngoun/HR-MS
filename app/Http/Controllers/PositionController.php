<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Department;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $positions = Position::all();
        $departments = Department::all();
        return view('Position.position', compact("positions","departments"));
    }

    function insert(Request $request){
        $positions = new Position();
        $positions->position = $request->position;
        $positions->department_id =$request->department_id;
        $positions->save();
        return redirect()->route("position.all");
    }

    function edit($id , Request $request){
        $positions = Position::find($id);
        $positions->position = $request->position;
        $positions->department_id = $request->department_id;
        $positions->save();
        return redirect()->route("position.all");

    }

    function delete($id){
        $pos = Position::find($id);
        $pos->delete();
        return redirect()->route("position.all");
    }
}
