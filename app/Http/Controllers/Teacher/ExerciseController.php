<?php 

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use App\Models\Exercises;
use App\Models\Objective;
use App\Models\Subjective;
use App\Models\Compositive;
use App\Models\Categroy;
class ExerciseController extends Controller
{
    public function showExerciseList($page = 1){
        $limit = ($page-1)*5;
        $exercise_all = Exercises::all();
        $pageLength = intval($exercise_all->count()/5)+1;
        $exercise_list = Exercises::skip($limit)->take(5)->get();
        $data = array('total' => $exercise_all->count(),'pageLength' => $pageLength,'exercises' => array());
        foreach ($exercise_list as $exercise) {
            $cate_title = Categroy::find($exercise->categroy_id)->title;
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $subjective = Subjective::where('exe_id',$exercise->id)->first();
                array_push($data['exercises'],array('id' => $exercise->id,'cate_title' => $cate_title,'subject' => $subjective->subject,'answer' => '自由发挥','score' => $exercise->score/100));
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $answers = array();
                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
                    $answer_list = explode(',',$objective->answer);
                    foreach ($answer_list as $key => $answer) {
                        array_push($answers,array_keys(json_decode($objective->option,true)[(int)$answer-1])[0]);
                    }
                }else{
                    array_push($answers,explode(',',$objective->answer));
                }
                array_push($data['exercises'],array('id' => $exercise->id,'cate_title' => $cate_title,'subject' => $objective->subject,'options' => json_decode($objective->option),'answer' => $answers,'score' => $exercise->score/100));
                
            }
//          else{
//              
//          }
        }
        return json_encode($data);
    }

    public function getExerciseList($page = 1){
        $input = Input::get();
        $limit = ($page-1)*5;
        $exercise_id_arr = explode(',',$input['exercise_id']);
        $exercise_id = array_slice($exercise_id_arr,$limit,5);
        $pageLength = intval(count($exercise_id_arr)/5)+1;
        $data = array('total' => count($exercise_id_arr),'pageLength' => $pageLength,'exercises' => array());
        foreach ($exercise_id as $eid) {
            $exercise = Exercises::find($eid);
            $cate_title = Categroy::find($exercise->categroy_id)->title;
            if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $subjective = Subjective::where('exe_id',$exercise->id)->first();
                array_push($data['exercises'],array('id' => $exercise->id,'cate_title' => $cate_title,'subject' => $subjective->subject,'answer' => '自由发挥','score' => $exercise->score/100));
            }else if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = Objective::where('exe_id',$exercise->id)->first();
                $answers = array();
                if($exercise->categroy_id == Exercises::CATE_CHOOSE || $exercise->categroy_id == Exercises::CATE_RADIO){
                    $answer_list = explode(',',$objective->answer);
                    foreach ($answer_list as $key => $answer) {
                        array_push($answers,array_keys(json_decode($objective->option,true)[(int)$answer-1])[0]);
                    }
                }else{
                    array_push($answers,explode(',',$objective->answer));
                }
                array_push($data['exercises'],array('id' => $exercise->id,'cate_title' => $cate_title,'subject' => $objective->subject,'options' => json_decode($objective->option),'answer' => $answers,'score' => $exercise->score/100));
                
            }
        }
        return json_encode($data);
    }
    public function createExercise(){
        $input = Input::get();
        $user = Auth::guard('employee')->user();
        $time = time();
        $code = 200;
        try{
            $exercise = new Exercises;
            $exercise->teacher_id = $user->id;
            $exercise->school_id = $user->school_id;
            $exercise->course_id =  intval($input['course']);
            $exercise->score = intval($input['score'])*100;
            $exercise->categroy_id = intval($input['categroy']);
            $exercise->updata_time = $time;
            if($exercise->categroy_id == Exercises::CATE_RADIO ||
                $exercise->categroy_id == Exercises::CATE_CHOOSE || 
                $exercise->categroy_id == Exercises::CATE_LINE || 
                $exercise->categroy_id == Exercises::CATE_SORT || 
                $exercise->categroy_id == Exercises::CATE_JUDGE ||
                $exercise->categroy_id == Exercises::CATE_FILL)
            {
                $exercise->exe_type = Exercises::TYPE_OBJECTIVE;
            }
            else if($exercise->categroy_id == Exercises::CATE_COMPOSITIVE)
            {
                $exercise->exe_type = Exercises::TYPE_COMPOSITIVE;
            }
            else
            {
                $exercise->exe_type = Exercises::TYPE_SUBJECTIVE;
            }
            $exercise->save();
            if($exercise->exe_type == Exercises::TYPE_OBJECTIVE){
                $objective = new Objective(['subject' => $input['subject'],'option' => isset($input['option']) ? json_encode($input['option'],JSON_UNESCAPED_UNICODE) : null,'answer' => isset($input['answer']) ? $input['answer'] : null]);
                $exercise->hasManyObjective()->save($objective);
            }else if($exercise->exe_type == Exercises::TYPE_SUBJECTIVE){
                $subjective = new Subjective(['subject' => $input['subject']]);
                $exercise->hasManySubjective()->save($subjective);
            }else{
                $compositive = new Compositive(['content' => $input['subject']]);
                $exercise->hasOneCompositive()->save($compositive);
                $exercise->hasManySubjective()->create($input['subjective']);
                $exercise->hasManyObjective()->create($input['objective']);
            }
         }catch(\Exception $e){
            $code = 201;
         }
        $data = array('code' => $code);
        return json_encode($data);
    }
}
