@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/exercise.css" />
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" href="/css/teacher/correctDetail.css" />
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
	<div class="school-container admin-container">
		<!--内容-->
		<div>
			<div class="p-r admin-container stu-answer" stu-id="{{$data['student']->id}}" work-id="{{$work_id}}">
				<div class="person-hw-mark-head clear">
					<a class="page_Mark ic-blue c-d p-r blue-hover lookSameExer" data-page="3">查看学生同类型练习题</a>
					<div class="f-r">
						<span class="page_Mark isMark doMark active" data-page="1">已批改</span>
						<span class="page_Mark isMark notMark" data-page="2">未批改</span>
					</div>
				</div>
				<!--已批改-->
				<div class="person-correct-did">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：{{$data['student']->name}}</li>
						<li class="ta-r">
							<span>客观题分值：</span>
							<span>10</span>
						</li>
					</ul>
					<!--题目列表，都是客观题-->
					@include('teacher.template.correctDetail_objectiveItem')
				</div>
				<!-- 同类型习题 -->
				<div class="person-correct-same">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：{{$data['student']->name}}</li>
						<li class="ta-r">
							<span>同类型习题分值：</span>
							<span>10</span>
						</li>
					</ul>
					<!-- 题目列表，都是客观题 -->
					@include('teacher.template.correctDetail_homotypology')
				</div>
				<!--为批改-->
				<div class="person-correct-will d-n">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：{{$data['student']->name}}</li>
						<li class="ta-r">
							<span>该题分值：</span>
							<span>10</span>
						</li>
					</ul>
					@include('teacher.template.correctDetail_subjectiveItem')
				</div>
				<div class="btns">
					<button id="next-stu" class="ic-btn btn-hover-bg">提交</button>
					<button class="btn-white gray-hover-bg ic-return">返 回</button>
				</div>
			</div>
		</div>

	</div>
	<div class="postil col-xs-12">
		<div>
			<span class="remark">
				批注
			</span>
			<div class="postil_parent"></div>
		</div>
	</div>
	<div class="upLoadHtmlData" style="display:none;"></div>
</div>

@endsection

@section('JS:OPTIONAL')
<script src="/js/exercise.js" charset="utf-8"></script>
<script src="/js/teacher/correctDetail.js" charset="utf-8"></script>
@endsection