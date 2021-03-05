<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Payroll;
use App\Payroll_detail;
use App\Salary;
use App\Overtime;

class PayrollController extends Controller
{
    function index(){
        $payrolls = Payroll::all();
        // dd($payrolls);
        return view("Payroll.payroll",compact("payrolls"));
    }

    

    function generate(){
        $new_payroll = new Payroll();
        $new_payroll->month = date("M");
        $new_payroll->year = date("Y");
        $new_payroll->generated_by = 'Rachana';
        // $new_payroll->date= '2021-03-03';
        $new_payroll->save();
        // dd($new_payroll->id);
        $employees = Employee::where('status', '!=', 'Resigned')->orWhereNull('status')->get();
        //payroll
        $payroll = Payroll::find($new_payroll->id);
        $salaries = Salary::all();
        $overtimes = Overtime::all();
        foreach($employees as $employee){
            $payroll_detail = new Payroll_detail();
            
            //lastest salary of each employee
            $salary_employee_id = $salaries->pluck('employee.id');
            $salary_filters=null;
            foreach($salary_employee_id as $sal_emp_id)
            {
                if($sal_emp_id== $employee->id)
                {
                    $salary_filters= Salary::where('employee_id', $employee->id)->orderBy('effective_date', 'DESC')->get();

                    break;
                }
            }
            $last_salary=null;
            if($salary_filters!=null)
            {
                $last_salary= $salary_filters->first()->salary;
            }
            


            //All overtime of each employee
            
            
            $overtime_employee_id = $overtimes->pluck('employee.id');
            $overtime_filters=null;
            $total_overtime = 0;
            foreach($overtime_employee_id as $over_emp_id)
            {
                if($over_emp_id== $employee->id)
                {
                    $overtime_filters= Overtime::where('employee_id', $employee->id)->where('status','unpaid')->get();
                    foreach($overtime_filters as $unit_overtime)
                    {
                        $total_overtime += ($unit_overtime->hour)*($unit_overtime->rate);
                    }
                    break;

                }
            }

            $payroll_detail->payroll_id = $payroll->id;
            $payroll_detail->employee_id = $employee->id;
            $payroll_detail->basic_pay = $last_salary;
            $payroll_detail->overtime_allowance = $total_overtime;
            $payroll_detail->save();
            

        }
        // dd($payroll_detail);
        return redirect('payroll');
    }

    function delete($id){
        Payroll::destroy($id);
        return redirect("/payroll");
    }
}
