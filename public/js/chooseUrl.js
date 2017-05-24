/**
 * Created by Administrator on 2017/4/10.
 */
$(function(){
    var msg = sessionStorage.getItem("job");
    console.log(msg)

    //页面导航最后添加的id都是为了演示流程用
    $("#home").click(function(){
        switch(msg){
            case "job=teacher" : window.location="media.html?"+msg;
                break;
            case "job=student" : window.location="media.html?"+msg;
                break;
            case "job=manager" : window.location="mediaManager.html";
                break;
            default : break;
        }
    });
    $("#me").click(function(){
        switch(msg){
            case "job=teacher" : window.location="relateToMe.html?"+msg;
                break;
            case "job=student" : window.location="relateToMe.html?"+msg;
                break;
            case "job=manager" : window.location="relateToMeManager.html";
                break;
            default : break;
        }
    });
    $("#study").click(function(){
        switch(msg){
            case "job=teacher" : window.location="../Teacher/Arrangement_work(homepage).html?"+msg;
                break;
            case "job=student" : window.location="../Student/zuoyenbenneirongliebiao.html?"+msg;
                break;
            default : break;
        }
    });
    $("#classroom").click(function(){
        switch(msg){
            case "job=teacher" : window.location="../Teacher/classSpace111.html?"+msg;
                break;
            case "job=student" : window.location="../Student/classSpace111.html?"+msg;
                break;
            default : break;
        }
    });
    $("#analyse").click(function(){
        switch(msg){
            case "job=teacher" : window.location="../Teacher/class.html?"+msg;
                break;
            case "job=student" : window.location="../Student/synthesizeMark.html?"+msg;
                break;
            default : break;
        }
    });
    $("#studyLife").click(function(){
        switch(msg){
            case "job=teacher" : window.location="../Teacher/老师成绩单1.html?"+msg;
                break;
            case "job=student" : window.location="../Student/overTheYears_Report111.html?"+msg;
                break;
            default : break;
        }
    });
    $("#person").click(function(){
        switch(msg){
            case "job=teacher" : window.location="../Teacher/teacherPersonData.html?"+msg;
                break;
            case "job=student" : window.location="../Student/personal_material-password111.html?"+msg;
                break;
            case "job=manager" : window.location="../Admin/AdminData/teacherPersonData.html";
                break;
            default : break;
        }
    });
})



/******* 演示用  开始********/
$(function(){
    var content = $(".nav.head_nav>li:last-child>a").text();
    if(content === "退出"){
        $(".nav.head_nav>li:last-child>a").removeAttr("href").click(function(){
            window.location = "../index.html";
        });
    }
})

//修改导航栏的鼠标指针
$(function(){
    $(".nav.head_nav>li").css("cursor","pointer");
})
/******* 演示用  结束********/