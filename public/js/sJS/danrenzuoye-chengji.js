$(function(){
	const id = sessionStorage.getItem("homeworkId");
	$.get("").success(function(data){
		$(".objective-grade").text();  //客观题总分
		$(".positive-grade").text();    //主观题总分
		$(".sum-grade").text();    //综合得分

		var objective = "";
		var subjective = "";
		
	});
})