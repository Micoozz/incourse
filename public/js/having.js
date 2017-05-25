$(function() {
	//添加图片 
	var print;
	$('body').on('click','.print',function(){
		print=$(this)	
		});
		
		$('body').on('change','#images,#images1',function() {
		input = $(this)[0];
		if(!input['value'].match(/.jpg|.gif|.png|.bmp/i)) { //判断上传文件格式
			return alert("上传的图片格式不正确，请重新选择");
		}
		var reader = new FileReader();
		reader.readAsDataURL(this.files[0]);
		reader.onload = function(e) {
			print.append('<img src="" style="max-width:20%"/>')
			print.find('img:last-child').attr('src', this.result);
		};
	})
		
	//上传附件
	function upload() {
		$("#upload1,#upload2").uploadify({
			auto: false,
			fileTypeDesc: 'Image Files',
			height: 28,
			buttonText: ' ',
			swf: 'uploadify/uploadify.swf',
			uploader: 'uploadify/UploadFile.ashx',
			width: 100
		});
	}
	upload()
	var key_a = 64,
		/*单选题变量*/
		key_d = 0, //判断题变量
		key_b = 0, //多空题
		key_c = 0,
		nu=1;
	//			综合题库删选

	//题库选项
		$('.center2 .question_types>option').each(function(i) {
		$(this).attr('value', i + 1)
	})
	$('.center2 .question_types').change(function() {
		$('.center2 #having>div').hide()
		$('.center2 #having>.rubric' + $(this).val()).show();
					key_a=64;
					key_d=0;
					key_b = 0;
					key_c = 0;
	});
	//综合题题库选项
		$('.center3 .question_types>option').each(function(i) {
		$(this).attr('value', i + 1)
	})
	$('.center3 .question_types').change(function() {
		nu=$(this).val();
		$('.center3 #having>div').hide()
		$('.center3 #having>.rubric' + nu).show();
					key_a=64;
					key_d=0;
					key_b = 0;
					key_c = 0;
	});
	//单选题和多选题
	$('.add_key,.Multiselectt,.question_typess').on('click','.key_a',function() {
			key_a++;
		var optio = String.fromCharCode(key_a);
		$(this).parent().prev().append('<div class="single"><span class="blue">选项<b>' + optio + '</b>:</span><span class="quiz" contenteditable="true"></span><img src="images/single.jpg" alt=""></div>');
		/*添加单选题的答案*/
		$(this).next().find('select').append('<option name="option">选项:<b>' + optio + '</b></option>');
		/*添加多选题的答案*/
		$(this).next().find('span:last-child').append('<input type="text" value="' + optio + '" name="Multiselect' + key_a + '" />');
	});
	//单选题  删除
	$('.select,.Multiselect,.question_typess').on('click', '.single>img', function() {
		var neir = $(this).parent().nextAll().children().find('b');
		for(var i = 0; i < neir.length; i++) {
			var thi = neir[i].innerHTML,
				th = thi.charCodeAt();
			--th;
			neir[i].innerHTML = String.fromCharCode(th);
		}
		/*单选题正确答案*/
		$(this).parents('.select').next().find('.right').find('select').find('option').last().remove()
			//多选题的正确答案
		$(this).parents('.Multiselect').next().find('.daan').find('span:last-child').find('input').last().remove()
			/*所有答案*/
		$(this).parent().remove();
		--key_a;

	});

	//多空题和填空题
	$('.Empty_title,.question_typess').on('click','.blank',function() {
		key_b++;
		$(this).parent().next().append('<div><b>' + key_b + '</b><input type="text" name="issue"/><input type="text" name="value" placeholder="分值"/><img src="images/single.jpg" alt="" class="image"></div>');
		$(this).parent().prev().find('.duok').append('<input type="text" value="空' + key_b + '" class="blue" disabled="disabled"/>')
	});
	//多空题删除
	function question_typess(){
	$('.and,#pack,.question_typess').on('click', '.image', function() {
		var Empty_title = $(this).parent().nextAll().find('b')
		console.log($(this).parent())
		for(var i = 0; i < Empty_title.length; i++) {
			var t = parseInt(Empty_title[i].innerHTML);
			--t;
			Empty_title[i].innerHTML = t;
		}
		$(this).parents('.and').prev().prev().find('.duok').find('input').last().remove()
		$(this).parents('#pack').prev().prev().find('.pack').find('input').last().remove()
		$(this).parent().remove();
		--key_b;
	});
}
	question_typess();
	//多选题
	$('.rubric4,.question_typess').on('click','.daan>span:first-child',function() {
		if($(this).next().is(":hidden")) {
			$(this).next().css('display', 'block');
		} else {
			$(this).next().hide();
		};
	});
	//选择正确答案
	$('.rubric4,.question_typess').on('click', '.daan>span:last-child>input', function() {
		$(this).parent().prev().append('<input type="text" value="' + $(this).val() + '" name="' + $(this).attr('name') + '">')
		$(this).attr('disabled', 'false').css('background-color', '#fff')
		$(this).parent().prev().find('b').remove()
	});
	//删除答案
	$('.rubric4,.question_typess').on('click', '.daan>span:first-child>input', function() {
		//	console.log($('.daan>span:first-child>input').length)
		if($('.daan>span:first-child>input').length == 1) {
			$(this).parent().append('<b>请选择正确的答案</b>');
			$(this).parent().next().hide();
		}
		$(this).parent().next().find('input[name="' + $(this).attr('name') + '"]').removeAttr('disabled')
			//console.log($(this).parent().next().find('input[name="'+$(this).attr('name')+'"]'))
		$(this).remove();
		return false;
	});
	//连线题
	
	$('.rubric6,.question_typess').on('click','.ligature_add>span',function() {
		key_c++;
		var father = $(this).parents('.ligature_add').prevAll('#ligature')
			/*子项A组*/
			father.find('.ligature_a').append('<div class="left"><span class="blue">' + key_c + '：</span><span class="ligature" contenteditable="true"></span></div>');
		/*子项B组*/
		father.find('.ligature_b').append('<div class="right on-line"><span class="blue">' + key_c + '：</span><span class="ligature" contenteditable="true"></span></div>');
		/*给最后一个添加删除*/
		father.find('.ligature_b').find('div>img').remove();
		father.find('.ligature_b').find('div').last().append('<img src="images/single.jpg" alt="">')
	});
	//删除
	function question_types(){
	$('.ligature_b,.question_typess').on('click', '.on-line>img', function() {
		$(this).parent().prev().append('<img src="images/single.jpg" alt="">')
		$(this).parents('.ligature_b').prev().find('div').last().remove() //删除子项A组
		$(this).parent().remove(); //删除子项B组
		--key_c;
	});
	}
	question_types();
	//排序题和判断题
	$('.rubric7,.rubric8,.question_typess').on('click','.srot_add>span,.judge_add>span',function() {
		var judge = $(this).parent().prevAll('.judge') //判断题
		key_d++;
		/*排序题*/
		$(this).parent().prev('#srot').append('<div class="decide"><span class="blue"><b>' + key_d + '</b>：</span><span class="srot" contenteditable="true"></span><img src="images/single.jpg" alt=""></div>');
		judge.find('.judge_w').append('<div class="decide"><span class="blue">题目<b>' + key_d + '</b>：</span><span class="judges" contenteditable="true"></span><img src="images/single.jpg" alt=""></div>');
		judge.find('.judge_d').append('<div class="judge_daan"><img src="images/s09.jpg"  /><img src="images/s05.jpg"  /></div>');
	});
	//删除
	function question_type(){
	$('#srot,.judge_w,.question_typess').on('click', '.decide>img', function() {
		var blue = $(this).parent().nextAll().find('span:first-child').children()
		for(var i = 0; i < blue.length; i++) {
			var ti = parseInt(blue[i].innerHTML);
			--ti;
			blue[i].innerHTML = ti;
		}
		$(this).parents('.judge_w').next().find('.judge_daan').last().remove()
		$(this).parent().remove();
		--key_d;
	});
	}
	question_type()
	//判断题
	$('.judge_d,.question_typess').on('click', '.judge_daan>img:first-child', function() {
		$(this).attr('src', 'images/s03.jpg');
		$(this).next().attr('src', 'images/s05.jpg');
	});
	$('.judge_d,.question_typess').on('click', '.judge_daan>img:last-child', function() {
		$(this).attr('src', 'images/s12.jpg');
		$(this).prev().attr('src', 'images/s09.jpg');
	});
	//填空题
	$('.rubric9,.question_typess').on('click','.pack_add>span',function() {
		key_b++;
		$(this).parent().prev().find('.pack').append('<input type="text" value="空' + key_b + '" class="blue" disabled="disabled"/>')
		$(this).parent().next().append('<div><span class="blue"><b>' + key_b + '</b>：</span><span class="pack_a" contenteditable="true"></span><img src="images/single.jpg" alt="" class="image"></div>')
	});
//	//返回
	$('.revert,.fast').click(function(){
		$('.center3').hide();
		$('.center2').show();
	});
	//提交
	$('.fast').click(function(){
		var rubric=$('.center3 .rubric'+nu).html();
		$('.question_typess').append('<div class="rubric'+nu+'" style="display:block;margin-top: 20px;">'+rubric+'</div>');
			question_typess();
			question_types();
			question_type()
	});
});