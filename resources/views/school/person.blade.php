<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>InCourse</title>
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/font-awesome.min.css" />
		<link rel="stylesheet" href="../../css/incourseReset.css" />
		<link rel="stylesheet" href="../../css/index.css">
		<link rel="stylesheet" href="../../css/school/adminSchool.css" />
		<style>

		</style>
	</head>

	<body>
		<!-- 顶部导航 -->
		<!-- @include('school.template.head') -->
		<div class="navbar"></div>

		<div class="content">
			<div id="center">
				<div class="container">
					<div class="row">
						<!--左侧栏-->
						<!-- @include('school.template.left_navbar') -->
						<div class="col-xs-12" id="left"></div>

						<!--内容-->
						<div class="col-xs-12 col-sm-12" id="centery">
							<div class="row center1">
								<div class="col-md-2 col-xs-4"></div>
								<div class="col-md-8 col-xs-4" id="col">管理员档案</div>
								<div class="col-md-2 col-xs-4 addAdminTag right-tag">
									<img class="addEmployee" src="../../images/school/addEmployee.png" alt="" />
									<span>新建员工</span>
								</div>
							</div>
							<div class="school-container">
								<p class="basic-info">基本信息</p>
								<form action="" class="info-form" name="infoForm">
									<div class="f-l info-box seeInfoBox">
										<div class="p-r">
											<span>姓名：</span>孙天宇
											<p class="p-a info-pa">
												<span>性别：</span>男
											</p>
										</div>
										<div class="p-r">
											<span>民族：</span>汉族
											<p class="p-a info-pa">
												<span>编制属性：</span>编制
											</p>
										</div>
										<div>
											<span>籍贯：</span>浙江省杭州市
										</div>
										<div>
											<span>出生年月：</span>1990-2-14
										</div>
										<div>
											<span>身份证号：</span>3302138921873126392
										</div>
									</div>
									<div class="f-r photo p-r of-h big-head-box">
										<img src="../../images/big_head.jpg" />
									</div>
									<div class="btns">
										<button id="seeInfo" class="ic-btn">编 辑</button>
										<button class="btn-white">返 回</button>
									</div>
								</form>

							</div>
						</div>

						<!--右侧栏-->
						<!-- @include('school.template.right_notice') -->
						<div class="col-xs-12 left"></div>

						<script src="../../js/jquery-1.12.4.min.js" charset="utf-8"></script>
						<script src="../../js/load1.js" charset="utf-8"></script>
						<script src="../../js/index.js" charset="utf-8"></script>
						<script src="../../js/school/adminSchool.js" charset="utf-8"></script>
	</body>

</html>