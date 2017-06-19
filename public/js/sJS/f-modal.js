//单人作业
$(function(){
	$(".q-block-trigger").click(function(){
		$("#f-modal").fadeIn();
		$("#answerInput").fadeIn();
	})
})
$(function(){
	$(".answerInput-close").click(function(){
		$("#answerInput").fadeOut();
		$("#f-modal").fadeOut();
	})
})

