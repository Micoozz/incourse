<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>InCourse</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/incourseReset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/school/step.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/foundClass.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/communal.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/school/adminSchool.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFileManagement.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/school/setLimit.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/teacherFiles.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/principalFile.css') }}" />
	<style>
	/* 步骤 */
		.step-change>li:first-child span {
			color: #333;
		}
		.step-change .fa-user-o {
			color: #168bee;
		}

		#left .origin>li>a {
			color: #333;
		}
		/* 步骤 */
		@if($func == 'manager-pwd' ||$func == 'student-list' )
		 .step-change .fa-file-text-o {
			color: #979797;
		}
		@endif
		@if($func != 'manager-pwd')
		
		.step-change li:nth-child(2) span {
			color: #333;
		}
		.step-change .fa-user-o, .step-change .fa-file-text-o {
			color: #168bee;
		}
		.step-change li:nth-child(2) .line {
			border-color: #168bee;
		}
		@endif
		.warning {
			border: 1px solid #ff0000;
		}
		.hine{
			margin-top:30px;
			display: none;
		}
		.hine>div:first-child{
			height: 55px;
		}
		.nickname{
			text-align: left;
			margin: 20px;
		}
		.nickname>input{
			border: 1px solid #eee;
			border-radius:4px;
			width: 250px;
			padding: 5px;
			
		}
		@if($mod == 'teacher-file')
		.listse input {
			width: 100%;
			height: 28px;
			border: 1px solid #eee;
			border-radius: 4px;
			position: relative;
			left: -4px;
			text-align: center;
		}
		.select-form .listse>li{
			text-align: center;
		}
		.select-form .listse>li:hover {
			background-color: #fff;
		}
		
		.select-form .listse>li:last-child>i {
			float: none;
			
		}
		
		.select-form .listse {
			display: none;
			position: absolute;
			top: 32px;
			z-index: 100;
			width: 100%;
			border: 1px solid #D9D9D9;
			box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.20);
			border-radius: 4px;
			padding-bottom: 5px;
			background-color: #fff;
		}
		
		.select-form .listse>li {
			line-height: 32px;
			padding-left: 8px;
			cursor: default;
		}	
		@endif
			.section {
				width: 638px;
				height: 416px;
				background-color: #fff;
				position: absolute;
				top: 50%;
				left: 50%;
				margin: -208px 0 0 -319px;
				z-index: 1000;
				border-radius: 4px;
				padding: 20px;
				display: none;
			}
			
			.section>.ic-blue {
				margin: 10px auto;
				text-align: center;
			}
			
			.section>.section-nav {
				margin-top: 20px;
			}
			
			.section>.section-nav ul>li,.section>.section-nav b{
				float: left;
				width: 98px;
				height: 25px;
				text-align: center;
				line-height: 25px;
				margin-right: 10px;
				margin-bottom: 8px;
				cursor: pointer;
			}

			
			.section>.section-nav>div>input {
				border: 1px solid #eee;
				height: 28px;
				border-radius: 4px;
				margin-left: 10px;
				text-indent: 10px;
			}
			.section>.section-nav>div{
				    margin-left: 17px;
    				margin-top: 20px;
				}
			.section-button {
				position: absolute;
				bottom: 30px;
				right: 30px;
			}
			
			.section-button>button {
				margin-left: 20px;
			}
			.bj-colo{
				background-color:#E0EEFF;
				color: #168BEE;
			}
	</style>
</head>{{-- dd($func) --}}
<body>
	<!-- 顶部导航 -->
	<div class="navbar">
	@include('teacher.template.head')
	</div>
	<!--创建班级-->
	@if($func != 'manager-pwd' && $func != 'manager-name')
			<div class="found_class">@include('teacher.template.class')</div>
	@endif
	<div class="content">
		<div id="center">
			<div class="container p-r">
				<div class="row">
					<!--左侧栏-->
					<div class="col-xs-12" id="left">
					@include('teacher.template.left_nav')
					</div>
					<!--内容-->
					@if($mod == 'student-file')
						@if($func == 'manager-pwd')
							@include('teacher.fileManager.content.changePwd')
						@elseif($func == 'manager-name')
							@include('teacher.fileManager.content.managerName')
						@elseif($func == 'student-list')
							@include('teacher.fileManager.content.studentList')
						@elseif($func == 'student-add')
							@include('teacher.fileManager.content.addStudent')	
						@elseif($func == 'student-update')
							@include('teacher.fileManager.content.updateStudent')
						@elseif($func == 'class-list' || $func == 'create-class')
							@include('teacher.fileManager.content.found')			
						@endif
					@elseif($mod == 'teacher-file')
						@if($func == 'authorized-teacher')
							@include('teacher.fileManager.content.authorizedTeacher')
						@elseif($func == 'unauthorized-teacher')	
							@include('teacher.fileManager.content.unauthorizedTeacher')
						@elseif($func == 'teacher-add')
							@include('teacher.fileManager.content.addTeacher')
						@elseif($func == 'teacher-update')
							@include('teacher.fileManager.content.updateTeacher')	
						@endif
					@elseif($mod == 'principal-file')
						@if($func == 'principal-list')
							@include('teacher.fileManager.content.principalList')
						@endif			
					@endif
					<!--右侧栏-->
					<div class="col-xs-12 left">
					@include('teacher.template.right_notice')
					</div>
				</div>{{-- dd($data['classAll']) --}}
			</div>
		</div>
