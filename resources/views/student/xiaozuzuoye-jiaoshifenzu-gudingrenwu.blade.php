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
    <script src="js/password.js" type="text/javascript" charset="utf-8"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
	<script src="js/selectivizr.js"></script>
    <![endif]-->
    <style>
       
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
			<a href="../自媒体中心/media.html">学校首页</a>
			<div>
				<a href="../自媒体中心/relateToMe.html">@与我相关</a>
			</div>
		</li>
		<li><a href="zuoyenbenneirongliebiao.html" class="blue">学习中心</a></li>
		<li><a href="classSpace111.html">班级中心</a></li>
		<!--<li><a href="javascript:;">交易中心</a></li>-->
		<li class="affix"><a href="javascript:;"><img src="images/01.png"/></a></li>
		<li class="personCenter"><a href="javascript:;">个人中心</a>
			<div class="cent">
				<a href="synthesizeMark.html">分析中心</a>
				<a href="overTheYears_Report111.html">学习生活记录</a>
				<a href="personal_material-password111.html">个人信息</a>
			</div>
		</li>
		<li><a href="../登录页/index.html" class="blue">退出</a></li>
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
  			<li>语文</li>
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
  						
  						<li><a href="zuoyenbenneirongliebiao.html" class="box">作业本</a></li>
  						<!--<li><a href="#">学习分析</a></li>-->
  						<li><a href="ziliaoku-neirongliebiao.html">资料库</a></li>
  						<li><a href="xitice.html">习题册</a></li>
  						<li><a href="yuyuelaoshi.html">联系老师</a></li>
  						<li><a href="contact.html">联系人</a></li>
  						<li><a href="kechengjieshao.html">课程介绍</a></li>
  					</ul>
  				</div>
  				<!--内容-->
  				<div class="col-xs-12 col-sm-12" id="centery" style="height: 100%">
     				 <div class="row center1">
  						<div class="col-md-2 col-xs-4">
  							<a class="return-fyg" href="zuoyenbenneirongliebiao.html"></a>
  						</div>
  						<div class="col-md-8 col-xs-4"id="col">语文</div>
  						<div class="col-md-2 col-xs-4"style="display: none;">收藏夹</div>
  					</div>
  					
	  				<!--标签页-->
	  				
	  				<a class="inquire-grade text-center" href="xiaozuzuoye-chakanzhengji.html">查看成绩</a>
	  				
	                <div class="tab-content">
	                	<!--分页内容一开始-->
						<div class="tab-pane active" id="teacher-set-team">
						<!--<div class="tab-pane" id="free-set-team">222222222222</div>
						<div class="tab-pane" id="look-up-grade">3333333333333</div>-->
			                <!--作业内容-->
			                <div class="homework-content">
			                	<div class="group-members pointer"data-toggle="modal" data-target="#group-member">
			                		<img class="group-member" src="images/homework/homework-group/homework-group-more.png" alt="" />
			                	</div>
			                   <!--此处和个人作业里面完全一样  后期若需修改 需要连同CSS页面一些class一起修改-->
			                	<p class="question-head">
			                        <span class="order">
			                            1.
			                        </span>
			                        <!--问题-->
			                        总任务：对水资源的污染与自净化的研究，需要提交一份详细的调查报告。
			                    </p>
			                    <p class="question-son"style="margin-bottom: 0px;">
			                        子任务：
					                <div class="task-son">
						                <span class="task-detail-step">A.每个人选择小组</span><br />
						                <span class="task-detail-step">B.按照各自任务，进行资料收集</span><br />
						                <span class="task-detail-step">C.各组选出辩手</span><br />
						                <span class="task-detail-step">D.组长写活动总结</span><br />
				                    </div>
				                    <div class="line"></div>
				                    <div class="question-foot">
					                    <span>分值：</span><span class="task-score">100</span>
				               		</div>
			                    </p>
			                    <!--<form action="" class="select" id="myForm">
			                        <div class="radio">
			                            <label>
			                                <input type="radio" name="questionSelect" class="questionSelect" value="A" /><span class="select-wrapper"></span>A.
			                                <span class="question-content">开放广州、厦门、福州、宁波、上海五处为通商口岸</span>
			                            </label>
			                        </div>
			                       
			                        <div class="radio">
			                            <label>
			                                <input type="radio" name="questionSelect" class="questionSelect" value="B"/><span class="select-wrapper"></span>B.
			                                <span class="question-content">割香港岛给英国；赔款2100万元</span>
			                            </label>
			                            
			                        </div><div class="radio">
			                            <label>
			                            <input type="radio" name="questionSelect"  class="questionSelect" value="C"/><span class="select-wrapper"></span>C.
			                            <span class="question-content">外国公使可以进驻北京</span>
			                            </label>
			                        </div>
			                        <div class="radio">
			                            <label>
			                                <input type="radio"  class="questionSelect" name="questionSelect" value="D"/><span class="select-wrapper"></span>D.
			                            <span class="question-content">英商进出口货物缴纳的税款，中国须同英国商定</span>
			                            </label>
			                        </div>
			                    </form>-->
			                    <!--<div class="line"></div>-->
			                    <!--<div class="question-foot">
				                    <span>你的答案：</span><span id="answerOrder"></span>
				                    <span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>
			               		</div>-->
			                </div>
							<!--其他题-->
							<!--按钮-->
							<div class="homework-group-leader-save">
								<a href="xiaozuzuoye-gudingrenwu-zirenwu.html"><div class="btn yes group-leader-homework-save">做作业</div></a>		
								<div class="btn group-leader-homework-upload" data-toggle="modal" data-target="#group-leader-upload">组长提交</div>
							</div>
						</div>
						<!--分页内容一完毕-->
						
	                </div>
	                <!--分页内容隐藏在内-->
	            </div>

  				
  				
  				
  				
  				<!--右侧栏-->
  				<div class="col-xs-12 left">
  					<div class="col-md-12 col-xs-12">
						<a href="classNotice.html">通知</a>
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
<!--模态框 组长提交弹框-->
<div class="modal" id="group-leader-upload" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog leader-upload-dialog">
    	<div class="modal-content leader-upload-content">
	        <div class="modal-header">
	            <button type="button" class="close" 
	               data-dismiss="modal" aria-hidden="true">
	                  &times;
	            </button>
	            <h4 style="font-size: 16px;" class="modal-title text-center" id="myModalLabel">
	               提交作业
	            </h4>
	        </div>
	       	<div class="modal-body group-leader-upload-member">
	            <div class="row">
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">已完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">已完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">已完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">已完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle-no"></div>
		            		<span class="homework-statue">未完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle-no"></div>
		            		<span class="homework-statue">未完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle-no"></div>
		            		<span class="homework-statue">未完成</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2" >
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle-no"></div>
		            		<span class="homework-statue">未完成</span>
		            	</div>
	    			</div>
				</div>
	        </div>    
	        <!--data-toggle="modal" data-target="#leader-submit-success"-->
	        <div class="modal-footer">
	            <button type="button" class="homework-submmit btn center-block yes">
	               提交
	            </button>
	        </div>
      	</div>
    </div>
