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

Route::get('/', 'PageController@index')->name('login');
Route::group(['middleware' => "auth:school,employee,student"],function(){
	Route::get('/media','PageController@media');
	Route::get('/logout','LoginController@logout');
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
Route::get('/teacherPersonData',function(){
	return view('admin.teacherPersonData');
});
Route::get('/Teaching',function(){
	return view('admin.Teaching');
});
Route::get('/Teaching1',function(){
	return view('admin.Teaching1');
});
Route::get('/Teaching2',function(){
	return view('admin.Teaching2');
});
Route::get('/Teaching3',function(){
	return view('admin.Teaching3');
});
Route::get('/Teaching4',function(){
	return view('admin.Teaching4');
});
Route::get('/Teaching5',function(){
	return view('admin.Teaching5');
});
Route::get('/Teaching6',function(){
	return view('admin.Teaching6');
});
Route::get('/edit',function(){
	return view('admin.edit');
});
Route::get('/questionBank',function(){
	return view('admin.questionBank');
	
	
});
Route::get('/questionBank1',function(){
	return view('admin.questionBank1');
});
Route::get('/danrenzuoye-chengji',function(){
	return view('student.danrenzuoye-chengji');
});
Route::get('/xiaozuzuoye-chakanzhengji',function(){
	return view('student.xiaozuzuoye-chakanzhengji');
});
Route::get('/xiaozuzuoye-zirenwu',function(){
	return view('student.xiaozuzuoye-zirenwu');
});
Route::get('/zuoyeben-index',function(){
	return view('student.zuoyeben-index');
});
Route::get('/zuoyenbenneirongliebiao',function(){
	return view('student.zuoyenbenneirongliebiao');
});
Route::post('/login','LoginController@login');