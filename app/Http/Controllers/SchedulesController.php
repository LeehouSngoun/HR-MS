<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
{
    function index(){
        $schedules = Schedule::all();
        return view('schedule.schedule' ,compact('schedules'));
    }

    function insert(Request $request){
        $scd = new Schedule();
        $scd->name = $request->name;
        $scd->start_time = $request->start_time;
        $scd->end_time=$request->end_time;
        // dd($scd);
        $scd->save();
       
        return redirect()->route("schedule.all");
    }

    function edit($id, Request $request){
        // dd($request);
        $scd = Schedule::find($id);
        $scd->name = $request->name;
        $scd->start_time = $request->start_time;
        $scd->end_time = $request->end_time;
        $scd->save();
        return redirect()->route("schedule.all");
    }

    function delete($id){
        Schedule::destroy($id);
        return redirect()->route("schedule.all");
    }
}
