@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/teacher/answer.css') }}"/>
@endsection
@section('COURSEWARE_CONTENT')
    <!--内容主体-->
    <div class="do-hw-wrap clear">
        <!--中间内容-->
        <div class="f-l do-hw">
            <div class="of-h p-r view">
                <ul class="ic-inline p-a exercise-box">
					 <!--单选题-->
                    <li data-id="1" class="exer-in-list dan-xuan-only">
                        <div class="clear hw-question">
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">{{$data->exercise->cate_title}}</span>
                                ）</span>
                            <span>{!!$data->exercise->subject!!}下列各句中，标点符号使用正确的一项是（）</span>
                        </div>
                        @include('teacher.template.courseware_answer')
                    </li>
				 </ul>
            </div>
            <div id="answerInstrument" data-r-answer="{{json_encode($data->exercise->answer,JSON_UNESCAPED_UNICODE)}}">
                <ul>
                    <li>
                        <div class="ta-c">
                            <button class="ic-btn btnStart">开始答题</button>
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
                        <div id="mainBarBlue" style="width: 1000px;height:400px;"></div>
                        <div class="ta-c">
                            <button class="ic-btn" id="showAnswer">显示答案</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/courseWare/coursewareDetail/{{$class_id}}/{{$course_id}}/{{$cw_id}}"><button class="btn-white ">返回课件</button></a>
                        </div>
                    </li>
                    <li>
                        <div id="mainBar" style="width: 1000px;height:400px;"></div>
                        <div class="ta-c">
                            <a href="/courseWare/main/{{$class_id}}/{{$course_id}}"><button class="ic-btn">关闭答案</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/courseWare/answerStart/{{$class_id}}/{{$course_id}}/{{$cw_id}}/{{$data->next_exercise_id}}"><button class="ic-btn">下一题</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/courseWare/coursewareDetail/{{$class_id}}/{{$course_id}}/{{$cw_id}}"><button class="btn-white ">返回课件</button></a>
                        </div>
                    </li>
                </ul>
            </div>
		 </div>
    </div>
    @include('teacher.template.courseware_echarts_tips')
@endsection

@section('JS:OPTIONAL')
<script src="{{ asset('js/teacher/courseware_answer.js') }}"></script>
@endsection