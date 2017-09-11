/*$(function(){
	$("#left").load("template/left_navbar.html");
})
*/
/********* changePwd.html ********/
$(function(){
	//加载流程步骤
/*	$(".step-change-box").load("../template/stepChange.html");*/
	
	var msg = ["密码长度不符合规定","不能是9位以下的纯数字","密码由6-16个字母、数字组成，区分大小写（不能是9位以下的纯数字）","密码只能由字母、数字组成，区分大小写","前后密码不一致","请输入一致的密码","用户名格式为4-15位英文、数字的组合，区分大小写","用户名已被占用"];
	//还得判断用户名是否
	var isRightAccount = false; //判断新用户名是否符合要求
	$("#account-input").blur(function(){
		var account = $(this).val();
		var reg = /^(?![0-9]+$)(?![a-zA-Z]+$)[a-zA-Z0-9]{4,15}$/; //账号格式为4-15位英文、数字的组合，区分大小写
		if(reg.test(account)){
			var _self = this;
			$.get("/auditPwd/"+account,function(data){
				//data为0存在，为1不存在
				if(data === "1"){
					isRightAccount = true;
					$(_self).next(".isRight").removeClass("wrong").addClass("right");
					$(".account-tip").removeClass("red").text(msg[6]);
				}else {
					isRightAccount = false;
					$(_self).next(".isRight").removeClass("right").addClass("wrong");
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
	$("#newPwd").keyup(function() {
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
		}else if(/^[0-9a-zA-Z]{6,16}$/.test(newPwd)) {
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
	
	
	//表单提交
	function getCookie(cname)
	{
	  var name = cname + "=";
	  var ca = document.cookie.split(';');
	  for(var i=0; i<ca.length; i++) 
	  {
	    var c = ca[i].trim();
	    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	  }
	  return "";
	}
	$("#submit").click(function(event) {
		event.preventDefault();
		var isRight = true; //判断除新密码外的整个表单的内容是否符合要求
		var obj = {}; //保存表单信息
		var form = $("#myForm")[0];
		obj.username = $(form.username).val();
		obj.pwd = $(form.pwd).val();
		obj.newPwd = $(form.newPwd).val();
		obj.againPwd = $(form.againPwd).val();
		obj.code = $(form.code).val();
		
		//确认密码是否一致
		if(obj.newPwd !== obj.againPwd) {
			isRight = false;
			$(".againPwd-tip").text(msg[4]).addClass("red");
			$(form.againPwd).next(".isRight").removeClass("right d-n").addClass("wrong");
		}else {
			$(".againPwd-tip").text(msg[5]).removeClass("red");
			$(form.againPwd).next(".isRight").removeClass("wrong d-n").addClass("right");
		}
		
		//确认当前密码和验证码是否正确
		// 所有选项都正确了再发送表单信息给后台
		if(isRight && isRightPwd && isRightAccount) {
			if(obj.code != getCookie('milkcaptcha')){
				alert('前台验证码 验证');
				return;
			}
			$.post('/fileManager/uptatePwd',{'_token':token,'data':obj},function(data){
			 	var data = JSON.parse(data);
					if(data == false) {
						$("input[name='pwd']").addClass('warning');
						$("input[name='pwd']").val('');
						$("input[name='pwd']").attr('placeholder','原密码错误');
					}else if(data == '201') {
						alert('后台验证码验证');
					}else{
						window.location.href="/fileManager/student-file/manager-name";
				}
			});
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
				console.log(item)
				switch(i) {
					case 0: info.province = $(this).text(); break;
					case 1: info.city = $(this).attr('ref'); break;
					case 2: info.school = $(this).text(); break;
					default: break;
				}
			});
			$.post('/emailcode',{'_token':token,'data':info.code},function(data){
				if (data == 200) {
					$.post('/email',{'_token':token,'data':info},function(data){
					 	email = $("#email").val();
						$(".addInfo .myForm").hide();
						$(".bind-email-box").show();
						$(".bind-email-box .email").text(email);
					});
				}else if(data == 201){
					alert('验证码错误');
				}
			})
		}
		//重新发送邮件
		$("#resend").click(function(event){
			$.post('/email',{'_token':token,'data':info},function(data){
			 	email = $("#email").val();
				$(".addInfo .myForm").hide();
				$(".bind-email-box").show();
				$(".bind-email-box .email").text(email);
			});
		});
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



