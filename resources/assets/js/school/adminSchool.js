$(function(){
	$.ajax({
		type: "GET",
		url: 'template/left_navbar.html',
		async: false,
		success: function(data) {
			$("#left").html(data);
		}
	});
	$(".nav1 li:first-child a").addClass("box");
})


/********** addAdmin.html *********/
$(function(){
	//规定身份证号只能是数字,旧的15位，新的18位
	$("#idCode").keyup(function(event){
		var code = event.keyCode;
		if(!((code>=96&&code<=105) || code===88)){
			var text = $(this).val().match(/[\dX]/g);
			$(this).val(text.join(""));
		}
	});
	
	//上传头像
	var headResult = {"name":"bigHead", "value":""}; //保存base64格式的头像
	$("#uploadHead").change(function(){
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
		console.log(reader)
		reader.readAsDataURL(file);
		reader.onload = function(e) {
			headResult.value = this.result;
			var img = "<img class='upload-img' src='" + this.result + "'/>";
			$(".info-form .photo-in").html(img);
		}
	});
	
	//提交
	$("#addAdminBtn").click(function(event){
		event.preventDefault();
		var paramArr = $(".info-form").serializeArray(); //照片的信息得另外获取
		paramArr.push(headResult);
		console.log(paramArr)
		$.post("",paramArr).success();
	});
})


/********** manageAdmin.html ***********/
$(function(){
	//查看
	$(".admin-list").on("click",".fa-eye",function(){
		if(!$(this).hasClass("gray")){
			$.ajax({
			type: "GET",
			url: "template/seeInfo.html",
			async: false,
			success: function(data){
				$(".addAdminTag").hide();
				$(".school-container").html(data);
			}
		});
		}
	});
	
	//禁用
	$(".admin-list").on("click",".center",function(){
		$(this).parent().parent().toggleClass("gray");
		$(this).prev().toggleClass("gray");
		$(this).toggleClass("fa-ban fa-times-circle-o");
		$(this).prev(".fa-eye").off("click");
	})
})


