<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../../css/incourseReset.css" />
		<link rel="stylesheet" type="text/css" href="../../css/index.css" />
		<link rel="stylesheet" type="text/css" href="../../css/admin/fileCss/foundClass.css" />
		<link rel="stylesheet" type="text/css" href="../../css/admin/fileCss/studentFile.css" />
		<link rel="stylesheet" type="text/css" href="../../css/student/questionTypes.css" />
		<link rel="stylesheet" type="text/css" href="../../css/admin/fileCss/communal.css" />
		<title>InCourse</title>
		<style>
			.accout {
				padding-top: 100px;
			}
		</style>
	</head>

	<body>
		<!-- 顶部导航 -->
		<!-- @include('school.template.head') -->
		<div class="question navbar"></div>

		<!--创建班级-->
		<div class="found_class question-found_class"></div>

		<div class="content">
			<div id="center">
				<div class="container">
					<div class="row">
						<!--左侧栏-->
						<!-- @include('school.template.left_navbar') -->
						<div class="col-xs-12 pupilleft" id="left"></div>

						<!--内容-->
						<div class="col-xs-12 col-sm-12" id="centery">
							<div class="files_nav">
								<span class="col-xs-3 col-sm-3"></span>
								<span class="col-xs-6 col-sm-6">数学</span>
								<span class="col-xs-3 col-sm-3 add"></span>
							</div>
							<div class="ic-container accout">
								<!--假数据-->
								<table border="" cellspacing="" cellpadding="" class="title">
									<tr>
										<th>作业名称</th>
										<th>章节</th>
										<th>截止时间&nbsp;&nbsp;<i class="fa fa-unsorted"></i></th>
										<th>得分</th>
										<th>耗时</th>
										<th>操作</th>
									</tr>
									<tr>
										<td><i class="fa fa-user-o"></i>&nbsp;&nbsp;7月7日作业</td>
										<td>第一章作业解析</td>
										<td>06-07 8:00</td>
										<td>未答题</td>
										<td>未答题</td>
										<td><a href="aTitle.html"><i class="fa fa-edit"></i></a></td>
									</tr>
									<tr>
										<td><i class="fa fa-user-o"></i>&nbsp;&nbsp;7月7日作业</td>
										<td>第一章作业解析</td>
										<td>06-07 10:00</td>
										<td>未答题</td>
										<td>未答题</td>
										<td><a href="aTitle.html"><i class="fa fa-edit"></i></a></td>
									</tr>
									<tr>
										<td><i class="fa fa-user-o"></i>&nbsp;&nbsp;7月7日作业</td>
										<td>第一章作业解析</td>
										<td>06-07 19:00</td>
										<td>未答题</td>
										<td>未答题</td>
										<td><a href="aTitle.html"><i class="fa fa-edit"></i></a></td>
									</tr>
								</table>
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
		<script type="text/javascript" src="../../js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="../../js/index.js"></script>
		<script type="text/javascript" src="../../js/load1.js"></script>
		<script type="text/javascript" src="../../js/scholastic.js"></script>
		<script type="text/javascript" src="../../js/admin/fileJs/fileSelectionone.js"></script>
		<script>
			$(function() {
				setTimeout(function() {
					$('.question-found_class li').removeClass('first');
					$('.question-found_class li:nth-of-type(1) sup').hide();
					$('.question-found_class li:nth-of-type(2)').addClass('first');
				}, 10)
			})
		</script>
	</body>

</html>