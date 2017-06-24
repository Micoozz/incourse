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
// Route::get('/test','Student\WorkController@test');
Route::get('/', 'PageController@index')->name('login');
Route::post('/login','LoginController@login');
Route::group(['middleware' => "auth:school,employee,student"],function(){
	Route::get('/media','PageController@media');
	Route::get('/getCourse','Controller@getCourse');
	Route::get('/getCategroy','Controller@getCategroy');
	Route::group(['middleware' => 'school'],function(){
		Route::get('/addEmployeeFile','PageController@addEmployeeFile');
		Route::get('/addStudentFile','PageController@addStudentFile');
		Route::get('/employeeFile','PageController@employeeFile');
		Route::get('/studentFile','PageController@studentFile');
		Route::get('/teacherPersonData','PageController@teacherPersonData');
		Route::get('/BonusList','PageController@bonusList');
		Route::get('/ExerciseManagement','PageController@exerciseManagement');
		Route::get('/SRewardEditor','PageController@sRewardEditor');
		Route::get('/StudentAchievement','PageController@studentAchievement');
		Route::get('/StudentManagement','PageController@studentManagement');
		Route::get('/TeacherTask','PageController@teacherTask');
		Route::get('/TeachingManagement','PageController@teachingManagement');
		Route::get('/TRewardEditor','PageController@tRewardEditor');
		Route::get('/UploadExercises','PageController@uploadExercises');
	});
	Route::group(['middleware' => 'employee'],function(){
		Route::get('/arrangementWork','PageController@arrangementWork');
		Route::get('/correctingGroupWork','PageController@correctingGroupWork');
		Route::get('/correctingHomepage','PageController@correctingHomepage');
		Route::get('/correctingMainContents','PageController@correctingMainContents');
		Route::get('/correctingPrimarycoverage','PageController@correctingPrimarycoverage');
		Route::get('/correctionPrimaryCoverage','PageController@correctionPrimaryCoverage');
		Route::get('/exerciseEditor','PageController@exerciseEditor');
		Route::get('/favorites','PageController@favorites');
		Route::get('/groupWorkMarshalling','PageController@groupWorkMarshalling');
		Route::get('/groupWorkScore','PageController@groupWorkScore');
		Route::get('/groupWorkScoreLoooked','PageController@groupWorkScoreLoooked');
		Route::get('/groupWorkViewjob','PageController@groupWorkViewjob');
		Route::get('/homeworkCorrecting','PageController@homeworkCorrecting');
		Route::get('/independentOperationAddJobSection','PageController@independentOperationAddJobSection');
		Route::get('/independentOperationAddJobSpecificContent','PageController@independentOperationAddJobSpecificContent');
		Route::get('/independentOperationAddTopic','PageController@independentOperationAddTopic');
		Route::get('/jobAnalysis','PageController@jobAnalysis');
		Route::get('/singleWorkViewjob','PageController@singleWorkViewjob');
		Route::get('/showExerciseList/{course}/{page?}','Teacher\ExerciseController@showExerciseList');
		Route::post('/getExerciseList/{page?}','Teacher\ExerciseController@getExerciseList');
		Route::post('/createExercise','Teacher\ExerciseController@createExercise');
		Route::post('/createJob','Teacher\JobController@createJob');
		Route::post('/pubJob','Teacher\JobController@pubJob');
		Route::get('/showJobList/{page?}','Teacher\JobController@showJobList');
	});
	Route::group(['middleware' => 'student'],function(){
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
		Route::get('/cuotiben',function(){
			return view('student.cuotibenObjectiveTodayYuwen');
		});
		Route::get('/showWorkList/{course}/{page?}','Student\WorkController@showWorkList');
		Route::get('/showWorkDetail/{work_id}','Student\WorkController@showWorkDetail');
		Route::post('/subWork','Student\WorkController@subWork');
		Route::get('/showScore/{work_id}','Student\WorkController@showScore');
		Route::get('/showWorkObjectiveDetail/{work_id}','Student\WorkController@showWorkObjectiveDetail');
		Route::get('/cuotibenObjectiveTodayYuwen','PageController@cuotibenObjectiveTodayYuwen');
	});
	Route::get('/logout','LoginController@logout');
});

