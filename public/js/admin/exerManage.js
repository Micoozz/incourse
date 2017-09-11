
//左边导航
$(function(){
    $("#left").load("../template/left_navbar.html");
})



/*********************** exerManage.html **********************/
$(function(){
    //默认字段
    var text = [
        ["全部年级","全部班级"],
        ["全部科目","全部篇章","全部小节","全部题型"],
        "全部教师",
        ""
    ];

    //查找
    $("#search_myCollect").click(function(){
        //保存查找的条件
        var obj_myCollect = {
            "class": [],
            "chapter": [],
            "teacher": "",
            "keyword": ""
        };

        $(".class-item").each(function(i,item){
            obj_myCollect.class.push($(item).text());
        });
        $(".chapter-item").each(function(i,item){
            obj_myCollect.chapter.push($(item).text());
        });
        obj_myCollect.teacher = $(".teacher").text();
        obj_myCollect.keyword = $(".kw").val();

        console.log(obj_myCollect);
    });

    //清空
    $("#clear_myCollect").click(function(){
        $(".class-item").each(function(i,item){
            $(item).text(text[0][i]);
        });
        $(".chapter-item").each(function(i,item){
            $(item).text(text[1][i]);
        });
        $(".teacher").text(text[2]);
        $(".kw").val(text[3]);
    });

    //删除
    $(".exer-list").on("click",".exer-list-delete",function(){
       $(this).parents(".exer-in-list").remove();
    });
})















