<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js" ></script>
    <link rel="stylesheet" href="css/down_select.css">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/Exercise_editor.css">
    <link rel="stylesheet" href="css/matching.css" />
    <script type="text/javascript" src="js/exerciseLibrary.js" ></script>
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
@include('teacher.header.left_nav')
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div class="col-md-2 col-xs-2"></div>
                        <div class="col-md-8 col-xs-8 center_title"id="col">一年一班作业（语文）</div>
                        <div class="col-md-2 col-xs-2"></div>
                    </div>
                   <div id="content">
                        <form action="">
                            <div id="z_1">
                                <div class="z_t_c row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 select">
                                        <span>选择题型</span>
                                        <select name="queryType" id="66" onchange="Cmd(this)">
                                            <option value="1" name="queryType">解答题</option>
                                            <option value="2" name="queryType">单选题</option>
                                            <option value="3" name="queryType">多空题</option>
                                            <option value="4" name="queryType">多选题</option>
                                            <option value="5" name="queryType">画图题</option>
                                            <option value="6" name="queryType">连线题</option>
                                            <option value="7" name="queryType">排序题</option>
                                            <option value="8" name="queryType">判断题</option>
                                            <option value="9" name="queryType">填空题</option>
 											<option value="10" name="queryType">综合题</option>                                           
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <span id="chapter">题目编号</span>
                                        <input type="text" value=" ">
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-lg-12 z_introduce">
                                        <span>题目要求</span>
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
                            <div id="xxx">
                                <!--简答题板块-->
                                <div class="end" id="div1">
                                    <div class="text"><textarea name="" placeholder="请输入题目内容"></textarea>
                                    </div>
                                    <div class="text"><textarea name="" placeholder="请输入标准答案"></textarea>
                                    </div>
                                </div>
                                <!--单选题板块-->
                                <div class="end" id="div2" style="display:none;">

                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>
                                        <input type="text"
                                               value="请在下列选项中选出正确的一项">
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
                                    <div contenteditable="true" class="select_single" id="gapp">
                                        <span>问题：</span>
                                        <input type="text" value="" id="first">
                                    </div>
                                    <div class="answer3 answer7">
                                        <a href="#">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
                                        </a>
                                    </div>
                                    <div class="ad">

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

                                <!--多选题板块-->
                                <div class="end" id="div4" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>
                                        <input type="text"
                                               value="请在下列选项中选出正确的一项">
                                    </div>
                                    <div id="select2">

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

                                <!--画图题板块-->
                                <div class="end" id="div5" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text"
                                               value="请绘出您心中的大海，然后交给老师">
                                    </div>
                                </div>

                                <!--连线题板块-->
                                <div class="end" id="div6" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text" value="请在下列选项中选出正确的一项">
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
                                            <input type="text" value="唐朝" />
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div id="answer" class="answer">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;添加选项
                                        </a>
                                    </div>
                                    <div class="answer">
                                        <div>正确答案：</div>
                                        <div class="answer_ab">
                                            <select id=""class="select">
                                                <option>--请选择--</option>
                                                <option>A1</option>
                                            </select>
                                            <span>连接</span>
                                            <select  id="" class="select1">
                                                <option>--请选择--</option>
                                                <option>B1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--排序题板块-->
                                <div class="end" id="div7" style="display:none;">
                                    <div class="select_single">
                                        <span class="question">问题：</span>
                                        <input type="text" value="请将下列诗人按照朝代排序">
                                    </div>
                                    <div class="C">
                                        子项:
                                        <div class="matching">
                                            <span class="question">1：</span>
                                            <input type="text" value="杨万里">
                                        </div>
                                    </div>
                                    <div class="D">
                                        正确答案序列（数字）：
                                        <div class="matching">
                                            <span class="question">排名</span>
                                            <span  class="questio">位</span>
                                            <input type="text" value="" />
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
                                    <div class="E">
                                        问题:
                                    </div>
                                    <div class="F">
                                        答案：
                                    </div>
                                    <div class="clear"></div>
                                    <div id="answer" class="answer2">
                                        <a href="javascript:;">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;继续添加题目
                                        </a>
                                    </div>
                                </div>
                                <!--填空题板块-->
                                <div class="end" id="div9" style="display:none;">
                                    <div contenteditable="true" class="select_single" id="gap">
                                        <span>问题：</span>
                                        <input type="text" value="" id="first">
                                    </div>
                                    <div class="answer3">
                                        <a href="#">
                                            <img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
                                        </a>
                                    </div>
                                    <span>正确答案：</span>
                                    <div class="G">
                                    </div>
                                </div>
								<div class="end" id="div10" style="display:none;">
										<div class="text"><span class="textarea">问题：</span><textarea name="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</textarea>
										</div>
										<div></div>
										<div class="text"><span class="textarea">+添加题目</span>
										</div>
									</div>
								<div class="modal_button" style="margin-right: 45px">
                                        <a href="javascript:history.go(-1)" class="bt_c">取消</a>
                                        <a href="independentOperationAddJobSpecificContent" class="bt_s">继续添加</a>
                                        <a href="#" class="bt_s Ad-sc" data-toggle="modal" data-target="#myModal">保存</a>
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
											<select name="queryType" id="66" onchange="Cmdd(this)">
												<option value="11" name="queryType">简答题</option>
												<option value="12" name="queryType">单选题</option>
												<option value="13" name="queryType">多空题</option>
												<option value="14" name="queryType">多选题</option>
												<option value="15" name="queryType">画图题</option>
												<option value="16" name="queryType">连线题</option>
												<option value="17" name="queryType">排序题</option>
												<option value="18" name="queryType">判断题</option>
												<option value="19" name="queryType">填空题</option>
											</select>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<span id="chapter">题目分值</span>
											<input type="text" value=" ">
										</div>
									</div>
								</div>
								<div id="xxx">
									<!--简答题板块-->
									<div class="end div11" id="div1">
										<div class="text"><span class="textarea">问题：</span><textarea name=""></textarea>
										</div>
										<div class="text"><span class="textarea">回答：</span><textarea name=""></textarea>
										</div>
									</div>
									<!--单选题板块-->
									<div class="end div12" id="div2" style="display:none;">

										<div class="select_single">
											<span class="question">问题：</span>
											<span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>
											<input type="text" value="请在下列选项中选出正确的一项">
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
									<div class="end div13" id="div3" style="display:none;">
										<div contenteditable="true" class="select_single" id="gapp" style="line-height: 13px;">
											<span>问题：</span>
											<input type="text" value="" id="first" style="min-height: 40px;line-height: 13px;">
										</div>
										<div class="answer3 answer7">
											<input type="text" value="" style="text-indent: 7px; margin-top: -11px;width: 83%;position: absolute;    right: 87px;border:none" placeholder="请填写空格提示答案" id="gapp" disabled="disabled">
											<a href="javascript:;">
												<img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
											</a>
										</div>
										<div class="ad">

										</div>
									</div>

									<!--多选题板块-->
									<div class="end div14" id="div4" style="display:none;">
										<div class="select_single">
											<span class="question">问题：</span>
											<span class=" bracket">(&nbsp;&nbsp;&nbsp;)</span>
											<input type="text" value="请在下列选项中选出正确的一项">
										</div>
										<div id="select2">

										</div>
										<div class="answer5" style="line-height:42px;margin-top: 30px">
											<a href="javascript:;">
												<img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;添加选项
											</a>
											<select name="queryType" class="but_s">
											</select>
											<span class="but_b">正确答案：</span>

										</div>
									</div>

									<!--画图题板块-->
									<div class="end div15" id="div5" style="display:none;">
										<div class="select_single">
											<span class="question">问题：</span>
											<input type="text" value="请绘出您心中的大海，然后交给老师">
										</div>
									</div>

									<!--连线题板块-->
									<div class="end div16" id="div6" style="display:none;">
										<div class="select_single">
											<span class="question">问题：</span>
											<input type="text" value="请在下列选项中选出正确的一项">
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
												<input type="text" value="唐朝" />
											</div>
										</div>
										<div class="clear"></div>
										<div id="answer" class="answer">
											<a href="javascript:;">
												<img src="images/add_07.jpg" alt="">&nbsp;&nbsp;添加选项
											</a>
										</div>
										<div class="answer">
											<div>正确答案：</div>
											<div class="answer_ab">
												<select id="" class="select">
													<option>--请选择--</option>
													<option>A1</option>
												</select>
												<span>连接</span>
												<select id="" class="select1">
													<option>--请选择--</option>
													<option>B1</option>
												</select>
											</div>
										</div>

									</div>
									<!--排序题板块-->
									<div class="end div17" id="div7" style="display:none;">
										<div class="select_single">
											<span class="question">问题：</span>
											<input type="text" value="请将下列诗人按照朝代排序">
										</div>
										<div class="C">
											子项:
											<div class="matching">
												<span class="question">1：</span>
												<input type="text" value="杨万里">
											</div>
										</div>
										<div class="D">
											正确答案序列（数字）：
											<div class="matching">
												<span class="question">排名</span>
												<span class="questio">位</span>
												<input type="text" value="" />
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
									<div class="end div18" id="div8" style="display:none;">
										<div class="E">
											问题:
										</div>
										<div class="F">
											答案：
										</div>
										<div class="clear"></div>
										<div id="answer" class="answer2">
											<a href="javascript:;">
												<img src="images/add_07.jpg" alt="">&nbsp;&nbsp;继续添加题目
											</a>
										</div>

									</div>
									<!--填空题板块-->
									<div class="end div19" id="div9" style="display:none;">
										<div contenteditable="true" class="select_single" id="gap">
											<span>问题：</span>
											<input type="text" value="" id="first">
										</div>
										<div class="answer3">
											<a href="#">
												<img src="images/add_07.jpg" alt="">&nbsp;&nbsp;&nbsp;插入空格
											</a>
										</div>
										<span>正确答案：</span>
										<div class="G">
										</div>
									</div>
									<div class="button" style="width:94%;float: none;">
										<button class="btn btn_r">返回</button>
										<button class="btn btn_c" id="bth_c" onclick="return false">提交</button>
										<button class="btn btn_c" id="bth_cc" onclick="return false"><a href="javascript:;" style="color: #fff;">下一题</a></button>
									</div>
								</div>
							</form>
						</div>

                </div>
                <!--右侧栏-->
                <div class="col-xs-12 left">
