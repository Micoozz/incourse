/************* doHomework.html ****************/
$(function(){
    //毫秒格式化为00:00
    function changeTime(millisecond){
        //计算"分：秒"
        var m = parseInt(millisecond/1000/60);
        var s = parseInt(millisecond/1000 - m*60);
        if(m<10){
            m = "0" + m;
        }
        if(s<10){
            s = "0" + s;
        }
        return m + ":" + s;
    }

    //计算总时间
    var now = new Date().getTime();
    var ic_start_time = sessionStorage.getItem("ic_start_time");
    if(!ic_start_time){
        ic_start_time = now;
        sessionStorage.setItem("ic_start_time",now);
    }else {
        var timeString = changeTime(new Date().getTime() - ic_start_time);
        $(".time-string").text(timeString);
    }
    var timer = setInterval(function(){
        var timeString = changeTime(new Date().getTime() - ic_start_time);
        $(".time-string").text(timeString);
    },1000);

    //计算单题时间
    var obj_time = {
        "id": "1",
        "start_time": now,
        "last": 0
    };

    function single_time(idT){
        var current = new Date().getTime();
        obj_time.id = idT;
        var last = Math.round((current - obj_time.start_time)/1000);
        var ic_id;
        for( var k in window.sessionStorage){
            if(k==("ic_"+obj_time.id)){
                ic_id=k;
            }else{
                ic_id = sessionStorage.getItem("ic_"+obj_time.id);
            }
        }
        if(ic_id){
            obj_time.last = JSON.parse(ic_id).last + last;
        }else {
            obj_time.last = last;
        }
        obj_time.start_time = current;
        obj_time.last_time = current
        sessionStorage.setItem("ic_"+obj_time.id,JSON.stringify(obj_time));
    }

    //刷新页面时计算单题时间
    $(window).unload(single_time);

    //点击题目前面的问号的效果
    $("body").on("click",".hw-question .query",function(){
        $(this).toggleClass("active");
        var num = parseInt($(".big-num").text());
        $(".hw-order-index>span:nth-child("+num+"),.answer-sheet .hw-order>span:nth-child("+num+")").toggleClass("query_order");
    });

    //设置题目ul的宽度
    var li_width = 918;
    var li_num = $(".do-hw .exercise-box>li").length;
    var ul_width = li_num * li_width;
    $(".do-hw .exercise-box").css("width",ul_width + "px");

    function isEnd(left){
        if(left === -ul_width + li_width){
            $(".fa-angle-right,.hw-order-index,.exer-num").hide();
            $(".fa-angle-left,.answer-sheet-icon").show();
        }else if(left === 0){
            $(".fa-angle-right,.hw-order-index,.exer-num").show();
            $(".fa-angle-left,.answer-sheet-icon").hide();
        }else {
            $(".fa-angle-right,.fa-angle-left,.hw-order-index,.exer-num").show();
            $(".answer-sheet-icon").hide();
        }
    }

    //左移
    var left = 0;
    $("#fa-angle-right").on("click",function(){
        //控制0.3秒只能点一次
        $(this).prop("disabled",true);
        setTimeout(function(){
            $("#fa-angle-right").prop("disabled",false);
        },300);
        single_time($(".big-num").text());

        //位移
        left = parseInt($(".do-hw .exercise-box").css("left")) - li_width;
        $(".do-hw .exercise-box").css("left",left);

        $(".big-num").text(parseInt($(".big-num").text()) + 1);

        isEnd(left);
    });

    //右移
    $("#fa-angle-left").click(function(){
        $(this).prop("disabled",true);
        setTimeout(function(){
            $("#fa-angle-left").prop("disabled",false);
        },300);

        left = left + li_width;
        $(".do-hw .exercise-box").css("left",left);

        isEnd(left);

        if(parseInt($(".big-num").text())>$(".do-hw .exercise-box .exer-in-list").length){
            $(".big-num").text(parseInt($(".big-num").text()) - 1);
        }else{
            $(".big-num").text(parseInt($(".big-num").text()) - 1);
            single_time(parseInt($(".big-num").text())+1);
        }
    });

    //点击底部的序号调到对应的题目
    $("body").on("click",".hw-order>span",function(){
        single_time($(".big-num").text());

        var order = parseInt($(this).text());
        $(".big-num").text(order);
        left = (-order + 1) * li_width;
        $(".do-hw .exercise-box").css("left",left);

        isEnd(left);
    });

    //获取当前题号并使底部序号变蓝的函数
    function getOrderAndBlue(obj) {
        var a = false;
        var isblankNull = false;
        for(var i = 0;i<$(obj).parents(".exer-list-ul").find("li").length;i++){
            var li = $(obj).parents(".exer-list-ul").find("li").eq(i)
            if($(li).find("label").hasClass("active")){
                a = true;
                break;
            }
        }
        var order = parseInt($(".big-num").text());
         $(".hw-order span:nth-child("+order+")").addClasss("active");
        if($(obj).parents(".exer-list-ul").hasClass("radio-wrap")){
            if(a){
                $(".hw-order span:nth-child("+order+")").addClass("active");
            }else{
                $(".hw-order span:nth-child("+order+")").removeClass("active");
            }
        }else{
            if($(obj).parents(".pan-duan").hasClass('pan-duan')){
                 if($(obj).parents(".pan-duan").hasClass('no-active')){
                     $(".hw-order span:nth-child("+order+")").removeClass("active");
                 }else{
                     $(".hw-order span:nth-child("+order+")").addClass("active");
                    }
            }else{
                if($(obj).parent().find('span').text()!=''){
                    $(".hw-order span:nth-child("+order+")").addClass("active");
                }else{
                    $(".hw-order span:nth-child("+order+")").removeClass("active");
                };
            }
        }

        if($(obj).hasClass("blank-item")){
            $(obj).parent().find(".blank-item").each(function(i){
                if($.trim($(this).text()) == "" || $.trim($(this).text()) == ("空" + (i + 1))){
                    $(this).text("空" + (i + 1));
                }else{
                    isblankNull = true;
                }
            })
            if(isblankNull){
                $(obj).parents(".f-l.do-hw").find(".ta-c.hw-order.hw-order-index").find("span").eq(parseInt($(".big-num").text())-1).addClass("active");
                $(obj).parents(".f-l.do-hw").find(".ta-c.hw-order").find("span").eq(parseInt($(".big-num").text())-1).addClass("active");
            }else{
                $(obj).parents(".f-l.do-hw").find(".ta-c.hw-order.hw-order-index").find("span").eq(parseInt($(".big-num").text())-1).removeClass("active");
                $(obj).parents(".f-l.do-hw").find(".ta-c.hw-order").find("span").eq(parseInt($(".big-num").text())-1).removeClass("active");
            }
            minLengthNum(obj)
        }

        if($(obj).hasClass("editor-content")){
            if($(obj).text() == ""){
                $(obj).parents(".f-l.do-hw").find(".ta-c.hw-order").find("span").eq(parseInt($(".big-num").text())-1).addClass("active");
            }else{
                $(obj).parents(".f-l.do-hw").find(".ta-c.hw-order").find("span").eq(parseInt($(".big-num").text())-1).addClass("active");
            }
        }
    }
    function minLengthNum(obj){
        //填空题字数限定
        if($(obj).attr('contenteditable')==='true'){
           if($(obj).text().match(/[\u4e00-\u9fa5]+/g)) {
                if($(obj).text().length > 10) {
                    $(obj).text($(obj).text().substring(0, 10));
                    alert('最多不可超过10个字')
                }
            } else {
                if($(obj).text().length > 20) {
                    $(obj).text($(obj).text().substring(0, 20));
                    alert('最多不可超过20个字')
                }
            }
        }
    }

    /*$("body").on("focus", ".blank-item",function(){
        $(this).each(function (i, item) {
            if($.trim($(item).text()) == ("空" + (i + 1))){
                $(item).text("");
            }else{
                return;
            }
        });
    })*/
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
    //底部答过的题标蓝
    //选择
    $("body").on("click",".exercise-box .ic-radio",function(){getOrderAndBlue(this)});
    //填空
    $("body").on("keyup",".exercise-box .blank-item",function(){getOrderAndBlue(this)});
    //判断
    $("body").on("click",".exercise-box .pan-duan .uploadExerIcons",function(){getOrderAndBlue(this)});
    //画图
    // $("body").on("change",".exercise-box .addFile",function(){getOrderAndBlue(this)});
    $("body").on("click",".exercise-box .question_hpb>li",function(){getOrderAndBlue(this)});
    //连线题
    $("body").on("mouseup",".exercise-box .sortable>li",function(){getOrderAndBlue(this)});
    //解答题
    $("body").on("keyup",".exercise-box .editor-content",function(){
        if($(this).text().length === 0){
            $(this).parents(".f-l.do-hw").find(".ta-c.hw-order.hw-order-index").find("span").eq(parseInt($(".big-num").text())-1).removeClass("active");
            $(".hw-order.ta-c").find("span").eq(parseInt($(".big-num").text())-1).removeClass("active")
            var order = parseInt($(".big-num").text());
        }else {
            getOrderAndBlue(this);
        }
    });

    //禁用Tab键和回车键
    $(window).keydown(function(event){
        if((event.keyCode===9) || (event.keyCode===13)){
            event.preventDefault();
        }
    });


    //排序题
    $(".sortable").sortable();

    //交卷并查看结果
    $(".answer-sheet .answer-sheet-submit").click(function(){
        $(".ic-modal, .delete-modal").fadeIn();
        //查看是否做完题目
        var trues=[];
        $('.answer-sheet p span').each(function(){
            if($(this).attr('class')!='active'){
                    trues.push($(this).text())
            }
        });
        console.log(trues)
        $('.ic-text p:last-child').text('本套练习还有 '+(trues.length)+' 道题未做答')       
    });



    //交卷
    var isHandPaper = true;
    $("#handPaper").click(function(){
        if(!isHandPaper){
            return;
        }
        $("body").removeAttr("onbeforeunload");
        var work_id = $("#work_id").attr("value");
        clearInterval(timer);
        var total = [];
        total.total_time = parseInt((new Date().getTime() - sessionStorage.getItem("ic_start_time"))/1000);

        $(".do-hw .exercise-box .exer-in-list").each(function(i,item){
            var type = $(item).children(".hw-question").find(".do-hw-type").text();
            //保存单题的答案
            var obj = {
                "id": $(item).attr("data-id"),
                "answer": [],
                "parent_id":"",
                "last": 0,
            };
            if($(item).find(".exer-list-ul li").length != 0){
                obj.option=[];
                $(item).find(".exer-list-ul li").each(function(j,list){
                    obj.option.push($(list).attr("data-option"))
                })
            }
            var arr = []; //单题
            var arr_big = []; //多题
            var dom = "";
            //保存图文并存的答案
            var img_text = {};

            if(type === "单选题"){
                obj.answer.push(parseInt($(item).find(".ic-radio.active input").val() == null ? "" : parseInt($(item).find(".ic-radio.active input").val())));
                obj.parent_id =  $(item).find(".ic-blue .do-hw-type").attr('parent-id');
            }else if(type === "多选题"){
                $(item).find(".radio-wrap .ic-radio.active input").each(function(i,n){
                   obj.answer.push(parseInt($(n).val()));
                });
                if (obj.answer[0] == null) {
                    obj.answer = "";
                }
                obj.parent_id =  $(item).find(".ic-blue .do-hw-type").attr('parent-id')
            }else if(type === "填空题" || type === "多空题"){
                $(item).find(".blank-item").each(function(i,n){
                    arr.push($(n).text());
                });
                obj.answer = arr;
                obj.parent_id =  $(item).find(".ic-blue .do-hw-type").attr('parent-id')
            }else if(type === "判断题"){
                dom = $(item).find(".answer-box .pan-duan");
                if(dom.hasClass("rightActive")){
                    obj.answer = "1";
                }else if(dom.hasClass("wrongActive")){
                    obj.answer = "0";
                }else {
                    obj.answer = "";
                }
                obj.parent_id =  $(item).find(".ic-blue .do-hw-type").attr('parent-id')
            }else if(type === "完形填空"){
                $(item).find(".wan-xing-tk-option").each(function(i,n){
                    arr.push($(n).find(".ic-radio.active input").val());
                });
                obj.answer = arr;
            }else if(type === "排序题"){
                $(item).find(".exer-list-ul>li>span").each(function(i,n){
                    obj.answer.push(parseInt($(n).attr('exercise-id')));
                });
                obj.parent_id =  $(item).find(".ic-blue .do-hw-type").attr('parent-id')
            }else if(type === "作文题"){
                $(item).find(".one-img>img").each(function(i,n){
                    arr.push($(n).attr("src"));
                });
                obj.answer = arr;
            }else if(type === "连线题"){
                obj.answer = JSON.parse(sessionStorage.getItem("ic_lianXianTi"+$(item).attr("data-id")));
                obj.parent_id =  $(item).find(".ic-blue .do-hw-type").attr('parent-id')
            }else if(type === "画图题" || type === "简答题" || type === "解答题" || type === "听力题" || type === "阅读题"){
                arr.push($(item).find(".editor-content").text())
                obj.answer = arr;
            }
            total.push(obj);
        });
        //把单题时间整合到total中,li_num
        var store = window.sessionStorage;
        for(var key in store){
            if(Number(key.slice(3))){
                total[Number(key.slice(3))-1].last = JSON.parse(store[key]).last;
            }
        }
        var param = clearUp(total); //传给后台的作业答案参数
        param._token = token;
        param.work_id = work_id;
        if (param['data'][0]['parent_id'] != ""){
            $.post("/sameScore",param,function(result){
                var course = $("#course_id").attr('value');
                var increase = $("#course_id").attr('error-increase');
                if (result == 200 || result == 1) {
                    window.location.href = "/learningCenter/" + course + "/homework/work_tutorship/" + work_id + "/" + accuracy + "/" + increase;
                }
                sessionStorage.clear();
                isHandPaper = true;
            });
        }else{
            $.post("/homeworkScores",param,function(result){
                var course = $("#course_id").attr('value');
                if (result == 200 || result == 1) {
                    window.location.href = "/learningCenter/" + course + "/homework/work_score/" + work_id;
                }
                sessionStorage.clear();
                isHandPaper = true;
            });
        }
    });

    //整理arr类型为obj
    function clearUp(arr){
        var obj = {
            "data":[],
            "total_time": ""
        };

        for(var key in arr){
            if(key==="total_time"){
                obj.total_time = arr[key];
            }else {
                obj.data.push(arr[key]);
            }
        }
        return obj;
    }
});


