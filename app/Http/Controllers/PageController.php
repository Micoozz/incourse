<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class PageController extends Controller
{
    //页面跳转控制器
    public function index(){
        if(Auth::guard("student")->user()){
            return Redirect::to("/learningCenter");
        }
    	return view('index');
    }
    public function media(){
    	return view('media.media');
    }
    public function addEmployeeFile(){
    	return view('admin.addEmployeeFile');
    }
    public function addStudentFile(){
    	return view('admin.addStudentFile');
    }
    public function employeeFile(){
    	return view('admin.employeeFile');
    }
    public function studentFile(){
    	return view('admin.studentFile');
    }
    public function teacherPersonData(){
    	return view('admin.teacherPersonData');
    }
    public function bonusList(){
    	return view('admin.BonusList');
    }
    public function exerciseManagement(){
    	return view('admin.ExerciseManagement');
    }
    public function sRewardEditor(){
    	return view('admin.SRewardEditor');
    }
    public function studentAchievement(){
    	return view('admin.StudentAchievement');
    }
    public function studentManagement(){
    	return view('admin.StudentManagement');
    }
    public function teacherTask(){
    	return view('admin.TeacherTask');
    }
    public function teachingManagement(){
    	return view('admin.TeachingManagement');
    }
    public function tRewardEditor(){
    	return view('admin.TRewardEditor');
    }
    public function uploadExercises(){
    	return view('admin.UploadExercises');
    }
    public function arrangementWork(){
    	return view('teacher.arrangementWork');
    }
    public function correctingGroupWork(){
    	return view('teacher.correctingGroupWork');
    }
    public function correctingHomepage(){
    	return view('teacher.correctingHomepage');
    }
    public function correctingMainContents(){
    	return view('teacher.correctingMainContents');
    }
    public function correctingPrimarycoverage(){
    	return view('teacher.correctingPrimarycoverage');
    }
    public function correctionPrimaryCoverage(){
    	return view('teacher.correctionPrimaryCoverage');
    }
    public function exerciseEditor(){
    	return view('teacher.exerciseEditor');
    }
    public function favorites(){
    	return view('teacher.favorites');
    }
    public function groupWorkMarshalling(){
    	return view('teacher.groupWorkMarshalling');
    }
    public function groupWorkScore(){
    	return view('teacher.groupWorkScore');
    }
    public function groupWorkScoreLoooked(){
    	return view('teacher.groupWorkScoreLoooked');
    }
    public function groupWorkViewjob(){
    	return view('teacher.groupWorkViewjob');
    }
    public function homeworkCorrecting(){
    	return view('teacher.homeworkCorrecting');
    }
    public function independentOperationAddJobSection(){
    	return view('teacher.independentOperationAddJobSection');
    }
    public function independentOperationAddJobSpecificContent(){
    	return view('teacher.independentOperationAddJobSpecificContent');
    }
    public function independentOperationAddTopic(){
    	return view('teacher.independentOperationAddTopic');
    }
    public function jobAnalysis(){
    	return view('teacher.jobAnalysis');
    }
    public function singleWorkViewjob(){
    	return view('teacher.singleWorkViewjob');
    }
    public function cuotibenObjectiveTodayYuwen(){
        return view('student.cuotibenObjectiveTodayYuwen');
    }
    public function test() {
        $files = array();
        $index = count($files);
        var_dump($_FILES);

        $files[$index]['srcName'] = $_FILES['exer-image']['name'];    //上传图片的原名字
        $files[$index]['error'] = $_FILES['exer-image']['error'];    //和该文件上传相关的错误代码
        $files[$index]['size'] = $_FILES['exer-image']['size'];        //已上传文件的大小，单位为字节
        $files[$index]['type'] = $_FILES['exer-image']['type'];        //文件的 MIME 类型，需要浏览器提供该信息的支持，例如"image/gif"
        $files[$index]['success'] = false;            //这个用于标志该图片是否上传成功
        $files[$index]['path'] = '';                //存图片路径

        // 接收过程有没有错误
        if($_FILES['exer-image']['error'] != 0) return;
        //判断图片能不能上传
        if(!is_uploaded_file($_FILES['exer-image']['tmp_name'])) {
            $files[$index]['error'] = 8000;
            return;
        }
        //扩展名
        $extension = '';
        if(strcmp($_FILES['exer-image']['type'], 'image/jpeg') == 0) {
            $extension = '.jpg';
        }
        else if(strcmp($_FILES['exer-image']['type'], 'image/png') == 0) {
            $extension = '.png';
        }
        else if(strcmp($_FILES['exer-image']['type'], 'image/gif') == 0) {
            $extension = '.gif';
        }
        else {
            //如果type不是以上三者，我们就从图片原名称里面去截取判断去取得(处于严谨性)    
            $substr = strrchr($_FILES['exer-image']['name'], '.');
            if(FALSE == $substr) {
                $files[$index]['error'] = 8002;
                return;
            }

            //取得元名字的扩展名后，再通过扩展名去给type赋上对应的值
            if(strcasecmp($substr, '.jpg') == 0 || strcasecmp($substr, '.jpeg') == 0 || strcasecmp($substr, '.jfif') == 0 || strcasecmp($substr, '.jpe') == 0 ) {
                $files[$index]['type'] = 'image/jpeg';
            }
            else if(strcasecmp($substr, '.png') == 0) {
                $files[$index]['type'] = 'image/png';
            }
            else if(strcasecmp($substr, '.gif') == 0) {
                $files[$index]['type'] = 'image/gif';
            }
            else {
                $files[$index]['error'] = 8003;
                return;
            }
            $extension = $substr;
        }

        //对临时文件名加密，用于后面生成复杂的新文件名
        $md5 = md5_file($_FILES['exer-image']['tmp_name']);
        //取得图片的大小
        $imageInfo = getimagesize($_FILES['exer-image']['tmp_name']);
        $rawImageWidth = $imageInfo[0];
        $rawImageHeight = $imageInfo[1];

        //设置图片上传路径，放在upload文件夹，以年月日生成文件夹分类存储，
        //rtrim(base_url(), '/')其实就是网站的根目录，大家自己处理
        $path = '/public/images/test/';
        //确保目录可写
        self::ensure_writable_dir($path);
        //文件名
        $name = "$md5.0x{$rawImageWidth}x{$rawImageHeight}{$extension}";
        //加入图片文件没变化到，也就是存在，就不必重复上传了，不存在则上传
        $ret = file_exists($path . $name) ? true : move_uploaded_file($_FILES['exer-image']['tmp_name'], $path . $name);
        if($ret === false) {
            $files[$index]['error'] = 8004;
            return;
        }
        else {
            $files[$index]['path'] = $path . $name;        //存图片路径
            $files[$index]['success'] = true;            //图片上传成功标志
            $files[$index]['width'] = $rawImageWidth;    //图片宽度
            $files[$index]['height'] = $rawImageHeight;    //图片高度
        }

        //将图片已json形式返回给js处理页面  ，这里大家可以改成自己的json返回处理代码
        echo json_encode(array(
            'files' => $files,
        ));
    }
/*********************************分割*************************************************/
//这里我附上ensure_writable_dir()函数的代码
/**
* 确保文件夹存在并可写
*
* @param string $dir
*/
    function ensure_writable_dir($dir) {
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