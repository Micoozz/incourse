<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js" ></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
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
        <div>
            <div class="indexLogo">
                <img src="images/LOGO.png"/>
                <img src="images/Hpb_schoolLogo.png" class="schoolLogo"/>
                <b>湖南工程学院</b>
            </div>
            <ul class="nav head_nav">
                <li class="schoolMain">
                    <a href="../自媒体中心/media.html">学校首页</a>
                    <div>
                        <a href="../自媒体中心/relateToMe.html">@与我相关</a>
                    </div>
                </li>
                <li><a href="Arrangement_work(homepage).html" class="blue">学习中心</a></li>
                <li><a href="classSpace111.html">班级中心</a></li>
                <!--<li><a href="javascript:;">交易中心</a></li>-->
                <li class="affix">
                    <a href="javascript:;"><img src="images/01.png" /></a>
                </li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
                    <div class="cent">
                        <a href="class.html">分析中心</a>
                        <a href="老师成绩单1.html">学习生活记录</a>
                        <a href="teacherPersonData.html">个人信息</a>
                    </div>
                </li>
                <li><a href="../登录页/index.html" class="blue">退出</a></li>
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
                    <li><a href="create-class.html">+创建班级</a></li>
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
                <div class="col-xs-12" id="left">
                    <ul class="nav1 nav" id="nav1">
                        <li><a href="Arrangement_work(homepage).html" class="box">作业管理</a></li>
                        <li><a href="Exercise_editor.html">习题库</a></li>
                        <li><a href="data.html">资料库</a></li>
                        <li><a href="duty_arrange.html">班级管理</a></li>
                        <li><a href="classindex.html">成绩管理</a></li>
                        <li><a href="class-outline.html">课程大纲</a></li>
                        <li><a href="A_classroom_courseware_111.html">课堂课件</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div id="homework" class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 old-p"><a href="#" data-toggle="modal"
                                                                                      data-target="#myModal"></a></div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center_title" style="font-size: 18px">一年一班作业（语文）

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                <div id="document"><a href="javascript:history.go(-1)"><img src="images/return2.png" alt="">返回</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="container">
                        <div class="row new-head" id="exl">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bold">客观题得分：<span>80分</span></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bold">主观题得分：<span>20分</span></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bold">综合得分：<span>100分</span></div>
                        </div>
                        <div class="row count">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bold" style="text-align: right">客观题分数已计算完毕</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bold" style="text-align: center">共计 <span>80</span> 分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><a href="Correcting_Primarycoverage.html" class="blue">查看</a></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">选择题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: center">得分：<span>10</span>分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">填空题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: center">得分：<span>10</span>分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">排序题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: center">得分：<span>10</span>分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">单选题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: center">得分：<span>20</span>分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">多选题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align: center">得分：<span>20</span>分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="go_success">上传成功！</div>
                        <div class="go_bc">保存成功！</div>
                        <div class="row count3">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bold" style="text-align: right">主观题分数未统计完毕</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bold" style="text-align: center">共计 <span>？</span> 分</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><a href="Correcting_Primarycoverage.html" class="blue">批改</a></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">问答题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 red" style="text-align: center" >未批改</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="row count2">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">画图题（共20分）</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 red" style="text-align: center">未批改</div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                        </div>
                        <div class="hd-py"><textarea name="" id="" cols="70" rows="10" placeholder="请在此添加评语···"></textarea></div>
                        <div class="row up-work">

                            <div class="col-lg-12  button">
                            <button class="btn hBtn btn_r_1 Mc-sc">成绩上传</button>
                            <button class="btn hBtn btn_s Mc-py">添加评语</button>
                            <button class='btn btn_s Mc-qx'>取消</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left">
                    <div class="col-md-12 col-xs-12">
                        <a href="schoolNotice.html" style="color: #FFFFFF ">通知</a><span class="openNotice">3</span>
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
<script>
    $(function () {
        $(".Mc-sc").click(
                function () {
                    $(".go_success").show();
                    setTimeout(function () {
                        $(".go_success").hide()
                    }, 1000);
                }
        );
        $(".Mc-py").click(
                function () {
                    if($(this).html()=="添加评语") {
                        $(this).html("保存");
                        $(".hd-py").slideDown();
                        $(".Mc-qx").css("display", "inline-block");
                    }else if($(this).html()=="修改评语"){
                        $(".hd-py>textarea").css({
                            "border":"1px solid rgb(169, 169, 169)","height":"auto"
                        }).removeAttr("disabled");
                        $(".Mc-qx").css("display","inline-block").html("保存")
                    }else{
                        $(".go_bc").show();
                        setTimeout(function () {
                            $(".go_bc").hide()
                        }, 1000);
                        $(".hd-py>textarea").css({
                            "border":"none","height":"100px"
                        }).attr("disabled","disabled");
                        $(".Mc-qx").css("display","none");
                        $(this).html("修改评语")
                    }
                }
        );
        $(".Mc-qx").click(
               function () {
                   if ($(this).html() == "保存") {
                       $(".go_bc").show();
                       setTimeout(function () {
                           $(".go_bc").hide()
                       }, 1000);
                       $(".hd-py>textarea").css({
                           "border":"none","height":"100px"
                       }).attr("disabled","disabled");
                       $(".Mc-qx").css("display","none");
                   } else {
                       $(".Mc-py").html("添加评语");
                       $(".hd-py").slideUp();
                       $(this).css("display", "none")
                   }
               })
    })
</script>
</body>
</html>