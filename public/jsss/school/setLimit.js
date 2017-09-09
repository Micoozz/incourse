$(function(){
	$.ajax({
		type: "GET",
		url: 'template/left_navbar.html',
		async: false,
		success: function(data) {
			$("#left").html(data);
		}
	});
	$(".nav1 li:last-child a").addClass("box");
	
	//管理员列表点击乡下箭头的效果
	$(".limit-box").on("click",".ic-collapse",function(){
		$(this).next("ul").slideToggle("fast");
		$(this).find("i").toggleClass("fa-angle-down fa-angle-right");
	});
	
	//我知道了
	$("#iknow2").click(function(){
		$(".ic-modal,.dragIntroModal,.limit-box .part").fadeOut();
	});
})


/*** 员工分组 *****/
$(function(){
	var current = ""; //保存是哪个分组
	var html = '<li>\
						<img class="f-r collapse-icon" src="../../images/school/more.png" alt="" />\
						<div class="ic-collapse c-d">\
							<span class="icon">\
								<i class="fa fa-angle-right"></i>\
							</span>\
							<span contenteditable="true" class="teamName drop-box">未命名</span>\
						</div>\
						<ul class="d-n"></ul>\
					</li>';
	
	//员工管理右键效果
	function showMoreChoose(event,that){
		event.preventDefault();
		$(".more-choose").css({
			"top": event.clientY + 10 + "px",
			"left": event.clientX + "px"
		}).show();
		current = $(that).parent();
		current.parent().attr("class") === $(".employee-list").attr("class") ? $("#addChild").show() : $("#addChild").hide();
		current.hasClass("fixed") ? $("#delete").hide() : $("#delete").show();
	}
	
	$(".employee-list").on("contextmenu",".ic-collapse",function(event){
		showMoreChoose(event,this);
	});
	$(".employee-list").on("click",".collapse-icon",function(event){
		showMoreChoose(event,this);
	});
	
	//点击空白关闭右键弹出框
	$("body").click(function(event){
		if(!$(event.target).hasClass("ic-collapse") && !$(event.target).hasClass("collapse-icon")){
			$(".more-choose").hide();
		}

		if((event.target.id !== "rename") && (event.target.id !== "add") && (event.target.id !== "addChild") &&　!$(event.target).hasClass("teamName")) {
			$(".employee-list .teamName").attr("contenteditable",false);
		}
	});
	
	//添加组
	$("#add").click(function(){
		current.parent().append(html);
		current.parent().children("li:last-child").children(".ic-collapse").children(".teamName").focus();
		$(".more-choose").hide();
		drop();
	});
	
	//重命名组
	$("#rename").click(function(){
		current.children(".ic-collapse").children(".teamName").attr("contenteditable",true).focus();
		$(".more-choose").hide();
	});
	
	//删除组
	$("#delete").click(function(){
		$(".ic-modal").fadeIn();
		$(".delete-modal").fadeIn();
		$(".more-choose").hide();
	});
		
	//确定
	$(".setLimit-container .delete-modal .ic-btn").click(function(){
		var lis = current.find("li>span:only-child").parent();
		$(".employee-list>li:first-child>ul").append(lis);
		current.remove();
	});
	
	//添加子项
	$("#addChild").click(function(){
		current.children("ul").append(html).show();
		current.children("ul").find(".teamName").focus();
		current.children(".ic-collapse").children(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
		$(".more-choose").hide();
		drop();
	});
})


/*** 拖拽 ***/
function drop(){
	var dropBox = $.makeArray($(".limit-box .drop-box"));

	dropBox.forEach(function(item){
		item.ondragover = function(event){
			console.log("拖拽过程")
			event.preventDefault();
		}
		item.ondrop = function(event){
			console.log("放置")
			event.preventDefault();
			$(this).parent().next("ul").show();
			$(this).prev(".icon").children(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
			var data = event.dataTransfer.getData("Text");
			$(this).parent().next("ul").prepend($("[data-id='" + data + "']"));
		}
	});
}
$(function (){
	var canDrag = $.makeArray($(".limit-box .canDrag"));
	
	canDrag.forEach(function(item){
		item.ondragstart = function(event){
			console.log("开始拖拽")
								event.dataTransfer.setData("Text",$(this).attr("data-id"));
							}
	});
	drop();
})

