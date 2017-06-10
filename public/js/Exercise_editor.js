function Cmd(obj) {
	$("#xxx").children("div").each(
		function() {
			$(this).hide();
		}
	);
	$("#div" + obj.value).show();
}

function Cmdd(obj) {
	$("#centery>div:nth-of-type(5) #xxx").children("div").not(':last-child').each(
		function() {
			$(this).hide();
		}
	);
	$(".div" + obj.value).show();
};
/*IE8遮罩层动态调试*/
$(function() {
	if($(".introjs-tooltipReferenceLayer").css("top") == "575px") {
		$(".introjs-tooltipReferenceLayer").css({
			"top": "251px",
			"left": "626px"
		});
	};
})

$(function() {
	$('.mar_tb').hover(function() {
		$(this).find('.tj').show()
	}, function() {
		$(this).find('.tj').hide()
	});
	$('.nave').next().find('input').addClass('cs')
	$('.mar_tb').find('.tj').find('input').click(function() {
		var a = $(this).val()
		if($(this).is(":checked")) {
			$('.scc .c' + a).show()
			$(this).parent('.tj').addClass('ok')
			$('.nave').next().show()
			$('.nave').next().css({
				position: 'absolute',
				width: '100%',
				textAlign: "left",
				background: '#fff',
				marginTop: '30px'
			})
			$('.nave').next().find('ol').css('padding-left', '50px')
			$('.nave').next().find('ol').children('li').css({
				color: '#333',
				margin: '10px 0',
				listStyle: 'inherit'
			})
		} else {
			$(this).parent('.tj').removeClass('ok')
			$('.scc .c' + a).hide()
		}
		$('.yit>img').click(function() {
			$('.scc ol li').hide()
			$('.scc').hide()
			$('.tj').removeClass('ok')
			$('.tj input').attr("checked", false)
		})
	})
	$('.yit>img').hover(function() {
		$(this).attr('src', 'images/s12.jpg')
	}, function() {
		$(this).attr('src', 'images/s05.jpg')
	});
	$('.cs').click(function() {
		var hide = 'none'
		var wenz = '返回'
		localStorage.setItem('key', hide)
		localStorage.setItem('keyy', wenz)
	})
});
//只做出前三个有添加功能的假数据给你看。代码向上
$(function() {

		$('.bj').click(function() {
			$('#centery>div').not(":first-child").hide()
			$('#centery>div:nth-of-type(4)').show()
			var wen = $('#content #xxx>#div2').html();
			$('#centery>div:nth-of-type(4) #xxx').append("<div class='homework-content' style='width:97%;border:0;'>" + wen + "</div>")
			var d = 64;
			$('.answer4 a').click(function() {
				d++;
				var b = String.fromCharCode(d)
				$('.select1').append('<div class="select_single"><span class="question">选项' + b + '：</span><input class="no_addquestion" type="text" value=""><input type="file" name="pic" style="position: absolute;width:35%;height: 60%;line-height: 0px;text-indent: 0;top: 8px;right: 150px;    text-indent: 177px; color: #fff;"/></div>');
				$('#answer select').append(' <option value="1" name="queryType">选项' + b + '</option>');
				$('#select1>.select_single').append('<a href="javascript:;"><img src="images/single.jpg" alt=""></a>')
				$('.select1 .select_single a').click(function() {
					$('#ty option').last().remove('option')
					$(this).parent('.select_single').remove('div')
					d--;
				})
			})
			$('.hidee').hide();
			var selectt = $(this).parents('.homework-content').find('.question-head').find('.xz').text();
			$('#centery>div:nth-of-type(4) #66 option').text(selectt);
		});
		$('#div10>div:nth-of-type(3)').css('cursor', 'pointer')
		$('#div10>div:nth-of-type(3)').click(function() {
			$('#centery>div').not(":first-child").hide()
			$('#centery>div:nth-of-type(5)').show()
			$('#centery>div:first-child>div:nth-of-type(2)').text('添加子题');
			$('#centery>div:first-child>div:nth-of-type(3)').hide();
		});
		var box = 0;
		$('#bth_c,#bth_cc').click(function() {
			box++;
			$('#centery>div').not(":first-child").hide();
			$('#centery>div:nth-of-type(3)').show();
			var sd = $('#centery>div:nth-of-type(5) #66').val();
			console.log(sd)
			var nei = $('#centery>div:nth-of-type(5) #xxx>.div' + sd).html();
			var a = $('#centery>div:nth-of-type(5) #xxx>.div' + sd + 'textarea').val();
			$('#centery>div:nth-of-type(3) #div10>div:nth-of-type(2) textarea').val(a)
			$('#centery>div:nth-of-type(3) #div10>div:nth-of-type(2)').append("<div class='end hj' style='margin-left:0;width:100%'><div class='zi' style='color:#666;margin-left:13px'>子题" + box + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>删除</span></div>" + nei + "</div>");
			$('.zi').next().css('margin-top', '5px');
			$('.zi').find('span').click(function() {
				$(this).parents('.hj').hide();
				box--;
			}).css('cursor', 'pointer').hover(function() {
				$(this).css('color', '#168bee')
			}, function() {
				$(this).css('color', '#666')
			});
			$('#centery>div:nth-of-type(3) #div10>div:nth-of-type(2) .button').hide()
		})
	})
	//动态生成，遇到一个问题样式生成了但是里面的内容并没有生成，麻烦写下。见上
$(document).ready(function() {
	$(".bc").click(function() {
		$(".fix").toggle()
	});
	$(".fix>div").mouseover(function() {
		$(this).addClass('on').siblings().removeClass('on');
	});
	$(".fix>div").click(function() {
		$(".fix").css("display", "none")
	});
	$(".up_work").click(
		function() {
			$(".content0").hide();
			$("#content").show()
		}
	);
	$(".search_hide_row>div>span").click(
		function() {
			if($(this).attr('class') == 'hide_add') {
				$(this).attr('class', '')
			} else {
				$(this).attr('class', 'hide_add');
			}
		}
	);
	$(".to-add>div>span").click(
		function() {
			$(".to-add>div>span").removeClass("balk");
			$(this).addClass("balk");
		}
	);
	$(".bc+button").click(
		function() {
			$(".go_success").show();
			setTimeout(function() {
				$(".go_success").hide()
			}, 1000);
		}
	);
	$(".tadd").click(
		function() {
			$(".go_tj").show();
			setTimeout(function() {
				$(".go_tj").hide()
			}, 2000);
		}
	);

	$(".collection_num").prev().click(
		function() {
			if($(this).html() == "收藏") {
				$(this).html("已收藏");
				var cn = $(this).next().html();
				var nn = parseInt(cn);
				console.log(nn)
				nn += 1;

				$(this).next().html(nn);
			} else {
				$(this).html("收藏");
				var cn = $(this).next().html();
				var nn = parseInt(cn);
				nn -= 1;
				$(this).next().html(nn);
			}
		}
	)
})

//星星评分
$(function() {
	$('body').click(function() {
		$('.pj').hide()
	})
	$('.col-line').next().click(function() {
		$(this).next().show()
		return false
	});
	$('.pj>div,.pj>div:nth-of-type(1)>img,.pj>div:nth-of-type(2)>span').click(function() {
		return false;
	})
	$('.pj>b').click(function() {
		//星星评分
		$(this).siblings('.pj>div:nth-of-type(1)').find('img').on('click', function() {
			var th = $(this).attr('num');
			$(this).parent().attr('title', '难度(' + th + ')');
			if($('.question-foot img').attr('src') == 'images/Cj_17mm.png') {
				$(this).attr('src', 'images/Cj_17mm.png').prevAll().attr('src', 'images/Cj_17mm.png');
				$(this).nextAll().attr('src', 'images/Cj_18mm.png');
			} else {
				$(this).attr('src', 'images/Cj_18m.png').prevAll().attr('src', 'images/Cj_18m.png');
				$(this).nextAll().attr('src', 'images/Cj_17m.png');
			}
		});

		//方块评分
		$(this).siblings('.pj>div:nth-of-type(2)').find('span').on('click', function() {
			var span = parseInt($(this).attr('mui'));
			if(span == 1) {
				$(this).css('background-color', '#e46161')
			} else if(span == 2) {
				$(this).css('background-color', '#f19149').prevAll().css('background-color', '#f19149')
			} else if(span == 3) {
				$(this).css('background-color', '#f8d56d').prevAll().css('background-color', '#f8d56d')
			} else if(span == 4) {
				$(this).css('background-color', '#cce198').prevAll().css('background-color', '#cce198')
			} else if(span == 5) {
				$(this).css('background-color', '#a3ce7a').prevAll().css('background-color', '#a3ce7a')
			}
			$(this).nextAll().css('background-color', '#ccc')
		});

		if($(this).text() == '已评论') {
			$(this).text('已评论');
		} else {
			if($(this).text() == '确定') {
				$(this).parent('.pj').hide();
				$(this).text('已评论').css('color', '#999')
				$('.pj>div:nth-of-type(1)>img').off('click');
				$('.pj>div:nth-of-type(2)>span').off('click');
			} else {
				$(this).text('确定')
				$(this).siblings('.pj>div:nth-of-type(1)').find('img').attr('src','images/Cj_18mm.png');
				$(this).siblings('.pj>div:nth-of-type(2)').find('span').removeClass()
			}
		}

		return false
	})
	if($(document).width() <= 1850) {
		$('.question-foot img').attr('src', 'images/Cj_17m.png').width(15)
		$('.question-foot .yellow').attr('src', 'images/Cj_18m.png').width(15)
	}
});