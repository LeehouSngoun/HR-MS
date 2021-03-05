<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary;
use App\Employee;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    function index($id){
        $employee = Employee::find($id);
        $salaries = Salary::all();
        $employee_id = $salaries->pluck('employee.id');
        $filters=null;
        foreach($employee_id as $emp_id)
        {
            if($emp_id== $id)
            {
                $filters= Salary::where('employee_id', $id)->orderBy('effective_date', 'DESC')->get();
                break;
            }
        }
        $last_date=null;
        if($filters!=null){
             $last_date= $filters->first();
        }
        return view('Salary.salary',compact("filters","last_date","employee"));
    }

    function insert(Request $request){
        // dd($request);
        $salaries = new Salary();
        $salaries->salary = $request->salary;
        $salaries->employee_id = $request->employee_id;
        $salaries->effective_date = $request->effective_date;
        $salaries->end_date = $request->end_date;
        $salaries->save();
        
        return redirect('salary/'.$request->employee_id);
    }

    function edit($id, Request $request){
           
        $salaries = Salary::find($id);
        $salaries->salary = $request->salary;
        $salaries->effective_date = $request->effective_date;
        $salaries->end_date = $request->end_date;
        // dd($request);
        $salaries->save();
        return redirect('salary/'.$request->employee_id);
    }

    function delete($id,Request $request){
        // dd($request);
        Salary::destroy($id);
        // return redirect()->route("salary.all");
        return redirect('salary/'.$request->employee_id);

    }
}
