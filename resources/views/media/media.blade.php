<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>InCourse</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/media.css"/>
    <link rel="stylesheet" href="css/common.css"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/selectivizr.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script>
        $(function() {
            $('input, textarea').placeholder();
        });
    </script>
    <style>
        .waterfallFoot>.appraise>b, .detailBox>ul>.right>b{
            behavior: url(js/backgroundsize.min.htc);
        }
    </style>
    <![endif]-->

</head>
<body>
<!--顶部固定定位-->
<div id="fixedTop">
    <div class="navbar">
    	@if(Auth::guard('school')->check())
        @include('media.include.head_Admin')
        @elseif(Auth::guard('employee')->check())
        @include('media.include.head_Tea')
        @elseif(Auth::guard('student')->check())
        @include('student.include.head')
        @endif
    </div>
    <div class="mediaDown">
        <img src="images/media/Hpb_mediaDown.png"/>
    </div>
    <!-------顶部搜索栏------->
    <div id="searchBar">
        <form id="searchNav" method="get" action="">
            <div class="area">
                <div class="province personArea">
                    <div>
                        <span>省</span>
                        <b></b>
                    </div>
                    <ul class="list-unstyled">
                        <li>浙江省</li>
                        <li>吉林省</li>
                        <li>黑龙江省</li>
                    </ul>
                </div>
                <div class="cities personArea">
                    <div>
                        <span>市区</span>
                        <b></b>
                    </div>
                    <ul class="list-unstyled">
                        <li>金华市</li>
                        <li>杭州市</li>
                        <li>永康市</li>
                    </ul>
                </div>
                <div class="school personArea">
                    <div>
                        <span>学校</span>
                        <b></b>
                    </div>
                    <ul class="list-unstyled">
                        <li>杭州一中</li>
                        <li>杭州高级中学</li>
                        <li>杭州二中</li>
                    </ul>
                </div>
            </div>
            <!--搜索-->
            <div class="searchContent">
                <input type="text" name="sousuo"  placeholder="寻找你感兴趣的话题"/>
                <input type="button" value="搜 索"/>
            </div>
        </form>
    </div>
