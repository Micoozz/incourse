$(function(){
	setTimeout(function(){
	//选中那种档案
	
	//引导页

		$('.part2').show()
		$('.add').css('z-index','101');
		$('.shad').css({
			'height':$(window).height(),
			'display':'block'
		});
		$('.ic-btn').click(function(){
		$('.part2').hide();
		$('.shad').hide();
	});
	
	},10)
})
