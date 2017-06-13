$(function () {
    //加载作业列表内容
    $.get("showWorkList/1").success(function(data){
		console.log(data)
    });
	
	//点击作业保存作业ID
	$(".homework-list .homework-type-link").click(function(){
		const id = $(this).attr("data-id");
		sessionStorage.setItem("homeworkId",id);
	});

    $(".not-open").click(function () {
        $(".not-open-tips").fadeIn().fadeOut(2000);
    });
})
