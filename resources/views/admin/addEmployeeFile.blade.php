<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>添加员工档案</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script>
        $(function() {
            $('input, textarea').placeholder();
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/duty_arrange.css" />
    <!--[if lt IE 9]>
    <script src="../JS/html5shiv.min.js"></script>
    <script src="../JS/respond.min.js"></script>
    <script src="../JS/selectivizr.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><b>账号管理</b></h4>
                </div>
                <div class="modal-body">
                    <div class="modal-input-line">
                        <span>当前账号</span><input type="text">
                    </div>
                    <div class="modal-input-line">
                        <span>当前密码</span><input type="text">
                    </div>
                    <div class="modal-btn-line">
                        <span class="add-account">生成账号</span>
                        <span class="initialize-password">初始化密码</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <!--
    作者offline
    时间2016-05-24
    描述中心内容
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
                            <div class="col-md-4 col-xs-4 account-management" data-toggle="modal" data-target="#myModal">账号管理</div>
                            <div class="col-md-4 col-xs-4" id="col">员工档案</div>
                            <div class="col-md-4 col-xs-4">
                                <div id="return">
                                    <a href="employeeFile"><img src="images/return1.png" alt="">返回</a>
                                </div>
                            </div>
                        </div>
                        <div id="information_content">
                            <div id="basic_information">
                                <div class="add_file_top_image">
                                    <div class="img_left">B</div>
                                    <div class="img_right">
                                        <div class="img_right_up"><span>基本信息</span></div>
                                        <div class="img_right_down">asic information</div>
                                    </div>
                                </div>
                                <div class="fileRestract"><a href="javascript:;" id="info_retract">收起<span class="caret"></span></a></div>
                                <form class="info" id="stu_info" action="">
                                    <div class="row info_name">
                                        <div class="col-lg-3 col-md-5 col-sm-5 col-xs-5 ">
                                            <img src="images/up_img.png" alt="" class="add_file_picture">
                                        </div>
                                        <div class="col-lg-9 col-md-7 col-sm-7 col-xs-7">
                                            <div class="container-fluid">
                                                <div class="row info_name">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input type="text" placeholder="姓名" class="basic-two-line">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input type="text" placeholder="性别" class="basic-two-line">
                                                    </div>
                                                </div>
                                                <div class="row add_file_info1">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input type="text" placeholder="籍贯" class="basic-two-line">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input type="text" placeholder="民族" class="basic-two-line">
                                                    </div>
                                                </div>
                                                <div class="row add_file_info1">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input type="text" placeholder="户籍类型" class="basic-two-line">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <input type="text" id="birthTime" class="inline laydate-icon basic-two-line date-input-table" placeholder="出生年月">
                                                    </div>
                                                </div>
                                                <div class="row add_file_info1">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="身份证号" style="width:94%">
                                                    </div>
                                                </div>
                                                <div class="row add_file_info1">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="联系电话" style="width:94%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="所在部门" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="现任职务" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="任教班级" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="任教科目" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="开始时间" id="startTime" class="inline laydate-icon basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="结束时间" id="endTime" class="inline laydate-icon basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="add-more-line">
                                        <span>+&nbsp继续添加</span>
                                    </div>
                                </form>
                            </div>
                            <!--************************************资历信息***********************************************-->
                            <div id="student_evaluation">
                                <div class="add_file_top_image">
                                    <div class="img_left">Q</div>
                                    <div class="img_right img_right_add">
                                        <div class="img_right_up"><span>资历信息</span></div>
                                        <div class="img_right_down">ualification information</div>
                                    </div>
                                </div>
                                <div class="fileRestract"><a href="javascript:;" id="eval_retract">展开<span class="caret"></span></a></div>
                                <form class="info" id="stu_eval" action="">
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="教师工龄" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="教师资格" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="教师职务" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="骨干教师" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="来校时间" id="comeschoolTime" class="inline laydate-icon basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="转正时间" id="zzTime" class="inline laydate-icon basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="政治面貌" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="入党时间" id="rdTime" class="inline laydate-icon basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="毕业院校" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="毕业时间" id="graduateTime" class="inline laydate-icon basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="学历" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="专业" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="备注" class="remark-line">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--****************************************工作经历********************************************-->
                            <div id="class_position">
                                <div class="add_file_top_image">
                                    <div class="img_left">O</div>
                                    <div class="img_right img_right_add">
                                        <div class="img_right_up"><span>工作经历</span></div>
                                        <div class="img_right_down">ccupational history</div>
                                    </div>
                                </div>
                                <div class="fileRestract occupational"><a href="javascript:;" id="pos_retract">展开<span class="caret"></span></a></div>
                                <form class="info" id="stu_pos1">
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="聘任院校" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="证明电话" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="开始时间" id="startTime1" class="inline laydate-icon basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="结束时间" id="endTime1" class="inline laydate-icon basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="备注" class="remark-line">
                                        </div>
                                    </div>
                                    <div class="add-more-line-occupation">
                                        <span>+&nbsp继续添加</span>
                                    </div>
                                </form>
                            </div>
                            <!--****************************************家庭状况********************************************-->
                            <div id="family-situation">
                                <div class="add_file_top_image">
                                    <div class="img_left">F</div>
                                    <div class="img_right">
                                        <div class="img_right_up"><span>家庭情况</span></div>
                                        <div class="img_right_down">amily situation</div>
                                    </div>
                                </div>
                                <div class="fileRestract"><a href="javascript:;" id="family_retract">展开<span class="caret"></span></a></div>
                                <form class="info" id="family_pos">
                                    <div class="row info2">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="家庭住址" class="remark-line">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="家庭成员" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="与本人关系" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="row info2">
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                            <input type="text" placeholder="工作单位" class="basic-bottom-left">
                                        </div>
                                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" placeholder="联系方式" class="basic-bottom-right">
                                        </div>
                                    </div>
                                    <div class="add-more-line-family">
                                        <span>+&nbsp继续添加</span>
                                    </div>
                                </form>
                            </div>
                            <div class="row add_file_button all-add-btn">
                                <button class="btn btn1" data-toggle="modal" data-target="#myConfirm">保存</button>
                            </div>
                        </div>
                    </div>
                    <!--右侧栏-->
                    <div class="col-xs-12 left">
                        <div class="col-md-12 col-xs-12">
                            <a href="schoolNotice">通知</a><span class="openNotice">3</span>
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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--确认模态框-->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog my_update_dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header my_conf">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " id="myModalLabel">提示</h4>
                </div>
                <div class="modal-body my_conf_body">
                    确定要保存此资料吗？
                </div>
                <div class="modal-footer my_conf">
                    <button type="button" class="btn btn-primary btn_confirm" data-dismiss="modal">确定</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/myFunction.js"></script>
    <script>
    $(function() {
        $("#stu_eval").slideToggle("slow");
        $("#stu_pos1").slideToggle("slow");
        $("#family_pos").slideToggle("slow");
        $('.add-more-line>span').click(function() {
            $('.add-more-line').before('<div class="row info2"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 "><input type="text" placeholder="任教班级" class="basic-bottom-left"></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" placeholder="任教科目" class="basic-bottom-right"></div></div><div class="row info2"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 "><input type="text" placeholder="开始时间" class="basic-bottom-left"></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" placeholder="结束时间" class="basic-bottom-right"></div></div>');
        });
        $('.add-more-line-occupation').click(function() {
            $('.add-more-line-occupation').before('<div class="row info2"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 "><input type="text" placeholder="聘任院校" class="basic-bottom-left"></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" placeholder="证明电话" class="basic-bottom-right"></div></div><div class="row info2"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 "><input type = "text"placeholder = "开始时间"class = "basic-bottom-left" ></div><div class = " col-lg-6 col-md-6 col-sm-6 col-xs-6" ><input type = "text"placeholder = "结束时间"class = "basic-bottom-right" ></div></div><div class = "row info2"><div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12" ><input type = "text"placeholder = "备注"class = "remark-line" ></div></div>');
        });
        $('.add-more-line-family').click(function() {
            $('.add-more-line-family').before('<div class="row info2"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 "><input type="text" placeholder="家庭成员" class="basic-bottom-left"></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" placeholder="与本人关系" class="basic-bottom-right"></div></div><div class="row info2"><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 "><input type="text" placeholder="工作单位" class="basic-bottom-left"></div><div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" placeholder="联系方式" class="basic-bottom-right"></div></div>');
        });
        $("button").click(function(e){
            e.preventDefault();
        })
    });
    </script>
    <script src="js/laydate.js"></script>
    <script>
        !function(){
            laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
            laydate({elem: '#demo'});//绑定元素
        }();
        laydate({
            elem:'#birthTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#comeschoolTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#startTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#endTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#zzTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#rdTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#graduateTime',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#startTime1',
            format:'YYYY-MM-DD'
        });
        laydate({
            elem:'#endTime1',
            format:'YYYY-MM-DD'
        });
    </script>
</body>

</html>
