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
    <script src="js/laydate.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/down_select.css">
    <link rel="stylesheet" href="css/Exercise_editor.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/matching.css"/>
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
                <div class="col-xs-12 " id="left">
                    <ul class="nav1 nav" id="nav1">
                        <li><a href="Arrangement_work(homepage)" class="box">作业管理</a></li>
                        <li><a href="Exercise_editor">习题库</a></li>
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
                        <div class="col-md-2 col-xs-4"></div>
                        <div class="col-md-8 col-xs-4 center_title" id="col">一年一班作业（语文）</div>
                        <div class="col-md-2 col-xs-4"></div>
                    </div>
                    <div class="center2">
                        <div id="content">
                            <form action="">
                                <div id="z_1">
                                    <div class="groupLeader row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 select">
                                            <span>组队方式</span>
                                            <select name="queryType" onchange="Cmd(this)" style="margin-left: 0">
                                                <option value="1" name="queryType">自由组队</option>
                                                <option value="2" name="queryType">教师分配</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 last_timer">
                                            <span>截止时间</span>
                                            <input style="padding-left: 10px" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm'})">
                                        </div>
                                    </div>
                                </div>
                                <div id="xxx">
                                    <!--自由组队板块板块-->
                                    <div class="end" id="div1">
                                        <div class="groupLeader row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <span>每组人数</span>
                                                <input type="text" value="" style="padding-left: 10px">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <span>小组数量</span>
                                                <input type="text" value="" style="padding-left: 10px">
                                            </div>
                                        </div>
                                        <div class="groupLeader row ">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <span>作业标题</span>
                                                <input type="text" value="" class="group2"
                                                       style="width: 86%;padding-left: 10px;">
                                            </div>
                                        </div>
                                        <!--<div id="add">
                                            <div id="add_add">
                                                <label for="addword"><img src="images/email.png">&nbsp;添加附件</label>
                                                <input type="file" id="addword" style="display: none">
                                                <label for="addpic"><img src="images/picture.png">&nbsp;添加图片</label>
                                                <input type="file" id="addpic" style="display: none">
                                                <label for="addmov"><img src="images/video.png"> &nbsp;添加影音</label>
                                                <input type="file" id="addmov" style="display: none">
                                            </div>
                                        </div>-->
                                        <div class="text">
                                            <!--<textarea name="" placeholder="填写文字描述" class="text_area"></textarea>-->



                                            <!--HPB修改 开始-->
                                            <!-- 加载编辑器的容器 -->
                                            <script id="container" name="content" type="text/plain"></script>
                                            <!-- 配置文件 -->
                                            <script type="text/javascript" src="ueditor.config.js"></script>
                                            <!-- 编辑器源码文件 -->
                                            <script type="text/javascript" src="ueditor.all.js"></script>
                                            <!--HPB修改 结束-->





                                        </div>
                                        <div class="modal_button modal_button_frb">
                                            <a href="javascript:history.go(-1)" class="bt_c">取消</a>
                                            <a href="Arrangement_work(homepage)" class="bt_s Hpb_btn_1">保存</a>
                                        </div>
                                    </div>
                                    <!--教师分配板块-->
                                    <div class="end" id="div2" style="display:none;">
                                        <div class="groupLeader row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <span>每组人数</span>
                                                <input type="text" value="" style="padding-left: 10px">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="height: 48px; line-height: 48px;">
                                                <span>小组数量</span>
                                                <a href="javascript:;" class="ck-add"><img src="images/add_07.jpg" alt=""><span>点击添加</span></a>
                                                <a href="javascript:;" class="ck-del"><span>撤销</span></a>
                                            </div>
                                        </div>
                                        <div class="more_group">
                                            <div class="groupLeader row " style="position: relative">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"
                                                     style="line-height: 35px;">
                                                    <span><span class="numer">1</span>组组长</span>
                                                    <input type="text" value="" class="group">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 do_work">
                                              
                                                    <a href="#" data-toggle="modal" data-target="#myModal"
                                                       class="ge2"><img src="images/ge.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="groupLeader row " style="position: relative">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"
                                                     style="line-height: 35px;">
                                                    <span><span class="numer">1</span>组成员</span>
                                                    <input type="text" value="" class="group group_frbs" style="width: 81%">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 do_work_special">
                                                    <a href="#" data-toggle="modal" data-target="#myModal2"
                                                       class="ge3"><img src="images/ge.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="groupLeader row ">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <span>作业标题</span>
                                                <input type="text" value="" class="group2" style="width: 86%">
                                            </div>
                                        </div>
                                        <!--<div id="add">
                                            <div id="add_add">
                                                <label for="addword"><img src="images/email.png">&nbsp;添加附件</label>
                                                <input type="file" id="addword" style="display: none">
                                                <label for="addpic"><img src="images/picture.png">&nbsp;添加图片</label>
                                                <input type="file" id="addpic" style="display: none">
                                                <label for="addmov"><img src="images/video.png"> &nbsp;添加影音</label>
                                                <input type="file" id="addmov" style="display: none">
                                            </div>
                                        </div>-->
                                        <div class="text">
                                            <!--<textarea name="" placeholder="请添加文字描述"></textarea>-->



                                            <!--HPB修改 开始-->
                                            <!-- 加载编辑器的容器 -->
                                            <script id="container_2" name="content" type="text/plain"></script>
                                            <!--HPB修改 结束-->





                                        </div>
                                        <div class="text_hidden">
                                            <input type="text" placeholder="组长任务">
                                            <input type="text" placeholder="组员任务">
                                            <div class="add"><img src="images/add_07.jpg"/></div>
                                            
                                        </div>
                                        <div class="modal_button">
                                            <span class="one_key">一键分配任务</span>
                                            <a href="javascript:history.go(-1)" class="bt_c">取消</a>
                                            <a href="Arrangement_work(homepage)" class="bt_s Hpb_btn_2">保存</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
