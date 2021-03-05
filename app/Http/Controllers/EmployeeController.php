<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Schedule;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    function index(){
        // $employees = Employee::paginate(10);
        // $employees = DB::table('employees')
        //             ->join('positions', 'employees.position_id','=','positions.id')
        //             ->join('schedules', 'employees.schedule_id','=','schedules.id')
        //             ->get();
        $employees= Employee::all();
        $positions = Position::all();
        $schedules = Schedule::all();
        // $emp = $employees->position;
                    // dd($employees->schedule->start_time);
        
        return view('Employee.employee',compact("employees","positions","schedules"));
    }

    function insert(Request $request){
        // dd($request);
        $employees = new Employee();
        if($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $ext = '.'.$request->photo->getClientOriginalExtension();
            $fileName = date('d-m-Y-H-i') .  $request->photo->getClientOriginalName().$ext;
            $location = "images/photo";
            // Image::make($image)->resize(500, 400)->save($location);
            $photo->move($location,$fileName);
           $employees->photo = $fileName;

            //$article->image = $request->filename;
        }
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->birthdate = $request->birthdate;
        $employees->contact = $request->contact;
        $employees->gender = $request->gender;
        $employees->position_id = $request->position_id;
        $employees->schedule_id = $request->schedule_id;
        $employees->address = $request->address;
        $employees->education = $request->education;
        $employees->skill = $request->skill;
        $employees->identity= $request->identity;
        $employees->email= $request->email;
        $employees->status = 'active';
        $employees->save();

        // dd($request);
        return redirect()->route("employee.all");
    }

    function edit($id , Request $request){
        $employees = Employee::find($id);
        // dd($request);
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->birthdate = $request->birthdate;
        $employees->contact = $request->contact;
        $employees->gender = $request->gender;
        $employees->position_id = $request->position_id;
        $employees->schedule_id = $request->schedule_id;
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
