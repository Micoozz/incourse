	$(function(){
		$('.foot .img').click(function(){
			$('.foot ul').slideToggle()
		})
	})
	//标签页切换
	$(function(){
$('#nav1>li>a').click(function(){
		$(this).css({
			background:'#168AED',
			color:'#fff'
		})
})
	});
$(function(){
	$('#QQ>ul>li').click(function(){
		$('.chatRoom').show()
	});
	$('.chatRoom1>span').click(function(){
		$('.chatRoom').hide()
	});
});
$(function(){
	$('.QQ').siblings().click(function(){
		$('#QQ').slideToggle()
	});
	$('.btn-msg-send>img').click(function(){
		if($('.chatRoom3_c').is(':hidden')){
			$('.chatRoom3_c').show();
			$('.btn-msg-send>img').attr('src','images/index6.jpg')
		}
		else{
			$('.chatRoom3_c').hide();
			$('.btn-msg-send>img').attr('src','images/index5.jpg')
		}
	});
	$('.chatRoom3_c>span').click(function(){
		$('.chatRoom3_c>span').attr('class',' ');
		$(this).attr('class','spann');
		$('.chatRoom3_c').hide();
		var b=$(this).html()
		$('.btn-msg-send>a').html(b)
	})
})
$(function(){
	$('.btn-msg-send>a').click(function(){
		var b=$('.chatRoom3_b').html();
	$('.chatRoom2').append('<div><span>'+b+'</span><img src="images/index7.jpg" /></div><div style="clear:both"></div>');
	$('.chatRoom3_b').html('');
	var v='\n';
	if($('.chatRoom3_b').html(v)){
	$('.chatRoom2>div>span').css({
		display:'inline-block',
		paddingRight:'10px',
		float:'right',
		marginRight:'50px',
		marginTop:'20px'
		})
	$('span>div').css('display','block');
	$('.chatRoom2 span>span').remove();
	}
	})
});
//按键Enter
/*$(function(){
	var a=$('.btn-msg-send>a');
	$(document).keyup(function(e){
        var key =  e.which;
        var f=$('.btn-msg-send>a');
        if(key == 13){
			var b=$('.chatRoom3_b').html();
			$('.chatRoom2').append('<div><span>'+b+'<span></div>');
			$('.chatRoom3_b').html(' ');
        }
   });
})
*/
$(function(){
	var a=$('.nave li:first-child a').html()
	var c=$('.nave li:last-child a').html()
	var d=$('.nave li:first-child a').next().html()
	var b=a.length
	var f=c.length
	var h=c.length
	if(b>23){
		$('.nave li:first-child a').append('<span>...</span>')
	};
if(h>23){
		$('.nave li:first-child a').next().append('<span>...</span>')
	};

	if(f>23){
		$('.nave li:last-child a').append('<span>...</span>')
	};
});
$(function(){
	$('#cent_nav ul li').not(':first-child').on('click',function(){
		$('#cent_nav ul li').removeClass('offt')
		$(this).addClass('offt')
	});
})
$(function(){
	$('.affix').next().click(function(){
		$(this).find('a').css('background-color','transparent')
		$(this).find('.cent').show();
	});
	$('.affix').next().hover(function(){
		$(this).css('background-image','url(images/001_03_01.png)')
		$(this).find('.cent').show();
	},function(){
		$(this).css('background-image','url(images/001_03.png)')
		$(this).find('.cent').hide();
	})
})
$(function(){
		$('.chatRoom1>a:nth-of-type(2)>img').hover(function(){
			$('.chatRoom .personDataContent').show()
},function(){
	$('.chatRoom .personDataContent').hide()
});
})



	/******** 演示用  开始 ********/
		//学校首页、与我相关、个人中心、退出
	$(function(){
		$(".nav.head_nav>li").map(function(index,value){
			var content = $(this).children("a").text();
			if(content === "学校首页"){
				$(this).children("a").removeAttr("href").click(function(){
					window.location = "../../Media/mediaManager.html";
				});
				$(this).children("div").children("a").removeAttr("href").click(function(){
					window.location = "../../Media/relateToMeManager.html";
				});
			}else if(content === "个人中心"){
				$(this).children("div").children("a:last-child").removeAttr("href").click(function(){
					console.log(111)
					window.location = "../AdminData/teacherPersonData.html";
				});
			}else if(content === "退出"){
				$(this).children("a").removeAttr("href").click(function(){
					window.location = "../../index.html";
				});
			}
		})
	})

	//修改导航栏的鼠标指针
	$(function(){
		$(".nav.head_nav>li").css("cursor","pointer");
	})