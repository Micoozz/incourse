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
    .rido{
        position: absolute;
        top: 340px;
        display: none;
        margin-top: -35px;
        background: #fff;
        z-index: 9999;
        width: 100%;
    }
    .rido>div{
        display: table;
        float: right;
        width: 848px;
        line-height: 30px;
    }
    .rido>div span{
        display:table-cell;
        cursor: pointer;
    }
    .rido>div span i{
        cursor: pointer;
    }
    .rido .title{
        display: block;
        width: 60px;
        height: 30px;
        line-height: 30px;
        float: left;
    }
    #freedomEndBtn{
        position: absolute;
        bottom: 70px;
        left: 0;
        width: 100%;
    }
</style>
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
                    @include('teacher.template.courseware_answer')
                </li>
			 </ul>
        </div>
		<div id="answerInstrument">
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
                            <span class="notSubmitted"><b></b>人未提交</span>
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
						<div class="ic-blue">
							<span><i class="fa fa-circle-o"></i></span>
							<span><i class="fa fa-circle-o"></i></span>
							<span><i class="fa fa-circle-o"></i></span>
							<span><i class="fa fa-circle-o"></i></span>
						</div>
					</div>
                    <div class="ta-c" id="freedomEndBtn">
                        <button class="ic-btn" id="showAnswer">确认答案</button>
                    </div>
                </li>
                <li>
                    <div id="mainBar" style="width: 1000px;height:400px;"></div>
                    <div class="ta-c">
                        <button class="ic-btn">上一步</button><button class="ic-btn" style="width:auto">编辑下一题</button><a href="/courseWare/coursewareDetail/{{$class_id}}/{{$course_id}}"><button class="btn-white ">返回课件</button></a>
                    </div>
                </li>
            </ul>
        </div>
		@include('teacher.template.courseware_echarts_tips')
	 </div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="{{ asset('js/teacher/courseware_answer.js') }}"></script>
@endsection
