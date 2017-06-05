<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>InCourse</title>
		<script src="js/jquery-1.12.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script src="js/laydate.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/index.css" />
		<link rel="stylesheet" href="css/Exercise_editor.css">
		<!--解决IE8不支持placeholder-->
		<script src="js/jquery.placeholder.min.js"></script>
		<script>
			$(function() {
				$('input, textarea').placeholder();
			});
		</script>

		<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
<div class="navbar">
    <div>
        <div class="indexLogo">
            <img src="images/LOGO.png"/>
            <img src="images/Hpb_schoolLogo.png" class="schoolLogo"/>
            <b>湖南工程学院</b>
        </div>
        <ul class="nav head_nav">
            <li class="schoolMain">
                <a href="/media">学校首页</a>
                <div>
                    <a href="/relateToMe">@与我相关</a>
                </div>
            </li>
            <li><a href="Arrangement_work(homepage)" class="blue">学习中心</a></li>
            <li><a href="classSpace111">班级中心</a></li>
            <!--<li><a href="javascript:;">交易中心</a></li>-->
            <li class="affix">
                <a href="javascript:;"><img src="images/01.png"/></a>
            </li>
            <li class="personCenter"><a href="javascript:;">个人中心</a>
                <div class="cent">
                    <a href="class">分析中心</a>
                    <a href="老师成绩单1">学习生活记录</a>
                    <a href="teacherPersonData">个人信息</a>
                </div>
            </li>
            <li><a href="/logout" class="blue">退出</a></li>
        </ul>

    </div>
