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
    <link href="{{ asset('js/layui/css/layui.css') }}" rel="stylesheet">
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
    @yield('COURSEWARE_CONTENT')
</div>


<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui-sortable.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/echarts.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/layui/layui.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    var token = "{{csrf_token()}}";
</script>
@yield('JS:OPTIONAL')
</body>
</html>