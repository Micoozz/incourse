/***** exerRoom.html *****/
$(function(){
    // var exer = id_type.exercise;
    // var order = hwInfo_obj.exercise_id;



    //"我上传的"按钮
    /*$("body").on("click",".my-exer-room-head .doMark",function(){
        $(".myUpload").show();
        $(".all-exer,.myCollect").hide();
        $(".my-exer-room-head .isMark").removeClass("active");
        $(".my-exer-room-head .doMark").addClass("active");
    });*/

    //"我收藏的"按钮
    /*$("body").on("click",".my-exer-room-head .notMark",function(){
        $(".all-exer,.myUpload").hide();
        $(".myCollect").show();
        $(".my-exer-room-head .isMark").removeClass("active");
        $(".my-exer-room-head .notMark").addClass("active");
    });*/


    //查找
    /*$("body").on("click","#search-exer",function(){
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
    });*/

    //添加
    /*$("body").on("click",".exer-list .checkbox-add",function(){
        var type = $(this).parents(".exer-head").children(".exer-type-list").text();
        var id = $(this).parents(".exer-in-list").attr("data-id");

        if($(this).prop("checked")){
            exer.push({"id":id, "type":type});
            order.push(id);

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
            var index = order.indexOf(id);
            order.splice(index,1);
            exer.splice(index,1);

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

        //题目有15题之后不能再添加
        is15();
    });*/

    //点赞
    /*$("body").on("click",".exer-list .exer-foot .thumbs-up",function(){
        $(this).toggleClass("ic-blue");
        $(this).children("i").toggleClass("fa-thumbs-o-up fa-thumbs-up");
    });*/

    //收藏
    /*$("body").on("click",".exer-list .exer-foot .collect-icon",function(){
        $(this).toggleClass("red");
        $(this).children("i").toggleClass("fa-heart-o fa-heart");
        if($(this).children("i").hasClass("fa-heart")){
            $(this).children("span").text(Number($(this).children("span").text()) + 1);
        }else {
            $(this).children("span").text(Number($(this).children("span").text()) - 1);
        }
    });*/

    //点击"生成作业"
    /*$("body").on("click","#create-hw",function(){
        $(".homework-manage-title a").removeClass("active");
        $(".homework-manage-title li:first-child a").addClass("active");

        //填充题目信息
        fillInfo(hwInfo_obj);
        $(".personHw-num").text(order.length);
        personHwIs15();
    });*/

    //点击“预览”的效果
    /*$("body").on("click","#preview",function(){
        $(".preview-hw-box, .row .ic-modal").show();
        //"预览作业"页面引导
        var msg = "点击 <b>完成</b> 即可生成作业，若不需要，请点击 <b>关闭</b> 按钮噢～";
        $(".admin-container").append(ic.guide(-15,68,70,500,"../../images/preview_guide.jpg",msg));
    });*/

    //"预览作业"页面引导的"我知道了"
    /*$("body").on("click",".preview-guide .part button",function(){
        $(".guide-active, .admin-container .ic-modal").hide();
        $(".preview-hw-box, .row .ic-modal").show();
    });
*/
    //删除预览框里面的题目
    /*$("body").on("click",".preview-hw-wrap .exer-head .delete-icon",function(){
        $(this).parents(".exer-in-list").remove();
    });*/


    /*//查看同类型练习题
    $("body").on("click",".lookSameExer",function(){
        $(".ic-modal,.person-hw-mark").show();
    });*/

    //"我收藏的"的里面的取消收藏
    /*$("body").on("click",".myCollect .collect-icon",function(){
        var id = $(this).parents(".exer-in-list").attr("data-id");
        console.log(id);

        $(this).parents(".exer-in-list").remove();
    });*/

    //判断题数是否到达15题("习题库"每次分页也得调用一下此方法)
    /*function is15(){
        if(order.length >= 15){
            $(".exer-head .checkbox-add:not(:checked)").prop("disabled",true);
        }else {
            $(".exer-head .checkbox-add:not(:checked)").prop("disabled",false);
        }
    }*/
});


/********** editorExerPage.html ************/
/*$(function(){
   $("body").on("click","#editorModal-close",function(){
       $(".editorExerModal").remove();
       $(".ic-modal").hide();
       $(".hw-list").css("z-index","300");
   });
});*/






/**** 陈杰的代码 ***/
$(function() {
    //我的解析和教师解析切换
    var pd=0;//判断条件
    $('body').on('click','.analyticType>span',function(){
        $('.analyticType>span').removeClass('pitchOn')
        $(this).addClass('pitchOn')
        if(pd==0){
            $('.video_analyze').show()
            $('.myAnalytic').hide()
            pd=1
        }else{
            $('.myAnalytic').show()
            $('.video_analyze').hide()
            pd=0
        }
    })


    //查看解析
    $('body').on('click', '.collect>li:nth-of-type(2)>a', function() {
        $('.resolution,.ic-modal').show()
        return false
    })

    //举报
    $('body').click(function() {
        $('.report').removeClass('red')
        $('.reprot-a').hide()
    })
    $('body').on('click', '.report', function() {
        $(this).addClass('red')
        $('.reprot-a').show()
        return false
    });
    $('body').on('click','.bad-information li',function() {
        if($(this).find('i').attr('class') != 'fa fa-dot-circle-o blue') {
            $(this).find('i').attr('class', 'fa fa-dot-circle-o blue')
        } else {
            $(this).find('i').attr('class', 'fa fa-circle-o')
        }

    });
    $('.bad-information li:last-child').prev().click(function() {
        if($(this).find('i').attr('class') == 'fa fa-circle-o') {
            $(this).next().hide()
        } else {
            $(this).next().show()
        }
    });
    $('body').on('click','.reprot-a>span:last-child',function() {
        $('.bad-information').show()
        $('.shad').height(window.innerHeight).show()
    });
    $('body').on('click','.shad,.bad-information button,.ic-modal',function() {
        $('.bad-information,.shad').hide();
    });

    //举报提交
    $('body').on('click','.bad-information button',function() {

    });

    //上传文件
    $('body').on('change','#file',function() {
        input = $(this)[0];
        if(!input['value'].match(/.jpg|.gif|.png|.bmp/i)) { //判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择");
        }
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
            $('.imgse').append('<img src="' + this.result + '" style="width:70px";height:70px/>')
        };
    });

    //评论
    $('body').on('focus','.comment>input',function() {
        $('.appear').show();
    });

    $('body').on('blur','.comment>input',function() {
        $('.appear').hide();
    });

    //提交评论
    $('.appear').click(function() {

    });
});