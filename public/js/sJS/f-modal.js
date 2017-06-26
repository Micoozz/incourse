//单人作业弹出模态框
$(function(){
	$(".q-block-trigger").click(function(){
		$("#f-modal, #answerInput").fadeIn();
	})
})
$(function(){
	$(".answerInput-close").click(function(){
		$("#answerInput, #f-modal").fadeOut();
	})
})

