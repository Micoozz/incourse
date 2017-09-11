$(function(){
	setTimeout(function(){
		$('.d-n').show().addClass('position');
		
		//遮罩层
		$('.shad').show().height(window.innerHeight)
		
		$('#nav1>li:first-child').css({
			'z-index':'101',
			'background-color':'#fff'
		});
		
		$('.position').find('p').text('快去课程表添加课程吧')
		
		$('.ic-btn').on('click',function(){
			$('.d-n,.shad').hide()
		})
	},10)
})
