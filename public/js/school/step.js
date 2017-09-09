$(function(){
	$.ajax({
		type: "GET",
		url: "template/left_navbar.html",
		async: false,
		success: function(data){
			$("#left").html(data);
		}
	});
})

/********* changePwd.html ********/
$(function(){
	//加载流程步骤
	$(".step-change-box").load("../template/stepChange.html");
	
	var msg = ["密码长度不符合规定","不能是9位以下的纯数字","密码由6-16个字母、数字组成，区分大小写（不能是9位以下的纯数字）","密码只能由字母、数字组成，区分大小写","前后密码不一致","请输入一致的密码","用户名格式为4-15位英文、数字的组合，区分大小写","用户名已被占用"];
	var isRight = true; //判断除新密码外的整个表单的内容是否符合要求

	//还得判断用户名是否
	var isRightAccount = false; //判断新用户名是否符合要求
	$("#account-input").blur(function(){
		var account = $(this).val();
		var reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[a-zA-Z0-9]{4,15}$/; //账号格式为4-15位英文、数字的组合，区分大小写
		if(reg.test(account)){
			$.get("",{"account":account},function(data){
				//data为0存在，为1不存在
				if(data === "1"){
					isRightAccount = true;
					$(this).next(".isRight").removeClass("wrong").addClass("right");
					$(".account-tip").removeClass("red").text(msg[6]);
				}else {
					isRightAccount = false;
					$(this).next(".isRight").removeClass("right").addClass("wrong");
					$(".account-tip").addClass("red").text(msg[7]);
				}
			});
		}else {
			isRightAccount = false;
			$(this).next(".isRight").removeClass("right").addClass("wrong");
			$(".account-tip").removeClass("red").text(msg[6]);
		}
	});

	var isRightPwd = false; //判断新密码是否符合要求
	//新密码判断
	$("#newPwd").keyup(function(){
		var newPwd = $(this).val().trim();
		var len = newPwd.length;
		if(len<6 || len>16) {
			$(".newPwd-tip").addClass("red").text(msg[0]);
			$(this).next(".isRight").removeClass("right").addClass("wrong");
			$(".pw-strong").removeClass("low middle high");
			isRightPwd = false;
		}else if(/^\d{6,8}$/.test(newPwd)) {
			$(".newPwd-tip").text(msg[1]).addClass("red");
			$(this).next(".isRight").removeClass("right").addClass("wrong");
			$(".pw-strong").removeClass("low middle high");
			isRightPwd = false;
		}else if(/^[0-9a-zA-Z]{6,16}$/.test(newPwd)){
			$(".newPwd-tip").text(msg[2]).removeClass("red");
			$(this).next(".isRight").removeClass("wrong").addClass("right");
			var n = 0; //判断密码强度等级,1-low,2-middle,3-high
			/[\d]/g.test(newPwd) ? n++ : n;
			/[a-z]/g.test(newPwd) ? n++ : n;
			/[A-Z]/g.test(newPwd) ? n++ : n;
			switch(n) {
				case 1: $(".pw-strong").removeClass("middle high").addClass("low"); break;
				case 2: $(".pw-strong").removeClass("low high").addClass("middle"); break;
				case 3: $(".pw-strong").removeClass("low middle").addClass("high"); break;
				default: $(".pw-strong").removeClass("low middle high");
			}
			isRightPwd = true;
		}else {
			$(".newPwd-tip").text(msg[3]).addClass("red");
			$(this).next(".isRight").removeClass("right").addClass("wrong");
			$(".pw-strong").removeClass("low middle high");
			isRightPwd = false;
		}
	});

	//确认密码是否一致
	$("#againPwd").keyup(function(){
		if($(this).val() !== $("#newPwd").val()) {
			$(".againPwd-tip").text(msg[4]).addClass("red");
			$(this).next(".isRight").removeClass("right d-n").addClass("wrong");
			isRight = false;
		}else {
			$(".againPwd-tip").text(msg[5]).removeClass("red");
			$(this).next(".isRight").removeClass("wrong d-n").addClass("right");
		}
	});
	
	//看不清，换一张
	$(".another-code").click(function(){
//		$.get("").success(function(){});
	})
	
	//表单提交
	$("#submit").click(function(event){
		event.preventDefault();
		var obj = {}; //保存表单信息
		var form = $("#myForm")[0];
		obj.pwd = $(form.pwd).val();
		obj.newPwd = $(form.newPwd).val();
		obj.againPwd = $(form.againPwd).val();
		obj.code = $(form.code).val();
		console.log(obj)
		
		//确认当前密码和验证码是否正确
		
		//所有选项都正确了再发送表单信息给后台
		if(isRight && isRightPwd && isRightAccount) {
			$.post("").success(function(){});
		}
	});
})



