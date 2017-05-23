//单击选项就显示所选答案

//单选
$(function(){
	$(".questionSelect,.questionMultiBlankSelect").click(function(){
		var select = $(this).val();
		$(this).parent().parent().parent().siblings().find("#answerOrder").text(select);
	})
})

//多选
$(function(){
	$(".questionMultiSelect").click(function(){
		var container =[];
		$("input[type='checkbox']:checked").each(function(){
			container.push($(this).val());
		});
		$(this).parent().parent().parent().siblings().find("#answerOrder").text(container);
	})
})
	
		



