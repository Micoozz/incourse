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
Route::get('/', 'Controller@index')->name('login');
Route::post('/getScantronIdList','Teacher\TeachingCenterController@getScantronIdList');
Route::post('/','LoginController@login');
Route::post('/login','LoginController@login');
Route::group(['middleware' => "auth:school,employee,student"],function(){
	Route::get('/media','PageController@media');
	Route::get('/getCourse','Controller@getCourse');
	Route::post('/emailcode','Controller@emailcode');
	Route::get('/getCategroy','Controller@getCategroy');
	Route::get('/kit/captcha/{tmp}','Admin\ArchivesController@captcha');
	Route::get('/province/{id}','Admin\ArchivesController@province');
	Route::post('/email','Controller@emailSend');
	Route::post('/delFile','Controller@delFile');
	Route::post('/uploadImager','Controller@uploadImager');
	//云平台暂时使用
	Route::post('/platformEmail','Controller@platformEmail');
	Route::get('/auditPwd/{username?}','Controller@auditPwd');
	Route::get('/platform/{func?}/{parameter?}','Teacher\PlatformController@platform');
	Route::get('/getSectionAjax/{unit_id}','Controller@getSection');
	Route::group(['middleware' => 'school'],function(){
		//管理员平台
		Route::get('/adminArchives/{mod?}/{func?}/{employee?}','Admin\ArchivesController@adminArchives');
		Route::post('/adminArchives/uptatePwd','Admin\ArchivesController@updatePwd');
		Route::post('/addImage','Admin\ArchivesController@addImage');
		Route::post('/addAdmin','Admin\ArchivesController@addAdmin');
		Route::get('/forbid/{id}/{status}','Admin\ArchivesController@forbid');
		Route::get('/delEmployee/{id}','Admin\ArchivesController@delEmployee');
		Route::post('/emSearchy','Admin\ArchivesController@searchy');
		Route::get('/manageRole/{role}/{employee_id}','Admin\ArchivesController@manageRole');
		Route::get('/manageGroup/{gruop}/{employee}','Admin\ArchivesController@manageGroup');
		Route::get('/rechristen/{id}/{title}','Admin\ArchivesController@rechristen');
		Route::get('/addGroup/{group_id}/{title}','Admin\ArchivesController@addGroup');
		Route::get('/delGroup/{group_id}','Admin\ArchivesController@delGroup');
		Route::get('/resetPassEmployee/{id}','Admin\ArchivesController@resetPassEmployee');
	});
	Route::group(['middleware' => 'employee','namespace' => 'Teacher'],function(){
		Route::post('/test','TeachingCenterController@test');
		Route::get('/bindClass/{grade_id}','TeachingCenterController@bindClass');
		Route::get('/teachingCenter/{class_id?}/{course_id?}','TeachingCenterController@teachingCenter');
		Route::get('/homeworkManage/{class_id?}/{course_id?}','TeachingCenterController@homeworkManage');
		Route::get('/addHomework/{class_id?}/{course_id?}','TeachingCenterController@addHomework');
		Route::get('/addHomework-personal/{class_id?}/{course_id?}','TeachingCenterController@addHomeworkPer');
		Route::get('/showJobList{class_id?}/{course_id?}','TeachingCenterController@showJobList');
		Route::get('/exercise/{class_id?}/{course_id?}/{action?}','TeachingCenterController@exercise');
		Route::get('/uploadExercise/{class_id?}/{course_id?}/{exe_id?}','TeachingCenterController@uploadExercise');
		Route::get('/getEditExecrise/{exe_id}','TeachingCenterController@getEditExecrise');
		Route::get('/correct/{class_id?}/{course_id?}/{type?}/{unit_id?}/{section_id?}','TeachingCenterController@correct');
		Route::post('/createJob','TeachingCenterController@createJob');
		Route::post('/pubJob','TeachingCenterController@pubJob');
		Route::post('/addExercise','TeachingCenterController@addExercise');
		Route::post('/teacherBindClass','TeachingCenterController@teacherBindClass');
		Route::get('/correctWork/{class_id?}/{course_id?}/{job_id}','TeachingCenterController@correctWork');
		Route::get('/correctDetail/{class_id?}/{course_id?}/{work_id}','TeachingCenterController@correctDetail');
		Route::post('/uplaodCorrect','TeachingCenterController@uplaodCorrect');
		Route::post('/getExerciseList','TeachingCenterController@getExerciseList');

		Route::get('/addChapter','TeachingCenterController@addChapter');
		Route::get('/getChapter/{course_id}/{id}','TeachingCenterController@getChapter');
		Route::post('/createChapter','TeachingCenterController@createChapter');

		Route::get('/getTeacher/{school_id}','TeachingCenterController@getTeacher');



		
		
		Route::get('/courseWare/main/{class_id?}/{course_id?}','TeachingCenterController@courseWare');
		Route::get('/courseWare/upLoadCourseware/{class_id?}/{course_id?}/{edit?}','TeachingCenterController@upLoadCourseware');
		Route::get('/courseWare/setQuestions/{class_id?}/{course_id?}/{cw_id}','TeachingCenterController@setQuestions');
		Route::get('/courseWare/coursewareDetail/{class_id?}/{course_id?}/{cw_id}','TeachingCenterController@coursewareDetail');
		Route::get('/courseWare/answerStart/{class_id?}/{course_id?}/{cw_id?}/{exercise_id?}','TeachingCenterController@answerStart');
		Route::get('/courseWare/answerStartFreedom/{class_id?}/{course_id?}/{cw_id}','TeachingCenterController@answerStart_freedom');

		Route::get('/courseWare/layim/{class_id?}/{course_id?}','TeachingCenterController@layim');
		//答题器接口
		Route::get('/courseWare/index','TeachingCenterController@index');
		Route::get('/courseWare/create','TeachingCenterController@create');
		Route::get('/courseWare/store','TeachingCenterController@store');
		Route::get('/courseWare/show','TeachingCenterController@show');
		Route::get('/courseWare/coursewareExercise','TeachingCenterController@coursewareExercise');
		Route::get('/courseWare/addRefreshCards/{class_id?}/{course_id?}','TeachingCenterController@addRefreshCards');
		Route::post('/courseWare/addRefreshCards/bindCardId/{student_id?}/{scantron_id?}','TeachingCenterController@bindCardId');
		Route::post('/courseWare/createCourseware','TeachingCenterController@createCourseware');
		Route::post('/courseWare/subTrueScantron','TeachingCenterController@subTrueScantron');





		// Route::get('/learningCenter/{class_id?}/{course_id?}/{mod?}/{func?}/{universal?}','LearningCenterController@learningCenter');
		//档案管理员
		Route::get('/fileManager/{mod?}/{func?}/{parameter?}/{student?}','FileManagerController@fileManager');
		Route::post('/fileManager/uptatePwd','FileManagerController@updatePwd');
		Route::post('/fileManager/updateName','FileManagerController@updateName');
		Route::post('/createClass','FileManagerController@createClass');
		Route::post('/createGrade','FileManagerController@createGrade');
		Route::post('/addStudent','FileManagerController@addStudent');
		Route::get('/delStudent/{id}','FileManagerController@delStudent');
		Route::get('/resetPasswork/{id}','FileManagerController@resetPasswork');
		Route::get('/employeeStatus/{id}','FileManagerController@employeeStatus');
		Route::post('/addTeacher','FileManagerController@addTeacher');
		Route::get('/learningCenters/{class_id?}/{course_id?}/{mod?}/{func?}','LearningCenterController@learningCenter');
		Route::post('/uploadExercise','TeachingCenterController@uploadExercise');
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
		Route::get('/showExerciseList/{course}/{page?}','ExerciseController@showExerciseList');
	});
	//学生平台
	Route::group(['middleware' => 'student','namespace' => 'student'],function(){
		//学生作业	
		Route::get('/selectClass/{grade_id}','LearningCenterController@selectClass');
		Route::get('/todayWork/{func?}/{parameter?}','LearningCenterController@todayWork');
		Route::get('/workList/{course?}/{page?}','LearningCenterController@workList');
		Route::get('/routineWork\{work_id}','LearningCenterController@routineWork');
		Route::get('/doHomework/{work_id?}','LearningCenterController@doHomework');
		Route::get('/homotypology/{exercise_id?}/{work_id?}/{accuracy?}/{increase?}','LearningCenterController@homotypology');//同类型习题推送
		Route::get('/workScore/{work_id}','LearningCenterController@workScore');
		Route::post('/sameScore','LearningCenterController@sameScore');
		Route::get('/learningCenter/{course?}/{mod?}/{func?}/{parameter?}/{exercise_id?}/{several?}','LearningCenterController@learningCenter');
		Route::post('/homeworkScores','LearningCenterController@homeworkScores');
		Route::post('/todayWork/uptatePwd','LearningCenterController@updatePwd');
		Route::post('/studentSelectClass','LearningCenterController@studentSelectClass');
		//习题本
		Route::get('/foreExerciseDoWork/{course?}','ExerciseBookController@foreExerciseDoWork');//预习做题页
		Route::get('/submitResuitForeExercise/{course?}','ExerciseBookController@submitResuit_foreExercise');//提交展示结果
		Route::get('/errorsExerciseShowAnalysis/{course?}','ExerciseBookController@errorsExerciseShowAnalysis');//错题本查看解析
		Route::get('/collect','ExerciseBookController@collect');//收藏
		Route::post('/addWorkExercise', 'ExerciseBookController@addWorkExercise');

		Route::get('/foreExercise/{course}/{type}', 'ExerciseBookController@foreExercise');//预习
		Route::get('/freePractice/{course?}/{type_id?}','ExerciseBookController@freePractice');//同类练习及复习
		Route::get('/errorsExercise/{course?}/{type_id?}','ExerciseBookController@errorsExercise');//错题本
		Route::get('/chapterErrorExercise/{type_id?}/{course?}/{chapter?}/{several?}','ExerciseBookController@chapterErrorExercise');
		Route::get('/errorExerciseInfo/{type_id}/{course}/{exe_id}', 'ExerciseBookController@errorExerciseInfo');
		Route::get('/practice/{course}/{chapter}/{type_id}/{several?}', 'ExerciseBookController@practice');//复习同类型预习错题本练习
		Route::get('/correctExercise/{exe_id}', 'ExerciseBookController@correctExercise');
	});
	Route::get('/logout','LoginController@logout');
});





