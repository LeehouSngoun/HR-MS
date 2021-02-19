<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    function index(){
        return view('schedule');
    }
}
