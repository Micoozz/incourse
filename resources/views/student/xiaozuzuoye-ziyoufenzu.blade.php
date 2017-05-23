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
						<div class="" id="free-set-team">
							<!--作业内容-->
			                <div class="homework-content">
			                	<a href="xiaozuzuoye-ziyoufenzu-xuanzerenwu.html"class="task-wrap">
				                	<p class="task-head">
				                        <span class="task-head-order">1.</span>
				                        	周四举行辩论赛
				                    </p>
				                    <p class="task-detail">
				                    	关于“愚公移山”你怎么看？
				                    </p>
				                </a>
			                    <div class="line"></div>
			                    <div class="question-foot">
				                    <span>分值：</span><span class="task-score">100</span>   
			                    </div>
			                </div>
			                	
			               
							<div class="homework-group-leader-save">
								<div class="btn yes group-leader-homework-save" data-toggle="modal" data-target="#askfor-leader-success">申请组长</div>		
								<div class="btn group-leader-homework-upload" data-toggle="modal" data-target="#select-team">加入</div>
							</div>
						
							
						</div>
						
						
	                </div>
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
		
<!--申请组长提交  模态框-->
<div class="modal fade" id="askfor-leader-success" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content tips-of-save">
         <div class="modal-body tips-of-save-wrap ask-for-leader-success">
        	<div class="good-circle text-center">
        		<img src="images/homework/homework-group/good.png" alt="" />
        	</div>
            <p class="i-have-saved">已提交成功！</p>
         </div>
      </div>
    </div>
</div>
<!--模态框 组长提交弹框-->
<div class="modal fade" id="select-team" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog leader-upload-dialog">
    	<div class="modal-content leader-upload-content">
	        <div class="modal-header">
	            <button type="button" class="close" 
	               data-dismiss="modal" aria-hidden="true">
	                  &times;
	            </button>
	            <h4 style="font-size: 16px;" class="modal-title text-center" id="myModalLabel">
	               加入小组
	            </h4>
	        </div>
	       	<div class="modal-body group-leader-upload-member">
	            <div class="row" style="font-size: 14px;">
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
		            	
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
						<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
	    			<div class="leader-upload-wrap center-block text-center col-lg-2 col-md-2 col-sm-2 col-xs-2 select-group">
		            	<span class="leader-upload-name">王小明</span>
		            	<img src="images/02.gif" alt="" class="center-block leader-upload-img img-responsive" />
		            	<div class="leader-upload-foot">
		            		<div class="homework-statue-circle"></div>
		            		<span class="homework-statue">10/10</span>
		            	</div>
	    			</div>
				</div>
	        </div>    
	        <div class="modal-footer">
	            <button type="button" class="btn center-block yes" data-dismiss="modal">
	               提交
	            </button>
	        </div>
      	</div>
    </div>
</div>

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
<script type="text/javascript">
	$(function(){
		$(".select-group").click(function(){
			$(this).css("color","#168BEE")
			.siblings().css("color","#000000")
//			if ($(this).hasClass(".select-group-selected")) {
//				$(this).removeClass(".select-group-selected");
//			} else{
//				$(this).addClass(".select-group-selected").css("color","red");
//				
//			}
		});
		
})
</script>

</body>
</html>