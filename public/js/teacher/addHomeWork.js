//获取本地sessionStorage数据
var sessionStorageData = eval("("+sessionStorage.getItem("addJob")+")");
//页面加载数据 id
var getWork={"id_list":sessionStorageData?sessionStorageData.exercise:'',"_token":token}
var ENNum = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
var isSave = true;
var isPublic = true;
var textareaPrompt = "例如：1、背诵课文《陋室铭》\n           2、抄写成语100遍\n           3、给妈妈洗脚";

//根据浏览器实现不同样式
myBrowserStyle()

//页面表单默认显示
$(".hw-content.border").attr("placeholder",textareaPrompt)
$(".hw-title-input").attr("placeholder",(titlePrompt()+"作业"))

//截止时间默认显示
var timeVal = "";

//日历表
layui.use("laydate",function(){
    var laydate = layui.laydate;
    laydate.render({
        elem: '#expiration-time .expiration-time-input',
        min: CurentTime(),
        type: 'datetime',
        format: 'yyyy-MM-dd H:m'
    });
})

//页面加载本地数据 + 删除习题
if(sessionStorageData){
    getLocalData(sessionStorageData)
    delJob(sessionStorageData)
    $("#expiration-time .expiration-time-input").val(sessionStorageData.dateTime == ""?CurentTime():sessionStorageData.dateTime);
}else{
    $("#expiration-time .expiration-time-input").val(CurentTime());
}

//上传习题
$("#personHw-uploadExer").click(function(){
    var that = this;
    setStorage(that)
})
//题库选题
$("#personHw-checkExercise").click(function(){
    var that = this
    setStorage(that);
})

//保存
$("#save-person-hw").click(function(){
    if(!isSave){
        return;
    }
    isSave = false;
    saveoOrPublicJob(isSave,sessionStorage,this)
});
//发布
$("#public").click(function(){
    if(!isPublic){
        return;
    }
    isPublic = false;
    saveoOrPublicJob(isPublic,sessionStorage,this)
});

//取消
$("#cancel-person-hw").click(function(){
    layui.use("layer",function(){
        layer.confirm('确认要离开当前页面吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            window.sessionStorage.removeItem("addJob");
            window.location.href = herf;
        }, function(){});
    })
});

//选择章节并获取小节数据
$(".select-form.clear .unit-ul .unit-li").click(function(){
    getSection(this)
});

//根据浏览器实现不同样式
function myBrowserStyle(){
    var mb = myBrowser();
    if ("IE" == mb) {}
    if ("FF" == mb) {}
    if ("Chrome" == mb) {}
    if ("Opera" == mb) {}
    if ("Safari" == mb) {
        $(".layui-laydate-content td,.layui-laydate-content th").css("padding",0);
    }
}

//判断浏览器
function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
    var isOpera = userAgent.indexOf("Opera") > -1;
    if (isOpera) {return "Opera";}; //判断是否Opera浏览器
    if (userAgent.indexOf("Firefox") > -1) {return "FF";} //判断是否Firefox浏览器
    if (userAgent.indexOf("Chrome") > -1){return "Chrome";}
    if (userAgent.indexOf("Safari") > -1) {return "Safari";} //判断是否Safari浏览器
    if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {return "IE";}; //判断是否IE浏览器
}
//获取当前时间 --> 年月日时分
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

//获取当前时间 --> 月日
function titlePrompt(){
    var mAd="";
    var now = new Date();
    var month = (now.getMonth() + 1) +"月";
    var day = now.getDate() + "日";
    mAd = month + day
    return mAd
}

//时间戳
function stringToTimeStamp(time){
    var timeStamp = Date.parse(new Date(time));
    newTimeStamp = timeStamp / 1000;
    return newTimeStamp
}

//获取小节函数
function getSection(obj){
    var child_span = $(".chapter");
    var parent_ul = $(obj).parents(".select-form.clear").find(".ic-text").next(".lists.section-ul");
    child_span.attr("data-u",$(obj).attr("data"));
    parent_ul.html("");
    $.get("/getSectionAjax/"+$(obj).attr("data"),function(result){
        $.each(result,function(index,value,array){
            parent_ul.append("<li class='section-li' data='"+index+"'>"+value+"</li>");
        })
    });
}

