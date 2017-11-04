@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
<style>
    .icon_margin_r{
        margin-right:24px;
    }
    .tool{
        margin-right:8px;
    }
</style>
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
	<div class="admin-container" id="operation_this_job" data-id="{{$exe_id}}">
		<div class="filter-box-upload select-action-box">
			<div>
				<div class="chapter">
					<span class="f-l fs14">章节：</span>
					<div class="select-form clear">
						<div class="ic-text-lg">
							<p class="ic-text">
								<span class="select_unit">选择章篇</span>
								<i class="fa fa-angle-down"></i>
							</p>
							<ul class="lists unit-ul">
								@foreach($unit_list as $id => $title)
								<li class="unit-li" data="{{$id}}">{{$title}}</li>
								@endforeach
							</ul>
						</div>
						<div class="ic-text-lg">
							<p class="ic-text">
								<span class="select_section">选择小节</span>
								<i class="fa fa-angle-down"></i>
							</p>
							<ul class="lists section-ul">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="big-box">
			<div class="exercise-box" id="exercise_html_box">
				<div class="exercise">
					<div class="type select-action-box p-r">
						<span class="f-l fs14">题型：</span>
						<div class="select-form clear">
							<div>
								<p class="ic-text-exer">
									<span>{{$categroy_list[1]}}</span>
									<i class="fa fa-angle-down"></i>
								</p>
								<ul class="lists-exer">
									@foreach($categroy_list as $id => $title)
									<li data="{{$id}}" class="exer-li">{{$title}}</li>
									@endforeach
								</ul>
							</div>
						</div>
						<i class="common-icon ic-close-icon p-acommon-icon ic-close-icon p-a"></i>
					</div>
					<!--问题框-->
					<div class="question-box">
						<div class="question clear">
							<span class="f-l fs14">问题：</span>
							<div class="ic-editor border f-l">
								<div class="tools clear">
									<button class="f-l p-r of-h addFileTool icon_margin_r">
										<i class="tool"></i>
										<span>添加附件</span>
									</button>
									<input class="addFile" id="image-upload" name="file" type="file" style="display: none"/>
									<b class="vertical-line f-l"></b>
									<button class="f-l blank d-n icon_margin_r">
										<i class="tool"></i>
										<span>插入空格</span>
									</button>
									<button class="f-l dotted icon_margin_r">
										<i class="tool"></i>
										<span>下标点</span>
									</button>
									<button class="f-l up-dotted icon_margin_r">
									   <i class="tool"></i>
									   <span>上标点</span>
									</button>
									<button class="f-l underline icon_margin_r">
										<i class="tool"></i>
										<span>下划线</span>
									</button>
								</div>
								<div class="editor-content" contenteditable="true"></div>
							</div>
						</div>
					</div>
					<!--答案框-->
					<div class="answer-wrap clear">
						<span class="f-l fs14">答案：</span>
						<div class="answer-box f-l">
							<!--单选题-->
							<div class="dan-xuan">
								<div class="dan-xuan-options dan-xuan-only">
									
								</div>
								<span class="addOptionBtn addXzOptionBtn c-d ic-blue">
									<i class="uploadExerIcons"></i>
									<span>添加选项</span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="addExerBtn-box">
				<button class="addExerBtn ic-blue c-d">
					<i class="uploadExerIcons"></i>
					<span>添加题目</span>
				</button>
			</div>
			<div class="btns">
				<button class="ic-btn" id="upload-btn">上 传</button>
				<button class="btn-white ic-return">返 回</button>
			</div>
		</div>
	</div>
</div>
<div class="big-img-box d-n">
	<p>
		<i class="fa fa-times-circle-o f-r p-r"></i>
	</p>
	<img src="" alt=""/>
</div>
<script>
	var classId = '{{$class_id}}',courseId = '{{$course_id}}';
</script>
@endsection

@section('JS:OPTIONAL')
<script src="/js/exercise.js" charset="utf-8"></script>
<script src="/js/blankClick.js" charset="utf-8"></script>
@endsection