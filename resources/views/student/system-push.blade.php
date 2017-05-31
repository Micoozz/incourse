<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/homework.css"/>
    <link rel="stylesheet" href="css/classActivity.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/selectivizr.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar">
     @incloud('student.head');
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
  				<div class="col-xs-12 col-sm-12" id="centery">
     				 <div class="row center1">
  						<div class="col-md-2 col-xs-4">
  							<a class="return-fyg" href="/zuoyenbenneirongliebiao"></a>
  						</div>
  						<div class="col-md-8 col-xs-4"id="col">9月1日作业</div>
  						<div class="col-md-2 col-xs-4"style="display: none;">收藏夹</div>
  					</div>
  					<div class="homework-content">
	                    <p class="question-head">
	                        <span class="order">
	                            1.
	                        </span>
	                        <!--问题-->
	                        初等函数在其定义域内（）
	                    </p>

                    <form action="" class="select" id="myForm">
                        <div class="radio">
                            <label>
                                <input type="radio" name="questionSelect" class="questionSelect" value="A" /><span class="select-wrapper"></span>A.
                                <span class="question-content">可积不一定可微</span>
                            </label>
                        </div>
                        <!--问题字符大小均为14px-->
                        <div class="radio">
                            <label>
                                <input type="radio" name="questionSelect" class="questionSelect" value="B"/><span class="select-wrapper"></span>B.
                                <span class="question-content">可微但到函数不一定连续</span>
                            </label>

                        </div><div class="radio">
                            <label>
                            <input type="radio" name="questionSelect"  class="questionSelect" value="C"/><span class="select-wrapper"></span>C.
                            <span class="question-content">任意阶可微</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio"  class="questionSelect" name="questionSelect" value="D"/><span class="select-wrapper"></span>D.
                            <span class="question-content">以上均不对</span>
                            </label>
                        </div>
                    </form>
                    <div class="line"></div>
                    <div class="question-foot">
                    	<span>你的答案：</span><span id="answerOrder"></span><span class="col-line"></span>
                    	<a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt="" />
                    	<span class="search-wiki-span">查看资料</span></a>
                   		<span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>
                    </div>
                </div>
            <!--简答题-->
                <div class="homework-content">
                    <p class="question-head">
                        <span class="order">
                            2.
                        </span>
                        <!--问题-->
                        简答题：简述马克思主义中国化的科学内涵。
                    </p>
                    <div class="line"></div>
                    <div class="question-foot">
                        <a class="q-block-trigger hover-blue" href="javascript:void 0;"  >点击输入答案</a>
                        <span class="answer-photo">
	                    	<a href="#"  data-toggle="modal" data-target="#getPhoto">
	                            <img src="images/homework/subject/photo.png" />
	                            <span class="photo hover-blue">拍照上传</span>
	                        </a>
                        </span>
                        <span class="col-line"></span>
                        <a href="ziliaoku-xiangxineirong.html" class="search-wiki"><img src="images/homework/subject/link.png" alt="" />
                        查看资料</a>
                        <span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>

                    </div>
                </div>


                <div class="homework-content">
                    <p class="question-head">
                        <span class="order">
                            3.
                        </span>
                        <!--问题-->
                        多空题：I made my coat <span class="question-blank">空1</span> my own hands.It was madehand not<span class="question-blank">空2</span>with a machine.
                    </p>

                    <form action="" class="select" id="myForm">
                        <div class="radio">
                            <label>
                                <input type="radio" name="questionMultiBlankSelect" class="questionMultiBlankSelect" value="A" /><span class="select-wrapper"></span>A.
                                <span class="question-content">in，with</span>
                            </label>
                        </div>
                        <!--问题字符大小均为14px-->
                        <div class="radio">
                            <label>
                                <input type="radio" name="questionMultiBlankSelect" class="questionMultiBlankSelect" value="B"/><span class="select-wrapper"></span>B.
                                <span class="question-content">with，in</span>
                            </label>

                        </div><div class="radio">
                            <label>
                            <input type="radio" name="questionMultiBlankSelect"  class="questionMultiBlankSelect" value="C"/><span class="select-wrapper"></span>C.
                            <span class="question-content">in，in</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="questionMultiBlankSelect" class="questionMultiBlankSelect"  value="D"/><span class="select-wrapper"></span>D.
                            <span class="question-content">with，with</span>
                            </label>
                        </div>
                    </form>

                    <div class="line"></div>
                    <div class="question-foot">
                    	<span>你的答案：</span><span id="answerOrder"></span><span class="col-line"></span>
                    	<a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt="" />
                    	<span class="search-wiki-span">查看资料</span></a>
                   		<span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>
                    </div>
                </div>



                <div class="homework-content">
                    <p class="question-head">
                        <span class="order">
                            4.
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
                    	<span>你的答案：</span><span id="answerOrder"></span><span class="col-line"></span>
                    	<a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt="" />
                    	<span class="search-wiki-span">查看资料</span></a>
                   		<span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>
                    </div>
                </div>

                <div class="homework-content">
                    <p class="question-head">
                        <span class="order">
                            5.
                        </span>
                        <!--问题-->
                        	排序题：请给下列句子排序：
                        <div class="questionOrderContent">
                        ①当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花。<br />②不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。<br />③从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养料。 <br />④虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。<br />⑤种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子。</div>
                    </p>


                    <div class="line"></div>
                    <div class="question-foot">
                    	<span>你的答案：</span>
                    	<span id=""class="questionOrderAnswerWrap">
                    		<input type="text" class="questionOrderAnswer" placeholder="答案①">
                    		<input type="text" class="questionOrderAnswer" placeholder="答案②">
                    		<input type="text" class="questionOrderAnswer" placeholder="答案③">
                    		<input type="text" class="questionOrderAnswer" placeholder="答案④">
                    		<input type="text" class="questionOrderAnswer" placeholder="答案⑤">
                    	</span>
                    	<span class="col-line"></span>
                    	<a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt="" />
                    	<span class="search-wiki-span">查看资料</span></a>
                   		<span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>
                    </div>
                </div>

                <div class="homework-content">
                    <p class="question-head">
                        <span class="order">
                        6.
                        </span>
                        <!--问题-->
                        	填空题：填空题：《朝花夕拾》原名《<span class="question-blank">空1</span>》,是鲁迅的回忆性散文集,请简介一下其中的一篇（课内学过的除外）的主要内容 ：<span class="question-blank">空2</span>with a machine.
                    </p>

                    <div class="line"></div>
                    <div class="question-foot">
                    	<span>你的答案：</span>
                    	<span id=""class="questionBlankAnswerWrap">
                    		<input type="textarea" class="questionBlankAnswer" placeholder="答案①">
                    		<input type="textarea" class="questionBlankAnswer" placeholder="答案②">
                    	</span>

                    	<span class="col-line"></span>
                    	<a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt="" />
                    	<span class="search-wiki-span">查看资料</span></a>
                   		<span class="question-fault" data-toggle="modal" data-target="#uploadFault">报错</span>
                    </div>
                </div>


                <div class="btn yes center-block"style="margin-top: 20px;margin-bottom: 40px;">提交</div>
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

