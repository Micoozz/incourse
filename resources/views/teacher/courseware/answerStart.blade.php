@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}"/>
<style>
    .do-hw{
        width: 100%;
    }
    .radio-wrap{
        margin-left:40px;
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
                        <div class="clear hw-question">
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">单选题</span>
                                ）</span>
                            <span>下列各句中，标点符号使用正确的一项是（）</span>
                        </div>
                        
                        @include('teacher.template.courseware_answer')
                        
                    </li>
				 </ul>
            </div>
			<div class="clear"></div>
			<div class="ta-c">
				<a href="/courseWare/answerIng"><button class="ic-btn">开始答题</button></a>
			</div>            
		 </div>
    </div>
@endsection

@section('JS:OPTIONAL')
@endsection