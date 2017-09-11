<?php
namespace App\Http\Controllers\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Region;
use Hash;
use Auth;
class PlatformController extends Controller
{
	const FUNC_PLATFORM_PWD = 'platform-pwd';
	const FUNC_PLATFORM_EMAIL = 'platform-email';
	const FUNC_PLATFORM_SUCCEED = 'platform-success';
	const FUNC_STUDENT_INFO = 'student-info';
	const FUNC_TEACHER_INFO = 'Teacher-info';

	public function platform($func = 'platform-pwd'){
		if ($user = Auth::guard('employee')->user()) {
			$personnel = 1 ;
		}else{
			$user = Auth::guard('student')->user();
			$personnel = 2 ;
		}
		
		if (Hash::check('123456', $user->password)){
                $func = Self::FUNC_PLATFORM_PWD;
        }else{
        	if ($func == Self::FUNC_PLATFORM_EMAIL) {
        		
        	}elseif ($func == Self::FUNC_PLATFORM_SUCCEED){

        	}elseif ($func == Self::FUNC_STUDENT_INFO) {
				        		
        	}elseif ($func == Self::FUNC_TEACHER_INFO) {
        			
        	}
        }
		return view('platforms.platform',compact('func','provinces','personnel'));
	}
}