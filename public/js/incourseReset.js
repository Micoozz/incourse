/******* 公用方法 **********/
var ic = {
	//筛选框的"查找"
	"search_exer": function(){
		//保存查找的条件
		var obj_myCollect = {
			"position": [],
			"condition": [],
			"keyword": ""
		};

		$(".position-item").each(function(i,item){
			obj_myCollect.position.push($(item).text());
		});
		$(".condition-item").each(function(i,item){
			obj_myCollect.condition.push($(item).text());
		});
		obj_myCollect.keyword = $(".kw").val();

		return obj_myCollect;
	},
	//页面引导内容
	"guide": function(x1,y1,x2,y2,url,msg){ //x1,y1:整个引导框的left,top偏移量；x2,y2:"我知道"提示框的right,bottom偏移量
		var html = '<div class="p-a guide-active" style="left:' + x1 + 'px; top:' + y1 + 'px;">\
     <img src=' + url + ' alt=""/>\
     <div class="p-a" style="right:' + x2 + 'px; bottom:' + y2 + 'px;">\
     <div class="p-a part">\
     <i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>\
     <p class="f-l msg">' + msg + '</p>\
     <button class="ic-btn p-a">我知道了</button>\
     </div>\
     </div>\
     </div><div class="ic-modal"></div>';
		return html;
	}
};


/*筛选框的"清空"*/
$("body").on("click",".search_clear",function(){
	//默认字段
	var text = [
		["全国","全省","全部学校","全部老师"],
		["全部篇章","全部小节","全部题型"],
		""
	];

	//清空
	$(".position-item").each(function(i,item){
		$(item).text(text[0][i]);
	});
	$(".condition-item").each(function(i,item){
		$(item).text(text[1][i]);
	});
	$(".kw").val(text[2]);
});



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
		$p.children("span").text($(this).text()).attr("data-s",$(this).attr("data"));
		$p.children(".fa").toggleClass("fa-angle-down fa-angle-up");
		$p.next("ul").toggle();
	});
});



$(function() {
	/*关闭页面引导*/
	$("body").on("click",".guide-active .part button",function(){
		$(this).parents(".guide-active").next(".ic-modal").remove();
		$(this).parents(".guide-active").remove();
	});

	/*单选框*/
	$(".radio-box label.p-r input").change(function() {
		$("input[name='" + this.name + "']").prev(".radio").removeClass("active");
		$("input[name='" + this.name + "']:checked").prev(".radio").addClass("active");
	});

	/*日期插件的显示位置*/
	$("body").on("click",".fa-calendar",function(event) {
		$(".lhgcal").css({
			"left": event.clientX - 150,
			"top": event.clientY + 20
		});
	});

	//返回
	$(".ic-return").click(function(){
		window.history.back();
	});
});


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
	})
})



/*编辑器*/
$(function(){
	/*添加附件*/
	$("body").on("change",".ic-editor .addFile",function(){
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
			$(_self).val("");
		}
	});
	/*下标点*/
	$("body").on("click",".ic-editor .dotted",function(){
		var selObj = window.getSelection().toString();  //获取选中的文本
		var html = "";
		for(var i=0; i<selObj.length; i++){
			html += '<span class="totted-active">' + selObj[i] + '</span>';
		}

		document.execCommand("insertHTML","false",html);  //在光标处插入html代码
		$(this).parents(".ic-editor").find(".totted-active").attr("contenteditable", false); //禁止加点的元素编辑
	});

	/*上标点*/
	$("body").on("click",".ic-editor .up-dotted",function(){
		var selObj = window.getSelection().toString();
		var html = "";
		for(var i=0; i<selObj.length; i++){
			html += '<span class="up-totted-active">' + selObj[i] + '</span>';
		}

		document.execCommand("insertHTML","false",html);
		$(this).parents(".ic-editor").find(".up-totted-active").attr("contenteditable", false);
	});

	/*下划线*/
	$("body").on("click",".ic-editor .underline",function(){
		var selObj = window.getSelection().toString();  //获取选中的文本
		document.execCommand("insertHTML","false",'<span class="underline-active">' + selObj + '<span>');  //在光标处插入html代码
		$(this).parents(".ic-editor").find(".underline-active").attr("contenteditable", false); //禁止下划线的元素编辑
	});

	//编辑器里面的图片点击放大效果
	$("body").on("click",".img-canBigger",function(){
		var img = $(this).attr("src");
		$(".big-img-box").show();
		$(".big-img-box>img").attr("src",img);
		alert("111")
	});

	//关闭大图
	$("body").on("click",".big-img-box .fa-times-circle-o",function(){
		$(".big-img-box").hide();
	});
});


/*简单的确认弹出框*/
$(function(){
	$("body").on("click",".ic-sure-modal .btn-white",function(){
		$(".ic-modal,.ic-sure-modal").hide();
	});
	$("body").on("click",".ic-sure-modal .ic-btn",function(){
		$(".ic-modal,.ic-sure-modal").hide();
	});
});



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


