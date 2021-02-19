<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/attendance' ,'AttendanceController@index');
Route::get('/cadidate' ,'CadidateController@index');
Route::get('/interview' ,'InterviewController@index');
Route::get('/employee' ,'EmployeeController@index');
Route::get('/overtime' ,'OvertimeController@index');
Route::get('/salary' ,'SalaryController@index');
Route::get('/position' ,'PositionController@index');
Route::get('/schedule' ,'SchedulesController@index');
Route::get('/user' ,'UserController@index');
Route::get('/department' ,'DepartmentController@index');
Route::get('/role' ,'RoleController@index');
Route::get('/pwd' ,'PasswordController@index');
