<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!--<meta name="description"
          content="Intro.js - Better introductions for websites and features with a step-by-step guide for your projects.">-->
    <meta name="author" content="Afshin Mehrabani (@afshinmeh) in usabli.ca group">
    <title>In Course</title>
    <script src="js/jquery-1.12.4.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <!--引导-->
    <link rel="stylesheet" href="css/introjs.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-responsive.min.css">-->
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/Correcting_operation.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
</head>
    <style>
    	    .pageTest{ width: 1000px; height: 50px; margin-top: 100px;    }
    .activP{
      background-color: #367fa9!important;
      color: #fff!important;
    }
    </style>
<body>
<div class="navbar">
@include('teacher.header.head_Tea')
</div>
<!--
    作者offline
    时间2016-05-24
    描述内容标签页切换
-->
<div class="content">
    <div class="container">
        <div class="row">
            <div id="cent_nav" class="col-md-3 col-xs-12">
                <ul class="col-md-12 col-xs-12">
                    <li class="topic">一年一班语文</li>
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
                <div class="col-xs-12 " id="left">
                	@include('teacher.header.left_nav')
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12" id="centery">
                    <div id="homework" class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 old-p"><a href="#" data-toggle="modal"
                                                                                  data-target="#myModal"
                                                                                  class="modaladd" data-step="1"
                                                                                  data-intro="点击此处添加学生作业">+&nbsp;添加作业</a>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center_title" style="font-size: 18px">一年一班作业（语文）

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                            <div id="document"><a href="/homeworkCorrecting" data-step="2"
                                                  data-intro="点击此处批改学生已完成的作业"><img src="images/create.png"
                                                                                   alt="">作业批改</a></div>
                        </div>
                    </div>
                    <div class="container-fluid" id="container">
                        <div class="go_success">发布成功！</div>
                        <div class="go_filed">撤销成功！</div>
                        <div class="row new-creat" id="exl">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">作业章节</div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">类型</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">发布时间</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">截止时间</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">状态</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">操作</div>
                        </div>
                </div>
                                                <div class="pagination fy">
                                                	
                                </div>
                                                               <div class="jumpas">
                                	<!--第 <input type="" name="" id="" value="" />页-->
                                	<!--<span>跳转</span>-->
                                	<b class="gross"></b>
                                </div>
                </div>
                <div class="col-xs-12 left"> 
@include('teacher.header.right_nav')
                    <div class="foot">
                        <div class="img" id="img"></div>
                        <ul class="nav">
                            <li><img src="images/08.png"/><b
                                    style="font-weight: normal;">同学</b><span><span>0</span><span>/</span><span>0</span></span>
                                <div class="QQ" id="QQ">
                                    <!--标签页切换-->
                                    <ul class="nav">
                                        <li>
                                            <span></span>
                                            <img src="images/02.gif"/>
                                            <b><span>小明</span></b>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><img src="images/08.png"/>老师<span><span>0</span><span>/</span><span>0</span></span>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="footf"></div>
<div id="footer">
</div>
<script>
    $(document).ready(
            function () {
                $("#pop2_hover").mouseover(
                        function () {
                            $(this).css(
                                    {
                                        "background": "url('images/team.png') 47% 30% no-repeat",
                                        "border": "3px solid #168BEE"
                                    }
                            );
                            $("#pop_hover").css(
                                    {
                                        "background": "url('images/single (1).png') 47% 30% no-repeat",
                                        "border": "3px solid transparent",
                                        "color": "black"
                                    }
                            )
                        }
                );
                $("#pop2_hover").mouseout(
                        function () {
                            $(this).css(
                                    {
                                        "background": "url('images/team2.png') 47% 30% no-repeat",
                                        "border": "3px solid transparent"
                                    }
                            );
                            $("#pop_hover").css(
                                    {
                                        "background": "url('images/single (2).png') 47% 30% no-repeat",
                                        "border": "3px solid #168BEE",
                                        "color": "#168BEE"
                                    }
                            )
                        }
                );
                $('body').on('click',".Nocfix",
                        function () {
                            if ($(this).html() == "发布") {            
                                $(".go_success").show();
                                setTimeout(function () {
                                    $(".go_success").hide()
                                }, 1000);
                                $(this).html("撤销").parent().prev().html("已发布").removeClass("red").addClass("gray");
                            
								 $.ajax({
									type:"post",
									url:"/pubJob",
									dataType:'json',
									data:{'job_id':$(this).attr('num'),'_token':'{{csrf_token()}}'},
									success:function(data){
											console.log(data)
												}
							});	        
                            
                            } else {
                            	
                                $(".go_filed").show();
                                setTimeout(function () {
                                    $(".go_filed").hide()
                                }, 1000);
                                $(this).html("发布").parent().prev().html("未发布").removeClass("gray").addClass("red");
                            }
                        }
                );


            }
    );

    /*IE8遮罩层动态调试*/
    $(function () {
        if ($(".introjs-tooltipReferenceLayer").css("top") == "508px") {
            $(".introjs-tooltipReferenceLayer").css({"top": "184", "left": "632px"});
        }
        ;
    })
