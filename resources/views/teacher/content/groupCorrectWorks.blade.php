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
	<!--内容-->
	<div id="centery" class="col-xs-12 col-sm-12">
		<div class="row center1">
			<div class="col-md-2 col-xs-4"></div>
			<div class="col-md-8 col-xs-4" id="col">作业批改</div>
			<div class="col-md-2 col-xs-4"></div>
		</div>
		<div class="homeWork-cen waitBoxs">
			<form action="" method="post" class="info-form">
				<div class="score">
					<p>
						<b>负责人：</b>啦啦啦啦啦啦
						<span class="f-r">评分：<input type="text" placeholder="请打分" /></span>
						<span class="clear"></span>
					</p>
					<p>
						<b>小组任务：</b> 研究校外附近河流水流的流向以及漂流的基本形态和水的酸碱度和自我净化能力
					</p>
					<p>
						<b>个人职责：</b> 为小组的研究结果做报告与总结，并论述完整的总结性报告
					</p>
				</div>
				<label for="" class="Job-content">
					提交结果：
					<div>
						<div><i class="fa fa-paperclip"></i>添加附件<input type="file" name="" id="file" value="" /></div>
						<div contenteditable="true" class="textarea">
						</div>
					</div>
				</label>
				<label for="" class="Submit-comments">
					<div>提交评语：</div>
					<textarea name="" rows="" cols=""></textarea>
				</label>
				<label for="" class="submit">
					<button class="ic-btn">保存</button>
					<button class="btn-white"><a href="">返回</a></button>
				</label>
			</form>
		</div>
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script type="text/javascript" src="{{ asset('js/lhgcore.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lhgcalendar.js') }}"></script>
<script>
	$(function() {
		setTimeout(function() {
			$('.homeWork-head li a').removeClass('box').find('i').remove();
			$('.homeWork-head li:last-child a').addClass('box').append('<sub style="font-size: 12px; color: #FFFFFF;line-height: 18px;width: 17px;height: 18px;display: inline-block;background-color: #F56A00;border-radius: 10px;position: relative;top: 5px;">班</sub>');
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
	})
</script>
@endsection