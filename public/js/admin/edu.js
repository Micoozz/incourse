$(function(){
	$("#left").load("../../admin/template/left_navbar_jw.html");
	$(".step-change-box").load("../../template/stepChange.html");
	$(".guide").load("../../admin/template/guide.html");
	setTimeout(function(){
		$('.eduAdmin .ic-blue').text('教务管理')
	},10)
})