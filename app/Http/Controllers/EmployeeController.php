<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Schedule;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $employees= Employee::all();
        $positions = Position::all();
        $schedules = Schedule::all();
        return view('Employee.employee',compact("employees","positions","schedules"));
    }

    function insert(Request $request){
        $employees = new Employee();
        if($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $ext = '.'.$request->photo->getClientOriginalExtension();
            $fileName = date('d-m-Y-H-i') .  $request->photo->getClientOriginalName().$ext;
            $location = "images/photo";
            $photo->move($location,$fileName);
           $employees->photo = $fileName;
        }
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->birthdate = $request->birthdate;
        $employees->contact = $request->contact;
        $employees->gender = $request->gender;
        $employees->position_id = $request->position_id;
        $employees->schedule_id = $request->schedule_id;
        $employees->bank_name = $request->bank_name;
        $employees->bank_account = $request->bank_account;
        $employees->address = $request->address;
        $employees->education = $request->education;
        $employees->skill = $request->skill;
        $employees->identity= $request->identity;
        $employees->email= $request->email;
        $employees->status = 'active';
        $employees->save();
        return redirect()->route("employee.all");
    }

    function edit($id , Request $request){
        $employees = Employee::find($id);
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->birthdate = $request->birthdate;
        $employees->contact = $request->contact;
        $employees->gender = $request->gender;
        $employees->position_id = $request->position_id;
        $employees->schedule_id = $request->schedule_id;
        $employees->bank_name = $request->bank_name;
        $employees->bank_account = $request->bank_account;
        $employees->address = $request->address;
        $employees->education = $request->education;
        $employees->skill = $request->skill;
        $employees->identity= $request->identity;
        $employees->email= $request->email;
        $employees->rank = $request->rank;
        $employees->status=$request->status;
        $employees->resign_date = $request->resign_date;  
        $employees->save();

        return redirect()->route("employee.all");
    }

    function delete($id){
        Employee::destroy($id);
        return redirect()->route("employee.all");
    }
}
