<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/Exercise_editor2.css">
    <link rel="stylesheet" href="css/Correcting_operation.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/matching.css"/>
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
    <link rel="stylesheet" type="text/css" href="css/homework-style.css"/>
    <!--引导-->
    <link rel="stylesheet" href="css/introjs.css">
    <link rel="stylesheet" href="css/down_select.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-responsive.min.css">-->
    <!--解决IE8不支持placeholder-->
    <script src="js/jquery.placeholder.min.js"></script>
    <script>
        $(function () {
            $('input, textarea').placeholder();
        });
    </script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/exerciseLibrary.js"></script>
</head>
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
                    <li>
                        <a href="create-class.html">+创建班级</a>
                    </li>
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
                        <li><a href="arrangementWork">作业管理</a></li>
                        <li><a href="exerciseEditor" class="box">习题库</a></li>
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
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 old-p"></div>

                        <div class="col-lg-4 col-md-5 col-sm-5 col-xs-5 center_title Ee_frbs">一年一班习题库

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                            <div id="document">
                                <a href="favorites" data-step="3" data-intro="自己收藏的习题都会在这里保存"><img
                                        src="images/document.png" alt="">收藏夹</a>
                            </div>
                        </div>
                    </div>
                    <div class="content0">
                        <div id="search_hide" style="display: none;">
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
                                    <input type="text" name="" class="form-control " placeholder="请输入学校名称"/>
                                    <span><img src="images/search.png"/></span>
                                </form>
                            </div>
                            <div class="row search_hide_row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 first">条件：</div>
                                <select class="col-md-2 col-sm-10 col-xs-10" id="but_a">
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
                                <select class="col-md-2 col-sm-10 col-xs-10" id="teacher_a">
                                    <option>教材</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="search_a">
                                    <span>查找</span>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="search">
                            <div class="col-lg-6  col-sm-8 col-xs-8">
                                <button class="btn btn-primary btn-lg " id="a" data-step="1" data-intro="筛选出自己想要的习题">
                                    <img src="images/11.png" alt=""
                                         style="display: inline-block;margin-right: 5px;">条件筛选
                                </button>
                                <button class="btn btn-success btn-lg up_work" data-step="2"
                                        data-intro="可以上传习题到学校的习题库与其他老师分享">
                                    <img src="images/22.png" alt=""
                                         style="display: inline-block;margin-right: 5px;">上传习题
                                </button>
                            </div>
                            <div class="col-lg-3  "></div>
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
                        <div class="row work">
                            <!--<div class="row mar_tb">
                                <div class="homework-content">
                                    <p class="question-head">
											<span class="order">
                            4.
                        </span>
                                      
                                        排序题：请给下列句子排序：
                                    </p>

                                    <div class="older_ti">①当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花。<br/>
                                        ②不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。<br/>③从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养料。<br/>
                                        ④虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。<br/>⑤种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子。
                                    </div>
                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <span class="blue">正确答案：</span><span class="answerOrder">正确的顺序为⑤③④②①</span><span
                                            class="col-line"></span>

                                        <div style="float: right">
                                            <a href="javascript:;">收藏</a><span class="collection_num">998</span>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!--<div class="row mar_tb">
                                <div class="homework-content">
                                    <p class="question-head" style="display: inline-block">
                                        <span class="order">
                        4.
                    </span>

                                        多空题：I made my coat <div class="gap_gap">空1</div> my own hands.It was made<div class="gap_gap">空2</div>hand not with a machine.
                                    </p>

                                    <form action="" class="select">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="questionSelect" class="questionSelect" disabled="disabled"
                                                       value="A"/><span class="select-wrapper"></span>A.
                                                <span class="question-content">in;in</span>
                                            </label>
                                        </div>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="questionSelect" class="questionSelect" checked
                                                       value="B"/><span class="select-wrapper"></span>B.
                                                <span class="question-content">in;with</span>
                                            </label>

                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="questionSelect" class="questionSelect" disabled="disabled"
                                                       value="C"/><span class="select-wrapper"></span>C.
                                                <span class="question-content">with;by</span>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="questionSelect" name="questionSelect" disabled="disabled"
                                                       value="D"/><span class="select-wrapper"></span>D.
                                                <span class="question-content">with;with</span>
                                            </label>
                                        </div>
                                    </form>
                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <span class="blue">正确答案：</span><span class="answerOrder">B</span><span class="col-line"></span>
                                        <div style="float: right">
                                            <a href="javascript:;">收藏</a><span class="collection_num">998</span>
                                        </div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                        </div>

                        <div class="row">
                            <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 ">
                                <ul class="pagination fy">
                                    <li>
                                        <a href="#">上一页 </a>
                                    </li>
                                    <li>
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <a href="#">2</a>
                                    </li>
                                    <li>
                                        <a href="#">3</a>
                                    </li>
                                    <li>
                                        <a href="#">4</a>
                                    </li>
                                    <li>
                                        <a href="#">5</a>
                                    </li>
                                    <li><span class="out">···</span></li>
                                    <li>
                                        <a href="#">下一页 </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 turn_to">
                                <div>
										<span class="choose">向第<input type="text"
                                                                      style="width: 15%;text-align: center">页</span>
                                    <ul class="pagination">
                                        <li>
                                            <a href="#">跳转</a>
                                        </li>
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
                    <div id="content">
                        <form action="">
                            <div id="z_1">
                                <div class="z_t_c row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 select">
                                        <span>选择标题</span>
                                        <select name="queryType" id="66" onchange="Cmd(this)" class="types">
         
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <span id="chapter">题目分值</span>
                                        <input type="text" value=" " id='grade'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 z_introduce">
                                        <span>所属章节</span>
                                        <input type="text" value=" ">
                                    </div>
                                    <div class="col-lg-12" id="subject">
                                        <span>科目</span>
                                        <select name="">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="add">
                                <div id="add_add">
                                    <label for="addword"><img src="images/email.png">&nbsp;添加附件</label>
                                    <input type="file" id="addword" style="display: none">
                                    <label for="addpic"><img src="images/picture.png">&nbsp;添加图片</label>
                                    <input type="file" id="addpic" style="display: none">
                                    <label for="addmov"><img src="images/video.png"> &nbsp;添加影音</label>
                                    <input type="file" id="addmov" style="display: none">
                                </div>
                            </div>
                            <div class="go_success" style="top: 45%">提交成功！</div>
                            <div class="go_tj" style="top: 45%">添加成功！</div>
                            <div id="xxx" class="xxxx">
                                <!--简答题板块-->
                                <div class="end" id="div1">
                                    <div class="text"><span class="textarea">问题：</span><textarea name="" class="Short-answer"></textarea>
                                    </div>
                                 

                                </div>
                                <!--单选题板块-->
                                <div class="end" id="div2" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <!--<span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>-->
                                        <input type="text" placeholder="请在下列选项中选出正确的一项。" class="no_addquestion single-selection">
                                    </div>
                                    <div class="select1" id="select1">

                                    </div>
                                    <div id="answer" style="line-height:42px;" class="answer4">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;添加选项
                                        </a>

                                        <select name="queryType" id="ty">

                                        </select>
                                        <span>正确答案：</span>
                                    </div>
                                </div>
                                <!--多空题板块-->
                                <div class="end" id="div3" style="display:none;">
                                    <div contenteditable="true" class="select_single long-short" id="gapp"
                                         style="line-height:28px;padding: 7px 51px; overflow: auto"></div>
                                    <div class="fixed_question">问题：</div>
                                    <div class="answer3 answer7">
                                        <input type="text" value=""
                                               style="margin-top: -10px;width: 30%;position: absolute;border:none"
                                               placeholder="请填写空格提示答案" id="gapp" disabled="disabled">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
                                        </a>
                                    </div>
                                    <div class="ad">

                                    </div>
                                </div>

                                <!--多选题板块-->
                                <div class="end" id="div4" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <!--<span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>-->
                                        <input type="text" value="请在下列选项中选出正确的一项。" class="no_addquestion multiple">
                                    </div>
                                    <div id="select2" class="select2">

                                    </div>
                                    <div class="answer5" style="line-height:42px;margin-top: 30px;width:100%;">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;添加选项
                                        </a>
                                        <span class="but_a"></span>

                                        <div class="nei"></div>
                                        <span class="but_b">正确答案：</span>

                                    </div>
                                </div>

                                <!--画图题板块-->
                                <div class="end" id="div5" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text" value="请绘出您心中的大海。" class="no_addquestion draw">
                                        <!--<input type="file" name="" id="" value="" style="color: #fff;"/>-->
                                        <!--<div class="img"><img src=""/></div>-->
                                    </div>
                                </div>

                                <!--连线题板块-->
									<div class="end" id="div6" style="display:none;">
										<div class="select_single">
											<span class="question">问题：</span>
											<input type="text" value="请在下列选项中选出正确的一项" class="no_addquestion ligature">
										</div>
										<div class="A">
											子项A组：
											<div class="matching">
												<span class="question">1：</span>
												<input type="text" value="杨万里" name="issue">
											</div>
										</div>
										<div class="B">
											子项B组：
											<div class="matching">
												<span class="question">1：</span>
												<input type="text" value="唐朝" name="result"/>
											</div>
										</div>
										<div class="clear"></div>
										<div id="answer" class="answer">
											<a href="javascript:;">
												<img src="images/add_07.jpg" alt="">&nbsp;&nbsp;添加选项
											</a>
										</div>
									</div>
                                <!--排序题板块-->
                                <div class="end" id="div7" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text" value="请将下列诗人按照朝代排序" class="no_addquestion sort">
                                    </div>
                                    <div class="C">
                                        答案:
                                        <div class="matching">
                                            <span class="question">1：</span>
                                            <input type="text" value="杨万里">
                                        </div>
                                    </div>
                                   <div class="clear"></div>
                                    <div id="answer" class="answer1">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;插入子项
                                        </a>
                                    </div>
                                </div>
                                <!--判断题板块-->
                                <div class="end" id="div8" style="display:none;">
                                    <div class="E estimate">
                                        问题:     <div class="matching"><span class="question">题目<span>1</span>:</span><input type="text" value=""></div>
                                    </div>
                                    <div class="F estimates">
                                        答案：<div class="matching"><img src="images/s09.jpg"/><img src="images/s05.jpg"/></div>
                                    </div>
                                    <div class="clear"></div>
                                    <div id="answer" class="answer2">
                                        <!--<a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;继续添加题目
                                        </a>-->
                                    </div>
                                </div>
                                <!--填空题板块-->
                                <div class="end" id="div9" style="display:none;">
                                    <div contenteditable="true" class="select_single pack" id="gap"
                                         style="text-indent:50px;">
                                        <input type="text" value="" id="first">
                                    </div>
                                    <div class="fixed_question">问题：</div>
                                    <div class="answer3 answer10">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
                                        </a>
                                    </div>
                                    <span>正确答案：</span>

                                    <div class="G" id="G">
                                    </div>
                                </div>
                                <!--综合题-->
                                <div class="end" id="div10" style="display:none;">
                                    <div class="text"><span class="textarea">问题：</span><textarea name="" id="scrap"></textarea>
                                    </div>
                                    <div></div>
                                    <div class="text"><span class="textarea">+添加题目</span>
                                    </div>
                                </div>
                            </div>
                            <div class="button button_frb">
                                <button class="btn btn_r">返回</button>
                                <button class="btn btn_c bc" type="button">添加至</button>
                                <button class="btn btn_c" onclick="return false">上传</button>
                                <div class="fix">
                                    <div class="on" data-toggle="modal" data-target="#myModal3">作业</div>
                                    <div data-toggle="modal" data-target="#myModal4">试卷</div>
                                    <div class="tadd">收藏夹</div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div id="content" style="display:none;">
                        <form action="">
                            <div id="z_1">
                                <div class="z_t_c row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 select">
                                        <span>选择标题</span>
                                        <select name="queryType" id="66">
                                            <option value="1" name="queryType"></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <span id="chapter">题目分值</span>
                                        <input type="text" value=" ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 z_introduce">
                                        <span>所属章节</span>
                                        <input type="text" value=" ">
                                    </div>
                                </div>
                            </div>
                            <div id="add">
                                <div id="add_add">
                                    <label for="addword"><img src="images/email.png">&nbsp;添加附件</label>
                                    <input type="file" id="addword" style="display: none">
                                    <label for="addpic"><img src="images/picture.png">&nbsp;添加图片</label>
                                    <input type="file" id="addpic" style="display: none">
                                    <label for="addmov"><img src="images/video.png"> &nbsp;添加影音</label>
                                    <input type="file" id="addmov" style="display: none">
                                </div>
                            </div>
                            <div class="go_success" style="top: 45%">提交成功！</div>
                            <div class="go_tj" style="top: 45%">添加成功！</div>
                            <div id="xxx">
                            </div>
                            <div class="button" style="width: 36%;margin: 0 auto;">
                                <button class="btn btn_r">返回</button>
                                <button class="btn btn_c" onclick="return false">保存</button>
                            </div>
                        </form>
                    </div>
                    <div id="content" style="display:none;">
                        <form action="">
                            <div id="z_1">
                                <div class="z_t_c row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 select">
                                        <span>选择标题</span>
                                        <select name="queryType" id="66" onchange="Cmdd(this)" class="type">
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <span id="chapter">题目分值</span>
                                        <input type="text" value=" " class="fraction">
                                    </div>
                                </div>
                            </div>
                            <div id="add">
                                <div id="add_add">
                                    <label for="addword"><img src="images/email.png">&nbsp;添加附件</label>
                                    <input type="file" id="addword" style="display: none">
                                    <label for="addpic"><img src="images/picture.png">&nbsp;添加图片</label>
                                    <input type="file" id="addpic" style="display: none">
                                    <label for="addmov"><img src="images/video.png"> &nbsp;添加影音</label>
                                    <input type="file" id="addmov" style="display: none">
                                </div>
                            </div>                
                            <div class="go_success" style="top: 45%">提交成功！</div>
                            <div class="go_tj" style="top: 45%">添加成功！</div>
                            <div id="xxx" class="xxxxx">
                                <!--简答题板块-->
                                <div class="end div1" id="div1">
                                    <div class="text"><span class="textarea">问题：</span><textarea name=""></textarea>
                                    </div>
                                    <div class="text"><span class="textarea">回答：</span><textarea name=""></textarea>
                                    </div>

                                </div>
                                <!--单选题板块-->
                                <div class="end div2" id="div2" style="display:none;">

                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <!--<span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>-->
                                        <input type="text" value="请在下列选项中选出正确的一项。" class="no_addquestion">
                                    </div>
                                    <div class="select1a" id="select1">

                                    </div>
                                    <div id="answer" style="line-height:42px;" class="answer4a">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;添加选项
                                        </a>

                                        <select name="queryType" id="ty">

                                        </select>
                                        <span>正确答案：</span>
                                    </div>
                                </div>
                                <!--多空题板块-->
                                <div class="end div3" id="div3" style="display:none;">
                                    <div contenteditable="true" class="select_single gapp" id="gapp"
                                         style="line-height:28px;padding: 7px 51px; overflow: auto"></div>
                                    <div class="fixed_question">问题：</div>
                                    <div class="answer3 answer7 answer7a">
                                        <input type="text" value=""
                                               style="margin-top: -10px;width: 30%;position: absolute;left:22px;border:none"
                                               placeholder="请填写空格提示答案" id="gapp" disabled="disabled">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
                                        </a>
                                    </div>
                                    <div class="ad">

                                    </div>
                                </div>

                                <!--多选题板块-->
                                <div class="end div4" id="div4" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <!--<span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>-->
                                        <input type="text" value="请在下列选项中选出正确的一项。" class="no_addquestion">
                                    </div>
                                    <div id="select2">

                                    </div>
                                    <div class="answer5" style="line-height:42px;margin-top: 30px;width: 100%;">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;添加选项
                                        </a>
                                        <span style="display: inline-block;min-width: 120px;height: 40px;border: 1px solid #a4a4a4;float: right;"></span>

                                        <div class="nei"></div>
                                        <span class="but_b">正确答案：</span>

                                    </div>
                                </div>

                                <!--画图题板块-->
                                <div class="end div5" id="div5" style="display:none;">
                                    <div class="select_single">
                                        <!--<input type="file" name="" id="" value="" style="color: #fff;"/>
                                        <div class="imgg"><img src=""/></div>-->
                                        <span class="question">问题：</span>
                                        <input type="text" value="请绘出您心中的大海。" class="no_addquestion">
                                    </div>
                                </div>

                                <!--连线题板块-->
                                <div class="end div6" id="div6" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text" value="请在下列选项中选出正确的一项" class="no_addquestion">
                                    </div>
                                    <div class="A">
                                        子项A组：
                                        <div class="matching">
                                            <span class="question">1：</span>
                                            <input type="text" value="杨万里">
                                        </div>
                                    </div>
                                    <div class="B">
                                        子项B组：
                                        <div class="matching">
                                            <span class="question">1：</span>
                                            <input type="text" value="唐朝"/>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div id="answer" class="answer">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;添加选项
                                        </a>
                                    </div>
                                </div>
                                <!--排序题板块-->
                                <div class="end div7" id="div7" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text" value="请将下列诗人按照朝代排序" class="no_addquestion">
                                    </div>
                                    <div class="C">
                                        答案:
                                        <div class="matching">
                                            <span class="question">1：</span>
                                            <input type="text" value="杨万里">
                                        </div>
                                    </div>
                                   <div class="clear"></div>
                                    <div id="answer" class="answer1">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;插入子项
                                        </a>
                                    </div>
                                </div>
                                <!--判断题板块-->
                                <div class="end div8" id="div8" style="display:none;">
                                    <div class="E">
                                        问题:           
                                    </div>
                                    <div class="F">
                                        答案：		
                                    </div>
                                    <div class="clear"></div>
                                    <div id="answer" class="answer2">
                                        <!--<a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;继续添加题目
                                        </a>-->
                                    </div>
                                </div>
                                <!--填空题板块-->
                                <div class="end div9" id="div9" style="display:none;">
                                    <div contenteditable="true" class="select_single" id="gap"
                                         style="padding-left: 50px;overflow: auto">

                                    </div>
                                    <div class="fixed_question" style="position: relative;top: -30px;left: 12px;">问题：
                                    </div>
                                    <div class="answer3 answer10">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
                                        </a>
                                    </div>
                                    <span>正确答案：</span>

                                    <div class="G">
                                    </div>
                                </div>
                                <div class="button" style="width: 47%;margin: 0 auto;">
                                    <button class="btn btn_r">返回</button>
                                    <button class="btn btn_c" id="bth_c" onclick="return false">提交</button>
                                    <button class="btn btn_c" id="bth_cc" onclick="return false"><a href="javascript:;"
                                                                                                    style="color: #fff;">下一题</a>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left">
                    <div class="col-md-12 col-xs-12">
                        <a href="schoolNotice.html" style="color: #FFFFFF ">通知</a><span class="openNotice">3</span>
                    </div>
                    <div class="col-md-12 col-xs-12 next">
                        <ul class="nav nave">
                            <li>
                                <a href="classNotice">1.明天交语文作业</a>
                            </li>
                            <li>
                                <a href="classNotice">2.5.1放假通知</a>
                            </li>
                            <li>
                                <a href="classNotice">3.周五语文考试</a>
                            </li>
                        </ul>
                        <div class="scc">
                            <div class="yit">已添加 <img src="images/s05.jpg"/></div>
                            <ol>
                            </ol>
                            <a href="independentOperationAddJobSection" class="cs">生成作业</a>
                        </div>
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
<!--引导-->
<script type="text/javascript" src="js/intro.js"></script>
<script type="text/javascript">
    introJs().start();
