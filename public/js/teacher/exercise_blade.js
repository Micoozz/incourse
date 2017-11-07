var sessionStorageData = eval("("+sessionStorage.getItem("addJob")+")");
var courseData;
var arrs = [];
var num = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
var data = sessionStorageData;
var operationID = $(".admin-container.exer-room").attr("data-type");
if(operationID == "addCourseware"){
    courseData = JSON.parse(window.sessionStorage.getItem("course_ware_data"));
    console.log(courseData)
    data = courseData.course_ware;
    if(courseData){
        sessionS(data)
    }
}else{
    courseData = JSON.parse(window.sessionStorage.getItem("addJob"));
    if(courseData){
        arrs = courseData.exercise;
        textEstimate(data)
        sessionS(data)
    }
}
function textEstimate(exercises){
    if(exercises.length<=0){
        $("#create-hw").text("取消");
    }else{
        $("#create-hw").text("添加到作业");
    }
}
myBrowserStyle()

$(".exer-in-list").each(function(i){
    var li = $(".exer-in-list").eq(i).find(".radio-wrap.exer-list-ul li");
    li.each(function(k){
        li.eq(k).find("span.f-l").text(num[k]+"：");
    })
})
$(".exer-list-ul").each(function(i,item){
    $(item).find(".sort_list").find("span.exer-ans-order").each(function(j,span){
        $(span).text("排序"+num[j]+"：")
    })
})
//下拉框
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

//是否收藏
$("a.collect").on("click",function(){
    if($(".admin-container.exer-room").attr("data-type") == ''){
        if($(this).hasClass("gray")){
            $(this).removeClass("gray").addClass("red");
            $(this).find("i").removeClass("fa-heart-o").addClass("fa-heart");
        }else if($(this).hasClass("red")){
            $(this).removeClass("red").addClass("gray");
            $(this).find("i").removeClass("fa-heart").addClass("fa-heart-o");
        }
    }else if($(".admin-container.exer-room").attr("data-type") == 'my-conllection'){
        $(this).parents(".jobList").remove();
    }
})
//生成作业
$("#create-hw").on("click",function(){
    if(operationID == "addCourseware"){
        window.location.href = '/courseWare/upLoadCourseware/'+class_id+"/"+course_id;
    }else{
        var sessionStorageData = eval("("+sessionStorage.getItem("addJob")+")");
        if(sessionStorageData){
            sessionStorage.removeItem("addJob");
            window.sessionStorage.setItem("addJob",JSON.stringify(sessionStorageData));
            window.location.href = '/addHomework-personal/'+class_id+"/"+course_id;
        }
    }
})

//选择联动
$(".exer-in-list").find(".checkbox-add").on("click",function(){
    checkedFunLinkage(courseData,this)
})

//点击预览
$(".preview").on("click",function(){
    var data = sessionStorageData;
    if(operationID == "addCourseware"){
        data = JSON.parse(window.sessionStorage.getItem("course_ware_data"));
        var coursewareArr = data.course_ware
        if(!data){
            return;
        }
        getLocalData(data)
    }else{
        getLocalData(data)
    }
})

function getLocalData(data){
    layui.use("layer",function(){
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: false,
            area: ['700px', '730px'],
            content: htmlModuleAssembly(data),
            scrollbar: false,
            end: function () {}
        });
        layuiEndFun(data)
    });
}

//我的上传 --> 同类型习题
$(".sameExercise").on("click",function(){
    var id = $(this).parents(".exer-in-list.border").attr("data-id");
    layui.use("layer",function(){
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            area: ['700px', '730px'],
            content: id+"同类型习题",
            scrollbar: false,
            end: function () {}
        });
    });
})

//我的上传 --> 查看解析
/*$(".viewAnalysis").on("click",function(){
    var id = $(this).parents(".exer-in-list.border").attr("data-id");
    layui.use("layer",function(){
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            area: ['700px', '730px'],
            content: id+"查看解析",
            end: function () {}
        });
    });
})*/

