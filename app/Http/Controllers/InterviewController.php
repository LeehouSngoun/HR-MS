<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewController extends Controller
{
    function index(){
        return view('Interview.interview');
    }
}
