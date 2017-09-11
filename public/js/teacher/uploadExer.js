$(function(){
    var exer = id_type.exercise;

    //添加完题目判断有没有到15题
    $("body").on("click",".personHw-exer .addExerBtn",function(){
    	var num = $(".personHw-exer .exist-exer").text();
        $(".personHw-exer .exist-exer").text(Number(num) + 1);

        uploadIs15(Number($(".personHw-exer .exist-exer").text()));
    });

    //删除完题目判断有没有到15题
    $("body").on("click",".personHw-exer .ic-close-icon",function(){
        var num = $(".personHw-exer .exist-exer").text();
        $(".personHw-exer .exist-exer").text(Number(num) - 1);

        uploadIs15(Number($(".personHw-exer .exist-exer").text()));
    });

    //上传习题弹出框里的"保存"
    $("body").on("click","#personHw-saveExer",function(){
        var obj = {
            "chapter": [],
            "exercise": []
        };
        
        //获取所有题目的信息，并赋值给obj.exercise
        getExercises(obj);

        //判断题目是否漏填
        if(exerIsFill(obj.exercise)){
            //向后台发送题目
            console.log(obj)
            $.post("/uploadExercise",obj,function(data){
            	if(data.code===200){
                    //渲染题目列表页

                    $(".personHw-exer .upload-modal").trigger("click");
                }
            });
        }else {
            $(".ic-tip-box").show();
            setTimeout(function(){
                $(".ic-tip-box").fadeOut("slow");
            },2000);
        }
    });


    //关闭上传习题弹出框
    $("body").on("click",".personHw-exer .upload-modal",function(){
        $(".ic-modal").hide();
        $(".personHw-exer").remove();
    });
});