//我的上传 --> 删除
$(".delExercise").on("click",function(){
    var id = $(this).parents(".exer-in-list.border").attr("data-id");
    var that = this;
    $.ajax({
        url:'',
        type:'GET',
        success:function(data){
            layui.use("layer",function(){
                layer.msg('删除成功！', {offset: 't'});
            });
            $(that).parents(".jobList").remove();
        },
        error:function(){
            layui.use("layer",function(){
                layer.msg('删除失败！', {offset: 't'});
            });
        }
    })
})


//检测浏览器
function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
    var isOpera = userAgent.indexOf("Opera") > -1;
    if (isOpera) {return "Opera";}; //判断是否Opera浏览器
    if (userAgent.indexOf("Firefox") > -1) {return "FF";} //判断是否Firefox浏览器
    if (userAgent.indexOf("Chrome") > -1){return "Chrome";}
    if (userAgent.indexOf("Safari") > -1) {return "Safari";} //判断是否Safari浏览器
    if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {return "IE";}; //判断是否IE浏览器
}

//根据浏览器的不同添加样式
function myBrowserStyle(){
    var mb = myBrowser();
    if ("IE" == mb) {}
    if ("FF" == mb) {}
    if ("Chrome" == mb) {}
    if ("Opera" == mb) {}
    if ("Safari" == mb) {
        $(".exer-in-list .checkbox-add").css("top",0);
    }
}

