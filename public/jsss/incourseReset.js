/******* 公用方法 **********/
var ic = {
	change: function() {
		console.log(111)
	}
}


/*三级联动*/
$(function(){
	$("body").on("click",".select-form .ic-text",function() {
		var is_collapse = $(this).children(".fa").hasClass("fa-angle-down");
		$(".select-action-box .select-form .ic-text .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
		$(".select-action-box .select-form .lists").hide();

		if(is_collapse){
			$(this).children(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");
			$(this).next("ul").show();
		}else {
			$(this).children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
			$(this).next("ul").hide();
		}
	});

	$("body").on("click",".select-form .lists>li",function() {
		var $p = $(this).parent().prev();
		$p.children("span").text($(this).text());
		$p.children(".fa").toggleClass("fa-angle-down fa-angle-up");
		$p.next("ul").toggle();
	});
})

$(function() {
	/*页面引导*/
	$("body").on("click",".guide-active .part button",function(){
		$(this).parents(".guide-active").hide();
		$(".ic-modal").hide();
	});

	/*单选框*/
	$(".radio-box label.p-r input").change(function() {
		$("input[name='" + this.name + "']").prev(".radio").removeClass("active");
		$("input[name='" + this.name + "']:checked").prev(".radio").addClass("active");
	});

	/*日期插件的显示位置*/
	$(".fa-calendar").click(function(event) {
		$(".lhgcal").css({
			"left": event.clientX - 150,
			"top": event.clientY + 20
		});
	});

	//返回
	$(".ic-return").click(function(){
		window.history.back();
	});
})


/*************通用的"添加附件",在下方显示多张图片**************/
$(function(){
	$(".exercise-box").on("change",".addFileCommon",function(){
		var input = $(this)[0];
		var files = input.files || [];
		if(files.length === 0) {
			return;
		}
		if(!input["value"].match(/\.jpg|\.png|\.bmp/i)) {
			return alert("上传的图片格式不正确，请重新选择");
		}
		var file = files[0];
		var reader = new FileReader();
		reader.readAsDataURL(file);
		var _self = this;
		reader.onload = function(e) {
			var img = '<div class="p-r f-l one-img">\
							<img class="img-canBigger" src="' + this.result + '"/>\
							<i class="common-icon p-a delete d-n"></i>\
						</div>';
			$(_self).parents(".addFileBox").children(".imgs").append(img).addClass("border");
		}
	});

	/*上传的图片鼠标移上去显示X*/
	$(".exercise-box").on("mouseover",".imgs .one-img",function(){
		$(this).children(".delete").removeClass("d-n");
	});
	$(".exercise-box").on("mouseleave",".imgs .one-img",function(){
		$(this).children(".delete").addClass("d-n");
	});

	/*点击X删除照片*/
	$(".exercise-box").on("click",".imgs .delete",function(){
		if($(this).parents(".imgs").children(".one-img").length === 1 ) {
			$(this).parents(".imgs").removeClass("border");
		}
		$(this).parent().remove();
	});
})


/*编辑器*/
$(function(){
	/*添加附件*/
	$(".exercise-box").on("change",".ic-editor .addFile",function(){
		var input = $(this)[0];
		var files = input.files || [];
		if(files.length === 0) {
			return;
		}
		if(!input["value"].match(/\.jpg|\.png|\.bmp/i)) {
			return alert("上传的图片格式不正确，请重新选择");
		}
		var file = files[0];
		var reader = new FileReader();
		reader.readAsDataURL(file);
		var _self = this;
		reader.onload = function(e) {
			var img = '<img class="img-canBigger" src="' + this.result + '"/>';
			$(_self).parents(".ic-editor").children(".editor-content").append(img);
		}
	});

	/*下标点*/
	$(".exercise-box").on("click",".ic-editor .dotted",function(){
		var selObj = window.getSelection().toString();  //获取选中的文本
		var html = "";
		for(var i=0; i<selObj.length; i++){
			html += '<span class="totted-active">' + selObj[i] + '</span>';
		}

		document.execCommand("insertHTML","false",html);  //在光标处插入html代码
		$(this).parents(".ic-editor").find(".totted-active").attr("contenteditable", false); //禁止加点的元素编辑
	});

	/*上标点*/
	$(".exercise-box").on("click",".ic-editor .up-dotted",function(){
		var selObj = window.getSelection().toString();
		var html = "";
		for(var i=0; i<selObj.length; i++){
			html += '<span class="up-totted-active">' + selObj[i] + '</span>';
		}

		document.execCommand("insertHTML","false",html);
		$(this).parents(".ic-editor").find(".up-totted-active").attr("contenteditable", false);
	});

	/*下划线*/
	$(".exercise-box").on("click",".ic-editor .underline",function(){
		var selObj = window.getSelection().toString();  //获取选中的文本
		document.execCommand("insertHTML","false",'<span class="underline-active">' + selObj + '<span>');  //在光标处插入html代码
		$(this).parents(".ic-editor").find(".underline-active").attr("contenteditable", false); //禁止下划线的元素编辑
	});

	//编辑器里面的图片点击放大效果
	$("body").on("click",".img-canBigger",function(){
		var img = $(this).attr("src");
		$(".big-img-box").show();
		$(".big-img-box>img").attr("src",img);
	});
	//关闭大图
	$(".big-img-box .fa-times-circle-o").click(function(){
		$(".big-img-box").hide();
	});
})


/*简单的确认弹出框*/
$(function(){
	$("body").on("click",".ic-sure-modal .btn-white",function(){
		$(".ic-modal,.ic-sure-modal").hide();
	});
	$("body").on("click",".ic-sure-modal .ic-btn",function(){
		$(".ic-modal,.ic-sure-modal").hide();
	});
})



/*确认弹出框*/
$(function(){
	//取消
	$(".delete-modal .btn-white").click(function(){
		$(".ic-modal,.delete-modal").hide();
	});

	//确定
	$(".delete-modal .ic-btn").click(function(){
		$(".delete-modal .btn-white").trigger("click");
	});
})


















