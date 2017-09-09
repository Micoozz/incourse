$(function(){
	setTimeout(function(){
		$('.part2').show().addClass('position').css({
			    'top': '142px',
   				'left':'63%'
		});
		
		//遮罩层
		$('.shad').show().height(window.innerHeight)
		
		$('.add').css({
			'z-index':'101',
			'color':'#fff'
		});
		
		$('.position').find('p').text('快去新建员工吧')
		
		$('.ic-btn').on('click',function(){
			$('.d-n,.shad').hide()
		})
	},10)
})