//预览HTML模板
function viewHtml(data){
    var t = data.cate_title
    var html = "<div class='jobListSee list-group-item' data-see='"+data.id+"'>"+
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
function sessionS(data){
    if(operationID == "addCourseware"){
        var dt = JSON.parse(window.sessionStorage.getItem("course_ware_data"));
        var dataArr = dt.course_ware;
        if(dataArr.length>0){
            for(var i = 0; i < dataArr.length;i++){
                var cate_title = dataArr[i]
                $(".jobList").each(function(k,d){
                    var id = $(d).find(".exer-in-list").attr("data-id");
                    if(id == cate_title){
                        var text = $(d).find(".exer-type-list").text();
                        $(".hw-type-list li").each(function(j,num){
                            if(text == $(num).find(".type").text()){
                                $(num).find(".number").find("code").text(parseInt($(num).find(".number").find("code").text())+1);
                                $(num).css({display:'block'});
                            }
                        })
                    }
                })
            }
            getAjaxData(dataArr)
        }
    }else{
        if(data.exercise.length>0){
            var exercise = data.exercise;
            $.ajax({
                url:"/getExerciseList",
                type:"POST",
                data:{'id_list':exercise,'_token':token},
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
            getAjaxData(exercise)
        }
    }
}
function getAjaxData(exercises){
    $(".exer-in-list.border").each(function(i,list){
        for(var j=0;j<exercises.length;j++){
            if(parseInt($(list).attr("data-id")) == exercises[j]){
                $(list).find(".checkbox-add").attr("checked",true);
            }
        }
    })
    $(".AllCheckedJob").text(exercises.length);
}

//选择联动函数
function checkedFunLinkage(courseData,that){
    var dataJ , arrs,exercise;
    if(operationID != "addCourseware"){
        dataJ = JSON.parse(window.sessionStorage.getItem("course_ware_data"));
        exercise = dataJ.exercise;
        arrs = exercise;
    }else{
        dataJ = JSON.parse(window.sessionStorage.getItem("course_ware_data"));
        exercise = dataJ.exercise;
        arrs = exercise;
    }
    if(dataJ){
        if(dataJ.length>15){
            layui.use('layer',function(){
                layer.msg("最多只能选择15道题",{offset: 't'})
            });
            return;
        }
        if(dataJ.length>0){
            $("#create-hw").text("添加到作业");
        }else{
            $("#create-hw").text("取消");
        }
    }
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
    if(operationID == "addCourseware"){
        sessionStorage.removeItem("course_ware_data");
        sessionStorage.setItem("course_ware_data",JSON.stringify(newSessionStorageData1(courseData,arrs)));
        $(".AllCheckedJob").text(arrs.length);
        textEstimate(arrs)
    }else{
        sessionStorage.removeItem("addJob");
        sessionStorage.setItem("addJob",JSON.stringify(newSessionStorageData(dataJ,arrs)));
        $(".AllCheckedJob").text(exercise?exercise.length:arrs.length);
        textEstimate(exercise)
    }
}

//保存数据函数
function newSessionStorageData(data,arr){
    var json = {
        "title":data?data.title:'',
        "deadline":data?data.deadline:'',
        "dateTime":data?data.dateTime:'',
        "rulejob":data?data.rulejob:'',
        "exercise":arr
    }
    return json
}

function newSessionStorageData1(data,arr){
    var json = {
        "title":data?data.title:'',
        "content":data?data.content:'',
        "time":data?data.time:'',
        "course_ware":arr
    }
    return json
}


//预览 --> 完成函数
function sortArr (data,arrs){
    arrs = [];
    for(var s = 0;s<$(".jobListSee").length;s++){
        arrs.push(parseInt($(".jobListSee").eq(s).attr("data-see")));
    }
    sessionStorage.removeItem("addJob");
    sessionStorage.setItem("addJob",JSON.stringify(newSessionStorageData(data,arrs)));
}

//拼装的页面函数
function htmlModuleAssembly(data){
    var html = '';
    if(data){
        $.ajax({
            url:"/getExerciseList",
            type:"POST",
            async: false,
            data:{'id_list':data.exercise,'_token':token},
            success:function(data){
                var data = JSON.parse(data)
                for(var i = 0; i < data.length;i++){
                    html += viewHtml(data[i])
                }
            }
        })
    }
    var seeHtml = "<div class='seeBox'>"+
                    "<div class='seeHead'>"+
                        "<div>"+
                            "<span class='seeTitle'>7月20日作业</span>"+
                            "<span class='deleteJobs'><s></s><s></s></span>"+
                        "</div>"+
                    "</div>"+
                    "<div class='jobLists list-group' id='simpleList'>";
    seeHtml += html;
    seeHtml += "</div><div class='seeBottom'><button>完成</button></div></div>";
    return seeHtml;
}

//弹出层后执行的函数
function layuiEndFun(data){
    $(".seeHead > div .deleteJobs,.seeBottom button").on("click",function(){
        sortArr();
        layer.closeAll();
    });
    $(".jobLists .exer-in-list.border").on("click",".deleteJobs",function(){
        var id = $(this).parents(".exer-in-list.border").attr("data-id");
        var exerArr = data.exercise;
        var newExerArr = exerArr;
        for(var i = 0;i<exerArr.length;i++){
            if(exerArr[i] == parseInt(id)){
                newExerArr.splice(i,1);
            }
        }
        $(".exer-list .jobList").each(function(k,li){
            if(id == $(li).find(".exer-in-list.border").attr("data-id")){
                $(li).find(".checkbox-add").attr("checked",false);
                $(".hw-type-list").find("li").each(function(k,list){
                    if($(list).find(".type").text() == $(li).find(".exer-type-list").text()){
                        $(list).css({display:'block'});
                        $(list).find(".number code").text(parseInt($(list).find(".number code").text())-1);
                        if(parseInt($(list).find(".number code").text())<=0){
                            $(list).find(".number code").text("0");
                            $(list).css({display:"none"});
                        }
                        for(var i = 0;i<arrs.length;i++){
                            if(parseInt($(list).parents(".exer-in-list.border").attr("data-id")) == arrs[i]){
                                arrs.splice(i,1)
                            }
                        }
                    }
                })
                sessionStorage.removeItem("addJob");
                sessionStorage.setItem("addJob",JSON.stringify(newSessionStorageData(data,arrs)));
            }
        })
        $(this).parents(".jobListSee").remove();
        newSessionStorageData(data,newExerArr)
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
    Sortable.create(simpleList, {group: 'shared'});
}

function showCheckedList(data,that){
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
        sessionStorage.setItem("addJob",JSON.stringify(newSessionStorageData(data,arrs)));
    })
}