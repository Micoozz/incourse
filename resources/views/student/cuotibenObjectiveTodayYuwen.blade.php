<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/sCSS/homework-2.css"/>
    <link rel="stylesheet" type="text/css" href="css/sCSS/homework.css"/>
    <link rel="stylesheet" type="text/css" href="css/sCSS/homework-style.css"/>
    <style>
        /********** 连线题 ***********/
        .box_hpb{
            margin:0;
            padding:0;
            width:472px;
            margin:21px auto;
        }
        .box_hpb * {
            margin:0;
            padding:0;
        }
        .box_hpb ul, .box_hpb ol {
            list-style:none;
            width: 104px;
        }
        .line_hpb{
            width:472px;
            position:relative;
        }
        .line_hpb:after{
            content:"";
            clear:both;
            display:table;
        }
        .question_hpb, .container_hpb {
            float:left;
        }
        .question_hpb>li, .answer_hpb>li{
            margin-bottom:14px;
            border:1px solid #ccc;
            position: absolute;
        }
        .question_hpb>li>div, .answer_hpb>li>div {
            width:104px;
            min-height:40px;
            line-height: 38px;
            padding: 0 5px;
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            background-color: #fff;
        }
        .question_hpb>li>span, .answer_hpb>li>span {
            position: absolute;
            top: 9px;
            color: #777;
        }
        .question_hpb>li>span {
            left: -15px;
        }
        .answer_hpb>li>span {
            right: -15px;
        }
        .box_hpb .active {
            white-space: normal;
            padding: 9px 5px;
            line-height: 20px;
        }
        .question_hpb>li:last-child,  .answer_hpb>li:last-child{
            margin-bottom:0;
        }
        .container_hpb{
            width:300px;
            position:relative;
        }
        .container_hpb>canvas{
            position:absolute;
            top:0;
            left:0;
        }
        #canvas1{
            z-index:10;
        }
        #canvas2{
            z-index:50;
        }
        .answer_hpb{
            position:absolute;
            right:0;
            top:0;
            z-index:70;
        }
        .btn_hpb{
            margin-top:10px;
        }
        .btn_hpb>button{
            padding:2px 20px 2px 2px;
            border-radius: 2px;
            color:#168bee;
            float: right;
            background: url(images/homework/subject/cancel.png) no-repeat right center;
            border:none;
        }

        /* 连线题 */
        .homework-content .lianXianTi-padding {
            padding-left: 50px;
        }
    </style>
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
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div class="col-md-2 col-xs-4">
                            <a class="return-fyg pointer" onclick="window.history.go(-1);"></a>
                        </div>
                        <div class="col-md-8 col-xs-4" id="col">客观题</div>
                        <div class="col-md-2 col-xs-4"></div>
                    </div>
                    <div class="wrong">
                        <div class="falseHead">
                            <a href="javascript:;">
                                <button type="button" class="btn yes false-btn-for-data">查看资料</button>
                            </a>
                            <a href="javascript:;">
                                <button type="button" class="btn yes false-btn-same-type" href="tongleicuoti.html">同类题型</button>
                            </a>
                        </div>
                        <br/>
                        <div id="cQuestion">
                        <!--
                            <div class="homework-content">
                                <p class="question-head">
                                             <span class="order">
                                                  1.
                                             </span>
                                    下列各词组中加点字的读音，与所给的注音完全相同的一组是
                                </p>
                                <form action="" class="select" id="myForm">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="questionSelect" class="questionSelect" value="A"/><span
                                                    class="select-wrapper"></span>A.
                                            <span class="question-content"><span class="dot">着</span>陆 <span
                                                        class="dot">着</span>落 <span class="dot">着</span>火 <span
                                                        class="dot">着</span>急</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="questionSelect" class="questionSelect" value="B"/><span
                                                    class="select-wrapper"></span>B.
                                            <span class="question-content">舟<span class="dot">楫</span> 逻<span
                                                        class="dot">辑</span> 作<span class="dot">揖</span> <span
                                                        class="dot">缉</span>拿</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="questionSelect" class="questionSelect" value="C"/><span
                                                    class="select-wrapper"></span>C.
                                            <span class="question-content">羡<span class="dot">慕</span> <span
                                                        class="dot">募</span>捐 帷<span class="dot">幕</span> <span
                                                        class="dot">墓</span>地</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" class="questionSelect" name="questionSelect" value="D"/><span
                                                    class="select-wrapper"></span>D.
                                            <span class="question-content"><span class="dot">参</span>差 人<span
                                                        class="dot">参</span> <span class="dot">参</span>加 <span
                                                        class="dot">参</span>考</span>
                                        </label>
                                    </div>
                                </form>
                                <div class="line"></div>
                                <div class="question-foot">
                                    <div>你的答案：<span class="falseAnswer">A</span></div>
                                    <div>正确答案：<span class="correctAnswer">C</span></div>
                                </div>
                            </div>
                            <div class="homework-content">
                                <p class="question-head">
			                        <span class="order">
			                            2.
			                        </span>
                                    填空题：根据拼音填汉字。
                                </p>
                                <form>
			                        <span class="input-block">
			                        	<span class="input-wrap">收liǎn（<input type="text" class="input-single"
                                                                              maxlength="1"/>）</span>
			                        	<span class="input-wrap">mì（<input type="text" class="input-single"
                                                                           maxlength="1"/>）食</span>
			                        	<span class="input-wrap">dǐng（<input type="text" class="input-single"
                                                                             maxlength="1"/>）沸</span>
			                        	<span class="input-wrap">心有余jì（<input type="text" class="input-single"
                                                                              maxlength="1"/>）</span>
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
                                    判断题：1 + 1 = 3。
                                </p>
                                <div class="line"></div>
                                <div class="question-foot" style="margin-top: 5px;">
                                    <div>你的答案：<span class="falseAnswer">错</span></div>
                                    <div>正确答案：<span class="correctAnswer">对</span></div>
                                </div>
                            </div>
                            <div class="homework-content">
                                <p class="question-head">
			                        <span class="order">
			                            4.
			                        </span>
                                    多选题：下列出自姜夔的《暗香》的有：
                                </p>
                                <form action="" class="select" id="myForm">
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect"
                                                   class="questionMultiSelect" value="A"/><span
                                                    class="select-wrapper"></span>A.
                                            <span class="question-content">人而全真,全不复有初矣</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect"
                                                   class="questionMultiSelect" value="B"/><span
                                                    class="select-wrapper"></span>B.
                                            <span class="question-content">唤起玉人,不管清寒雨攀摘</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect"
                                                   class="questionMultiSelect" value="C"/><span
                                                    class="select-wrapper"></span>C.
                                            <span class="question-content">镜里朱颜都变尽,只有丹心难灭</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect"
                                                   class="questionMultiSelect" value="D"/><span
                                                    class="select-wrapper"></span>D.
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
			                            5.
			                        </span>
                                    排序题：请给下列句子排序：
                                <div class="questionOrderContent">
                                    ①当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花。<br/>②不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。<br/>③从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养料。
                                    <br/>④虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。<br/>⑤种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子。
                                </div>
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
			                        6.
			                        </span>
                                    填空题：《朝花夕拾》原名《<span class="question-blank">空1</span>》,是鲁迅的回忆性散文集,请简介一下其中的一篇（课内学过的除外）的主要内容
                                    ：<span class="question-blank">空2</span>with a machine.
                                </p>
                                <div class="line"></div>
                                <div class="question-foot">
                                    <span>你的答案：</span>
                                    <span id="" class="questionBlankAnswerWrap">
			                    		<span class="answer-users">朝花惜拾</span>
			                    		<span class="answer-users">朝花惜拾</span>
			                    	</span>
                                    <div>正确答案：<span class="correctAnswer">朝花惜拾</span></div>
                                </div>
                            </div>
                            <div class="homework-content">
                                <p class="question-head">
                                    <span class="order">
                                        7.
                                    </span>
                                    连线题：下列连线。
                                </p>
                                <div class="box_hpb">
                                    <div class="line_hpb">
                                        <ul class="question_hpb">
                                            <li style="top:0;">
                                                <span>1</span>
                                                <div>湖广会馆放到奋斗奋斗方法</div>
                                            </li>
                                            <li style="top:54px;">
                                                <span>2</span>
                                                <div>大妈</div>
                                            </li>
                                            <li style="top:108px;">
                                                <span>3</span>
                                                <div>大嫂</div>
                                            </li>
                                            <li style="top:162px;">
                                                <span>4</span>
                                                <div>哥哥</div>
                                            </li>
                                            <li style="top:216px;">
                                                <span>1</span>
                                                <div>大姨</div>
                                            </li>
                                        </ul>
                                        <div class="container_hpb">
                                            <canvas id="canvas1" width="368">您的浏览器暂不支持Canvas！</canvas>
                                            <canvas id="canvas2" width="368">您的浏览器暂不支持Canvas！</canvas>
                                        </div>
                                        <ul class="answer_hpb">
                                            <li style="top:0;">
                                                <span>1</span>
                                                <div>哥哥</div>
                                            </li>
                                            <li style="top:54px;">
                                                <span>2</span>
                                                <div>大姨</div>
                                            </li>
                                            <li style="top:108px;">
                                                <span>3</span>
                                                <div>大妈</div>
                                            </li>
                                            <li style="top:162px;">
                                                <span>4</span>
                                                <div>大爷</div>
                                            </li>
                                            <li style="top:216px;">
                                                <span>5</span>
                                                <div>大嫂</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="question-foot" style="margin-top: 5px;">
                                    <div>你的答案：<span class="falseAnswer">1:3, 2:1, 3:2</span></div>
                                    <div>正确答案：<span class="correctAnswer">1:1, 2:2, 3:3</span></div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">请输入你的答案</h4>
            </div>
            <div class="modal-body">
                <textarea name="" rows="" cols="" class="answer-input"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn answer-save-permanent">保存</button>
                <button type="button" class="btn answer-save-temporary">暂存</button>
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

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="js/sJS/homework-content.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sJS/fenye.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sJS/password.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sJS/inCourse.js"></script>
<script src="js/sJS/cuotibenObjectiveTodayYuwen.js"></script>

<script type="text/javascript">
    $(function () {
        $("#cQuestion form,input").prop("disabled", "disabled")
    })
</script>
</body>
</html>
