@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
<div id="content" style="margin:0;padding:5%;text-align: center;line-height: 400px">
	<a href=""><img src="/images/teacher-icons/personalhomework_icon_default.png"></a>
	<a><img src="/images/teacher-icons/teamwork_default_icon.png"></a>
</div>
</div>
@endsection

@section('JS:OPTIONAL')

@endsection