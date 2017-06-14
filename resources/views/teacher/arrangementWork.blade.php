<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!--<meta name="description"
          content="Intro.js - Better introductions for websites and features with a step-by-step guide for your projects.">-->
    <meta name="author" content="Afshin Mehrabani (@afshinmeh) in usabli.ca group">
    <title>In Course</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <!--引导-->
    <link rel="stylesheet" href="css/introjs.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-responsive.min.css">-->
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/Correcting_operation.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/selectivizr.js"></script>
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
                    <li><a href="create-class" data-step="4" data-intro="如果您有新的班级课程，可在这里点击添加">+创建班级</a></li>
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
                        <li><a href="arrangementWork" class="box">作业管理</a></li>
                        <li><a href="exerciseEditor">习题库</a></li>
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
                    <div id="homework" class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 old-p"><a href="#" data-toggle="modal"
                                                                                  data-target="#myModal"
                                                                                  class="modaladd" data-step="1"
                                                                                  data-intro="点击此处添加学生作业">+&nbsp;添加作业</a>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center_title" style="font-size: 18px">一年一班作业（语文）

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                            <div id="document"><a href="homeworkCorrecting" data-step="2"
                                                  data-intro="点击此处批改学生已完成的作业"><img src="images/create.png"
                                                                                   alt="">作业批改</a></div>
                        </div>
                    </div>
                    <div class="container-fluid" id="container">
                        <div class="go_success">发布成功！</div>
                        <div class="go_filed">撤销成功！</div>
                        <div class="row new-creat" id="exl">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">作业章节</div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">类型</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">发布时间</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">截止时间</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">状态</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">操作</div>
                        </div>
                        <div class="row new-creat">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><a
                                    href="groupWorkViewjob">1.第一章第一节</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">小组</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月3日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 red Noc">未发布</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#" class="blue Nocfix">发布</a>
                            </div>
                        </div>
<!--                         <div class="row new-creat">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><a
                                    href="groupWorkViewjob">2.第一章第二节</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">小组</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月3日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray Noc">已发布</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#" class="blue Nocfix">撤销</a>
                            </div>
                        </div>
                        <div class="row new-creat">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><a
                                    href="singleWorkViewjob">3.第一章第三节</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">个人</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月3日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray">已发布</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#" id="delete" class="blue Aw-del"
                                                                                data-toggle="modal"
                                                                                data-target="#myModal2">删除</a></div>
                        </div>
                        <div class="row new-creat">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><a
                                    href="groupWorkViewjob">4.第一章第四节</a></div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">小组</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月1日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">10月3日</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray">已发布</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#" class="blue Aw-del">删除</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!--右侧栏-->
                <div class="col-sm-12 col-xs-12 left">
                    <div class="col-md-12 col-xs-12">
                        <a href="schoolNotice.html" style="color: #FFFFFF ">通知</a><span class="openNotice">3</span>
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
<div id="footf"></div>
<div id="footer">
</div>
<script>
    $(document).ready(
            function () {
                $("#pop2_hover").mouseover(
                        function () {
                            $(this).css(
                                    {
                                        "background": "url('images/team.png') 47% 30% no-repeat",
                                        "border": "3px solid #168BEE"
                                    }
                            );
                            $("#pop_hover").css(
                                    {
                                        "background": "url('images/single (1).png') 47% 30% no-repeat",
                                        "border": "3px solid transparent",
                                        "color": "black"
                                    }
                            )
                        }
                );
                $("#pop2_hover").mouseout(
                        function () {
                            $(this).css(
                                    {
                                        "background": "url('images/team2.png') 47% 30% no-repeat",
                                        "border": "3px solid transparent"
                                    }
                            );
                            $("#pop_hover").css(
                                    {
                                        "background": "url('images/single (2).png') 47% 30% no-repeat",
                                        "border": "3px solid #168BEE",
                                        "color": "#168BEE"
                                    }
                            )
                        }
                );
                $(".Nocfix").click(
                        function () {
                            if ($(this).html() == "发布") {
                                $(".go_success").show();
                                setTimeout(function () {
                                    $(".go_success").hide()
                                }, 1000);
                                $(this).html("撤销").parent().prev().html("已发布").removeClass("red").addClass("gray");
                            } else {
                                $(".go_filed").show();
                                setTimeout(function () {
                                    $(".go_filed").hide()
                                }, 1000);
                                $(this).html("发布").parent().prev().html("未发布").removeClass("gray").addClass("red");
                            }
                        }
                );


            }
    );

    /*IE8遮罩层动态调试*/
    $(function () {
        if ($(".introjs-tooltipReferenceLayer").css("top") == "508px") {
            $(".introjs-tooltipReferenceLayer").css({"top": "184", "left": "632px"});
        }
        ;
    })
</script>

<style>
    .introjs-tooltipReferenceLayer[style="top:508px"] {
        left: 0px !important;
    }
</style>


<!--引导-->
<!--<script type="text/javascript" src="js/intro.js"></script>-->
<!--<script type="text/javascript">introJs().start();</script>-->

<!--摸态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
                添加作业
            </div>
            <div class="modal-body">
                <a href="independentOperationAddJobSection" class="pop" id="pop_hover"
                   style="margin-right: 30px">

                    <span>独立完成</span>
                </a>
                <a href="groupWorkMarshalling" class="pop" id="pop2_hover" style="margin-left: 30px">

                    <span>小组作业</span>
                </a>

            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
                删除作业提醒
            </div>
            <div class="modal-body">
                <div style="font-weight: bold">确定要删除本次作业吗？</div>
                <div class="yon">
                    <a href="" class="fy" data-dismiss="modal">是</a>
                    <a href="" data-dismiss="modal">否</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script>
	
	$(function(){
		$.ajax({
			type:"get",
			url:"/showJobList/1",
			dataType:'json',
			success:function(data){
				console.log(data)
			}
		});
	})
</script>
</body>
</html>

