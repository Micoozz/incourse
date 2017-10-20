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
Route::post('/test','PageController@test');
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



		// questions/answer/upLoadCourseware/courseware/accuracy/accuracys/census/censuss/coursewareAnswer/coursewareAnswers/coursewareStatistics/coursewareStatisticss
		Route::get('/courseWare/main/{class_id?}/{course_id?}','TeachingCenterController@courseWare');
		Route::get('/courseWare/upLoadCourseware','TeachingCenterController@upLoadCourseware');
		Route::get('/courseWare/setQuestions','TeachingCenterController@setQuestions');
		Route::get('/courseWare/coursewareDetail','TeachingCenterController@coursewareDetail');
		Route::get('/courseWare/answerStart','TeachingCenterController@answerStart');
		Route::get('/courseWare/answerStartFreedom','TeachingCenterController@answerStart_freedom');
		Route::get('/courseWare/answerIng','TeachingCenterController@answerIng');
		Route::get('/courseWare/answerIngFreedom','TeachingCenterController@answerIng_freedom');
		Route::get('/courseWare/answerEnd','TeachingCenterController@answerEnd');
		Route::get('/courseWare/answerEndFreedom','TeachingCenterController@answerEnd_freedom');
		Route::get('/courseWare/showSolution','TeachingCenterController@showSolution');
		Route::get('/courseWare/showSolutionFreedom','TeachingCenterController@showSolution_freedom');




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
		Route::post('/getExerciseList/{page?}','ExerciseController@getExerciseList');
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
		/*Route::get('/review/{course?}','ExerciseBookController@review');//复习
		Route::get('/syncExercise/{course?}','ExerciseBookController@syncExercise');//同步练习*/
		Route::get('/freePractice/{course}/{parameter}','ExerciseBookController@freePractice');//复习、同类型练习
		Route::get('/foreExercise/{course?}','ExerciseBookController@foreExercise');//预习
		Route::get('/errorsExercise','ExerciseBookController@errorsExercise');//错题本
		Route::get('/collect','ExerciseBookController@collect');//收藏
	});
	Route::get('/logout','LoginController@logout');
});





