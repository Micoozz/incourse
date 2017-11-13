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
$(".go-page").click(function(){
    goPageFun()
})
$(".goPage").focus(function(){
    document.onkeydown = function(e){
        var ev = document.all ? window.event : e;
        if(ev.keyCode==13) {
            goPageFun()
        }
    }
})
function goPageFun(){
    var liActive = $("ul#pagaSkip").find("li.active").find('span').text();
    var val = $(".goPage").val()
    if(val == liActive){
        return;
    }
    var page;
    if(val == ''){
    	return;
    }else{
    	page = val;
	    var pathName = window.location.pathname;
	    window.location.href = pathName + '?page=' + page;
    }
}