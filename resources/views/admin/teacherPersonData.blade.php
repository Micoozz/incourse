<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/teacherPersonData.css"/>
	<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/selectivizr.js"></script>
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
                <a href="../../自媒体中心/mediaManager.html">学校首页</a>
                <div>
                    <a href="../../自媒体中心/relateToMeManager.html">@与我相关</a>
                </div>
            </li>
            <!--根据账号具体身份显示对应的管理员功能-->
          <!--   <li><a href="../教务管理员/f_Syllabus.html">教务管理</a></li>
            <li><a href="../教学管理员/Teaching.html">教学管理</a></li>
            <li><a href="../档案管理员/addEmployeeFile.html">档案管理</a></li>
            <li><a href="../题库管理员/questionBank.html">题库管理</a></li> -->
            <!--<li><a href="javascript:;">交易中心</a></li>-->
            <li class="affix">
                <a href="javascript:;"><img src="images/01.png" /></a>
            </li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
                    <div class="cent">
                        <a href="#" class="blue">个人信息</a>
                    </div>
                </li>
                <li><a href="../../登录页/index.html" class="blue">退出</a></li>
        </ul>
    
    	</div>
     </div>
<div class="content">
    <div id="center">
        <div class="container">
            <div class="row">
                <!--左侧栏-->
                <div class="col-xs-12" id="left">
                    <ul class="nav1 nav" id="nav1" style="display: none">
                        <li><a href="Arrangement_work(homepage)">作业管理</a></li>
                        <li><a href="Exercise_editor">习题库</a></li>
                        <li><a href="data">资料库</a></li>
                        <li><a href="duty_arrange">班级管理</a></li>
                        <li><a href="classindex">成绩管理</a></li>
                        <li><a href="class-outline">课程大纲</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div id="col">个人资料</div>
                    </div>
                    <div class="personDataContent">
                        <!--个人资料和设置头像-->
                        <div id="form_e">
                            <table>
                                <tr id="t1_e">
                                    <td class="td">InCourse账号：</td>
                                    <td>
                                        xxxxxx
                                        <!--修改密码 -->
                                        <span data-toggle="modal" data-target="#ziLiao">修改密码</span>
                                    </td>
                                </tr>
                                <tr id="t2_e">
                                    <td class="td">真实姓名：</td>
                                    <td>李蓉</td>
                                </tr>
                                <tr id="t3_e">
                                    <td class="td">个性签名：</td>
                                    <td>学习是生活的阶梯</td>
                                </tr>
                                <tr id="t4_e">
                                    <td class="td">性别：</td>
                                    <td>男</td>
                                </tr>
                                <tr id="t5_e">
                                    <td class="td">生日：</td>
                                    <td>1990年01月01日</td>
                                </tr>
                                <tr id="t6_e">
                                    <td class="td">主要科目：</td>
                                    <td>语文</td>
                                </tr>
                                <tr id="t7_e">
                                    <td class="td">爱好：</td>
                                    <td>阅读</td>
                                </tr>
                                <tr id="t8_e">
                                    <td class="td">所在学校：</td>
                                    <td>杭州第四中学</td>
                                </tr>
                                <tr id="t10_e">
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
                        <!-- 修改密码Modal -->
                        <div class="modal fade" id="ziLiao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:medium;"><span aria-hidden="true">x</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" id="form_p">
                                            <table>
                                                <tr>
                                                    <td class="td_p">原密码:</td>
                                                    <td class="td_in"><input type="password" name="password"></td>
                                                    <td><span class="state1"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="td_p">新密码:</td>
                                                    <td class="td_in"><input type="password" name="repassword"></td>
                                                    <td><span class="state1"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="td_p">再次输入新密码:</td>
                                                    <td class="td_in"><input type="password" name="sepassword"></td>
                                                    <td><span class="state1"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><input type="submit" value="提交"></td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--修改资料-->
                        <div class="change">
                            <!--修改资料-->
                            <button id="modifyData" data-keyboard="false" type="button" class="btn btn_rt" data-toggle="modal" data-backdrop="static" data-target="#password">
                                修改资料
                            </button>
                            <!-- 修改资料Modal -->
                            <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" id="form_m" method="post">
                                                <table>
                                                    <tr id="t1_m">
                                                        <td class="td">上传图片：</td>
                                                        <td>
                                                            <div class="headImg">
                                                                <img src="images/class_ps.png" title="头像"/>
                                                            </div>

                                                            <input type="file" class="unloadHeadImg">
                                                            <input type="button" value="上传头像">
                                                        </td>
                                                    </tr>
                                                    <tr id="t2_m">
                                                        <td class="td">
                                                            <label for="uname">真实姓名：</label>
                                                        </td>
                                                        <td><input id='uname' class="modifyDisabled" disabled type="text" placeholder="李蓉"></td>
                                                    </tr>
                                                    <tr id="t3_m">
                                                        <td class="td">
                                                            <label for="autograph">个性签名：</label>
                                                        </td>
                                                        <td><input id="autograph" type="text" placeholder="学习是生活的阶梯"></td>
                                                    </tr>
                                                    <tr id="t4_m">
                                                        <td class="td">性别：</td>
                                                        <td>
                                                            <input type="radio" name="sex" value="男" id="maile"><label for="maile">男</label>
                                                            <input type="radio" name="sex" value="女" checked="checked" id="femaile"><label for="femaile">女</label>
                                                        </td>
                                                    </tr>
                                                    <tr id="t5_m">
                                                        <td class="td">生日：</td>
                                                        <td>
                                                            <select name="year">
                                                                <option value="">1995</option>
                                                                <option value="">1996</option>
                                                                <option value="">1997</option>
                                                                <option value="">1998</option>
                                                                <option value="">1999</option>
                                                                <option value="">2000</option>
                                                                <option value="">2001</option>
                                                                <option value="">2002</option>
                                                                <option value="">2003</option>
                                                            </select><span>年</span>
                                                            <select name="month">
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                                <option value="">06</option>
                                                                <option value="">07</option>
                                                                <option value="">08</option>
                                                                <option value="">09</option>
                                                                <option value="">10</option>
                                                                <option value="">11</option>
                                                                <option value="">12</option>
                                                            </select><span>月</span>
                                                            <select name="day">
                                                                <option value="">01</option>
                                                                <option value="">02</option>
                                                                <option value="">03</option>
                                                                <option value="">04</option>
                                                                <option value="">05</option>
                                                                <option value="">06</option>
                                                                <option value="">07</option>
                                                                <option value="">08</option>
                                                                <option value="">09</option>
                                                                <option value="">10</option>
                                                                <option value="">11</option>
                                                                <option value="">12</option>
                                                                <option value="">13</option>
                                                                <option value="">14</option>
                                                                <option value="">15</option>
                                                                <option value="">16</option>
                                                                <option value="">17</option>
                                                                <option value="">18</option>
                                                                <option value="">19</option>
                                                                <option value="">20</option>
                                                                <option value="">21</option>
                                                                <option value="">22</option>
                                                                <option value="">23</option>
                                                                <option value="">24</option>
                                                                <option value="">25</option>
                                                                <option value="">26</option>
                                                                <option value="">27</option>
                                                                <option value="">28</option>
                                                                <option value="">29</option>
                                                                <option value="">30</option>
                                                                <option value="">31</option>
                                                            </select><span>日</span>
                                                        </td>
                                                    </tr>
                                                    <tr id="t6_m">
                                                        <td class="td">
                                                            <label for="strongPoint">主要科目：</label>
                                                        </td>
                                                        <td><input id="strongPoint" type="text" placeholder="语文"></td>
                                                    </tr>
                                                    <tr id="t7_m">
                                                        <td class="td">
                                                            <label for="hobby">爱好：</label>
                                                        </td>
                                                        <td><input id="hobby" type="text" placeholder="阅读"></td>
                                                    </tr>
                                                    <tr id="t8_m">
                                                        <td class="td">
                                                            <label for="school">所在学校：</label>
                                                        </td>
                                                        <td><input id="school" class="modifyDisabled" disabled type="text"  placeholder="杭州第四中学"></td>
                                                    </tr>
                                                    <tr id="t10_m">
                                                        <td class="td">
                                                            <label for="job">职位：</label>
                                                        </td>
                                                        <td><input id="job" class="modifyDisabled" disabled type="text" placeholder="老师"></td>
                                                    </tr>
                                                    <tr id="t11_m">
                                                        <td colspan="2"><input type="submit" value="保存"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--修改资料里点击保存的弹出框-->
                            <div class="unloadStatus">
                                <img src="images/unloadSuccess.png"/>
                                保存成功
                            </div>
                        </div>
                    </div>
                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left">
                    <div class="col-md-12 col-xs-12">
                        <a href="schoolNotice.html">通知</a>
                        <span class="openNotice">3</span>
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
                                    <a href="javascript:;" class="col-md-1"><img src="images/bo.png"/></a>
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
<div id="footer"></div>
</body>
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js" ></script>
<script src="js/teacherPersonData.js"></script>
<!--[if lt IE 9]>
<script src="js/jquery.placeholder.min.js"></script>
<script>
    $(function() {
        $('input, textarea').placeholder();
    });
</script>
<![endif]-->
</html>