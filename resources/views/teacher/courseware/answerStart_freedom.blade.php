@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/teacher/answer.css') }}"/>
<style>
    #mainBarBlue{
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
@endsection
@section('COURSEWARE_CONTENT')
<div class="black-bg hw-title">title</div>
<div class="hw-time-box">
    <div class="p-r">
        <p class="p-a exer-num">
            <span class="ic-blue big-num">1</span>
            <span class="gray">/12</span>
            <span id="countDowns" class="time">倒计时:<b></b></span>
        </p>
    </div>
</div>
<!--创建班级-->

<div class="do-hw-wrap clear">

    <!--内容主体-->
    <div class="do-hw-wrap clear">
        <!--中间内容-->
        <div class="f-l do-hw">
            <div class="of-h p-r view">
                <ul class="ic-inline p-a exercise-box">
    				 <!--单选题-->
                    <li data-id="1" class="exer-in-list dan-xuan-only">
                        <div>
                            <span class="f-l">选项：</span>
                            <ul class="radio-wrap exer-list-ul dan-xuan-options" id="optionsList">
                            </ul>
                        </div>
                    </li>
    			 </ul>
            </div>
    		<div id="answerInstrument" data-r-answer=''>
                <ul>
                    <li>
                        <div class="ta-c">
                            <button class="ic-btn btnStart" id="btnStart">开始答题</button>
                        </div>
                    </li>
                    <li>
                        <div class="mains">
                            <div>
                                <span class="isSubmitted"><b></b>人已提交</span>
                                <span class="notSubmitted"><b>{{count($data->student_list)}}</b>人未提交</span>
                            </div>
                            <div id="mainPie" style="width: 1000px;height:400px;"></div>
                        </div>
                        <div class="ta-c">
                            <button class="ic-btn noEnd" id="showStatistics">查看统计</button>
                            <button id="terminationTime" class="ic-btn">终止计时</button>
                        </div>
                    </li>
                    <li>
                        <div id="mainBarBlue" style="width: 1000px;height:340px;" ></div>
    					<div class="rido clear">
    						<span class="title">正确答案</span>
    						<div class="ic-blue" id="checkAnswer">
    						</div>
    					</div>
                        <div class="ta-c" id="freedomEndBtn">
                            <button class="ic-btn" id="showAnswer">确认答案</button>
                        </div>
                    </li>
                    <li>
                        <div id="mainBar" style="width: 1000px;height:400px;"></div>
                        <div class="ta-c">
                            <button class="ic-btn" id="jumpBack">上一步</button><a href="/courseWare/setQuestions/{{$class_id}}/{{$course_id}}/{{$cw_id}}" title=""><button class="ic-btn" style="width:85px">编辑下一题</button></a><a href="/courseWare/coursewareDetail/{{$class_id}}/{{$course_id}}/{{$cw_id}}"><button class="btn-white ">返回课件</button></a>
                        </div>
                    </li>
                </ul>
            </div>
    		@include('teacher.template.courseware_echarts_tips')
    	 </div>
    </div>
    @include('teacher.template.courseware_echarts_tips')
</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="{{ asset('js/teacher/coursewareIng.js') }}"></script>

@endsection
