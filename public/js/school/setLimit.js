$(function(){
	//管理员列表点击乡下箭头的效果
	$("body").on("click",".left-list .ic-collapse",function(){
		$(this).next("ul").slideToggle("fast");
		$(this).find("i").toggleClass("fa-angle-down fa-angle-right");
	});
	$("body").on("click",".right-list .ic-collapse",function(){
		if($(this).children(".teamName").attr("contenteditable") === "false"){
			$(this).next("ul").slideToggle("fast");
			$(this).find("i").toggleClass("fa-angle-down fa-angle-right");
		}
	});
	
	//我知道了
	$("#iknow2").click(function(){
		$(".ic-modal,.dragIntroModal,.limit-box .part").fadeOut();
	});
})


/*** 员工分组 *****/
$(function(){
	var status = '';
	var current = ""; //保存是哪个分组
	var num = ""; //显示分组的id
	var html = '<li class="group-parent-li">\
						<img class="f-r collapse-icon" src="../../images/school/more.png" alt="" />\
						<div class="ic-collapse c-d">\
							<span class="icon">\
								<i class="fa fa-angle-right"></i>\
							</span>\
							<span group="create" contenteditable="true" class="teamName drop-box group-parent">未命名</span>\
						</div>\
						<ul class="d-n"></ul>\
					</li>';
	
	//员工管理右键效果
	function showMoreChoose(event,that){
		event.preventDefault();
		// console.log(event.target)
		num = event.target;
		$(".more-choose").css({
			"top": event.clientY + 10 + "px",
			"left": event.clientX + "px"
		}).show();
		current = $(that).parent();
		current.parent().attr("class") === $(".employee-list").attr("class") ? $("#addChild").show() : $("#addChild").hide();
		current.parent().attr("class") === $(".employee-list").attr("class") ? $("#add").show() : $("#add").hide();
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
			$(".employee-list .teamName").each(function(i,item){
				if($(item).attr("contenteditable") === "true"){
					var title = $(".employee-list .teamName[contenteditable='true']").text();
					var id = $(".employee-list .teamName[contenteditable='true']").attr('group');
					var group_id = "";
					
					//console.log(event.target)
					console.log(status);
					if (status == "update") {
						$.ajax({
				            type: "get",
				            url: "/rechristen/" + id + "/" + title,
				            success: function(data) {

				            }
				        });			
					}else{		
						if (status == "create") {
							group_id = 0;
						}else{
							group_id = $(".employee-list .teamName[contenteditable='true']").parents(".group-parent-li").find('.group-parent').attr('group');
							
						}
						console.log(group_id)
						$.ajax({
				            type: "get",
				            url: "/addGroup/" + group_id + "/" + title,
				            success: function(data) {
				            	if (status == "create") {
				            		// console.log(data)
				            		$("span[group='create']").attr('group',data)
				            	}
				            }
				        });
					}	
					$(".employee-list .teamName").attr("contenteditable",false);
				}
			});
		}
	});
	
	//添加组
	$("#add").click(function(){
		current.parent().append(html);
		current.parent().children("li:last-child").children(".ic-collapse").children(".teamName").focus();
		//console.log(current.parent().children("li:last-child").children(".ic-collapse").children(".teamName").attr('gruop'));
		$(".more-choose").hide();
		status = 'create';
		drop();
	});
	
	//重命名组
	$("#rename").click(function(){
		current.children(".ic-collapse").children(".teamName").attr("contenteditable",true).focus();
		$(".more-choose").hide();
		status = 'update';
	});
	
	//删除组
	$("#delete").click(function(){
		$(".ic-modal").fadeIn();
		$(".delete-modal").fadeIn();
		//group_id = current.find("span:first-child").next('span').attr('group');
		//console.log(current.find("span:first-child").next('span').attr('group'))
		$(".more-choose").hide();
	});
	
	//取消
	$(".delete-modal .btn-white").click(function(){
		$(".ic-modal").fadeOut();
		$(".delete-modal").fadeOut();
	});
		
	//确定
	$(".delete-modal .ic-btn").click(function(){
		var lis = current.find("li>span:only-child").parent();
		$(".employee-list>li:first-child>ul").append(lis);
		group_id = current.find("span:first-child").next('span').attr('group');
		//console.log(current.find("span:first-child").next('span').attr('group'))
		$.ajax({
            type: "get",
            url: "/delGroup/" + group_id,
            success: function(data) {

            }
        });
		current.remove();

		$(".delete-modal .btn-white").trigger("click");
	});
	
	//添加子项
	$("#addChild").click(function(){
		current.children("ul").append(html).show();
		current.children("ul").find(".teamName").focus();
		current.children(".ic-collapse").children(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
		$(".more-choose").hide();
		status = 'addChild';
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
			console.log(data);
			$(this).parent().next("ul").prepend($("[data-id='" + data + "']"));
			if (typeof($(this).attr("ref")) != "undefined") {
				var role = $(this).attr("ref");
				console.log(role)
				$.ajax({
		            type: "get",
		            url: "/manageRole/" + role + "/" + data,
		            success: function(data) {
		            }
		        });	
			}
			if(typeof($(this).attr("group")) != "undefined") {
				var group = $(this).attr("group");

				$.ajax({
		            type: "get",
		            url: "/manageGroup/" + group + "/" + data,
		            success: function(data) {
		            }
		        });	
			}
			console.log(group)
		}
	});
}
$(function (){
	var canDrag = $.makeArray($(".limit-box .canDrag"));
	
	canDrag.forEach(function(item){
		item.ondragstart = function(event){
			console.log("开始拖拽");
			console.log(event.target)
			event.dataTransfer.setData("Text",$(this).attr("data-id"));
			}
	});
	drop();
})