</script>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                章节选择
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding: 1px">×
                </button>
            </div>
            <div class="modal-body to-add">
                <span>添加到：</span>

                <div>
                    <span>第一章第一节</span>
                    <span>第一章第二节</span>
                    <span>第一章第三节</span>
                    <span>第一章第四节</span>
                    <span>第一章第五节</span>
                    <span>第二章第一节</span>
                    <span>第二章第二节</span>
                    <span>第二章第三节</span>
                    <span>第二章第四节</span>
                    <span>第二章第五节</span>
                    <span>第二章第六节</span>
                    <span>第三章第一节</span>
                </div>
                <div style="margin-top: 10px;text-align: right;" data-dismiss="modal">
                    <a href="#" style="color: #168BEE" class="tadd">确认</a>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">章节选择
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding: 1px">×
                </button>
            </div>
            <div class="modal-body to-add">
                <span>添加到：</span>

                <div>
                    <span>第一章第一节</span>
                    <span>第一章第二节</span>
                    <span>第一章第三节</span>
                    <span>第一章第四节</span>
                    <span>第一章第五节</span>
                    <span>第二章第一节</span>
                    <span>第二章第二节</span>
                    <span>第二章第三节</span>
                    <span>第二章第四节</span>
                    <span>第二章第五节</span>
                    <span>第二章第六节</span>
                    <span>第三章第一节</span>
                </div>
                <div style="margin-top: 10px;text-align: right;" data-dismiss="modal">
                    <a href="#" style="color: #168BEE" class="tadd">确认</a>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
