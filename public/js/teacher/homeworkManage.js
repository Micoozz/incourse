/********** homeworkManage.html ***********/




/***** 布置作业 *****/
$(function(){
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

    //保存
    $("#save-person-hw").click(function(){
        var msg = {
            "作业标题": $(".hw-title-input").val(),
            "所属章节": [$(".person_hw_box .chapter").text(),$(".person_hw_box .trifle").text()],
            "截止时间": $("#expiration-time").val(),
            "常规作业": $(".person_hw_box .hw-content").val(),
            "习题练习": ""
        };
        console.log(msg)
    });

    //取消
    $("#cancel-person-hw").click(function(){
        $(".ic-modal,.delete-modal").show();
    });
})



/***** 习题库 *****/
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
        if($(this).prop("checked")){
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

    //点击“预览”的效果
    $("#preview").click(function(){
        $(".ic-modal, .preview-guide").fadeIn();
    });

    //删除预览框里面的题目
    $(".preview-hw-wrap").on("click",".exer-head .delete-icon",function(){
        $(this).parents(".exer-in-list").remove();
    });

    //关闭预览框
    $(".preview-hw-wrap .ic-close-icon").click(function(){
        $(".preview-hw-wrap, .ic-modal").hide();
    });

    //点击预览里的"完成"
    $(".preview-hw-wrap .complete").click(function(){
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
// })






/********************************************* 合成一个页面的js **********************************/

/*布置作业、批改作业、习题库 标签切换*/
/*
 $(function(){
 //点击"布置作业"
 $(".arrange-hw-icon").click(function(){
 $(".homework-manage-title a").removeClass("active");
 $(this).addClass("active");
 $(".person_hw_box,.homeWork-cen,.exer-room").hide();
 $(".person_hw_box,.homework-type-box").show();
 });

 //点击"批改作业"
 $(".correct-hw-icon").click(function(){
 $(".homework-manage-title a").removeClass("active");
 $(this).addClass("active");
 $(".homework-type-box,.person_hw_box,.exer-room").hide();
 $(".homeWork-cen").show();
 });

 //点击"习题库"
 $(".exer-room-icon").click(function(){
 $(".homework-manage-title a").removeClass("active");
 $(this).addClass("active");
 $(".homework-type-box,.person_hw_box,.homeWork-cen").hide();
 $(".exer-room").show();
 });
 })*/


/***** 习题库 *****/
/*
//生成作业
$("#create-hw").click(function(){
    $(".homework-manage-title a").removeClass("active");
    $(".arrange-hw-icon").addClass("active");
    $(".exer-room,.no-exer").hide();
    $(".person_hw_box,.person-hw,.person_hw_box .has-exer").show();
});

 //作业选择
 $(".homework-type-box .person_hw").click(function(){
 $(".homework-type-box").hide();
 $(".person-hw, .ic-modal, .no-exer .guide").show();
 });
 //"添加习题"按钮
 $(".person_hw_box").on("click",".personHw-addExer",function(){
 $(".person_hw_box").hide();
 $(".arrange-hw-icon").removeClass("active");
 $(".exer-room-icon").addClass("active");
 $(".admin-container, .ic-modal, .exercise-room>.guide").show();
 });
*/




/**** 批改作业 *****/
/*
$(function() {
    setTimeout(function() {
        $('.homeWork-head li a').removeClass('box').find('i').remove();
        $('.homeWork-head li:last-child a').addClass('box').append('<sub style="font-size: 12px; color: #FFFFFF;line-height: 18px;width: 17px;height: 18px;display: inline-block;background-color: #F56A00;border-radius: 10px;position: relative;top: 5px;">班</sub>');
    }, 10);

    //已发布和未发布切换
    var estimate = true;
    $('.estate>span').click(function() {
        $('.estate>span').attr('class', '');
        $(this).attr('class', 'blue last');
        $('.pigaizuoye').hide()
        $('.pigaizuoye:nth-of-type(' + $(this).attr("num") + ')').show()
        if(estimate) {
            $('.Panel-selection').hide()
            estimate = false;
        } else {
            $('.Panel-selection').show()
            estimate = true;
        }
    });

    //删选内容
    $('body').on('click', '.Panel-selection>div>span', function() {
        $(this).parent().find('span').removeClass('entirely');
        $(this).addClass('entirely');
        if($(this).attr("num") != '3') {
            $('.pigaizuoye:nth-of-type(2)').show()
            $('.pigaizuoye:nth-of-type(3)').hide()
            $('.Panel-selection>div').show()
        }
    })
})

//小组
$('body').on('click', '.group', function() {
    $('.pigaizuoye').hide()
    $('.pigaizuoye:nth-of-type(' + $(this).attr("num") + ')').show()
    $(this).parent().nextAll().hide()
})

//个人作业批改
$('body').on('click', '.correction_pg', function() {
    $('.manageAdmin-wrap').hide()
    $('.work-correction').show()
    return false;
})
$("body").on("click",".correct-person-hw",function(){
    $(".work-correction").hide();
    $(".person-hw-correct").show();
});


$('body').on('click', '.work-correction>button', function() {
    $('.manageAdmin-wrap').show()
    $('.work-correction').hide()
    return false;
})

//小组批改
$('body').click(function(){
    $('.Group-search>span ul').hide()
})
$('body').on('click','.Group-search>span',function(){
    $('.Group-search>span ul').hide()
    $(this).find('ul').show()
    return false;
})

//小组作业批改
$('body').on('click', '.Group', function() {
    $('.manageAdmin-wrap').hide()
    $('.Group-correction').show()
    $('.Group-correction .pigaizuoye').show()
    return false;
})
$('body').on('click', '.Group-correction>button', function() {
    $('.manageAdmin-wrap').show()
    $('.Group-correction').hide()
    return false;
})
*/




/******* personHwMark.html *********/
/*
 //生成作业
 $("#create-hw-personHwMark").click(function(){
 $(".homework-manage-title a").removeClass("active");
 $(".arrange-hw-icon").addClass("active");
 $(".person-hw-mark,.homeWork-cen,.no-exer,.homework-type-box .guide,.ic-modal").hide();
 $(".person_hw_box,.person_hw,.person_hw_box .has-exer").show();
 });
 */














