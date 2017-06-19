<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
    content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/sCSS/homework.css"/>
    <link rel="stylesheet" href="css/sCSS/classActivity.css">
    <link rel="stylesheet" type="text/css" href="css/sCSS/homework-style.css"/>
    <style>
        /********** 连线题 ***********/
        .box_hpb{
            margin:0;
            padding:0;
            width:400px;
            margin:10px auto;
        }
        .box_hpb * {
            margin:0;
            padding:0;
        }
        .box_hpb ul, .box_hpb ol {
            list-style:none;
        }
        .line_hpb{
            width:352px;
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
            position: relative;
            width:50px;
            height:30px;
            margin-bottom:10px;
            border-width:1px;
            border-style:solid;
            border-color:#ccc;
            word-wrap: break-word;
            word-break: normal;
            overflow: hidden;
        }
        .question_hpb>li>span, .answer_hpb>li>span{
            position: absolute;
            left: -12px;
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
            z-index:100;
        }
        #canvas2{
            z-index:200;
        }
        .answer_hpb{
            position:absolute;
            right:0;
            top:0;
            z-index:300;
        }
        .btn_hpb{
            margin-top:10px;
        }
        .btn_hpb>button{
            padding:2px;
            border-radius: 2px;
            border:1px solid #ccc;
        }
        .btn_hpb>button:hover{
            background-color:#168bee;
            color:#fff;
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
                                <a class="return-fyg" href="/zuoyenbenneirongliebiao"></a>
                            </div>
                            <div class="col-md-8 col-xs-4" id="col">语文</div>
                            <div class="col-md-2 col-xs-4" style="display: none;">收藏夹</div>
                        </div>
                        <div class="exercise-box"> 
                            <div class="homework-content" data-type="单选题" data-id="1">
                                <p class="question-head">
                                    <span class="order">1.</span>
                                    单选题：下列词语中的加点字读音完全相同的一组是（）
                                </p>
                                <form class="select" id="myForm">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="questionSelect" class="questionSelect" value="A"/><span
                                            class="select-wrapper"></span>A.
                                            <span class="question-content"><span class="dot">着</span>陆 <span
                                            class="dot">着</span>落 <span class="dot">着</span>火 <span
                                            class="dot">着</span>急</span>
                                        </label>
                                    </div>
                                    <!--问题字符大小均为14px-->
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
                                    <span>你的答案：</span>
                                    <span class="answerOrder"></span>
                                    <span class="col-line"></span>
                                    <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>
                                        <span class="search-wiki-span">查看资料</span></a>
                                        <span class="question-fault">报错</span>
                                    </div>
                                </div>
                                <div class="homework-content" data-type="填空题" data-id="2">
                                    <p class="question-head">
                                        <span class="order">2.</span>
                                        填空题：根据拼音填汉字。
                                    </p>
                                    <form>
                                     <span class="input-block">
                                      <span class="input-wrap">收liǎn（<input type="text" class="input-single" maxlength="1"/>）</span>
                                      <span class="input-wrap">mì（<input type="text" class="input-single"
                                       maxlength="1"/>）食</span>
                                       <span class="input-wrap">dǐng（<input type="text" class="input-single" maxlength="1"/>）沸</span>
                                       <span class="input-wrap">心有余jì（<input type="text" class="input-single" maxlength="1"/>）</span>
                                   </span>
                               </form>
                               <div class="line"></div>
                               <div class="question-foot">
                                <span>你的答案：</span><span id="answerOrder"></span><span class="col-line"></span>
                                <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                    alt=""/>
                                    <span class="search-wiki-span">查看资料</span></a>
                                    <span class="question-fault">报错</span>
                                </div>
                            </div>
                            <div class="homework-content" data-type="多选题" data-id="3">
                                <p class="question-head">
                                    <span class="order">3.</span>
                                    多选题：下列出自姜夔的《暗香》的有：
                                </p>
                                <form class="select" id="myForm">
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect"
                                            value="A"/><span class="select-wrapper"></span>A.
                                            <span class="question-content">人而全真,全不复有初矣</span>
                                        </label>
                                    </div>
                                    <!--问题字符大小均为14px-->
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect"
                                            value="B"/><span class="select-wrapper"></span>B.
                                            <span class="question-content">唤起玉人,不管清寒雨攀摘</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect"
                                            value="C"/><span class="select-wrapper"></span>C.
                                            <span class="question-content">镜里朱颜都变尽,只有丹心难灭</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect"
                                            value="D"/><span class="select-wrapper"></span>D.
                                            <span class="question-content">叹寄与路遥,夜雪初积</span>
                                        </label>
                                    </div>
                                </form>
                                <div class="line"></div>
                                <div class="question-foot">
                                    <span>你的答案：</span>
                                    <span class="answerOrder"></span>
                                    <span class="col-line"></span>
                                    <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>
                                        <span class="search-wiki-span">查看资料</span></a>
                                        <span class="question-fault">报错</span>
                                    </div>
                                </div>
                                <div class="homework-content" data-type="排序题" data-id="4">
                                    <p class="question-head">
                                        <span class="order">4.</span>
                                        <!--问题-->
                                        排序题：请给下列句子排序：
                                        <div class="questionOrderContent">
                                            ①当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花。<br/>②不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。<br/>③从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养料。
                                            <br/>④虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。<br/>⑤种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子。
                                        </div>
                                    </p>
                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <span>你的答案：</span>
                                        <span id="" class="questionOrderAnswerWrap">
                                           <input type="text" class="questionOrderAnswer" placeholder="答案①" maxlength="1">
                                           <input type="text" class="questionOrderAnswer" placeholder="答案②" maxlength="1">
                                           <input type="text" class="questionOrderAnswer" placeholder="答案③" maxlength="1">
                                           <input type="text" class="questionOrderAnswer" placeholder="答案④" maxlength="1">
                                           <input type="text" class="questionOrderAnswer" placeholder="答案⑤" maxlength="1">
                                       </span>
                                       <span class="col-line"></span>
                                       <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>
                                        <span class="search-wiki-span">查看资料</span></a>
                                        <span class="question-fault">报错</span>
                                    </div>
                                </div>
                                <div class="homework-content" data-type="填空题" data-id="5">
                                    <p class="question-head">
                                        <span class="order">5.</span>
                                        填空题：《朝花夕拾》原名《<span class="question-blank">空1</span>》,是鲁迅的回忆性散文集,请简介一下其中的一篇（课内学过的除外）的主要内容
                                        ：<span class="question-blank">空2</span>with a machine.
                                    </p>
                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <span>你的答案：</span>
                                        <span id="" class="questionBlankAnswerWrap">
                                           <input type="textarea" class="questionBlankAnswer" placeholder="答案①">
                                           <input type="textarea" class="questionBlankAnswer" placeholder="答案②">
                                       </span>
                                       <span class="col-line"></span>
                                       <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>
                                        <span class="search-wiki-span">查看资料</span></a>
                                        <span class="question-fault">报错</span>
                                    </div>
                                </div>
                                <div class="homework-content" data-type="作文题" data-id="6">
                                    <p class="question-head">
                                        <span class="order">6.</span>
                                        <!--问题-->
                                        作文题：
                                        亲爱的同学，现在你正坐在考场中进行着语文学科的考试，相信你经过小学六年的努力，一定会交出一份满意的答卷。其实，我们学习中、工作中、生活中……无不经历着一次次的“考试”，倘若能交出一份份满意的“答卷”，那么，在行进的路上，我们会走的更欢畅，更坚实。
                                        请以“一份满意的答卷”为题目，写一篇不少于600字的文章。立意自定，文体自选。文中不得出现你所在的学校名称，以及教职员工，同学和本人的真实姓名。
                                    </p>
                                    <div class="line"></div>
                                    <div class="question-foot">
                                        <a class="q-block-trigger hover-blue" href="javascript:void 0;">点击输入答案</a>
                                        <p class="d-n composition-answer"></p>
                                        <span class="answer-photo">
                                           <a href="#" data-toggle="modal" data-target="#getPhoto">
                                              <img src="images/homework/subject/photo.png" style="position: relative;top: -2px;"/>
                                              <span class="photo hover-blue">拍照上传</span>
                                          </a>
                                      </span>
                                      <span class="col-line"></span>
                                      <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>查看资料</a>
                                        <span class="question-fault">报错</span>
                                    </div>
                                    
                                    <!--作文题答案框-->
                                    <div id="answerInput" class="answerInput">
                                        <button type="button" class="answerInput-close close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <input class="title" type="text" placeholder="请输入作文题目">
                                        <textarea id="composition" class="composition" placeholder="请输入作文正文..."></textarea>
                                        <div class="modal-footer">
                                            <p class="words">
                                                <span>0</span> 字
                                            </p>
                                            <button id="posi-save" type="button" class="btn answer-save-permanent">保存</button>
                                        </div>
                                    </div>

                                    <!--模态框2 拍照上传-->
                                    <div class="modal fade" id="getPhoto" data-backdrop="static" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog photo-upload-modal">
                                        <div class="modal-content photo-upload-content" style="font-size: 14px">
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
                                            <button type="button" class="btn photo-save" data-dismiss="modal">完成</button>
                                            <button id="photo-cancel" type="button" class="btn photo-cancel">取消</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="homework-content" data-type="简答题" data-id="7">
                        	<p class="question-head">
                                <span class="order">7.</span>简答题：先有鸡还是先有蛋？
                            </p>
                            <div class="line"></div>
                            <div class="question-foot">
                                <a class="hover-blue jianDaTi" href="javascript:;" data-num="7">点击输入答案</a>
                                <p class="d-n jianDaTi-answer7"></p>
                                <span class="col-line"></span>
                                <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>查看资料</a>
                               <span class="question-fault">报错</span>
                            </div>
                        </div>
                        <div class="homework-content" data-type="连线题" data-id="8">
                            <p class="question-head">
                                <span class="order">8.</span>连线题：
                            </p>
                            <div class="box_hpb">
    <div class="line_hpb">
        <ul class="question_hpb">
            <li><span>1</span>湖广会馆放到</li>
            <li><span>2</span>大妈</li>
            <li><span>3</span>大嫂</li>
            <li><span>4</span>哥哥</li>
            <li><span>5</span>大姨</li>
        </ul>
        <div class="container_hpb">
            <canvas id="canvas1" width="300">您的浏览器暂不支持Canvas！</canvas>
            <canvas id="canvas2" width="300">您的浏览器暂不支持Canvas！</canvas>
        </div>
        <ul class="answer_hpb">
            <li><span>1</span>哥哥</li>
            <li><span>2</span>大姨</li>
            <li><span>3</span>大妈</li>
            <li><span>4</span>大爷</li>
            <li><span>5</span>大嫂</li>
        </ul>
    </div>
    <div class="btn_hpb">
        <button class="reset_hpb">重置</button>
        <button class="return_hpb">回退</button>
    </div>
</div>
                            <div class="line"></div>
                            <div class="question-foot">
                                <span>你的答案：</span>
                                <span class="lxt-answer"></span>
                                <span class="col-line"></span>
                                <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>查看资料</a>
                               <span class="question-fault">报错</span>
                            </div>
                        </div>
                    </div>
                    <!--简答题答案模态框框-->
                    <div class="answerInput jianDaTi-modal">
                        <button id="jianDaTi-close" type="button" class="close" aria-hidden="true">
                                            &times;
                        </button>
                        <textarea class="composition jianDaTi-txar" placeholder="请输入简答题答案..."></textarea>
                        <div class="modal-footer">
                            <button id="jianDaTi-save" type="button" class="btn answer-save-permanent">保存</button>
                        </div>
                    </div>
                    <div id="submit-btn" class="btn yes center-block" style="margin-top: 20px;margin-bottom: 40px;">提交</div>
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
    <!--弹出框-->
    <div id="f-modal"></div>
    <div id="footf"></div>
    <div id="footer"></div>
    <div class="Bomb">
        <div>
            <div>学习预警</div>
        </div>
        <div class="f_close">
            <img class="pointer" src="images/homework/subject/close.png"/>
        </div>
        <div class="Bomb_1">
            <ol>
                <li>
                    <a href="#">5月27日的语文课后作业中，古诗文填空部分正确率较低。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">5月30日的英语课后作业中，有较多的语法单选题出现较大问题，请细心一点。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">6月1日的语文课后作业中，作文题目分数较低，请加强日常积累。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">6月2日的数学课后作业中，有较多的选择题正确率较低，请注意巩固基本知识点。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">6月3日的物理课后作业中，有较多的题目花费时间较长，请加强计算能力。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">6月6日的政治课后作业中，有较多的题目得分较低，请注意培养答题思路。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">6月9日的数学课后作业中，有较多的题目花费时间较长，可能基础知识掌握不牢固。</a>
                    <span>查看</span>
                </li>
                <li>
                    <a href="#">7月4日的语文课后作业中，有较多的题目出现较大问题，需要巩固相关内容知识点。</a>
                    <span>查看</span>
                </li>
            </ol>
        </div>
        <ul>
            <li class="fi"></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!--学习警示内容只有在当日作业错误过多时候会出现 进行提示-->
    <div class="opca"></div>
    <div class='Bomb1'>
        <div>
            <div>学习预警
                <img src="images/Cj_17.jpg">
            </div>
        </div>
        <div class="Bomb_1">
            <h4>报告内容</h4>
            <ul>
                <li>耗时约3h(全班约2h)</li>
                <li>本次分数为70分(全班约90分)</li>
                <li>错误率竟达到50%</li>
                <li>对比上次作业情况</li>
            </ul>
        </div>
        <div class="Bomb_1 Bomb_2">
            <h4>解决方案</h4>
            <ul>
                <li>本次作业所涉及的知识点掌握的不够牢固，请尽快查明原因</li>
                <li>根据历史分数情况判断，作业完成质量正在下滑，请及时与老师沟通</li>
            </ul>
        </div>
        <div>
            <a href="/today_homework">查看当前作业</a>
            <a href="/system-push" target="_blank">查看系统推送题</a>
        </div>
    </div>

    <!--模态框4 提交报错-->
    <div class="modal fade" id="uploadFault" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog answer-input-modal">
        <div class="modal-content upload-fault" style="font-size: 14px">
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
                    <input type="checkbox" name="upload-fault-checkbox" class="upload-fault-checkbox"/>
                    <span style="vertical-align: middle;"></span><span class="upload-fault-span">题干错误</span>
                </label>
                <label class="pointer">
                    <input type="checkbox" name="upload-fault-checkbox" class="upload-fault-checkbox"/>
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
<script type="text/javascript" src="js/index.js"></script>
<script src="js/sJS/homework-content.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sJS/classActivity.js"></script>
<script src="js/sJS/password.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sJS/f-modal.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sJS/zuoyeben-index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
