/*************** personHw.html *************/
$(function(){
    var exer = id_type.exercise;
    var order = hwInfo_obj.exercise_id;

    $("body").on("click",".person_hw_box .delete-modal .btn-white",function(){
        $(this).parents(".delete-modal").hide();
        $(".ic-modal").hide();
    });

    //“添加习题”点击箭头显示和隐藏整道题
    $("body").on("click",".person_hw_box .person-exer-list .is-spread",function(){
        $(this).toggleClass("fa-angle-up fa-angle-down");
        $(this).parents("tr").toggleClass("spread");
        $(this).parents("tr").next().toggle();
    });

    //删除习题
    $("body").on("click",".person_hw_box #delete-personHw",function(){
        $(".person-exer-list tbody input[type='checkbox']:checked").each(function(i,item){
            $(item).parents("tr").next().remove();
            $(item).parents("tr").remove();

            var id = $(item).parents("tr").attr("data-id");
            var index = order.indexOf(id);
            order.splice(index,1);
            exer.splice(index,1);
        });

        $(".personHw-num").text(order.length);
        personHwIs15();
    });

    //“添加习题”全选效果
    $("body").on("click",".person_hw_box #all-checked",function(){
        var isAll = $(this).prop("checked");
        if(isAll){
            $(".person-exer-list tbody input[type='checkbox']").prop("checked",true);
        }else {
            $(".person-exer-list tbody input[type='checkbox']").prop("checked",false);
        }
    });

    //题库选题
    $("body").on("click",".personHw-addExer",function(){
        //把个人作业里的信息赋值给hwInfo_obj并返回ajax提交参数
        getHwInfo();

        $(".exerRoom-link").trigger("click");

        if(exer){
            $(".hw-list .exer-num>span").text(exer.length);
            createHwList(exer);
        }
    });

    //保存
    $("body").on("click","#save-person-hw",function(){
        getHwInfo();

        $.post("/createJob",hwInfo_obj,function(data){
            if(data.code===200){
                //后台还需要返回这次保存作业的id
                alert("保存成功！");
            }else {
                alert("保存失败！");
            }
        });
    });


    //发布
    $("body").on("click","#public",function(){
        getHwInfo();

        $.post("/pubJob",hwInfo_obj,function(data){
            if(data.code===200){
                clearContent();
                $(".dBUploadBox, .ic-modal").show();
            }else {
                alert("发布失败！");
            }
        });
    });


    //把个人作业里的信息赋值给hwInfo_obj并返回ajax提交参数
    function getHwInfo(){
        hwInfo_obj.title = $(".hw-title-input").val();
        hwInfo_obj.chapter = [$(".person_hw_box .chapter").text(),$(".person_hw_box .trifle").text()];
        hwInfo_obj.deadline = $("#expiration-time").val();
        hwInfo_obj.commonHw = $(".person_hw_box .hw-content").val();

        var exerId_arr = [], exerArr = [];
        $(".person-exer-list [data-id]").each(function(i,item){
            exerId_arr.push($(item).attr("data-id"));

            var obj = {
                "id": $(item).attr("data-id"),
                "type": $(item).find(".personHw-type").text()
            };
            exerArr.push(obj);
        });
        hwInfo_obj.exercise_id = exerId_arr;
        id_type.exercise = exerArr;
    }

    //取消
    $("body").on("click","#cancel-person-hw",function(){
        $(".ic-modal,.delete-modal").show();
    });

    //点了"取消"弹出的模态框中点击"确定"的效果
    $("body").on("click","#cancelCreateHw",function(){
        clearContent();
        $(".hwType-link").trigger("click");
    });

    //上传习题
    $("body").on("click","#personHw-uploadExer",function(){
        $(".ic-modal").show();
        $.ajax({
            type: "get",
            url: "template/uploadExerPage.html",
            async: false,
            success: function(data){
                $(".person_hw_box").append(data);
            }
        });
        $(".exist-exer").text(order.length + 1);
        uploadIs15();
    });

    //发布弹出框的"转发"
    $("body").on("click","#transmit",function(){

    });

    //发布弹出框的"取消"
    $("body").on("click",".dBUpload-body .btn-white",function(){
        $(".dBUploadBox, .ic-modal").hide();
    });
});










