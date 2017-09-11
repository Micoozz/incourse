<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../../css/incourseReset.css" />
		<link rel="stylesheet" type="text/css" href="../../css/index.css" />
		<link rel="stylesheet" type="text/css" href="../../css/admin/fileCss/foundClass.css" />
		<link rel="stylesheet" type="text/css" href="../../css/student/questionTypes.css" />
		<title>InCourse</title>
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
					<div class="row question-row">
						<!--内容-->
						<div class="col-xs-12 col-sm-12 question-center" id="centery">
							<div class="subject-nav">
								<ul>
									<li class="bj-fff">语文</li>
									<li>数学</li>
									<li>英语</li>
									<li>物理</li>
								</ul>
							</div>
							<div class="ic-container">
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
										<td><i class="fa fa-edit"></i></td>
									</tr>
									<tr>
										<td><i class="fa fa-user-o"></i>&nbsp;&nbsp;7月7日作业</td>
										<td>第一章作业解析</td>
										<td>06-07 10:00</td>
										<td>未答题</td>
										<td>未答题</td>
										<td><i class="fa fa-edit"></i></td>
									</tr>
									<tr>
										<td><i class="fa fa-user-o"></i>&nbsp;&nbsp;7月7日作业</td>
										<td>第一章作业解析</td>
										<td>06-07 19:00</td>
										<td>未答题</td>
										<td>未答题</td>
										<td><i class="fa fa-edit"></i></td>
									</tr>
								</table>
							</div>
						</div>
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
			<p class="f-l">快去添加校长噢～</p>
			<button class="ic-btn p-a">我知道了</button>
		</div>
		<!--遮罩层-->
		<div class="shad"></div>
		<!--script-->
		<script type="text/javascript" src="../../js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="../../js/scholastic.js"></script>
		<script type="text/javascript" src="../../js/student/questionTypes.js"></script>
		<script>
			$(function() {
				setTimeout(function() {
					$('.part2').show().addClass('position').css({
						'top': '130px',
						'left': '22%'
					});

					//遮罩层
					$('.shad').show().height(window.innerHeight)

					$('.question-found_class').css({
						'z-index': '101',
						'color': '#fff',
						'position': 'relative'
					});

					$('.position').find('p').text('快去今日作业做题吧')

					var nav; //引导
					$('.ic-btn').on('click', function() {
						if(nav == 1) {
							$('.part2,.shad').hide();
							nav=null;
							
						}else{
							$('.position').find('p').text('点击科目进入科目栏')
						$('.part2').show().addClass('position').css({
							'top': '130px',
							'left': '30%'
						});
						nav = 1
						}
					})
				}, 10)
			})
		</script>
	</body>

</html>