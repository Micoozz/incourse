@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
<div class="admin-container exer-room">
    <div class="my-exer-room-head">
        <a class="icon-text-btn uploadExer-btn" href="/uploadExercise/{{$class_id}}/{{$course_id}}">
            <i class="uploadExerIcons"></i>
            <span>上传习题</span>
        </a>
        <div class="f-r">
            <span class="isMark notMark">我收藏的</span>
            <span class="isMark doMark">我上传的</span>
        </div>
    </div>

    <!--全部题目-->
    <div class="p-r exercise-room">
        <!--筛选框-->
        
        <div>
            <div class="ta-c no-content">
                <img src="/images/LOGO.png" alt="" />
                <p>请先上传习题噢～</p>
            </div>
        </div>

        <!--题目列表-->
        

        <!----------- 我收藏的  ---------->
        <div class="myCollect d-n">
            <div>
                <!--题目列表-->
                <div class="exer-list">
                    <!--单选题-->
                    <div data-id="6" class="exer-in-list border">
                        <div class="exer-head">
                            <span class="exer-type-list">单选题</span>
                            <div class="f-r ic-blue">
                                <input class="checkbox-add" type="checkbox" />
                                <span>添加</span>
                            </div>
                        </div>
                        <div class="exer-wrap">
                            <div class="clear">
                                <span class="f-l">题目：</span>

                                <div class="f-l question">有三只鸟，打死一只，还剩几只？</div>
                            </div>
                            <div class="clear answer-box">
                                <span class="f-l">答案：</span>

                                <div class="f-l">
                                    <ul class="radio-wrap exer-list-ul">
                                        <li>
                                            <label class="ic-radio border p-r f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="A"/>
                                            </label>
                                            <span class="f-l">A：</span>

                                            <p class="f-l option">8只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio active border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="B" checked/>
                                            </label>
                                            <span class="f-l">B：</span>

                                            <p class="f-l option">16只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="C"/>
                                            </label>
                                            <span class="f-l">C：</span>

                                            <p class="f-l option">1只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="D"/>
                                            </label>
                                            <span class="f-l">D：</span>

                                            <p class="f-l option">2只</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                <ul class="f-r ic-inline collect">
                                    <li>
                                        <a class="red collect">
                                            <i class="fa fa-heart"></i>
                                            <span>665</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--多选题-->
                    <div data-id="7" class="exer-in-list border">
                        <div class="exer-head">
                            <span class="exer-type-list">多选题</span>
                            <div class="f-r ic-blue">
                                <input class="checkbox-add" type="checkbox" />
                                <span>添加</span>
                            </div>
                        </div>
                        <div class="exer-wrap">
                            <div class="clear">
                                <span class="f-l">题目：</span>

                                <div class="f-l question">有三只鸟，打死一只，还剩几只？</div>
                            </div>
                            <div class="clear answer-box">
                                <span class="f-l">答案：</span>

                                <div class="f-l">
                                    <ul class="radio-wrap exer-list-ul">
                                        <li>
                                            <label class="ic-radio border p-r f-l active">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="checkbox" name="checkbox" value="A" checked/>
                                            </label>
                                            <span class="f-l">A：</span>

                                            <p class="f-l option">8只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r f-l active">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="checkbox" name="checkbox" value="B" checked/>
                                            </label>
                                            <span class="f-l">B：</span>

                                            <p class="f-l option">16只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="checkbox" name="checkbox" value="C"/>
                                            </label>
                                            <span class="f-l">C：</span>

                                            <p class="f-l option">1只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="checkbox" name="checkbox" value="D"/>
                                            </label>
                                            <span class="f-l">D：</span>

                                            <p class="f-l option">2只</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                <ul class="f-r ic-inline collect">
                                    <li>
                                        <a class="red" href="">
                                            <i class="fa fa-heart"></i>
                                            <span>665</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--填空题-->
                    <div data-id="8" class="exer-in-list border">
                        <div class="exer-head">
                            <span class="exer-type-list">填空题</span>
                            <div class="f-r ic-blue">
                                <input class="checkbox-add" type="checkbox" />
                                <span>添加</span>
                            </div>
                        </div>
                        <div class="exer-wrap">
                            <div class="clear">
                                <span class="f-l">题目：</span>

                                <div class="f-l question">fgfgfgfggflgflgflhg<span class="blank-item">空1</span>hgkhghgkhlgkhlghkglhkg<span class="blank-item">空2</span>hlgkhglhkghglg khglhkghgthg hghrtedwdssdsgd ht jhyj hjhkjk jkjklh
                                </div>
                            </div>
                            <div class="clear answer-box">
                                <span class="f-l">答案：</span>

                                <div class="f-l">
                                    <ul class="exer-list-ul">
                                        <li>
                                            <span class="f-l exer-ans-order">1.</span>

                                            <p class="f-l option">primed for</p>
                                        </li>
                                        <li>
                                            <span class="f-l exer-ans-order">2.</span>

                                            <p class="f-l option">primed for</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                <ul class="f-r ic-inline collect">
                                    <li>
                                        <a class="red" href="">
                                            <i class="fa fa-heart"></i>
                                            <span>665</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--底部 + 分页-->
        <!-- <div class="exer-list-foot clear">
            <span class="ic-blue">共搜索出187道题</span>
            <ul class="f-r">
                <li>分页</li>
            </ul>
        </div> -->

        <!--添加作业 页面引导-->
        <!-- <div class="p-a guide d-n">
            <img src="../../images/exer.png" alt="" />

            <div class="p-a"></div>
        </div> -->

        <!--已添加的作业-->
        <div class="hw-list">
            <p class="title">
                <span>7月20日作业</span>
                <span class="fs14 orange exer-num">(<span>0</span>/15)</span>
            </p>
            <ul data-all="" class="hw-type-list">
                <!--
        <li>
            <span class="type">选择题</span>
            <span class="number">（1）</span>
        </li>
        <li>
            <span class="type">填空题</span>
            <span class="number">（2）</span>
        </li>
        -->
            </ul>
            <div class="ta-c">
                <a id="create-hw" class="ic-btn">生成作业</a>
                <span id="preview" class="ic-blue c-d preview">预览</span>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="/js/exercise.js" charset="utf-8"></script>
<script src="/js/blankClick.js" charset="utf-8"></script>
<script src="/js/teacher/exerRoom.js" charset="utf-8"></script>
@endsection