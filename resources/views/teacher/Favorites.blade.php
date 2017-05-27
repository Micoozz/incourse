<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>In Course</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js" ></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/down_select.css">
    <link rel="stylesheet" href="css/Favorites.css">
    <link rel="stylesheet" href="css/matching.css"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/Correcting_operation.css">
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
    <script type="text/javascript" src="js/exerciseLibrary.js"></script>
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
                        <li><a href="Arrangement_work(homepage).html">作业管理</a></li>
                        <li><a href="Exercise_editor.html" class="box">习题库</a></li>
                        <li><a href="data.html">资料库</a></li>
                        <li><a href="duty_arrange.html">班级管理</a></li>
                        <li><a href="classindex.html">成绩管理</a></li>
                        <li><a href="class-outline.html">课程大纲</a></li>
                        <li><a href="A_classroom_courseware_111.html">课堂课件</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div id="homework" class="row">
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 old-p"></div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 center_title">一年一班习题库（语文）

                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 ">
                            <div id="document"><a href="javascript:history.go(-1)"><img src="images/return2.png" alt="">返回</a></div>
                        </div>
                    </div>
                    <div class="content0">
                    <div id="search_hide" style="display: none">
                        <div class="row search_hide_row" id='content00'>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 first">地区：</div>
                            <select class="col-md-2 col-sm-10 col-xs-10" id="teacher_a">
                                <option>江西省</option>
                                <option>浙江省</option>
                                <option>广东省</option>
                            </select>
                            <select class="col-md-2 col-sm-10 col-xs-10" id="teacher_a">
                                <option>南昌市</option>
                                <option>杭州市</option>
                                <option>深圳市</option>
                            </select>
                            <select class="col-md-2 col-sm-10 col-xs-10" id="teacher_a">
                                <option>青山湖区</option>
                                <option>余杭区</option>
                                <option>宝安区</option>
                            </select>
                            <select class="col-md-3 col-sm-10 col-xs-10" id="teacher_a">
                                <option>一中</option>
                                <option>二中</option>
                                <option>三中</option>
                            </select>
                        </div>
                        <div class="row search_hide_row" id='hide_row'>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 first">搜索：</div>
                            <form action="">
                                <input type="text" name="" class="form-control " placeholder="请输入学校名称" />
                                <span><img src="images/search.png" /></span>
                            </form>
                        </div>
                        <div class="row search_hide_row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 first">条件：</div>
                            <select class="col-md-2 col-sm-10 col-xs-10" id="but_a">
                                <option>选择题</option>
                                <option>多选题</option>
                                <option>填空题</option>
                                <option>多空题</option>
                                <option>判断题</option>
                                <option>连线题</option>
                                <option>排序题</option>
                                <option>解答题</option>

                            </select>
                            <select class="col-md-2 col-sm-10 col-xs-10" id="section_a">
                                <option>章节内容</option>
                                <option>第一章第二节</option>
                                <option>第一章第三节</option>
                                <option>第一章第四节</option>
                                <option>更多章节</option>
                            </select>
                            <select class="col-md-2 col-sm-10 col-xs-10" id="teacher_a">
                                <option>教师</option>
                                <option>董老师</option>
                                <option>张老师</option>
                                <option>王老师</option>
                                <option>刘老师</option>
                                <option>其他</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="search_a">
                                <span>查找</span>
                            </div>
                        </div>
                    </div>
                        </div>
                    <div class="row" id="search">

                        <div class="col-lg-6  col-sm-6 col-xs-8">

                            <button type="button" class="btn btn-primary btn-lg ">
                                <img src="images/11.png" alt="" style="display: inline-block;margin-right: 5px;">条件筛选
                            </button>
                        </div>
                        <div class="col-lg-3 col-sm-2 "></div>
                        <div class="col-lg-3  col-sm-4 ">
                            <form class="bs-example bs-example-form" role="form">
                                <div class="input-group row" id="search2">
                                    <input type="text" class="form-control " placeholder="搜索">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                     <img src="images/search.png" alt="">
                                   </button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mar_tb">
                        <div class="homework-content">
                            <p class="question-head">
                                <input type="checkbox">
                        <span class="order">
                            1.
                        </span>
                                <!--问题-->
                                选择题：秦始皇吞并六国采用了以下哪种算法思想？
                            </p>

                            <form action="" class="select">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="questionSelect" class="questionSelect"  disabled="disabled"
                                               value="A"/><span class="select-wrapper"></span>A.
                                        <span class="question-content">递归</span>
                                    </label>
                                </div>
                                <!--问题字符大小均为14px-->
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="questionSelect" class="questionSelect"  disabled="disabled"
                                               value="B"/><span class="select-wrapper" style="background-color: #168bee"></span>B.
                                        <span class="question-content">分治</span>
                                    </label>

                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="questionSelect" class="questionSelect" disabled="disabled"
                                               value="C"/><span class="select-wrapper"></span>C.
                                        <span class="question-content">迭代</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="questionSelect" name="questionSelect" disabled="disabled"
                                               value="D"/><span class="select-wrapper"></span>D.
                                        <span class="question-content">模拟</span>
                                    </label>
                                </div>
                            </form>
                            <div class="line"></div>
                            <div class="question-foot">
                                <span class="blue">正确答案：</span><span class="answerOrder">B</span><span
                                    class="col-line"></span>
                                <div style="float: right">收藏<span class="collection_num">999</span><a href="#"
                                                                                                      class="gray mar">下载</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mar_tb">
                        <div class="homework-content">
                            <p class="question-head">
                                <input type="checkbox">
                        <span class="order">
                            2.
                        </span>
                                <!--问题-->
                                多选题：下列出自姜夔的《暗香》的有：
                            </p>

                            <form action="" class="select">
                                <div class="radio">
                                    <label>
                                        <input type="checkbox" name="questionSelect" class="questionSelect" disabled="disabled" style="display: none"
                                               value="A"/><span class="select-wrapper"></span>A.
                                        <span class="question-content">人而全真,全不复有初矣</span>
                                    </label>
                                </div>
                                <!--问题字符大小均为14px-->
                                <div class="radio">
                                    <label>
                                        <input type="checkbox" name="questionSelect" class="questionSelect" disabled="disabled" style="display: none"
                                               value="B"/><span class="select-wrapper" style="background-color: #168bee"></span>B.
                                        <span class="question-content">唤起玉人,不管清寒雨攀摘</span>
                                    </label>

                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="checkbox" name="questionSelect" class="questionSelect" disabled="disabled" style="display: none"
                                               value="C"/><span class="select-wrapper"></span>C.
                                        <span class="question-content">镜里朱颜都变尽,只有丹心难灭</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="checkbox" class="questionSelect" name="questionSelect" disabled="disabled" style="display: none"
                                               value="D"/><span class="select-wrapper" style="background-color: #168bee"></span>D.
                                        <span class="question-content">叹寄与路遥,夜雪初积</span>
                                    </label>
                                </div>
                            </form>
                            <div class="line"></div>
                            <div class="question-foot">
                                <span class="blue">正确答案：</span><span class="answerOrder">B,D</span><span
                                    class="col-line"></span>
                                <div style="float: right">收藏<span class="collection_num">999</span><a href="#"
                                                                                                      class="gray mar">下载</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mar_tb">
                        <div class="homework-content">
                            <p class="question-head" style="display: inline-block">
                                <input type="checkbox">
                        <span class="order">
                            3.
                        </span>
                                <!--问题-->
                                填空题：《朝花夕拾》原名《<div class="gap_gap">空1</div>》,是鲁迅的回忆性散文集,请简介一下其中的一篇（课内学过的除外）的主要内容 ：<div class="gap_gap">空2</div>
                            </p>
                            <div class="line"></div>
                            <div class="question-foot">
                                <span class="blue">正确答案：</span><span class="answerOrder">1、《旧事重提》2、示例：《二十四孝图》主要内容：童年时代的我和我的伙伴实在没有什么好画册可看.我拥有的最早一本画图本子只是《二十四孝图》.
                                        其中最使我不解,甚至于发生反感的,是"老莱娱亲"和"郭巨埋儿"两 件事.</span>
                                <div class="lot_word">收藏
                                    <span class="collection_num">999</span><a href="#" class="gray mar">下载</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="work_bottom">

                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">共勾选<span class="chk">0</span>题</div>

                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 submit">
                            <a href="#" data-toggle="modal" data-target="#myModal2">批量删除</a>
                            <a href="#" data-toggle="modal" data-target="#myModal3">转发</a>
                            <a href="#" id="birth" class="dropdown-toggle"
                               data-toggle="dropdown">生成作业</a>
                            <ul class="dropdown-menu new_old" role="menu" aria-labelledby="#birth">
                                <li><a href="Independent_operation_Add_job_section.html">新作业</a></li>
                                <li><a href="javascript:;" data-toggle="modal" data-target="#myModal">旧作业</a>
                            </ul>
                        </div>

                    </div>
                    <div class="row" >
                        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 ">
                            <ul class="pagination fy">
                                <li><a href="#">上一页 </a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><span class="out">···</span></li>
                                <li><a href="#">下一页 </a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 turn_to">
                            <div>
                                <span class="choose">向第<input type="text" style="width: 15%;text-align: center">页</span>
                                <ul class="pagination">
                                    <li><a href="#">跳转</a></li>
                                </ul>
                                <!--<button class="btn">跳转</button>-->
                            </div>

                            <!--<ul class="pagination">-->
                            <!--<li><a href="#">跳转</a></li>-->
                            <!--</ul>-->
                        </div>
                        <!--<div class="jump">-->
                        <!--<div>-->
                        <!--向第<input type="text">页-->
                        <!--</div>-->
                        <!--<ul class="pagination">-->
                        <!--<li><a href="#">跳转</a></li>-->
                        <!--</ul>-->
                        <!--</div>-->
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
<div id="footf"></div>
<div id="footer"></div>
<script>
    $(document).ready(function () {
        $(".bc").click(function () {
                    $(".fix").toggle()
                }
        );
        $(".fix>a").mouseover(function () {
            $(this).addClass('on').siblings().removeClass('on');
        });
        $(".up_work").click(
                function () {
                    $(".content0").hide();
                    $("#content").show()
                }
        );
        $(".btn-primary").click(
                function () {
                    $("#search_hide").slideToggle("slow");
                }
        );
        $(".search_hide_row>div>span").click(
                function () {
                    if($(this).attr('class')=='hide_add'){
                        $(this).attr('class','')
                    }
                    else {
                        $(this).attr('class','hide_add');
                    }
                }
        );
        $('.fx>span').click(function () {
            if ($(this).attr('class') == 'balk') {
                $(this).attr('class', '')
            }
            else {
                $(this).attr('class', 'balk');
            }
        });
        $("input[type=checkbox]").click(function() {
            $(".chk").html($("input[type=checkbox]:checked").length);
        });
    })
