@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
<link rel="stylesheet" type="text/css" href="/js/layui/css/layui.css">
<link rel="stylesheet" href="/js/layui/css/modules/laydate/default/laydate.css">
<style>
    p{
        margin: 0 0 10px;
    }
    .disSelsect{
        padding-top: 10px;
        overflow: hidden;
        transition: height 0.5s;
        cursor: default;
    }
    .disSelsect.active{
        height: 0!important;
    }
    .work_tbody tr td{
        vertical-align:top;
    }
    .answer_span{
        margin-right:20px;
    }
    .pan-duan i {
        width: 24px;
        height: 24px;
        margin-right: 5px;
        background-position: -20px -50px;
    }
    .rightActive .right {
        background-position: -22px -86px;
    }
    .wrongActive .wrong {
        background-position: -70px -86px;
    }
    .ic-blueB-btn.personHw:hover {
        background-color: #E0EEFF;
    }
    .tdBtn{
        cursor: pointer;
    }
    .deleteText{
        width:24px;
        cursor: pointer;
        text-align: center;
    }
    .tipIcon{
        display: inline-block;
        width: 24px;
        height: 24px;
        position: relative;
        top: 8px;
        margin-right: 10px;
    }
    #tips{
        display:none;
    }
    .tips{
        width:100%;
        height:246px;
        position: relative;
    }
    .tipTitleBox{
        width: 100%;
        text-align: center;
        padding: 16px 0;
    }
    .tipsTitle{
        width:70px;
        height:19px;
        line-height: 19px;
        color: #3dbd7d;
        display: inline-block;
    }
    .tipClassBox{
        width: 100%;
        padding: 0 32px;
        height: auto;
        overflow: hidden;
    }
    .TheClass{
        float: left;
    }
    .TheClassTitle{
        width: 60px;
        height: auto;
        line-height: 24px;
        margin-right: 20px;
        font-size: 12px;
    }
    .TheClassCheck{
        width: 456px;
        height: auto;
        max-height: 128px;
        overflow: hidden;
        font-size: 12px;
    }
    .TheClassCheck ul{
        width: 100%;
        height: auto;
        overflow: hidden;
    }
    .TheClassCheck ul li{
        display: inline-block;
        width: 62px;
        height: 24px;
        margin-right: 20px;
        text-align: center;
        line-height: 24px;
        cursor: pointer;
        border-radius: 2px;
    }
    .TheClassCheck ul li.active,.TheClassCheck ul li:hover{
        background:#e0eeff;
    }
    .classFooterBtn{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 67px;
        padding-bottom: 40px;
        text-align: center;
    }
    .classBtnBox{
        width: 160px;
        height: 27px;
        line-height: 27px;
        position: absolute;
        top: 0;
        left: 50%;
        margin-left: -80px;
    }
    .classBtnBox button{
        width: 68px;
        height: 27px;
        border: 1px solid #d9d9d9;
        text-align: center;
        line-height: 27px;
        font-size: 12px;
        border-radius: 4px;
    }
    .relayClass{
        border: none;
        background-color: #419bf9;
        float: left;
        color: #fff;
    }
    .unpublishing{
        float: right;
    }
