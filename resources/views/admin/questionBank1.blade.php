<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>In Course</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/matching.css" />
		<link rel="stylesheet" href="css/biaoJi.css" />
		<link rel="stylesheet" href="css/index.css" />
		<!--[if lt IE 9]>
    <script src="../JS/html5shiv.min.js"></script>
    <script src="../JS/respond.min.js"></script>
    <script src="../JS/selectivizr.js"></script>
    <link rel="stylesheet" href="css/ie8.css"/>
    <![endif]-->
	</head>

	<body>
		<div class="navbar">
			<div>
				<div class="indexLogo">
					<img src="images/LOGO.png" />
					<img src="images/Hpb_schoolLogo.png" class="schoolLogo" />
					<b>湖南工程学院</b>
				</div>
				<ul class="nav head_nav">
					<li class="schoolMain">
						<a href="../../自媒体中心/mediaManager.html">学校首页</a>
						<div>
							<a href="../../自媒体中心/relateToMeManager.html">@与我相关</a>
						</div>
					</li>
					<li>
						<a href="questionBank.html" class="blue">题库管理</a>
					</li>
					<li class="affix">
						<a href="javascript:;"><img src="images/01.png" /></a>
					</li>
					<li class="personCenter">
						<a href="javascript:;">个人中心</a>
						<div class="cent">
							<a href="../个人信息/teacherPersonData.html">个人信息</a>
						</div>
					</li>
					<li>
						<a href="../../登录页/index.html" class="blue">退出</a>
					</li>
				</ul>
			</div>
		</div>
		<!--
    	作者offline
    	时间2016-05-24
    	描述内容标签页切换
  -->
		<div class="content">
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
								<li>
									<a href="questionBank.html">习题管理</a>
								</li>
								<li>
									<a href="questionBank1.html" class="box">上传习题</a>
								</li>
							</ul>
						</div>
						<!--内容-->
						<div class="col-xs-12 col-sm-12" id="centery">
							<div class="row center1">
								<div class="col-md-2 col-xs-4"></div>
								<div class="col-md-8 col-xs-4" id="col">上传习题</div>
								<div class="col-md-2 col-xs-4"></div>
							</div>
							<div class="row center2">
								<form action="" method="post">
									<label>
       									 年级：<select>
       									 	<option>选择年级</option>
       									 	 <option>一年级</option>
       									 	  <option>二年级</option>
       									 	   <option>三年级</option>
       									 	    <option>四年级</option>
       									 	     <option>五年级</option>
       									 </select>
    								</label>
									<label>
       									 班级：<select>
       									 <option>选择班级</option>
       									 	 <option>一班级</option>
       									 	  <option>二班级</option>
       									 	   <option>三班级</option>
       									 	    <option>四班级</option>
       									 	     <option>五班级</option>
       									 	   </select>
    								</label>
									<label>
        								科目：<select>
       									 <option>选择科目</option>
       									 	 <option>数学</option>
       									 	  <option>语文</option>
       									 	   <option>英语</option>
       									 	    <option>物理</option>
       									 	     <option>化学</option>
       									 	     <option>地理</option>
       									 	     <option>历史</option>
       									 	     <option>品德与社会</option>
       									 	   </select>
    								</label>
									<label>
        								章节：<select class="chapter">
       									 <option>选择章数</option>
       									 	 <option>第一章</option>
       									 	  <option>第二章</option>
       									 	   <option>第三章</option>
       									 	    <option>第四章</option>
       									 	     <option>第五章</option>
       									 	   </select>
       									 	   <select class="chapter"> 
       									 <option>选择节数</option>
       									 	 <option>第一节</option>
       									 	  <option>第二节</option>
       									 	   <option>第三节</option>
       									 	    <option>第四节</option>
       									 	     <option>第五节</option>
       									 	   </select>
   									</label>
									<label for="">
											题型：<select name="" class="question_types">
                                <option>解答题</option>
                                <option>单选题</option>
                                <option>多空题</option>
                                <option>多选题</option>
                                <option>画图题</option>
                                <option>连线题</option>
                                <option>排序题</option>
                                <option>判断题</option>
                                <option>填空题</option>
                                <option>综合题</option>
											</select>
										</label>
    								<label>
      									  分值：<select>
       									 <option>0</option>
       									 	 <option>40</option>
       									 	  <option>60</option>
       									 	   <option>70</option>
       									 	    <option>80</option>
       									 	     <option>100</option>
       	
       									 	   </select>
    								</label>
									<label for="" class="tx">
											<div id="appendix" class="right">
												<!--添加附件 -->
												<div class="appendix">
													<img src="images/email.png"/>&nbsp;&nbsp;添加附件
													<input type="file" id="upload1" name=""  value=""/>
												</div>
												<!--添加图片-->
												<div class="images">
													<img src="images/picture.png"/>&nbsp;&nbsp;添加图片
													<input type="file" name="" id="images" value="" />
												</div>
												<!--添加影音-->
												<div class="video">
													<img src="images/video.png"/>&nbsp;&nbsp;添加影音
													<input type="file" name="" id="" value="" />
												</div>
											</div>
											<div class="clear"></div>
										<!--所有的题型-->
										<div id="having">
											<!--解答题-->
											<div class="rubric1 block">
												<!--问题-->
												<div><span class="blue">问题:</span><div contenteditable="true" class="ask print"></div></div>
												<!--答案-->
												<div><span class="blue">答案:</span><div contenteditable="true" class="return print"></div></div>
											</div>
											<!--单选题-->
											<div class="rubric2">
												<!--问题-->
												<div><span class="blue">问题:</span><span id="quiz" contenteditable="true" class="print"></span></div>
												<!--选择答案-->
												<div class="select"></div>
												<!--添加选项和正确答案-->
												<div class="add_key">
													<!--添加选项-->
													<span class="key_a blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
													<!--正确答案-->
													<div class="right">正确答案：&nbsp;
														<select name="">
															
														</select>
													</div>
												</div>
											<!--清除浮动-->
											<div class="clear"></div>
											</div>
											<!--多空题-->
											<div class="rubric3">
												<div><span class="blue">问题:</span><span class="duok print" contenteditable="true"></span></div>
												<div class="Empty_title">请填写空格提示答案<span class="right blue blank"><img src="images/add_07.jpg"/>&nbsp;插入空格</span></div>
												<div class="and"></div>
											</div>
											<!--多选题-->
											<div class="rubric4">
												<div><span class="blue">问题:</span><span class="print" contenteditable="true"></span></div>
												<!--选择答案-->
												<div class="Multiselect"></div>
												<!--添加选项和正确答案-->
												<div class="Multiselectt">
													<!--添加选项-->		
													<span class="key_a blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
													<!--正确答案-->
													<div class="right daan">正确答案：&nbsp;
														<span><b>请选择正确的答案</b></span>
														<span></span>
													</div>
												</div>
											<!--清除浮动-->
											<div class="clear"></div>
											</div>
											<!--画图题-->
											<div class="rubric5">
												<!--问题-->
												<div><span class="blue">问题:</span><span class="draw print" contenteditable="true"></span></div>																																		</div>
											<!--连线题-->
											<div class="rubric6">
												<!--问题-->
												<div><span class="blue">问题:</span><span class="ligature print" contenteditable="true"></span></div>
												<div id="ligature">
													<!--选项A-->
													<div class="ligature_a left">
														子项A组：
													</div>
													<!--选项B-->
													<div class="ligature_b left">
														子项B组:
													</div>
												</div>
												<!--清除浮动-->
												<div class="clear"></div>
												<!--添加答案-->
												<div class="ligature_add">
													<span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
												</div>
											</div>
											<!--排序题-->
											<div class="rubric7">
												<div><span class="blue">问题:</span><span class="srot print" contenteditable="true"></span></div>
												<!--选项-->
												<div id="srot">
													子项：
													
												</div>
												<!--添加答案-->
												<div class="srot_add">
													<span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
												</div>
											</div>
											<!--判断题-->
											<div class="rubric8">
												<div class="judge">
													<div class="judge_w left">问题</div>
													<div class="judge_d left">答案</div>
												</div>
												<!--清除浮动-->
												<div class="clear"></div>
												<!--继续添加-->
												<div class="judge_add">
													<span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加题目</span>
												</div>
											</div>
											<!--填空题-->
											<div class="rubric9">
												<div><span class="blue">问题:</span><span class="pack print" contenteditable="true"></span></div>
												<div class="pack_add">正确答案：<span class="right blue"><img src="images/add_07.jpg"/>&nbsp;插入空格</span></div>
												<div id="pack"></div>
											</div>											
											<!--综合题-->
											<div class="rubric10">
                								<div class="syntheses">
                    								<div class="Answer_questions"><span class="blue">问题:</span><textarea name="" rows="" cols=""></textarea></div>
                   									<div class="superinduce blue">+添加题目</div>
               							 		</div>
                								<!--题型-->
                								<div class="question_typess">

                								</div>
           							 		</div>
										</div>
									</label>
									<div>
										<input type="submit" value="保存" name="" />
									</div>
								</form>
							</div>
							<!--综合题题库-->
							<div class="row center3">
								<form action="" method="post">
									<label for="" class="left width">
											题型&nbsp;&nbsp;
											<select name="" class="question_types">
                                <option>解答题</option>
                                <option>单选题</option>
                                <option>多空题</option>
                                <option>多选题</option>
                                <option>画图题</option>
                                <option>连线题</option>
                                <option>排序题</option>
                                <option>判断题</option>
                                <option>填空题</option>
											</select>
										</label>
									<label for="" class="right width">
											分值&nbsp;&nbsp;
											<input type="" name="" id="" value="" />
										</label>
									<label for="">
											<div id="appendix" class="right">
												<!--添加附件 -->
												<div class="appendix">
													<img src="images/email.png"/>&nbsp;&nbsp;添加附件
													<input type="file" id="upload2" name=""  value=""/>
												</div>
												<!--添加图片-->
												<div class="images">
													<img src="images/picture.png"/>&nbsp;&nbsp;添加图片
													<input type="file" name="" id="images1" value="" />
												</div>
												<!--添加影音-->
												<div class="video">
													<img src="images/video.png"/>&nbsp;&nbsp;添加影音
													<input type="file" name="" id="" value="" />
												</div>
											</div>
											<div class="clear"></div>
										<!--所有的题型-->
										<div id="having">
											<!--解答题-->
											<div class="rubric1 block">
												<!--问题-->
												<div><span class="blue">问题:</span><div contenteditable="true" class="ask print"></div></div>
												<!--答案-->
												<div><span class="blue">答案:</span><div contenteditable="true" class="return print"></div></div>
											</div>
											<!--单选题-->
											<div class="rubric2">
												<!--问题-->
												<div><span class="blue">问题:</span><span id="quiz" contenteditable="true" class="print"></span></div>
												<!--选择答案-->
												<div class="select"></div>
												<!--添加选项和正确答案-->
												<div class="add_key">
													<!--添加选项-->
													<span class="key_a blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
													<!--正确答案-->
													<div class="right">正确答案：&nbsp;
														<select name="">
															
														</select>
													</div>
												</div>
											<!--清除浮动-->
											<div class="clear"></div>
											</div>
											<!--多空题-->
											<div class="rubric3">
												<div><span class="blue">问题:</span><span class="duok print" contenteditable="true"></span></div>
												<div class="Empty_title">请填写空格提示答案<span class="right blue blank"><img src="images/add_07.jpg"/>&nbsp;插入空格</span></div>
												<div class="and"></div>
											</div>
											<!--多选题-->
											<div class="rubric4">
												<div><span class="blue">问题:</span><span class="print" contenteditable="true"></span></div>
												<!--选择答案-->
												<div class="Multiselect"></div>
												<!--添加选项和正确答案-->
												<div class="Multiselectt">
													<!--添加选项-->		
													<span class="key_a blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
													<!--正确答案-->
													<div class="right daan">正确答案：&nbsp;
														<span><b>请选择正确的答案</b></span>
														<span></span>
													</div>
												</div>
											<!--清除浮动-->
											<div class="clear"></div>
											</div>
											<!--画图题-->
											<div class="rubric5">
												<!--问题-->
												<div><span class="blue">问题:</span><span class="draw print" contenteditable="true"></span></div>																																		</div>
											<!--连线题-->
											<div class="rubric6">
												<!--问题-->
												<div><span class="blue">问题:</span><span class="ligature print" contenteditable="true"></span></div>
												<div id="ligature">
													<!--选项A-->
													<div class="ligature_a left">
														子项A组：
													</div>
													<!--选项B-->
													<div class="ligature_b left">
														子项B组:
													</div>
												</div>
												<!--清除浮动-->
												<div class="clear"></div>
												<!--添加答案-->
												<div class="ligature_add">
													<span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
												</div>
											</div>
											<!--排序题-->
											<div class="rubric7">
												<div><span class="blue">问题:</span><span class="srot print" contenteditable="true"></span></div>
												<!--选项-->
												<div id="srot">
													子项：
													
												</div>
												<!--添加答案-->
												<div class="srot_add">
													<span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span>
												</div>
											</div>
											<!--判断题-->
											<div class="rubric8">
												<div class="judge">
													<div class="judge_w left">问题</div>
													<div class="judge_d left">答案</div>
												</div>
												<!--清除浮动-->
												<div class="clear"></div>
												<!--继续添加-->
												<div class="judge_add">
													<span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加题目</span>
												</div>
											</div>
											<!--填空题-->
											<div class="rubric9">
												<div><span class="blue">问题:</span><span class="pack print" contenteditable="true"></span></div>
												<div class="pack_add">正确答案：<span class="right blue"><img src="images/add_07.jpg"/>&nbsp;插入空格</span></div>
												<div id="pack"></div>
											</div>											
										</div>
										<!--提交，保存按钮-->
										<div class="fastener right">
											<span class="revert">返回</span>
											<span class="fast">提交</span>
										</div>
									</label>
								</form>
							</div>
						</div>
						<!--右侧栏-->
						<div class="col-xs-12 left">
							<div class="col-md-12 col-xs-12">
								<a href="schoolNotice.html">
									通知</a><span class="openNotice">3</span>
							</div>
							<div class="col-md-12 col-xs-12 next">
								<ul class="nav nave">
									<li>
										<a href="#">1.明天交语文作业</a>
									</li>
									<li>
										<a href="#">2.5.1放假通知</a>
									</li>
									<li>
										<a href="#">3.周五语文考试</a>
									</li>
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
										<a href="javascript;" class="col-md-1"><img src="images/bo.png" /></a>
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
		<script src="js/jquery-1.12.4.min.js"></script>
		<script src="uploadify/jquery.uploadify.js"></script>
		<link href="css/questionBank1.css" rel="stylesheet">
		<link rel="stylesheet" href="uploadify/uploadify.css" />
		<script src="js/having.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/exerciseLibrary.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>