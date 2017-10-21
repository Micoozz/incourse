@extends('teacher.theAnswer_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/communal.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/eduAdmin/releaseNotes.css') }}" />
<title>InCourse</title>
<style>
	.uploadCourseware {
		margin-top: 60px;
	}
	.uploadCourseware label {
		display: block;
		margin-bottom: 20px;
	}
	.uploadCourseware input,
	.uploadCourseware .time {
		background: #FFFFFF;
		border: 1px solid #D9D9D9;
		border-radius: 4px;
		width: 488px;
		height: 28px;
		text-indent: 10px;
	}
	.uploadCourseware .flex {
		display: flex;
	}
	.uploadCourseware .flex span>span {
		display: block;
		border-right: 1px solid #eee;
		margin: 10px;
		width: 80px;
	}
	.uploadCourseware .flex span>textarea {
		width: 100%;
		height: 100%;
		border: 0;
		border-top: 1px solid #ccc;
		padding: 10px;
		outline: none;
	}
	.uploadCourseware .flex>div>span{
		background: #FFFFFF;
		border: 1px solid #D9D9D9;
		border-radius: 4px;
		height: 182px;
		width: 488px;
		overflow: hidden;
		display: block;
	}
	.uploadCourseware .time {
		width: 100px;
		display: inline-block;
	}
	.uploadCourseware .time input {
		width: 78%;
		border: 0;
		height: 26px;
		outline: none;
	}
	.uploadCourseware .flex input {
		width: 80px;
		position: absolute;
		margin-top: -23px;
		margin-left: -8px;
		opacity: 0;
	}
	.parpers span{
		cursor: pointer;
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
			<div class="uploadCourseware">
				<form action="" method="post">
					<label>
						课件名称：<input type="" name="" id="" value=""/>
					</label>
					<label for="" class="flex">
						<span>课件内容：</span>
						<div>
							<div class="parpers"></div>
							<span>
								<span>
									<i class="fa fa-paperclip"></i>&nbsp;添加附件
									<input type="file" name="" id="" value="" />
								</span>
								<textarea name="" rows="" cols="" placeholder="请输入内容"></textarea>
							</span>
						</div>
					</label>
					<label>
						习题练习：<span class="blue"><i class="fa fa-plus-circle"></i>&nbsp;添加习题</span>
					</label>
					<label>
						倒计时：<span  class="time"><input type="" name="" id="input_number" value="" onpaste="inputOnafterpaste(this)"/>s</span>&nbsp;&nbsp;<img src="/images/cautionImg.png" style="width: 3%;" />
					</label>
					<label for="" class="submit">
						<button class="ic-btn">保存</button>
						<button class="btn-white"><a href="/courseWare/main">返回</a></button>
					</label>
				</form>
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
	$(function() {
		var parpers = [] //上传文件
		$('.uploadCourseware .flex input').change(function() {
			parpers.push($(this).val());
			$('.parpers').html('');
			for(var i = 0; i < parpers.length; i++) {
				$('.parpers').append('<p><b>' + parpers[i] + '</b>&nbsp;&nbsp;<span class="blue">删除</span></p>')
			}
		});
		$('body').on('click','.parpers>p>span',function(){
			$(this).parent().remove();
			var text=$('.parpers>b').text();
			parpers=text.split('');
		})



		$("#input_number").keyup(function(){
			inputOnkeyup(this)
		})
		function inputOnkeyup(obj){
			if($(obj).val().length==1){
				$(obj).val($(obj).val().replace(/[^1-9]/g,''))
			}else{
				$(obj).val($(obj).val().replace(/\D/g,''))
			}
		}
		function inputOnafterpaste(obj){
			if($(obj).val().length==1){
				$(obj).val($(obj).val().replace(/[^1-9]/g,''))
			}else{
				$(obj).val($(obj).val().replace(/\D/g,''))
			}
		}
	})
</script>
@endsection