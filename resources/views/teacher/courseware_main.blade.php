<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>课件</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/incourseReset.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/exercise.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}"/>
    @yield('CSS:OPTIONAL')
    <style>
        .do-homework-wrap .exer-num .time {
            font-size: 14px;
            margin-left: 30px;
        }
        .do-homework-wrap .exer-num .time b {
            color: #168BEE;
            font-size: 28px;
            margin-left: 10px;
        }
        #countDowns{
            display: none;
            float: right;
        }
    </style>
</head>
<body>
<div class="fff-bg do-homework-wrap">
    @include('teacher.courseware_header')
    <!--创建班级-->

    <!--内容主体-->

    <div class="do-hw-wrap clear">
        @yield('COURSEWARE_CONTENT')
    </div>

    <div class="big-img-box d-n">
        <p>
            <i class="fa fa-times-circle-o f-r p-r"></i>
        </p>
        <img src="" alt=""/>
    </div>
</div>


<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui-sortable.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/echarts.min.js') }}" charset="utf-8"></script>
@yield('JS:OPTIONAL')
</body>
</html>