<script>
    $(document).ready(function () {
        $(".bc").click(
                function () {
                    $(".fix").toggle();
                }
        );
        $(function () {
            $(".fix>a").mouseover(function () {
                $(this).addClass('on').siblings().removeClass('on');

            });
        });
        $(".one_key").click(
                function () {
                    if ($(".text_hidden").is(":hidden")) {
                        $(".text_hidden").slideDown();
                        $(".one_key").html("放弃分配")
                    } else {
                        $(".text_hidden").slideUp();
                        $(".one_key").html("一键分配任务")
                    }
                }
        );
        $(".modal_name>div>a").click(
                function () {
                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected")
                    } else {
                        $(this).addClass("selected")
                    }
                }
        );
        $(".modal_name_s a").click(function () {
            $(".modal_name_s a").removeClass('selected');
            $(this).addClass("selected")
        })
        $(".bt_back").click(
                function () {
                    window.history.back();
                }
        );
        var a=1;
        $(".ck-del").click(
                function () {
                    $(".del_group").last().remove();
                    if(a!=1){a--}
                }
        )

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
    <script type="text/javascript">
        !function(){
            laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
            laydate({elem: '#demo'});//绑定元素
        }();

        //日期范围限制
        var start = {
            elem: '#start',
            format: 'YYYY-MM-DD',
            min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };

        var end = {
            elem: '#end',
            format: 'YYYY-MM-DD',
            min: laydate.now(),
            max: '2099-06-16',
            istime: true,
            istoday: false,
            choose: function(datas){
                start.max = datas; //结束日选好后，充值开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);

        //自定义日期格式
        laydate({
            elem: '#test1',
            format: 'YYYY年MM月DD日',
            festival: true, //显示节日
            choose: function(datas){ //选择日期完毕的回调
                alert('得到：'+datas);
            }
        });

        //日期范围限定在昨天到明天
        laydate({
            elem: '#hello3',
            min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
            max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
        });
          //11.23
          var add=0
          $(".add").click(function(){
          	$(this).parent().append('<input type="text" placeholder="组员任务" name="add'+(++add)+'"/>')
          })
    </script>
<!--摸态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="font-size: 13px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                人员名单
            </div>
            <div class="modal-body row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 history">
                    <span><a href="#">历史担任记录</a></span>
                </div>
                <div class="row modal_name_s">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                        <a href="#">爱新觉罗</a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李蓉</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李蓉</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王思聪</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李蓉</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name_s">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name_s">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name_s">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name_s">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="font-size: 13px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                人员名单
            </div>
            <div class="modal-body row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 history">
                </div>
                <div class="row modal_name">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                        <a href="#">爱新觉罗</a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李蓉</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李蓉</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王思聪</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李蓉</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">李璇</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王磊</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">乔峰</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
                <div class="row modal_name">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#">王卫</a></div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                </div>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- 实例化编辑器_1 HPB修改-->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    // 自定义工具栏图片的"title"为“图片”
    ue.ready(function(){
        var imageTitle=document.getElementById("edui123_body");
        imageTitle.setAttribute("title","图片");
    })
    // 提交编辑器
    $(".Hpb_btn_1").click(function(){
//        event.preventDefault();
        ue.ready(function(){
            var txt=ue.getContent();
        })
    });
</script>
<!-- 实例化编辑器_2 HPB修改-->
<script type="text/javascript">
    var ue = UE.getEditor('container_2');
    $(".Hpb_btn_2").click(function(){
//        event.preventDefault();
        ue.ready(function(){
            var txt=ue.getContent();
        })
    });
</script>
</body>
</html>