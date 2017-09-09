@extends('extends-main')

@section('CSS:OPTIONAL')

@endsection

@section('CLIENT')
	<div class="container homeWork-head">
        <div class="row">
            <div class="col-md-3 col-xs-12 cent_nav">
                <ul class="col-md-12 col-xs-12">
                    <li><a class="p-r of-h class-teacher" href="">1</a></li>
                </ul>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <div id="center">
        <div class="container p-r">
            <div class="row">
                <!--左侧栏-->
                <div class="col-xs-12 " id="left">
                	 <ul class="nav1 nav" id="nav1">
                        <li><a href="" num='1'>作业管理</a></li>
                        <li><a href="" num='2'>我的题库</a></li>
                        <li><a href="" num='3'>资料库</a></li>
                        <li><a href="" num='4'>班级管理</a></li>
                        <li><a href="" num='5'>成绩管理</a></li>
                        <li><a href="" num='6'>课程大纲</a></li>
                        <li><a href="" num='7'>课堂课件</a></li>
                    </ul>
                </div>
                <!--内容-->
                <div class="col-xs-12 col-sm-12 exerManage" id="centery">
                	@yield('CONTENT')
                </div>
                <div class="col-xs-12 left"> 
                @include('teacher.header.right_nav')
                </div>
            </div>

        </div>
    </div>

@endsection

@section('JS:OPTIONAL')

@endsection