<div id="f-modal"></div>
<!--答案框-->
<div class="answerInput" id="answerInput">
	<button type="button" class="answerInput-close close"
           data-dismiss="modal" aria-hidden="true">
              &times;
    </button>
    <h4 class="text-center" id="myModalLabel">
       请输入你的答案
    </h4>
	<div>
		<script id="container" name="content" type="text/plain"></script>
        <script type="text/javascript" src="ueditor.config.js"></script>
        <script type="text/javascript" src="ueditor.all.js"></script>
	    <script type="text/javascript">
	        var ue = UE.getEditor('container');
		</script>
	    <script src="kityformula-plugin/addKityFormulaDialog.js"></script>
		<script src="kityformula-plugin/defaultFilterFix.js"></script>
		<script src="kityformula-plugin/getKfContent.js"></script>
	    
	</div>

     <div class="modal-footer">
        <button type="button" class="btn answer-save-permanent">保存
        </button>
        <button type="button" class="btn answer-save-temporary">
           暂存
        </button>
     </div>


</div>

<!--data-toggle="modal" data-target="#answerInput"
	<div class="modal fade" id="answerInput" tabindex="-1" role="dialog">
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
         	<script id="container" name="content" type="text/plain"></script>
            <script type="text/javascript" src="ueditor.config.js"></script>
            <script type="text/javascript" src="ueditor.all.js"></script>
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
</div>-->

<!--模态框2 拍照上传-->
<div class="modal fade" id="getPhoto" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog photo-upload-modal">
      <div class="modal-content photo-upload-content"style="font-size: 14px">
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

<!--模态框4 提交报错-->
<div class="modal fade" id="uploadFault" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog answer-input-modal">
      <div class="modal-content upload-fault"style="font-size: 14px">
         <div class="modal-header text-center upload-fault-header">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <span class="upload-fault-header">报错</span>
         </div>
         <div class="modal-body">
            <div class="upload-fault-content">
            	<form action="">
            		错误类型：<label class="pointer">
            			<input type="checkbox" name="upload-fault-checkbox" class="upload-fault-checkbox" />
            			<span style="vertical-align: middle;"></span><span class="upload-fault-span">题干错误</span>
            		</label>
            		<label class="pointer">
            			<input type="checkbox" name="upload-fault-checkbox"  class="upload-fault-checkbox" />
            			<span style="vertical-align: middle;"></span><span class="upload-fault-span">选项错误</span>
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
            <button type="button" class="btn upload-fault-save center-block">保存
            </button>
         </div>
      </div>
    </div>
</div>


<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js" ></script>
<script src="js/homework-content.js" type="text/javascript" charset="utf-8"></script>
<script src="js/password.js" type="text/javascript" charset="utf-8"></script>
<script src="js/f-modal.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
