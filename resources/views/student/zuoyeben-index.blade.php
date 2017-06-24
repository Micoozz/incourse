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
    <link rel="stylesheet" href="css/incourseReset.css">
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
        .box_hpb .active-common {
            background-color: #D8EAFF;
            border-color:  #A4CEFF;
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

        /* 选择题 */
        .question-foot label{
            margin-right: 5px;
            font-weight: normal;
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
                                <a class="return-fyg" href="/zuoyenbenneirongliebiao"></a>
                            </div>
                            <div class="col-md-8 col-xs-4" id="col">语文</div>
                            <div class="col-md-2 col-xs-4"></div>
                        </div>
                        <div class="exercise-box">
                        <!--
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
                                          <span class="input-wrap">收liǎn（）</span>
                                          <span class="input-wrap">mì（）食</span>
                                             <span class="input-wrap">dǐng（）沸</span>
                                             <span class="input-wrap">心有余jì（）</span>
                                         </span>
                                     </form>
                                     <div class="line"></div>
                                     <div class="question-foot">
                                                <span>你的答案：</span>
                                                <span class="questionOrderAnswerWrap">
                                                 <input type="textarea" class="questionBlankAnswer" placeholder="答案①">
                                                 <input type="textarea" class="questionBlankAnswer" placeholder="答案②">
                                                 <input type="textarea" class="questionBlankAnswer" placeholder="答案③">
                                                 <input type="textarea" class="questionBlankAnswer" placeholder="答案④">
                                             </span>
                                             <span class="col-line"></span>
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                                alt=""/>
                                                <span class="search-wiki-span">查看资料</span></a>
                                                <span class="question-fault">报错</span>
                                            </div>
                                    </div>
                                    <div class="homework-content" data-type="判断题" data-id="3">
                                    <p class="question-head">
                                        <span class="order">3.</span>
                                        判断题：1+1 = 3。
                                    </p>
                                     <div class="line"></div>
                                     <div class="question-foot">
                                                <span>你的答案：</span>
                                                <span class="right-or-wrong">
                                                    <label>对
                                                        <input class="choose-input" type="radio" name="chooseTi" value="1">
                                                    </label>
                                                    <label>错
                                                        <input class="choose-input" type="radio" name="chooseTi" value="0">
                                                    </label>
                                                </span>
                                             <span class="col-line"></span>
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                                alt=""/>
                                                <span class="search-wiki-span">查看资料</span></a>
                                                <span class="question-fault">报错</span>
                                            </div>
                                    </div>
                                    <div class="homework-content" data-type="多选题" data-id="4">
                                        <p class="question-head">
                                            <span class="order">4.</span>
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
                                        <div class="homework-content" data-type="排序题" data-id="5">
                                            <p class="question-head">
                                                <span class="order">5.</span>
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
                                        <div class="homework-content" data-type="填空题" data-id="6">
                                            <p class="question-head">
                                                <span class="order">6.</span>
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
                                        <div class="homework-content" data-type="多空题" data-id="7">
                                            <p class="question-head">
                                                <span class="order">7.</span>
                                                多空题：今天《<span class="question-blank">空1</span>》,小明在<span class="question-blank">空2</span>吃饭。
                                            </p>
                                            <div class="line"></div>
                                            <div class="question-foot">
                                                <span>你的答案：</span>
                                                <span class="questionBlankAnswerWrap">
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
                            <div class="homework-content" data-type="简答题" data-id="8">
                               <p class="question-head">
                                <span class="order">8.</span>简答题：先有鸡还是先有蛋？
                            </p>
                            <div class="line"></div>
                            <div class="question-foot">
                                <a class="hover-blue jianDaTi" href="javascript:;">点击输入答案</a>
                                <span class="col-line"></span>
                                <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                    alt=""/>查看资料</a>
                                    <span class="question-fault">报错</span>
                                </div>
                            </div>
                            <div class="homework-content" data-type="连线题" data-id="9">
                                <p class="question-head">
                                    <span class="order">9.</span>连线题：
                                </p>
                                <div class="box_hpb">
                                    <div class="line_hpb">
                                        <ul class="question_hpb">
                                            <li style="top:0;">湖广会馆放到奋斗奋斗方法</li>
                                            <li style="top:54px;">大妈</li>
                                            <li style="top:108px;">大嫂</li>
                                            <li style="top:162px;">哥哥</li>
                                            <li style="top:216px;">大姨</li>
                                        </ul>
                                        <div class="container_hpb">
                                            <canvas id="canvas1" width="368">您的浏览器暂不支持Canvas！</canvas>
                                            <canvas id="canvas2" width="368">您的浏览器暂不支持Canvas！</canvas>
                                        </div>
                                        <ul class="answer_hpb">
                                            <li style="top:0;">哥哥</li>
                                            <li style="top:54px;">大姨</li>
                                            <li style="top:108px;">大妈</li>
                                            <li style="top:162px;">大爷</li>
                                            <li style="top:216px;">大嫂</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btn_hpb clear">
                                        <button class="return_hpb">撤销</button>
                                </div>
                                <div class="line"></div>
                                <div class="question-foot lianXianTi-padding">
                                    <span class="col-line"></span>
                                    <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                        alt=""/>查看资料</a>
                                        <span class="question-fault">报错</span>
                                    </div>
                                </div>
                                <div class="homework-content" data-type="作文题" data-id="10">
                                            <p class="question-head">
                                                <span class="order">10.</span>
                                                作文题：
                                                亲爱的同学，现在你正坐在考场中进行着语文学科的考试，相信你经过小学六年的努力，一定会交出一份满意的答卷。其实，我们学习中、工作中、生活中……无不经历着一次次的“考试”，倘若能交出一份份满意的“答卷”，那么，在行进的路上，我们会走的更欢畅，更坚实。
                                                请以“一份满意的答卷”为题目，写一篇不少于600字的文章。立意自定，文体自选。文中不得出现你所在的学校名称，以及教职员工，同学和本人的真实姓名。
                                            </p>
                                            <div class="line"></div>
                                            <div class="question-foot">
                                                <a class="q-block-trigger hover-blue zuoWenTi" href="javascript:;">点击输入答案</a>
                                                <p class="d-n composition-answer"></p>
                                                <span class="answer-photo">
                                                 <a id="takePhoto" href="javascript:;" data-toggle="modal" data-target="#getPhoto">
                                                  <img src="images/homework/subject/photo.png" style="position: relative;top:-2px;"/>
                                                  <span class="photo hover-blue">拍照上传</span>
                                              </a>
                                          </span>
                                          <span class="col-line"></span>
                                          <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png"
                                            alt=""/>查看资料</a>
                                            <span class="question-fault">报错</span>
                                </div>
                            </div>
                            结束 -->
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
                            <!-- 作文题答案框 -->
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

                                        <!-- -模态框2 拍照上传- -->
                                        <div class="modal fade" id="getPhoto" data-backdrop="static" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog photo-upload-modal">
                                            <div class="modal-content photo-upload-content" style="font-size: 14px">
                                                <div class="modal-header photo-upload-modal-header">
                                                    <button type="button" class="close close-photo-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
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
<script src="js/sJS/inCourse.js"></script>
<!-- <script src="js/sJS/zuoyeben-index.js" type="text/javascript" charset="utf-8"></script> -->
<script>
    
$(function(){
    //点亮顶部导航和左侧导航栏对应项
    $(".head_nav>li:nth-child(2)>a, .head_nav>li:last-child>a").addClass("blue");
    $("#nav1>li:first-child>a").addClass("box");
    var course = sessionStorage.getItem("inCourse-course");
    if(course) {
        $("#col").text(course);
    }
    $("#cent_nav ul>li").each(function(){
        if($(this).text() === course) {
            $("#cent_nav ul>li").removeClass("offt");
            $(this).addClass("offt");
        }
    });


    var id = sessionStorage.getItem("homeworkId"); //保存是作业几
    var current = 0;  //保存当前题号
    var lxt_options = 0;  //保存连线题的对数
    var comp_photo = {};  //保存作文的照片
    var obj = {};   //保存所有题的答案

    /********* 显示题目列表 ********/
    $.ajax({
        type: "GET",
        url: "showWorkDetail/" + id,
        async: false,
        success: function(data){
        var data = JSON.parse(data);
        console.log(data)
        var html = "";  //保存整个题目列表
        var n = 0;   //保存填空题空格的个数
        var px_index = ["①","②","③","④","⑤","⑥","⑦","⑧","⑨","⑩"];   //排序题序号

        data.forEach(function(item,i){
            if(item.cate_title === "单选题") {
                var dx_options = "";
                item.options.forEach(function(item){
                    var key_name = "";
                    for(var key in item) {
                        key_name = key;
                    }
                    dx_options += '<div class="radio">\
                                        <label>\
                                            <input type="radio" name="questionSelect" class="questionSelect" value="' + key_name + '"/>\
                                            <span class="select-wrapper"></span>' + key_name + '.\
                                            <span class="question-content">' + item[key_name] + '</span>\
                                        </label>\
                                    </div>';
                });
                
                html += '<div class="homework-content" data-type="单选题" data-id="' + item.id+ '">\
                                <p class="question-head">\
                                    <span class="order">' + (i+1) + '.</span>\
                                    单选题：' + item.subject + '\
                                </p>\
                                <form class="select" id="myForm">' + dx_options + '</form>\
                                <div class="line"></div>\
                                <div class="question-foot">\
                                    <span>你的答案：</span>\
                                    <span class="answerOrder"></span>\
                                    <span class="col-line"></span>\
                                    <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                        <span class="search-wiki-span">查看资料</span></a>\
                                        <span class="question-fault">报错</span>\
                                    </div>\
                                </div>';
            }else if(item.cate_title === "填空题") {
                var tk_obj = tkChange(item.subject);
                var tk_answerInput = "";
                for(var j=0; j<tk_obj.n; j++) {
                    tk_answerInput += '<input type="textarea" class="questionBlankAnswer" placeholder="答案' + (j+1) + '">'
                }
                
                html += '<div class="homework-content" data-type="填空题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>\
                                                填空题：' + tk_obj.data + '\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span class="questionBlankAnswerWrap">' + tk_answerInput + '</span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "多空题") {
                var dk_obj = tkChange(item.subject);
                var dk_answerInput = "";
                for(var k=0; k<dk_obj.n; k++) {
                    dk_answerInput += '<input type="textarea" class="questionBlankAnswer" placeholder="答案' + (k+1) + '">'
                }
                html += '<div class="homework-content" data-type="多空题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>\
                                                多空题：' + dk_obj.data + '\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span class="questionBlankAnswerWrap">' + dk_answerInput + '</span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "多选题") {
                var dux_options = "";
                item.options.forEach(function(item){
                    var key_name = "";
                    for(var key in item) {
                        key_name = key;
                    }
                    dux_options += '<div class="radio">\
                                                <label>\
                                                    <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect" value="' + key_name + '"/>\
                                                    <span class="select-wrapper"></span>' + key_name + '.\
                                                    <span class="question-content">' + item[key_name] + '</span>\
                                                </label>\
                                            </div>';
                });

                html += '<div class="homework-content" data-type="多选题" data-id="' + item.id+ '">\
                                        <p class="question-head">\
                                            <span class="order">' + (i+1) + '.</span>\
                                            多选题：' + item.subject + '\
                                        </p>\
                                        <form class="select" id="myForm">' + dux_options + '</form>\
                                        <div class="line"></div>\
                                        <div class="question-foot">\
                                            <span>你的答案：</span>\
                                            <span class="answerOrder"></span>\
                                            <span class="col-line"></span>\
                                            <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "判断题") {
                html += '<div class="homework-content" data-type="判断题" data-id="' + item.id+ '">\
                                    <p class="question-head">\
                                        <span class="order">' + (i+1) + '.</span>\
                                        判断题：' + item.subject + '\
                                    </p>\
                                     <div class="line"></div>\
                                     <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span class="right-or-wrong">\
                                                    <label>对\
                                                        <input class="choose-input" type="radio" name="chooseTi" value="1">\
                                                    </label>\
                                                    <label>错\
                                                        <input class="choose-input" type="radio" name="chooseTi" value="0">\
                                                    </label>\
                                                </span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                    </div>';
            }else if(item.cate_title === "排序题") {
                var px_options = "";
                var px_answerInput = "";
                item.options.forEach(function(k,i){
                    px_options += px_index[i] + k[i+1] + (i === item.options.length-1 ? "" : "<br/>");
                    px_answerInput += '<input type="text" class="questionOrderAnswer" placeholder="答案' + (i+1) + '" maxlength="1">';
                });

                html += '<div class="homework-content" data-type="排序题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>排序题：' + item.subject + '\
                                                <div class="questionOrderContent">' + px_options + '</div>\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span class="questionOrderAnswerWrap">' + px_answerInput + '</span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "连线题") {
                lxt_options = item.options.length;
                var lxt_left = "";
                var lxt_right = "";
                const Height = 54;
                item.options.forEach(function(k,i){
                    for(var key in k) {
                        lxt_left += '<li style="top:' + 54*i + 'px;"><span>' + (i+1) + '</span><div>' + k[key] + '</div></li>';
                    }
                });
                item.answer.forEach(function(k,i){
                    lxt_right += '<li style="top:' + 54*i + 'px;"><span>' + (i+1) + '</span><div>' + k + '</div></li>';
                });

                html += '<div class="homework-content" data-type="连线题" data-id="' + item.id+ '">\
                                <p class="question-head">\
                                    <span class="order">' + (i+1) + '.</span>连线题：\
                                </p>\
                                <div class="box_hpb">\
                                    <div class="line_hpb">\
                                        <ul class="question_hpb">' + lxt_left + '</ul>\
                                        <div class="container_hpb">\
                                            <canvas id="canvas1" width="368">您的浏览器暂不支持Canvas！</canvas>\
                                            <canvas id="canvas2" width="368">您的浏览器暂不支持Canvas！</canvas>\
                                        </div>\
                                        <ul class="answer_hpb">' + lxt_right + '</ul>\
                                    </div>\
                                </div>\
                                <div class="btn_hpb clear">\
                                        <button class="return_hpb">撤销</button>\
                                </div>\
                                <div class="line"></div>\
                                <div class="question-foot lianXianTi-padding">\
                                    <span class="col-line"></span>\
                                    <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>查看资料</a>\
                                        <span class="question-fault">报错</span>\
                                    </div>\
                                </div>';
            }else if(item.cate_title === "简答题") {
                html += '<div class="homework-content" data-type="简答题" data-id="' + item.id+ '">\
                               <p class="question-head">\
                                <span class="order">' + (i+1) + '.</span>简答题：' + item.subject + '\
                            </p>\
                            <div class="line"></div>\
                            <div class="question-foot">\
                                <a class="hover-blue jianDaTi jianDaTi' + item.id + '" href="javascript:;">点击输入答案</a>\
                                <span class="col-line"></span>\
                                <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>查看资料</a>\
                                    <span class="question-fault">报错</span>\
                                </div>\
                            </div>';
            }else if(item.cate_title === "综合题") {
                html += '';
            }else if(item.cate_title === "作文题") {
                html += '<div class="homework-content" data-type="作文题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>作文题：' + item.subject + '\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <a class="q-block-trigger hover-blue zuoWenTi" href="javascript:;">点击输入答案</a>\
                                                <p class="d-n composition-answer"></p>\
                                                <span class="answer-photo">\
                                                 <a href="#" data-toggle="modal" data-target="#getPhoto">\
                                                  <img src="images/homework/subject/photo.png" style="position: relative;top:-2px;"/>\
                                                  <span class="photo hover-blue">拍照上传</span>\
                                              </a>\
                                          </span>\
                                          <span class="col-line"></span>\
                                          <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>查看资料</a>\
                                            <span class="question-fault">报错</span>\
                                </div>';
            }
        });

        $(".exercise-box").html(html);
    }
    });
    
    //控制排序题只能输入数字
    $(".questionOrderAnswerWrap .questionOrderAnswer").keyup(function(){
        if(!(/\d{1}/.test($(this).val()))) {
            $(this).val('');
        }
    });

    lianXianTiFunc(lxt_options);
    jianDaTiFunc();
    compositionFunc();

    //提交作业
    $("#submit-btn").click(function(){
        $(".homework-content").each(function(i,item){
            var type = $(item).attr("data-type");
            var id = $(item).attr("data-id");
            if(type === "单选题") {
                var dxt_answer = $(this).find(".answerOrder").text();
                obj[id] = AchangeTo65(dxt_answer);
            }else if(type === "填空题") {
                var tk_arr = [];
                $(this).find(".questionBlankAnswer").each(function(i,item){
                    tk_arr.push($(item).val());
                });
                obj[id] = tk_arr.join(",");
            }else if(type === "多空题") {
                var dk_arr = [];
                $(this).find(".questionBlankAnswer").each(function(i,item){
                    dk_arr.push($(item).val());
                });
                obj[id] = dk_arr.join(",");
            }else if(type === "多选题") {
                var dx_arr = $(this).find(".answerOrder").text().split(",");
                var dx_num_arr = [];
                dx_arr.forEach(function(a){
                    dx_num_arr.push(AchangeTo65(a));
                });
                obj[id] = dx_num_arr.join(",");
            }else if(type === "判断题") {
                var pdt = $(this).find(".choose-input:checked").val();
                obj[id] = pdt ? pdt : "";
            }else if(type === "排序题") {
                var px_arr = [];
                $(this).find(".questionOrderAnswer").each(function(i,item){
                    px_arr.push($(item).val());
                });
                obj[id] = px_arr.join(",");
            }
        });

        var param = {
            '_token':'{{csrf_token()}}',
            "work_id": id,
            "data": obj
        } 
        console.log(obj)
        $.post("subWork",param).success(function(data){
           if(data === "200") {
                window.location.href='/danrenzuoye-chengji';
           }
        });
    });

function AchangeTo65(a) {
    if(a) {
        return a.charCodeAt() - 64 + "";
    }
    return "";
}

/********** 简答题 *********/
function jianDaTiFunc(){
    $(".exercise-box").on("click",".jianDaTi",function(){
        current = $(this).parents(".homework-content").attr("data-id");
        var msg = obj[current];
        if(msg) {
            $(".jianDaTi-txar").val(msg);
        }
        $("#f-modal,.jianDaTi-modal").fadeIn();
    });
    $("#jianDaTi-close").click(function(){
        $("#f-modal, .jianDaTi-modal").fadeOut();
    });

    //保存
    $("#jianDaTi-save").click(function(){
        obj[current] = $(".jianDaTi-txar").val();
        console.log(Boolean(obj[current]))
        $("#f-modal, .jianDaTi-modal").fadeOut();
        $(".jianDaTi" + current).text(obj[current] ? "编辑答案" : "点击输入答案");
    });
}

/********** 作文题 *********/
function compositionFunc(){
    //var zwt_answer = {};   作文题答案
    //var comp = {};    作文题照片暂存
    var comp = "";    //作文题照片暂存

    $(".exercise-box").on("click",".zuoWenTi",function(){
        current = $(this).parents(".homework-content").attr("data-id");
        var comp_text = obj[current];
        var ifPhoto_reg = /^data:image\/jpeg;base64/; 
        if(comp_text && !ifPhoto_reg.test(comp_text)) {
            // $(".answerInput .title").val(comp_text.title);
            // $("#composition").val(comp_text.content);
            var index = comp_text.indexOf("\n");
            $(".answerInput .title").val(comp_text.slice(0,index));
            $("#composition").val(comp_text.slice(index + 2));
        }else {
            $(".answerInput .title").val("");
            $("#composition").val("");
            $("#answerInput .words>span").text("0");
        }

        $("#f-modal, #answerInput").fadeIn();
    });
    
    $(".exercise-box").on("click","#takePhoto",function(){
        current = $(this).parents(".homework-content").attr("data-id");
        if(comp_photo[current]) {
            $(".photo-upload-content .photo-center").html("<img src='" + comp_photo[current] + "'/>");
        }else {
            $(".photo-upload-content .photo-center").html('<div class="photo-center-1">1.请选择JPG图片</div><div class="photo-center-2">2.大小不超过1M</div>');
        }
    });

    //保存作文
    $("#posi-save").on("click",function(){
        // zwt_answer.title = $(".answerInput .title").val();
        // zwt_answer.content = $("#composition").val();
        // obj[current] = zwt_answer;
        obj[current] = $(".answerInput .title").val() + "\n" + $("#composition").val();
        alert("保存成功！");
    });

    //作文上传照片
    // -------- 将以base64的图片url数据转换为Blob --------
    function convertBase64UrlToBlob(urlData, filetype){
        //去掉url的头，并转换为byte
        var bytes = window.atob(urlData.split(',')[1]);
        
        //处理异常,将ascii码小于0的转换为大于0
        var ab = new ArrayBuffer(bytes.length);
        var ia = new Uint8Array(ab);
        var i;
        for (i = 0; i < bytes.length; i++) {
            ia[i] = bytes.charCodeAt(i);
        }
        return new Blob([ab], {type : filetype});
    }
    
    //safari5.0.4不支持FileReader和file.files.item(0).getAsDataURL方法
    $('.photo-upload-modal-header .uploadPhoto').change(function(){
        var input = $(this)[0];
        var files = input.files || [];
        if (files.length === 0) {
            return;
        }
        if (!input['value'].match(/.jpg|.png|.bmp/i)) {   //判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择");
        }
        var file = files[0];
        var filename = file.name || '';
        var fileType = file.type || '';
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
            var base64 = e.target.result || this.result;
            var formData = new FormData();
            formData.append("upload_file", convertBase64UrlToBlob(base64, fileType), filename);
            var img = "<img src='" + this.result + "'/>";
            // comp.photo = this.result;
            // comp.result = formData;
            comp = this.result;
            console.log(formData);
            $(".photo-upload-content .photo-center").html(img);
        };
    });

    //点击“完成”
    $(".photo-save").click(function(){
        // comp_photo[current] = comp.photo;
        // zwt_answer.photo = comp.result;
        obj[current] = comp;
    });

    //取消上传照片
    $("#photo-cancel").click(function(){
        // comp = {};
        comp = "";
        $(".photo-upload-content .photo-center").html('<div class="photo-center-1">1.请选择JPG图片</div><div class="photo-center-2">2.大小不超过1M</div>');
        // if(obj[current] &&　obj[current].photo) {
        //     obj[current].photo = "";
        // }
    });

    //统计作文字数
    $("#composition").keyup(function(){
        const txt = $("#composition").val().replace(/\s/g,'');
        const len = txt.length;
        $("#answerInput .words>span").text(len);
    });

    //关闭作文模态框
    $(".answerInput-close").click(function(){
        $("#answerInput, #f-modal").fadeOut();
    });
}


/********** 连线题 *********/
    function lianXianTiFunc(n){
        //动态生成对应LI的数据
        var dist={
            liHeight:38, //保存每个LI的高度
            borderWidth:1,  //保存每个LI的边框宽度
            marginBottom:14, //保存每个LI的下外边距
            y1:0,   //保存第一个LI的y坐标
            D:0,     //保存每个LI y坐标之间相差的距离
            canvasW:368,  //保存canvas的宽度
            canvasH:0,   //保存canvas的高度
            question:[],    //保存问题的坐标数据
            answer:[]       //保存答案的坐标数据
        }

        dist.y1=dist.borderWidth+dist.liHeight/2;
        dist.D=dist.liHeight+2*dist.borderWidth+dist.marginBottom;
        trends();
        //动态设置Canvas高度和生成数据
        function trends(){
            dist.canvasH = (dist.liHeight + 2*dist.borderWidth + dist.marginBottom) * n - dist.marginBottom;
            $(".question_hpb, .answer_hpb").height(dist.canvasH);
            $(".container_hpb>canvas").attr("height",dist.canvasH);
            dist.question=[];
            dist.answer=[];
            for(var i=0; i<$(".question_hpb>li").length; i++){
                dist.question.push({"x":0,"y":dist.y1+i*dist.D,"can":"yes"});
                dist.answer.push({"x":dist.canvasW-$(".answer_hpb>li>div").width()-2,"y":dist.y1+i*dist.D,"can":"yes"});
            }
        }
        if(!$("#canvas1")[0]) {
            return;
        }
        var ctx1=$("#canvas1")[0].getContext("2d");
        var ctx2=$("#canvas2")[0].getContext("2d");
        var pos={
            x1:0,    //保存起始的X坐标
            y1:0,     //保存起始的Y坐标
            x2:0,    //保存结束的X坐标
            y2:0,    //保存结束的Y坐标
            start:0, //保存起始的选项序号
            canDraw:false,   //保存画布上能不能画出线条
            COLOR:"orange" //保存画笔的颜色
        }
        var exist=[];   //保存已经用过的坐标点以便回退时用
        //鼠标开始点击的时候获取起始坐标
        $(".question_hpb").on("click","li",function() {
            current = $(this).parents(".homework-content").attr("data-id");
            var n = $(".question_hpb>li").index(this);
            if (dist.question[n].can === "yes") {
                pos.start = n;
                pos.canDraw = true;
                pos.x1 = dist.question[n].x;
                pos.y1 = dist.question[n].y;
            }
        });
        //字数超过6个的LI被hover时的效果
        $(".question_hpb>li>div, .answer_hpb>li>div").hover(function(){
            if($(this).text().length >= 6) {
                $(this).addClass("active");
            }
            $(this).addClass("active-common");
        },function(){
            $(this).removeClass("active");
            $(this).removeClass("active-common");
        });

        //鼠标在画布上移动时显示实时画线
        $("#canvas2").mousemove(function(){
            if(pos.canDraw){
                ctx2.strokeStyle=pos.COLOR;
                ctx2.clearRect(0,0,dist.canvasW,dist.canvasH);
                var mouseX=event.offsetX;
                var mouseY=event.offsetY;
                ctx2.beginPath();
                ctx2.moveTo(pos.x1,pos.y1);
                ctx2.lineTo(mouseX,mouseY);
                ctx2.stroke();
                ctx2.closePath();
            }
        });
        $(".answer_hpb").mousemove(function(){
            if(pos.canDraw){
                ctx2.strokeStyle=pos.COLOR;
                ctx2.clearRect(0,0,dist.canvasW,dist.canvasH);
                var mouseX=event.pageX-$("#canvas2").offset().left;
                var mouseY=event.pageY-$("#canvas2").offset().top;
                ctx2.beginPath();
                ctx2.moveTo(pos.x1,pos.y1);
                ctx2.lineTo(mouseX,mouseY);
                ctx2.stroke();
                ctx2.closePath();
            }
        });
        //用户点击答案触发的事件
        $(".answer_hpb").on("click","li",function(){
            var n=$(".answer_hpb>li").index(this);
            if((pos.canDraw===true) && (dist.answer[n].can==="yes")){
                ctx1.strokeStyle=pos.COLOR;
                pos.x2=dist.answer[n].x;
                pos.y2=dist.answer[n].y;
                ctx2.clearRect(0,0,dist.canvasW,dist.canvasH);
                ctx1.beginPath();
                ctx1.moveTo(pos.x1,pos.y1);
                ctx1.lineTo(pos.x2,pos.y2);
                ctx1.stroke();
                ctx1.closePath();
                dist.question[pos.start].can="no";
                dist.answer[n].can="no";
                exist.push({"start":pos.start,"end":n});
                pos.canDraw=false;
            }
            changeToAnswer(exist);
        });
        //撤销
        $(".return_hpb").click(function(){
            event.preventDefault();
            if(exist.length !== 0){
                ctx1.clearRect(0,0,dist.canvasW,dist.canvasH);
                var del=exist.pop();
                dist.question[del.start].can="yes";
                dist.answer[del.end].can="yes";
                ctx1.beginPath();
                for(var i=0; i<exist.length; i++){
                    var start=exist[i].start;
                    var end=exist[i].end;
                    ctx1.moveTo(dist.question[start].x,dist.question[start].y);
                    ctx1.lineTo(dist.answer[end].x,dist.answer[end].y);
                }
                ctx1.stroke();
                ctx1.closePath();
            }
            changeToAnswer(exist);
        });

        //连线题答案格式化并输出
        function changeToAnswer(exist) {
            //var answer = {}      保存连线题的答案 
            var answer = [];      //保存连线题的答案
            // console.log(exist);
            exist.forEach(function(item){
                // answer[item.start+1] = item.end+1;
                answer.push((item.start+1) + ":" +　(item.end+1));
            });
            obj[current] = answer.join(",");
        }
    };
})


</script>
</body>
</html>
