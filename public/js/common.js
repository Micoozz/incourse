/* 点亮顶部导航和左侧导航对应的标签 */
$(function(){
	$(".head_nav>li a").click(function(){
		const txt = $(this).text();
		sessionStorage.setItem("InCourse-state-top",txt);
		sessionStorage.removeItem("InCourse-state-left");
	});
	
	$("#nav1>li>a").click(function(){
		const txt = $(this).text();
		sessionStorage.setItem("InCourse-state-left",txt);
	});
	
	const top_txt = sessionStorage.getItem("InCourse-state-top") || "学校首页";
	const left_txt = sessionStorage.getItem("InCourse-state-left") || "作业本";
	$(".head_nav>li a").removeClass("blue");
	$("#nav1>li>a").removeClass("box");
	$(".head_nav>li a").map(function(){
		if($(this).text() === top_txt) {
			$(this).addClass("blue");
		}
	});
	$("#nav1>li>a").map(function(){
		if($(this).text() === left_txt) {
			$(this).addClass("box");
		}
	});
});

/****************顶部搜索栏******************/
/***省，市区，学校****/
$(function(){
    $('.area>.personArea').hover(function(){
        $(this).children("div").css('color','#168AED');
    },function(){
        $(this).children("div").css('color','#333');
    });
    $('.area>.personArea>div').click(function(){
        if($(this).children("b").hasClass("upPng")){
            $(this).next("ul").slideToggle("fast");
            $(this).children("b").toggleClass("upPng");
        }else {
            $('.area>.personArea>ul').hide();
            $('.area>.personArea>div>b').removeClass("upPng");
            $(this).next("ul").slideToggle("fast");
            $(this).children("b").toggleClass("upPng");
        }
    });
    $('.area>.personArea>ul>li').click(function(){
        var word=$(this).text();
        $(this).parent().prev().children("span").text(word);
        $(this).parent().hide();
        $(this).parent().prev().children("b").removeClass("upPng");
    });
});

/**********************瀑布流**********************/
/**图片的显示宽度**/
$(function(){
    var n=$('#article_01 .content>.mediaBox>img').length;
    switch (n){
        case 1:$('#article_01 .content>.mediaBox>img').css('width','100%');break;
        case 2:$('#article_01 .content>.mediaBox>img').css('width','49.7%');break;
        default:$('#article_01 .content>.mediaBox>img').css('width','33%');
    }
})
$(function(){
    var n=$('#article_02 .content>.mediaBox>img').length;
    switch (n){
        case 1:$('#article_02 .content>.mediaBox>img').css('width','100%');break;
        case 2:$('#article_02 .content>.mediaBox>img').css('width','49.7%');break;
        default:$('#article_02 .content>.mediaBox>img').css('width','33%');
    }
})

/**点击收藏、评论、分享、点赞的效果**/
$(function() {
    /*点击收藏的效果
    $('.waterfallFoot>.collect').click(function () {
        $(this).children("img").attr("src", "images/media/Hpb_collect_pre.png");
        $(this).css("color", "#158BEE");
    });*/
    /*点击分享的效果*/
    $('.waterfallFoot>.share').click(function () {
        $('.umodal').show();
    });
    /*点击点赞的效果*/
    $('.waterfallFoot>.support').one("click", function () {
        $(this).children("img").attr('src', 'images/media/Hpb_support_pre.png');
        $(this).children("div").css('color', '#158BEE');
        var n = $(this).children("div").children("span").text().slice(1, -1);
        n++;
        $(this).children("div").children("span").text('(' + n + ')');
        $(this).children("span").css({'animation':'support 1s linear'});
    });
})
/**关闭分享的模态框**/
$(function(){
    $('.umodal-content .close').click(function(){
        $('.umodal').fadeOut();
    });
})
/****点击“回复”的效果****/
$(function(){
    $('.detailBox .response').click(function(){
        $(this).parent("ul").next().next("form").toggle();
    });
})

/****回复中的“点赞"***/
$(function(){
    $('.detailBox .right>b').click(function(){
        $(this).toggleClass("supportIcon");
    });
})



/****************分享**********************/
window._bd_share_config = {
    common : {
        bdText : '自定义分享内容',
        bdDesc : '自定义分享摘要',
        bdUrl : '自定义分享url地址',
        bdPic : '自定义分享图片'
    },
    share : [{
        "tag" : "share_1",
        "bdSize" : 16
    }],
    /*
     slide : [{
     bdImg : 0,
     bdPos : "right",
     bdTop : 100
     }],

     image : [{
     viewType : 'list',
     viewPos : 'top',
     viewColor : 'black',
     viewSize : '16',
     viewList : ['qzone','tsina','huaban','tqq','renren']
     }],*/
    selectShare : [{
        "bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
    }]
}
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];


/******** 点击导航栏最后一个LI让它不显示灰色背景 *******/
$(function(){
    $('.affix').next().click(function(){
        $(this).find('a').css('background-color','transparent')
        $(this).find('.cent').show();
    });
    $(".head_nav>li").click(function(){
            $(this).find('a').css('background-color','transparent');
    });
    $('.affix').next().hover(function(){
        $(this).find('.cent').show();
        $(this).css('background-image','url(images/media/001_03_01.png)');
    },function(){
        $(this).find('.cent').hide();
        $(this).css('background-image','url(images/media/001_03.png)');
    })
})








