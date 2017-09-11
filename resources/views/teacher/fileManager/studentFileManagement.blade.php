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
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css"/>
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
								<div class="col-md-8 col-xs-4" id="col">学生档案管理</div>
								<div class="col-md-2 col-xs-4"></div>
							</div>
							<div class="school-container">
								<p class="basic-info">基本信息</p>
								<form action="" class="info-form" name="infoForm">
									<div class="f-l info-box">
										<div class="clear">
											<div class="f-l username">
												<span>姓名：</span>
												<input class="ic-input" name="username" type="text" />
											</div>
											<div class="f-l radio-box">
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
										</div>
										<div class="clear">
											<div class="f-l nation">
												<span>民族：</span>
												<input class="ic-input" name="nation" type="text" /> 族
											</div>
											<div class="f-l radio-box">
												<span>编制属性：</span>
												<label class="man p-r">
                    						<p class="radio">
                    							<i></i>
                    						</p>
                    						<input class="d-n" type="radio" name="formation" value="1"/> 编制
                    					</label>
												<label class="p-r">
                    						<p class="radio">
                    							<i></i>
                    						</p>
                    						<input class="d-n" type="radio" name="formation" value="0"/> 非编制
                    					</label>
											</div>
										</div>
										<div>
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
												<div class="city">
													<p class="ic-text">
														<span>市区</span>
														<i class="fa fa-angle-down"></i></p>
													<ul class="lists">
														<li>金华市</li>
														<li>杭州市</li>
														<li>宁波市</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="clear">
											<span class="f-l">出生年月：</span>
											<div class="f-l p-r">
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num="1"/>
												<i class="fa fa-calendar p-a gray facalen"></i>
											</div>
										</div>
										<div>
											<span>身份证号：</span>
											<input class="ic-input input-l" name="idCode" type="text" />
										</div>
								</div>
									<div class="f-r photo p-r of-h">
										<div class="photo-in">
											<img class="add-photo" src="../../../images/school/uploadPhoto.png" />
											<p class="gray">添加照片</p>
										</div>
										<input id="uploadHead" name="bigHead" class="file p-a" type="file" />
									</div>
									<div class="clears"></div>
							<div class="information">
										<div>
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
										</div>
										<div class="clear">
											<span class="f-l">时间：</span>
											<div class="f-l p-r">
												<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num='2'/>
												<i class="fa fa-calendar p-a gray facalens"></i>
											</div>
										</div>
										<div>
											<span>现班主任：</span>
											<input class="ic-input" name="nation" type="text" />
										</div>	
										<div>
											<span>联系方式：</span>
											<input class="ic-input" name="nation" type="text" />
										</div>	
									</div>
									<div class="clears"></div>
									<div class="family">
										<p class="basic-info">家庭情况</p>		
										<div class="f-l">
											<span>家庭地址：</span>
											<input class="ic-input" name="username" type="text" />
										</div>	
										<div class="clears"></div>
										<table border="0" cellspacing="0" cellpadding="0" class="family_table">
											<tr>
												<th>家庭成员</th>
												<th>与本人关系</th>
												<th>工作单位</th>
												<th>联系方式</th>
												<th>操作</th>
											</tr>
											<tr class="family_characters">
												<td><input type="" name="" id="" value="" /></td>
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
										<button class="btn-white"><a href="studentFile.html">返 回</a></button>
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
						<script type="text/javascript" src="../../../js/admin/fileJs/fileSelectionone.js" ></script>
						<script type="text/javascript" src="../../../js/lhgcore.js" ></script>
						<script type="text/javascript" src="../../../js/lhgcalendar.js" ></script>
						<script type="text/javascript" src="../../../js/load1.js" ></script>
						<script type="text/javascript" src="../../../js/admin/fileJs/studentFileManagement.js" ></script>
						<script>
								//判断是编辑还是创建
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
						</script>
	</body>

</html>