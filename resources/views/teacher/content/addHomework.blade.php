@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<style>
#content > a{
    width:60px;
    height:75px;
    display:inline-block;
    margin-right:50px;
}
.checkJob{
    float:left;
    width:60px;
    height:75px;
    display:block;
}
.checkPersonal{
    background-image:url("/images/icons.png");
    background-repeat:no-repeat;
    background-position: -33px -120px;
}
.checkTrem{
    background-image:url("/images/icons.png");
    background-repeat:no-repeat;
    background-position: -147px -120px;
}
#content > a:hover .checkPersonal{
    background-position: -33px -29px;
}
#content > a:hover .checkTrem{
    background-position: -145px -29px;
}
</style>
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
<div id="content" style="margin:0;padding:5%;text-align: center;line-height: 400px">
	<a href="/addHomework-personal/{{$class_id}}/{{$course_id}}"><span class="checkJob checkPersonal"></span></a>
	<a><span class="checkJob checkTrem"></span></a>
</div>
</div>
@endsection

@section('JS:OPTIONAL')

@endsection