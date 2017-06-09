//单选题
$(function() {
		var d = 64,
			a = 64;
		$('.answer4').on('click', 'a', function() {
			d++;
			var b = String.fromCharCode(d)
			$('.select1').append('<div class="select_single"><span class="question">选项<span>' + b + '</span>：</span><input class="no_addquestion" type="text" value=""><a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
			$(this).next().append('<option value="1" name="queryType">选项' + b + '</option>')
		});
		$('body').on('click', '.select1 .select_single a', function() {
				var div = $(this).parent('.select_single').nextAll().find('.question>span')
				for(var i = 0; i < div.length; i++) {
					var thi = div[i].innerHTML,
						th = thi.charCodeAt();
					--th;
					div[i].innerHTML = String.fromCharCode(th)
				}
				$('#ty option').last().remove('option')
				$(this).parent('.select_single').remove('div')
				d--;
			})
			//	
			//
			//
			//
		$('.answer4a').on('click', 'a', function() {
			a++;
			var aa = String.fromCharCode(a)
			$('.select1a').append('<div class="select_single"><span class="question">选项<span>' + aa + '</span>：</span><input class="no_addquestion" type="text" value=""><a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
			$(this).next().append('<option value="1" name="queryType">选项' + aa + '</option>')
		});
		$('body').on('click', '.select1a .select_single a', function() {
			var div = $(this).parent('.select_single').nextAll().find('.question>span')
			for(var i = 0; i < div.length; i++) {
				var thi = div[i].innerHTML,
					th = thi.charCodeAt();
				--th;
				div[i].innerHTML = String.fromCharCode(th)
			}
			$('#ty option').last().remove('option')
			$(this).parent('.select_single').remove('div')
			a--;
		})
	})
	//多空题
$(function() {
		var d = 0,
			a = 0;
		$('.xxxx .answer7').on('click', 'a', function() {
			d++;
			$('.xxxx #gapp').append('<input type="text" value="空' + d + '" style="color:#168BEE">');
			$('.xxxx .G .select_single a').click(function() {
				$(this).parent('.select_single').remove('div')
				d--;
			})
		});
		//
		//
		//
		//
		$('.xxxxx .answer7').on('click', 'a', function() {
			a++;
			$('.xxxxx #gapp').append('<input type="text" value="空' + a + '" style="color:#168BEE">');
			$('.xxxxx .G .select_single a').click(function() {
				$(this).parent('.select_single').remove('div')
				a--;
			})
		});
	})
	//多选题
$(function() {
	$(document).click(function() {
		$('.nei').hide()
	})
	var d = 64,
		a = 64;
	$('.xxxx .answer5 a').click(function() {
		d++;
		var b = String.fromCharCode(d)
		$('.xxxx #select2').append(' <div class="select_single"> <span class="question">选项<span>' + b + '</span>：</span> <a href="#"><img src="images/single.jpg" alt=""></a><input class="no_addquestion" type="text" value=""></div>');
		$('.xxxx .answer5 #but_a').append(' <option value="1" name="queryType">选项' + b + '</option>');
		$('.xxxx #select2>.select_single').last().append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
		$('.xxxx .nei').append('<b style="margin:0 5px">' + b + '</b>')
	});
	$('body').on('click', '.xxxx #select2 .select_single a', function() {
		var div = $(this).parent('.select_single').nextAll().find('.question>span')
		for(var i = 0; i < div.length; i++) {
			var thi = div[i].innerHTML,
				th = thi.charCodeAt();
			--th;
			div[i].innerHTML = String.fromCharCode(th)
		}
		$('.xxxx #but_a option').last().remove()
		$(this).parent('.select_single').remove()
		$('.xxxx .nei').find('b:last-child').remove()
		d--;
	});
	$('body').on('click', '.xxxx .nei>b', function() {
		$('.xxxx .nei').prev().append('<b style="margin:0 5px">' + $(this).text() + '</b>')
	});
	$('.xxxx .nei').prev().click(function() {
			$('.xxxx .nei').toggle()
			return false;
		})
		//
		//
		//
		//
		//
	$('.xxxxx .answer5 a').click(function() {
		a++;
		var ba = String.fromCharCode(a)
		$('.xxxxx #select2').append(' <div class="select_single"> <span class="question">选项<span>' + ba + '</span>：</span> <a href="#"><img src="images/single.jpg" alt=""></a><input class="no_addquestion" type="text" value=""></div>');
		$('.xxxxx .answer5 #but_a').append(' <option value="1" name="queryType">选项' + ba + '</option>');
		$('.xxxxx #select2>.select_single').last().append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
		$('.xxxxx .nei').append('<b style="margin:0 5px">' + ba + '</b>')
	});
	$('body').on('click', '.xxxxx #select2 .select_single a', function() {
		var div = $(this).parent('.select_single').nextAll().find('.question>span')
		for(var i = 0; i < div.length; i++) {
			var thi = div[i].innerHTML,
				th = thi.charCodeAt();
			--th;
			div[i].innerHTML = String.fromCharCode(th)
		}
		$('.xxxxx #but_a option').last().remove('option')
		$(this).parent('.select_single').remove('div')
		$('.xxxxx .nei').find('b:last-child').remove()
		a--;
	});
	$('body').on('click', '.xxxxx .nei>b', function() {
		$('.xxxxx .nei').prev().append('<b style="margin:0 5px">' + $(this).text() + '</b>')
	});
	$('.xxxxx .nei').prev().click(function() {
		$('.xxxxx .nei').toggle()
		return false;
	})
});
//连线题
$(function() {
	var a = 1,
		b = 1;
	$('.xxxx .answer').on('click', 'a', function() {
		a++;
		$('.xxxx .A').append('<div class="matching"><span class="question">' + a + '：</span><input type="text" value="" name="issue'+a+'"></div>');
		$('.xxxx .B').append('<div class="matching"><span class="question">' + a + ':</span><input type="text" value="" name="result'+a+'"></div>');
		$('.xxxx .B .matching').find('a').remove();
		$('.xxxx .B .matching:last-child').append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
	});
	$('body').on('click', '.xxxx .matching>a', function() {
			$(this).parents('.B').prev().children('div:last-child').remove();
			$(this).parent('.B .matching').remove();
			$('.xxxx .B .matching:last-child').append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
			a--;
		})
		//
		//
		//
		//
		//
	$('.xxxxx .answer').on('click', 'a', function() {
		b++;
		$('.xxxxx .A').append('<div class="matching"><span class="question">' + b + '：</span><input type="text" value=""></div>');
		$('.xxxxx .B').append('<div class="matching"><span class="question">' + b + ':</span><input type="text" value=""></div>');
		$('.xxxxx .B .matching').find('a').remove();
		$('.xxxxx .B .matching:last-child').append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
	});
	$('body').on('click', '.xxxxx .matching>a', function() {
		$(this).parents('.B').prev().children('div:last-child').remove();
		$(this).parent('.B .matching').remove();
		$('.xxxxx .B .matching:last-child').append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
		b--;
	})
});
//排序题
$(function() {
	var b = 1,
		a = 1;
	$('.xxxx .answer1 a').click(function() {
		b++;
		$('.xxxx .C').append('<div class="matching"><span class="question">' + b + '：</span><input type="text" value=""><a href="javascript:;"><img src="images/single.jpg" alt=""></a></div>');
	});

	$('.xxxx #div7').on('click', '.matching>a', function() {
		var div = $(this).parent('.matching').nextAll().find('span')
		for(var i = 0; i < div.length; i++) {
			var thi = parseInt(div[i].innerHTML)
				--thi
			div[i].innerHTML = thi + '：'
		}
		$(this).parent('.matching').remove('div')
		b--;
	});
	//
	//
	//
	//
	//
	$('.xxxxx .answer1 a').click(function() {
		a++;
		$('.xxxxx .C').append('<div class="matching"><span class="question">' + a + '：</span><input type="text" value=""><a href="javascript:;"><img src="images/single.jpg" alt=""></a></div>');
	});
	$('.xxxxx #div7').on('click', '.matching>a', function() {
		var div = $(this).parent('.matching').nextAll().find('span')
		for(var i = 0; i < div.length; i++) {
			var thi = parseInt(div[i].innerHTML)
				--thi
			div[i].innerHTML = thi + '：'
		}
		$(this).parent('.matching').remove('div')
		a--;
	});
});
//判断题
$(function() {
		var c = 0,
			d = 0;
		$('.xxxx .answer2 a').click(function() {
			c++;
			$('.xxxx .E').append('<div class="matching"><span class="question">题目<span>' + c + '</span>:</span><input type="text" value=""></div>');
			$('.xxxx .F').append('<div class="matching"><img src="images/s09.jpg"  /><img src="images/s05.jpg"  /></div>')
			$('.xxxx .E .matching').last().append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
			$('.xxxx .F>.matching>img:first-child').click(function() {
				$(this).attr('src', 'images/s03.jpg');
				$(this).next().attr('src', 'images/s05.jpg');
			});
			$('.xxxx .F>.matching>img:last-child').click(function() {
				$(this).attr('src', 'images/s12.jpg');
				$(this).prev().attr('src', 'images/s09.jpg');
			})
		});
		$('body').on('click', '.xxxx .E>.matching>a', function() {
			var div = $(this).parent('.matching').nextAll().find('.question>span');
			for(var i = 0; i < div.length; i++) {
				var thi = parseInt(div[i].innerHTML)
					--thi
				div[i].innerHTML = thi
			}
			$('.F>div:last-child').remove();
			$(this).parent('.matching').remove();
			c--;
		});
		//
		//
		//
		//
		//
		$('.xxxxx .answer2 a').click(function() {
			d++;
			$('.xxxxx .E').append('<div class="matching"><span class="question">题目<span>' + d + '</span>:</span><input type="text" value=""></div>');
			$('.xxxxx .F').append('<div class="matching"><img src="images/s09.jpg"  /><img src="images/s05.jpg"  /></div>')
			$('.xxxxx .E .matching').last().append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
			$('.xxxxx .F>.matching>img:first-child').click(function() {
				$(this).attr('src', 'images/s03.jpg');
				$(this).next().attr('src', 'images/s05.jpg');
			});
			$('.xxxxx .F>.matching>img:last-child').click(function() {
				$(this).attr('src', 'images/s12.jpg');
				$(this).prev().attr('src', 'images/s09.jpg');
			})
		});
		$('body').on('click', '.xxxxx .E>.matching>a', function() {
			var div = $(this).parent('.matching').nextAll().find('.question>span');
			for(var i = 0; i < div.length; i++) {
				var thi = parseInt(div[i].innerHTML)
					--thi
				div[i].innerHTML = thi
			}
			$('.F>div:last-child').remove();
			$(this).parent('.matching').remove('div')
			d--;
		});
	})
	//填空题
$(function() {
	var d = 0,
		a = 0;
	$('.xxxx .answer10 a').click(function() {
		d++;
		$('.xxxx #gap').append('<input type="text" value="空' + d + '" style="color:#168BEE">');
		$('.xxxx .G').append('<div class="select_single"><span class="question">' + d + '：</span><a href="#"></a><input type="text"value="" class="no_addquestion"></div>')
		$('.xxxx .G .select_single').last().append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
	});
	$('.xxxx #div9').on('click', '.G .select_single a', function() {
		var div = $(this).parent('.select_single').nextAll().find('span');
		for(var i = 0; i < div.length; i++) {
			var thi = parseInt(div[i].innerHTML)
				--thi
			div[i].innerHTML = thi + '：'
		}
		var tex = parseInt($(this).parents('.select_single').find('span:first-child').text());
		$(this).parents('#div9').find('div:first-child').find('input:last-child').remove()
		$(this).parent('.select_single').remove()
		d--;
	});
	//
	//
	//
	//
	//
	$('.xxxxx .answer10 a').click(function() {
		a++;
		$('.xxxxx #gap').append('<input type="text" value="空' + a + '" style="color:#168BEE">');
		$('.xxxxx .G').append('<div class="select_single"><span class="question">' + a + '：</span><a href="#"></a><input type="text"value="" class="no_addquestion"></div>')
		$('.xxxxx .G .select_single').last().append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
	});
	$('.xxxxx #div9').on('click', '.G .select_single a', function() {
		var div = $(this).parent('.select_single').nextAll().find('span');
		for(var i = 0; i < div.length; i++) {
			var thi = parseInt(div[i].innerHTML)
				--thi
			div[i].innerHTML = thi + '：'
		}
		var tex = parseInt($(this).parents('.select_single').find('span:first-child').text());
		$(this).parents('#div9').find('div:first-child').find('input:last-child').remove()
		$(this).parent('.select_single').remove()
		a--;
	});
});
//画图题
//$(function(){
//	                $('.img').prev().change(function(){
//      input = $(this)[0];
//      if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)) {   //判断上传文件格式
//          return alert("上传的图片格式不正确，请重新选择");
//      }
//      var reader = new FileReader();
//      reader.readAsDataURL(this.files[0]);
//      reader.onload = function(e) {
//          $('.img>img').attr('src',this.result).css('width','85%');
//      };
//  });
//  
//  	                $('.imgg').prev().change(function(){
//      input = $(this)[0];
//      if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)) {   //判断上传文件格式
//          return alert("上传的图片格式不正确，请重新选择");
//      }
//      var reader = new FileReader();
//      reader.readAsDataURL(this.files[0]);
//      reader.onload = function(e) {
//          $('.imgg>img').attr('src',this.result).css('width','85%');
//      };
//  });
//})
$(function() {
	$('#a').click(function() {
		$('#search_hide').slideToggle()
	})
})