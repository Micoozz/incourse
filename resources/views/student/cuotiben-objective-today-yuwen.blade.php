<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js" ></script>
    <script src="js/homework-content.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/fenye.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/password.js" type="text/javascript" charset="utf-8"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/homework-2.css"/>
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
   <link rel="stylesheet" type="text/css" href="css/homework-style.css"/>
   <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
	<script src="js/selectivizr.js"></script>
    <![endif]-->
	<style type="text/css">
		.false-homework-content{
			margin-top: 40px;
		}

	</style>
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
            	 <li><a href="/zuoyenbenneirongliebiao" class="blue">学习中心</a></li>
                <li><a href="javascript:;">班级中心</a></li>
                <li><a href="javascript:;">交易中心</a></li>
                <li class="affix"><a href="javascript:;"><img src="images/01.png" /></a></li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
					<div class="cent">
						<a href="javascript:;">分析中心</a>
						<a href="javascript:;">学习生活记录</a>
						<a href="personal_material-password111.html">个人信息</a>
					</div>
                </li>
                <li><a href="/index" class="blue">退出</a></li>
            </ul>
				</div>
</div>
	<!--
    	作者：offline
    	时间：2016-05-24
    	描述：内容标签页切换
  -->
  <div class="content">
  <div class="container">
  <div class="row">
  <div id="cent_nav" class="col-md-3 col-xs-12">
  		<ul class="col-md-12 col-xs-12">
			<li onclick=window.open("today_homework.html","_self")>今日作业</li>
            <li class="offt">语文</li>
  			<li>数学</li>
  			<li>英语</li>
  			<li>添加课程</li>
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
  						<li><a href="/zuoyenbenneirongliebiao" class="box">作业本</a></li>
  						<!--<li><a href="#">学习分析</a></li>-->
  						<li><a href="ziliaoku-neirongliebiao.html">资料库</a></li>
  						<li><a href="javascript:;">习题册</a></li>
  						<li><a href="javascript:;">联系老师</a></li>
  						<li><a href="javascript:;">联系人</a></li>
  						<li><a href="javascript:;">课程介绍</a></li>
  					</ul>
  				</div>
  				<!--内容-->
  				<div class="col-xs-12 col-sm-12" id="centery">
     				<div class="row center1">
  						<div class="col-md-2 col-xs-4">
  							<a class="return-fyg pointer" onclick="window.history.go(-1);"></a>
  						</div>
  						<div class="col-md-8 col-xs-4"id="col">今日错题</div>
  						<div class="col-md-2 col-xs-4"style="display: none;">收藏夹</div>
  					</div>
	                <div class="wrong">
	                    <div class="falseHead">
							<a href="javascript:;"><button type="button" class="btn yes false-btn-for-data">查看资料</button></a>
  							<a href="javascript:;"><button type="button" class="btn yes false-btn-same-type" href="tongleicuoti.html">同类题型</button></a>
	                    </div>
	                    <br/>
	                    <div id="cQuestion" >
	                    <!--选择题-->
		                    <div class="homework-content false-homework-content">
                                    <p class="question-head">
                                             <span class="order">
                                                  1.
                                             </span>
                                        <!--问题-->
                                        下列各词组中加点字的读音，与所给的注音完全相同的一组是
                                    </p>
                                    <form action="" class="select" id="myForm">
				                        <div class="radio">
				                            <label>
				                                <input type="radio" name="questionSelect" class="questionSelect" value="A" /><span class="select-wrapper"></span>A.
				                                <span class="question-content"><span class="dot">着</span>陆 <span class="dot">着</span>落 <span class="dot">着</span>火 <span class="dot">着</span>急</span>
				                            </label>
				                        </div>
				                        <!--问题字符大小均为14px-->
				                        <div class="radio">
				                            <label>
				                                <input type="radio" name="questionSelect" class="questionSelect" value="B"/><span class="select-wrapper"></span>B.
				                                <span class="question-content">舟<span class="dot">楫</span> 逻<span class="dot">辑</span> 作<span class="dot">揖</span> <span class="dot">缉</span>拿</span>
				                            </label>
				
				                        </div><div class="radio">
				                            <label>
				                            <input type="radio" name="questionSelect"  class="questionSelect" value="C"/><span class="select-wrapper"></span>C.
				                            <span class="question-content">羡<span class="dot">慕</span> <span class="dot">募</span>捐 帷<span class="dot">幕</span> <span class="dot">墓</span>地</span>
				                            </label>
				                        </div>
				                        <div class="radio">
				                            <label>
				                                <input type="radio"  class="questionSelect" name="questionSelect" value="D"/><span class="select-wrapper"></span>D.
				                            <span class="question-content"><span class="dot">参</span>差 人<span class="dot">参</span> <span class="dot">参</span>加 <span class="dot">参</span>考</span>
				                            </label>
				                        </div>
				                    </form>
                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <div>你的答案：<span class="falseAnswer">A</span></div>
                                        <div>正确答案：<span class="correctAnswer">C</span></div>
                                    </div>
                                </div>
                                
			                                <!--简答题-->
			                <div class="homework-content">
			                    <p class="question-head">
			                        <span class="order">
			                            2.
			                        </span>
			                        <!--问题-->
			                        填空题：根据拼音填汉字。
			                    </p>
			                    <form action="" class="" id="">
			                        <span class="input-block">
			                        	<span class="input-wrap">收liǎn（<input type="text" class="input-single"maxlength="1"/>）</span>
			                        	<span class="input-wrap">mì（<input type="text" class="input-single"maxlength="1"/>）食</span>
			                        	<span class="input-wrap">dǐng（<input type="text" class="input-single"maxlength="1"/>）沸</span>
			                        	<span class="input-wrap">心有余jì（<input type="text" class="input-single"maxlength="1"/>）</span>
			                        </span>
			                    </form>
			                    
			                    <div class="line"></div>
			                	<div class="question-foot" style="margin-top: 5px;">
                                        <div>你的答案：<span class="falseAnswer">练 顶 嫉</span></div>
                                        <div>正确答案：<span class="correctAnswer">敛 鼎 悸</span></div>
                                </div>
			                </div>
			                
			               
			                
			                <div class="homework-content">
			                    <p class="question-head">
			                        <span class="order">
			                            3.
			                        </span>
			                        <!--问题-->
			                        多选题：下列出自姜夔的《暗香》的有：
			                    </p>
			                    
			                    <form action="" class="select" id="myForm">
			                        <div class="radio">
			                            <label>
			                                <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect" value="A" /><span class="select-wrapper"></span>A.
			                                <span class="question-content">人而全真,全不复有初矣</span>
			                            </label>
			                        </div>
			                        <!--问题字符大小均为14px-->
			                        <div class="radio">
			                            <label>
			                                <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect" value="B"/><span class="select-wrapper"></span>B.
			                                <span class="question-content">唤起玉人,不管清寒雨攀摘</span>
			                            </label>
			                            
			                        </div><div class="radio">
			                            <label>
			                            <input type="checkbox" name="questionMultiSelect"  class="questionMultiSelect" value="C"/><span class="select-wrapper"></span>C.
			                            <span class="question-content">镜里朱颜都变尽,只有丹心难灭</span>
			                            </label>
			                        </div>
			                        <div class="radio">
			                            <label>
			                                <input type="checkbox"  name="questionMultiSelect" class="questionMultiSelect" value="D"/><span class="select-wrapper"></span>D.
			                            <span class="question-content">叹寄与路遥,夜雪初积</span>
			                            </label>
			                        </div>
			                    </form>
			                    
			                    <div class="line"></div>
			                    <div class="question-foot">
                                        <div>你的答案：<span class="falseAnswer">A,B</span></div>
                                        <div>正确答案：<span class="correctAnswer">C,D</span></div>
                                </div>
			                </div>
			                
			                <div class="homework-content">
			                    <p class="question-head">
			                        <span class="order">
			                            4.
			                        </span>
			                        <!--问题-->
			                        	排序题：请给下列句子排序： 
			                        <div class="questionOrderContent">
			                        ①当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花。<br />②不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。<br />③从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养料。 <br />④虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。<br />⑤种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子。</div>
			                    </p>
			                    
			                    
			                    <div class="line"></div>
			                    <div class="question-foot">
			                    	<div>你的答案：
			                    		<span class="answer-users">1,2,3,4,5</span>
			                    	</div>

			                    	<div>正确答案：<span class="correctAnswer">2,5,3,1,4</span></div>
			                    </div>
			                </div>
			                
			                <div class="homework-content">
			                    <p class="question-head">
			                        <span class="order">
			                        5.
			                        </span>
			                        <!--问题-->
			                        	填空题：填空题：《朝花夕拾》原名《<span class="question-blank">空1</span>》,是鲁迅的回忆性散文集,请简介一下其中的一篇（课内学过的除外）的主要内容 ：<span class="question-blank">空2</span>with a machine.
			                    </p>
			                    
			                    <div class="line"></div>
			                    <div class="question-foot">
			                    	<span>你的答案：</span>
			                    	<span id=""class="questionBlankAnswerWrap">
			                    		<span class="answer-users">朝花惜拾</span>
			                    		<span class="answer-users">朝花惜拾</span>
			                    	</span>
			                    	<div>正确答案：<span class="correctAnswer">朝花惜拾</span></div>
			                    </div>
			                </div>
	                    </div>
	                </div>
	            </div>


  				<!--右侧栏-->
  				<div class="col-xs-12 left">
  					<div class="col-md-12 col-xs-12">
						<a href="javascript:;">通知</a>
						<span class="openNotice">3</span>
  					</div>
  					<div class="col-md-12 col-xs-12 next">
  					<ul class="nav nave">
						<li><a href="javascript:;">1.明天交语文作业</a></li>
						<li><a href="javascript:;">2.5.1放假通知</a></li>
						<li><a href="javascript:;">3.周五语文考试</a></li>
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
  		</div>
  		<div id="footf"></div>
  		<div id="footer"></div>
