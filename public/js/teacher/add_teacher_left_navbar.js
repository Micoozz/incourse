$(function(){
    $(".navbar").load("../template/not_admin_head.html");
    $(".left").load("../template/right_notice.html");



    //加载左边导航栏
    $.ajax({
        type: "get",
        url: "../template/teacher_left_navbar.html",
        async: false,
        success: function(data){
            $("#left").html(data);
        }
    });

    $(".content>.container").load("../template/teacher_center_nav.html");
});