/**************** addInfo.html *********/
$(function(){
	//邮箱验证
	$("#email").keyup(function(){
		var reg = /^\w+@\w+.com(.cn)?$/;
		if(reg.test($(this).val())){
			$(".email-tip").hide();
			$(this).next(".isRight").removeClass("wrong").addClass("right");
		}else {
			$(".email-tip").show();
			$(this).next(".isRight").removeClass("right").addClass("wrong");
		}
	});

	var email = "";
	//绑定邮箱
	$("#bind-email-btn").click(function(event){
		event.preventDefault();
		if($("#email").next(".isRight").hasClass("right")){
			//保存表单信息
			var info = {
				"email": $("#email").val(),
				"code": $(".addInfo .code").val(),
				"schoolName": $(".schoolName-input").val()
			};
			$(".addInfo .select-form .ic-text span").each(function(i,item){
				switch(i) {
					case 0: info.province = $(this).text(); break;
					case 1: info.city = $(this).text(); break;
					case 2: info.school = $(this).text(); break;
					default: break;
				}
			});
			console.log(info)

			email = $("#email").val();
			$(".addInfo .myForm").hide();
			$(".bind-email-box").show();
			$(".bind-email-box .email").text(email);
		}
	});

	//立刻查看邮件
	var email_hash = {
		'qq.com': 'http://mail.qq.com',
		'gmail.com': 'http://mail.google.com',
		'sina.com': 'http://mail.sina.com.cn',
		'163.com': 'http://mail.163.com',
		'126.com': 'http://mail.126.com',
		'yeah.net': 'http://www.yeah.net/',
		'sohu.com': 'http://mail.sohu.com/',
		'tom.com': 'http://mail.tom.com/',
		'sogou.com': 'http://mail.sogou.com/',
		'139.com': 'http://mail.10086.cn/',
		'hotmail.com': 'http://www.hotmail.com',
		'live.com': 'http://login.live.com/',
		'live.cn': 'http://login.live.cn/',
		'live.com.cn': 'http://login.live.com.cn',
		'189.com': 'http://webmail16.189.cn/webmail/',
		'yahoo.com.cn': 'http://mail.cn.yahoo.com/',
		'yahoo.cn': 'http://mail.cn.yahoo.com/',
		'eyou.com': 'http://www.eyou.com/',
		'21cn.com': 'http://mail.21cn.com/',
		'188.com': 'http://www.188.com/',
		'foxmail.com': 'http://www.foxmail.com',
		'outlook.com': 'http://www.outlook.com'
	};
	$(".check-email").click(function(){
		var index = email.lastIndexOf("@");
		var postfix = email.slice(index+1);
		console.log(postfix)
		for(var key in email_hash){
			if(postfix === key){
				window.open(email_hash[key]);
			}
		}
	});

	//重新填写
	$("#rewrite").click(function(){
		$(".bind-email-box").hide();
		$(".addInfo .myForm").show();
	});
})




/*********************** addInfoSuccess.html **********************/
$(function(){
	//加载流程步骤
	$(".step-change-box").load("../template/stepChange.html");

	//加载"管理员档案"引导
	$(".addInfoSuccess #left").append('<div class="p-a guide-active" style="top:0; left:15px;">\
				<img src="../../images/manageDA.png" alt=""/>\
				<div class="p-a">\
				<div class="p-a part" style="left:130px;">\
				<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>\
				<p class="f-l msg">快去管理员档案进添加员工吧～～</p>\
				<button class="ic-btn p-a">我知道了</button>\
				</div>\
				</div>\
				</div><div class="ic-modal"></div>');

	//"管理员档案"引导的"我知道了"
	$("body").on("click","#left .guide-active .part button",function(){
		$("#nav1>li:first-child>a").css({color: "#333"}).attr("href","manageAdmin.html");
	});

	//“点击此处”跳转
	$(".waitMsg").on("click","a.ic-blue",function(){
		$(".waitBox .waitMsg").html('已成功，如有问题，请联系审核人员或在线客服。');
		$("#left").append('<div class="p-a guide-active" style="top:0; left:15px;">\
				<img src="../../images/manageDA.png" alt=""/>\
				<div class="p-a">\
				<div class="p-a part" style="left:130px;">\
				<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>\
				<p class="f-l msg">快去管理员档案进添加员工吧～～</p>\
				<button class="ic-btn p-a">我知道了</button>\
				</div>\
				</div>\
				</div><div class="ic-modal"></div>');
	});
})






