<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
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
	@include('student.include.head')
</div>
  <div class="content">
  <div class="container">
  	@include('student.include.top_navbar')
  </div>
  	<div id="center">
  		<div class="container">
  			<div class="row">
  				<!--左侧栏-->
  				<div class="col-xs-12" id="left">
  					@include('student.include.left_navbar')
  				</div>
  				<!--内容-->
  				<div class="col-xs-12 col-sm-12" id="centery" style="height: 100%">
     				 <div class="row center1">
  						<div class="col-md-2 col-xs-4">
  							<a class="return-fyg" href="javascript:history.back(-1);"></a>
  						</div>
  						<div class="col-md-8 col-xs-4"id="col">语文</div>
  						<div class="col-md-2 col-xs-4"style="display: none;">收藏夹</div>
  					</div>

	                <div class="tab-content">
						<!--分页内容三开始-->
						<div class="tab-pane active" id="look-up-grade">
							<div class="team-grade-wrap">
			            		<span class="mate-grade-head">
			            			你的分数为
			            		</span>
			
			            		<div class="mate-grade-bg">
			            			<img class="img-responsive center-block" src="images/homework/subject/homework-grade.png"/>
			                		<span class="mate-grade center-block">
			                			60
			                		</span>
			            		</div>
			            		<div class="team-grade-teacher-evaluate">
			            			<span class="teacher-evaluate-head">教师评价为</span>
			            			<p class="teacher-evaluate center-block" style="background-color:#59C5BB;color: #FFF;">
			            				小明这个娃啊，还不错
			            			</p>
			            		</div>
			            		<div class="team-grade-mate-evaluate">
			            			<span class="mate-evaluate-head">组员评价为</span>
			            			<p class="mate-evaluate center-block" style="background-color:#59C5BB;color: #FFF;">
			            				小明这个娃啊，还不错
			            			</p>	
			        				<div class="other-evaluate-jump-arrow">
			        					<a href="" class="other-evaluate-jump-left"><img src="images/homework/homework-group/group-grade-left.png"/></a>
			        					<a href="" class="other-evaluate-jump-right"><img src="images/homework/homework-group/group-grade-right.png"/></a>
			        				</div>
			
			            		</div>
			            		<button class="team-grade-foot btn center-block"data-toggle="modal" data-target="#uploadEvulate">评价小组</button>
			                </div>
			            </div>
		           		<!--分页内容三结束-->
	                </div>
	                <!--分页内容隐藏在内-->
	            </div>

  				<!--右侧栏-->
  				<div class="col-xs-12 left">
  					@include('student.include.right_notice')
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
<div class="modal fade" id="group-leader-upload" tabindex="-1" role="dialog" 
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
	        <div class="modal-footer">
	            <button type="button" class="btn center-block yes"data-toggle="modal" data-target="#leader-submit-success">
	               提交
	            </button>
	        </div>
      	</div>
    </div>
</div>




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

<!--小组作业 提交报错--><!--这里和个人作业部分一致  若需改 连同激活id homework-group.css部分一些id class都要改-->
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
            	组员：<span class="group-member-list">1号 2号 3号 4号</span>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn center-block yes">
               确定
            </button>
         </div>
      </div>
    </div>
</div>

<!--小组作业 组长保存提示 模态框-->
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
<!--照片上传错误要打开的模态框，请把 data-toggle="modal" data-target="#leader-no-authority" 传入上面
	组长提交弹框的 button里面-->

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
<!--照片上传错误要打开的模态框，请把 data-toggle="modal" data-target="#wait-others-to-submit" 传入上面
	组长提交弹框的 button里面  -->


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
<!--照片上传错误要打开的模态框，请把 data-toggle="modal" data-target="#leader-submit-success" 传入上面
	组长提交弹框的 button里面  -->
<!--模态框-->
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
  	
  	
  	
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js" ></script>
<script src="js/homework-content.js" type="text/javascript" charset="utf-8"></script>
<script src="js/password.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>