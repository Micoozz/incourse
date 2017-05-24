<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>InCourse</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/mediaDetail.css"/>
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
<div id="fixedTop">
    <div class="navbar">
        <div>
        <div class="indexLogo">
            <img src="images/media/LOGO.png"/>
            <img src="images/media/Hpb_schoolLogo.png" class="schoolLogo"/>
            <b>湖南工程学院</b>
        </div>
            <ul class="nav head_nav">
                <li class="schoolMain">
                    <a href="javascript:;" class="blue" id="home">学校首页</a>
                    <div>
                        <a href="javascript:;" id="me">@与我相关</a>
                    </div>
                </li>
                <!--根据账号具体身份显示对应的管理员功能-->
                <li><a href="../Admin/AdminJw/f_Syllabus.html">教务管理员</a></li>
                <li><a href="../Admin/AdminJx/Teaching.html">教学管理员</a></li>
                <li><a href="../Admin/AdminDa/addEmployeeFile.html">档案管理员</a></li>
                <li><a href="../Admin/AdminTk/questionBank.html">题库管理员</a></li>
                <!--<li><a href="javascript:;">交易中心</a></li>-->
                <li class="affix"><a href="javascript:;"><img src="images/media/01.png"/></a></li>
                <li class="personCenter"><a href="javascript:;">个人中心</a>
                    <div class="cent">
                        <a href="../Admin/AdminData/teacherPersonData.html" class="personInfo" id="person">个人信息</a>
                    </div>
                </li>
                <!--账号登入了就显示“退出”按钮,没登录就没有“退出”按钮-->
                <li><a href="javascript:;" class="blue">退出</a></li>
            </ul>
        </div>
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
                <input type="text" placeholder="寻找你感兴趣的话题"/>
                <input type="button" value="搜 索"/>
            </div>
        </form>
    </div>
</div>
<!------------------------详情内容------------------>
<div id="waterfall">
    <!--分享的模态框开始-->
    <div class="umodal">
        <div class="umodal-dialog">
            <div class="umodal-content">
                <p>
                    <span>分享至：</span>
                    <span class="close">&times;</span>
                </p>
         <!--       <ul class="list-unstyled list-inline">
                    <li>
                        <img src="images/media/Hpb_qq.png"/>
                    </li>
                    <li>
                        <img src="images/media/Hpb_qqRoom.png"/>
                    </li>
                    <li>
                        <img src="images/media/Hpb_weixin.png"/>
                    </li>
                    <li>
                        <img src="images/media/Hpb_friends.png"/>
                    </li>
                    <li>
                        <img src="images/media/Hpb_weibo.png"/>
                    </li>
                    <li>
                        <img src="images/media/Hpb_xinlang.png"/>
                    </li>
                </ul>-->

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
        <div class="content">
            <h4>2016暑期卫康公益“快乐学校”关爱农民工子女专项志愿服务行动招募公告</h4>
            <div class="waterfallHead">
                <ul class="list-unstyled list-inline">
                    <li>
                        <img src="images/media/Hpb_schoolLogo.jpg"/>
                    </li>
                    <li class="schoolName">湖南工程学院</li>
                    <li>2016-07-06 14:00</li>
                </ul>
            </div>
            <ul class="listBar list-inline list-unstyled">
                <!--
                <li>
                    <img src="images/media/Hpb_collect.png"/>
                    <span>122</span>
                </li>-->
                <li>
                    <img src="images/media/Hpb_comment.png"/>
                    <span>101</span>
                </li>
                <li>
                    <img src="images/media/Hpb_share.png"/>
                    <span>180</span>
                </li>
                <li>
                    <img src="images/media/Hpb_support.png"/>
                    <span>131</span>
                </li>
            </ul>
            <p class="articleBox">
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专 <br/>
                项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。“快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动好的房间打开附件饭店开好房间干活干活规范合格就返回给房间号官方公会返回发空间规划法规就符合规范合格干活放假 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cum dolores libero quos sunt veniam. Amet, atque dignissimos dolor esse, id ipsa ipsam iusto magni nihil non optio, quibusdam sunt?打发打发点击放大法看到张三待过几个可根据那个方法靠国家和覅我加工费规范合格点赞带你飞名肯德基管理 和集体户口的个分开国际好回家科技非公开发感慨
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿 <br/>
                者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。“快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动好的房间打开附件饭店开好房间干活干活规范合格就返回给房间号官方公会返回发空间规划法规就符合规范合格干活放假 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cum dolores libero quos sunt veniam. Amet, atque dignissimos dolor esse, id ipsa ipsam iusto magni nihil non optio, quibusdam sunt?打发打发点击放大法看到张三待过几个可根据那个方法靠国家和覅我加工费规范合格点赞带你飞名肯德基管理 和集体户口的个分开国际好回家科技非公开发感慨
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。“快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动好的房间打开附件饭店开好房间干活干活规范合格就返回给房间号官方公会返回发空间规划法规就符合规范合格干活放假 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cum dolores libero quos sunt veniam. Amet, atque dignissimos dolor esse, id ipsa ipsam iusto magni nihil non optio, quibusdam sunt?打发打发点击放大法看到张三待过几个可根据那个方法靠国家和覅我加工费规范合格点赞带你飞名肯德基管理 和集体户口的个分开国际好回家科技非公开发感慨
                “快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动，“在一起，我快乐”是快乐学校的理念，也是每一位志愿者和孩子的心声。“快乐学校”是由中国青年报社主办，卫康公益特别支持的青年志愿者关爱农民工子女专项志愿服务活动好的房间打开附件饭店开好房间干活干活规范合格就返回给房间号官方公会返回发空间规划法规就符合规范合格干活放假 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cum dolores libero quos sunt veniam. Amet, atque dignissimos dolor esse, id ipsa ipsam iusto magni nihil non optio, quibusdam sunt?打发打发点击放大法看到张三待过几个可根据那个方法靠国家和覅我加工费规范合格点赞带你飞名肯德基管理 和集体户口的个分开国际好回家科技非公开发感慨
            </p>
            <div class="mediaBox">
                <img src="images/media/Hpb_media01.jpg"/>
            </div>
        </div>
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
</div>

<script src="js/chooseUrl.js"></script>
</body>
</html>