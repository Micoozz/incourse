<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>InCourse</title>
		<link rel="stylesheet" href="/css/index_one.css" />

		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/selectivizr.js"></script>
		<link rel="stylesheet" href="css/reset.css"/>
		<![endif]-->

	</head>
	<body>
		<header>
			<div class="header">
				<div>
					<img src="/images/Cj_iconfont-jiaoyu (2).png" />
					<img src="/images/Cj_InCourse1.png" />
				</div>
			</div>
		</header>
		<center>
			<div class="form">
				<form id="login" action="">
				<!--	<h4>用户登录</h4>-->
					<div class="label">
						<div>
							<span><img src="images/Cj_ures.png" alt="" /></span>
							<input type="text" placeholder="帐号/邮箱"/>
						</div>
						<div>
							<span><img src="/images/Cj_lock.png" alt="" /></span>
							<input type="password" placeholder="请输入密码" class="login-password"/>
							<img src="/images/Cj_password.png" alt="" title="显示密码" onclick="return false"/>
						</div>
						<div>验证码：<input type="text" name="" id="yzm" value="" /></div>
						<div  class="clear"></div>
								<!--验证码图片还没写，-->
					</div>
					<div class="clear"></div>


					<label for="input1">
						<input type="radio" id="input1" name="job" value="teacher" num='1'/><span>教师</span>
					</label>
					<label for="input2">
						<input type="radio" id="input2" name="job" value="student" num='2'/><span>学生</span>
					</label>
					<label for="input3">
						<input type="radio" id="input3" name="job" value="manager" num='3'/><span>管理员</span>
					</label>

					<input type="button" class="submitBtn" value="登录"/>
				</form>
			</div>
		</center>
		<footer>
			<div class="footer">
				<div class="foot">
					<div class="foot_left">
						<img src="/images/Cj_iconfont-jiaoyu2.png" alt="" />
						<img src="/images/Cj_InCourse.png" alt="" />
						<div>
							本产品利用学生日常学习过程数据为全国中小学提供最为科学的教学自适应解决方案。产品资源覆盖全学科、全年段、全题型，致力于建立学生受教育阶段长期、全面的成绩记录与统计，并在过程中帮助学生高效查缺补漏，在考试前完成薄弱环节攻克。
						</div>
					</div>
					<div class="foot_right">
						<ul>
							<li><a href="#">关于我们</a></li>
							<li><a href="#">联系我们</a></li>
							<li><a href="#">帮助中心</a></li>
							<li><a href="#">意见反馈</a></li>
						</ul>
					</div>
					<div class="clear"></div>
						<div>
				</div>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="js/jquery-1.12.4.min.js" ></script>
		<!-- <script type="text/javascript" src="js/placeholder.js"></script> -->

		<script>
			$(function(){
				$('.label>div:nth-of-type(2)>img').click(function(){
					if($(this).prev().attr('type')=='password'){
					$(this).prev().attr('type','text');
					}else{
						$(this).prev().attr('type','password');
					}
				});
		localStorage.clear()
			})
//	ajax请求
$(function(){
	var numbers=null;
	$('input[name="job"]').click(function(){
		numbers=parseInt($(this).attr('num'));
	})
	$('.submitBtn').click(function(){
				var name=$('.label input[type="text"]').val(),
					passwords=$('.login-password').val();
		if(name==''){
			alert('用户名不能为空')
		}else if(passwords==''){
			alert('密码不能为空')

		}else{
			$.ajax({
				type:"post",
				url:"/login",
				data:{'name':name,'passwords':passwords,"number":numbers,'_token':'{{csrf_token()}}'},
				dataType:'json',
				success:function(data){
					if(data.code==200){
						// console.log('登录成功');
						window.location.href = '/adminArchives';
					}else{
						console.log('登录失败')
					}
				}
			});
		}	
	})
})
	</script>
	</body>
</html>