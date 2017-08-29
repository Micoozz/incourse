/*************** personHw.html *************/
$(function(){
    var ic_personHw = sessionStorage.getItem("ic_personHw");  //页面跳转过来后获取本地信息
    var ic_hw_order = sessionStorage.getItem("ic_hw_order");  //习题库选中的题型
    var ic_hw_order_eR = sessionStorage.getItem("ic_hw_order_eR");  //我的题库"同类型习题"选中的题型

    //显示之前填写的信息
    if(ic_personHw){
        var personHw_obj = JSON.parse(ic_personHw);
        $(".hw-title-input").val(personHw_obj.title);
        // $(".chapter").text(personHw_obj.chapter[0]);
        $(".trifle").text(personHw_obj.chapter[1]);
        $("#expiration-time").val(personHw_obj.deadline);
        $(".person_hw_box .hw-content").val(personHw_obj.commonHw);
    }

    //获取选中的题型
    if(ic_hw_order || ic_hw_order_eR){
        var hw_order = ic_hw_order ? ic_hw_order.split(",") : [];
        var hw_order_eR = ic_hw_order_eR ? ic_hw_order_eR.split(",") : [];
        var all_order = hw_order.concat(hw_order_eR);   //保存所有选中题目的序号（数组）
    }

    $(".person_hw_box").on("click",".delete-modal .btn-white",function(){
        $(this).parents(".delete-modal").hide();
        $(".ic-modal").hide();
    });

    //“习题练习”点击箭头显示和隐藏整道题
    $(".person_hw_box").on("click",".person-exer-list .is-spread",function(){
        $(this).toggleClass("fa-angle-up fa-angle-down");
        $(this).parents("tr").toggleClass("spread");
        $(this).parents("tr").next().toggle();
    });

    //删除习题
    $(".person_hw_box").on("click","#delete-personHw",function(){
        $(".person-exer-list tbody input[type='checkbox']:checked").each(function(i,item){
            $(item).parents("tr").next().remove();
            $(item).parents("tr").remove();
        });
    });

    //“习题练习”全选效果
    $(".person_hw_box").on("click","#all-checked",function(){
        var isAll = $(this).prop("checked");
        if(isAll){
            $(".person-exer-list tbody input[type='checkbox']").prop("checked",true);
        }else {
            $(".person-exer-list tbody input[type='checkbox']").prop("checked",false);
        }
    });

    //添加习题
    $("body").on("click",".personHw-addExer",function(){
        var str_msg = JSON.stringify(getInfo());
        sessionStorage.setItem("ic_personHw",str_msg);
        window.location.href = "exerRoom.html";
    });

    //保存
    $("#save-person-hw").click(function(){
        var msg = getInfo();
        console.log(msg)
    });

    //发布
    $("#public").click(function(){
        var msg = getInfo();
        clearContent();
    });

    //取消
    $("#cancel-person-hw").click(function(){
        $(".ic-modal,.delete-modal").show();
    });

    //点了"取消"弹出的模态框中点击"确定"的效果
    $("#cancelCreateHw").click(function(){
        clearContent();
    });


    //添加习题获取页面信息
    function getInfo(){
        var msg = {
            "title": $(".hw-title-input").val(),
            "chapter": [$(".person_hw_box .chapter").text(),$(".person_hw_box .trifle").text()],
            "deadline": $("#expiration-time").val(),
            "commonHw": $(".person_hw_box .hw-content").val(),
            "exercise": []
        };
        $(".person-exer-list [data-id]").each(function(i,item){
            var obj = {
                id: $(item).attr("data-id"),
                type: $(item).find(".personHw-type").text()
            };
            msg.exercise.push(obj);
        });

        return msg;
    }

    //清空“布置作业”页面内容
    function clearContent(){
        sessionStorage.removeItem("ic_personHw");
        sessionStorage.removeItem("ic_hw_order");
        sessionStorage.removeItem("ic_hw_order_eR");

        $(".hw-title-input").val("");
        $(".person_hw_box .chapter").text("");
        $(".person_hw_box .trifle").text("");
        $("#expiration-time").val("");
        $(".person_hw_box .hw-content").val("");
        $(".has-exer").hide();
    }

    //"添加习题"页面引导
    // $.ajax({
    //     type: "get",
    //     url: "../template/guideH.html",
    //     async: false,
    //     success: function(data){
    //         $(".person_hw_box .guide>div").html(data);
    //     }
    // });
    // $(".person_hw_box .guide .msg").html('快去进行 <b>添加习题</b> 吧～');
    // $(".person_hw_box").on("click",".guide .part button",function(){
    //     $(this).parents(".guide").hide();
    //     $(".ic-modal").hide();
    // });
});
