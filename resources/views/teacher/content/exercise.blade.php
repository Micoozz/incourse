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
            <span class="isMark notMark" style="border-radius: 0 5px 5px 0;">我收藏的</span>
            <span class="isMark doMark {{empty($action) ? "" : "active"}}" style="border-radius: 5px 0 0 5px;">
                <a href="/exercise/{{$class_id}}/{{$course_id}}/my-upload">我上传的</a>
            </span>
        </div>
    </div>

    <!--全部题目-->
    <div class="p-r exercise-room">
        <!--筛选框-->
        @if(!$data->total())
        <div>
            <div class="ta-c no-content">
                <img src="/images/LOGO.png" alt="" />
                <p>请先上传习题噢～</p>
            </div>
        </div>
        <!--题目列表-->
        @else
        <!----------- 我收藏的  ---------->
        <div class="myCollect">
            <div>
                @if($action == "my-upload")
                <div class="screen_job border">
                    <form action="" class="clear">
                        <label class="d-b clear" for="">
                            <span class="f-l label_span">条件：</span>
                            <div class="f-l">
                                <div>
                                    <p class="ic-text-exer">
                                        <span>第一章</span>
                                        <i class="fa fa-angle-down"></i>
                                    </p>
                                    <ul class="lists-exer" style="display: none;">
                                        <li data="1" class="exer-li">单选题</li>
                                        <li data="2" class="exer-li">多选题</li>
                                        <li data="3" class="exer-li">填空题</li>
                                        <li data="4" class="exer-li">判断题</li>
                                        <li data="5" class="exer-li">连线题</li>
                                        <li data="8" class="exer-li">画图题</li>
                                        <li data="9" class="exer-li">计算题</li>
                                        <li data="11" class="exer-li">解答题</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="ic-text-exer">
                                        <span>第一小节</span>
                                        <i class="fa fa-angle-down"></i>
                                    </p>
                                    <ul class="lists-exer" style="display: none;">
                                        <li data="1" class="exer-li">单选题</li>
                                        <li data="2" class="exer-li">多选题</li>
                                        <li data="3" class="exer-li">填空题</li>
                                        <li data="4" class="exer-li">判断题</li>
                                        <li data="5" class="exer-li">连线题</li>
                                        <li data="8" class="exer-li">画图题</li>
                                        <li data="9" class="exer-li">计算题</li>
                                        <li data="11" class="exer-li">解答题</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="ic-text-exer">
                                        <span>单选题</span>
                                        <i class="fa fa-angle-down"></i>
                                    </p>
                                    <ul class="lists-exer" style="display: none;">
                                        <li data="1" class="exer-li">单选题</li>
                                        <li data="2" class="exer-li">多选题</li>
                                        <li data="3" class="exer-li">填空题</li>
                                        <li data="4" class="exer-li">判断题</li>
                                        <li data="5" class="exer-li">连线题</li>
                                        <li data="8" class="exer-li">画图题</li>
                                        <li data="9" class="exer-li">计算题</li>
                                        <li data="11" class="exer-li">解答题</li>
                                    </ul>
                                </div>
                            </div>
                        </label>
                        <label class="d-b clear" for="">
                            <span class="f-l label_span">关键字：</span>
                            <div class="f-l">
                                <input class="screen_input input_focus" type="text" name="key_words" placeholder="请填写关键词">
                            </div>
                        </label>
                        <span  class="f-r btn_span">
                            <button class="btn_seek btn_select">查找</button>
                            <button class="btn_empty btn_select">清空</button>
                        </span>
                    </form>
                </div>
                @endif
                <!--题目列表-->
                <div class="exer-list">
                    <!-- 单选题 -->
                    @foreach($data as $exercise)
                    <div data-id="{{$exercise->id}}" class="exer-in-list border">
                        <div class="exer-head">
                            <span class="exer-type-list">{{$exercise->cate_title}}</span>
                            @if(empty($action))
                            <div class="f-r ic-blue">
                                <input class="checkbox-add" type="checkbox" />
                                <span>添加</span>
                            </div>
                            @endif
                        </div>
                        <div class="exer-wrap">
                            <div class="clear">
                                <span class="f-l">题目：</span>

                                <div class="f-l question">{!!$exercise->subject!!}</div>
                            </div>
                            <!--答案-->
                            <div class="clear answer-box">
                                <span class="f-l">答案：</span>
                                @if($exercise->categroy_id == 1)
                                <div class="f-l">
                                    <ul class="radio-wrap exer-list-ul">
                                        @foreach($exercise->options as $option)
                                        <li>
                                            <label class="ic-radio border p-r f-l {{in_array(key($option),$exercise->answer) ? "active" : ""}}">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="{{key($option)}}" {{in_array(key($option),$exercise->answer) ? "checked" : ""}}/>
                                            </label>
                                            <span class="f-l"></span>
                                            <p class="f-l option">{{$option[key($option)]}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @elseif($exercise->categroy_id == 2)
                                <div class="f-l">
                                    <ul class="radio-wrap exer-list-ul">
                                        @foreach($exercise->options as $option)
                                        <li>
                                            <label class="ic-radio border p-r f-l {{in_array(key($option),$exercise->answer) ? "active" : ""}}">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="checkbox" name="checkbox" value="{{key($option)}}" {{in_array(key($option),$exercise->answer) ? "checked" : ""}}/>
                                            </label>
                                            <span class="f-l"></span>
                                            <p class="f-l option">{{$option[key($option)]}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @elseif($exercise->categroy_id == 3)
                                <div class="f-l">
                                    <ul class="exer-list-ul">
                                        @foreach($exercise->answer as $answers)
                                        <li>
                                            <span class="f-l exer-ans-order">{{$loop->index + 1}}.</span>
                                            <p class="f-l option">{{$answers}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @elseif($exercise->categroy_id == 4)
                                <div class="f-l">
                                    <ul class="exer-list-ul">
                                        @foreach($exercise->answer as $answers)
                                        <li>
                                            <span class="f-l exer-ans-order TOrF_img" style="{{$answers == 0 ? 'background-position:-22px -86px' : 'background-position:-70px -86px'}}">
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @elseif($exercise->categroy_id == 5)
                                @elseif($exercise->categroy_id == 6)
                                <div class="f-l">
                                    <ul class="exer-list-ul">
                                        @foreach($exercise->options as $key => $option)
                                        <li class="sort_list">
                                            @foreach($option as $optionList)
                                            <span class="f-l exer-ans-order"></span>
                                            <p class="f-l option">{{$optionList}}</p>
                                            @endforeach
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
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
                                @if(empty($action))
                                <ul class="f-r ic-inline collect">
                                    <li>
                                        <a class="red collect">
                                            <i class="fa fa-heart"></i>
                                            <span>665</span>
                                        </a>
                                    </li>
                                </ul>
                                @elseif($action == "my-upload")
                                <ul class="f-r ic-inline collect">
                                    <li>
                                        <a href="1" class="ic-blue collect operation_job"><i class="fa fa-copy"></i><span>同类型习题</span></a>
                                        <a href="2" class="ic-blue collect operation_job"><i class="fa fa-eye"></i><span>查看解析</span></a>
                                        <a href="/uploadExercise/{{$class_id}}/{{$course_id}}/{{$exercise->id}}" class="ic-blue collect operation_job"><i class="fa fa-pencil"></i><span>编辑</span></a>
                                        <a href="4" class="ic-blue collect operation_job"><i class="fa fa-trash"></i><span>删除</span></a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
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
        @endif
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
<script>
    var num = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    $(".exer-in-list").each(function(i){
        let li = $(".exer-in-list").eq(i).find(".radio-wrap.exer-list-ul li");
        li.each(function(j){
            li.eq(j).find("span.f-l").text(num[j]+"：")
        })
    })
    $(".sort_list").each(function(i){
        $(".sort_list").eq(i).find("span").text("排序"+num[i]+"：")
    })
    function edit_job(){
        $("body").on("click", ".dan-xuan-only .ic-radio", function (event) {
            event.preventDefault();
            $(this).parents(".dan-xuan-options").find(".ic-radio").removeClass("active");
            $(this).addClass("active");
            $(this).children("input").prop("checked",true);
        });

        /*多选题选中*/
        $("body").on("click", ".duo-xuan-only .ic-radio", function (event) {
            event.preventDefault();
            $(this).toggleClass("active");
        });
    }
    $("body").on("click", ".screen_job .ic-text-exer", function (e) {
        e.stopPropagation();
        let is_collapse = $(this).children(".fa").hasClass("fa-angle-down");
        $(".screen_job .ic-text-exer .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
        $(".screen_job .lists-exer").hide();

        if (is_collapse) {
            $(this).children(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");
            $(this).next("ul").show();
        } else {
            $(this).children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
            $(this).next("ul").hide();
        }
        $("body").one("click", function () {
            $(".screen_job .ic-text-exer .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
            $(".screen_job .lists-exer").hide();
        })
    });
    $("body").on("click", ".screen_job .lists-exer>li", function () {
        let $p = $(this).parent().prev();
        $p.children("span").text($(this).text());
        $p.children(".fa").toggleClass("fa-angle-down fa-angle-up");
        $p.next("ul").toggle();
    });
</script>
@endsection