<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadidateController extends Controller
{
    function index(){
        return view('cadidate');
    }
}