</style>
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
                               placeholder="作业标题"/>
                    </div>
                </div>
                <div class="clear one-line select-action-box">
                    <span>所属章节：</span>

                    <div class="f-l">
                        <div class="select-wrap">
                            <div class="select-form clear">
                                <div class="ic-text-lg">
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
                </div>
                <div class="clear one-line">
                    <span>截止时间：</span>

                    <div class="f-l">
                        <div class="calendar p-r">
                            <input id="expiration-time" class="ic-input" name="expiration-time"
                                   type="text" placeholder="截止时间"/>
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
                <div class="clear one-line">
                    <span>添加习题：</span>

                    <!--有习题的模板-->
                    <div class="has-exer">
                        <table class="d-b of-h border person-exer-list">
                            <thead class="d-b">
                                <tr>
                                    <th>
                                        <input id="all-checked" type="checkbox"/>
                                        <span>序号</span>
                                    </th>
                                    <th>题型</th>
                                    <th>题目</th>
                                    <th>2/15 题</th>
                                </tr>
                            </thead>
                            <tbody class="d-b work_tbody">
                            </tbody>
                        </table>
                        <div class="ta-c border tfoot">
                            <button class="f-l addExerBtn ic-blue c-d blue-hover">
                                <i class="p-r fa fa-trash-o"></i>
                                <span id="delete-personHw">删除</span>
                            </button>
                        </div>
                    </div>

                    <!--没习题的模板-->
                    <div class="f-l p-r no-exer">
                        <a id="personHw-uploadExer" class="ic-blueB-btn personHw" data-href="/uploadExercise/{{$class_id}}/{{$course_id}}/workUpLoad">上传习题</a>
                        <a id="personHw-checkExercise" class="ic-blueB-btn personHw" data-href="/exercise/{{$class_id}}/{{$course_id}}">题库选题</a>

                        <!--"添加习题" 页面引导-->
                        <!-- <div class="p-a guide">
                            <img src="../../images/add_exer.jpg" alt=""/>

                            <div class="p-a"></div>
                        </div> -->
                    </div>
                </div>
            </div>

            <!--发布、保存、取消-->
            <div class="btns">
                <button id="public" class="ic-btn public">
                    <i class="fa fa-paper-plane-o"></i>
                    <span>发 布</span>
                </button>
                <button id="save-person-hw" class="ic-btn">保 存</button>
                <button id="cancel-person-hw" class="btn-white">取 消</button>
            </div>

            <!--离开页面的确认弹出框-->
            <div class="delete-modal d-n">
                <div class="clear">
                    <i class="fa fa-exclamation-circle f-l"></i>

                    <div class="f-l ic-text">
                        <p class="msg">确认要离开当前页面吗？</p>

                        <p class="words">您输入的内容将不会被保存。您确定要离开当前页面吗？</p>
                    </div>
                </div>
                <div class="btns">
                    <div class="f-r">
                        <button class="btn-white">取 消</button>
                        <button id="cancelCreateHw" class="ic-btn">确 定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tips">
        <div class="tips">
            <div class="tipTitleBox">
                <span class="tipsTitle">转发给班级</span>
            </div>
            <div class="tipClassBox">
                <div class="TheClass TheClassTitle"><span>任课班级</span></div>
                <div class="TheClass TheClassCheck">
                    <ul>
                        <li class="classList active">一年一班</li>
                        <li class="classList">一年一班</li>
                        <li class="classList">一年一班</li>
                        <li class="classList">一年一班</li>
                        <li class="classList">一年一班</li>
                    </ul>
                </div>
            </div>
            <div class="classFooterBtn">
                <div class="classBtnBox">
                    <button class="relayClass">转发</button>
                    <button class="unpublishing">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JS:OPTIONAL')
<script src="/js/layui/lay/modules/laydate.js" charset="utf-8"></script>
<script src="/js/layui/layui.js" charset="utf-8"></script>