@if($func == "class-list")
<!--高亮部分-->
	@if(empty($data['classAll']))
	<div class="p-a part part2 d-n">
		<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>
		<p class="f-l">快去创建档案吧</p>
		<button class="ic-btn p-a">我知道了</button>
	</div>
	<!--遮罩层-->
	<div class="shad"></div>
	@endif
@endif
<!-- @if($func == "student-list")
	@if(empty($data['studentAll']->toArray()['data']))
		<div class="p-a part part2 d-n">
			<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>
			<p class="f-l">快去添加学生噢～</p>
			<button class="ic-btn p-a">我知道了</button>
		</div>
	@endif
@endif	 -->
<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/index.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}"></script>
<script src="{{ asset('js/fileJS/admin.js') }}"></script>
<script src="{{ asset('/js/fileJs/step.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/fileJs/found.js') }}" ></script>
<script src="{{ asset('js/fileJs/studentFile.js') }}" ></script>
<script src="{{ asset('js/fileJs/fileSelectionone.js') }}" ></script>
<script src="{{ asset('js/lhgcore.js') }}" ></script>
<script src="{{ asset('js/lhgcalendar.js') }}" ></script>
<script src="{{ asset('js/fileJs/studentFileManagement.js') }}" ></script>
<script src="{{ asset('js/school/adminSchool.js') }}"></script>
<script src="{{ asset('js/blankClick.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/fileJs/teacherFiles.js') }}" ></script>
<script>
	var func = "{{ $func }}";
	var token = "{{csrf_token()}}";
	var grade = "{{ isset($grade) ? $grade->id : ''}}";
	var count = "";
	if (func == 'manager-pwd' || func == 'manager-name' || func =='manager-navigstion') {
		$('#nav1>li>a').attr('onclick',"return false").css('color','rgba(0,0,0,0.25)')
	}
	$(function() {
		//添加科目
		$('.listse').on('blur', 'input', function() {									
			$(this).parent().text($(this).val())									
		});
		$('.listse').on('click', '.end', function() {
			if($(this).text()!=''){
			$(this).parent().prev().find('span').text($(this).text())
			}
			if($(this).parent().prev().find('span').text()!='添加课程'){
				$(this).parent().hide()
			}
		})
		$('.select-form .listse>li:last-child>i').click(function(){
			$('.select-form .listse>li:last-child').before('<li class="end"><input /></li>')
		})
	})
	$("#change").click(function() { 
       $url = "{{ URL('/kit/captcha/') }}";  
       $url = $url + "/" + Math.random();
       document.getElementById('kitCode').src=$url;
    });

	$(function(){
		$('.waitBox').css('padding-top','10px')
		
		//生成账号
		$('.account-number').click(function(){
			$('.hine').show();
			$('.nickname').hide()
			setTimeout(function(){
			var data = [];
			data.push({'name':'managerName','value':$('#managerName').val()})
			data.push({'name':'_token','value':token});
			console.log(data);
			$.post("/fileManager/updateName",data,function(result){
	 		if (result) {
	 			window.location.href = "/fileManager/{{ $mod }}/student-list/"+ grade;
		 	}
		});
			},1000);
			
				setTimeout(function() {
					$('.fa-check-circle-o').addClass('blue').prev().css('border-color','#168bee')
				},10)
		})
	})
		$(function(){
			setTimeout(function() {
				$('.part2').show().addClass('position').css({
					'top': '120px',
					'left': '23%'
				});

				//遮罩层
				$('.shad').show().height(window.innerHeight)

				$('.found').css({
					'z-index': '101',
					'background-color': '#fff',
					'position': 'relative'
				});

				$('.position').find('p').text('快去 创建班级 建立这个大家庭吧～')

				$('.ic-btn').on('click', function() {
					$('.d-n,.shad').hide()
					$('.found').attr('style','')
				})
			}, 10)
		})

	if(localStorage.keep==undefined){
		$('keep').text('生成账号').removeClass('hold');
		$('.btn-white>a').attr('href','studentFile.html');
	}else{
		$('.keep').text('保存').addClass('hold');
		$('.btn-white>a').attr('href','adminSeeinfo.html')
	};
	$('body').on('click','.nav1>li:nth-of-type(1),.btn-white>a',function(){
		localStorage.removeItem('keep')
	})
	$(".province-li").click(function(){
        $(".city-li").remove();
        province($(this).attr("data"))
    })
	function province(id) {
		$.ajax({
            type: "get",
            url: "/province/" + id,
            success: function(data) {
            	var data = JSON.parse(data);
            	var html ="";
               data.forEach(function(item){
               		html += "<li data='"+item.id+"' class='city-li'>" + item.name + "</li>";
               });
               $(".select-form .city .lists").html(html);
            }
        });
	}
	$(function(){
		setTimeout(function(){
			$('#seeInfo').click(function(){
				localStorage.keep='保存'
			});
			
			//下载打印
			$('.download').click(function(){
				$('.navbar,.found_class,#left,.left,.center1,.btns').hide()
				window.print();
				window.location.href='adminSeeinfo.html';
			})
		},100)
	})

	// 搜索student
	$('.fa-search').click(function(){
		var stuSearch = $('#stuSearch').val();
		var grade = $('#stuSearch').attr('grade');
		window.location.href = "/fileManager/{{ $mod }}/{{ $func }}/"+grade+'/'+stuSearch;
	});

		$('.ic-modal').css({
			'height': $(window).height(),
			'display': 'none'
		});
		$(function(){
			var course = JSON.parse('{!!isset($course) ? $course : "null" !!}');
			var classes= JSON.parse('{!!isset($class) ? $class : "null" !!}');
			var duty = JSON.parse('{!!isset($duty) ? $duty : "null" !!}');
			//console.log(course);
			//var branch=[{a:'',b:[duty]}];
			var coursees=[{a:"",b:[course]}];
			var result;
			var as=[];
			$('.branch2,.branch3,.branch').focus(function() {
				$('.section-nav>div:first-child>div').remove()
				if($(this).attr('num') == '1') {
					$('.section>.ic-blue').text('现任职务')
					$('.section,.ic-modal').show();
					for(var i=0;i<duty.length;i++){
						if(i==0){
							$('.section-nav>div:first-child').append('<div><ul></ul></div>');
						}
						$('.section-nav>div:first-child ul').append('<li class="firse"><b>'+duty[i].a+'：</b></li>');
						for(var a=0;a<duty[i].b.length;a++){
							for(var key in duty[i].b[a]){
							$('.section-nav>div:first-child ul').append('<li num='+key+'>'+duty[i].b[a][key]+'</li>');

							}
							$('.firse').css('clear','both')
						}
				}
			}else if($(this).attr('num') == '3'){
				$('.section>.ic-blue').text('任教课程')
				$('.section,.ic-modal').show();
					for(var i=0;i<coursees.length;i++){
						if(i==0){
							$('.section-nav>div:first-child').append('<div><ul></ul></div>');
						}
					/*	$('.section-nav>div:first-child ul').append('<b>'+coursees[i].a+'：</b>');*/
						for(var a=0;a<coursees[i].b.length;a++){
							for(var key in coursees[i].b[a]){
							$('.section-nav>div:first-child ul').append('<li num='+key+'>'+coursees[i].b[a][key]+'</li>');

							}
						}
				}
			}else if($(this).attr('num') == '2'){
				$('.section>.ic-blue').text('任教班级')
				$('.section,.ic-modal').show();
					for(var i=0;i<classes.length;i++){
						if(i==0){
							$('.section-nav>div:first-child').append('<div><ul></ul></div>');
						}
						$('.section-nav>div:first-child ul').append('<li class="firse"><b>'+classes[i].a+'：</b></li>');
						for(var a=0;a<classes[i].b.length;a++){
							for(var key in classes[i].b[a]){
								$('.section-nav>div:first-child ul').append('<li num='+key+'>'+classes[i].b[a][key]+'</li>');
							}
								$('.firse').css('clear','both')
						}
				}
			}
				result=$(this).attr('num')

				if (result != '1') {
					$('.section-nav>div:last-child').hide()
				}else{
					$('.section-nav>div:last-child').show()
				}
		$('body').on('click','.section ul>li',function(){
				$(this).addClass('bj-colo')
		
				as.push($(this).attr('num'))
			})
		$('.section-button>button').click(function(){
			$('.section,.ic-modal').hide()
		});
		
		});

		$('.section-button>.ic-btn').click(function(){
			var arry=[];
			var obj={};
			for(var i=0;i<as.length;i++){
				if(!obj[as[i]]){
					arry.push(as[i]);
					obj[as[i]]=1
				}
			}
			console.log(arry)
		if(result == '1') {
		$('.branch').val($('.bj-colo').text())
		$('.branch').attr('nums',arry);
	as=[];
		}else if(result == '2'){
			console.log('a')
			$('.branch2').val($('.bj-colo').text())
			$('.branch2').attr('nums',arry)
			as=[];
			
		}else{
			
			$('.branch3').val($('.bj-colo').text())
			$('.branch3').attr('nums',arry)
			as=[];
		}
		
	})
	})	
</script>
</body>
</html>
