<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>InCourse</title>
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/incourseReset.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/index.css"/>	
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css"/>
		<link rel="stylesheet" href="../../../css/school/adminSchool.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/studentFileManagement.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/communal.css"/>
		<style>

		</style>
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
							<div class="row center1">
								<div class="col-md-2 col-xs-4"></div>
								<div class="col-md-8 col-xs-4" id="col">教师档案管理编辑</div>
								<div class="col-md-2 col-xs-4 addAdminTag">
								</div>
							</div>
							<div class="school-container">
								<div class="seeInfo-wrap">
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
													<span>编制属性：</span>试用期
												</p>												
											</div>
											<div class="p-r">
												<span>籍贯：</span>浙江省杭州市
												<p class="p-a info-pa">
													<span>身体状态：</span>良好
												</p>
											</div>
											<div>
												<span>出生年月：</span>1990-2-14
											</div>
											<div>
												<span>身份证号：</span>3302138921873126392
											</div>
											<div class="p-r">
												<span>所在部门：</span>教务部
												<p class="p-a info-pa">
													<span>现任职务：</span>无
												</p>
											</div>	
											<div class="p-r">
												<span>任教班级：</span>一年级一班
												<p class="p-a info-pa">
													<span>班主任：</span>否
												</p>
											</div>	
											<div class="p-r">
												<span>毕业学校：</span>浙江大学
												<p class="p-a info-pa">
													<span>毕业时间：</span>1990-7-1
												</p>
											</div>												
											<div class="p-r">
												<span>政治面貌：</span>无
												<p class="p-a info-pa">
													<span>入党时间：</span>无
												</p>
											</div>											
										</div>
										<div class="f-r photo p-r of-h big-head-box">
											<img src="../../../images/big_head.jpg" />
										</div>
										<div class="clear"></div>
										<div class="teacherSeeinfo">
											<p class="basic-info">工作经历</p>
											<div>
												<span>家庭地址：</span>杭州余杭西溪北苑北区
											</div>
										<table border="0" cellspacing="0" cellpadding="0" class="family_table">
											<tr>
												<th>起止时间</th>
												<th>所在学校/单位</th>
												<th>职务</th>
											</tr>
											<tr class="family_characters">
												<td>2013.07~2014.10</td>
												<td>浙大</td>
												<td>教师</td>
											</tr>
										</table>											
										</div>
										<div class="btns">
											<button class="download ic-btn">下载打印</button>
											<button id="seeInfo" class="ic-btn"><a href="teacherFileManagement.html">编 辑</a></button>
											<button class="btn-white"><a href="teacherFiles.html">返 回</a></button>
										</div>
									</form>

								</div>
							</div>
						</div>

						<!--右侧栏-->
						<!-- @include('school.template.right_notice') -->
						<div class="col-xs-12 left"></div>

						<!-- 聊天窗口 -->
						<!-- @include('school.template.talk') -->
						<div class="chatRoom"></div>
						<script src="../../../js/jquery-1.12.4.min.js" charset="utf-8"></script>
						<script src="../../../js/index.js" charset="utf-8"></script>
						<script type="text/javascript" src="../../../js/load1.js" ></script>
						<script type="text/javascript" src="../../../js/admin/admin.js" ></script>
						<script>
							$(function(){
								setTimeout(function(){
//									$('.nav1>li:nth-of-type(1)').addClass('left_nac');
//									$('#seeInfo').click(function(){
//										localStorage.keep='保存'
//									});
									
									//下载打印
									$('.download').click(function(){
										$('.navbar,.found_class,#left,.left,.center1,.btns').hide()
										window.print();
										window.location.href='adminSeeinfo.html';
									})
								},100)
							})
						</script>
	</body>

</html>