</div>
    <!--
    	作者offline
    	时间2016-05-24
    	描述内容标签页切换
  -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div id="cent_nav" class="col-md-3 col-xs-12">
						<ul class="col-md-12 col-xs-12">
							<li>
								<a href="create-class">+创建班级</a>
							</li>
							<li>一年一班语文</li>
							<li>二年一班音乐</li>
						</ul>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-3"></div>
				</div>
			</div>
			<!--
        作者：offline
        时间：2016-05-24
        描述：中心内容
    -->
			<div id="center">
				<div class="container">
					<div class="row">
						<!--左侧栏-->
                <div class="col-xs-12 " id="left">
                    <ul class="nav1 nav" id="nav1">
                        <li><a href="Arrangement_work(homepage)" class="box">作业管理</a></li>
                        <li><a href="Exercise_editor">习题库</a></li>
                        <li><a href="data">资料库</a></li>
                        <li><a href="duty_arrange">班级管理</a></li>
                        <li><a href="classindex">成绩管理</a></li>
                        <li style="padding: 0"><a href="class-outline" data-step="3"
                                                  data-intro="添加对应班级的课程大纲">课程大纲</a>
                        </li>
                        <li><a href="A_classroom_courseware_111">课堂课件</a></li>
                    </ul>
                </div>
						<!--内容-->
						<div class="col-xs-12 col-sm-12" id="centery">
							<div class="row center1">
								<div class="col-md-2 col-xs-2"></div>
								<div class="col-md-8 col-xs-8 center_title" id="col">一年一班作业（语文）</div>
								<div class="col-md-2 col-xs-2"></div>
							</div>
							<div id="content">
								<form action="">
									<div id="z_1">
										<div class="z_t_c row ">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
												<span>作业章节</span>
												<input type="text" value=" ">
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												<span>截止时间</span>
												<input style="padding-left: 10px" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm'})">
											</div>
										</div>
										<div class=" row">
											<div class="col-lg-12 z_introduce">
												<span>所属章节</span>
												<input type="text" value=" ">
											</div>
										</div>
									</div>
									<!--<div id="add">
										<div id="add_add">
											<label for="addword"><img src="images/email.png">&nbsp;添加附件</label>
											<input type="file" id="addword" style="display: none">
											<label for="addpic"><img src="images/picture.png">&nbsp;添加图片</label>
											<input type="file" id="addpic" style="display: none">
											<label for="addmov"><img src="images/video.png"> &nbsp;添加影音</label>
											<input type="file" id="addmov" style="display: none">
										</div>
									</div>-->
									<div id="xxx">
										<div class="end" id="div1">
											<div class="text">
												<!--<textarea placeholder="请添加文字描述"></textarea>-->



												<!--HPB修改 开始-->
												<!-- 加载编辑器的容器 -->
												<script id="container" name="content" type="text/plain"></script>
												<!-- 配置文件 -->
												<script type="text/javascript" src="ueditor.config.js"></script>
												<!-- 编辑器源码文件 -->
												<script type="text/javascript" src="ueditor.all.js"></script>
												<!--HPB修改 结束-->





											</div>
											<div class="go_success" style="top: 19%;left: 41%">发布成功！</div>
											<div class="row">
												<div class="col-md-4"></div>
											   <div class=" col-md-8 new_mlbtn">
												<a href="Favorites"  class="bt_a">取消</a>
												<a href="#" class="bt_s Ad-se">发布</a>
												<a href="Exercise_editor" class="bt_s">题库选题</a>
												<a href="Independent_operation_Add_topic" class="bt_s">添加题目</a>
										<!--		<a href="Independent_operation_Add_job_specific_content.html" class="goo"><img src="images/add.png" alt="">去添加题目</a>-->
											   </div>
											</div>
										</div>

									</div>
								</form>
							</div>
						</div>
						<!--右侧栏-->
						<div class="col-xs-12 left">
                    <div class="col-md-12 col-xs-12">
                        <a href="schoolNotice" style="color: #FFFFFF ">通知</a><span class="openNotice">3</span>
                    </div>
                    <div class="col-md-12 col-xs-12 next">
                        <ul class="nav nave">
                            <li><a href="classNotice">1.明天交语文作业</a></li>
                            <li><a href="classNotice">2.5.1放假通知</a></li>
                            <li><a href="classNotice">3.周五语文考试</a></li>
                        </ul>
                    </div>
							<div class="foot">
								<div class="img" id="img"></div>
								<ul class="nav">
									<li><img src="images/08.png" /><b style="font-weight: normal;">同学</b><span><span>0</span><span>/</span><span>0</span></span>
										<div class="QQ" id="QQ">
											<!--标签页切换-->
											<ul class="nav">
												<li>
													<span></span>
													<img src="images/02.gif" />
													<b><span>小明</span></b>
												</li>
											</ul>
										</div>
									</li>
									<li><img src="images/08.png" />老师<span><span>0</span><span>/</span><span>0</span></span>
										<div>
											<!--标签页切换-->
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="chatRoom">
							<ul class="nav">
								<li class="row">
									<div class="chatRoom1 col-md-12">
                                    <a href="#" class="col-md-1" style="width: 4%;padding: 0;color: #fff!important;">小明</a>
                                    <a href="javascript;" class="col-md-1"><img src="images/bo.png"/></a>
                                    <span class="col-md-1" style="text-align: right;cursor: pointer;float: right;">X</span>
									</div>
									<div class="chatRoom2 col-md-12"></div>
									<div class="chatRoom3 col-md-12">
										<div class="chatRoom3_a">
											<img src="images/index1.jpg" title="表情" />
											<img src="images/index2.jpg" title="图片" />
											<img src="images/index3.jpg" title="剪裁" />
											<img src="images/folder.png" title="上传附件" />
											<span>聊天记录</span>
										</div>
										<div class="chatRoom3_b" contenteditable="true"></div>
										<div class="btn-msg-send">
											<a title="也可点击发送">Ctrl+Enter发送</a>
											<img src="images/index5.jpg">
										</div>
										<div class="chatRoom3_c">
											<span>Enter发送</span>
											<span class="spann">Ctrl+Enter发送</span>
										</div>
									</div>
								</li>
							</ul>
							<div class="personDataContent">
								<!--个人资料和设置头像-->
								<div id="form">
									<table>
										<tr id="t1">
											<td class="td">InCourse账号：</td>
											<td>
												xxxxxx
												<!--修改密码 -->
											</td>
										</tr>
										<tr id="t2">
											<td class="td">真实姓名：</td>
											<td>李蓉</td>
										</tr>
										<tr id="t3">
											<td class="td">个性签名：</td>
											<td>学习是生活的阶梯</td>
										</tr>
										<tr id="t4">
											<td class="td">性别：</td>
											<td>男</td>
										</tr>
										<tr id="t5">
											<td class="td">生日：</td>
											<td>1990年01月01日</td>
										</tr>
										<tr id="t6">
											<td class="td">主要科目：</td>
											<td>语文</td>
										</tr>
										<tr id="t7">
											<td class="td">爱好：</td>
											<td>阅读</td>
										</tr>
										<tr id="t8">
											<td class="td">所在学校：</td>
											<td>杭州第四中学</td>
										</tr>
										<tr id="t10">
											<td class="td">职位：</td>
											<td>老师</td>
										</tr>
										<!--
                                               <tr id="t11">
                                                    <td></td>
                                                    <td>
                                                        <input type="button" value="保存" >
                                                    </td>
                                                </tr>
                                           -->
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div id="footf"></div>
		<div id="footer"></div>
		<script>
			$(function() {
				$(".Ad-se").click(
					function() {
						$(".go_success").show();
						setTimeout(function() {
							$(".go_success").hide()
						}, 2000);
					}
				);
				var box = localStorage.getItem('key');
				var boxx = localStorage.getItem('keyy')
				$('.goo').css('display', box)
				if(boxx==null) {
					$('.bt_a').text('取消')
				} else {
					$('.bt_a').text(boxx)
				}
				$('.bt_a').click(function() {
					localStorage.removeItem('key')
					localStorage.removeItem('keyy')
				})
			})
		</script>

		<!-- 实例化编辑器 HPB修改-->
		<script type="text/javascript">
			var ue = UE.getEditor('container');
			// 自定义工具栏图片的"title"为“图片”
			ue.ready(function(){
				var imageTitle=document.getElementById("edui123_body");
				imageTitle.setAttribute("title","图片");
			})
			// 提交编辑器
			$(".Ad-se").click(function(){
				event.preventDefault();
				ue.ready(function(){
					var txt=ue.getContent();
				})
			});
		</script>
	 <!--日期控件JS-->
	 <script type="text/javascript">
		 !function(){
			 laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
			 laydate({elem: '#demo'});//绑定元素
		 }();

		 //日期范围限制
		 var start = {
			 elem: '#start',
			 format: 'YYYY-MM-DD',
			 min: laydate.now(), //设定最小日期为当前日期
			 max: '2099-06-16', //最大日期
			 istime: true,
			 istoday: false,
			 choose: function(datas){
				 end.min = datas; //开始日选好后，重置结束日的最小日期
				 end.start = datas //将结束日的初始值设定为开始日
			 }
		 };

		 var end = {
			 elem: '#end',
			 format: 'YYYY-MM-DD',
			 min: laydate.now(),
			 max: '2099-06-16',
			 istime: true,
			 istoday: false,
			 choose: function(datas){
				 start.max = datas; //结束日选好后，充值开始日的最大日期
			 }
		 };
		 laydate(start);
		 laydate(end);

		 //自定义日期格式
		 laydate({
			 elem: '#test1',
			 format: 'YYYY年MM月DD日',
			 festival: true, //显示节日
			 choose: function(datas){ //选择日期完毕的回调
				 alert('得到：'+datas);
			 }
		 });

		 //日期范围限定在昨天到明天
		 laydate({
			 elem: '#hello3',
			 min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
			 max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
		 });
	 </script>
	</body>

</html>