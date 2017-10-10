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
		<div class="manageAdmin-wrap">
			<div class="estate">
				<span num=2 class="blue last">已发布</span>
				<span num=1>未发布</span>
			</div>

			<div class="clear"></div>
			<div class="Panel-selection">
				<div>
					<b>分类：</b>
					<span num=3 class="group">小组作业</span>
					<a href="/correct/{{$class_id}}/{{$course_id}}/1"><span class="entirely">个人作业</span></a>
				</div>
				<div>
					<b>章节：</b>
					<a href="/correct/{{$class_id}}/{{$course_id}}/{{$type}}"><span {{empty($unit_id) ? "class=entirely" : ""}}>全 部</span></a>
					@foreach($unit_list as $id => $title)
					<a href="/correct/{{$class_id}}/{{$course_id}}/{{$type}}/{{$id}}"><span {{$unit_id == $id ? "class=entirely" : ""}}>{{$title}}</span></a>
					@endforeach
				</div>
				<div>
					<b>小节：</b>
					<a href="/correct/{{$class_id}}/{{$course_id}}/{{$type}}/{{$unit_id}}"><span {{empty($section_id) ? "class=entirely" : ""}}>全 部</span></a>
					@foreach($section_list as $id => $title)
					<a href="/correct/{{$class_id}}/{{$course_id}}/{{$type}}/{{$unit_id}}/{{$id}}"><span {{$section_id == $id ? "class=entirely" : ""}}>{{$title}}</span></a>
					@endforeach
				</div>
			</div>

			<!--未发布-->
			<table class="admin-list border pigaizuoye">
				<thead>
					<tr>
						<th>作业标题</th>
						<th>分类&nbsp;&nbsp;<i class="fa fa-unsorted gray"></i></th>
						<th>截止时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.洗葡萄</td>
						<td>小组</td>
						<td>10月1日 17:00</td>
						<td class="ic-blue">
							<span><a href="homeWork.html" class="blue"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</span>&nbsp;&nbsp;&nbsp;</a>
							<span class="issuance"><i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;发布</span>
						</td>
					</tr>
					<tr>
						<td>1.洗葡萄</td>
						<td>小组</td>
						<td>10月1日 17:00</td>
						<td class="ic-blue">
							<span class="blue"><a href="homeWork.html" class="blue"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</span>&nbsp;&nbsp;&nbsp;</a>
							<span class="issuance"><i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;发布</span>
						</td>
					</tr>
				</tbody>
			</table>

			<!--已发布  个人作业-->
			<table class="admin-list border pigaizuoye">
				<thead>
					<tr>
						<th>作业章节</th>
						<th>分类</th>
						<th>截止时间</th>
						<th>正确率</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach($job_list as $job)
					<tr>
						<td>{{$job->chapter_id}}</td>
						<td>{{$job->job_type}}</td>
						<td>{{$job->deadline}}</td>
						<td><span class="gray">待统计</span></td>
						<td><span class="red">可批改</span></td>
						<td class="ic-blue">
							<span class="correction_pg red"><i class="fa fa-pencil"></i>&nbsp;批改</span>&nbsp;  &nbsp;
							<span class="correction_pg blue"><i class="fa fa-rotate-right "></i>&nbsp;撤回</span>
						</td>
					</tr>
					@endforeach
					
					<tr>
						<td>1.第一章第一节</td>
						<td>个人</td>
						<td>10月1日 17:00</td>
						<td>80%</td>
						<td><span class="gray">已完成</span></td>
						<td class="ic-blue">
							<span class="blue see"><i class="fa fa-eye"></i>&nbsp;查看</span>
						</td>
					</tr>
				</tbody>
			</table>

			<!--已发布  小组作业-->
			<table class="admin-list border pigaizuoye">
				<thead>
					<tr>
						<th>作业标题</th>
						<th>类型</th>
						<th>截止时间</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.洗葡萄</td>
						<td>小组</td>
						<td>10月1日 17:00</td>
						<td><span class="red">可批改</span></td>
						<td class="ic-blue">
							<span class="red Group"><i class="fa fa-pencil"></i>&nbsp;&nbsp;批改</span>
						</td>
					</tr>
					<tr>
						<td>1.洗葡萄</td>
						<td>小组</td>
						<td>10月1日 17:00</td>
						<td><span class="red">批改中</span></td>
						<td class="ic-blue">
							<span class="red Group"><i class="fa fa-pencil"></i>&nbsp;&nbsp;批改</span>
						</td>
					</tr>
					<tr>
						<td>1.洗葡萄</td>
						<td>小组</td>
						<td>10月1日 17:00</td>
						<td><span class="gray">未提交</span></td>
						<td class="ic-blue">
							<span class="gray"><i class="fa fa-eye"></i>&nbsp;&nbsp;查看</span>
						</td>
					</tr>
					<tr>
						<td>1.洗葡萄</td>
						<td>小组</td>
						<td>10月1日 17:00</td>
						<td><span class="gray">已完成</span></td>
						<td class="ic-blue">
							<span class="see"><i class="fa fa-eye"></i>&nbsp;&nbsp;查看</span>
						</td>
					</tr>
				</tbody>
			</table>

			<div>分页</div>
		</div>

		<!--个人作业批改-->
		<div class="work-correction">
			<a href="" class="blue f-r">查看学生错题</a>
			<table class="admin-list border pigaizuoye">
				<thead>
					<tr>
						<th colspan='5'>第一章第一节作业</th>
					</tr>
					<tr>
						<td><b>学号</b></td>
						<td><b>姓名</b></td>
						<td><b>分数</b></td>
						<td><b>状态</b></td>
						<td><b>操作</b></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>20071027</td>
						<td>曹操</td>
						<td><span class="gray">待统计</span></td>
						<td><span class="red">可批改</span></td>
						<td class="ic-blue">
							<span class="red"><i class="fa fa-pencil"></i>&nbsp;&nbsp;批改</span>
						</td>
					</tr>
					<tr>
						<td>20071027</td>
						<td>曹操</td>
						<td>80%</td>
						<td><span class="gray">已完成</span></td>
						<td class="ic-blue">
							<span class="blue see"><i class="fa fa-eye"></i>&nbsp;&nbsp;查看</span>
						</td>
					</tr>
				</tbody>
			</table>
			<button class="btn-white">返回</button>
		</div>

		<!--小组作业批改-->
		<div class="Group-correction">
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
					<tr>
						<td>1.科技组</td>
						<td>曹操</td>
						<td>曹操</td>
						<td>0</td>
						<td><span class="gray">已批改</span></td>
						<td class="ic-blue">
							<span class="blue see"><i class="fa fa-eye"></i>&nbsp;&nbsp;查看</span>
						</td>
					</tr>
					<tr>
						<td>1.科技组</td>
						<td>曹操</td>
						<td>曹操</td>
						<td>0</td>
						<td><span class="red">未提交</span></td>
						<td class="ic-blue">
							<span class="gray"><i class="fa fa-eye"></i>&nbsp;&nbsp;查看</span>
						</td>
					</tr>
					<tr>
						<td>1.科技组</td>
						<td>曹操</td>
						<td>曹操</td>
						<td>0</td>
						<td><span class="red">批改中</span></td>
						<td class="ic-blue">
							<span class="red"><i class="fa fa-pencil"></i>&nbsp;&nbsp;批改</span>
						</td>
					</tr>

				</tbody>
			</table>
			<button class="btn-white">返回</button>
		</div>

	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script type="text/javascript">
	$(function() {
		// setTimeout(function() {
		// 	$('.homeWork-head li a').removeClass('box').find('i').remove();
		// 	$('.homeWork-head li:last-child a').addClass('box').append('<sub style="font-size: 12px; color: #FFFFFF;line-height: 18px;width: 17px;height: 18px;display: inline-block;background-color: #F56A00;border-radius: 10px;position: relative;top: 5px;">班</sub>');
		// }, 10);

		//已发布和未发布切换
		$('.estate>span').click(function() {
			$('.estate>span').attr('class', '');
			$(this).attr('class', 'blue last');
			$('.pigaizuoye').hide()
			$('.pigaizuoye:nth-of-type(' + $(this).attr("num") + ')').show()
			if($(this).attr("num")=='1') {
				$('.Panel-selection').hide()
			} else {
				$('.Panel-selection').show()
			}
		});

		//删选内容

		$('body').on('click', '.Panel-selection>div>span', function() {
			$(this).parent().find('span').removeClass('entirely');
			$(this).addClass('entirely');
			if($(this).attr("num") != '3') {
				$('.pigaizuoye:nth-of-type(2)').show()
				$('.pigaizuoye:nth-of-type(3)').hide()
				$('.Panel-selection>div').show()
			}
		})
	})

	//小组
	$('body').on('click', '.group', function() {
		$('.pigaizuoye').hide()
		$('.pigaizuoye:nth-of-type(' + $(this).attr("num") + ')').show()
		$(this).parent().nextAll().hide()
	})

	//个人作业批改
	$('body').on('click', '.correction_pg', function() {
		$('.manageAdmin-wrap').hide()
		$('.work-correction').show()
		$('.work-correction .pigaizuoye').show()
		return false;
	})
	$('body').on('click', '.work-correction>button', function() {
		$('.manageAdmin-wrap').show()
		$('.work-correction').hide()
		return false;
	})

	//小组批改
	$('body').click(function() {
		$('.Group-search>span ul').hide()
	})
	$('body').on('click', '.Group-search>span', function() {
		
		if($(this).find('ul').css('display')!='block') {
			$('.Group-search>span ul').hide()
			$(this).find('ul').show()
		} else {
			$('.Group-search>span ul').hide()
		}
		return false
	})
	$('body').on('click','.Group-search>span ul>li',function(){
			$(this).parent().parent().prevAll('.member').text($(this).text())
	})

	//小组作业批改
	$('body').on('click', '.Group', function() {
		$('.manageAdmin-wrap').hide()
		$('.Group-correction').show()
		$('.Group-correction .pigaizuoye').show()
		return false;
	})
	$('body').on('click', '.Group-correction>button', function() {
		$('.manageAdmin-wrap').show()
		$('.Group-correction').hide()
		return false;
	})
	
	//查看
	$('body').on('click','.see',function(){
			window.location.href='jobView.html'
	})
	
	//发布
	$('body').on('click','.issuance',function(){
		$('.estate>span').attr('class', '');
		$('.estate>span:first-child').attr('class', 'blue last');
		$('.pigaizuoye,.Panel-selection>div').hide();
		$('.group').attr('class','entirely group').next().attr('class','')
		$('.pigaizuoye:nth-of-type(3),.Panel-selection,.Panel-selection>div:first-child').show()
	})
		
</script>
@endsection