</div>


<div class="engage-status">
	<div class="engage-status-icon good-circle text-center">
		<img src="images/homework/homework-group/!.png" alt="" />
	</div>
    <span class="engage-success-text">提交成功！</span>
</div>
<script type="text/javascript">
	$(function(){
		$(".homework-submmit").click(function(){
			$(".engage-status").fadeIn().delay(800).fadeOut();
		})
	})
</script>
<!--模态框 提交评价-->

<div class="modal fade" id="uploadEvulate" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog  currency-modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title text-center" id="myModalLabel">
               评价组员
            </h4>
         </div>
         <div class="modal-body">
            <textarea name="" rows="" cols="" class="evulate-input"></textarea>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn evulate-parterner center-block">发表
            </button>
         </div>
      </div>
    </div>
</div>

<!--小组作业 提交报错-->
<!--
<div class="modal fade" id="uploadFault" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog upload-fault-modal">
      <div class="modal-content upload-fault">
         <div class="modal-header text-center upload-fault-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <span class="upload-fault-header">报错</span>
         </div>
         <div class="modal-body">
            <div class="upload-fault-content" style="font-size: 14px;">
            	<form action="">
            		错误类型：<label class="pointer">
            			<input type="checkbox" name="upload-fault-checkbox" class="upload-fault-checkbox" />
            			<span style="vertical-align: middle;"></span><span class="upload-fault-span1">题干错误</span>
            		</label>
            		<label class="pointer">
            			<input type="checkbox" name="upload-fault-checkbox"  class="upload-fault-checkbox" />
            			<span style="vertical-align: middle;"></span><span class="upload-fault-span2">选项错误</span>
            		</label>
            	</form>
            
	            <div class="upload-fault-wrapper">
	            	<span>错误详情：</span>
	            	<div class="upload-fault-detail">
	            		<textarea name="" rows="" cols="" class="upload-fault-input"></textarea>
	            	</div>
	            </div>
            </div>
         </div>
         <div class="modal-footer upload-fault-footer">
            <button type="button" class="btn yes upload-fault-save center-block">保存
            </button>
         </div>
      </div>
    </div>
