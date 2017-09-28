<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Gregwar\Captcha\CaptchaBuilder; 
use App\Models\School;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Course;
use App\Models\Categroy;
use Illuminate\Support\Facades\Mail;
use Auth;
use Input;
use Session;
use Cookie;
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
    	$categroy_list = Categroy::where("course_id","like","%{$course_id}%")->pluck('title','id');
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
  //  }
    protected function modifyConfFile(string $path,int $begin,array $data){
    	$code = 200;
    	$confPath = base_path($path);
    	$contentArray = collect(file($confPath,FILE_IGNORE_NEW_LINES))->toArray();
    	array_splice($contentArray,$begin,0,$data);
    	$content = implode($contentArray, "\n");
		\File::put($confPath, $content);
		return $code;
    }
     public function captcha($tmp) {  
        //生成验证码图片的Builder对象，配置相应属性  
        $builder = new CaptchaBuilder;  
        //可以设置图片宽高及字体  
        $builder->build($width = 100, $height = 40, $font = null);  
        //获取验证码的内容  
        $phrase = $builder->getPhrase();
        //把内容存入session 
        Session::flash('milkcaptcha', $phrase);
        // $cookie = Cookie::forever('milkcaptcha',$phrase); 
        //dd($cookie); 
        //生成图片  
        header("Cache-Control: no-cache, must-revalidate");  
        header('Content-Type: image/jpeg'); 
        // return $cookie;
        header('Set-Cookie:milkcaptcha='.$phrase.'; expires=Sat, 17-Jul-2017 09:34:35 GMT; Max-Age=157680000; path=/');
        $builder->output();  
    } 

    //验证码验证
    public function emailcode(){
        $input = Input::get();
        if($input['data'] == "" || Session::get('milkcaptcha') != $input['data']){
            $result = 201;
        }else{
            $result = 200;
        }
        return json_encode($result);
    }

    //发送邮件
    public function emailSend(){
        $input = Input::get();
        if ($user = Auth::guard('school')->user()) {
            $name = $input['data']['schoolName'];//这里填写学校名称
            $email = 'http://localhost/adminArchives/manager-archives/manager-navigstion/'.$input['data']['email'];
        if (empty($user->city)) {
                $user->city = $input['data']['city'];
                $user->title = $input['data']['schoolName'];
                $user->save();
            }
        }else if($user = Auth::guard('employee')->user()){
            $name = $user->name;
            $email = 'http://localhost/fileManager/student-file/student-list/'.$input['data']['email'];
        }else if ($user = Auth::guard('student')->user()){
            $name = $user->name;
            $email = 'http://localhost/todayWork/1/'.$input['data']['email'];
        }
        $flag = Mail::send('emails.test',['name' => $name,'email' =>$email],function($message){
        $input = input::get();          
        $to = $input['data']['email'];
        $message ->to($to)->subject('邮件测试');
        }); 
        $result = 200;
        return json_encode($result);
    }
    //审核密码
    public function auditPwd($username){
        if ($user = Auth::guard('school')->user()) {
            $school = School::where('username',$username)->get()->toArray();
            if ($school) {
                $result = 0;
            }else{
                 $result = 1;
            }
        }elseif ($user = Auth::guard('student')->user()) {
            $student = Student::where('username',$username)->get()->toArray();
            if ($student) {
                $result = 0;
            }else{
                 $result = 1;
            }
        }elseif ($user = Auth::guard('employee')->user()) {
           $employee = Employee::where('username',$username)->get()->toArray();
            if ($employee) {
                $result = 0;
            }else{
                 $result = 1;
            }
        }
        return json_encode($result);
    }
    protected function send_post($url, $post_data) {    
        header("Content-type:text/html;charset=utf-8");  
          
        $ch = curl_init ();  //初始化curl  
          
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );  //使用post请求  
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );  
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );  
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data);  //提交数据  
        curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true);  //重定向地址也输出  
        $return = curl_exec ( $ch ); //得到返回值  
          
        curl_close ( $ch );  //关闭  
          
        return $return;  //输出返回值    
    }
    public function test(){
        $input = Input::get();
        dd($input);
    }
}
