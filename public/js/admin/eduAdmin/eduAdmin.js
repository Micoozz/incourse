$(function(){
	// 加载教务左边导航
	$.ajax({
		type: "get",
		url: "../template/left_navbar_jw.html",
		async: false,
		success: function(data){
			$("#left").html(data);
		}
	});
})