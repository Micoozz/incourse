$(function(){
   $("#nav1 li:nth-child(2) a").addClass("box");
});



/***************** dataBank.html *******************/
$(function(){
    //搜索
    $("#upload-data-search").click(function(){
       var kw = $(".data-bank-head .ic-search-box input").val();
    });

    //每行的"转发"
    $("body").on("click",".dB-transmit",function(){
        $.ajax({
            type: "GET",
            url: "../template/transmit.html",
            success: function(data){
                $("body").append(data);
                $(".dBUpload-head").hide();
            }
        });
    });

    //每行的"删除"
    $("body").on("click",".data-list-delete",function(){
        $(this).parents("tr").remove();
    });

    //序号全选
    $("body").on("click","#checkedAll",function(){
        if($(this).prop("checked")){
            $(".data-list tbody .data-list-order").prop("checked",true);
        }else {
            $(".data-list tbody .data-list-order").prop("checked",false);
        }
    });

    //底部的"删除"按钮
    $("body").on("click","#delete",function(){
        $(".data-list tbody .data-list-order").each(function(i,item){
           if($(item).prop("checked")){
               $(item).parents("tr").remove();
           }
        });
    });

    //下载
    $("#dB-unload").click(function(){

    });
});





/***************** dataBankUploadData.html *******************/
//资料库没必要放题目
$(function(){
    //“添加习题”点击箭头显示和隐藏整道题
    $("body").on("click",".person_hw_box .person-exer-list .is-spread",function(){
        $(this).toggleClass("fa-angle-up fa-angle-down");
        $(this).parents("tr").toggleClass("spread");
        $(this).parents("tr").next().toggle();
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

    //题库选题





    //生成作业
    $("#dataBank-createHw").click(function(){
        $(".preview-hw-wrap, .ic-modal").hide();
    });

    //上传
    $("#dB-upload").click(function(){
        $.ajax({
            type: "GET",
            url: "../template/transmit.html",
            success: function(data){
                $("body").append(data);
            }
        });
    });

    //上传弹出框的"转发"
    $("body").on("click","#transmit",function(){

    });

    //上传弹出框的"取消"
    $("body").on("click",".dBUpload-body .btn-white",function(){
        $(".dBUploadBox, .ic-modal").hide();
    });

    //"添加题目"页面引导
    var msg = "请点击 添加题目 噢～";
    $(".no-exer").append(ic.guide(-3,-3,57,-6,"../../../images/add_exer.jpg",msg));
});






/****************** dataBankExer.html *********************/
$(function(){
    //查找
    $("#search-exer").click(function(){
        var data = ic.search_exer();  //保存需要查找的信息
        console.log(data);
    });

    //清空
    $("#search-clear").click(ic.search_clear);

    //生成习题
    $("#dataBankCreateHw").click(function(){
        sessionStorage.setItem("ic_hw_order_dataBank",$(".hw-type-list").attr("data-all"));
        window.location.href = "dataBankUploadData.html";
    });
});



