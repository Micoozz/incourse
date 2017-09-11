/******* 公用方法 **********/
var ic = {
	change: function() {
		console.log(111)
	}
}

$(function() {
	/*三级联动*/
	$(".select-form .ic-text").click(function(){
		$(this).children(".fa").toggleClass("fa-angle-down fa-angle-up");
		$(this).next("ul").toggle();
	});
	$(".select-form .lists>li").click(function(){
		var $p = $(this).parent().prev();
		$p.children("span").text($(this).text());
		$p.children(".fa").toggleClass("fa-angle-down fa-angle-up");
		$p.next("ul").toggle();
	});
	
	/*单选框*/
	$(".radio-box label.p-r input").change(function(){
		$("input[name='"+ this.name + "']").prev(".radio").removeClass("active");
		$("input[name='"+ this.name + "']:checked").prev(".radio").addClass("active");
	});
})
