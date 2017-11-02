@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{asset('css/exercise.css')}}"/>
<style>
    .error-book-title {
        font-size: 18px;
    }
    .error-book-date {
        margin-left: 15px;
    }
    .examineAnalysis{
    	float: right;
    	line-height: 17px;
    	font-size: 14px;
    }
    .examineAnalysis i{
    	font-size: 16px;
    	margin-right: 8px;
    }
    .examineAnalysis a{
    	color: #168bee;
    }
</style>
@endsection
@section('NOTEBOOK')
<!--习题库-->
<div class="admin-container exer-room pageType">
    <div class="p-r exercise-room">
        <div class="error-book-introduce">
            <p class="error-book-title">
                <b>第一章节 数与代数</b>
            </p>
            <p class="fs14">
                <span>第一小节 数与代数</span>
                <span class="error-book-date">06.27作业</span>
            </p>
        </div>

        <!--题目列表-->
        <div class="exer-list myCollect">
            @foreach($data as $errorExercise)
            <div class="exer-in-list border" data-id="{{$errorExercise['id']}}">
                <div class="exer-head">
                    <span class="exer-type-list">{!!$errorExercise['categroy_title']!!}</span>
                </div>
                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">{!!$errorExercise['subject']!!}</div>
                    </div>
                    <div class="clear answer-box">
                        @if($errorExercise['categroy_id'] == 1 || $errorExercise['categroy_id'] == 2)
                        <!--单选题 || 多选题-->
                        <span class="f-l">答案：</span>
                        <div class="f-l">
                            <ul class="radio-wrap exer-list-ul">
                                @foreach($errorExercise['options'] as $option)
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="p-a"></i>
                                        <input type="radio" name="radio" value="{{ $abcList[$loop->index] }}"/>
                                    </label>
                                    <span class="f-l">{{ $abcList[$loop->index] }}：</span>
                                    <p class="f-l option">{!!$option[key($option)]!!}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @elseif($errorExercise['categroy_id'] == 4)
                        <!-- 判断题 -->
                        <span class="f-l">答案：</span>
                        <div class="f-l">
                            <ul class="fs14 pan-duan">
                                <li>
                                    <i class="uploadExerIcons right"></i>
                                    <span class="gray pan-duan-answ">正确</span>
                                </li>
                                <li>
                                    <i class="uploadExerIcons wrong"></i>
                                    <span class="pan-duan-answ">错误</span>
                                </li>
                            </ul>
                        </div>
                        @elseif($errorExercise['categroy_id'] == 5)
                        <!--连线题-->
                        <span class="f-l">答案：</span>
                        <div class="f-l box_hpb">
                            <div class="line_hpb">
                                <ul class="question_hpb">
                                    <li style="top:0;">湖广会馆放到奋斗奋斗方法</li>
                                    <li style="top:54px;">大妈</li>
                                    <li style="top:108px;">大嫂</li>
                                </ul>
                                <div class="container_hpb">
                                    <canvas class="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
                                    <canvas class="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
                                </div>
                                <ul class="answer_hpb">
                                    <li style="top:0;">哥哥</li>
                                    <li style="top:54px;">大姨</li>
                                    <li style="top:108px;">大妈</li>
                                </ul>
                            </div>
                        </div>
                        @elseif($errorExercise['categroy_id'] == 6)
                        <!--排序题-->
                        <span class="f-l">答案：</span>
                        <div class="f-l">
                            <ul class="exer-list-ul">

                            </ul>
                        </div>
                        @elseif(
                            $errorExercise['categroy_id'] == 3 ||
                            $errorExercise['categroy_id'] == 7 ||
                            $errorExercise['categroy_id'] == 8 ||
                            $errorExercise['categroy_id'] == 9 ||
                            $errorExercise['categroy_id'] == 10 ||
                            $errorExercise['categroy_id'] == 11)
                        <!--填空题 || 完形填空 || 画图题 || 简答题 || 作文题 || 解答题-->
                        @endif
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
	                        <span>
	                            <i class="fa fa-star active"></i>
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star"></i>
	                            <i class="fa fa-star"></i>
	                        </span>
                        </div>
                        <span class="examineAnalysis"><a href="/errorExerciseInfo/{{ $type_id }}/{{ $courseFirst[0]['id'] }}/{{ $errorExercise['id'] }}" title=""><i class="fa fa-eye"></i>查看</a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button class="btn-white btn-center" onclick="window.history.go(-1)">返 回</button>
    </div>
</div>
@endsection

@section('JS:OPTIONAL')



@endsection