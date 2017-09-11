/***** exerRoom.html *****/
$(function(){
    //页面刚加载就显示已经添加的题目数
    var personHw_str = sessionStorage.getItem("ic_personHw");
    var personHw_num = 0; //保存已经存在的题目数量
    if(personHw_str){
        var exist_exer = JSON.parse(personHw_str).exercise;
        personHw_num = exist_exer.length;

        //把从personHw.html传过来的题目按题型整合
        var integration_obj = integration(exist_exer);
        console.log(integration(exist_exer))
        $(".hw-type-list").attr("data-all",integration_obj.order.join(","));

        //生成右边的题目栏
        createHwList(integration_obj.orderList);
    }


    function integration(param){
        var obj_big = {
            "order": [],
            "orderList": {}
        };
        var obj = {};
        if(param.length !== 0){
            param.forEach(function(item,i){
                obj[item.type] = obj[item.type] ? obj[item.type] + 1 : 1;
                obj_big.order.push(item.id);
            });
        }
        obj_big.orderList = obj;

        return obj_big;
    }

    function createHwList(obj){
        var html = "";
        for(var key in obj){
            html += '<li>\
            <span class="type">' + key + '</span>\
            <span class="number">（' + obj[key] + '）</span>\
            </li>';
        }
        $(".hw-type-list").html(html);
    }

    $(".hw-list .exer-num>span").text(String(personHw_num));

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
        ["全国","全省","全部学校","全部老师"],
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

            $(".hw-list .exer-num>span").text(Number($(".hw-list .exer-num>span").text()) + 1 + "");
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

            $(".hw-list .exer-num>span").text(Number($(".hw-list .exer-num>span").text()) - 1 + "");
        }

        console.log(personHw_num)
        is15(personHw_num);
    });

    //判断题数是否到达15题("习题库"每次分页也得调用一下此方法)
    function is15(){
        var total = $(".hw-type-list").attr("data-all").split(",").length;
        console.log(total)
        if(total >= 15){
            $(".exer-head .checkbox-add:not(:checked)").prop("disabled",true);
        }else {
            $(".exer-head .checkbox-add:not(:checked)").prop("disabled",false);
        }
    }

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
        window.location.href = "/learningCenter/"+class_id+"/"+course_id+"/"+mod+"/addHomework-personal";
    });

    //var exerRoomArr = []; //保存预览里面删除了哪些题

    //点击“预览”的效果
    $("#preview").click(function(){
        exerRoomArr = [];
        $(".ic-modal, .preview-guide").fadeIn();

        var hw_order = $(".hw-type-list").attr("data-all").split(",");  //选中的题型
    });

    //删除预览框里面的题目
    $(".preview-hw-wrap").on("click",".exer-head .delete-icon",function(){
        //exerRoomArr.push($(this).parents(".exer-in-list").attr("data-id"));
        $(this).parents(".exer-in-list").remove();
    });

    //关闭预览框
    $(".preview-hw-wrap .ic-close-icon").click(function(){
        $(".preview-hw-wrap, .ic-modal").hide();
        //exerRoomArr = [];
    });

    //点击预览里的"完成"
    $(".preview-hw-wrap .complete").click(function(){
        $(".hw-list .exer-num>span").text($(".preview-hw-box .exer-in-list").length);

        var order = []; //保存题目ID
        var obj = {}; //保存整合后的题目
        $(".preview-hw-box .exer-in-list").each(function(i,item){
            order.push($(item).attr("data-id"));
            var type = $(item).children(".exer-head").find(".exer-type-list").text();
            obj[type] = obj[type] ? obj[type] + 1 : 1;
        });
        createHwList(obj);
        $(".hw-type-list").attr("data-all",order.join(","));


        /*
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


        console.log(type_obj);
        var html = "";
        for(var key in type_obj){
            html += '<li>\
                        <span class="type">' + key + '</span>\
                        <span class="number">（' + type_obj[key] + '）</span>\
                    </li>';
        }
        $(".hw-list .hw-type-list").html(html);
        */

        $(".preview-hw-wrap .ic-close-icon").trigger("click");
    });



    //"预览作业"页面引导
    // $.ajax({
    //     type: "get",
    //     url: "../template/guideH.html",
    //     async: false,
    //     success: function(data){
    //         $(".preview-guide>div").html(data);
    //     }
    // });
    // $(".preview-guide .msg").html('点击 <b>完成</b> 即可生成作业，若不需要，请点击 <b>关闭</b> 按钮噢～');
    // $(".preview-guide").on("click",".part button",function(){
    //     $(this).parents(".guide").hide();
    //     $(".preview-hw-box").show();
    // });

    //查看同类型练习题
    $(".lookSameExer").click(function(){
        $(".ic-modal,.person-hw-mark").show();
    });
});



