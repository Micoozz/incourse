$(function() {
	//顶部导航最右边hover向下箭头改变效果
	$(".navbar").on("mouseover",".personCenter",function(){
		$(".navbar .personCenter .fa").removeClass("fa-angle-down").addClass("fa-angle-up");
	});
	$(".navbar").on("mouseout",".personCenter",function(){
		$(".navbar .personCenter .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
	});

	//中间部分左边“返回”点击效果
	$(".left-tag").click(function(){
		window.history.go(-1);
	});
})
$(function() {
	//路径
	var str = document.URL;
	var index = str.lastIndexOf("\/");
	str = str.substring(index + 1, str.length);

	if(str != 'exerciseEditor') {
		localStorage.pargin = 1
	}
});