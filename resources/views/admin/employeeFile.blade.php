<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>员工档案</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script>
        $(function() {
            $('input, textarea').placeholder();
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="js/placeholder.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/data.css" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/data2.css" />
    <script src="../JS/html5shiv.min.js"></script>
    <script src="../JS/respond.min.js"></script>
    <script src="../JS/selectivizr.js"></script>
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
            <li><a href="addEmployeeFile" class="blue">档案管理</a></li>
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
    	作者：offline
    	时间：2016-05-24
    	描述：内容标签页切换
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
                            <li><a href="employeeFile" class="box">员工档案</a></li>
                            <li><a href="studentFile">学生档案</a></li>

                        </ul>
                    </div>
                    <!--内容-->
                    <div class="col-xs-12 col-sm-12" id="centery">
                        <div class="row center1">
                            <div class="col-md-3 col-xs-3"></div>
                            <div class="col-md-6 col-xs-6" id="col">员工档案</div>
                            <div class="col-md-3 col-xs-3">
                                <a href="addEmployeeFile" class="add-file">+&nbsp;添加档案</a>
                            </div>
                        </div>
                        <!--更多分类下拉菜单-->
                        <div class="main-container">
                            <form action="" class="row choose">
                                <ul class="nav navbar-nav">
                                    <li>部门：</li>
                                    <li>全部</li>
                                    <li>政教处</li>
                                    <li>教工处</li>
                                    <li>教务处</li>
                                    <li>后勤处</li>
                                    <li>财务室</li>
                                    <li>更多</li>
                                </ul>
                                <ul class="nav navbar-nav">
                                    <li>年级：</li>
                                    <li>全部</li>
                                    <li>未分配</li>
                                    <li>一年级</li>
                                    <li>二年级</li>
                                    <li>三年级</li>
                                    <li>四年级</li>
                                    <li>更多</li>
                                </ul>
                                <ul class="nav navbar-nav">
                                    <li>学科：</li>
                                    <li>全部</li>
                                    <li>数学</li>
                                    <li>音乐</li>
                                    <li>美术</li>
                                    <li>英语</li>
                                    <li>语文</li>
                                    <li>体育</li>
                                    <li>更多</li>
                                </ul>
                                <ul class="nav navbar-nav">
                                    <li>班级：</li>
                                    <li>全部</li>
                                    <li>未分配</li>
                                    <li>一班</li>
                                    <li>二班</li>
                                    <li>三班</li>
                                    <li>四班</li>
                                    <li>更多</li>
                                </ul>
                            </form>
                        <!--更多分类下拉菜单-->
                            <div class="row candidates">
                                <div class="col-md-1 col-xs-1"></div>
                                <div class="col-md-2 col-xs-2">条件筛选</div>
                                <div class="col-md-5 col-xs-1"></div>
                                <div class="col-md-4 col-xs-5 fri">
                                    <input type="text" name="" class="form-control emp_stu_input" placeholder="请输入姓名" />
                                    <span><img src="images/search.png" /></span>
                                </div>
                            </div>
                            <table class="table table-info">
                                <tr class="add-border-bottom">
                                    <th></th>
                                    <th>编号</th>
                                    <th>姓名</th>
                                    <th>职务</th>
                                    <th>所在部门</th>
                                    <th>操作</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" value="" class="checkbox">
                                    </td>
                                    <td>
                                        <span class="number">1</span>
                                    </td>
                                    <td>
                                        张玲
                                    </td>
                                    <td>
                                        <span>教师</span>
                                    </td>
                                    <td><span>教工处</span></td>
                                    <td><a href="addEmployeeFile" class="delete">编辑</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" value="" class="checkbox">
                                    </td>
                                    <td>
                                        <span class="number">1</span>
                                    </td>
                                    <td>
                                        张玲
                                    </td>
                                    <td>
                                        <span>教师</span>
                                    </td>
                                    <td><span>教工处</span></td>
                                    <td><a href="addEmployeeFile" class="delete">编辑</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" value="" class="checkbox">
                                    </td>
                                    <td>
                                        <span class="number">1</span>
                                    </td>
                                    <td>
                                        张玲
                                    </td>
                                    <td>
                                        <span>教师</span>
                                    </td>
                                    <td><span>教工处</span></td>
                                    <td><a href="addEmployeeFile" class="delete">编辑</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row" id="end">
                            <table class="table myTable">
                                <tr>
                                    <td class="empFile_qx">
                                        <input type="checkbox" value="" class="empFile_all_checkbox" id="choose-all">
                                        <span >全选</span>
                                    </td>
                                    <td class="empFile_zj"></td>
                                    <td>
                                        <button class="empFile_btn color_gray fp" type="button">
                                        	<!--一键分配-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="fix">
                                                <a href="javascript:;" class="on" >分配账号</a>
                                                <a href="javascript:;" >分配班级</a>
                                            </div>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#myConfirm">
                                            <span class="color_gray batch-delete">批量删除</span>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!--右侧栏-->
                    <div class="col-xs-12 left">
                        <div class="col-md-12 col-xs-12">
                            <a href="schoolNotice.html">通知</a><span class="openNotice">3</span>
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
    <!--*****************************************************************-->
    <!--确认模态框-->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog my_conf_dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header my_conf">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " id="myModalLabel">提示</h4>
                </div>
                <div class="modal-body my_conf_body">
                    确定要删除选中的资料吗？
                </div>
                <div class="modal-footer my_conf">
                    <button type="button" class="btn btn-primary btn_confirm btn_size" data-dismiss="modal">确定</button>
                    <button type="button" class="btn btn-default btn_size" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
    <!--*****************************************************************-->
    <script src="js/file.js"></script>
</body>
</html>
