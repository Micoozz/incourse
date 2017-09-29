<!DOCTYPE html>
<html>
<head>
	<title>In Course</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="author" content="Afshin Mehrabani (@afshinmeh) in usabli.ca group">
    
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    	
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/css/incourseReset.css">
    
    @yield('CSS:OPTIONAL')
    <link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin/eduAdmin/releaseNotes.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin/eduAdmin/activityNotes.css" />
    <link rel="stylesheet" type="text/css" href="/css/teacher/homeWork.css" />
    <link rel="stylesheet" type="text/css" href="/css/exercise.css">
    <link rel="stylesheet" type="text/css" href="/css/teacher/myExerRoom.css">
    <style>
        .waitBoxs .activity input {
            width: 31%;
        }
        /*小组人数样式*/
        
        .group-number {
            width: 100%;
            border: 1px solid #eee;
            margin-bottom: 30px;
        }
        
        .group-number th,
        .group-number td {
            display: inline-block;
            width: 15%;
            text-align: center;
            padding: 10px;
        }
        
        .group-number tr>th:last-child,
        .group-number tr>td:last-child {
            width: 70%;
            text-align: left;
        }
        
        .group-number tr {
            border-top: 1px solid #eee;
        }
        
        .staff>span {
            margin-right: 11px;
        }
        
        .pull-down {
            position: absolute;
            right: 6%;
            margin-top: -26px;
        }
    </style>

</head>
<body>
<div class="navbar">
    <div>
        <div class="indexLogo">
            <img src="/images/LOGO.png"/>
            <img src="/images/Hpb_schoolLogo.png" class="schoolLogo"/>
            <b>湖南工程学院</b>
        </div>
        <div class="f-r p-r personCenter">
            <img class="big-head" src="/images/01.png" alt="头像" />
            <span>孙天宇 你好</span>
            <i class="fa fa-angle-down"></i>
            <ul class="p-a d-n">
                <li><a href="/logout">退出</a></li>
            </ul>
        </div>
        <ul class="nav head_nav">
            <li class="schoolMain">
                <a href="/media">学校首页</a>
                <div>
                    <a href="javascript:;">@与我相关</a>
                </div>
            </li>
            <li><a href="/learningCenter" class="blue">学习中心</a></li>
            <li><a href="javascript:;">班级中心</a></li>
        </ul>
    </div>
</div>
<!--
    作者offline
    时间2016-05-24
    描述内容标签页切换
-->
<div class="content">
    <div class="container homeWork-head">
        <div class="row">
            <div class="col-md-3 col-xs-12 cent_nav">
                <ul class="col-md-12 col-xs-12">
                    @foreach($class_course as $item)
                    <li><a class={{$class_id == $item['class_id'] && $course_id == $item['course_id'] ? 'box' : 'p-r of-h class-teacher'}} href="/learningCenter/{{$item['class_id']}}/{{$item['course_id']}}">{{$item['title']}}</a></li>
                    @endforeach
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
        <div class="container p-r">
            <div class="row">
                <!--左侧栏-->
                <div class="col-xs-12 " id="left">
                	 <ul class="nav1 nav" id="nav1">
                        <li><a href="/learningCenter/{{$class_id}}/{{$course_id}}/homework" {{$mod == 'homework' ? 'class=box' : ''}} num='1'>作业管理</a></li>
                        <li><a href="/learningCenter/{{$class_id}}/{{$course_id}}/my-exercise" {{$mod == 'my-exercise' ? 'class=box' : ''}} num='2'>我的题库</a></li>
                        <li><a href="" num='3'>资料库</a></li>
                        <li><a href="" num='4'>班级管理</a></li>
                        <li><a href="" num='5'>成绩管理</a></li>
                        <li><a href="" num='6'>课程大纲</a></li>
                        <li><a href="" num='7'>课堂课件</a></li>
                    </ul>
                </div>
                <!--内容-->
                @yield('CONTENT')
                
                <div class="col-xs-12 col-sm-12 exerManage" id="centery">
                @include('teacher.template.title')
                    <div>
                    @if($mod == 'homework')
                        @include('teacher.template.homework-tag')
                        @if(empty($func) || $func == 'addHomework')
                            @include('teacher.content.addHomework')
                        @elseif($func == 'addHomework-personal')
                            @include('teacher.content.addHomework-personal')
                        @elseif($func == 'exercise')
                            @include('teacher.content.exercise')
                        @endif
                    @elseif($mod == 'my-exercise')
                        @if(empty($func))
                        @include('teacher.content.my-exercise')
                        @elseif($func == 'addExercise')
                        @include('teacher.content.addExercise')
                        @endif
                    @endif
                    </div>
                </div>
                <div class="col-xs-12 left">
                @include('teacher.header.right_nav')
                </div>
            </div>

        </div>
    </div>
</div>
<div id="footf"></div>
<div id="footer">
</div>


@yield('JS:OPTIONAL')
</body>

<script src="/js/jquery-1.12.4.min.js" charset="utf-8"></script>
<script src="/js/index.js" charset="utf-8"></script>
<script src="/js/incourseReset.js" charset="utf-8"></script>
<script src="/js/exercise.js" charset="utf-8"></script>
<script src="/js/lhgcore.js" charset="utf-8"></script>
<script src="/js/lhgcalendar.js" charset="utf-8"></script>
<script src="/js/teacher/homeworkManage.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/teacher/exerRoom.js"></script>
<script type="text/javascript" src="/js/teacher/personHw.js"></script>

<script type="text/javascript">
    var token = "{{csrf_token()}}";
    var class_id = "{{$class_id}}";
    var course_id = "{{$course_id}}";
    var mod = "{{$mod}}";
    $(function(){
        $("body").click(function(event){
            //点击空白关闭联动下拉框
            if(!$(event.target).hasClass("ic-text") && !$(event.target).parent().hasClass("ic-text")){
                $(".select-action-box .select-form .ic-text .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
                $(".select-action-box .select-form .lists").hide();
            }
            //点击空白关闭动态题型下拉框
            if(!$(event.target).hasClass("ic-text-exer") && !$(event.target).parent().hasClass("ic-text-exer")){
                $(".select-action-box .select-form .ic-text-exer .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
                $(".select-action-box .select-form .lists-exer").hide();
            }
        });
    });
     //日期插件
    J(function () {
        J('.person_hw_box .fa-calendar').calendar({id: 'expiration-time', format: 'yyyy-MM-dd HH:mm'});
    });

    
</script>
</html>

