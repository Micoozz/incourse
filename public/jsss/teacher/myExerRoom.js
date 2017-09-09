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


    //默认字段
    var text = [
        ["全国","全省","全市","全部老师"],
        ["全部篇章","全部小节","全部题型"],
        ""
    ];
    /****我上传的***/
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

        console.log(obj_myUpload);
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
})






