</script>
<script>
    function Cmd(obj) {
        $("#xxx").children("div").each(
                function () {
                    $(this).hide();
                }
        );
        $("#div" + obj.value).show();

    }
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
                选择作业
            </div>
            <div class="modal-body" style="text-align: left">
                <div class="row">
                    <div class="col-lg-8"><a href="Arrangement_work(homepage).html">1.第一章第一节</a></div>
                    <div class="col-lg-4 mod_date">（10月1日）</div>
                </div>
                <div class="row">
                    <div class="col-lg-8"><a href="Arrangement_work(homepage).html">2.第一章第二节</a></div>
                    <div class="col-lg-4 mod_date">（10月1日）</div>
                </div>
                <div class="row">
                    <div class="col-lg-8"><a href="Arrangement_work(homepage).html">3.第一章第三节</a></div>
                    <div class="col-lg-4 mod_date">（10月1日）</div>
                </div>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dial-->
    </div>
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
                <div style="font-weight: bold">确定要删除所选中的题目吗？</div>
                <div class="yon">
                    <a href="">是</a>
                    <a href="">否</a>
                </div>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
                作业转发
            </div>
            <div class="modal-body" style="text-align: left;padding-left: 30px">
                <form action="" method="" id="form">
                    <label>
                        <span>参加年级：</span>
                        <div class="fx">
                            <span>一年(1)班</span>
                            <span>一年(2)班</span>
                            <span>一年(3)班</span>
                            <span>一年(4)班</span>
                            <span>一年(5)班</span>
                            <span>一年(6)班</span>
                            <span>一年(7)班</span>
                            <span>一年(8)班</span>
                            <span>一年(9)班</span>
                            <span>一年(10)班</span>
                            <span>一年(11)班</span>
                            <span>一年(12)班</span>
                        </div>
                    </label>
                    <div style="margin-top: 10px;text-align: right;" data-dismiss="modal">
                        <a href="#" style="color: #168BEE">分享</a>
                    </div>
                </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>