</script>
<script>
	$(function(){
		//题型数据
		$.ajax({
			type:"get",
			url:"/getCategroy",
			dataType:'json',
			success:function(data){
				for(var i=0;i<data.length;i++){
					$('#66,#but_a').append('<option value='+data[i].id+'>'+data[i].title+'</option>')
				}
				$('.type>option').last().hide()
			}
		});
		
		//科目数据
		$.ajax({
			type:"get",
			url:"/getCourse",
			dataType:'json',
			success:function(data){
				for(var i=0;i<data.length;i++){
					$('#subject>select').append('<option value='+data[i].id+'>'+data[i].title+'</option>')
				}
			}
		});
		
		
	//显示题目
	$.ajax({
		type:"get",
		url:"/showExerciseList/1",
		dataType:'json',
		success:function(data){
			var choose;
			var exercises=data.exercises;
			console.log(data)
			for(var i=0;i<exercises.length;i++){
					if(exercises[i].cate_title=='单选题'){
						for(var a=0;a<exercises[i].answer.length;a++){
							choose=exercises[i].answer[a]
						}
						$('.work').append('<div class="row mar_tb mar_t" num="'+exercises[i].id+'"><div class="homework-content"><p class="question-head"><span class="order"></span><span class="xz'+i+' question-types">'+exercises[i].cate_title+'</span>：'+exercises[i].subject+'</p> <form action="" class="selectt'+i+'"></form>				                                  <div class="line"></div>                                    <div class="question-foot">                                        <span class="blue">正确答案：</span><span class="answerOrder'+i+'">'+choose+'</span><span class="col-line"></span>											<span title="难度(1)" class="colLine">	    <a><img src="images/Cj_17mm.png" class="yellow"></a>         <a><img src="images/Cj_18mm.png"></a>          <a><img src="images/Cj_18mm.png"></a>           <a><img src="images/Cj_18mm.png"></a>            <a><img src="images/Cj_18mm.png"></a>								</span>                                        <div class="pj">                                            <div title="难度(1)">                                                <img src="images/Cj_17mm.png" class="yellow" num=1>                                                <img src="images/Cj_18mm.png" num=2>                                                <img src="images/Cj_18mm.png" num=3>                                               <img src="images/Cj_18mm.png" num=4>                                                <img src="images/Cj_18mm.png" num=5>                                            </div>                                           <div>                                               <span class="mui4" title="差" mui=1></span>                                               <span class="mui4" title="较差" mui=2></span>                                                <span class="mui4" title="一般" mui=3></span>                                                <span class="mui4" title="好" mui=4></span>                                                <span title="很好" mui=5></span>                                           </div>                                            <b>评分</b>                                        </div>                                        <div style="float: right;" class="hidee">                                            <span class="tj"><input type="checkbox" name="" id=""  value="'+i+'"/>添加</span>                                            <a href="javascript:;" class="bj">编辑</a>                                            <a href="javascript:;" class="bo">收藏</a><span class="collection_num">0</span>                                      </div>                                    </div>                               </div>                            </div>')
						for(var j=0;j<exercises[i].options.length;j++){
							for(var key in exercises[i].options[j]){
						$('.selectt'+i).append('<div class="radio"><label><input type="radio" name="questionSelect" class="questionSelect" disabled="disabled" value="A"/><span class="select-wrapper"></span>'+key+'，<span class="question-content"> '+exercises[i].options[j][key]+' </label></div>')
							}
						}
					}else if(exercises[i].cate_title=='填空题'){		
							$('.work').append('<div class="row mar_tb mar_t" num="'+exercises[i].id+'"> <div class="homework-content"><p class="question-head" style="display: inline-block"><span class="order"></span> '+exercises[i].cate_title+'：'+exercises[i].subject+'<div class="line"></div><div class="question-foot"><span class="blue">正确答案：</span><span class="answerOrder"></span>                                       <div class="lot_word">                                           <a href="javascript:;" class="bo">收藏</a>                                           <span class="collection_num">0</span>                                       </div>                                    </div>                                </div>                           </div>                           ')
					}else if(exercises[i].cate_title=='多选题'){
						$('.work').append(' <div class="row mar_tb mar_t" num="'+exercises[i].id+'"><div class="homework-content"><p class="question-head"><span class="order"></span>'+exercises[i].cate_title+'：'+exercises[i].subject+'     </p><form action="" class="selects'+i+'"> </form> <div class="line"></div> <div class="question-foot"><span class="blue">正确答案：</span><span class="answerOrder'+i+'"></span><span  class="col-line"></span><div style="float: right"><a href="javascript:;" class="bo">收藏</a><span class="collection_num">0</span>                                       </div>                                    </div>                                </div>                           </div>')					
						for(var j=0;j<exercises[i].options.length;j++){
							for(var key in exercises[i].options[j]){
							$('.selects'+i).append('<div class="radio"><label><input type="checkbox" name="questionSelect" class="questionSelect" disabled="disabled" style="display: none" value="A"/><span class="select-wrapper"></span>'+key+'，<span class="question-content">'+exercises[i].options[j][key]+' </span></label> </div>')
							}
						}
						var nu='';
						for(var a=0;a<exercises[i].answer.length;a++){
							nu+=exercises[i].answer[a];
							$(".answerOrder"+i).text(nu)
						}
					}else if(exercises[i].cate_title=='简答题'){
								$('.work').append('<div class="row mar_t work" num="'+exercises[i].id+'"> <div class="row mar_tb"> <div class="homework-content"><p class="question-head"><span class="order"> </span><span class="xz'+i+' question-types">'+exercises[i].cate_title+'</span>：'+exercises[i].subject+'</p><div class="line"></div>                                   <div class="question-foot">                                       <span class="blue">正确答案：</span><span class="answerOrder">自由发挥</span><span                                           class="col-line"></span>											<span title="难度(2)" class="colLine">	    <a><img src="images/Cj_17mm.png" class="yellow"></a>         <a><img src="images/Cj_17mm.png" class="yellow"></a>          <a><img src="images/Cj_18mm.png"></a>           <a><img src="images/Cj_18mm.png"></a>          <a><img src="images/Cj_18mm.png"></a>								</span>                                       <div class="pj">                                           <div title="难度(2)">                                               <img src="images/Cj_17mm.png" class="yellow" num=1>                                               <img src="images/Cj_17mm.png" class="yellow" num=2>                                                <img src="images/Cj_18mm.png" num=3>                                               <img src="images/Cj_18mm.png" num=4>                                               <img src="images/Cj_18mm.png" num=5>                                            </div>                                           <div title="难度(2)">                                                <span class="mui3" title="差" mui=1></span>                                               <span class="mui3" title="较差" mui=2></span>                                                <span class="mui3" title="一般" mui=3></span>                                                <span title="好" mui=4></span>                                                <span title="很好" mui=5></span>                                           </div>                                           <b>评分</b>                                        </div> <div style="float: right;" class="hidee"><span class="tj"><input type="checkbox" name="" id=""value="'+i+'"/>添加</span> <a href="javascript:;">报错</a> <a href="javascript:;" class="bo">收藏</a><span class="collection_num">0</span> </div></div></div></div>')
					}
					
}


//添加题目
	var arrayId='';
	$('.work').on('click','.tj>input',function(e) {
			var cen=$('.xz'+$(this).val()).text();
			$('.scc>ol').append('<li class="busywork'+$(this).val()+'">'+cen+'</li>')
		if($(this).is(":checked")) {
			$(this).parent('.tj').addClass('ok')
			$('.nave').next().show()
			$('.nave').next().css({
				position: 'absolute',
				width: '100%',
				textAlign: "left",
				background: '#fff',
				marginTop: '30px'
			})
			$('.nave').next().find('ol').css('padding-left', '50px')
			$('.nave').next().find('ol').children('li').css({
				color: '#333',
				margin: '10px 0',
				listStyle: 'inherit'
			});
			arrayId+=$(this).parents('.mar_t').attr('num')+','
			event.stopPropagation();
			localStorage.setItem('id',arrayId)
		} else {
				$('.busywork'+$(this).val()).remove()
				$(this).parents('.mar_t').removeAttr('num').removeClass('mar_t')
				$('.mar_t').each(function(){
					arrayId=$(this).attr('num')
				})
				console.log(arrayId)
		}
		
		$('.yit>img').click(function() {
			$('.scc ol li').remove()
			$('.scc').hide()
			$('.tj').removeClass('ok')
			$('.tj input').attr("checked", false)
		})
	})
	
	//编辑
			var rubric={
				rubricA:'',
				rubricB:''
			}
			$('.work').on('click','.bj',function() {
			var choie=$(this).parents('.homework-content');
			$('#centery>div').not(":first-child").hide()
			$('#centery>div:nth-of-type(4)').show()
			$('.hidee').hide();
			var selectt = $(this).parents('.homework-content').find('.question-head').find('.xz').text();
			$('#centery>div:nth-of-type(4) #66 option').text(selectt);
			if(choie.find('.question-types').text()=='单选题'){
				rubric.rubricA=choie.find('.question-head').text()
				rubric.rubricB=choie.find('.question-content').text()
			}else{
				console.log('a')
			}
			localStorage.setItem('choie',[rubric.rubricA,rubric.rubricB])			
		});

		}
	});	
		
		
		
		//数据提交
		var Object={
			account:'1',//科目
			types:'1',//题型
			arrys:'',
			options:[],
			result:''
		}
		
				//综合体题型
		var colligate={
			course:'',
			categroy:'',
			subject:'',
			options:[],
			answer:[],
			subjective:[],
			objective:[]
		}
		
		
		$('#subject>select').change(function(){
			Object.account=$(this).val()
		})
		
		
		$('.types').change(function(){
			Object.types=$(this).val()
		})
		
		$('#ty').change(function(){
				Object.result=$(this).val()
				colligate.answer.push($(this).val())
		})
		
		var letter=64
		
			
				
		$('.type').change(function(){
			colligate.course=$(this).val()
		})
		
		var colligat,
			colligats;
		
		
		
		
		
		
	$('.button_frb').click(function(){	
		var grade=$("#grade").val();
		if(Object.types=='1'){
			Object.arrys=$('.Short-answer').val()
		}else if(Object.types=='2'){
			Object.arrys=$('.single-selection').val()!='' ? $('.single-selection').val() : $('.single-selection').val('请在下列选项中选出正确的一项。');
			$('.select1>div>input').each(function(i){
				var lette=String.fromCharCode(letter+i+1);
				var objec={}
				objec[lette]=$(this).val()
				Object.options.push(objec)
			})
			if(Object.result.length==0){
				Object.result=1
			}
		}else if(Object.types=='3'){
			Object.arrys=$('.long-short').text()
			console.log(Object.arrys)
		}else if(Object.types=='4'){
			Object.arrys=$('.multiple').val()
			$('.select2>div>input').each(function(i){
				var lette=String.fromCharCode(letter+i+1);
				var objec={};
				Object.result=[];
				objec[lette]=$(this).val()
				Object.options.push(objec)
			});
			$('.but_a>b').each(function(){
				Object.result.push($(this).attr('mu'))
			})
			Object.result=Object.result.join(',')
		}else if(Object.types=='5'){
			Object.arrys=$('.draw').val()
		}else if(Object.types=='6'){
			Object.arrys=$('.ligature').val()
			Object.result=[];
			var arry1=[]
			var arry2=[]
			$('.A>div>input').each(function(i){
				var objec={}
				objec[i+1]=$(this).val();
				arry1.push(objec);				
			})
			$('.B>div>input').each(function(i){
				var objec={}
				objec[i+1]=$(this).val()
				arry2.push(objec)			
			})
				arry1.pop()	
				arry2.pop()	
			Object.options.push(arry1,arry2)
			console.log(Object.result)
		}else if(Object.types=='7'){
			Object.arrys=$('.sort').val()
			$('.C>div>input').each(function(i){
				var objec={}
				objec[i+1]=$(this).val()
				Object.options.push(objec)				
			})
			Object.options.pop()	
			console.log(Object.options)
		}else if(Object.types=='8'){
			Object.arrys=$('.estimate input').val();
			Object.result=[];
			function removeByValue(arr, val,arry) {
  				for(var i=0; i<arr.length; i++) {
   				 if(arr[i] == val) {
    			  arr.splice(i,arry);
     			 break;
    			}
  			}
		}
			$('.estimates img').each(function(i){
				objec=$(this).attr('num')
				Object.result.push(objec)
				removeByValue(Object.result,undefined,i);
			})
			Object.result=Object.result.join(",")
		}else{
			Object.arrys=$('.pack').text()
			var objec=[]
			$('#G>div>input').each(function(i){			
				objec.push($(this).val());
				Object.result=objec
			})
			Object.result=Object.result.join(',')
			console.log(Object.arrys)
		}
		
		var datas;
		if(Object.types=='10'){
//			datas={'content':$('#scrap').val(),'subjective':colligate.subjective,'objective':colligate.objective}
		}else{
			datas={'score':grade,'course':Object.account,'categroy':Object.types,'subject':Object.arrys,'option':Object.options,'answer':Object.result,'_token':'{{csrf_token()}}'}
		}
			$.ajax({
			type:"post",
//			url:"/createExercise",
			dataType:'json',
			data:datas,
			success:function(data){
			}
		});	
					
	})

	})
</script>
<script src="js/Exercise_editor.js"></script>
</body>

</html>