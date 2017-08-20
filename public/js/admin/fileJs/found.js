$(function(){
	
	//禁止跳转
	setTimeout(function(){
		$('#nav1>li>a').attr('onclick',"return false")
	
	$('body').click(function(){
		$('.class_s').slideUp();
	})
	//创建年级
	$('.found_class').on('click','.found',function(){
		$('.found_class>ul').append('<li><input type="text"/></li>');
		$('input').focus();
	});

	$('.found_class').on('click','ul>li',function(){
		$('.found_class>ul>li').removeClass('bule');
		$(this).addClass('bule')
	})
	
	
	$('.found_class').on('click','ul>li',function(){
		$(this).find('.class_s').slideToggle();
		$('input').focus();
		return false;
	})
	
	//创建班级
	$('.found_class').on('blur','ul>li>input',function(){
		$(this).parent().append('<div>'+$(this).val()+'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></div><div class="class_s"><div><input /></div><i class="fa fa-plus-circle"></div>')
		if($(this).val()==''){
			$(this).parent().remove()
		}
		$(this).remove();
		$('input').focus();

	//引导页
	if($('.found_class>ul>li').length==2){
		$('#nav1>li>a').addClass('black');
		$('.part2').show()
		$('#left').css('z-index','101');
		$('.waitBox>div:last-child').text('快去创建档案吧~')
		$('.shad').css({
			'height':$(window).height(),
			'display':'block'
		})
		
		$('.ic-btn').click(function(){
		$('.part2').hide();
		$('.shad').hide();
	});
	}
	});
	
	$('.found_class').on('click','.class_s',function(){
		$(this).show()
		return false;
	})

	//添加班级
	$('.found_class').on('click','.class_s>i',function(){
		$('.class_s>div').append('<input />');
		$('input').focus();
	});
	
	$('.found_class').on('blur','.class_s>div>input',function(){
		$('.class_s>div').append('<div>'+$(this).val()+'</div>');
		$(this).remove();
		if($('.class_s').text()!=''){
			$('#nav1>li>a').removeAttr('onclick')
		}
	});
	
	},10)
});
