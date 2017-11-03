@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />

@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
	<div class="school-container admin-container">
<!--个人作业批改-->
		<div class="work-correction">
			<a href="" class="blue f-r">查看学生错题</a>
			<table class="admin-list border pigaizuoye">
				<thead>
					<tr>
						<th colspan='6'>第一章第一节作业</th>
					</tr>
					<tr>
						<td><b>姓名</b></td>
						<td><b>得分率</b></td>
						<td><b>得分</b></td>
						<td><b>时间</b></td>
						<td><b>状态</b></td>
						<td><b>操作</b></td>
					</tr>
				</thead>
				<tbody>
				@foreach($work_list as $work)
					<tr data-id="{{$work->id}}">
						<td>{{$work->student_name}}</td>
						<td><span class="gray">{{$work->ratings}}%</span></td>
						<td><span class="gray">{{$work->score / 100}}/{{$work->total / 100}}</span></td>
						<td><span class="gray data-time" data-start-time="{{$work->start_time}}" data-end-time="{{$work->sub_time}}"></span></td>
						<td><span class="{{$work->status != 4?'red':'gray'}}">{{$work->status == 2? '可批改':($work->status == 3?'批改中':'已完成')}}</span></td>
						<td class="ic-blue">
							<a href="/correctDetail/{{$class_id}}/{{$course_id}}/{{$work->id}}" title="">
							@if($work->status == 4)
								<span class="blue"><i class="fa fa-eye"></i>&nbsp;&nbsp;查看</span>
							@else
								<span class="red"><i class="fa fa-pencil"></i>&nbsp;&nbsp;批改</span>
							@endif
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<a href="/correct/{{$class_id}}/{{$course_id}}"><button class="btn-white">返回</button></a>
		</div>

		<!--小组作业批改-->
		<!-- <div class="Group-correction">
			<div class="Group-search">
				<span>
				<span class="member">小组分类</span>
				<i class="fa fa-angle-down"></i>
				<div>
					<ul>
						<li>1.科技组</li>
						<li>1.科技组</li>
						<li>1.科技组</li>
					</ul>
				</div>
			</span>
				<span>
				<span class="member">组员</span>
				<i class="fa fa-angle-down"></i>
				<div>
					<ul>
						<li>曹操</li>
					</ul>
				</div>
			</span>
				<span class="f-r">
				<input type="" name="" id="" value="" placeholder="请输入搜索内容" />
				<i class="fa fa-search"></i>
			</span>
			</div>
			<table class="admin-list border pigaizuoye">
				<thead>
					<tr>
						<th>小组</th>
						<th>组长</th>
						<th>组员</th>
						<th>评分</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.科技组</td>
						<td>曹操</td>
						<td>曹操</td>
						<td>0</td>
						<td><span class="red">未批改</span></td>
						<td class="ic-blue">
							<span class="red"><i class="fa fa-pencil"></i>&nbsp;&nbsp;批改</span>
						</td>
					</tr>
				</tbody>
			</table>
			<button class="btn-white">返回</button>
		</div> -->
		{{ $work_list->links() }}
	</div>
@endsection

@section('JS:OPTIONAL')
<script type="text/javascript">
	$(".data-time").each(function(i,item){
		var time = $(item).attr("data-end-time") - $(item).attr("data-start-time");
		$(item).text(dataTime(time))
	})
	function dataTime(time){
		var h , m , s;
		if(time>3600){
			h = Math.floor(time/3600);
			m = Math.floor((time%3600)/60);
			s = Math.floor(time%60);
			return h+'小时'+m+'分钟'+s+'秒'
		}else if(time<3600 && time > 60){
			m = Math.floor((time%3600)/60);
			s = Math.floor(time%60);
			return m+'分钟'+s+'秒'
		}else if(time<60 && time > 0){
			s = time;
			return s+'秒'
		}else{
			return '0秒'
		}
	}
</script>
@endsection