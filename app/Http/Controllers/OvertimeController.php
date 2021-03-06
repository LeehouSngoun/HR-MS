<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OverTime;
use App\Employee;
use Illuminate\Support\Facades\DB;

class OvertimeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index($id){
        $overtimes = Overtime::all();
        $employee_id = $overtimes->pluck('employee.id');
        $filters=null;
        foreach($employee_id as $emp_id)
        {
            if($emp_id== $id)
            {
                $filters= Overtime::where('employee_id', $id)->orderBy('status', 'DESC')->get();
                break;
            }
        }
        $employee = Employee::find($id);
        return view('OverTime.overtime', compact("filters","employee"));
    }

    function insert(Request $request){
        $overtimes = new Overtime();
        $overtimes->employee_id = $request->employee_id;
        $overtimes->start_date = $request->start_date;
        $overtimes->end_date = $request->end_date;
        $overtimes->hour = $request->hour;
        $overtimes->rate = $request->rate;
        $overtimes->reason = $request->reason;
        $overtimes->status ="unpaid";
        $overtimes->save();
        return redirect('overtime/' . $request->employee_id);
    }

    function edit($id, Request $request){
           
        $overtimes = Overtime::find($id);
        $overtimes->hour = $request->hour;
        $overtimes->rate = $request->rate;
        $overtimes->start_date = $request->start_date;
        $overtimes->end_date = $request->end_date;
        $overtimes->reason = $request->reason;
        $overtimes->save();
        return redirect('overtime/'.$request->employee_id);
    }

    function delete($id, Request $request){
        Overtime::destroy($id);
        return redirect('overtime/'.$request->employee_id);
    }
}
