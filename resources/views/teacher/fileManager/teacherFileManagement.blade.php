<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/incourseReset.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/index.css" />
		<link rel="stylesheet" href="../../../css/school/adminSchool.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/communal.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/studentFileManagement.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/teacherFileManagement.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css" />
		<style>
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
								<div class="col-md-2 col-xs-4"></div>
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
												<span>编制属性：</span>试用期
											</p>
										</div>
										<div class="p-r">
											<span>籍贯：</span>浙江省杭州市
											<p class="p-a info-pa">
												<span>身体状态：</span>良好
											</p>
										</div>
										<div class="p-r">
											<span>出生年月：</span>1990-2-14
											<p class="p-a info-pa">
												<span>账号：</span>1111000
												<b class="padd">重置密码</b>
											</p>
										</div>
										<div>
											<span>身份证号：</span>3302138921873126392
										</div>
										<div class="p-r">
											<span>所在部门：</span>
											<input class="ic-input" name="username" type="text" />
											<p class="p-a info-pa info-pas">
												<span>现任职务：</span>
												<input class="ic-input" name="username" type="text" />
											</p>
										</div>
										<div class="p-r">
											<span class="f-l">任教班级：</span>
											<!--<input class="ic-input" name="birthPlace" type="text"/>-->
											<div class="select-form clear">
												<div class="province">
													<p class="ic-text">
														<span>选择班级</span>
														<i class="fa fa-angle-down"></i></p>
													<ul class="lists">
														<li>一年级一班</li>
														<li>一年级二班</li>
													</ul>
												</div>
											</div>
											<div class="p-a info-pa info-pas radio-box">
												<span>班主任：</span>
												<label class="man p-r ">
                    						<p class="radio">
                    							<i></i>
                    						</p>
                    						<input class="d-n" type="radio" name="gender" value="1"/> 是
                    					</label>
												<label class="p-r">
                    						<p class="radio">
                    							<i></i>
                    						</p>
                    						<input class="d-n" type="radio" name="gender" value="0"/> 否
                    					</label>
											</div>
										</div>
										<div>
											<span class="f-l">任教课程：</span>
											<!--<input class="ic-input" name="birthPlace" type="text"/>-->
											<div class="select-form clear">
												<div class="province">
													<p class="ic-text">
														<span>添加课程</span>
														<i class="fa fa-angle-down"></i></p>
													<ul class="listse">
														<li class="end"><input type="" name="" id="" value="" /></li>
														<li><i class="fa fa-plus-circle"></i></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="p-r">
											<span>毕业校园：</span>
											<input class="ic-input" name="username" type="text" />
											<p class="p-a info-pa info-pas">
												<span>毕业时间：</span>
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num='3' />
												<i class="fa fa-calendar p-a gray facalense"></i>
											</p>
										</div>
										<div class="p-r">
											<span class="f-l">政治面貌：</span>
											<!--<input class="ic-input" name="birthPlace" type="text"/>-->
											<div class="select-form">
												<div class="province">
													<p class="ic-text">
														<span>无</span>
														<i class="fa fa-angle-down"></i></p>
													<ul class="lists">
														<li>少先队员</li>
														<li>共青团员</li>
														<li>预备党员</li>
														<li>正式党员</li>
													</ul>
												</div>
											</div>
											<p class="p-a info-pa info-pas">
												<span>入党时间：</span>
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num="4" />
												<i class="fa fa-calendar p-a gray facalenses"></i>
											</p>
										</div>
									</div>
									<div class="f-r photo p-r of-h big-head-box">
										<img src="../../../images/big_head.jpg" />
									</div>
									<div class="clears"></div>
									<div class="family">
										<p class="basic-info">工作经历</p>
										<div class="clears"></div>
										<table border="0" cellspacing="0" cellpadding="0" class="family_table">
											<tr>
												<th>起止时间</th>
												<th>所在学校/单位</th>
												<th>职务</th>
												<th>操作</th>
											</tr>
											<tr class="family_characters">
												<td><input type="" name="" id="" value="" /></td>
												<td><input type="" name="" id="" value="" /></td>
												<td><input type="" name="" id="" value="" /></td>
												<td><i class="fa fa-file" title="保存"></i> <i class="fa fa-times" title="删除"></i></td>
											</tr>
										</table>
										<div class="add_table"><i class="fa fa-plus-circle"></i>添加</div>
									</div>
									<div class="btns">
										<button id="addAdminBtn" class="ic-btn keep">保存</button>
										<button class="btn-white"><a href="JavaScript:history.back(-1)">返 回</a></button>
									</div>
								</form>
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
						<script src="../../../js/incourseReset.js"></script>
						<script type="text/javascript" src="../../../js/admin/admin.js"></script>
						<script type="text/javascript" src="../../../js/admin/fileJs/studentFileManagement.js"></script>
						<script src="../../../js/school/adminSchool.js" charset="utf-8"></script>
						<script type="text/javascript" src="../../../js/admin/fileJs/fileSelectiononetwo.js"></script>
						<script type="text/javascript" src="../../../js/lhgcore.js"></script>
						<script type="text/javascript" src="../../../js/lhgcalendar.js"></script>
						<script type="text/javascript" src="../../../js/load1.js"></script>
						<script>
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
						</script>
	</body>

</html>