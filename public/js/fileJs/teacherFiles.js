$(function(){
	setTimeout(function(){		
		//加载中
		/*var time=setTimeout(function(){
			$('.teacher_container').hide();
			$('.admin-container').show();
			clearTimeout(time)
		},2000);*/
		
		
	//停用教师
	$('body').on('click','.forbidden,.fa-times-circle-o',function(){
		if($(this).parents('tr').css('color')=='rgb(204, 204, 204)'){
			$(this).attr('class','fa fa-ban forbidden').parents('tr').css('color','#333');
			
				if($(this).prev().attr('num')=='0'){
			$(this).prev().find('i').attr('class','fa fa-edit')
			}else{
			$(this).prev().find('i').attr('class','fa fa-eye')	
			}
		}else{
			$(this).attr('class','fa fa-times-circle-o').parents('tr').css('color','#ccc');
			$(this).prev().find('i').attr('class','fa fa-eye gray')
		}
		
	});
	
		//删除教师
	$('body').on('click','.fa-trash-o',function(){
		if($('.admin-list-a tr').length==2){
			alert('最少保留一位家庭成员得信息')
		}else{
		$(this).parents('tr').remove();
		}
	});
	},10)

	//已分配和未分配切换、
	/*var pd=0//判断条件
	$('body').on('click','.search-box>.admeasure',function(){
		$('.search-box>.admeasure').removeClass('on')
		$(this).addClass('on');
		$('.school-container table').hide();
		$('.school-container table:nth-of-type('+$(this).attr("num")+'').show()
	})*/
})
