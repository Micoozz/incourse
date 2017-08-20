/************* doHomework.html ****************/
$(function(){
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
            $(".fa-angle-right,.hw-order-index").hide();
            $(".fa-angle-left,.answer-sheet-icon").show();
        }else if(left === 0){
            $(".fa-angle-right,.hw-order-index").show();
            $(".fa-angle-left,.answer-sheet-icon").hide();
        }else {
            $(".fa-angle-right,.fa-angle-left,.hw-order-index").show();
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

        //位移
        left = parseInt($(".do-hw .exercise-box").css("left")) - li_width;
        $(".do-hw .exercise-box").css("left",left);

        //右上角题号更换
        if(left !== -ul_width+li_width) {
            $(".big-num").text(parseInt($(".big-num").text()) + 1);
        }

        isEnd(left);
    });

    //右移
    $("#fa-angle-left").click(function(){
        $(this).prop("disabled",true);
        setTimeout(function(){
            $("#fa-angle-left").prop("disabled",false);
        },300);

        if(left !== -ul_width+li_width) {
            $(".big-num").text(parseInt($(".big-num").text()) - 1);
        }

        left = left + li_width;
        $(".do-hw .exercise-box").css("left",left);

        isEnd(left);
    });

    //点击底部的序号调到对应的题目
    $("body").on("click",".hw-order>span",function(){
        var order = parseInt($(this).text());
        console.log(order)
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
    $("body").on("keyup",".exercise-box .editor-content",function(){
        if($(this).text().length === 0){
            var order = parseInt($(".big-num").text());
            $(".hw-order span:nth-child("+order+")").removeClass("active");
        }else {
            getOrderAndBlue();
        }
    });

    //排序题
    $(".sortable").sortable();

    //交卷并查看结果
    $(".answer-sheet .answer-sheet-submit").click(function(){
        $(".ic-modal, .delete-modal").fadeIn();
    });

    //交卷
    $("#handPaper").click(function(){
        var total = [];
        $(".do-hw .exercise-box .exer-in-list").each(function(i,item){
            var type = $(item).find(".do-hw-type").text();
            //保存单题的答案
            var obj = {
                "id": $(item).attr("data-id"),
                "answer": ""
            };

			var arr = []; //单题
			var arr_big = []; //多题
			var dom = "";
			var type_big = ""; //多题
			
            if(type === "单选题"){
                obj.answer = $(item).find(".ic-radio.active input").val();
            }else if(type === "多选题"){
                $(item).find(".radio-wrap .ic-radio.active input").each(function(i,n){
                    obj.answer += $(n).val();
                });
            }else if(type === "填空题" || type === "多空题"){
            	$(item).find(".blank-item").each(function(i,n){
                    arr.push($(n).text());
                });
                obj.answer = arr;
            }else if(type === "判断题"){
            	dom = $(item).find(".answer-box .pan-duan");
            	if(dom.hasClass("rightActive")){
            		obj.answer = "正确";
            	}else if(dom.hasClass("wrongActive")){
            		obj.answer = "错误";
            	}else {
            		obj.answer = "";
            	}
            }else if(type === "排序题"){
            	$(item).find(".exer-list-ul>li>span").each(function(i,n){
            		obj.answer += $(n).text().slice(2,3);
            	});
            }else if(type === "画图题" || type === "作文题" || type === "计算题"){
            	$(item).find(".one-img>img").each(function(i,n){
            		arr.push($(n).attr("src"));
            	});
            	obj.answer = arr;
            }else if(type === "连线题"){
            	obj.answer = sessionStorage.getItem("ic_lianXianTi"+$(item).attr("data-id"));
            }else if(type === "简答题"){
            	if($(item).find(".editor-content img").length !== 0){
            		$(item).find(".editor-content img").each(function(i,n){
            			arr.push($(n).attr("src"));
            		});
            		obj.answer = arr;
            	}else {
            		obj.answer = $(item).find(".editor-content").text();
            	}
            }else if(type === "听力题" || type === "阅读题"){
            	$(item).find(".one-hw").each(function(j,m){});
            }
            
            total.push(obj);
        });
        
        console.log(total);
    });
})




































