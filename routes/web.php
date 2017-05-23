<?php

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
    return view('index');
});
Route::get('/addEmployeeFile',function() {
	return view('admin.addEmployeeFile');
});
Route::get('/addStudentFile',function(){
	return view('admin.addStudentFile');
});
Route::get('/employeeFile',function(){
	return view('admin.employeeFile');
});
Route::get('/studentFile',function(){
	return view('admin.studentFile');
});