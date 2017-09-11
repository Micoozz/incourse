$(function(){
	//选中每个筛选框的选项效果
	$(".syllabus .options").on("click","li",function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
	});
	
	//查找
	$("#search").click(function(){});
	
	//清空
	$("#clear").click(function(){
		$(".syllabus-only .options li").removeClass("active");
	});
	
	//查看课程表
	$(".syllabus-only").on("click",".fa-eye",function(){});
	
	//删除课程表
	$(".syllabus-only").on("click",".fa-trash",function(){
		$(this).parents("tr").remove();
	});
	
	//点击“出勤记录”效果
	$(".appDis-nav .appear-record-tag").click(function(){
		$(".appDis-nav>span").removeClass("current");
		$(this).addClass("current");
		$(".discipline-record").hide();
		$(".appear-record").show();
	});
	
	//点击“纪律记录”效果
	$(".appDis-nav .disc-record-tag").click(function(){
		$(".appDis-nav>span").removeClass("current");
		$(this).addClass("current");
		$(".appear-record").hide();
		$(".discipline-record").show();
	});
	
	//添加记录
	$("#addRecord").click(function(){
		$(".addDisciplineRecord").fadeIn("fast");
		$(".ic-modal").fadeIn("fast");
	});
	
	//关闭"新增纪律记录"弹出框
	$("#addDisRecord-close").click(function(){
		$(".addDisciplineRecord").hide();
		$(".ic-modal").hide();
	});
})
