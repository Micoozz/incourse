<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>InCourse</title>
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/incourseReset.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/index.css"/>	
		<link rel="stylesheet" href="../../../css/school/adminSchool.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/communal.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/studentFileManagement.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/teacherFileManagement.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css"/>	
	<style>
				.seeInfoBox .tone{
					    position: absolute;
   						 width: 200px;
				}
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
								<div class="col-md-8 col-xs-4" id="col">校长档案管理编辑</div>
								<div class="col-md-2 col-xs-4"></div>
							</div>
							<div class="school-container">
								<p class="basic-info">基本信息</p>
								<form action="" class="info-form" name="infoForm">
									<div class="f-l info-box seeInfoBox">
										<div class="p-r">
											<span>姓名：</span>
												<input class="ic-input" name="username" type="text" />
											<p class="p-a info-pa">
												<div class="p-a info-pa info-pas radio-box">
												<span>性别：</span>
												<label class="man p-r">
                    						<p class="radio">
                    							<i></i>
                    						</p>
                    						<input class="d-n" type="radio" name="gender" value="1"/> 男
                    					</label>
												<label class="p-r">
                    						<p class="radio">
                    							<i></i>
                    						</p>
                    						<input class="d-n" type="radio" name="gender" value="0"/> 女
                    					</label>												
											</div>
											</p>
										</div>
										<div class="p-r">
											<span>民族：</span>
											<input class="ic-input" name="username" type="text" />族
											<p class="p-a info-pa tone">
											<span>身体状况：</span>
											<input class="ic-input" name="username" type="text" />
											</p>
										</div>
										<div class="p-r">
											<span class="f-l">籍贯：</span>
											<!--<input class="ic-input" name="birthPlace" type="text"/>-->
											<div class="select-form clear">
												<div class="province">
													<p class="ic-text">
														<span>选择省份</span>
														<i class="fa fa-angle-down"></i></p>
													<ul class="lists">
														<li>浙江省</li>
														<li>广东省</li>
														<li>吉林省</li>
													</ul>
												</div>
												</div>
										</div>
										<div class="p-r">
												<span>出生年月：</span>
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num='5' />
												<i class="fa fa-calendar p-a gray facalensese"></i>										
										</div>
										<div>
											<span>身份证号：</span>
											<input class="ic-input" name="username" type="text" />
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
											<span class="f-l">现任班级：</span>
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
												<label class="man p-r">
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
										<div class="p-r">
											<span>毕业校园：</span>
											<input class="ic-input" name="username" type="text" />
											<p class="p-a info-pa info-pas">
												<span>毕业时间：</span>
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num="6"/>
												<i class="fa fa-calendar p-a gray facalenseses"></i>
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
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" />
												<i class="fa fa-calendar p-a gray facalensesese"></i>
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
										<button id="addAdminBtn" class="ic-btn keep">生成账号</button>
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
						<script type="text/javascript" src="../../../js/load1.js" ></script>
						<script type="text/javascript" src="../../../js/admin/admin.js"></script>
						<script type="text/javascript" src="../../../js/admin/fileJs/studentFileManagement.js" ></script>
						<script type="text/javascript" src="../../../js/school/adminSchool.js" ></script>
						<script type="text/javascript" src="../../../js/admin/fileJs/fileSelectiononethree.js.js" ></script>
						<script type="text/javascript" src="../../../js/lhgcore.js" ></script>
						<script type="text/javascript" src="../../../js/lhgcalendar.js" ></script>	
												<script>
								//判断是编辑还是创建
	if(localStorage.keep==undefined){
		$('.keep').text('生成账号').removeClass('hold');
	}else{
		$('.keep').text('保存').addClass('hold');
	};
	$('body').on('click','.nav1>li:nth-of-type(1),.btn-white>a',function(){
		localStorage.removeItem('keep')
	})
						</script>
				
	</body>

</html>