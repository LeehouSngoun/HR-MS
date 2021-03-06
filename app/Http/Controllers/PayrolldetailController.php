<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Payroll;
use App\Payroll_detail;
use App\Salary;
use App\Overtime;

class PayrolldetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index($id){
        $payroll_details = Payroll_detail::where('payroll_id',$id)->get();
        
        return view('Payroll.payrolldetail',compact("payroll_details"));
    }

    function view($id){
        
        $payroll_detail = Payroll_detail::find($id);
        $payroll = Payroll::find($payroll_detail->payroll_id);
                $total_overtime=0;
                    $overtimes= Overtime::where('employee_id', $payroll_detail->employee_id)->where('status','unpaid')->get();
                    foreach($overtimes as $overtime)
                    {
                        $total_overtime += $overtime->hour;
                    }
                    
        return view("Payroll.payrolldetaileachprint" , compact("payroll_detail","total_overtime","payroll"));
    }

    function edit($id){

        $payroll_detail = Payroll_detail::find($id);

        return view("Payroll.payrolldetaileach" , compact("payroll_detail"));
        
    }

    function update($id, Request $request){
        $update_payroll_details = Payroll_detail::find($id);
        $update_payroll_details->basic_pay = $request->basic_pay;
        $update_payroll_details->days_work = $request->day_work;
        $update_payroll_details->overtime_hour = $request->overtime_hour;
        $update_payroll_details->annual_leave = $request->annual_leave;
        $update_payroll_details->education_allowance = $request->educate;
        $update_payroll_details->unpaid_leave = $request->unpaid_leave;
        $update_payroll_details->transport_allowance = $request->transport;
        $update_payroll_details->property_damage = $request->damage;
        $update_payroll_details->overtime_allowance = $request->overtime;
        $update_payroll_details->loan = $request->loan;
        $update_payroll_details->food_allowance = $request->food;
        $update_payroll_details->tax = $request->tax;
        $update_payroll_details->total_earning = $request->total_earn;
        $update_payroll_details->total_deduction = $request->deduction;
        $update_payroll_details->net_pay = $request->net_pay;
        $update_payroll_details->save();

        return redirect("/payroll_detail_each/edit/".$id);

    }

    function delete($id){
        $payroll_id = Payroll_detail::find($id)->payroll_id;
        Payroll_detail::destroy($id);
        return redirect("/payroll_detail".'/'.$payroll_id); 
    }
}
