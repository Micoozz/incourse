
/********************* personHwMark.html **************************/
$(function(){
     //查看同类型练习题
     $(".lookSameExer").click(function(){
        $(".ic-modal,.person-hw-mark").show();
     });
});






/************** myExerRoom.html *****************/
$(function(){
    //"我上传的"按钮
    $(".my-exer-room-head .doMark").click(function(){
        $(".myUpload").show();
        $(".myCollect").hide();
        $(".my-exer-room-head .isMark").removeClass("active");
        $(".my-exer-room-head .doMark").addClass("active");
    });

    //"我收藏的"按钮
    $(".my-exer-room-head .notMark").click(function(){
        $(".myUpload").hide();
        $(".myCollect").show();
        $(".my-exer-room-head .isMark").removeClass("active");
        $(".my-exer-room-head .notMark").addClass("active");
    });


    /****我上传的***/
    //默认字段
    var text = [
        ["全国","全省","全市","全部老师"],
        ["全部篇章","全部小节","全部题型"],
        ""
    ];
    //查找
    $("#search_myUpload").click(function(){
        //保存查找的条件
        var obj_myUpload = {
            "condition": [],
            "keyword": ""
        };

        $(".myUpload .condition-item").each(function(i,item){
            obj_myUpload.condition.push($(item).text());
        });
        obj_myUpload.keyword = $(".myUpload .kw").val();
    });

    //清空
    $("#clear_myUpload").click(function(){
        $(".myUpload .condition-item").each(function(i,item){
            $(item).text(text[1][i]);
        });
        $(".myUpload .kw").val(text[2]);
    });

    //"删除"题目
    $(".myUpload").on("click",".exer-list-delete",function(){
        $(this).parents(".exer-in-list").remove();
    });

    //点击"同类型习题"清空"已添加作业"里面的值
    //$("body").on("click",".myUpload .lookSameExer",function(){
    //   $(".hw-type-list").attr("data-all","");
    //});


    /****我收藏的***/
        //查找
    $("#search_myCollect").click(function(){
        //保存查找的条件
        var obj_myCollect = {
            "position": [],
            "condition": [],
            "keyword": ""
        };

        $(".myCollect .position-item").each(function(i,item){
            obj_myCollect.position.push($(item).text());
        });
        $(".myCollect .condition-item").each(function(i,item){
            obj_myCollect.condition.push($(item).text());
        });
        obj_myCollect.keyword = $(".myCollect .kw").val();

        console.log(obj_myCollect);
    });

    //清空
    $("#clear_myCollect").click(function(){
        $(".myCollect .position-item").each(function(i,item){
            $(item).text(text[0][i]);
        });
        $(".myCollect .condition-item").each(function(i,item){
            $(item).text(text[1][i]);
        });
        $(".myCollect .kw").val(text[2]);
    });

    //取消收藏
    $(".myCollect").on("click",".exer-foot .collect",function(){
        $(this).parents(".exer-in-list").remove();
    });
});





/****************** dataBankExer.html *********************/
$(function(){
    $("#dataBankCreateHw").click(function(){
        sessionStorage.setItem("ic_hw_order_dataBank",$(".hw-type-list").attr("data-all"));
        window.location.href = "dataBankUploadData.html";
    });
});










/************ 页面引导 ***********/
// $(function(){
//     //"作业选择" 页面引导
//     $.ajax({
//         type: "get",
//         url: "../template/guideH.html",
//         async: false,
//         success: function(data){
//             $(".homework-type-box .guide>div").html(data);
//         }
//     });
//     $(".homework-type-box .guide .msg").html('快去进行 <b>作业选择</b> 吧～');
//     $(".homework-type-box").on("click",".guide .part button",function(){
//         $(this).parents(".guide").hide();
//         $(".ic-modal").hide();
//     });

//     //"添加作业"页面引导
//     $.ajax({
//         type: "get",
//         url: "../template/guideH.html",
//         async: false,
//         success: function(data){
//             $(".exercise-room .guide>div").html(data);
//         }
//     });
//     $(".exercise-room .guide .msg").html('在 <b>添加</b> 上打勾,生成右边作业栏,点击 <b>生成</b>，即可生成作业噢～');
//     $(".exercise-room").on("click",".guide .part button",function(){
//         $(this).parents(".guide").hide();
//         $(".ic-modal").hide();
//     });
// });


















