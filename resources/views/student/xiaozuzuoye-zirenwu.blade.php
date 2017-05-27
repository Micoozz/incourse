<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js" ></script>
    <script src="js/homework-content.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/password.js" type="text/javascript" charset="utf-8"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
	<script src="js/selectivizr.js"></script>
    <![endif]-->
    <style>
       
    </style>
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
            	 <li><a href="/zuoyenbenneirongliebiao" class="blue">学习中心</a></li>
                <li><a href="javascript:;">班级中心</a></li>
                <li><a href="javascript:;">交易中心</a></li>
                <li class="affix"><a href="javascript:;"><img src="images/01.png" /></a></li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
					<div class="cent">
						<a href="javascript:;">分析中心</a>
						<a href="javascript:;">学习生活记录</a>
						<a href="personal_material-password111.html">个人信息</a>
					</div>
                </li>
                <li><a href="/index" class="blue">退出</a></li>
            </ul>
				</div>
</div>
	<!--
    	作者：offline
    	时间：2016-05-24
    	描述：内容标签页切换
  -->
  <div class="content">
  <div class="container">
  <div class="row">
  <div id="cent_nav" class="col-md-3 col-xs-12">
  		<ul class="col-md-12 col-xs-12">
			<li onclick=window.open("today_homework.html","_self")>今日作业</li>
  			<li>语文</li>
  			<li>数学</li>
  			<li>英语</li>
  			<li>添加课程</li>
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
  				<div class="col-xs-12" id="left">
  					<ul class="nav1 nav" id="nav1">
  						<li><a href="/zuoyenbenneirongliebiao" class="box">作业本</a></li>
  						<!--<li><a href="#">学习分析</a></li>-->
  						<li><a href="ziliaoku-neirongliebiao.html">资料库</a></li>
  						<li><a href="javascript:;">习题册</a></li>
  						<li><a href="javascript:;">联系老师</a></li>
  						<li><a href="javascript:;">联系人</a></li>
  						<li><a href="javascript:;">课程介绍</a></li>
  					</ul>
  				</div>
  				<!--内容-->
  				<div class="col-xs-12 col-sm-12" id="centery" style="height: 100%">
     				 <div class="row center1">
  						<div class="col-md-2 col-xs-4">
  							<a class="return-fyg" href="javascript:history.back(-1);"></a>
  						</div>
  						<div class="col-md-8 col-xs-4"id="col">语文</div>
  						<div class="col-md-2 col-xs-4"style="display: none;">收藏夹</div>
  					</div>
  					
  					<div class="homework-content"style="border: none;">
	                    <p class="task-step">
	                        <span class="task-step-head">我的子任务：</span>
	                        负责填写报告
		                </p>

						<div class="report-input">
							<script id="container" name="content" type="text/plain"></script>
					        <script type="text/javascript" src="ueditor.config.js"></script>
					        <script type="text/javascript" src="ueditor.all.js"></script>
						    <script src="kityformula-plugin/addKityFormulaDialog.js"></script>
							<script src="kityformula-plugin/defaultFilterFix.js"></script>
							<script src="kityformula-plugin/getKfContent.js"></script>
						    <script type="text/javascript">
						        var ue = UE.getEditor('container');
							</script>
						</div>
						<div class="btn yes center-block report-input-btn">保存</div>

	                </div>

	            </div>

  				<!--右侧栏-->
  				<div class="col-xs-12 left">
  					<div class="col-md-12 col-xs-12">
						<a href="javascript:;">通知</a>
						<span class="openNotice">3</span>
  					</div>
  					<div class="col-md-12 col-xs-12 next">
  					<ul class="nav nave">
						<li><a href="javascript:;">1.明天交语文作业</a></li>
						<li><a href="javascript:;">2.5.1放假通知</a></li>
						<li><a href="javascript:;">3.周五语文考试</a></li>
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
  		</div>
  		<div id="footf"></div>
  		<div id="footer"></div>

  		
</body>
</html>