$(function(){
	$("#left").load("template/left_navbar.html");
})

/********* changePwd.html ********/
$(function(){
	//加载流程步骤
	$(".step-change-box").load("../template/stepChange.html");
	
	var msg = ["密码长度不符合规定","不能是9位以下的纯数字","密码由6-16个字母、数字组成，区分大小写（不能是9位以下的纯数字）","密码只能由字母、数字组成，区分大小写","前后密码不一致","请输入一致的密码"];
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
	
	//看不清，换一张
	$(".another-code").click(function(){
//		$.get("").success(function(){});
	})
	
	//表单提交
	$("#submit").click(function(event){
		event.preventDefault();
		var isRight = true; //判断除新密码外的整个表单的内容是否符合要求
		var obj = {}; //保存表单信息
		var form = $("#myForm")[0];
		obj.pwd = $(form.pwd).val();
		obj.newPwd = $(form.newPwd).val();
		obj.againPwd = $(form.againPwd).val();
		obj.code = $(form.code).val();
		console.log(obj)
		
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
		
		//所有选项都正确了再发送表单信息给后台
		if(isRight && isRightPwd) {
			$.post("").success(function(){});
		}
	});
})



/**************** addInfo.html *********/
$(function(){
	//加载流程步骤
	$(".step-change-box").load("../template/stepChange.html");
	
	$("#addInfoBtn").click(function(){
		var info = {}; //保存选择的省、市、学校
		$(".select-form .ic-text span").each(function(i,item){
			switch(i) {
				case 0: info.province = $(this).text(); break;
				case 1: info.city = $(this).text(); break;
				case 2: info.school = $(this).text(); break;
				default: break;
			}
		});
		console.log(info)
		
		$(".select-school-box").hide();
		$(".waitBox").show();
		
//		$.post("",info).success(function(){});
		//在 ajax 成功的时候执行下列操作
		setTimeout(function(){
			$(".waitBox .waitMsg").html('已更改成功，1秒后自动跳转，若网页跳转过慢，请<a class="ic-blue" href="#">点击此处</a>');
			$(".step-change li:last-child .line").css("borderColor","#168bee");
			$(".step-change li:nth-child(2) span").css("color","rgba(0,0,0,0.43)");
			$(".step-change .fa-check-circle-o").addClass("ic-blue");
			$(".step-change li:last-child span").css("color","#333");
			setTimeout(function(){
				$(".waitBox .waitMsg").html('已成功，如有问题，请联系审核人员或在线客服。');
				$(".ic-modal, .part1").show();
				$(".nav1 li:first-child").addClass("highlight1");
			},1000);
		},1000);
	});
	
	//“点击此处”跳转
	$(".waitMsg").on("click","a.ic-blue",function(){
			$(".waitBox .waitMsg").html('已成功，如有问题，请联系审核人员或在线客服。');
			$(".ic-modal, .part1").show();
			$(".nav1 li:first-child").addClass("highlight1");
	});
	
	//高亮1，“我知道了”点击效果
	$("#iknow1").click(function(){
		$(".nav1 li:first-child").removeClass("highlight1");
		$(".nav1").addClass("origin");
		$(".nav1 li:first-child a").addClass("box");
		$(".center1>div:last-child").addClass("highlight2");
		$(".part1, .step-change-box").hide();
		$(".part2, .center1").show();
		$(".waitMsg").html("已成功，如有问题，请联系审核人员或在线客服。");
	});
	
	//我知道了
	$("#iknow3").click(function(){
		window.location.href = "addAdmin.html";
	})
})
