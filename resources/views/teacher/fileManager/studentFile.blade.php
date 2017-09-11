<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/incourseReset.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/index.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/school/step.css"/>
		<link rel="stylesheet" href="../../../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/studentFile.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/communal.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/school/adminSchool.css"/>
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
				
				<!--假数据内容-->
				

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
	
<!--高亮部分-->
		<div class="p-a part part2 d-n">
			<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>
			<p class="f-l">快去添加学生噢～</p>
			<button class="ic-btn p-a">我知道了</button>
		</div>
<!--遮罩层-->
	<div class="shad"></div>
	<!--script-->	
	<script type="text/javascript" src="../../../js/jquery-1.12.4.min.js" ></script>
	<script type="text/javascript" src="../../../js/load1.js" ></script>
	<script type="text/javascript" src="../../../js/index.js" ></script>
	<script type="text/javascript" src="../../../js/admin/admin.js" ></script>
	<script type="text/javascript" src="../../../js/admin/fileJs/found.js" ></script>
	<script type="text/javascript" src="../../../js/admin/fileJs/studentFile.js" ></script>
	<script type="text/javascript" src="../../../js/admin/fileJs/fileSelectionone.js" ></script>
	</body>
</html>







