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

		<!--圆形进度条-->
		<link rel="stylesheet" type="text/css" href="../../css/progressBar.css" />
		<title>InCourse</title>
		<style>
			.consuming {
				text-align: center;
			}
			
			.error-answer {
				margin-top: 40px;
			}
			
			.error-answer>ul>li {
				float: left;
				background: #3DBD7D;
				font-family: PingFangSC-Regular;
				font-size: 14px;
				color: #FFFFFF;
				letter-spacing: 0;
				width: 32px;
				height: 32px;
				margin-right: 32px;
				text-align: center;
				line-height: 32px;
				border-radius: 16px;
			}
			.error-answer>ul>.bj-ff5{
				background-color:  #FF5B5B;
			}
			.submits{
				    margin-top: 40px;
    text-align: center;
			}
			.submits button{
				margin-right: 10px;
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
								<span class="col-xs-6 col-sm-6">错题报告</span>
								<span class="col-xs-3 col-sm-3 add"></span>
							</div>
							<div class="ic-container accout">
								<!--进度条-->
								<div class="progresse"></div>
								<div class="consuming">总耗时：33分20秒</div>
								<div class="error-answer">
									<p>答题卡：</p>
									<ul>
										<li>1</li>
										<li>2</li>
										<li class="bj-ff5">3</li>
										<li class="bj-ff5">4</li>
									</ul>
								</div>
								<div class="clear"></div>
								<div class="submits">
									<button class="btn-white">放弃答题</button>
									<button class="ic-btn">错题解析</button>
									<button class="ic-btn">继续辅导</button>
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

					//圆形进度条
					var percentum = 50; //正确率百分比
					var percentums = percentum * 6.29 //进度条百分比
					$(function() {
						$('.progressbar>li').find('svg:last-child').find('path').attr('stroke-dashoffset', percentums)
						$('.progressbar>li:last-child>b:last-child').text(percentum + '%')
					})
				}, 10)
			})
		</script>
	</body>

</html>