</div>
<!-----------------------------瀑布流--------------------->
<div id="waterfall">
    <!--分享的模态框开始-->
    <div class="umodal">
        <div class="umodal-dialog">
            <div class="umodal-content">
                <p>
                    <span>分享至：</span>
                    <span class="close">&times;</span>
                </p>
                <div class="bdsharebuttonbox" data-tag="share_1">
                    <a class="bds_mshare" data-cmd="sqq" id="qq"></a>
                    <a class="bds_qzone" data-cmd="qzone" href="#" id="qqRoom"></a>
                    <a class="bds_tsina" data-cmd="weixin" id="weixin"></a>
                    <a class="bds_tqq" data-cmd="tqq" id="tqq"></a>
                    <a class="bds_renren" data-cmd="tsina" id="tsina"></a>
                </div>
            </div>
        </div>
    </div>
    <!--结束-->
    <div class="waterfall" id="article_01">
        <div class="waterfallHead">
            <ul class="list-unstyled list-inline">
                <li>
                    <a href="javascript:;"><img src="images/media/Hpb_schoolLogo.jpg"/></a>
                </li>
                <li>
                    <span><a href="javascript:;">湖南工程学院</a></span>
                    <p>2016-07-06 14:00</p>
                </li>
            </ul>
        </div>
        <hr/>
        <div class="content">
            <a href="/mediaDetail" target="_blank">2016暑期卫康公益“快乐学校”关爱农民工子女专项志愿服务行动招募公告</a>
            <p class="articleBox">
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。
            </p>
            <div class="mediaBox">
                <img src="images/media/Hpb_media01.jpg"/>
            </div>
        </div>
        <hr/>
        <ul class="waterfallFoot list-inline list-unstyled">
            <!--
            <li class="collect">
                <img src="images/media/Hpb_collect.png"/>
                &nbsp;&nbsp;收藏
            </li>-->
            <li class="appraise commer">
                <b></b>
                <div>&nbsp;&nbsp;评论
                    <span>(101)</span>
                </div>
            </li>
            <li class="share">
                <img src="images/media/Hpb_share.png"/>
                &nbsp;&nbsp;分享
            </li>
            <li class="support commer">
                <img src="images/media/Hpb_support.png"/>
                <div>&nbsp;&nbsp;点赞
                    <span>(131)</span>
                </div>
                <span>+1</span>
            </li>
        </ul>
        <!--评论框-->
        <div class="appraiseBox">
            <form action="" method="get">
                <img src="images/media/Hpb_01.png" title="头像"/>
                <input type="text"/>
                <input type="button" class="apprBtn" value="评论"/>
            </form>
            <hr/>
            <div class="apprDetail">
                <div class="detailBox">
                    <ul class="list-unstyled list-inline">
                        <li class="left">
                            <img src="images/media/Hpb_01.png"/>
                        </li>
                        <li class="apprWord left">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="uname">李四：</span>
                                    <span>支持的青年志愿者关爱农民工子女</span>
                                </li>
                                <li class="time">1分钟前</li>
                            </ul>
                        </li>
                        <li class="right">
                            <!--<img src="images/media/Hpb_support.png"/>-->
                            <b></b>
                        </li>
                        <li class="right response">回复</li>
                    </ul>
                    <div class="words">
                        <p><a href="javascript:;">张三</a> @ <a href="javascript:;">李四</a>：我也支持！</p>
                        <p><a href="javascript:;">尼古拉斯赵四</a> @ <a href="javascript:;">李四</a>：走！一起！</p>
                    </div>
                    <form action="" method="get" class="responseBox">
                        <input class="responseTo" type="text" value="@ 李四："/>
                        <input type="button" class="smApprBtn" value="评论"/>
                    </form>
                </div>
                <div class="detailBox">
                    <ul class="list-unstyled list-inline">
                        <li class="left">
                            <img src="images/media/Hpb_02.jpg"/>
                        </li>
                        <li class="apprWord left">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="uname">张三：</span>
                                    <span>我们明天就出发，行动起来！</span>
                                </li>
                                <li class="time">30分钟前</li>
                            </ul>
                        </li>
                        <li class="right">
                            <b></b>
                        </li>
                        <li class="right response">回复</li>
                    </ul>
                    <div class="words">
                        <a href="javascript:;">王五</a> @ <a href="javascript:;">张三</a>：明天哪里集合？
                    </div>
                    <form action="" method="get" class="responseBox">
                        <input class="responseTo" type="text" value="@ 张三："/>
                        <input type="button" class="smApprBtn" value="评论"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="waterfall" id="article_02">
        <div class="waterfallHead">
            <ul class="list-unstyled list-inline">
                <li>
                    <a href="javascript:;"><img src="images/media/Hpb_schoolLogo.jpg"/></a>
                </li>
                <li>
                    <span><a href="javascript:;">湖南工程学院</a></span>
                    <p>2016-07-06 14:00</p>
                </li>
            </ul>
        </div>
        <hr/>
        <div class="content">
            <a href="mediaDetail.html" target="_blank">2016暑期卫康公益“快乐学校”关爱农民工子女专项志愿服务行动招募公告</a>
            <p class="articleBox">
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。“快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。
            </p>

            <div class="mediaBox">
                <img src="images/media/Hpb_media02.jpg"/>
                <img src="images/media/Hpb_media03.jpg"/>
                <img src="images/media/Hpb_media04.jpg"/>
            </div>
        </div>
        <hr/>
        <ul class="waterfallFoot list-inline list-unstyled">
            <!--
            <li class="collect">
                <img src="images/media/Hpb_collect.png"/>
                &nbsp;&nbsp;收藏
            </li>-->
            <li class="appraise commer">
                <b></b>
                <div>&nbsp;&nbsp;评论
                    <span>(101)</span>
                </div>
            </li>
            <li class="share">
                <img src="images/media/Hpb_share.png"/>
                &nbsp;&nbsp;分享
            </li>
            <li class="support commer">
                <img src="images/media/Hpb_support.png"/>
                <div>&nbsp;&nbsp;点赞
                    <span>(131)</span>
                </div>
                <span>+1</span>
            </li>
        </ul>
        <!--评论框-->
        <div class="appraiseBox">
            <form action="" method="get">
                <img src="images/media/Hpb_01.png" title="头像"/>
                <input type="text"/>
                <input type="button" value="评论"/>
            </form>
            <hr/>
            <div class="apprDetail">
                <div class="detailBox">
                    <ul class="list-unstyled list-inline">
                        <li class="left">
                            <img src="images/media/Hpb_02.jpg"/>
                        </li>
                        <li class="apprWord left">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="uname">张三：</span>
                                    <span>支持的青年志愿者关爱农民工子女</span>
                                </li>
                                <li class="time">1分钟前</li>
                            </ul>
                        </li>
                        <li class="right">
                            <b></b>
                        </li>
                        <li class="right response">回复</li>
                    </ul>
                    <div class="words">
                        <!--回复内容-->
                    </div>
                    <form action="" method="get" class="responseBox">
                        <input class="responseTo" type="text"/>
                        <input type="button" class="smApprBtn" value="评论"/>
                    </form>
                </div>
                <div class="detailBox">
                    <ul class="list-unstyled list-inline">
                        <li class="left">
                            <img src="images/media/Hpb_02.jpg"/>
                        </li>
                        <li class="apprWord left">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="uname">张三：</span>
                                    <span>支持的青年志愿者关爱农民工子女</span>
                                </li>
                                <li class="time">30分钟前</li>
                            </ul>
                        </li>
                        <li class="right">
                            <b></b>
                        </li>
                        <li class="right response">回复</li>
                    </ul>
                    <div class="words">
                        <!--回复内容-->
                    </div>
                    <form action="" method="get" class="responseBox">
                        <input class="responseTo" type="text"/>
                        <input type="button" class="smApprBtn" value="评论"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="waterfall" id="article_03">
        <div class="waterfallHead">
            <ul class="list-unstyled list-inline">
                <li>
                    <a href="javascript:;"><img src="images/media/Hpb_schoolLogo.jpg"/></a>
                </li>
                <li>
                    <span><a href="javascript:;">湖南工程学院</a></span>
                    <p>2016-07-06 14:00</p>
                </li>
            </ul>
        </div>
        <hr/>
        <div class="content">
            <a href="mediaDetail.html" target="_blank">2016暑期卫康公益“快乐学校”关爱农民工子女专项志愿服务行动招募公告</a>
            <p class="articleBox">
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。“快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，
            </p>
            <div class="mediaBox">
                <video src="images/media/sea.mp4" width="50%" controls="controls">您的浏览器不支持VIDEO！</video>
            </div>
        </div>
        <hr/>
        <ul class="waterfallFoot list-inline list-unstyled">
            <!--
            <li class="collect">
                <img src="images/media/Hpb_collect.png"/>
                &nbsp;&nbsp;收藏
            </li>-->
            <li class="appraise commer">
                <b></b>
                <div>&nbsp;&nbsp;评论
                    <span>(101)</span>
                </div>
            </li>
            <li class="share">
                <img src="images/media/Hpb_share.png"/>
                &nbsp;&nbsp;分享
            </li>
            <li class="support commer">
                <img src="images/media/Hpb_support.png"/>
                <div>&nbsp;&nbsp;点赞
                    <span>(131)</span>
                </div>
                <span>+1</span>
            </li>
        </ul>
        <!--评论框-->
        <div class="appraiseBox">
            <form action="" method="get">
                <img src="images/media/Hpb_01.png" title="头像"/>
                <input type="text"/>
                <input type="button" class="apprBtn" value="评论"/>
            </form>
            <hr/>
            <div class="apprDetail">
                <div class="detailBox">
                    <ul class="list-unstyled list-inline">
                        <li class="left">
                            <img src="images/media/Hpb_02.jpg"/>
                        </li>
                        <li class="apprWord left">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="uname">张三：</span>
                                    <span>支持的青年志愿者关爱农民工子女</span>
                                </li>
                                <li class="time">1分钟前</li>
                            </ul>
                        </li>
                        <li class="right">
                            <b></b>
                        </li>
                        <li class="right response">回复</li>
                    </ul>
                    <div class="words">
                        <!--回复内容-->
                    </div>
                    <form action="" method="get" class="responseBox">
                        <input class="responseTo" type="text"/>
                        <input type="button" class="smApprBtn" value="评论"/>
                    </form>
                </div>
                <div class="detailBox">
                    <ul class="list-unstyled list-inline">
                        <li class="left">
                            <img src="images/media/Hpb_02.jpg"/>
                        </li>
                        <li class="apprWord left">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="uname">张三：</span>
                                    <span>支持的青年志愿者关爱农民工子女</span>
                                </li>
                                <li class="time">30分钟前</li>
                            </ul>
                        </li>
                        <li class="right">
                            <b></b>
                        </li>
                        <li class="right response">回复</li>
                    </ul>
                    <div class="words">
                        <!--回复内容-->
                    </div>
                    <form action="" method="get" class="responseBox">
                        <input class="responseTo" type="text"/>
                        <input type="button" class="smApprBtn" value="评论"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/media.js"></script>
    <script src="js/common.js"></script>	
</body>
</html>