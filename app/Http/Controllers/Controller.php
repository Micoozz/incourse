<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Gregwar\Captcha\CaptchaBuilder; 
use Illuminate\Support\Facades\Mail;

use Auth;
use Input;
use Session;
use PDO;
use Redirect;
use App\Models\Chapter;
use App\Models\School;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Course;
use App\Models\Category;
use App\Models\Exercise;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        if(Auth::guard("student")->user()){
            return Redirect::to("/learningCenter");
        }elseif(Auth::guard("employee")->user()){
            return Redirect::to("/teachingCenter");
        }elseif (Auth::guard("school")->user()) {
            return Redirect::to("/adminArchives");
        }
        return view('index');
    }
    public function getCourse(){
    	$course_list = Course::all();
    	return $course_list;
    }
    public function getCategory($course_id){
    	$categroy_list = Category::where("course_id","like","%{$course_id}%")->pluck('title','id');
    	return $categroy_list;
    }
    public function getUnit($course_id){
    	$grade_list = Chapter::where('parent_id',1)->pluck('id');
    	$unit_list = Chapter::whereIn('parent_id',$grade_list)->where('course_id',$course_id)->pluck('title','id');
    	return $unit_list;
    }
    public function getSection($unit_id){
    	$section_list = Chapter::where('parent_id',$unit_id)->pluck('title','id');
    	return $section_list;
    }
    protected function createDatabase($baseNum){
    	$servername = "10.110.18.111"; 
		$username = "root"; 
		$password = "root"; 
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
    /*获取同类型习题*/
    protected function getSameTypeExercise($eid){
        $exercise = Exercise::find($eid);
        $exercise_list = Exercise::where(['chapter_id' => $exercise->chapter_id,'categroy']);
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
    /*图片上传公用函数*/
    public function uploadFile($path,$name) {
        $files['srcName'] = $_FILES['file']['name'];    //上传图片的原名字
        $files['error'] = $_FILES['file']['error'];    //和该文件上传相关的错误代码
        $files['success'] = false;            //这个用于标志该图片是否上传成功
        $files['path'] = '';                //存图片路径

        // 接收过程有没有错误
        if($_FILES['file']['error'] != 0) return;
        //判断图片能不能上传
        if(!is_uploaded_file($_FILES['file']['tmp_name'])) {
            $files['error'] = 201;
            return;
        }
        //扩展名
        $extension = '';    
        $substr = strrchr($_FILES['file']['name'], '.');
        if(FALSE == $substr) {
            $files['error'] = 202;
            return;
        }
        if($substr != '.jpg' && $substr != '.jpeg' && $substr != '.png' && $substr != '.gif' && $substr != '.psd' && $substr != '.mp3' && $substr != '.mp4' && $substr != '.avi' && $substr != '.doc' && $substr != '.docx' && $substr != '.xlsx' && $substr != '.xls' && $substr != '.pdf'){
            $files['error'] = 202;
            return;
        }
        $extension = $substr;

        //对临时文件名加密，用于后面生成复杂的新文件名
        $md5 = md5_file($_FILES['file']['tmp_name']);

        //设置图片上传路径，放在upload文件夹，以年月日生成文件夹分类存储，
        //rtrim(base_url(), '/')其实就是网站的根目录，大家自己处理
        //确保目录可写
        self::ensure_writable_dir($path);
        //文件名 $md5.0x{$rawImageWidth}x
        $name = "{$name}{$extension}";
        //加入图片文件没变化到，也就是存在，就不必重复上传了，不存在则上传
        $ret = file_exists($path . $name) ? true : move_uploaded_file($_FILES['file']['tmp_name'], $path . $name);
        if($ret === false) {
            $files['error'] = 8004;
            return;
        }
        else {
            $files['path'] = $path . $name;        //存图片路径
            $files['success'] = true;            //图片上传成功标志
        }
        //将图片已json形式返回给js处理页面  ，这里大家可以改成自己的json返回处理代码
        return $files['path'];
       /* return json_encode(array(
            'files' => $files['path'],
        ));*/
    }
    /*********************************分割*************************************************/
    //这里我附上ensure_writable_dir()函数的代码
    /**
    * 确保文件夹存在并可写
    *
    * @param string $dir
    */
    private function ensure_writable_dir($dir) {
        if(!file_exists($dir)) {
            mkdir($dir, 0766, true);
            chmod($dir, 0766);
            chmod($dir, 0777);
        }
        else if(!is_writable($dir)) {
            chmod($dir, 0766);
            chmod($dir, 0777);
            if(!is_writable($dir)) {
                throw new FileSystemException("目录 $dir 不可写");
            }
        }
    }
}