<!--模态框-->
<!--模态框1 答案框-->
<div class="modal fade" id="answerInput" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog answer-input-modal">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title text-center" id="myModalLabel">
               请输入你的答案
            </h4>
         </div>
         <div class="modal-body">
            <textarea name="" rows="" cols="" class="answer-input"></textarea>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn answer-save-permanent">保存
            </button>
            <button type="button" class="btn answer-save-temporary">
               暂存
            </button>
         </div>
      </div>
    </div>
</div>

<!--模态框2 拍照上传-->
<div class="modal fade" id="getPhoto" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog photo-upload-modal">
      <div class="modal-content photo-upload-content">
         <div class="modal-header photo-upload-modal-header">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <input type="button" value="上传图片" class="uploadPhotoWrap">
	        <input type="file" class="uploadPhoto" style="cursor: pointer;">
         </div>
         <div class="photo-center">
 			<div class="photo-center-1">1.请选择JPG图片</div>
 			<div class="photo-center-2">2.大小不超过1M</div>
         </div>
         <div class="modal-footer photo-footer">
            <button type="button" class="btn photo-save">完成</button>
            <button type="button" class="btn photo-cancel">取消</button>
         </div>
      </div>
    </div>
</div>


<script type="text/javascript">
	$(function(){
		$("#cQuestion form,input").prop("disabled","disabled")
	})
</script>
</body>
</html>
