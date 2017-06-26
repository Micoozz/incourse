<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/Correcting_operation.css">
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
    <script type="text/javascript" src="js/selectivizr.js" ></script>
    <![endif]-->
</head>
<body>
<div class="navbar">
@include('teacher.header.head_Tea')
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
                    <li><a href="create-class">+创建班级</a></li>
                    <li><a href="#">一年一班语文</a></li>
                    <li><a href="#">二年一班音乐</a></li>
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
@include('teacher.header.left_nav')
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div id="homework" class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 old-p"><a href="Job_analysis">作业分析</a></div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center_title" style="font-size: 18px">一年一班作业（语文）

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                <div id="document"><a href="javascript:history.go(-1)"><img
                                        src="images/return2.png" alt="">返回</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="container">
                        <div class="row new-head" id="exl">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">姓名</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">时间</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">评分</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">状态</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">操作</div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                        <div class="row new-head">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">1.张玲</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">9月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">90分</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 red">未评价</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 blue"><a href="Correcting_main_contents">批改</a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                        <div class="row new-head">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">2.张玲</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">9月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">90分</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray ">已评价</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 blue"><a href="Correcting_Primarycoverage">查看</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                        <div class="row new-head">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">3.张玲</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">9月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">90分</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray">已评价</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 blue"><a href="Correcting_Primarycoverage">查看</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                        <div class="row new-head">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">4.张玲</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">9月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">90分</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray">已评价</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 blue"><a href="Correcting_Primarycoverage">查看</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                        <div class="row new-head">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">5.张玲</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">9月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">90分</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray">已评价</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 blue"><a href="Correcting_Primarycoverage">查看</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        </div>
                    </div>
                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left"> 
@include('teacher.header.right_nav')
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
<div id="footf"></div>
<div id="footer"></div>


    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</body>
</html>