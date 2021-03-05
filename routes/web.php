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
Route::get('/employee' ,'EmployeeController@index')->name("employee.all");
Route::post('/employee_add', 'EmployeeController@insert');
Route::put('/edit_emp/{id}','EmployeeController@edit');
Route::delete('/del_emp/{id}', 'EmployeeController@delete');
Route::get('/overtime/{id}' ,'OvertimeController@index');
Route::post('/add_over', 'OvertimeController@insert');
Route::put('/edit_over/{id}', 'OvertimeController@edit');
Route::delete('/del_over/{id}', 'OvertimeController@delete');
Route::get('/salary/{id}' ,'SalaryController@index')->name("salary.all");
Route::post('/add_sal', 'SalaryController@insert');
Route::put('/edit_sal/{id}', 'SalaryController@edit');
Route::delete('/del_sal/{id}', 'SalaryController@delete');
Route::get('/payroll', 'PayrollController@index');
Route::get('/payroll_delete/{id}', 'PayrollController@delete');
Route::get('/payroll_detail_each/view/{id}', 'PayrolldetailController@view');
Route::get('/payroll_detail_each/edit/{id}', 'PayrolldetailController@edit');
Route::put('/payroll_detail_each_edit/{id}', 'PayrolldetailController@update');
Route::get('/payroll_detail_each/delete/{id}', 'PayrolldetailController@delete');
Route::get('/payroll_detail/{id}', 'PayrolldetailController@index');
Route::get('/payroll_generate', 'PayrollController@generate');

Route::get('/position' ,'PositionController@index')->name("position.all");
Route::post('/add_pos', 'PositionController@insert');
Route::put('/edit_pos/{id}', 'PositionController@edit');
Route::delete('/del_pos/{id}', 'PositionController@delete');
Route::get('/schedule' ,'SchedulesController@index')->name("schedule.all");
Route::post('/schedule_add' ,'SchedulesController@insert');
Route::delete('/del_scd/{id}', 'SchedulesController@delete');
Route::put('/edit_scd/{id}', 'SchedulesController@edit');
Route::get('/user' ,'UserController@index');
Route::get('/department' ,'DepartmentController@index')->name("department.all");
Route::get('/dep_view/{id}','DepartmentController@view')->name("department.view");
Route::post('/add_dep', 'DepartmentController@insert');
Route::get('/delete_dep/{id}','DepartmentController@delete');
Route::put('/edit_dep/{id}','DepartmentController@edit');
Route::get('/role' ,'RoleController@index');
Route::get('/pwd' ,'PasswordController@index');
