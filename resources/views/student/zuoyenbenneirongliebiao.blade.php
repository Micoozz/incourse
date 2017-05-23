<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js" ></script>
    <script src="js/hover.js" type="text/javascript" charset="utf-8"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
	<link rel="stylesheet" type="text/css" href="css/homework-2.css"/>
	<link rel="stylesheet" href="css/classActivity.css">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
	<script src="js/selectivizr.js"></script>
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
		<!--学习警示内容只有在当日作业错误过多时候会出现 进行提示-->
		<li><a href="javascript:;"style="background: transparent;">学习警示</a></li>
		<li class="schoolMain">
			<a href="../自媒体中心/media.html">学校首页</a>
			<div>
				<a href="../自媒体中心/relateToMe.html">@与我相关</a>
			</div>
		</li>
		<li><a href="zuoyenbenneirongliebiao.html" class="blue">学习中心</a></li>
		<li><a href="classSpace111.html">班级中心</a></li>
		<!--<li><a href="javascript:;">交易中心</a></li>-->
		<li class="affix"><a href="javascript:;"><img src="images/01.png"/></a></li>
		<li class="personCenter"><a href="javascript:;">个人中心</a>
			<div class="cent">
				<a href="synthesizeMark.html">分析中心</a>
				<a href="overTheYears_Report111.html">学习生活记录</a>
				<a href="personal_material-password111.html">个人信息</a>
			</div>
		</li>
		<li><a href="../登录页/index.html" class="blue">退出</a></li>
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
  			<li class="offt">语文</li>
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
  						
  						<li><a href="#" class="box">作业本</a></li>
  						<!--<li><a href="#">学习分析</a></li>-->
  						<li><a href="ziliaoku-neirongliebiao.html">资料库</a></li>
  						<li><a href="xitice.html">习题册</a></li>
  						<li><a href="yuyuelaoshi.html">联系老师</a></li>
  						<li><a href="contact.html">联系人</a></li>
  						<li><a href="kechengjieshao.html">课程介绍</a></li>
  					</ul>
  				</div>
  				<!--内容-->
  				<div class="col-xs-12 col-sm-12" id="centery">
     				<div class="row center1">
  						<div class="col-md-2 col-xs-4"></div>
  						<div class="col-md-8 col-xs-4"id="col">语文</div>
  						<div class="col-md-2 col-xs-4"style="display: none;">收藏夹</div>
     				</div>

     				<div class="order row form-group">
                    	<span style="position: relative;top:4px">排序：</span>
	                    <form action=""  class="homework-select-form">
		                    <label for="radio_1" class="pointer">
		                    	<input type="radio" id="radio_1" class="radio questionSelect" name="homework-select"/><span class="pointer select-wrapper"></span><span>发布日期</span>
                            </label>
							<label for="radio_2" class="pointer">
	                    		<input type="radio" id="radio_2" class="radio questionSelect" name="homework-select"/><span class="pointer select-wrapper"></span><span>截止日期</span>
							</label>
	                    </form>
	                </div>

	                <div class="homework-list row">
	                    <a class="homework-type-link" href="danrenzuoye.html">
	                    	<img src="images/homework/engage/single.png" class="homework-type-select-img"/>
	                    	<span class="homework-order">作业一</span>
	                    </a>
	                	<!--单人作业为蓝色  小组作业为橘黄色-->
	                    <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">
	                        <tr>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value1">
	                                        06-06-3:00<!--格式为 月-日-时   06-06-3:00 -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value2">
	                                        06-07-3:00<!--格式为 月-日 xx-xx  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value3">
	                                        2/30h<!--格式为 时/分 x/x  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value4">
	                                        92<!--格式为 xx 有分数显示分数，没分数显示图标 -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value5">
	                                    	开放<!--开放或者关闭  -->
	                                    </span>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>发布时间</td>
	                            <td>截止时间</td>
	                            <td>耗时</td>
	                            <td>得分</td>
	                            <td>状态</td>
	                        </tr>
	                    </table>

	                </div>
	                    <!--同上-->
	                <div class="homework-list row">
	                    <a class="pointer homework-type-link not-open" >
	                    	<img src="images/homework/engage/team.png" class="homework-type-select-img"/>
	                    	<span class="homework-order">作业二</span>
	                    </a>
	                    <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">
	                        <tr>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value1">
	                                        06-06-3:00<!--格式为 月-日-时  xx-xx-xx  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value2">
	                                        06-07-3:00
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value3">
	                                        1/h<!--格式为 时/分 x/x  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <img src="images/homework/subject/grade.png"/>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value5">关闭</span>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>发布时间</td>
	                            <td>截止时间</td>
	                            <td>耗时</td>
	                            <td>得分</td>
	                            <td>状态</td>
	                        </tr>
	                    </table>

	                </div>
	                	                <!-- 
	                (教师分组)点击为 xiaozuzuoye-jiaoshifenzu 页面
	                （自由分组）点击为 xiaozuzuoye-ziyoufenzu 页面-->
	                <div class="homework-list row">
	                    <a class="homework-type-link" href="xiaozuzuoye-jiaoshifenzu-gudingrenwu.html">
	                    	<img src="images/homework/engage/team.png" class="homework-type-select-img"/>
	                    	<span class="homework-order">作业三</span>

	                    </a>
	                    <span class="jiaoshifenzu">(教师分组)</span>
	                    <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">
	                        <tr>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value1">
	                                        06-08-18:00<!--格式为 月-日-时  xx-xx-xx  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value2">
	                                        06-09-18:00
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value3">
	                                        2/h<!--格式为 时/分 x/x  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value4">
	                                        98
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value5">开放</span>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>发布时间</td>
	                            <td>截止时间</td>
	                            <td>耗时</td>
	                            <td>得分</td>
	                            <td>状态</td>
	                        </tr>
	                    </table>

	                </div>

	                <div class="homework-list row">
	                    <a class="homework-type-link" href="xiaozuzuoye-jiaoshifenzu-xuanzerenwu.html">
	                    	<img src="images/homework/engage/team.png" class="homework-type-select-img"/>
	                    	<span class="homework-order">作业四</span>

	                    </a>
	                    <span class="jiaoshifenzu">(教师分组)</span>
	                    <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">
	                        <tr>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value1">
	                                        06-10-18:00<!--格式为 月-日-时  xx-xx-xx  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value2">
	                                        06-13-18:00
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value3">
	                                        2/h<!--格式为 时/分 x/x  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <img src="images/homework/subject/grade.png"/>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value5">开放</span>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>发布时间</td>
	                            <td>截止时间</td>
	                            <td>耗时</td>
	                            <td>得分</td>
	                            <td>状态</td>
	                        </tr>
	                    </table>

	                </div>

	                <div class="homework-list row">
	                    <a class="homework-type-link pointer"href="xiaozuzuoye-ziyoufenzu.html">
	                    	<img src="images/homework/engage/team.png" class="homework-type-select-img"/>
	                    	<span class="homework-order">作业五</span>
	                    </a>
	                    <span class="ziyoufenzu">(自由分组)</span>
	                    <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">
	                        <tr>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value1">
	                                        06-10-3:00<!--格式为 月-日-时  xx-xx-xx  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value2">
	                                        06-13-3:00
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value3">
	                                        1/30h<!--格式为 时/分 x/x  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <img src="images/homework/subject/grade.png"/>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-team">
	                                    <span class="circle-value5">关闭</span>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>发布时间</td>
	                            <td>截止时间</td>
	                            <td>耗时</td>
	                            <td>得分</td>
	                            <td>状态</td>
	                        </tr>
	                    </table>

	                </div>

	                <div class="homework-list row">

	                    <a class="homework-type-link not-open pointer">
	                    	<img src="images/homework/engage/single.png" class="homework-type-select-img"/>
	                    	<span class="homework-order">作业六</span>
	                    </a>
	                    <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">
	                        <tr>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value1">
	                                        06-14-10:00<!--格式为 月-日-时   06-06-3:00 -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value2">
	                                        06-15-10:00<!--格式为 月-日 xx-xx  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value3">
	                                       1/30h<!--格式为 时/分 x/x  -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value4">
	                                        <img src="images/homework/subject/grade.png"/><!--格式为 xx 有分数显示分数，没分数显示图标 -->
	                                    </span>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="homework-list-circle-single">
	                                    <span class="circle-value5">
	                                    	关闭<!--开放或者关闭  -->
	                                    </span>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>发布时间</td>
	                            <td>截止时间</td>
	                            <td>耗时</td>
	                            <td>得分</td>
	                            <td>状态</td>
	                        </tr>
	                    </table>

	                </div>

                </div>

  				<!--右侧栏-->
  				<div class="col-xs-12 left">
  					<div class="col-md-12 col-xs-12">
						<a href="classNotice.html">通知</a>
						<span class="openNotice">3</span>
  					</div>
  					<div class="col-md-12 col-xs-12 next">
  					<ul class="nav nave">
						<li><a href="classNotice.html#notice_01">1.明天交语文作业</a></li>
						<li><a href="classNotice.html#notice_02">2.5.1放假通知</a></li>
						<li><a href="classNotice.html#notice_03">3.周五语文考试</a></li>
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
  		<div class="Bomb">
				<div>
					<div>
						学习预警
					</div>
				</div>
				<div class="f_close">
					<img class="pointer" src="images/homework/subject/close.png"/>
				</div>
				<div class="Bomb_1">
					<ol>
						<li>
							<a href="#">5月27日的语文课后作业中，古诗文填空部分正确率较低。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">5月30日的英语课后作业中，有较多的语法单选题出现较大问题，请细心一点。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">6月1日的语文课后作业中，作文题目分数较低，请加强日常积累。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">6月2日的数学课后作业中，有较多的选择题正确率较低，请注意巩固基本知识点。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">6月3日的物理课后作业中，有较多的题目花费时间较长，请加强计算能力。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">6月6日的政治课后作业中，有较多的题目得分较低，请注意培养答题思路。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">6月9日的数学课后作业中，有较多的题目花费时间较长，可能基础知识掌握不牢固。</a>
							<span>查看</span>
						</li>

						<li>
							<a href="#">7月4日的语文课后作业中，有较多的题目出现较大问题，需要巩固相关内容知识点。</a>
							<span>查看</span>
						</li>
					</ol>
				</div>
				<ul>
					<li class="fi"></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<!--学习警示内容只有在当日作业错误过多时候会出现 进行提示-->
			<div class="opca"></div>
			<div class='Bomb1'>
				<div>
					<div>
						学习预警
						<img src="images/Cj_17.jpg">
					</div>
				</div>
				<div class="Bomb_1">
					<h4>报告内容</h4>
					<ul>
						<li>耗时约3h(全班约2h)</li>
						<li>本次分数为70分(全班约90分)</li>
						<li>错误率竟达到50%</li>
						<li>对比上次作业情况</li>
					</ul>
				</div>
				<div class="Bomb_1 Bomb_2">
					<h4>解决方案</h4>
					<ul>
						<li>本次作业所涉及的知识点掌握的不够牢固，请尽快查明原因</li>
						<li>根据历史分数情况判断，作业完成质量正在下滑，请及时与老师沟通 </li>
					</ul>

				</div>
				<div>
					<a href="today_homework.html">查看当前作业</a>
					<a href="system-push.html" target="_blank">查看系统推送题</a>
				</div>
			</div>

			<script src="js/classActivity.js"></script>
  		<div id="footf"></div>
  		<div id="footer"></div>
<div id="f-modal"></div>

<div class="not-open-tips">
	<div class="engage-status-icon good-circle text-center">
		<img src="images/homework/homework-group/!.png" alt="" />
	</div>
    <span class="engage-success-text">暂未开放！</span>
</div>
<!--<script type="text/javascript">
	$(function(){
		$(".circle-value5").each(function(i){
			var tex;
			tex =  $(".circle-value5").eq(i).text();
			if( tex == "关闭"){
				$(".homework-type-link").eq(i).css("cursor","not-allowed").attr("href","javascript:0;");
			}
		})
	})
</script>-->




<script type="text/javascript">
$(function(){
	$(".not-open").click(function(){
	$(".not-open-tips").fadeIn().fadeOut(2000);
	})
})
</script>
</body>
</html>
