
/*********** 传递题目信息 *************/
//保存题目信息，流转用
var hwInfo_obj = {
    "course": "",
    "title": "",
    "chapter": [],
    "deadline": "",
    "commonHw": "",
    "exercise_id": []    //保存题目的id
};

//保存题目的id和题目类型，对后台没用
var id_type = {"exercise": []};


$(function(){
    //"作业类型","批改作业","习题库"导航栏切换
    $(".homework-manage-title a").click(function(){
        $(".homework-manage-title a").removeClass("active");
        $(this).addClass("active");
    });
    //切换到"作业类型"页面
    $(".hwType-link").click("template/hwTypePage.html",function(e){
        routerLink(e);

        //"作业选择" 页面引导
        var msg = "快去进行 <b>作业选择</b> 吧～";
        //$(".homework-type-box").append(ic.guide(157,100,44,3,"../../images/homework_type.jpg",msg));
    });

    //刚开始显示"作业类型"页面
    $(".hwType-link").trigger("click");

    //点击"个人作业"和"生成作业"切换页面
    $("body").on("click",".person_hw, #create-hw","template/personHwPage.html",function(e){
        routerLink(e);

        //"添加习题"页面引导
        //$(".no-exer").append(ic.guide(0,-5,44,3,"../../images/add_exer.jpg","请先 添加习题 噢～"));

        //日期插件
        J(function () {
            J('.person_hw_box .fa-calendar').calendar({id: 'expiration-time', format: 'yyyy-MM-dd HH:mm'});
        });
    });

    //切换到"批改作业"
    $(".correctHw-link").click("template/PigaizuoyePage.html",routerLink);

   //切换到"习题库"页面
    $(".exerRoom-link").click("template/exerRoomPage.html",routerLink);
});

//单页切换
function routerLink(e){
    $.ajax({
        type: "get",
        url: e.data,
        async: false,
        cache: false,
        success: function(data){
            $(".ic-router").html(data);
        }
    });
}



//题目按题型归类
function createHwList(arr){
    var integration = {}; //保存题目按题型整理的结果
    if(arr.length !== 0){
        arr.forEach(function(item){
            integration[item.type] = integration[item.type] ? integration[item.type] + 1 : 1;
        });
    }

    var html = "";
    for(var key in integration){
        html += '<li>\
            <span class="type">' + key + '</span>\
            <span class="number">（' + integration[key] + '）</span>\
            </li>';
    }
    $(".hw-type-list").html(html);
}


//“上传习题”弹出框判断是不是到15题
function uploadIs15(num){ //num为数字
    var len = num ? num : hwInfo_obj.exercise_id.length;

    if(len >= 15){
        $(".addExerBtn").prop("disabled",true);
    }else {
        $(".addExerBtn").prop("disabled",false);
    }
}

//“布置作业”页填充信息
function fillInfo(obj){
    $(".hw-title-input").val(obj.title);
    $(".person_hw_box .chapter").text(obj.chapter[0]);
    $(".person_hw_box .trifle").text(obj.chapter[1]);
    $("#expiration-time").val(obj.deadline);
    $(".person_hw_box .hw-content").val(obj.commonHw);

    if(obj.exercise_id.length !== 0){
        $(".has-exer").show();
        $(".personHw-num").text(hwInfo_obj.exercise_id.length);
        personHwIs15();

        //题号保存在obj.exercise_id，类型Array,后台获取完题号显示题目
    }
}

//“布置作业”页判断是不是到15题
function personHwIs15(){
    if(hwInfo_obj.exercise_id.length >= 15){
        $("#personHw-uploadExer, .personHw-addExer").prop("disabled",true);
    }else {
        $("#personHw-uploadExer, .personHw-addExer").prop("disabled",false);
    }
}


//清空“布置作业”页面内容
function clearContent(){
    hwInfo_obj = {
        "title": "",
        "chapter": [],
        "deadline": "",
        "commonHw": "",
        "exercise_id": []
    };

    id_type.exercise = [];
}





