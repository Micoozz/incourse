<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/questionBank.css">
    <link rel="stylesheet" href="css/index.css"/>
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
            <img src="images/LOGO.png"/>
            <img src="images/Hpb_schoolLogo.png" class="schoolLogo"/>
            <b>湖南工程学院</b>
        </div>
        <ul class="nav head_nav">
            <li class="schoolMain">
                <a href="../../自媒体中心/mediaManager.html">学校首页</a>
                <div>
                    <a href="../../自媒体中心/relateToMeManager.html">@与我相关</a>
                </div>
            </li>
            <li><a href="questionBank.html" class="blue">题库管理</a></li>
            <li class="affix">
                <a href="javascript:;"><img src="images/01.png" /></a>
            </li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
                    <div class="cent">
                        <a href="../个人信息/teacherPersonData.html">个人信息</a>
                    </div>
                </li>
                <li><a href="../../登录页/index.html" class="blue">退出</a></li>
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
                        <li><a href="questionBank.html"class="box">习题管理</a></li>
                        <li><a href="questionBank1.html">上传习题</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div class="col-md-2 col-xs-4"></div>
                        <div class="col-md-8 col-xs-4" id="col">习题管理</div>
                        <div class="col-md-2 col-xs-4"></div>
                    </div>
                    <form action="" class="row choose">
                        <ul class="nav navbar-nav">
                            <li>年级：</li>
                            <li>全部</li>
                            <li>一年级</li>
                            <li>二年级</li>
                            <li>三年级</li>
                            <li>更多</li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>班级：</li>
                            <li>全部</li>
                            <li>1班</li>
                            <li>2班</li>
                            <li>3班</li>
                            <li>4班</li>
                            <li>5班</li>
                            <li>更多</li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>学科：</li>
                            <li>全部</li>
                            <li>语文</li>
                            <li>数学</li>
                            <li>英语</li>
                            <li>更多</li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>题型：</li>
                            <li>全部</li>
                            <li>选择题</li>
                            <li>多选题</li>
                            <li>填空题</li>
                            <li>多空题</li>
                            <li>更多</li>
                        </ul>
                        <ul class="nav navbar-nav" id="choose1">
                            <li>章节：</li>
                            <li id="li">全部</li>
                            <li>第一章第一节</li>
                            <li>第一章第二节</li>
                            <li>第一张第三节</li>
                            <li>更多章节</li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>教师：</li>
                            <li>全部</li>
                            <li>李老师</li>
                            <li>董老师</li>
                            <li>更多</li>
                        </ul>
                        <input type="submit" value="查找" />
                    </form>
                <div class="row candidates">
                    <div class="col-md-1 col-xs-1"></div>
                    <div class="col-md-2 col-xs-2">条件筛选</div>
                    <div class="col-md-5 col-xs-5"></div>
                    <div class="col-md-3 col-xs-3 fri">
                    	<input type="text" name="" class="form-control " placeholder="搜索关键字" />
                                    <span><img src="images/search.png" /></span></div>
                    <div class="col-md-1 col-xs-1"></div>
                </div>
                <div class="row centent">
                    <div>
                    <span>共搜索出3道</span>
                    <!--所有题型-->
                   	<div class="question-types">              
                   			<ol>
                   				<!--单选题-->
                   				<li class="RadioButtonList">
                   					<!--问题-->
                   					<div class="RadioButtonList_issue">
                    					<!--序号-->
                   					<span class="order-number"></span>选择题：下列词语中的加点字读音完全相同的一组是（）</div>
                   					<!--问题删选-->
									<div class="radio">
                   						<div>
                   							<input type="radio" name="questionSelect" class="questionSelect" value="A"/>
                   							<span class="select-wrapper"></span>
                   							<b>A</b>.<span class="question-content">
                   								<span class="dot">着</span>陆 
                   								<span class="dot">着</span>落
                   								<span class="dot">着</span>火
                   								<span class="dot">着</span>急
                   							</span>
                   						</div>
                   					    <div>
                   							<input type="radio" name="questionSelect" class="questionSelect" value="B"/>
                   							<span class="select-wrapper"></span>
                   							<b>B</b>.<span class="question-content">
												羡<span class="dot">慕</span> 
												<span class="dot">募</span>捐 
												帷<span class="dot">幕 </span>
												<span class="dot">墓</span>地
                   							</span>
                   						</div>
                   						<div>
                   							<input type="radio" name="questionSelect" class="questionSelect" value="C"/>
                   							<span class="select-wrapper blues"></span>
                   							<b>C</b>.<span class="question-content">
												舟<span class="dot">楫</span> 逻<span class="dot">辑</span> 
												作<span class="dot">揖</span> 
												<span class="dot">缉</span>拿
                   							</span>
                   						</div>
                    					<div>
                   							<input type="radio" name="questionSelect" class="questionSelect" value="D"/>
                   							<span class="select-wrapper"></span>
                   							<b>D</b>.<span class="question-content">
												<span class="dot">参</span>差 
												人<span class="dot">参</span> 
												<span class="dot">参</span>加 
												<span class="dot">参</span>考
                   							</span>
                   						</div>
  
                   					</div>
                   					<!--正确答案-->
                   					<div class="daan">
                   						<span class="blue">正确答案:</span>
                   						<span class="an">C</span>
                   						<span class="star" title="难度1">
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_18.png"/>
                   							<img src="images/Cj_18.png"/>
                   							<img src="images/Cj_18.png"/>
                   							<img src="images/Cj_18.png"/>
                   						</span>
                   						<span class="bj"><a href="edit.html?2">编辑</a></span>
                   					</div>
                   					<!--清除浮动-->
                   					<div class="clear"></div>
                   				</li>
                    			<!--排序题-->
                   				<li class="Sort-title">
                   					<!--问题-->
                   					<div class="RadioButtonList_issue">
                    					<!--序号-->
                   					<span class="order-number"></span> 排序题：请给下列句子排序：</div>
                   					<!--问题删选-->
									<div class="radio">
                   						<div>①当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花。</div>
                   					    <div>②不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。</div>
                   						<div>③从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养料。</div>
                    					<div>④虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。</div>
  										<div>⑤种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子。</div>
                   					</div>
                   					<!--正确答案-->
                   					<div class="daan">
                   						<span class="blue">正确答案:</span>
                   						<span class="an">正确的顺序为⑤③④②①</span>
                   						<span class="star" title="难度3">
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_18.png"/>
                   							<img src="images/Cj_18.png"/>
                   						</span>
                   						<span class="bj"><a href="edit.html?7">编辑</a></span>
                   					</div>
                   					<!--清除浮动-->
                   					<div class="clear"></div>
                   				</li>
                    			<!--填空题-->
                   				<li class="Completion">
                   					<!--问题-->
                   					<div class="RadioButtonList_issue">
                    					<!--序号-->
                   					<span class="order-number"></span>                                        
                   					填空题：《朝花夕拾》原名《<div class="gap_gap">空1</div> 》,是鲁迅的回忆性散文集,请简介一下其中的一篇（课内学过的除外）的主要内容 ：<div class="gap_gap">空1</div></div>
                   					<!--正确答案-->
                   					<div class="daan">
                   						<span class="blue">正确答案:</span>
                   						<span class="an">1、《旧事重提》2、示例：《二十四孝图》主要内容：童年时代的我和我的伙伴实在没有什么好画册可看.我拥有的最早一本画图本子只是《二十四孝图》.其中最使我不解,甚至于发生反感的,是"老莱娱亲"和"郭巨埋儿"两 件事.</span>
                   						<span class="star" title="难度3">
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_17mm.png"/>
                   							<img src="images/Cj_18.png"/>
                   							<img src="images/Cj_18.png"/>
                   						</span>
                   						<span class="bj"><a href="edit.html?9">编辑</a></span>
                   					</div>
                   					<!--清除浮动-->
                   					<div class="clear"></div>
                   				</li>
                   			                  			
                   			</ol>                
                   	</div>
                </div>
                </div>
                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left">
                    <div class="col-md-12 col-xs-12"><a href="schoolNotice.html">
                        通知</a><span class="openNotice">3</span>
                    </div>
                    <div class="col-md-12 col-xs-12 next">
                        <ul class="nav nave">
                            <li><a href="#">1.明天交语文作业</a></li>
                            <li><a href="#">2.5.1放假通知</a></li>
                            <li><a href="#">3.周五语文考试</a></li>
                        </ul>
                    </div>
                    <div class="foot">
                        <div class="img" id="img"></div>
                        <ul class="nav">
                            <li><img src="images/08.png"/><b
                                    style="font-weight: normal;">同学</b><span><span>0</span><span>/</span><span>0</span></span>

                                <div class="QQ" id="QQ">
                                    <!--标签页切换-->
                                    <ul class="nav">
                                        <li>
                                            <span></span>
                                            <img src="images/02.gif"/>
                                            <b><span>小明</span></b>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><img src="images/08.png"/>老师<span><span>0</span><span>/</span><span>0</span></span>

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
                                    <img src="images/index1.jpg" title="表情"/>
                                    <img src="images/index2.jpg" title="图片"/>
                                    <img src="images/index3.jpg" title="剪裁"/>
                                    <img src="images/folder.png" title="上传附件"/>
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
<script src="js/bootstrap.min.js"></script>
<script src="js/questionBank.js"></script>
    <script src="js/placeholder.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>