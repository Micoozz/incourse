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
    function getOrderAndBlue() {
        var order = parseInt($(".big-num").text());
        $(".hw-order span:nth-child("+order+")").addClass("active");
    }

    //底部答过的题标蓝
    $("body").on("click",".exercise-box .ic-radio",getOrderAndBlue);
    $("body").on("keydown",".exercise-box .blank-item",getOrderAndBlue);
    $("body").on("click",".exercise-box .pan-duan .uploadExerIcons",getOrderAndBlue);
    $("body").on("change",".exercise-box .addFile",getOrderAndBlue);
    $("body").on("click",".exercise-box .question_hpb>li",getOrderAndBlue);
    $("body").on("mouseup",".exercise-box .sortable>li",getOrderAndBlue);
    $("body").on("keyup",".exercise-box .editor-content",function() {
        if ($(this).text().length === 0) {
            var order = parseInt($(".big-num").text());
            $(".hw-order span:nth-child(" + order + ")").removeClass("active");
        } else {
            getOrderAndBlue();
        }
    });


        //禁用Tab键和回车键
    $(window).keydown(function (event) {
        if ((event.keyCode === 9) || (event.keyCode === 13)) {
            event.preventDefault();
        }
    });

    //排序题
    $(".sortable").sortable();

    //交卷并查看结果
    $(".answer-sheet .answer-sheet-submit").click(function () {
        $(".ic-modal, .delete-modal").fadeIn();
    });

    //交卷
    $("#handPaper").click(function () {
        var work_id = $("#work_id").attr("value");
        clearInterval(timer);

        //var total = [
        //    {id:"1", answer:"C", last:0}, //单选题
        //    {id:"2", answer:"BC", last:0}, //多选题
        //    {id:"3", answer:["111","222"], last:0}, //填空题
        //    {id:"4", answer:"错误", last:0}, //判断题
        //    {id:"5", answer:"BDAC", last:0}, //排序题
        //    {id:"6", answer:["data-...","data-..."], last:0}, //画图题
        //    {id:"7", answer:["2连3","1连2","3连1"], last:0}, //连线题
        //    {id:"8", answer:{"text":"aaa"}, last:0}, //简答题
        //    {id:"8", answer:[{"id":"101", "answer":"B"},{},{}], last:0}, //听力题
        //];

        console.log()
        var total = [];
        total.total_time = parseInt((new Date().getTime() - sessionStorage.getItem("ic_start_time")) / 1000);

        $(".do-hw .exercise-box .exer-in-list").each(function (i, item) {
            var type = $(item).children(".hw-question").find(".do-hw-type").text();
            //保存单题的答案
            var obj = {
                "id": $(item).attr("data-id"),
                "answer": "",
                "last": ""
            };


            var arr = []; //单题
            var arr_big = []; //多题
            var dom = "";
            //保存图文并存的答案
            var img_text = {};

            if (type === "单选题") {
                obj.answer = $(item).find(".ic-radio.active input").val() == null ? "" : $(item).find(".ic-radio.active input").val();
            } else if (type === "多选题") {
                $(item).find(".radio-wrap .ic-radio.active input").each(function (i, n) {
                    obj.answer += $(n).val() + ',';
                });
                obj.answer = obj.answer.substring(0, obj.answer.length - 1)
            } else if (type === "填空题" || type === "多空题") {
                $(item).find(".blank-item").each(function (i, n) {
                    arr.push($(n).text());
                });
                obj.answer = arr;
            } else if (type === "判断题") {
                dom = $(item).find(".answer-box .pan-duan");
                if (dom.hasClass("rightActive")) {
                    obj.answer = "1";
                } else if (dom.hasClass("wrongActive")) {
                    obj.answer = "0";
                } else {
                    obj.answer = "";
                }
            } else if (type === "完形填空") {
                $(item).find(".wan-xing-tk-option").each(function (i, n) {
                    arr.push($(n).find(".ic-radio.active input").val());
                });
                obj.answer = arr;
            } else if (type === "排序题") {
                $(item).find(".exer-list-ul>li>span").each(function (i, n) {
                    obj.answer += $(n).text().slice(2, 3) + ',';
                });
                obj.answer = obj.answer.substring(0, obj.answer.length - 1)
            } else if (type === "画图题" || type === "作文题" || type === "计算题") {
                $(item).find(".one-img>img").each(function (i, n) {
                    arr.push($(n).attr("src"));
                });
                obj.answer = arr;
            } else if (type === "连线题") {
                obj.answer = JSON.parse(sessionStorage.getItem("ic_lianXianTi" + $(item).attr("data-id")));
            } else if (type === "简答题") {
                if ($(item).find(".editor-content img").length !== 0) {
                    $(item).find(".editor-content img").each(function (i, n) {
                        arr.push($(n).attr("src"));
                    });
                    img_text.img = arr;
                } else {
                    img_text.text = $(item).find(".editor-content").text();
                }
                obj.answer = img_text;
            } else if (type === "听力题" || type === "阅读题" || type === "解答题") {
                $(item).find(".one-hw").each(function (i, item) {
                    var obj_child = {
                        "id": $(item).attr("data-id"),
                        "answer": ""
                    };
                    var arr = [];

                    type = $(item).find(".do-hw-type").text();

                    if (type === "单选题") {
                        obj_child.answer = $(item).find(".ic-radio.active input").val();
                    } else if (type === "多选题") {
                        $(item).find(".radio-wrap .ic-radio.active input").each(function (i, n) {
                            obj_child.answer += $(n).val() + ",";
                        });
                        obj.answer = obj.answer.substring(0, obj.answer.length - 1)
                    } else if (type === "填空题" || type === "多空题") {
                        $(item).find(".blank-item").each(function (i, n) {
                            arr.push($(n).text());
                        });
                        obj_child.answer = arr;
                    } else if (type === "判断题") {
                        dom = $(item).find(".answer-box .pan-duan");
                        if (dom.hasClass("rightActive")) {
                            obj_child.answer = "1";
                        } else if (dom.hasClass("wrongActive")) {
                            obj_child.answer = "0";
                        } else {
                            obj_child.answer = "";
                        }
                    } else if (type === "排序题") {
                        $(item).find(".exer-list-ul>li>span").each(function (i, n) {
                            arr.push($(n).attr("data-order"));
                        });
                        obj_child.answer = arr.join(",");
                    } else if (type === "画图题" || type === "作文题" || type === "计算题") {
                        $(item).find(".one-img>img").each(function (i, n) {
                            arr.push($(n).attr("src"));
                        });
                        obj_child.answer = arr;
                    } else if (type === "连线题") {
                        obj_child.answer = JSON.parse(sessionStorage.getItem("ic_lianXianTi" + $(item).attr("data-id")));
                    } else if (type === "简答题") {
                        if ($(item).find(".editor-content img").length !== 0) {
                            $(item).find(".editor-content img").each(function (i, n) {
                                arr.push($(n).attr("src"));
                            });
                            img_text.img = arr;
                        } else {
                            img_text.text = $(item).find(".editor-content").text();
                        }
                        obj_child.answer = img_text;
                    }
                    arr_big.push(obj_child);
                });

                obj.answer = arr_big;
            }
            // obj.last = ;
            total.push(obj);
        });
        var param = clearUp(total); //传给后台的作业答案参数
        param._token = token;
        param.work_id = work_id;
        console.log(param['data'][0]['parent_id']);
        console.log(param)
        if (param['data'][0]['parent_id'] != ""){
            $.post("/sameScore",param,function(result){
                var course = $("#course_id").attr('value');
                window.location.href = "/learningCenter/" + course + "/homework/work_tutorship/" + work_id +"/"+ accuracy;
            });
        }else{
            $.post("/homeworkScores",param,function(result){
                var course = $("#course_id").attr('value');
                if (result == 200 || result == 1) {
                  window.location.href = "/learningCenter/" + course + "/homework/work_score/" + work_id;
                }
                sessionStorage.clear();
            });
        }
        //
        //把单题时间整合到total中,li_num
        var store = window.sessionStorage;
        for (var key in store) {
            if (Number(key.slice(3))) {
                total[Number(key.slice(3)) - 1].last = JSON.parse(store[key]).last;
            }
        }
        var param = clearUp(total); //传给后台的作业答案参数
        param._token = token;
        param.work_id = work_id;
        console.log(param);
        $.post("/homeworkScores", param, function (result) {
            var course = $("#course_id").attr('value');
            if (result == 200 || result == 1) {
                window.location.href = "/learningCenter/" + course + "/1/3/" + work_id;
            }
            sessionStorage.clear();
        });

    });


    //整理arr类型为obj
    function clearUp(arr) {
        var obj = {
            "data": [],
            "total_time": ""
        };

        for (var key in arr) {
            if (key === "total_time") {
                obj.total_time = arr[key];
            } else {
                obj.data.push(arr[key]);
            }
        }

        return obj;
    }
});

/*    //毫秒格式化为00:00
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


    function single_time(){
        var current = new Date().getTime();
        obj_time.id = $(".big-num").text();
        var last = Math.round((current - obj_time.start_time)/1000);
        var ic_id = sessionStorage.getItem("ic_"+obj_time.id);
        if(ic_id){
            obj_time.last = JSON.parse(ic_id).last + last;
        }else {
            obj_time.last = last;
        }
        obj_time.start_time = current;
        sessionStorage.setItem("ic_"+obj_time.id,JSON.stringify(obj_time));
    }*/


    //整理arr类型为obj
/*    function clearUp(arr){
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

*/
































