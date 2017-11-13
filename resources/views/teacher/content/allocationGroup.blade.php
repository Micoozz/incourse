@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/teacher/homeworkManage.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/eduAdmin/releaseNotes.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/eduAdmin/activityNotes.css') }}">
<link rel="stylesheet" href="{{ asset('css/teacher/homeWork.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/teacher/t-groupWork.css') }}">
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
	<div class="homeWork-cen waitBoxs">
		<form action="" method="post" class="info-form">
			<div class="activity">
				作业标题：
				<input type="" name="" id="" value="" placeholder="请输入标题" /> 截止时间：
				<span class="birthTimes_module">
					<input type="" name="" id="birthTimes" value="" placeholder="开始时间" />
					<i class="fa fa-calendar p-a gray fa-calendarwe"></i>
				</span>
			</div>
			<label for="" class="Job-content">
				作业内容：
			<div>
				<div><i class="fa fa-paperclip"></i>添加附件<input type="file" name="" id="file" value="" /></div>
				<div contenteditable="true" class="textarea"></div>	
			</div>

		</label>
			<div class="activity activityse">
				小组人数：
				<input type="" name="" id="" value="" placeholder="请输入小组人数" /><span class="blue">生成小组</span>
			</div>
			<!--小组人数表-->
			<table class="admin-list border admin-list-a group-number">
				<thead>
					<tr>
						<th>小组</th>
						<th>组长</th>
						<th>组员</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>第一组</td>
						<td>诸葛亮</td>
						<td class="staff">
							<span draggable="true" id='drag1'>张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<div class="pull-down">
								<b>...</b>&nbsp;&nbsp;<i class="fa fa-angle-down fa-2x"></i>
							</div>

						</td>
					</tr>
					<tr draggable="true">
						<td>第一组</td>
						<td>诸葛亮</td>
						<td class="staff">
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<div class="pull-down">
								<b>...</b>&nbsp;&nbsp;<i class="fa fa-angle-down fa-2x"></i>
							</div>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
							<span draggable="true">张飞</span>
						</td>
					</tr>
				</tbody>
			</table>

			<label for="" class="submit">
				<button class="icon-text-btn"><i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;发布</button>
				<button class="ic-btn">保存</button>
				<button class="btn-white"><a href="">取消</a></button>
			</label>
		</form>
	</div>
@endsection

@section('JS:OPTIONAL')
<script type="text/javascript" src="{{ asset('js/lhgcore.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lhgcalendar.js') }}"></script>
<script>
	layui.use("laydate",function(){
		var laydate = layui.laydate;
		laydata.rander({
			elem:"#birthTimes_module",
			type: 'datetime',
        	format: 'yyyy-MM-dd H:m'
			min: CurentTime(),
		})
	})
	//获取当前时间 --> 年月日时分
	function CurentTime(){
	    var now = new Date();
	    var year = now.getFullYear();
	    var month = now.getMonth() + 1;
	    var day = now.getDate();
	    var hh = now.getHours();
	    var mm = now.getMinutes();
	    var clock = year + "-";
	    if(month < 10){clock += "0";}
	    clock += month + "-";
	    if(day < 10){clock += "0";}
	    clock += day + " ";
	    if(hh < 10){clock += "0";}
	    clock += hh + ":";
	    if (mm < 10) clock += '0';
	    clock += mm;
	    return(clock);
	}
	$(function() {
		setTimeout(function() {
			$('.homeWork-head li a').removeClass('box').find('i').remove();
			$('.homeWork-head li:last-child a').addClass('box').append('<sub style="font-size: 12px; color: #FFFFFF;line-height: 18px;width: 17px;height: 18px;display: inline-block;background-color: #F56A00;border-radius: 10px;position: relative;top: 5px;">班</sub>');

			setTimeout(function() {
				$('.part2').show().addClass('position').css({
					'top': '670px',
					'left': '46%'
				});

				//遮罩层
				$('.shad').show().height(window.innerHeight)

				$('.activityse').css({
					'z-index': '101',
					'background-color': '#fff',
					'position': 'relative'
				});

				$('.position').find('p').text('输入 小组人数 后，点击 生成小组 噢～')

				$('.ic-btn').on('click', function() {
					$('.d-n,.shad').hide()
				})
			}, 10)
		}, 10);

		/*//附件
		$('#file').change(function() {
			input = $(this)[0];
			if(!input['value'].match(/.jpg|.gif|.png|.bmp/i)) { //判断上传文件格式
				return alert("上传的图片格式不正确，请重新选择");
			}
			var reader = new FileReader();
			reader.readAsDataURL(this.files[0]);
			reader.onload = function(e) {
				$('.textarea').append('<img src="' + this.result + '" style="width:20%;height:60%"/>')
			};
		});*/

		//小组人数表格
		$('.pull-down').hide().nextAll().hide()
		$('.staff').each(function() {
			var staff = $(this);

			$(this).children().each(function(i) {
				if(i > 10) {
					staff.find('.pull-down').show()
				}
			})
		});
		var estimate = true;
		$('body').on('click', '.pull-down', function() {

			if(estimate) {
				$(this).nextAll().show();
				$(this).find('b').hide()
				estimate = false;
			} else {
				$(this).nextAll().hide();
				$(this).find('b').show()
				estimate = true;
			}
		})

		//拖动	
		$('.staff>span').mousedown(function() {
			$('.staff>span').attr('id', '')
			$(this).attr('id', 'drag1')
			box()
		})
		function box() {
			document.getElementById('drag1').addEventListener('dragstart', function(event) {
				event.dataTransfer.setData("Text", event.target.id);
			})
			for(var i = 0; i < document.getElementsByClassName('staff').length; i++) {
				document.getElementsByClassName('staff')[i].addEventListener('drop', function(event) {
					event.preventDefault();
					var data=event.dataTransfer.getData("Text");
					event.target.appendChild(document.getElementById(data));
				})
				document.getElementsByClassName('staff')[i].addEventListener('dragover', function(event) {
					event.preventDefault();
				})
			}
		}
		box()
	})
</script>
@endsection