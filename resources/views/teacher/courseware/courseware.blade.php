@extends('teacher.theAnswer_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/communal.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/eduAdmin/notificationManager.css') }}" />
<style>
	.issue {
		text-align: left;
	}
	.ic-container {
	    min-height: 600px;
	    padding: 30px 20px;
	}
	.issue>a {
		display: block;
		color: #fff!important;
		width: 90px;
		height: 30px;
		line-height: 30px;
		float: left;
	}
	.selectCourseware{
		width: 152px;
		height: 28px;
		border: 1px solid #d9d9d9;
		float: right;
		display: block;
		position: relative;
		border-radius: 4px;
		overflow: hidden;
		padding:0 30px 0 5px;
	}
	.selectCourseware input{
		padding: 0;
		margin: 0;
		width: 115px;
		height: 26px;
		line-height: 26px;
		display: block;
		border: none;
	}
	.selectCourseware i{
		position: absolute;
		top: 0;
		right: 0;
		line-height: 26px;
		display: block;
		width: 30px;
		height: 26px;
		text-align: center;
		font-weight: 100;
		color: rgba(0,0,0,0.25);
		cursor: pointer;
		transition: background 300ms;
	}
	.selectCourseware i:hover{
		background: #f1f1f1;
	}
	.td_courseware_title span{
		width: 100%;
		display: block;
		white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
	}
</style>
@endsection
@section('THEANSWER')
<div class="row">
	<!--左侧栏-->
	<div class="col-xs-2" id="left">
		@include('teacher.template.courseware_left')
	</div>
	<!--内容-->
	<div class="col-xs-12 col-sm-12" id="centery">
		<div class="files_nav">
			<span class="col-xs-3 col-sm-3"></span>
			<span class="col-xs-6 col-sm-6">课程大纲</span>
			<span class="col-xs-3 col-sm-3 add"></span>
		</div>
		<div class="ic-container">
			<div class="waitBox">
				<div class="issue clear">
					<a href="/courseWare/upLoadCourseware/{{$class_id}}/{{$course_id}}" class="ic-btn" style="float: left;"><i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;上传课件</a>
					<span class="selectCourseware"><input type="text" class="screen_input input_focus"><i class="fa fa-search"></i></span>
				</div>
				@if(empty($courseware_list))
				<div style="margin-top: 150px">
					<div>
						<img class="logo" src="/images/LOGO.png" alt="InCourse_logo" />
					</div>
					<div>请先上传课件噢～</div>
				</div>
				@else
				<div class="table_ger">
					<table border="" cellspacing="" cellpadding="">
					<thead>
						<tr>
							<th>编号</th>
							<th style="width:200px;">名称</th>
							<th>时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach($courseware_list as $courseware)
						<tr>
							<td>{{$loop->index+1}}</td>
							<td style="width:200px;"><span>{{$courseware->title}}</span></td>
							<td class="">{{date('Y-m-d h:i:s',$courseware->create_time)}}</td>
							<td class="ic-en"><a href="/courseWare/coursewareDetail/{{$class_id}}/{{$course_id}}/{{$courseware->id}}" class="ic-blue" title=""><i class="fa fa-tv"></i> 演示</a>
							<!-- &nbsp;&nbsp;&nbsp;<a class="ic-blue" href="/courseWare/upLoadCourseware/{{$class_id}}/{{$course_id}}/edit-courseware" title=""><i class="fa fa-pencil-square-o"></i> 编辑</a></td> -->
						</tr>
						@endforeach
					</tbody>
					</table>
					<div>{{$courseware_list->links()}}</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<!--右侧栏-->
	<div class="col-xs-2 left">
		@include('teacher.header.right_nav')
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<!--script-->
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
<script>
	$('.selectCourseware input').focus(function(e){
		document.onkeydown = function(e){ 
		    var ev = document.all ? window.event : e;
		    if(ev.keyCode==13) {
		    	alert(1)
		    }
		}
	});
</script>
@endsection