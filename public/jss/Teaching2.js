$(function() {
		$('.choose ul li').not(':first-child').click(function() {
			$(this).siblings().attr('class', '');
			$(this).addClass('fi');
		})
	})
	/**
	 * Created by Administrator on 2016/6/22.
	 */
$(function() {
	$('.choose>span').click(function() {
		$('.ul').toggle()
	})
});
$(function() {
	$('#table td').mouseover(function() {
		$(this).parent('tr').find('a').css('color', '#168BEE');
	});

	$('#table td').mouseout(function() {
		$(this).parent('tr').find('a').css('color', '#333');
	});
})

$(function() {
	$('.choose>ul li').click(function() {
		var li = $(this).attr('id')
		$('.table' + li).siblings().hide()
		$('.table' + li).show()
	});
	$('.pm').click(function(){
		$('.last_td').css('display','inline-block')
		$('.last_th').css('display','inline-block')
		$('#table .qs').css('display','inline-block')
		$(' #table th, #table td').css({
			width:'84'
		})
		$('#centery>div>table:nth-of-type(2) th,#centery>div>table:nth-of-type(2) td').css({
			width:'116'
		})
	})
})