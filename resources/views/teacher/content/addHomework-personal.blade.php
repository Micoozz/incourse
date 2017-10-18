@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
<link rel="stylesheet" type="text/css" href="/js/layui/css/layui.css">
<link rel="stylesheet" href="/js/layui/css/modules/laydate/default/laydate.css">
<link rel="stylesheet" href="/css/teacher/addHomeWork.css">
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
    <div class="person_hw_box">
        <!--个人作业-->
        <div class="person-hw">
            <div>
                <div class="clear one-line">
                    <span>作业标题：</span>
                    <div class="f-l">
                        <input class="ic-input hw-title-input" type="text"
                               placeholder=""/>
                    </div>
                </div>
                <!-- <div class="clear one-line select-action-box">
                    <span>所属章节：</span>
                
                    <div class="f-l">
                        <div class="select-wrap">
                            <div class="select-form clear">
                                <div class="ic-text-lg">
                                    <div class="shade_box"></div>
                                    <p class="ic-text">
                                        <span class="chapter">选择章篇</span>
                                        <i class="fa fa-angle-down"></i>
                                    </p>
                                    <ul class="lists unit-ul">
                                        @foreach($unit_list as $id => $title)
                                        <li class="unit-li" data="{{$id}}">{{$title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="ic-text-lg">
                                    <div class="shade_box"></div>
                                    <p class="ic-text">
                                        <span class="trifle">选择小节</span>
                                        <i class="fa fa-angle-down"></i>
                                    </p>
                                    <ul class="lists section-ul">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="clear one-line">
                    <span>截止时间：</span>
                    <div class="f-l">
                        <div id="expiration-time" class="calendar p-r">
                            <input class="ic-input expiration-time-input" name="expiration-time"
                                   type="text" placeholder="截止时间" readonly />
                            <i class="fa fa-calendar p-a gray"></i>
                        </div>
                    </div>
                </div>
                <div class="clear one-line">
                    <span>常规作业：</span>
                    <div class="f-l">
                        <textarea class="hw-content border" name=""></textarea>
                    </div>
                </div>
                <!--习题模板-->
                @include('teacher.template.addHomeWork_jobModule')
            </div>

            <!--发布、保存、取消-->
            <div class="btns">
                <button id="public" class="ic-btn public" data-type="public">
                    <i class="fa fa-paper-plane-o"></i>
                    <span>发 布</span>
                </button>
                <button id="save-person-hw" class="ic-btn" data-type="save-person-hw">保 存</button>
                <button id="cancel-person-hw" class="btn-white">取 消</button>
            </div>
        </div>
    </div>
    @include('teacher.template.addHomeWork_tips')
</div>
@endsection
@section('JS:OPTIONAL')
<script src="/js/layui/lay/modules/laydate.js" charset="utf-8"></script>
<script src="/js/layui/layui.js" charset="utf-8"></script>
<script>
    var classId =  '{{$class_id}}';
    var course =  '{{$course_id}}';
    var herf = "/teachingCenter/{{$class_id}}/{{$course_id}}";
</script>
<script src="/js/teacher/addHomeWork.js"></script>
@endsection