@include('teacher.header.right_nav')
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
    $(document).ready(function () {
        $(".bc").click(
                function () {
                    $(".fix").toggle();
                }
        )
        $(function () {
            $(".fix>a").mouseover(function () {
                $(this).addClass('on').siblings().removeClass('on');

            });
        })

    })
		$(function() {
			$('#div10>div:nth-of-type(3)').css('cursor', 'pointer')
			$('#div10>div:nth-of-type(3)').click(function() {
				$('#centery>div').not(":first-child").hide()
				$('#centery>div:nth-of-type(3)').show();
				$('#centery>div:first-child>div:nth-of-type(2)').text('添加子题');
				$('#centery>div:first-child>div:nth-of-type(3)').hide();
			});
			var box=0;
			$('#bth_c,#bth_cc').click(function() {
				box++;
				$('#centery>div').not(":first-child").hide();
				$('#centery>div:nth-of-type(2)').show();
				var sd = $('#centery>div:nth-of-type(3) #66').val();
				var nei = $('#centery>div:nth-of-type(3) #xxx>.div' + sd).html();
				var a = $('#centery>div:nth-of-type(3) #xxx>.div' + sd + 'textarea').val();
				$('#centery>div:nth-of-type(2) #div10>div:nth-of-type(2) textarea').val(a)
				$('#centery>div:nth-of-type(2) #div10>div:nth-of-type(2)').append("<div class='end hj' style='margin-left:0;width:100%'><div class='zi' style='color:#666;margin-left:13px'>子题"+box+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>删除</span></div>" + nei + "</div>");
				$('.zi').next().css('margin-top','5px');
				$('.zi').find('span').click(function(){$(this).parents('.hj').hide();box--;}).css('cursor','pointer').hover(function(){$(this).css('color','#168bee')},function(){$(this).css('color','#666')});
				$('#centery>div:nth-of-type(2) #div10>div:nth-of-type(2) .button').hide()
			})
		})
//动态生成，遇到一个问题样式生成了但是里面的内容并没有生成，麻烦写下。见上
</script>
<script>
    function Cmd(obj) {
        $("#xxx").children("div").not(':last-child').each(
                function () {
                    $(this).hide();
                }
        );
        $("#div" + obj.value).show();
    }
    
    		function Cmdd(obj) {
			$("#centery>div:nth-of-type(3) #xxx").children("div").not(':last-child').each(
				function() {
					$(this).hide();
				}
			);
			$(".div" + obj.value).show();
		}
</script>
<script>
    $(".bt_back").click(
            function(){
                window.history.back();
            }
    )
</script>
<!--摸态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="padding: 1px"
                        aria-hidden="true">×
                </button>
                保存作业
            </div>
            <div class="modal-body">
               <h3 class="model-feedback">保存成功！</h3>
                <p>您可以通过<a href="Independent_operation_Add_topic.html" style="color: #168BEE">查看题目</a>来查看您所编辑过得题目，快去看看吧！</p>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>