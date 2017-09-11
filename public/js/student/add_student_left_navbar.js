$(function(){
    $(".navbar").load("../template/not_admin_head.html");
    $(".left").load("../template/right_notice.html");



    //加载左边导航栏
    $.ajax({
        type: "get",
        url: "../template/pupilLeft.html",
        async: false,
        success: function(data){
            $("#left").html(data);
        }
    });

    $(".content>.container").load("../template/student_center_nav.html");
})



