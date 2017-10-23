$(function() {
	var ENnum = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N'];
	$(".checked_work").each(function(i){
		for(var j = 0;j<$(this).find(".checked_work_input").length;j++){
			$(this).find(".checked_work_input").eq(j).val(ENnum[j]);
			$(this).find(".answer_sign").eq(j).text(ENnum[j]+'：');
		}
	})
	$(".checked_work_answer").each(function(i){
		for(var j = 0;j<$(this).find(".black_answer").length;j++){
			var t = $(this).find(".black_answer").eq(j).text();
			$(this).find(".black_answer").eq(j).text(ENnum[(t-1)]);
		}
	})
	$(".black_question").each(function(){
		var html = $(this).attr("data-black");
		$(this).html(html);
		var h = JSON.parse($(this).attr("data-student-answer"));
		for(var i = 0;i < h.length;i++){
			$(this).find(".blank-item").eq(i).text(h[i]);
		}
	})
	$(".postil>div:last-child>div").css({height:($(".postil > div:first-child").height()-88)})
	//主观题、客观题和同类型习题切换
	$('body').on('click', '.page_Mark', function() {
		$('.page_Mark').removeClass('active')
		$(this).addClass('active');
		var page = $(this).attr("data-page");
		$('#col').css({'position': 'relative','left': '0px'});
		if(page == "1"){
			$(".person-correct-did,.lookSameExer,.left").css("display","block");
			$('.person-correct-will,.postil,.person-correct-same').css("display","none");
		}else if(page == "2"){
			$(".person-correct-did,.left,.lookSameExer,.person-correct-same").css("display","none");
			$('.person-correct-will,.postil').css("display","block");
			$('.postil').height($('#centery').height() - 78)
			$('.postil>div:last-child').height($('.postil').height() - 87);
			$('#col').css({'position': 'relative','left': '90px'});
		}else if(page == "3"){
			$(".person-correct-same,.left,.lookSameExer").css("display","block");
			$('.person-correct-will,.postil,.person-correct-did').css("display","none");
		}
	});

	//老师批语

	var num = 0; //第几个
	$('.amend').each(function(i) {
		$(this).attr('num', i + 1)
		$('.postil>div:last-child>div').append('<div></div>')
	});
	$('body').on('mousedown', '.amend', function() {
		nums = $(this).attr('num');
	})

	$('body').on('click', '.implement>img', function() {
		num++
		$('.amend').attr('contenteditable', 'true');
		var selObj = window.getSelection().toString();
		if(selObj == '') {
			$('.amend').attr('contenteditable', 'false');
			return;
		}
		document.execCommand("insertHTML", "false", '<b class="pitchOn sort' + num + '">' + selObj + '<sup>' + num + '</sup><b class="scores"></b>');
		$('.amend').attr('contenteditable', 'false');

		$('.pitchOn').find('sup').each(function(i) {
			$(this).text(i + 1);
		});
		$('.amend').each(function(i) {
			$(this).attr('nums', $(this).find('b').length / 2)
		});
		var center = '<div style="color:#333;margin-bottom:20px">\
						<b>' + num + '：</b>\
						<div class="UploadPictures">\
							<button><span class="btnFile"><i class="fa fa-chain"></i>&nbsp;添加附件</span><input type="file" /></button>\
							<i class="fa fa-times close remove" num="' + num + '"></i>\
						</div>\
						<div class="textareaS"><div contenteditable="true"></div></div></div>'
		if(parseInt($('.amend:nth-of-type(' + nums + ')').attr('nums')) > 1) {
			//判断长度是否等于0
			var zeo;
			if($('.sort' + num + '').prevAll().length == 0) {
				zeo = 1
			} else {
				zeo = $('.sort' + num + '').prevAll().length
			}
			if(num > parseInt($('.sort' + num + '').prev().find('sup').text())) {
				$('.postil>div:last-child>div>div:nth-of-type(' + nums + ')>div:nth-of-type(' + zeo + ')').after(center)
			} else {
				$('.postil>div:last-child>div>div:nth-of-type(' + nums + ')>div:nth-of-type(' + zeo + ')').before(center)
			}
		} else {
			$('.postil>div:last-child>div>div:nth-of-type(' + nums + ')').append(center)
		}
		$('.postil>div:last-child>div>div>div>b').each(function(i) {
			$(this).text(i + 1 + '：');
		})

		$('.postil>div:last-child>div').css('overflow-y', 'auto')
	});

	//删除批语
	var canvass = true;
	var arry=[]
	$('body').on('click', '.remove', function() {

		//删除画布批注
		if(document.getElementById('mycanvas')!=null){
			var canvas = document.getElementById('mycanvas');
			var ctx = canvas.getContext('2d');

			ctx.clearRect($(this).attr('movex')-5,$(this).attr('movey')-15,$(this).attr('linex')+5,20);

		}
		$('.questions .sort' + $(this).attr('num') + '').find('sup').remove();
		$('.questions .sort' + $(this).attr('num') + '').before('<span>' + $('.questions .sort' + $(this).attr('num') + '').text() + '</span>');
		$('.questions .sort' + $(this).attr('num') + '').remove();
		var objet={
			movex:$(this).attr('movex'),
			movey:$(this).attr('movey')-2,
			linex:$(this).attr('linex')
		}
		arry.push(objet)
		$(this).parent().parent().remove();
		if(canvass) {
			$('.postil>div:last-child>div>div>div>b').each(function(i) {
				$(this).text(i + 1 + '：');
			});
			$('.pitchOn').find('sup').each(function(i) {
				$(this).text(i + 1);
			});
		}
	});
	//老师批语上传的图片
	$('body').on('change', '.UploadPictures input', function() {
		var th = $(this).parent().nextAll('.textareaS')
		console.log(th)
		input = $(this)[0];
		if(!input['value'].match(/.jpg|.gif|.png|.bmp/i)) { //判断上传文件格式
			return alert("上传的图片格式不正确，请重新选择");
		}
		var reader = new FileReader();
		reader.readAsDataURL(this.files[0]);
		reader.onload = function(e) {
			th.append('<img src="' + this.result + '" />')
		};
	});

	//canvas批改
	if(document.getElementById('mycanvas')!=null){
		var canvas = document.getElementById('mycanvas');
		var ctx = canvas.getContext('2d');
		var obj = {
			x: 0, //X坐标
			y: 0, //Y坐标
			move: 0, //跟随鼠标坐标判断
			numbers: 0, //第几个批注
			remove: 0, //判断是否清除
			line:0//最后坐标
		};

		canvas.onmousedown = function(event) {
			if(obj.remove == 0) {
				ctx.beginPath();
				ctx.moveTo(event.pageX - $('#mycanvas').offset().left, event.pageY - $('#mycanvas').offset().top);
				obj.move = 1;
				obj.y = event.pageY - $('#mycanvas').offset().top;
				obj.x = event.pageX - $('#mycanvas').offset().left;
			}
		}
		canvas.onmousemove = function(event) {
			if(obj.move == 1 && obj.line != obj.x) {
				ctx.lineTo(event.pageX - $('#mycanvas').offset().left, obj.y);
				ctx.strokeStyle = "red"; //线条的颜色
				ctx.stroke();
				ctx.closePath();
			}
		};
		canvas.onmouseup = function(event) {
			if(obj.remove == 0) {
				obj.line=event.pageX-$('#mycanvas').offset().left;
				if(event.pageX-$('#mycanvas').offset().left != obj.x) {
					obj.numbers++;
					var lineX=event.pageX - $('#mycanvas').offset().left;
					var center = '<div style="color:#333;margin-bottom:20px">\
							<b>' + obj.numbers + '：</b>\
							<div class="UploadPictures">\
								<button><span class="btnFile"><i class="fa fa-chain"></i>&nbsp;添加附件</span><input type="file" /></button><i class="fa fa-times close" num="' + num + '"  moveX="'+obj.x+'" moveY="'+obj.y+'" lineX="'+lineX+'" ></i>\
							</div>\
							<div contenteditable="true" class="textareaS"><div></div></div></div>'
					ctx.lineTo(event.pageX - $('#mycanvas').offset().left, obj.y);
					ctx.strokeStyle = "red";
					ctx.stroke();
					ctx.closePath();
					ctx.fillStyle = 'red';
					ctx.font = "12px bold";
					ctx.fillText(obj.numbers, event.pageX - $('#mycanvas').offset().left, obj.y+5);
					$('.postil>div:last-child>div>div:nth-of-type(1)').append(center);
					obj.move = 0;
					$('.postil>div:last-child>div').css('overflow-y', 'auto');
					canvass=false;
				}
			}
		}
	}

	//提交
	$("#next-stu").on("click",function(){
		var valNullNum = 0,valNull = false;
		$(".Correcting-questions").each(function(){
			var val = $(this).find(".score").val();
			if(val == ""){
				valNullNum++;
				valNull = true;
			}
		})
		if(valNull){
			layui.use("layer",function(){
				layer.confirm('您有'+valNullNum+'道题未打分，是否继续打分？', {
	  				btn: ['答题','取消'] //按钮
				}, function(){
					upLoadData();
					layer.closeAll('dialog');
				}, function(){
					alert("return");
					return;
				});
			})
		}
	})
})

function upLoadData(){
	var arr = [];
	var num = 0;
	$(".Correcting-questions").each(function(j){
		var len = $(this).find(".amend").find(".pitchOn").length;
		var json = {
			"id" : $(this).attr("data-id"),
			"student_answer":'',
			"data":[]
		};
		var dataArr = [];
		var html = "<div class='upLoadHtmlDataContent'>"+$(this).find(".amend").html()+"</div>";
		$(".upLoadHtmlData").append(html)
		for(var i = num;i < (num+len);i++){
			var cla = "sort"+(i+1);
			var newCla = "sort"+(i-num+1);
			$(".upLoadHtmlDataContent").eq(j).find("sup").eq(i-num).text(i-num+1);
			$(".upLoadHtmlDataContent").eq(j).find(".pitchOn").eq(i-num).removeClass(cla).addClass(newCla);
			dataArr.push($(".textareaS div").eq(i).html());
		}
		json.student_answer = JSON.stringify($(".upLoadHtmlDataContent").eq(j).html());
		json.data = dataArr;
		arr.push(json);
		num += len;
	})
	$.ajax({
		url:"",
		data:arr,
		success:function(data){
			alert("成功")
		},
		error:function(data){
			alert("失败")
		}
	})
}