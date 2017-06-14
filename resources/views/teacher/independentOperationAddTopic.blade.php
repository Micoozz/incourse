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
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/Correcting_operation.css">
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
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
                    <li><a href="create-class">+创建班级</a></li>
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
                    <div class="row center1">
                        <p class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></p>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center_title">一年一班作业（语文)</div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                            <div id="document"><a href="javascript:history.go(-1)"><img src="images/return2.png" alt="">返回</a>
                            </div>
                        </div>
                    </div>
                    <!--已经添加题目的显示效果-->
                    <div>
                        <div class="center2">
                            <div class="row mar_tb">
                                <div>
                                    <div class="homework-content">
                                        <p class="question-head">
                        <span class="order">
                            1.
                        </span>
                                            <!--问题-->
                                            秦始皇吞并六国采用了以下哪种算法思想？
                                        </p>

                                        <form action="" class="select">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="questionSelect" class="questionSelect"
                                                           disabled="disabled"
                                                           value="A"/><span class="select-wrapper"></span>A.
                                                    <span class="question-content">递归</span>
                                                </label>
                                            </div>
                                            <!--问题字符大小均为14px-->
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="questionSelect" class="questionSelect"
                                                           checked
                                                           value="B"/><span class="select-wrapper"></span>B.
                                                    <span class="question-content">分治</span>
                                                </label>

                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="questionSelect" class="questionSelect"
                                                           disabled="disabled"
                                                           value="C"/><span class="select-wrapper"></span>C.
                                                    <span class="question-content">迭代</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="questionSelect" name="questionSelect"
                                                           disabled="disabled"
                                                           value="D"/><span class="select-wrapper"></span>D.
                                                    <span class="question-content">模拟</span>
                                                </label>
                                            </div>
                                        </form>
                                        <div class="line"></div>
                                        <div class="question-foot">
                                            <span>你的答案：</span><span class="answerOrder">B</span><span
                                                class="col-line"></span>
                                            <div class="blue" style="float: right"><a
                                                    href="Independent_operation_Add_job_specific_content">修改</a><a
                                                    href="#" class="blue mar" data-toggle="modal"
                                                    data-target="#myModal2">撤销</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mar_tb">
                            <div>
                                <div class="homework-content">
                                    <p class="question-head">
                        <span class="order">
                            2.
                        </span>
                                        <!--问题-->
                                        简答题：请写出你的头发数量。
                                    </p>

                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <span>正确答案：</span><span
                                            class="answerOrder">B145416546549846189465584</span><span
                                            class="col-line"></span>
                                        <div class="blue" style="float: right"><a
                                                href="Independent_operation_Add_job_specific_content">修改</a><a
                                                href="#" class="blue mar" data-toggle="modal"
                                                data-target="#myModal2">撤销</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row buttons">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3" style="text-indent: 15px;">现在已添加 <span
                                    class="bold">2</span> 题
                            </div>
                            <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 fourbtn_frbs">

                                <button class="btn btn_s"
                                        onclick="window.location='independentOperationAddJobSpecificContent'">
                                    继续添加
                                </button>
                                <button class="btn btn_s" onclick="window.location='exerciseEditor'">题库选题</button>
                                <button class="btn btn_s" di="button"
                                        onclick="window.location='independentOperationAddJobSection'">保存</button>
                                <button class="btn btn_s" data-toggle="modal" data-target="#myModal">转发</button>
                            </div>
                        </div>
                    </div>
                    <!--还未添加题目的显示效果-->
                    <div class="empty_add" style="display: none">
                        <h3>作业本空空的，快去<a href="Independent_operation_Add_job_specific_content">添加作业</a>吧！</h3>
                    </div>


                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left">
                       <div class="col-md-12 col-xs-12">
                        <a href="schoolNotice" style="color: #FFFFFF ">通知</a><span class="openNotice">3</span>
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
<!--摸态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px;
                        ">×
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
               撤销提醒
            </div>
            <div class="modal-body">
                <div style="font-weight: bold">确定要撤销吗？</div>
                <div class="yon">
                    <a href="">是</a>
                    <a href="">否</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $('#form>label:first-child>div>span').click(function () {
        if ($(this).attr('class') == 'balk') {
            $(this).attr('class', '')
        }
        else {
            $(this).attr('class', 'balk');
        }
    });
    
    $(function(){
    	$('#button').click(function(){
	 			$.ajax({
				type:"post",
				url:"/createJob",
				dataType:'json',
				data:{'course':localStorage.course,type:localStorage.type,'score':localStorage.score,'exercise_id':localStorage.exerciseid,'deadline':localStorage.deadline,'title':localStorage.title,'_token':'{{csrf_token()}}'},
				success:function(data){
					console.log(data)
				}
			});	   		
    	})
    })
</script>
</body>
</html>