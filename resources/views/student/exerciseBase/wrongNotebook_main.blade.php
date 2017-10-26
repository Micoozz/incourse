<!doctype html>
<html>

<head>
    <title>title</title>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/incourseReset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/foundClass.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/student/questionTypes.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
    <!--圆形进度条-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/progressBar.css') }}" />
    <style>
        .homework-manage-title {
            font-size: 16px;
            padding-left: 10px;
            padding-top: 8px;
            margin: 0 -15px;
        }
        .homework-manage-title>li {
            width: 126px;
            height: 40px;
            line-height: 40px;
            text-align: center;
        }
        .homework-manage-title>li>a {
            cursor: pointer;
            display: block;
        }
        .homework-manage-title .active {
            color: #168bee;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            background-color: #fff;
        }
        .accout {
            padding: 70px 0;
        }
        .admin-container{
            margin-top: 0;
        }
        .wrongNoteBookSectionLists,.wrongNoteBookSectionLists a{
            color: #168bee;
        }
        .wrongNoteBookSectionLists a:hover{
            color: #168bee;
        }
    </style>
    <!-- Plugin -->
    @yield('CSS:OPTIONAL')
</head>
<body>
    <!-- 顶部导航 -->
    <div class="navbar">
        @include('student.template.pupilHead')
    </div>
    <div id="content">
        <!--创建班级-->
        <div class="found_class question-found_class">@include('student.template.workChoice')</div>
        <!-- MAIN -->
        <div class="content">
            <div id="center">
                <div class="container">
                    <div class="row">
                        <!--左侧栏-->
                        <div class="col-xs-12 pupilleft" id="left">@include('student.template.pupilLeft')</div>
                        <!--内容-->
                        <div class="col-xs-12 col-sm-12" id="centery">
                            <div class="files_nav">
                                <span class="col-xs-3 col-sm-3"></span>
                                <span class="col-xs-6 col-sm-6">活动内容</span>
                                <span class="col-xs-3 col-sm-3 add"></span>
                            </div>
                            <div class="ic-container accout">
                                @include('student.template.exerciseBase_listNav')
                                @yield('NOTEBOOK')
                            </div>
                        </div>
                        <!--右侧栏-->
                        <div class="col-xs-12 left">@include('student.template.right_notice')</div>
                        <!-- 聊天窗口 -->
                        <div class="chatRoom"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->


</body>
<!-- Javascript -->
<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui-sortable.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/echarts.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/layui/layui.js') }}" charset="utf-8"></script>
<!-- Plugin -->
@yield('JS:OPTIONAL')
</html>