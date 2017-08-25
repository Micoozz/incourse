
/*************** personHw.html *************/
/***** 布置作业 *****/
$(function(){
    var ic_personHw = sessionStorage.getItem("ic_personHw");  //页面跳转过来后获取本地信息
    var ic_hw_order = sessionStorage.getItem("ic_hw_order");  //习题库选中的题型
    var ic_hw_order_eR = sessionStorage.getItem("ic_hw_order_eR");  ////我的题库"同类型习题"选中的题型

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
            msg.exercise.push($(item).attr("data-id"));
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
});



/***** exerRoom.html *****/
$(function(){
    //查找
    $("#search-exer").click(function(){
        //保存查找的条件
        var obj = {
            "position": [],
            "condition": [],
            "keyword": ""
        };

        $(".filter-box .position-item").each(function(i,item){
            obj.position.push($(item).text());
        });
        $(".filter-box .condition-item").each(function(i,item){
            obj.condition.push($(item).text());
        });
        obj.keyword = $(".filter-box .kw").val();
    });

    //清空
    var text = [
        ["全国","全省","全市","全部老师"],
        ["全部篇章","全部小节","全部题型"],
        ""
    ];
    $("#clear").click(function(){
        $(".filter-box .position-item").each(function(i,item){
            $(item).text(text[0][i]);
        });
        $(".filter-box .condition-item").each(function(i,item){
            $(item).text(text[1][i]);
        });
        $(".filter-box .kw").val(text[2]);
    });

    //添加
    $(".exer-list").on("click",".checkbox-add",function(){
        var type = $(this).parents(".exer-head").children(".exer-type-list").text();
        var id = $(this).parents(".exer-in-list").attr("data-id");

        if($(this).prop("checked")){
            if($(".hw-type-list").attr("data-all")){
                $(".hw-type-list").attr("data-all", $(".hw-type-list").attr("data-all") + "," + id);
            }else {
                $(".hw-type-list").attr("data-all", id);
            }

            var is_exist = false;
           $(".hw-list .type").each(function(i,item){
                if($(item).text() === type){
                    is_exist = true;
                    $(item).next(".number").text('（' + (Number($(item).next(".number").text().slice(1,-1)) + 1) + '）');
                }
           });
            if(!is_exist){
                $(".hw-list .hw-type-list").append('<li>\
                                                      <span class="type">' + type + '</span>\
                                                      <span class="number">（1）</span>\
                                                </li>');
            }
        }else {
            var data_all = $(".hw-type-list").attr("data-all");
            var arr = data_all.split(",");
            arr.splice(arr.indexOf(id), 1);
            $(".hw-type-list").attr("data-all", arr.join(","));

            $(".hw-list .type").each(function(i,item){
                if($(item).text() === type){
                    var number = Number($(item).next(".number").text().slice(1,-1)) - 1;
                    if(number === 0) {
                        $(this).parent().remove();
                    }else {
                        $(item).next(".number").text('（' + number + '）');
                    }
                }
            });
        }
    });

    //点赞
    $(".exer-list").on("click",".exer-foot .thumbs-up",function(){
        $(this).toggleClass("ic-blue");
        $(this).children("i").toggleClass("fa-thumbs-o-up fa-thumbs-up");
    });

    //收藏
    $(".exer-list").on("click",".exer-foot .collect-icon",function(){
        $(this).toggleClass("red");
        $(this).children("i").toggleClass("fa-heart-o fa-heart");
        if($(this).children("i").hasClass("fa-heart")){
            $(this).children("span").text(Number($(this).children("span").text()) + 1);
        }else {
            $(this).children("span").text(Number($(this).children("span").text()) - 1);
        }
    });

    //生成作业
    $("#create-hw").click(function(){
        sessionStorage.setItem("ic_hw_order",$(".hw-type-list").attr("data-all"));
        window.location.href = "personHw.html";
    });

    var exerRoomArr = []; //保存预览里面删除了哪些题

    //点击“预览”的效果
    $("#preview").click(function(){
        exerRoomArr = [];
        $(".ic-modal, .preview-guide").fadeIn();

        var hw_order = $(".hw-type-list").attr("data-all").split(",");  //选中的题型
    });

    //删除预览框里面的题目
    $(".preview-hw-wrap").on("click",".exer-head .delete-icon",function(){
        exerRoomArr.push($(this).parents(".exer-in-list").attr("data-id"));
        $(this).parents(".exer-in-list").remove();
    });

    //关闭预览框
    $(".preview-hw-wrap .ic-close-icon").click(function(){
        $(".preview-hw-wrap, .ic-modal").hide();
    });

    //点击预览里的"完成"
    $(".preview-hw-wrap .complete").click(function(){
        var hw_order = $(".hw-type-list").attr("data-all").split(",");
        exerRoomArr.forEach(function(item,i){
            hw_order.splice(hw_order.indexOf(item), 1);
        });
        $(".hw-type-list").attr("data-all", hw_order.join(","));

        var type_obj = {};
        $(".preview-hw-wrap .exer-type-list").each(function(i,item){
            if(type_obj[$(item).text()]){
                type_obj[$(item).text()] += 1;
            }else {
                type_obj[$(item).text()] = 1;
            }
        });
        $(".preview-hw-wrap .ic-close-icon").trigger("click");

        console.log(type_obj);
        var html = "";
        for(var key in type_obj){
            html += '<li>\
                        <span class="type">' + key + '</span>\
                        <span class="number">（' + type_obj[key] + '）</span>\
                    </li>';
        }
        $(".hw-list .hw-type-list").html(html);
    });
})




/********************* personHwMark.html **************************/
$(function(){
     //查看同类型练习题
     $(".lookSameExer").click(function(){
        $(".ic-modal,.person-hw-mark").show();
     });
})



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

//     //"添加习题"页面引导
//     $.ajax({
//         type: "get",
//         url: "../template/guideH.html",
//         async: false,
//         success: function(data){
//             $(".person_hw_box .guide>div").html(data);
//         }
//     });
//     $(".person_hw_box .guide .msg").html('快去进行 <b>添加习题</b> 吧～');
//     $(".person_hw_box").on("click",".guide .part button",function(){
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

//     //"预览作业"页面引导
//     $.ajax({
//         type: "get",
//         url: "../template/guideH.html",
//         async: false,
//         success: function(data){
//             $(".preview-guide>div").html(data);
//         }
//     });
//     $(".preview-guide .msg").html('点击 <b>完成</b> 即可生成作业，若不需要，请点击 <b>关闭</b> 按钮噢～');
//     $(".preview-guide").on("click",".part button",function(){
//         $(this).parents(".guide").hide();
//         $(".preview-hw-box").show();
//     });
// });






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

    //点击"同类型习题"清空"已添加作业"里面的值
    //$("body").on("click",".myUpload .lookSameExer",function(){
    //   $(".hw-type-list").attr("data-all","");
    //});

    //生成作业
    $("#exerRoomCreateHw").click(function(){
        sessionStorage.setItem("ic_hw_order_eR",$(".hw-type-list").attr("data-all"));
        window.location.href = "personHw.html";
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










































