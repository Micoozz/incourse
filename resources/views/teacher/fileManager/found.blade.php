<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/incourseReset.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/school/step.css') }}"/>
		<link rel="stylesheet" href="../../../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css"/>
		<title>InCourse</title>
	</head>
	<body>
				<!-- 顶部导航 -->
<!-- @include('school.template.head') -->
	<div class="navbar record"></div>


<!--创建班级-->
	<div class="found_class"></div>


<div class="content">
	<div id="center">
		<div class="container">
			<div class="row">
				<!--左侧栏-->
				<!-- @include('school.template.left_navbar') -->
				<div class="col-xs-12" id="left"></div>
				
				<!--内容-->
				<div class="col-xs-12 col-sm-12" id="centery">
					<div class="ic-container">
						<div class="waitBox">
							<div>
								<img class="logo" src="../../../images/LOGO.png" alt="InCourse_logo" />
							</div>
							<div>请点击创建班级噢~</div>
						</div>
					</div>
				</div>

				<!--右侧栏-->
				<!-- @include('school.template.right_notice') -->
				<div class="col-xs-12 left"></div>

				<!-- 聊天窗口 -->
				<!-- @include('school.template.talk') -->
				<div class="chatRoom"></div>
			</div>
		</div>
	</div>
</div>
	<!--script-->	
	<script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('js/index.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('js/admin/admin.js') }}" ></script>
	<script type="text/javascript" src="{{ js/admin/fileJs/found.js') }}" ></script>
	</body>
</html>