</div>

<!--模态框 组员弹框-->

<div class="modal fade" id="group-member" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog group-member-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 style="font-size: 16px;" class="modal-title text-center" id="myModalLabel">
               查看小组成员
            </h4>
         </div>
         <div class="modal-body group-member-box">
            <div>
            	组长：<span class="group-first">组长</span></br>
            	组员：<span class="group-member-list">王珍 李煜 孙彬 周青云</span>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn center-block yes"data-dismiss="modal" >
               确定
            </button>
         </div>
      </div>
    </div>
</div>

<!--小组作业 组长保存提示 模态框-->
<!--
<div class="modal fade leader-save-modal" id="tips-of-save" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content tips-of-save">
         <div class="modal-body tips-of-save-wrap">
        	<div class="good-circle text-center">
        		<img src="images/homework/homework-group/good.png" alt="" />
        	</div>
            <span class="i-have-saved">已保存，请等待组长提交</span>
         </div>
      </div>
    </div>
</div>



<!--组长提交作业无权限 模态框-->

<!--
<div class="btn btn-info btn-lg" data-toggle="modal" data-target="#leader-no-authority">组长提交无权限演示</div>

<div class="modal fade leader-save-modal" id="leader-no-authority" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content tips-of-save">
         <div class="modal-body tips-of-save-wrap-no-authority">
        	<div class="danger-circle text-center">
        		<img src="images/homework/homework-group/!.png" alt="" />
        	</div>
            <span class="i-cant-saved">没有该权限！</span>
         </div>
      </div>
    </div>
</div>
<!--等待所有组员完成后提交 模态框-->
<!--
<div class="btn btn-info btn-lg" data-toggle="modal" data-target="#wait-others-to-submit">组长提交失败演示</div>

<div class="modal fade leader-save-modal" id="wait-others-to-submit" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content tips-of-save">
         <div class="modal-body tips-of-save-wrap-fail">
        	<div class="danger-circle-submit-fail text-center">
        		<img src="images/homework/homework-group/!.png" alt="" />
        	</div>
            <span class="i-cant-saved">等待所有组员完成后提交</span>
         </div>
      </div>
    </div>
</div>

<!--提交成功 模态框-->

<!--
<div class="modal fade" id="leader-submit-success" tabindex="-1">
   <div class="modal-dialog leader-submit-success-modal">
      <div class="modal-content tips-of-save leader-submit-success-content">
         <div class="modal-body tips-of-save-wrap-fail">
        	<div class="good-circle text-center">
        		<img src="images/homework/homework-group/!.png" alt="" />
        	</div>
            <span class="i-cant-saved">已提交，等待老师批阅</span>
         </div>
      </div>
    </div>
</div>
<!--模态框结束--> 		

 
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           