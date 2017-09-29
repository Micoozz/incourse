@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="/js/layui/css/layui.css">
<link rel="stylesheet" href="/js/layui/css/modules/laydate/default/laydate.css">
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
<style>
    .addBtnBox{
        cursor: pointer;
    }
    label.btnLabel {
        cursor: pointer;
    }
    .seeBox{
        width: 100%;
        height: 100%;
        padding: 40px 0;
        position: relative;
    }
    .jobLists{
        width: 100%;
        height: 100%;
        overflow: auto;
        padding:46px 32px 40px;
    }
    .seeHead{
        position: absolute;
        width: 100%;
        height: 40px;
        padding: 11px 20px 0;
        top: 0;
        left: 0;
    }
    .seeTitle{
        line-height: 18px;
        font-size: 14px;
        color: #419bf9;
    }
    .seeHead > div{
        width: 100%;
        height: 100%;
        border-bottom: 1px solid #d9d9d9;
        padding-bottom: 11px;
        position: relative;
    }
    .seeHead > div .deleteJobs{
        top: 0;
        right: 0;
        display: block;
    }
    .seeBottom{
        width: 100%;
        height: 40px;
        position: absolute;
        bottom: 0;
        left: 0;
    }
    .seeBottom button{
        width: 60px;
        height: 28px;
        position: absolute;
        top: 0;
        left: 50%;
        margin-left: -30px;
        border-radius: 2px;
        text-align: center;
        line-height: 28px;
        color: #fff;
        background-color: #108EE9;
    }
    .exer-list-ul li{
        padding: 5px 0;
    }
    .deleteJobs{
        position: absolute;
        top: 5px;
        right: 5px;
        width: 20px;
        height: 20px;
        display: block;
        cursor: pointer;
    }
    .deleteJobs s{
        width: 100%;
        height: 2px;
        background-color: #d9d9d9;
        display: block;
        position: absolute;
        top: 50%;
        left: 0;
        margin-top: -1px;
    }
    .deleteJobs s:nth-child(1){
        transform: rotate(45deg);
    }
    .deleteJobs s:nth-child(2){
        transform: rotate(-45deg);
    }
    code{
        background:none;
    }
