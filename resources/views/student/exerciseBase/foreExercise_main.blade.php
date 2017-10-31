<!doctype html>
<html>

<head>
    <title>习题册</title>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/incourseReset.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/exercise.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}"/>
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
    </style>
    <!-- Plugin -->
    @yield('CSS:OPTIONAL')
</head>
<body>
    <div class="fff-bg do-homework-wrap">
        @include('student.template.foreExercise_head')
        @yield('FOREEXERCISE')
    </div>
    <!-- END CONTENT -->
</body>
<!-- Javascript -->
<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui-sortable.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/layui/layui.js') }}" charset="utf-8"></script>
<!-- Plugin -->
@yield('JS:OPTIONAL')
</html>