<script>

    //获取当前时间
    function CurentTime(){
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var day = now.getDate();
        var hh = now.getHours();
        var mm = now.getMinutes();
        var clock = year + "-";
        if(month < 10){clock += "0";}
        clock += month + "-";
        if(day < 10){clock += "0";}
        clock += day + " ";
        if(hh < 10){clock += "0";}
        clock += hh + ":";
        if (mm < 10) clock += '0';
        clock += mm;
        return(clock);
    }
    //截止时间默认显示
    $("#expiration-time").val(CurentTime());

    //时间戳
    function stringToTimeStamp(time){
        var timeStamp = Date.parse(new Date(time));
        newTimeStamp = timeStamp / 1000;
        return newTimeStamp
    }

    //时间插件
    laydate.render({
        elem: '#expiration-time',
        min: CurentTime(),
        type: 'datetime',
        format: 'yyyy-MM-dd H:m'
    });

    //选择章节并获取小节数据
    $(".select-form.clear .unit-ul .unit-li").click(function(){
        let child_span = $(".chapter");
        let parent_ul = $(this).parents(".select-form.clear").find(".ic-text").next(".lists.section-ul");
        child_span.attr("data-u",$(this).attr("data"));
        parent_ul.html("");
        $.get("/getSectionAjax/"+$(this).attr("data"),function(result){
            $.each(result,function(index,value,array){
                parent_ul.append("<li class='section-li' data='"+index+"'>"+value+"</li>");
            })
        });
    });

    //上传习题
    $("#personHw-uploadExer").click(function(){
        setStorage(this)
    })

    //点击上传习题和题库选题函数
    function setStorage(obj){
        var objJson={}
        let sessionStorageD=eval("("+sessionStorage.getItem("addJob")+")")
        if(sessionStorageD){
            objJson=sessionStorageD
        }else{
            objJson={
                'title':$(".ic-input.hw-title-input").val(),
                'chapter':{
                    'unit':$(".chapter").attr("data-u")?$(".chapter").attr("data-u"):"",
                    'section':$(".trifle").attr("data-s")?$(".trifle").attr("data-s"):"",
                },
                "deadline":stringToTimeStamp($("#expiration-time").val()),
                "dateTime":$("#expiration-time").val(),
                "rulejob":$(".hw-content.border").val(),
                'exercise':[]
            }
        }

        if(!$(".chapter").attr("data-u")){
            alert("请填写所属章节");
            return;
        }else if(!$(".trifle").attr("data-s")){
            alert("请填写所属小节");
            return;
        }
        let href = $(obj).attr("data-href");
        window.location.href = href;
        window.sessionStorage.setItem("addJob", JSON.stringify(objJson));
    }

    //题库选题
    $("#personHw-checkExercise").click(function(){
        setStorage(this);
    })

    //获取本地sessionStorage数据
    let sessionStorageData = eval("("+sessionStorage.getItem("addJob")+")");

    //删除习题
    let exerciseArr = sessionStorageData.exercise

    //删除习题
    $("#delete-personHw").click(function(){
        let newArr = exerciseArr;
        $(".spread.tdBtn").each(function(i,trList){
            if($(trList).find(".checkJob").is(":checked")){
                for(let j = 0;j<exerciseArr.length;j++){
                    if(exerciseArr[j] == $(trList).attr("data-id")){
                        newArr.splice(j,1)
                    }
                }
                $(trList).remove();
            }
        })
        sessionStorage.removeItem("addJob");
        let sessionStorageJson={
            'title':sessionStorageData.title,
            'chapter':{
                'unit':sessionStorageData.chapter.unit,
                'section':sessionStorageData.chapter.section,
            },
            "deadline":sessionStorageData.deadline,
            "dateTime":sessionStorageData.dateTime,
            "rulejob":sessionStorageData.rulejob,
            'exercise':newArr
        }
        sessionStorage.setItem("addJob",JSON.stringify(sessionStorageJson))
    })

    //页面加载数据 id
    let getWork={
        "id_list":sessionStorageData?sessionStorageData.exercise:'',
        "_token":token
    }

    //选中的习题的展示HTML框架
    function htmlModule(data,i){
        let html,ENNum = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        html = "<tr data-id='"+data.id+"' class='spread tdBtn'>" +
               "<td>" +
                   "<input class='checkJob' type='checkbox' id='deleteJob"+i+"'/>" +
                   "<label class='deleteText' for='deleteJob"+i+"'>"+(i+1)+"</label>" +
               "</td>";
        html += "<td class='personHw-type'>"+data.cate_title+"</td>";
        html += "<td>" +
            "<span>"+data.subject+"</span>" +
            "<div class='disSelsect active'>" +
            "<ul class='radio-wrap exer-list-ul'>";
            if(data.cate_title == "单选题" || data.cate_title == "多选题"){
                let num = 0;
                for(let s=0;s<data.options.length;s++){
                    for(let j in data.options[s]){
                        let item = data.options[s][j];
                        let classTrue=false;
                        for(let k = 0; k<data.answer.length;k++){
                            if(j == data.answer[k]){
                                classTrue=true;
                            }
                        }
                        if(classTrue){
                            html += "<li>"+
                                "<label class='ic-radio border p-r f-l active'>"+
                                    "<i class='ic-blue-bg p-a'></i>"+
                                    "<input type='radio' name='radio' value='"+j+"'/>"+
                                "</label>"+
                                "<span class='f-l'>"+ENNum[num]+"：</span>"+
                                "<p class='f-l option'>"+item+"</p>"+
                            "</li>";
                        }else{
                            html += "<li>"+
                                "<label class='ic-radio border p-r f-l'>"+
                                    "<i class='ic-blue-bg p-a'></i>"+
                                    "<input type='radio' name='radio' value='"+j+"'/>"+
                                "</label>"+
                                "<span class='f-l'>"+ENNum[num]+"：</span>"+
                                "<p class='f-l option'>"+item+"</p>"+
                            "</li>";
                        }
                        num++;
                    }
                }
                num=0
            }else if(data.cate_title == "判断题" || data.cate_title == "填空题"){
                html += "<li>";
                if(data.cate_title == "填空题"){
                    for(let l = 0;l<data.answer.length;l++){
                        html += "<span class='answer_span'>答案"+ENNum[l]+":"+data.answer[l]+"</span>";
                    }
                }else if(data.cate_title == "判断题"){
                    if(data.answer[0]==1){
                        html += "<div class='pan-duan rightActive'>";
                    }else{
                        html += "<div class='pan-duan wrongActive'>";
                    }
                    html += "<i class='uploadExerIcons right' style='top:0;'></i><i class='uploadExerIcons wrong' style='top:0;'></i></div>";
                }
                html += "</li>";
            }else if(data.cate_title == "排序题"){
                html += "<li>";
                for(let x = 0; x<data.options.length;x++){
                    for(let key in data.options[x]){
                        html += "<span class='answer_span'>排序"+(x+1)+":"+data.options[x][key]+"</span>";
                    }
                }
                html += "</li>";
            }
        html += "</ul>"+
            "</div>"+
            "</td>"+
            "<td valign='top'><i class='fa is-spread fa-angle-down'></i></td>"
            "</tr>";
        return html;
    }

    //页面加载本地数据
    if(sessionStorageData){
        $.ajax({
            url:"/getExerciseList",
            data:getWork,
            type:"POST",
            success:function(data){
                data = JSON.parse(data);
                for(let i=0;i<data.length;i++){
                    $(".work_tbody").append(htmlModule(data[i],i));
                }
                $(".disSelsect").each(function(){
                    $(this).css({height:($(this).find("ul").height()+10)});
                });
                $(".tdBtn").click(function(e){
                    e.stopPropagation();
                    $(".disSelsect").click(function(){
                        return false;
                    });
                    $(this).find(".disSelsect").toggleClass("active");
                    if($(this).find(".disSelsect").hasClass("active")){
                        $(this).find(".fa.is-spread").removeClass("fa-angle-up").addClass("fa-angle-down");
                    }else{
                        $(this).find(".fa.is-spread").removeClass("fa-angle-down").addClass("fa-angle-up");
                    }
                });
                $("#all-checked").click(function(){
                    $(".spread.tdBtn").each(function(j,trList){
                        $(this).find(".checkJob").attr("checked",true);
                    })
                })
            }
        })
        $(".ic-input.hw-title-input").val(sessionStorageData.title);
        let parent_ul = $(".trifle").parent().next(".lists.section-ul");
        parent_ul.html("");
        $(".select-form.clear .unit-ul .unit-li").each(function(i,item){
            if($(item).attr("data") == sessionStorageData.chapter.unit){
                $(".chapter").text($(item).text()).attr("data-u",sessionStorageData.chapter.unit);
                $.get("/getSectionAjax/"+$(item).attr("data"),function(result){
                    $.each(result,function(index,value,array){
                        parent_ul.append("<li class='section-li' data='"+index+"'>"+value+"</li>");
                    })
                    $(".lists.section-ul .section-li").each(function(j,list){
                        if($(list).attr("data") == sessionStorageData.chapter.section){
                            $(".trifle").text($(list).text()).attr("data-s",sessionStorageData.chapter.section);
                        }
                    })
                });
            }
        })
        $("#expiration-time").val(sessionStorageData.dateTime);
        $(".hw-content.border").val(sessionStorageData.rulejob)
    }

    //必填
    function mustWrist(){
        if(!$(".ic-input.hw-title-input").val()){
            alert("请填写作业标题");
            return;
        }
    }

    //保存
    $("#save-person-hw").click(function(){
        publicClick("");
        $.ajax({
            url:"/createJob",
            type:"POST",
            data:lastJob,
            success:function(data){
                window.sessionStorage.removeItem("addJob");
            }
        })
    });



    //发布
    $("#public").click(function(){
        let classId = "{{$class_id}}"
        publicClick(classId);
        layui.use('layer', function(){
            layer.open({
                type: 1,
                title: "<span class='pan-duan rightActive tipIcon'><i class='uploadExerIcons right' style='top:0;'></i></span><span style='color:#3dbd7d;'>发布成功</span>",
                closeBtn: 0,
                shadeClose: true,
                area: ['600px', '300px'],
                content: $("#tips").html()
            });
            $(".TheClassCheck").on("click",'.classList',function(){
                $(this).toggleClass("active");
            });
            $(".unpublishing").on("click",function(){
                layui.use('layer', function(){
                    layer.closeAll();
                })
            })
        })
        //$.ajax({
        //    url:"/pubJob",
        //    type:"POST",
        //    data:lastJob,
        //    success:function(data){
        //        window.sessionStorage.removeItem("addJob");
        //    }
        //})
    });

    //保存发布函数
    function publicClick(classId){
        mustWrist();
        let upLoadJob = eval("("+sessionStorage.getItem("addJob")+")");
        let courseId = "{{$course_id}}"
        let lastJob = {
            'chapter':{
                'unit':upLoadJob.chapter.unit,
                'section':upLoadJob.chapter.section,
            },
            "course":courseId,
            "type":1,
            "title":upLoadJob.title,
            "exercise_id":upLoadJob.exercise,
            "deadline":upLoadJob.deadline,
            "_token":token
        }
        if(classId!=""){
            lastJob.classId=classId;
        }
    }

    //取消
    $("#cancel-person-hw").click(function(){
        window.sessionStorage.removeItem("addJob");
        window.history.back();
    });
</script>
@endsection