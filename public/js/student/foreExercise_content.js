var Stime = 0;
var Mtime = 0;
var NStime,NMtime = "00";
var isT = true;
var arr = JSON.parse($(".right_a").attr("data-r")?$(".right_a").attr("data-r"):'[]');
var Nowt = window.setInterval(function(){
    Stime++;
    if(Stime>=60){
        Stime = 0;
        Mtime++;
        if(Mtime<10){
            NMtime = '0'+Mtime;
        }else{
            NMtime = Mtime;
        }
    }
    if(Stime<10){
        NStime = "0" + Stime;
    }else{
        NStime = Stime;
    }
    if(NMtime>60){
        alert("您已超时");
        window.clearInterval(Nowt);
    }
    $(".time-string").text(NMtime+":"+NStime)
}, 1000)
var ENnum = ['A','B','C','D','E','F','G','H','I'];
var nt = '';
var narr = [],optionsArr = [],student_answer_arr=[];
if(type == 1 || type == 2){
    for(var i = 0;i < $(".ic-radio").length;i++){
        var isThat = $(".ic-radio").eq(i);
        optionsArr.push($(isThat).parent().find(".option").attr("data-key"))
        var clar = $(isThat).find("i").attr("data-answer");
        if(clar){
            nt += '，'+$(isThat).find("input").val();
        }
    }
    $(".right_a").text(nt.slice(1, nt.length));
}else if(type == 4){
    if(arr[0] == "0"){
        $(".right_a").text("错误");
    }else{
        $(".right_a").text("正确");
    }
    $(".exer-list-ul").find("li").click(function(){
        if($(this).find(".TOrF_img").hasClass("active")){
            $(".TOrF_img").removeClass("active");
        }else{
            $(".TOrF_img").removeClass("active");
            $(this).find(".TOrF_img").addClass("active");
        }
    })
}else if(type == 6){
    Sortable.create(simpleList, {group: 'shared'});
    for(var i = 0; i < arr.length; i++){
        $("#simpleList").find("li").each(function(j,item){
            if(parseInt($(item).attr("data-key")) == arr[i]){
                nt += '，'+$(item).find(".sortTitle").text();
            }
        })
    }
    $(".right_a").text(nt.slice(1, nt.length));
}
$("#ensure").on("click",function(){
    window.clearInterval(Nowt);
    var tt = '';
    if(Mtime<=0){
        tt = Stime+'秒'
    }else{
        tt = Mtime+'分'+Stime+'秒'
    }
    $(".expend_time").text(tt)
    var ut = '';
    var student_t;
    var student_tArr = []
    var obj = {};
    var studennt_score = 0;
    if(type == 1 || type == 2){
        //单选题 || 多选题
        for(var j = 0;j<$(".ic-radio").length;j++){
            var that = $(".ic-radio").eq(j);
            var cla = that.find("i").attr("data-answer");
            var cls = that.find("i").attr("data-s");
            if(cla){
                narr.push(that.find("input").val());
                that.find("i").addClass(cla + " fa-dot-circle-o");
            }
            if(cls){
                if(!cla){
                    that.find("i").addClass(cls + " fa-dot-circle-o");
                }
                student_t = $(".ic-radio").eq(j).next("span.f-l").text().slice(0,1)
                student_tArr.push(student_t);
                ut += '，' + student_t;
                student_answer_arr.push(that.parent().find(".option").attr("data-key"));
                if(narr.indexOf(student_t)<0){
                    isT = false;
                }
            }
        }
        if(student_tArr.length<=0){
            isT = false;
        }
        obj = {
            "exe_id":urlId,
            "student_answer":student_answer_arr,
            "second":(Mtime*60+Stime),
            "sort":optionsArr,
            "_token":token
        }
        $(".user_answer").text(ut.slice(1, ut.length));
    }else if(type == 3){
        //填空题
        for(var j = 0;j<$(".blank-item").length;j++){
            student_t = $(".blank-item").eq(j).text();
            if(student_t == "空" + (j+1)){
                student_t = '';
            }
            ut += '，'+student_t;
            if(arr.indexOf(student_t)<0){
                isT = false;
            }
            student_answer_arr.push(student_t);
        }
        obj = {
            "exe_id":urlId,
            "student_answer":student_answer_arr,
            "second":(Mtime*60+Stime),
            "_token":token
        }
        $(".user_answer").text(ut.slice(1, ut.length));
    }else if(type == 4){
        // 判断题
        if(arr[0] == $(".TOrF_img.active").attr("data-answer-num")){
            isT = true;
        }else{
            isT = false;
        }
        $(".user_answer").text($(".TOrF_img.active").next(".TOrF_img_title").text());
    }else if(type == 6){
        // 排序题
        $("#simpleList").find("li").each(function(i,item){
            if(parseInt($(item).attr("data-key")) != arr[i]){
                isT = false;
            }
            ut += '，' + $(item).find(".sortTitle").text();
        })
        $(".user_answer").text(ut.slice(1, ut.length));
    }
    if(isT){
        $(".isRight").text("正确").removeClass("red").addClass("green");
        $(".user_answer").removeClass("red").addClass("green");
        studennt_score = $(".exer-in-list").attr("data-score");
        if(typeId==3){
            $.ajax({
                url:'/correctExercise/'+urlId,
                type:'GET',
                success:function(){}
            })
        }
    }else{
        $(".isRight").text("错误");
    }
    $(this).css({display:"none"});
    $("#go_on").css({display:"block"});
    $(".answerResultModule").animate({height:'300px',opacity:1},500);
    obj.score = studennt_score;
    if(typeId != 3){
        $.ajax({
            url: '/addWorkExercise',
            type:'POST',
            data:obj,
            success:function(data){}
        })
    }
})
$("body").on("click",".radio-wrap li",function(){
    var that = $(this).find("i");
    answerChecked(that,type)
})
function answerChecked(obj,type){
    if(type == 1){
        //单选题
        $(".ic-radio.p-r.f-l i").removeClass("active fa-dot-circle-o").addClass("fa-circle-o");
        $(obj).removeClass("fa-circle-o").addClass("active fa-dot-circle-o");
        $(".ic-radio.p-r.f-l i").attr("data-s",null);
        $(obj).attr("data-s",'student_answer');
    }else if(type == 2){
        //多选题
        $(obj).toggleClass("active fa-dot-circle-o");
        if($(obj).hasClass("active")){
            $(obj).attr("data-s",'student_answer');
        }else{
            $(obj).attr("data-s",null);
        }
    }else if(type == 3){
        //填空题，多空题
    }else if(type == 5){
        //排序题
    }
}
$(".blank-item").on("focus",function(){
    var index = $(this).index();
    var t = "空"+(1+index);
    if($(this).text() == t){
        $(this).text('');
    }
})
$(".blank-item").on("blur",function(){
    var index = $(this).index();
    var t = "空"+(1+index);
    if($(this).text() == ''){
        $(this).text(t);
    }
})
$("#go_on").on("click",function(){
    window.location.reload()
})
$("#goBack").on("click",function(){
    window.history.go(-1);
})