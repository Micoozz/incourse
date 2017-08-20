$(function(){
	//返回
	$('.revert').click(function(){
		window.location.href="questionBank.html"
	})
	//
	//
	//
	var ur=document.URL,
		st = Number(ur.split('?')[1]);
		if(st==2){
			$('.question_types').append('<option>选择题</option>')
			$('#having').append('<div class="rubric2" style="display:block"><div><span class="blue">问题:</span><span id="quiz" contenteditable="true" class="print"></span></div><div class="select"></div><div class="add_key"><span class="key_a blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span><div class="right">正确答案：&nbsp;<select name=""></select></div></div><div class="clear"></div></div>')
		}else if(st==7){
			$('.question_types').append('<option>排序题</option>')
			$('#having').append('<div class="rubric7" style="display:block"><div><span class="blue">问题:</span><span class="srot print" contenteditable="true"></span></div><div id="srot">子项：</div><div class="srot_add"><span class="blue"><img src="images/add_07.jpg"/>&nbsp;添加选项</span></div></div>')
		}else{
			$('.question_types').append('<option>填空题</option>')
			$('#having').append('<div class="rubric9" style="display:block"><div><span class="blue">问题:</span><span class="pack print" contenteditable="true"></span></div><div class="pack_add">正确答案：<span class="right blue"><img src="images/add_07.jpg"/>&nbsp;插入空格</span></div><div id="pack"></div></div>')
		}
})
