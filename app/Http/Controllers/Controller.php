<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Course;
use App\Models\Categroy;
use App\Models\Chapter;
use PDO;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getCourse(){
    	$course_list = Course::all();
    	return $course_list;
    }
    public function getCategroy($course_id){
    	$categroy_list = Categroy::where("course_id","like","%{$course_id}%")->get();;
    	return $categroy_list;
    }
    public function getUnit(){
    	$grade_list = Chapter::where('parent_id',1)->pluck('id');
    	$unit_list = Chapter::whereIn('parent_id',$grade_list)->pluck('title','id');
    	return $unit_list;
    }
    public function getSection($unit_id){
    	$section_list = Chapter::where('parent_id',$unit_id)->pluck('title','id');
    	return $section_list;
    }
    protected function createDatabase($baseNum){
    	$servername = "localhost"; 
		$username = "root"; 
		$password = "gogo1993"; 
		$code = 200;

		try { 
		    $conn = new PDO("mysql:host=".$servername, $username, $password); 

		    // 设置 PDO 错误模式为异常 
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		    $sql = "CREATE DATABASE stu_work_info_".$baseNum." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;"; 

		    // 使用 exec() ，因为没有结果返回 
		    $conn->exec($sql); 
 
		} 
		catch(PDOException $e) 
		{ 
		    $code = 201; 
		} 

		$conn = null; 
		return $code;
    }
  //   protected function modifyEnv(array $data){
  //   	$envPath = base_path('.env');
		// $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
		// foreach ($data as $key => $value) {
		// 	array_add($contentArray,count($contentArray),$value);
		// }
		// $content = implode($contentArray->toArray(), "\n");
		// \File::put($envPath, $content);
  //   }
    protected function modifyConfFile(string $path,int $begin,array $data){
    	$code = 200;
    	$confPath = base_path($path);
    	$contentArray = collect(file($confPath,FILE_IGNORE_NEW_LINES))->toArray();
    	array_splice($contentArray,$begin,0,$data);
    	$content = implode($contentArray, "\n");
		\File::put($confPath, $content);
		return $code;
    }
}
