@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="/js/layui/css/layui.css">
<link rel="stylesheet" href="/js/layui/css/modules/laydate/default/laydate.css">
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
<link rel="stylesheet" href="/css/teacher/exercise_blade.css" />
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
<div class="admin-container exer-room" data-type="{{$action}}">
    <div class="my-exer-room-head">
        <a class="icon-text-btn uploadExer-btn" href="/uploadExercise/{{$class_id}}/{{$course_id}}">
            <i class="uploadExerIcons"></i>
            <span>上传习题</span>
        </a>
        <div class="f-r">
            <span class="isMark exerciseBbase {{empty($action) || $action == 'addCourseware' ? "active" : ""}}" style="border-radius: 5px 0 0 5px;">
                <a href="/exercise/{{$class_id}}/{{$course_id}}">习题库</a>
            </span>
            <span class="ls_hr {{$action == 'my-conllection' ? "" : "active"}}"></span>
            <span class="isMark doMark {{$action == 'my-upload' ? "active" : ""}}">
                <a href="/exercise/{{$class_id}}/{{$course_id}}/my-upload">我上传的</a>
            </span>
            <span class="ls_hr {{empty($action) || $action == 'addCourseware' ? "" : "active"}}"></span>
            <span class="isMark notMark {{$action == 'my-conllection' ? "active" : ""}}" style="border-radius: 0 5px 5px 0;">
                <a href="/exercise/{{$class_id}}/{{$course_id}}/my-conllection">我收藏的</a>
            </span>
        </div>
    </div>
    <!-- 全部题目 -->
    <div class="p-r exercise-room">
        <!-- 筛选框 -->
        @if(!$data->total())
        <div>
            <div class="ta-c no-content">
                <img src="/images/LOGO.png" alt="" />
                <p>请先上传习题噢～</p>
            </div>
        </div>

        <!-- 题目列表 -->
        @else

        <!-- 页面展示 -->
        <div class="myCollect">
            <div>
                @include('teacher.template.selector')

                <!--题目列表-->
                <div class="exer-list">

                    <!-- 单选题 -->
                    @foreach($data as $exercise)
                    <div class="jobList">
                        <div data-id="{{$exercise->id}}" data-see="" class="exer-in-list border">
                            <div class="exer-head">
                                <span class="exer-type-list">{{$exercise->cate_title}}</span><span class="isUsed" style="display:none">已使用</span>
                                @if(empty($action) || $action == 'addCourseware')
                                <div class="f-r ic-blue addBtnBox">
                                    <input class="checkbox-add" type="checkbox" id="addCheckedBox{{ $exercise->id }}"/>
                                    <label class="btnLabel" for="addCheckedBox{{ $exercise->id }}">添加</label>
                                </div>
                                @endif
                            </div>
                            <div class="exer-wrap">

                                <!-- 题目 -->
                                <div class="clear">
                                    <span class="f-l">题目：</span>
                                    <div class="f-l question">{!!$exercise->subject!!}</div>
                                </div>

                                <!--答案-->
                                @include('teacher.template.exercise_answer')

                                <!-- 答案底部 -->
                                <div class="exer-foot clear">
                                    <div class="f-l">
                                        <span>难易程度：</span>
                                        <span>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>

                                    <!-- 右下角编辑 -->
                                    @include('teacher.template.exercise_edit')
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{$data->links()}}
        @endif
        <!--添加作业 页面引导-->

        <!--已添加的作业-->
        @if(empty($action) || $action == 'addCourseware')
            <div class="hw-list">
                <p class="title">
                    <span>7月20日作业</span>
                    <span class="fs14 orange exer-num">(<span class="AllCheckedJob">0</span>/15)</span>
                </p>
                <ul data-all="" class="hw-type-list">
                    <li style="display:none;"><span class='type'>单选题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>多选题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>填空题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>判断题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>排序题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>解答题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>简答题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                    <li style="display:none;"><span class='type'>计算题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                </ul>
                <div class="ta-c">
                    <a id="create-hw" class="ic-btn">生成作业</a>
                    <span id="preview" class="ic-blue c-d preview">预览</span>
                </div>
            </div>
        @endif
    </div>
</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="/js/exercise.js" charset="utf-8"></script>
<script src="/js/blankClick.js" charset="utf-8"></script>
<script src="/js/teacher/exerRoom.js" charset="utf-8"></script>
<script src="/js/layui/lay/modules/laydate.js" charset="utf-8"></script>
<script src="/js/layui/layui.js" charset="utf-8"></script>
<script src="/js/Sortable.min.js" charset="utf-8"></script>
<script src="/js/teacher/exercise_blade.js" charset="utf-8"></script>
<script type="text/javascript">
    var class_id = "{{$class_id}}",course_id = '{{$course_id}}';
</script>
@endsection