</script>

<style>
    .introjs-tooltipReferenceLayer[style="top:508px"] {
        left: 0px !important;
    }
</style>


<!--引导-->
<!--<script type="text/javascript" src="js/intro.js"></script>-->
<!--<script type="text/javascript">introJs().start();</script>-->

<!--摸态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
                添加作业
            </div>
            <div class="modal-body">
                <a href="independentOperationAddJobSection" class="pop" id="pop_hover"
                   style="margin-right: 30px">

                    <span>独立完成</span>
                </a>
                <a href="" class="pop" id="pop2_hover" style="margin-left: 30px">

                    <span>小组作业</span>
                </a>

            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true" style="padding: 1px">×
                </button>
                删除作业提醒
            </div>
            <div class="modal-body">
                <div style="font-weight: bold">确定要删除本次作业吗？</div>
                <div class="yon">
                    <a href="" class="fy" data-dismiss="modal">是</a>
                    <a href="" data-dismiss="modal">否</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script>
	
	
	(function ($) {
			if(localStorage.pargins==undefined){
		localStorage.setItem('pargins',1)
			}
		function ajax(){
			$('#container>.new-creat').remove();			
					$.ajax({
			type:"get",
			url:"/showJobList/"+localStorage.pargins,
			dataType:'json',
			success:function(data){
				console.log(data)
				var jobs=data.jobs;
				sessionStorage.pagins=data.pageLength;
				for(var i=0;i<jobs.length;i++){
					var time=new Date(jobs[i].pub_time*1000),
						times=new Date(jobs[i].deadline*1000)
					if(jobs[i].job_status=='已发布'){
						$('#container').append(' <div class="row new-creat"> <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span>'+(i+1)+'.</span><a>'+jobs[i].title+'</a></div> <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">'+jobs[i].job_type+'</div> <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">'+(time.getMonth()+1)+'月'+time.getDate()+'日</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">'+(times.getMonth()+1)+'月'+times.getDate()+'日</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray Noc">已发布</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#" class="blue Nocfix" num='+jobs[i].id+'>撤销</a></div></div>')
											}else{
						$('#container').append('<div class="row new-creat"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><span>'+(i+1)+'.</span><a>'+jobs[i].title+'</a></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">'+jobs[i].job_type+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">'+(time.getMonth()+1)+'月'+time.getDate()+'日</div> <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">'+(times.getMonth()+1)+'月'+times.getDate()+'日</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 red Noc">未发布</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="#" class="blue Nocfix" num='+jobs[i].id+'>发布</a></div></div>')
							}
				};
				if(data.pageLength==0){
					$('.pagination').hide()
				}
				$('.gross').text('共'+data.pageLength+'页')
			}
		});
		}
		ajax()

  //默认参数 (放在插件外面，避免每次调用插件都调用一次，节省内存)
  var defaults = {
    //id : '#paging',//id
    leng: 9,//总页数
    activeClass: 'page-active' ,//active类
    firstPage: '首页',//
    lastPage: '末页',
    prv: '<',
    next: '>',
	  clickBack:function(){
	  }
  };
  var opts,myOptions;
  //扩展
  $.fn.extend({
    //插件名称
    page: function (options) {
      //覆盖默认参数
      myOptions = options
      opts = $.extend(defaults, options);
      console.log(opts,998,this)
      //主函数
      return this.each(function () {
        //激活事件
        var obj = $(this);
        var str1 = '';
        var str = '';
        var l = opts.leng;
        if (l > 1&&l < 10) {
          str1 = '<li><a href="javascript:" class="'+ opts.activeClass +'">1</a></li>';
          for (i = 2; i < l + 1; i++) {
            str += '<li><a href="javascript:">' + i + '</a></li>';
          }
        }else if(l > 9){
          str1 = '<li><a href="javascript:" class="'+ opts.activeClass +'">1</a></li>';
          for (i = 2; i < 10; i++) {
            str += '<li><a href="javascript:">' + i + '</a></li>';
          }
          //str += '<li><a href="javascript:">...</a></li>'
        } else {
          str1 = '<li><a href="javascript:" class="'+ opts.activeClass +'">1</a></li>';
        }
        obj.html('<div class="nextse" style="float:right">' + opts.next + '</div><div class="last" style="float:right">' + opts.lastPage + '</div><ul class="pagingUl">' + str1 + str + '</ul><div class="first" style="float:right">' + opts.firstPage + '</div><div class="prv" style="float:right">' + opts.prv + '</div>');

        obj.on('click', '.nextse', function () {
          var pageshow = parseInt($('.' + opts.activeClass).html());
          if(pageshow==l){
            return false;
          }
          if(pageshow == l) {
          }else if(pageshow > l-5&&pageshow < l){
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().next().find('a').addClass(opts.activeClass);
          }else if(pageshow > 0&&pageshow < 6){
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().next().find('a').addClass(opts.activeClass);
          }else {
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().next().find('a').addClass(opts.activeClass);
            fpageShow();
          }
          opts.clickBack(pageshow+1)
         	localStorage.setItem('pargins',parseInt(++localStorage.pargins));
          	ajax()
        });
        obj.on('click', '.prv', function () {
          var pageshow = parseInt($('.' + opts.activeClass).html());

          if (pageshow == 1) {
            return false;
          }else if(pageshow > l-5&&pageshow < l+1){
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().prev().find('a').addClass(opts.activeClass);
                  //this.fpageBranch(pageshow-1);
          }else if(pageshow > 1&&pageshow < 6){
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().prev().find('a').addClass(opts.activeClass);
                  //this.fpageBranch(pageshow-1);
          }else {
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().prev().find('a').addClass(opts.activeClass);
                    //this.fpageBranch(pageshow-1);
            fpageShow();
          }
          opts.clickBack(pageshow-1)
         	localStorage.setItem('pargins',parseInt(--localStorage.pargins));
          	ajax()
        });

        obj.on('click', '.first', function(){
          var pageshow = 1;
          var nowshow = parseInt($('.' + opts.activeClass).html());
          if(nowshow==1){
            return false;
          }
          $('.' + opts.activeClass).removeClass(opts.activeClass).parent().prev().find('a').addClass(opts.activeClass);
          fpagePrv(0);
          opts.clickBack(pageshow)
          localStorage.pargins=1;
          ajax()
        })
        obj.on('click', '.last', function(){
          var pageshow = l;
          var nowshow = parseInt($('.' + opts.activeClass).html());
          if(nowshow==l){
            return false;
          }
          if(l>9){
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().prev().find('a').addClass(opts.activeClass);
            fpageNext(8);
          }else{
            $('.' + opts.activeClass).removeClass(opts.activeClass).parent().prev().find('a').addClass(opts.activeClass);
            fpageNext(l-1);
          }
          opts.clickBack(pageshow)
          localStorage.pargins=parseInt(sessionStorage.pagins);
          ajax()
        })

        obj.on('click', 'li', function(){
          var $this = $(this);
          var pageshow = parseInt($this.find('a').html());
          var nowshow = parseInt($('.' + opts.activeClass).html());
          console.log(l,256)
          if(pageshow==nowshow){
            return false;
          }
          if(l>9){
            console.log(1234567,pageshow,l)
            if(pageshow > l-5&&pageshow < l+1){
              $('.' + opts.activeClass).removeClass(opts.activeClass);
              $this.find('a').addClass(opts.activeClass);
              fpageNext(8-(l-pageshow));
            }else if(pageshow > 0&&pageshow < 5){
              $('.' + opts.activeClass).removeClass(opts.activeClass);
              $this.find('a').addClass(opts.activeClass);
              fpagePrv(pageshow-1);
            }else{
              $('.' + opts.activeClass).removeClass(opts.activeClass);
              $this.find('a').addClass(opts.activeClass);
              fpageShow();
            }
          }else{
            console.log(123456)
            $('.' + opts.activeClass).removeClass(opts.activeClass);
            $this.find('a').addClass(opts.activeClass);
          }
          opts.clickBack(pageshow)
          localStorage.pargins=$(this).text();
          ajax()
        })

        function fpageShow(){
          var pageshow = parseInt($('.' + opts.activeClass).html());
          var pageStart = pageshow - 4;
          var pageEnd = pageshow + 5;
          var str1 = '';
          for(i=0;i<9;i++){
            str1 += '<li><a href="javascript:" class="">' + (pageStart+i) + '</a></li>'
          }
          obj.find('ul').html(str1);
          obj.find('ul li').eq(4).find('a').addClass(opts.activeClass);
		      
        }

        function fpagePrv(prv){
          var str1 = '';
          if(l>8){
            for(i=0;i<9;i++){
              str1 += '<li><a href="javascript:" class="">' + (i+1) + '</a></li>'
            }
          }else{
            for(i=0;i<l;i++){
              str1 += '<li><a href="javascript:" class="">' + (i+1) + '</a></li>'
            }
          }
          obj.find('ul').html(str1);
          obj.find('ul li').eq(prv).find('a').addClass(opts.activeClass);
        }

        function fpageNext(next){
          var str1 = '';
          if(l>8){
            for(i=l-8;i<l+1;i++){
              str1 += '<li><a href="javascript:" class="">' + i + '</a></li>'
            }
           obj.find('ul').html(str1);
           obj.find('ul li').eq(next).find('a').addClass(opts.activeClass);
          }else{
            for(i=0;i<l;i++){
              str1 += '<li><a href="javascript:" class="">' + (i+1) + '</a></li>'
            }
           obj.find('ul').html(str1);
           obj.find('ul li').eq(next).find('a').addClass(opts.activeClass);
          }
        }
      });
    },
    setLength: function(newLength){
      myOptions.leng = newLength
      $(this).html('')
      $(this).unbind()
      $(this).page(myOptions)
    }
  })
})(jQuery);

	$('.pagination').page({
	leng:parseInt(sessionStorage.pagins),
	activeClass: 'activP'
	})
</script>
</body>
</html>

