$(function(){
	setTimeout(function(){
	//选中那种档案

	//家庭成员信息
	var family=$('.family_characters').html();
	$('.add_table').click(function(){
		$('.family_table').append('<tr class="family_characters">'+family+'</tr>')
	});
	
	//删除家庭信息
	$('.family_table').on('click','.family_characters .fa-times,.family_characters .fa-trash-o',function(){
		if($('.family_table>tbody>tr').length==2){
			alert('最少保留一位家庭成员得信息')
		}else{
		$(this).parents('.family_characters').remove();
		}
	});
	
	//保存家庭信息
	$('.family_table').on('click','.family_characters .fa-file',function(){
		$(this).parents('.family_characters').find('input').each(function(){
			$(this).attr('disabled',true).css('border','none')
		});
		$(this).attr('class','fa fa-edit').next().attr('class','fa fa-trash-o')
	});
	
	//修改家庭信息
	$('.family_table').on('click','.family_characters .fa-edit',function(){
		$(this).parents('.family_characters').find('input').each(function(){
			$(this).attr('disabled',false).css('border','1px solid #ccc')
		});
		$(this).attr('class','fa fa-file').next().attr('class','fa fa-times')
	});
	
	
	//日历
	$('.fa-calendar').click(function(){
		$('input[name="birthTime"]').attr('id','');
		$(this).prev().attr('id','birthTime');
		if($(this).prev().attr('num')=='1'){
			$('.lhgcal').css({
				'left':'720px',
				'top':'450px'
			})
		}else if($(this).prev().attr('num')=='2'){
			$('.lhgcal').css({
				'left':'910px',
				'top':'610px'
			})			
		}else if($(this).prev().attr('num')=='3'){
			$('.lhgcal').css({
				'left':'940px',
				'top':'595px'
			})			
		}else if($(this).prev().attr('num')=='4'){
			$('.lhgcal').css({
				'left':'940px',
				'top':'640px'
			})			
		}else if($(this).prev().attr('num')=='5'){
			$('.lhgcal').css({
				'left':'740px',
				'top':'420px'
			})			
		}else if($(this).prev().attr('num')=='6'){
			$('.lhgcal').css({
				'left':'940px',
				'top':'605px'
			})			
		}else{
			$('.lhgcal').css({
				'left':'940px',
				'top':'650px'
			})			
		}
	});
	
	//学生档案日历引用
	J('.facalens').calendar({ id:'birthTime', btnBar:false});
	J('.facalen').calendar({ id:'birthTime', btnBar:false});
	//教师档案日历引用
	J('.facalense').calendar({ id:'birthTime', btnBar:false});
	J('.facalenses').calendar({ id:'birthTime', btnBar:false});
	//校长档案日历引用
	J('.facalensese').calendar({ id:'birthTime', btnBar:false});
	J('.facalenseses').calendar({ id:'birthTime', btnBar:false});
	J('.facalensesese').calendar({ id:'birthTime', btnBar:false});
	},10)
})
