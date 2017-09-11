<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>InCourse</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/incourseReset.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/index.css') }}">
	<link rel="stylesheet" href="{{ asset('css/school/step.css') }}" />
	<style>
		.step-change>li:first-child span {
			color: #333;
		}
		.step-change .fa-user-o {
			color: #168bee;
		}
		.enroll #centery{
			width: 100%;
		}
		.enroll .ic-container{
			width: 60%;
    		margin: 0 auto
		}


		.addInfo .terrace-form {
			margin-top: 0;
		}
		.myForm table .sexuality>td{
			width: 140px;
			
		}
		.myForm table .email-box>td{
		    text-align: left;
		    width: 76px;
		    display: inline-block;
		    height:45px;
		}
		.class-box{
			width: 638px;
		    height: 238px;
		    background-color: #fff;
		    border-radius: 4px;
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    margin: -115px 0 0 -300px;
		    z-index: 1000;
		    display: none;
		}
		.class-box button{
			position: absolute;
			bottom:0;
			right: 5%;
		}
		.myForm .submit{
			position: absolute;
			left: 45%;
		}
		.myForm table .account td{
			width: 36px;
			text-align: left;
			display: inline-block;
		}
		.myForm table .account{
			margin-top: 20px;
			display: block;
		}
		.myForm table .account td select{
			outline:none;
			width: 141px;
			height: 28px;
			border: 1px solid #D9D9D9;
			border-radius: 4px;
		}
		.class-box{
			text-align: left;
		}
		.class-box ul>li{
			float: left;
    width: 13%;
    height: 30px;
    text-align: center;
    line-height: 30px;
    margin-left: 15px;
		}
		.class-box ul>.first{
				width: 30px
		}
		.bj-colo{
			background: #E0EEFF;
border-radius: 2px;
color: #168bee;
		}
	</style>
</head>
<body>
<!-- 顶部导航 -->

<div class="navbar">@include('platforms.template.head')</div>

<div class="enroll">
<div class="content">
	<div id="center">
		<div class="container">
			<div class="row">
				<!--内容-->
				@if($func == 'platform-pwd')
					@include('platforms.content.changPwd')
				@elseif($func == 'platform-email')
					@include('platforms.content.addInfo')
				@elseif($func == 'platform-success')
					@include('platforms.content.success')
				@elseif($func == 'student-info')
					@include('platforms.content.studentInfo')
				@elseif($func == 'teacher-info')
					@include('platforms.content.teacherInfo')
				@endif
			</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="ic-modal"></div>
<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/index.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/platform/step.js') }}"></script>
<script src="{{ asset('js/incourseReset.js') }}"></script>
		<script>
		var func = "{{ $func }}"
		var token = "{{csrf_token()}}";
		var count ="";
		var personnel = "{{ isset($personnel) ? $personnel : ''}}";
			$(function() {
				setTimeout(function() {
					$('.terrace .step-change>li:first-child>span').text('创建账号');
						$('.terrace .step-change>li:nth-of-type(2)>i').css('color','#97979f');
					$('.ic-modal,.head_nav').hide();
					$('.myForm .submit').click(function(){
						$('.ic-modal,.class-box').show()
						return false
					});
					$('.ic-modal').click(function(){
						$('.ic-modal,.class-box').hide()
					})
				}, 10)
			})
		$("#change").click(function() { 
	       $url = "{{ URL('/kit/captcha/') }}";  
	       $url = $url + "/" + Math.random();
	       document.getElementById('kitCode').src=$url;
    	});
    	if (func == "platform-success") {
	    	setInterval(function(){
	    		if (personnel == 1) {
					window.location.href='/platform/teacher-info';
				}else{
					window.location.href='/platform/student-info';
				}
			},3000)
    	}

		var duty=[{a:'b',b:[{1:'a'},{2:'b'}]},{a:'b',b:[{1:'a'},{2:'b'}]},{a:'b',b:[{1:'a'},{2:'b'}]}];
				for(var i=0;i<duty.length;i++){
			if(i==0){
				$('.class-box>div:first-child').append('<div><ul></ul></div>');
			}
			$('.class-box>div:first-child ul').append('<li class="firse"><b>'+duty[i].a+'：</b></li>');
			for(var a=0;a<duty[i].b.length;a++){
				for(var key in duty[i].b[a]){
				$('.class-box>div:first-child ul').append('<li num='+key+' class="last">'+duty[i].b[a][key]+'</li>');

				}
				$('.firse').css('clear','both')
			}
	}
			$('body').on('click','.class-box>div ul>.last',function(){
			$(this).addClass('bj-colo')
			})
		</script>
</body>
</html>
