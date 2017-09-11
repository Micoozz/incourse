/********** addAdmin.html *********/
$(function(){
	//规定身份证号只能是数字,旧的15位，新的18位
	$("#idCode").keyup(function(event){
		var code = event.keyCode;
		if(!((code>=96&&code<=105) || (code>=48&&code<=57) || code===88)){
			var text = $(this).val().match(/[\dX]/g);
			if(!text){
				$(this).val("");
			}else {
				$(this).val(text.join(""));
			}
			//$(this).val($(this).val().substring(0,$(this).val().length-1));
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
		console.log(file)
		if(file.size/1024 >= 100){
			return alert("上传的图片大小要小于100kb，请重新选择");
		}
		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e) {
			headResult.value = this.result;
			var img = "<img class='upload-img' src='" + this.result + "'/>";
			$(".info-form .photo-in").html(img);
		}
	});
	
	//提交
	$("#addAdminBtn").click(function(event) {
		event.preventDefault();
		$("#warning-info").attr("style","display:none");
/*		var account = $(".account-input").val();
		console.log(account)
		var reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[a-zA-Z0-9]{4,15}$/; //账号格式为4-15位英文、数字的组合，区分大小写
		if(reg.test(account)){*/
   			$(".account-input").removeClass("input-error");
   			var province = $('.select-form .city span').attr('ref');
			var paramArr = $(".info-form").serializeArray(); //照片的信息得另外获取
			paramArr.push({'name':'bigHead','value':$(".upload-img").attr("src")});
			paramArr.push({'name':'city','value':province});
			paramArr.push({'name':'_token','value':token});
			console.log(paramArr)
			 $.post("/addAdmin",paramArr,function(result){
		 		if (result == 200) {
		 			window.location.href = "/adminArchives/manager-archives/manager-list";
			 	}else{
			 		$("#warning-info").text(result);
			 		$("#warning-info").attr("style","display:block");
			 	}
			});
/*}else {
   $(".account-input").addClass("input-error");
}*/
	});

	$("#addStudentBtn").click(function(event) {
		event.preventDefault();
		var province = $('.select-form .city span').attr('ref');
		var paramArr = $(".info-form").serializeArray(); //照片的信息得另外获取
		paramArr.push({'name':'bigHead','value':$(".upload-img").attr("src")});
		paramArr.push({'name':'city','value':province});
		paramArr.push({'name':'_token','value':token});
		console.log(paramArr)
		 $.post("/addStudent",paramArr,function(result){
	 		var status = JSON.parse(result).status;
	 		var classes = JSON.parse(result).classes;
 			if (status == 200) {
 				window.location.href='/fileManager/student-file/student-list/' + classes;
 			}else{
 				if (status == 201) {
	 				window.location.href='/fileManager/student-file/student-add/' + classes;
 				}else{
 					var student = JSON.parse(result).student_id;
 					window.location.href='/fileManager/student-file/student-add/' + classes + '/' + student;
 				}
 			}
		});
	});
	//添加老师的信息
	$("#addTeacherBtn").click(function(event){
		$('.branch').val($('.branch').attr('nums'));
		$('.branch3').val($('.branch3').attr('nums'));
		$('.branch2').val($('.branch2').attr('nums'));
		event.preventDefault();
		var province = $('.select-form .city span').attr('ref');
		var paramArr = $(".info-form").serializeArray(); //照片的信息得另外获取
		paramArr.push({'name':'bigHead','value':$(".upload-img").attr("src")});
		paramArr.push({'name':'city','value':province});
		paramArr.push({'name':'_token','value':token});
		$.post("/addTeacher",paramArr,function(result){
			
		});
	});

});


/********** manageAdmin.html ***********/
$(function(){
	//"新建员工"页面引导
	if(count == 0){
		$(".right-tag").append('<div class="p-a guide-active" style="top:-13px; left:-3px;">\
		<img src="/images/addEmployee.jpg" alt=""/>\
		<div class="p-a">\
		<div class="p-a part" style="left:52px;text-align:left;">\
		<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>\
		<p class="f-l msg">快去新建员工吧~</p>\
		<button class="ic-btn p-a">我知道了</button>\
		</div>\
		</div>\
		</div>\
		<div class="ic-modal"></div>');
	}


	//"新建员工"页面跳转
	$(".create-employee").click(function(){
		window.location.href = "/adminArchives/manager-archives/add-employee";
	});
	//删除员工
	$("body").on("click",".admin-list .fa-trash",function(){
		$(".ic-modal,.ic-sure-modal").show();
		$(".ic-modal,.ic-sure-modal .ic-btn").attr("onclick","delEmployee("+$(this).attr("data")+")")
		var _self = this;
		$("body").on("click",".ic-sure-modal .ic-btn",function(){
			$(_self).parents("tr").remove();
		});
	});

	//重置密码
	/*$("body").on("click","#reset",function(){
		alert("重置密码成功！");
	});*/
})
