//单击选项就显示所选答案

//单选
$(function(){
	$(".exercise-box").on("click",".questionSelect,.questionMultiBlankSelect",function(){
		var select = $(this).val();
		$(this).parent().parent().parent().siblings().find(".answerOrder").text(select);
	});
})

//多选
$(function(){
	$(".exercise-box").on("click",".questionMultiSelect",function(){
		var container =[];
		$(this).parent().parent().parent().find("input[type='checkbox']:checked").each(function(){
			container.push($(this).val());
		});
		
		$(this).parent().parent().parent().siblings().find(".answerOrder").text(container);
	});
	// $(".questionMultiSelect").click(function(){
	// 	var container =[];
	// 	$(this).parent().parent().parent().find("input[type='checkbox']:checked").each(function(){
	// 		container.push($(this).val());
	// 	});
		
	// 	$(this).parent().parent().parent().siblings().find(".answerOrder").text(container);
	// })
})
	
		



