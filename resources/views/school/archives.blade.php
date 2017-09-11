<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>InCourse</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{	asset('css/incourseReset.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/school/step.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/school/adminSchool.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/school/setLimit.css') }}" />
	<style>
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
		@if($func == 'manager-pwd' ||$func == 'manager-list' )
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

	</style>
</head>
<body>
<!-- 顶部导航 -->
<div class="navbar">
@include('school.include.head')
	
</div>

<div class="content">
	<div id="center">
		<div class="container p-r @if($func == 'manager-navigstion') addInfoSuccess @endif ">
			<div class="row">
				<!--左侧栏-->
				<div class="col-xs-12" id="left">
				@include('school.template.left_navbar')
				</div>
				<!--内容-->
				@if($mod == 'manager-archives')
					@if($func == 'manager-pwd' || $func == 'manager-updatepwd')
						@include('school.changePwd')
					@elseif($func == 'manager-address')
						@include('school.addInfo')
					@elseif($func == 'manager-list')
						@include('school.manageAdmin')
					@elseif($func == 'add-employee')
						@include('school.addAdmin')
					@elseif($func == 'manager-info')
						@include('school.template.seeInfo')
					@elseif($func == 'manager-navigstion')
						@include('school.addInfoSuccess')	
					@endif
				@elseif($mod == 'permissions')
					@if($func == 'permissions-page')
						@include('school.noAddEmployee')
					@elseif($func == 'permissions-allocation')
						@include('school.setLimit')
					@endif
				@endif

				@if($func == 'manager-list')
				<!--删除员工确认弹出框-->
				<div class="border ic-sure-modal d-n">
					<p class="fs14">
						<i class="fa fa-exclamation-circle p-r"></i>
						<span class="is-delete-msg">确定删除吗？</span>
					</p>
					<div class="btns">
						<button class="ic-btn" onclick="" >确 定</button>
						<button class="btn-white">取 消</button>
					</div>
				</div>
				@endif
				<!--遮罩层-->
				<div class="ic-modal d-n"></div>
				<!--右侧栏-->
				<div class="col-xs-12 left">
				@include('school.include.right_notice')		
				</div>

			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/index.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/lhgcore.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/lhgcalendar.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}"></script>
<script src="{{ asset('js/school/step.js') }}"></script>
<script src="{{ asset('js/school/adminSchool.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/school/setLimit.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/blankClick.js') }}" charset="utf-8"></script>
<script type="text/javascript">
	var token = "{{csrf_token()}}";
	var count = "{{ isset($data['count']) ? $data['count'] : ""  }}"
	$("#change").click(function() { 
       $url = "{{ URL('/kit/captcha/') }}";  
       $url = $url + "/" + Math.random();
       document.getElementById('kitCode').src=$url;  
    })
	$(".province-li").click(function(){
        $(".city-li").remove();
        province($(this).attr("data"))
    });
    $(".city").on("click",".city-li",function(){
    	$("#city_id").attr("ref",$(this).attr("data"));
    })
	function province(id) {
		$.ajax({
            type: "get",
            url: "/province/" + id,
            success: function(data) {/*
            	console.log(data)*/
            	var data = JSON.parse(data);

            	var html ="";
               data.forEach(function(item){
               		html += "<li data='"+item.id+"' class='city-li'>" + item.name + "</li>";
               });
               $(".select-form .city .lists").html(html);
            }
        });
	}

	function forbid(id,status) {
		if 	(status == 0){
			if (confirm("您确定要开启该管理员吗")) {
				$.ajax({
					type: "get",
					url: "/forbid/" +id + '/' + status,
					success:function(data){
						window.location.href = "/adminArchives/manager-archives/manager-list";
					}
				});
			}
		}else{
			if (confirm("您确定要禁用该管理员吗")) {
				$.ajax({
					type: "get",
					url: "/forbid/" +id + '/' +status,
					success:function(data){
						window.location.href = "/adminArchives/manager-archives/manager-list";
					}
				});
			}
		}
	}

	function delEmployee(id){
		$.ajax({
			type: "get",
			url: "/delEmployee/" +id,
			success:function(data){
				window.location.href = "/adminArchives/manager-archives/manager-list";
			}
		});
	}
	// 搜索EMPLOYEE
	$('.fa-search').click(function(){
		var emSearchy = $('#emSearchy').val();
		window.location.href = "/adminArchives/manager-archives/manager-list/"+emSearchy;
	});
	//搜索roleEmployee
	$('.roleEmployee').click(function(){
		var roleEmployee = $('#roleEmployee').val();
		window.location.href = "/adminArchives/permissions/permissions-allocation/"+roleEmployee;
	});
	//日期插件
	J(function(){
		J('.info-form .fa-calendar').calendar({ id:'birthTime', btnBar:false});
	});
</script>
</body>
</html>