//点击上传习题和题库选题函数
function setStorage(obj){
    var objJson={}
    var sessionStorageD=eval("("+sessionStorage.getItem("addJob")+")")
    if(sessionStorageD){
        objJson={
            'title':$(".ic-input.hw-title-input").val() == ""?sessionStorageD.title:$(".ic-input.hw-title-input").val(),
            "deadline":stringToTimeStamp($("#expiration-time .expiration-time-input").val()) == ""?sessionStorageD.deadline:stringToTimeStamp($("#expiration-time .expiration-time-input").val()),
            "dateTime":$("#expiration-time .expiration-time-input").val() == "" ? sessionStorageD.dateTime:$("#expiration-time .expiration-time-input").val(),
            "rulejob":$(".hw-content.border").val() == "" ?sessionStorageD.rulejob:$(".hw-content.border").val(),
            'exercise':sessionStorageD.exercise
        }
    }else{
        objJson={
            'title':$(".ic-input.hw-title-input").val(),
            "deadline":stringToTimeStamp($("#expiration-time .expiration-time-input").val()),
            "dateTime":$("#expiration-time .expiration-time-input").val(),
            "rulejob":$(".hw-content.border").val(),
            'exercise':[]
        }
    }
    var href = $(obj).attr("data-href");
    sessionStorage.removeItem("addJob")
    sessionStorage.setItem("addJob", JSON.stringify(objJson));
    window.location.href = href;
}

//删除习题函数
function delJob(sessionStorageData){
    var exerciseArr = sessionStorageData.exercise;
    $(".jobNum").text(exerciseArr.length+"/15题")
    //删除习题
    $("#delete-personHw").click(function(){
        var newArr = exerciseArr;
        $(".spread.tdBtn").each(function(i,trList){
            if($(trList).find(".checkJob").is(":checked")){
                for(var j = 0;j<exerciseArr.length;j++){
                    if(exerciseArr[j] == $(trList).attr("data-id")){
                        newArr.splice(j,1)
                    }
                }
                $(trList).remove();
            }
        })
        if(newArr == 0){
            $("#all-checked").attr("checked",false);
        }
        sessionStorage.removeItem("addJob");
        var sessionStorageJson={
            'title':sessionStorageData.title,
            "deadline":sessionStorageData.deadline,
            "dateTime":sessionStorageData.dateTime,
            "rulejob":sessionStorageData.rulejob,
            'exercise':newArr
        }
        sessionStorage.setItem("addJob",JSON.stringify(sessionStorageJson))
        $(".jobNum").text(exerciseArr.length+"/15题")
    })
}

//选中的习题的展示HTML框架
function htmlModule(ENNum,data,i){
    var html;
    html = "<tr data-id='"+data.id+"' class='spread tdBtn'>" +
           "<td>" +
               "<input class='checkJob' type='checkbox' id='deleteJob"+i+"'/>" +
               "<label class='deleteText' for='deleteJob"+i+"'>"+(i+1)+"</label>" +
           "</td>";
    html += "<td class='personHw-type'>"+data.cate_title+"</td>";
    html += "<td>" +
        "<span class='subject_box subject_box_noActive'>"+data.subject+"</span><div class='disSelsectBox' style='height: 0;'>" +
        "<div class='disSelsect active'>" +
        "<ul class='radio-wrap exer-list-ul'>";
        if(data.cate_title == "单选题" || data.cate_title == "多选题"){
            var num = 0;
            for(var s=0;s<data.options.length;s++){
                for(var j in data.options[s]){
                    var item = data.options[s][j];
                    var classTrue=false;
                    for(var k = 0; k<data.answer.length;k++){
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
                for(var l = 0;l<data.answer.length;l++){
                    html += "<span class='answer_span'>答案"+ENNum[l]+":"+data.answer[l]+"</span>";
                }
            }else if(data.cate_title == "判断题"){
                if(data.answer[0]==1){
                    html += "<div class='pan-duan rightActive'>";
                }else{
                    html += "<div class='pan-duan wrongActive'>";
                }
                html += "<i class='uploadExerIcons right' style='top:0;'></i><i class='uploadSuccessIcon wrong' style='top:0;'></i></div>";
            }
            html += "</li>";
        }else if(data.cate_title == "排序题"){
            html += "<li>";
            for(var x = 0; x<data.options.length;x++){
                for(var key in data.options[x]){
                    html += "<span class='answer_span'>排序"+(x+1)+":"+data.options[x][key]+"</span>";
                }
            }
            html += "</li>";
        }
    html += "</ul>"+
        "</div>"+
        "<div class='chapterBox'><span class='chapterBtn' style='width: 70px;'><span  class='chapterTitle'>知识点</span><span class='chapterContent'>"+data.chapter_ttile+"</span><span  class='fa chapterIcon fa-angle-double-right'></span></span></div></div>"+
        "</td>"+
        "<td valign='top'><i class='fa is-spread fa-angle-down'></i></td>"+
        "</tr>";
    return html;
}

//获取本地数据函数
function getLocalData(sessionStorageData){
    $.ajax({
        url:"/getExerciseList",
        data:getWork,
        type:"POST",
        success:function(data){
            console.log(data)
            data = JSON.parse(data);
            for(var i=0;i<data.length;i++){
                $(".work_tbody").append(htmlModule(ENNum,data[i],i));
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
                    $(this).find(".chapterBox").css({display:"none"});
                    $(this).find(".fa.is-spread").removeClass("fa-angle-up").addClass("fa-angle-down");
                    $(".subject_box").removeClass("subject_box_active").addClass("subject_box_noActive");
                    $(this).find(".chapterBtn").css({width:'70px'},500);
                    $(this).find(".chapterIcon").removeClass('fa-angle-double-left').addClass("fa-angle-double-right");
                    $(this).find(".disSelsectBox").animate({height:0},500);
                }else{
                    $(this).find(".fa.is-spread").removeClass("fa-angle-down").addClass("fa-angle-up");
                    $(".subject_box").removeClass("subject_box_noActive").addClass("subject_box_active");
                    $(this).find(".disSelsectBox").animate({height:($(this).find("ul").height()+45)},500);
                    var that = this;
                    setTimeout(function(){
                        $(that).find('.chapterBox').css({display:'block'});
                    },500)
                }
            });
            $(".chapterBox").on("click",".chapterIcon",function(e){
                e.stopPropagation();
                if($(this).hasClass("fa-angle-double-right")){
                    $(this).parent().animate({width:'370px'},500);
                    $(this).removeClass('fa-angle-double-right').addClass("fa-angle-double-left");
                }else{
                    $(this).parent().animate({width:'70px'},500);
                    $(this).removeClass('fa-angle-double-left').addClass("fa-angle-double-right");
                }

            })
            $("#all-checked").click(function(){
                if($(this).is(":checked")){
                    $(".spread.tdBtn").each(function(j,trList){
                        $(trList).find(".checkJob").prop("checked",true);
                    })
                }else{
                    $(".spread.tdBtn").each(function(j,trList){
                        $(trList).find(".checkJob").prop("checked",false);
                    })
                }

            })
            $(".checkJob,.chapterBox").click(function(e){
                e.stopPropagation();
            })
        }
    })
    $(".ic-input.hw-title-input").val(sessionStorageData.title);
    var parent_ul = $(".trifle").parent().next(".lists.section-ul");
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
    $("#expiration-time .expiration-time-input").val(sessionStorageData.dateTime);
    $(".hw-content.border").val(sessionStorageData.rulejob);
}

