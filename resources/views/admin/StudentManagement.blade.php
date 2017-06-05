<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>In Course</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/Teaching.css" rel="stylesheet">
    <link href="css/Teaching2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css"/>
    <!--[if lt IE 9]>
    <script src="../JS/html5shiv.min.js"></script>
    <script src="../JS/respond.min.js"></script>
    <script src="../JS/selectivizr.js"></script>
    <link rel="stylesheet" href="css/ie8x.css"/>
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
                <a href="mediaManager">学校首页</a>
                <div>
                    <a href="relateToMeManager">@与我相关</a>
                </div>
            </li>
            <li><a href="Teaching" class="blue">教学管理</a></li>
            <li class="affix">
                <a href="javascript:;"><img src="images/01.png" /></a>
            </li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
                    <div class="cent">
                        <a href="teacherPersonData">个人信息</a>
                    </div>
                </li>
                <li><a href="index" class="blue">退出</a></li>
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
                        <li><a href="TeachingManagement" >教师管理</a></li>
                        <li><a href="StudentManagement" class="box">学生管理</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div class="col-md-2 col-xs-4"></div>
                        <div class="col-md-8 col-xs-4" id="col">学生管理</div>
                        <div class="col-md-2 col-xs-4"></div>
                    </div>
                    <form action="" class="row choose">
                    	<ul class="nav navbar-nav">
                            <li>分类：</li>
                            <li id="1">学生排名</li>
                            <li id="2">班级排名</li>
                        </ul>
                    	<ul class="nav navbar-nav">
                            <li>方式：</li>
                            <li>成绩排名</li>
                            <li class="pm">进步幅度排名</li>
                        </ul>
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
                            <li>全科</li>
                            <li>语文</li>
                            <li>数学</li>
                            <li>英语</li>
                            <li>更多</li>
                        </ul>
                        <ul class="nav navbar-nav ul">
                            <li>学期：</li>
                            <li>全部</li>
                            <li>上学期</li>
                            <li>下学期</li>
                        </ul>
                        <ul class="nav navbar-nav ul">
                            <li>月份：</li>
                            <li>全部</li>
                            <li>1月</li>
                            <li>2月</li>
                            <li>3月</li>
                            <li>更多</li>
                        </ul>
                        <ul class="nav navbar-nav ul">
                            <li>时间：</li>
                            <li>全部</li>
                            <li>第一周</li>
                            <li>第二周</li>
                            <li>第三周</li>
                        </ul>
                        <input type="submit" value="查找" />
                        <span>[高级检索]</span>
                    </form>
                    <div class="row candidates">
                        <div class="col-md-1 col-xs-1"></div>
                        <div class="col-md-2 col-xs-2">条件筛选</div>
                        <div class="col-md-5 col-xs-5"></div>
                        <div class="col-md-3 col-xs-3 fri">
                        	 <input type="text" name="" class="form-control " placeholder="请输入姓名" />
                                    <span><img src="images/search.png" /></span>
                        </div>
                        <div class="col-md-1 col-xs-1"></div>
                    </div>
                  <div>
                  <table id="table" class="table1">
                        <thead>
                        <tr>
                            <th>排名</th>
                            <th>姓名</th>
                            <th>年级</th>
                            <th>班级</th>
                            <th>科目</th>
                            <th>分数</th>
                            <th class="qs">趋势</th>
                        </tr>
                        </thead>
                        <tbody>
                           <tr>
                            <td><a href="StudentAchievement">1</a></td>
                            <td><a href="StudentAchievement">张三丰</a></td>
                            <td><a href="StudentAchievement">一年级</a></td>
                            <td><a href="StudentAchievement">二班</a></td>
                            <td><a href="StudentAchievement">语文</a></td>
                            <td><a href="StudentAchievement">450</a></td>
                            <td><div class="last_td"></div></td>
                        </tr>
                           <tr>
                            <td><a href="#">2</a></td>
                            <td><a href="#">张杰</a></td>
                            <td><a href="#">一年级</a></td>
                            <td><a href="#">二班</a></td>
                            <td><a href="#">语文</a></td>
                            <td><a href="#">500</a></td>
                            <td><div class="last_th"></div></td>
                        </tr>
                        </tbody>
                    </table>
               		<table id="table" style="display: none;" class="table2">
                        <thead>
                        <tr>
                            <th>排名</th>
                            <th>班级</th>
                            <th>科目</th>
                            <th>平均分</th>
                            <th class="qs">趋势</th>
                        </tr>
                        </thead>
                        <tbody>
                           <tr>
                            <td>1</td>
                            <td>一年级</td>
                            <td>二班</td>
                            <td>75</td>
                            <td><div class="last_td"></div></td>
                        </tr>
                                                   <tr>
                            <td>2</td>
                            <td>一年级</td>
                            <td>二班</td>
                            <td>75</td>
                            <td><div class="last_th"></div></td>
                        </tr>
                        </tbody>
                    </table>
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
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Teaching1.js"></script>
<script src="js/Teaching2.js"></script>
<script type="text/javascript" src="js/index.js"></script>
    <script ytpe="text/javascript" src="js/placeholder.js"></script>
</body>
</html>