</style>
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
            <span class="isMark doMark {{empty($action) ? "" : "active"}}" style="border-radius: 5px 0 0 5px;">
                <a href="/exercise/{{$class_id}}/{{$course_id}}/my-upload">我上传的</a>
            </span><span class="ls_hr"></span><span class="isMark notMark" style="border-radius: 0 5px 5px 0;">我收藏的</span>
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
                        <label class="d-b clear">
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
                    <div class="jobList">
                        <div data-id="{{$exercise->id}}" data-see="" class="exer-in-list border">
                            <div class="exer-head">
                                <span class="exer-type-list">{{$exercise->cate_title}}</span>
                                @if(empty($action))
                                <div class="f-r ic-blue addBtnBox">
                                    <input class="checkbox-add" type="checkbox" id="addCheckedBox{{ $exercise->id }}"/>
                                    <label class="btnLabel" for="addCheckedBox{{ $exercise->id }}">添加</label>
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
                                                <span data-answer="{{$answers == 1 ?'1':'0'}}" class="f-l exer-ans-order TOrF_img" style="{{$answers == 1 ? 'background-position:-22px -86px' : 'background-position:-70px -86px'}}">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $data->links() }}
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
                <span class="fs14 orange exer-num">(<span class="AllCheckedJob">0</span>/15)</span>
            </p>
            <ul data-all="" class="hw-type-list">
                <li style="display:none;"><span class='type'>单选题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                <li style="display:none;"><span class='type'>多选题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                <li style="display:none;"><span class='type'>填空题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                <li style="display:none;"><span class='type'>判断题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
                <li style="display:none;"><span class='type'>排序题</span><span class='number'>(<code style="color:#168bee;">0</code>)</span></li>
            </ul>
            <div class="ta-c">
                <a id="create-hw" class="ic-btn" data-href="/addHomework-personal/{{$class_id}}/{{$course_id}}">生成作业</a>
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
<script src="/js/layui/lay/modules/laydate.js" charset="utf-8"></script>
<script src="/js/layui/layui.js" charset="utf-8"></script>
<script>
    var sessionStorageData = eval("("+sessionStorage.getItem("addJob")+")");
    var exercises = sessionStorageData.exercise;
    var arrs = sessionStorageData.exercise;
    var num = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    function myBrowser(){
        var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
        var isOpera = userAgent.indexOf("Opera") > -1;
        if (isOpera) {return "Opera";}; //判断是否Opera浏览器
        if (userAgent.indexOf("Firefox") > -1) {return "FF";} //判断是否Firefox浏览器
        if (userAgent.indexOf("Chrome") > -1){return "Chrome";}
        if (userAgent.indexOf("Safari") > -1) {return "Safari";} //判断是否Safari浏览器
        if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {return "IE";}; //判断是否IE浏览器
    }
    var mb = myBrowser();
    if ("IE" == mb) {}
    if ("FF" == mb) {}
    if ("Chrome" == mb) {}
    if ("Opera" == mb) {}
    if ("Safari" == mb) {
        $(".exer-in-list .checkbox-add").css("top",0);
    }



    for(var i = 0;i<$(".my-exer-room-head .isMark").length;i++){
        if($(".my-exer-room-head .isMark").eq(i).hasClass("active")){
            $(".ls_hr").addClass("active");
            break;
        }
    }
    $(".exer-in-list").each(function(i){
        var li = $(".exer-in-list").eq(i).find(".radio-wrap.exer-list-ul li");
        li.each(function(k){
            li.eq(k).find("span.f-l").text(num[k]+"：");
        })
    })
    $(".sort_list").each(function(i){
        $(".sort_list").eq(i).find("span").text("排序"+num[i]+"：")
    })
    $("body").on("click", ".screen_job .ic-text-exer", function (e) {
        e.stopPropagation();
        var is_collapse = $(this).children(".fa").hasClass("fa-angle-down");
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
        var $p = $(this).parent().prev();
        $p.children("span").text($(this).text());
        $p.children(".fa").toggleClass("fa-angle-down fa-angle-up");
        $p.next("ul").toggle();
    });



    //生成作业
    $("#create-hw").on("click",function(){
        var sessionStorageData = eval("("+sessionStorage.getItem("addJob")+")");
        if(sessionStorageData){
            sessionStorage.removeItem("addJob");
            window.sessionStorage.setItem("addJob",JSON.stringify(sessionStorageData));
            window.location.href = $(this).attr("data-href");
        }
    })


    function viewHtml(data){
        var t = data.cate_title
        var html = "<div class='jobList'>"+
                        "<div data-id='"+data.id+"' data-see='' class='exer-in-list border'>"+
                            "<div class='exer-head'>"+
                                "<span class='exer-type-list'>"+t+"</span>";
        html += "<span class='deleteJobs'><s></s><s></s></span>";
        html += "</div>"+
                "<div class='exer-wrap'>"+
                    "<div class='clear'>"+
                        "<span class='f-l'>题目：</span>"+
                        "<div class='f-l question'>"+data.subject+"</div>"+
                    "</div>"+
                    "<!--答案-->"+
                    "<div class='clear answer-box'>"+
                        "<span class='f-l'>答案：</span>";
        if(t == "单选题"){
            html += "<div class='f-l'>"+
                    "<ul class='radio-wrap exer-list-ul'>";
            for(var j = 0; j < data.options.length; j++){
                for(var key in data.options[j]){
                    html +="<li>";
                    if($.inArray(JSON.parse(key),data.answer) >= 0){
                        html +="<label class='ic-radio border p-r f-l active'>"+
                                    "<i class='ic-blue-bg p-a'></i>"+
                                    "<input type='radio' name='radio' value='"+data.options[j][key]+"' checked />";
                    }else{
                        html +="<label class='ic-radio border p-r f-l'>"+
                                    "<i class='ic-blue-bg p-a'></i>"+
                                    "<input type='radio' name='radio' value='"+data.options[j][key]+"'/>";
                    }
                    html +="</label>"+
                        "<span class='f-l'></span>"+
                        "<p class='f-l option'>"+data.options[j][key]+"</p>"+
                    "</li>";
                }
            }
            html +="</ul></div>";
        }else if(t == "多选题"){
            html += "<div class='f-l'>"+
                    "<ul class='radio-wrap exer-list-ul'>"
            for(var j = 0; j < data.options.length; j++){
                for(var key in data.options[j]){
                    html +="<li>";
                    if($.inArray(JSON.parse(key),data.answer) >= 0){
                        html +="<label class='ic-radio border p-r f-l active'>"+
                                    "<i class='ic-blue-bg p-a'></i>"+
                                    "<input type='checkbox' name='checkbox' value='"+data.options[j][key]+"' checked />";
                    }else{
                        html +="<label class='ic-radio border p-r f-l'>"+
                                    "<i class='ic-blue-bg p-a'></i>"+
                                    "<input type='checkbox' name='checkbox' value='"+data.options[j][key]+"'/>";
                    }
                    html +="</label>"+
                            "<span class='f-l'></span>"+
                            "<p class='f-l option'>"+data.options[j][key]+"</p>"+
                        "</li>";
                }
            }
            html +="</ul></div>";
        }else if(t == "填空题"){
            html += "<div class='f-l'>"+
                        "<ul class='exer-list-ul'>";
            for(var j = 0; j<data.answer.length;j++){
                html += "<li>"+
                            "<span class='f-l exer-ans-order'>"+(j+1)+".</span>"+
                            "<p class='f-l option'>"+data.answer[j]+"</p>"+
                        "</li>";
            }
            html += "</ul></div>";
        }else if(t == "判断题"){
            html += "<div class='f-l'>"+
                        "<ul class='exer-list-ul'>";
            for(var j = 0; j<data.answer.length;j++){
                html += "<li>";
                if(data.answer[j] == 1){
                    html += "<span data-answer='1' class='f-l exer-ans-order TOrF_img' style='background-position:-22px -86px;'></span>";
                }else{
                    html += "<span data-answer='0' class='f-l exer-ans-order TOrF_img' style='background-position:-70px -86px'></span>";
                }
                html += "</li>";
            }
            html += "</ul></div>";
        }else if(t == "连线题"){

        }else if(t == "排序题"){
            html += "<div class='f-l'>"+
                        "<ul class='exer-list-ul'>";
            for(var j = 0;j < data.options.length;j++){
                html += "<li class='sort_list'>";
                for(var k in data.options[j]){
                    html += "<span class='f-l exer-ans-order'></span>"+
                                "<p class='f-l option'>"+data.options[j][k]+"</p>";
                }
                html += "</li>";
            }
            html += "</ul></div>";
        }
        html += "</div>"+
                    "<div class='exer-foot clear'>"+
                        "<div class='f-l'>"+
                            "<span>难易程度：</span>"+
                            "<span>"+
                                "<i class='fa fa-star active'></i>"+
                                "<i class='fa fa-star'></i>"+
                                "<i class='fa fa-star'></i>"+
                                "<i class='fa fa-star'></i>"+
                                "<i class='fa fa-star'></i>"+
                            "</span>"+
                        "</div>"
        html += "<ul class='f-r ic-inline collect'>"+
                        "<li>"+
                            "<a class='red collect'>"+
                                "<i class='fa fa-heart'></i>"+
                                "<span>665</span>"+
                            "</a>"+
                        "</li>"+
                    "</ul>"+
                    "</div></div></div></div>";
        return html;
    }

    //页面数据加载
    function sessionS(){
        if(sessionStorageData){
            $.ajax({
                url:"/getExerciseList",
                type:"POST",
                data:{'id_list':sessionStorageData.exercise,'_token':token},
                success:function(data){
                    var data = JSON.parse(data)
                    for(var i = 0; i < data.length;i++){
                        var cate_title = data[i].cate_title
                        $(".hw-type-list li").each(function(j,num){
                            if(cate_title == $(num).find(".type").text()){
                                $(num).find(".number").find("code").text(parseInt($(num).find(".number").find("code").text())+1);
                                $(num).css({display:'block'});
                            }
                        })

                    }
                },
                error:function(){}
            })
            $(".exer-in-list.border").each(function(i,list){
                for(var j=0;j<exercises.length;j++){
                    if(parseInt($(list).attr("data-id")) == exercises[j]){
                        $(list).find(".checkbox-add").attr("checked",true);
                    }
                }
            })
            $(".AllCheckedJob").text(exercises.length);

        }
    }
    sessionS()

    //选择联动
    $(".exer-in-list").find(".checkbox-add").on("click",function(){
        var that = this;
        if($(that).is(":checked")){
            $(".hw-type-list li").each(function(j,num){
                if($(that).parents(".exer-in-list").find(".exer-type-list").text() == $(num).find(".type").text()){
                    $(num).find(".number").find("code").text(parseInt($(num).find(".number").find("code").text())+1);
                    $(num).css({display:'block'});
                    arrs.push(parseInt($(that).parents(".exer-in-list").attr("data-id")));
                }
            })  
        }else{
            $(".hw-type-list li").each(function(j,num){
                if($(that).parents(".exer-in-list").find(".exer-type-list").text() == $(num).find(".type").text()){
                    $(num).find(".number").find("code").text(parseInt($(num).find(".number").find("code").text())-1);
                    for(var k = 0;k<arrs.length;k++){
                        if(parseInt($(that).parents(".exer-in-list").attr("data-id")) == arrs[k]){
                            arrs.splice(k,1);
                        }
                    }
                    if(parseInt($(num).find(".number code").text())<=0){
                        $(num).css({display:'none'});
                    }
                }
            })  
        }
        sessionStorage.removeItem("addJob");
        sessionStorage.setItem("addJob",JSON.stringify(newSessionStorageData(sessionStorageData,arrs)));
            
        $(".AllCheckedJob").text(exercises.length);
    })
    function showCheckedList(that){
        $(".hw-type-list").find("li").each(function(k,li){
            if($(that).parents(".exer-in-list").find(".exer-type-list").text() == $(li).find(".type").text()){
                if(!$(that).is(":checked")){
                    $(li).css({display:'block'});
                    $(li).find(".number code").text(parseInt($(li).find(".number code").text())-1);
                    if(parseInt($(li).find(".number code").text())<=0){
                        $(li).find(".number code").text("0");
                        $(li).css({display:"none"});
                    }
                    for(var i = 0;i<arrs.length;i++){
                        if(parseInt($(that).parents(".exer-in-list.border").attr("data-id")) == arrs[i]){
                            arrs.splice(i,1)
                        }
                    }
                }else{
                    $(li).css({display:'block'});
                    $(li).find(".number code").text(parseInt($(li).find(".number code").text())+1);
                    arrs.push(parseInt($(that).parents(".exer-in-list.border").attr("data-id")));
                }
            };
            sessionStorage.removeItem("addJob");
            sessionStorage.setItem("addJob",JSON.stringify(newSessionStorageData(sessionStorageData,arrs)));
        })
    }
    function newSessionStorageData(data,arr){
        var json = {
            "title":data.title,
            "chapter":{
                "unit":data.chapter.unit,
                "section":data.chapter.section
            },
            "deadline":data.deadline,
            "dateTime":data.dateTime,
            "rulejob":data.rulejob,
            "exercise":arr
        }
        return json
    }

    //预览
    
    $(".preview").on("click",function(){
        var html = '';
        $.ajax({
            url:"/getExerciseList",
            type:"POST",
            async: false,
            data:{'id_list':sessionStorageData.exercise,'_token':token},
            success:function(data){
                var data = JSON.parse(data)
                console.log(data)
                for(var i = 0; i < data.length;i++){
                    html += viewHtml(data[i])
                }
            }
        })
        console.log(html)
        var seeHtml = "<div class='seeBox'>"+
                        "<div class='seeHead'>"+
                            "<div>"+
                                "<span class='seeTitle'>7月20日作业</span>"+
                                "<span class='deleteJobs'><s></s><s></s></span>"+
                            "</div>"+
                        "</div>"+
                        "<div class='jobLists'>";
        seeHtml += html;
        seeHtml += "</div><div class='seeBottom'><button>完成</button></div></div>";
        layui.use("layer",function(){
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: true,
                area: ['700px', '730px'],
                content: seeHtml,
                end: function () {}
            });
            $(".seeHead > div .deleteJobs,.seeBottom button").on("click",function(){
                layui.use('layer', function(){
                    layer.closeAll();
                })
            });
            $(".jobLists .exer-in-list.border").on("click",".deleteJobs",function(){
                var id = $(this).parents(".exer-in-list.border").attr("data-id");
                var exerArr = sessionStorageData.exercise;
                var newExerArr = exerArr;
                for(var i = 0;i<exerArr.length;i++){
                    if(exerArr[i] == parseInt(id)){
                        newExerArr.splice(i,1);
                    }
                }
                $(".exer-list .jobList").each(function(k){
                    if(id == $(this).find(".exer-in-list.border").attr("data-id")){
                        $(this).find(".checkbox-add").attr("checked",false);
                        showCheckedList(this)
                        $(this).remove();
                    }
                })
                var newArr = {
                    "title":sessionStorageData.title,
                    "chapter":{
                        "unit":sessionStorageData.chapter.unit,
                        "section":sessionStorageData.chapter.section
                    },
                    "deadline":sessionStorageData.deadline,
                    "dateTime":sessionStorageData.dateTime,
                    "rulejob":sessionStorageData.rulejob,
                    "exercise":newExerArr
                }
                sessionStorage.removeItem('addJob');
                sessionStorage.setItem('addJob',JSON.stringify(newArr));
                var delText=$(this).parents(".jobLists .exer-in-list.border").find(".exer-type-list").text();
                for(var j = 0;j<$(".hw-list").find("li").length;j++){
                    var liText = $(".hw-list").find("li").eq(j).find(".type");
                    if(delText == liText.text()){
                        liText.next(".number").find("code").text(parseInt(liText.next(".number").find("code").text())-1);
                        if(parseInt(liText.next(".number").find("code").text())<=0){
                            liText.parents("li").css({display:"none"});
                        }
                    }
                }
                var parentList = $(this).parents(".exer-in-list.border")
                parentList.remove();
                $(".AllCheckedJob").text(exercises.length);
            })
        });
    })
</script>
@endsection