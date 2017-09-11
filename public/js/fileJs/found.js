$(function(){

	//禁止跳转
	setTimeout(function(){
	$('body').click(function(){
		$('.class_s').slideUp();
	})
	//创建年级
	$('.found_class').on('click','.found',function(){
		console.log(111)
		$('.found_class>ul').append('<li><input type="text"/></li>');
		/*$('input').focus();*/
	});

	$('.found_class').on('click','.found',function(){
		$('.found_class>ul>li').removeClass('bule');
		/*$(this).addClass('bule')*/
	})
	
	
	$('.found_class').on('click','ul>li',function(){
		$(this).find('.class_s').slideToggle();
		return false;
	})
	
	//创建年级
	$('.found_class').on('blur','ul>li>input',function(){
		$(this).parent().append('<div>'+$(this).val()+'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down" ></i></div><div id="create" class="class_s"><div><input /></div><i class="fa fa-plus-circle"></div>')
		var data = [];
		console.log(11);
		console.log($(this))
		data.push({'name':'title','value':$(this).val()})
		data.push({'name':'_token','value':token});
		console.log(data);
		$.post("/createClass",data,function(result){
			console.log(result)
	 		$('#create').attr('id',result);
		});

		if($(this).val()==''){
			$(this).parent().remove()
		}
		$(this).remove();
		

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
		/*$('input').focus();*/
	});
	
	$('.found_class').on('blur','.class_s>div>input',function(){
		$('.class_s>div').append('<div>'+$(this).val()+'</div>');
		//console.log($(this).parents('.class_s').attr('id'))
		//console.log($(this).parents('.class_s').prev().attr('id'))
		var data = [];
		data.push({'name':'id','value': $(this).parents('.class_s').attr('id') });
		console.log(data)
		data.push({'name':'title','value':$(this).val()});
		data.push({'name':'_token','value':token});
		$.post("/createGrade",data,function(result){
			
		});
		$(this).remove();
		if($('.class_s').text()!=''){
			$('#nav1>li>a').removeAttr('onclick')
		}
	});
	
	},10)
});