//保存、发布执行函数
function saveoOrPublicJob(isTrue,sessionStorage,obj){
    var type = $(obj).attr("data-type")
    var j = publicClick(sessionStorage);
    var t = "",url = "";
    if(type =="public"){
        t = "发布失败！";
        url = "/pubJob"
    }else{
        t = "保存失败！";
        url = "/createJob";
    }
    $.ajax({
        url:url,
        type:"POST",
        data:j,
        success:function(data){
            if(JSON.parse(data).code == 200){
                if(type == "public"){
                    publicJob()
                }else{
                    layui.use('layer', function(){
                        layer.msg('保存成功！', {
                            offset: 't'
                        });
                        window.sessionStorage.removeItem("addJob");
                    })
                }

            }else{
                layui.use('layer', function(){
                    layer.msg(t, {
                        offset: 't'
                    });
                })
            }
        }
    })
    isTrue = true;
}

//发布成功返回函数
function publicJob(){
    layui.use('layer', function(){
        layer.msg('发布成功！', {
            offset: 't'
        });
        layer.open({
            type: 1,
            title: "<span class='titleIcon'><i class='uploadExer-btnIcons' style='top:0;'></i></span><span style='color:#168bee;'>发布成功</span>",
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
            });
        });
    })
    window.sessionStorage.removeItem("addJob");
}

//作业标题必填
function mustWrist(){
    if(!$(".ic-input.hw-title-input").val()){
        isPublic = true;
        alert("请填写作业标题");
        return;
    }
}

//保存发布数据
function publicClick(sessionStorage){
    mustWrist();
    var upLoadJob = eval("("+sessionStorage.getItem("addJob")+")");
    if(upLoadJob.title == ""){
        if($(".ic-input.hw-title-input").val() == ""){
            isPublic = true;
            alert("请选择作业标题");
            return;
        }else{
            upLoadJob.title = $(".ic-input.hw-title-input").val();
        }
    }
    upLoadJob.dateTime = $(".expiration-time-input").val();
    upLoadJob.deadline = stringToTimeStamp($("#expiration-time .expiration-time-input").val());
    if(upLoadJob.rulejob == ""){
        upLoadJob.rulejob = $(".hw-content.border").val();
    }
    sessionStorage.removeItem("addJob");
    sessionStorage.setItem("addJob",JSON.stringify(upLoadJob));
    var lastJob = {
        "class":classId,
        "course":course,
        "type":1,
        "content":upLoadJob.rulejob,
        "title":upLoadJob.title,
        "exercise_id":upLoadJob.exercise,
        "deadline":upLoadJob.deadline,
        "_token":token
    }
    return lastJob;
}
