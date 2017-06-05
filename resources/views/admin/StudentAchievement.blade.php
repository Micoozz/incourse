<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>In Course</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/Teaching.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/Teaching1.css">
    <link rel="stylesheet" href="css/Teaching3.css">
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
                        <div class="col-md-2 col-xs-4"><a href="SRewardEditor">添加奖励</a></div>
                        <div class="col-md-8 col-xs-4" id="col">张三丰</div>
                        <div class="col-md-2 col-xs-4"><a href="StudentManagement">返回</a></div>
                    </div>
                    <form action="" class="row choose">
                        <ul class="nav navbar-nav">
                            <li>年级：</li>
                            <li><a href="#">全部</a></li>
                            <li><a href="#">一年级</a></li>
                            <li><a href="#">二年级</a></li>
                            <li><a href="#">三年级</a></li>
                            <li><a href="#">更多</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>学期：</li>
                            <li><a href="#">全部</a></li>
                            <li><a href="#">上学期</a></li>
                            <li><a href="#">下学期</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>月份：</li>
                            <li><a href="#">全部</a></li>
                            <li><a href="#">1月</a></li>
                            <li><a href="#">2月</a></li>
                            <li><a href="#">3月</a></li>
                            <li><a href="#">更多</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>分类：</li>
                            <li><a href="#">全部</a></li>
                            <li><a href="#">考试</a></li>
                            <li><a href="#">作业</a></li>
                        </ul>
                    </form>
                    <div class="row candidates">
                        <div class="col-md-1 col-xs-1"></div>
                        <div class="col-md-2 col-xs-2">记录分类</div>
                        <div class="col-md-5 col-xs-5"></div>
                        <div class="col-md-3 col-xs-3 fri">
                        	 <input type="text" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="laydate-icon form-control " placeholder="请输入时间">
                                    <span><img src="images/search.png" /></span>
                        </div>
                        <div class="col-md-1 col-xs-1"></div>
                    </div>
                    <table id="table">
                        <thead>
                        <tr>
                            <th>时间</th>
                            <th>分数</th>
                            <th>校内名次</th>
                            <th>班内名次</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="td">2016-01-12</td>
                            <td>580分</td>
                            <td>80</td>
                            <td>13</td>
                            <td><span>查看</span></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="detailed">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8"></div>
                            <div class="col-md-1"><img src="images/Cj_03.png" /></div>
                        </div>
                        <div class="last">
                            <table id="table">
                                <thead>
                                <tr>
                                    <th>科目</th>
                                    <th>分数</th>
                                    <th>班内排名</th>
                                    <th>年级排名</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>数学</td>
                                    <td>98</td>
                                    <td>2</td>
                                    <td>10</td>
                                </tr>
                                </tbody>
                            </table>

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
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="opca"></div>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Teaching1.js"></script>
<script src="js/Teaching3.js"></script>
<script type="text/javascript" src="js/index.js"></script>
    <script ytpe="text/javascript" src="js/placeholder.js"></script>
  <script type="text/javascript" src="js/laydate.js"></script>
<script>
	!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
	laydate({elem: '#demo'});//绑定元素
}();
</script>
</body>
</html>