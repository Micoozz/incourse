$(function(){
    var a=$(window).height();
    var b=$(window).width();
    $('.opca').css({
        width:b,
        height:a
    });
    $('.head_nav li:first-child').click(function(){
        $('.Bomb').show();
        $('.opca').show();
    });
    $('.opca').click(function(){
        $('.Bomb').hide();
        $('.opca').hide();
        $('.Bomb1').hide();
    });
    $('.Bomb>ul>li').mouseover(function(){
        $('.Bomb>ul>li').removeClass('fi');
        $(this).addClass('fi')
    })
    $(".f_close").click(function(){
    	$('.Bomb').hide();
        $('.opca').hide();
        $('.Bomb1').hide();
    })
});
$(function(){
   $('.Bomb_1>ol>li>span').click(function(){
       $('.Bomb1').show();
       $('.Bomb').hide();
   });
    $('.Bomb1>div:first-child img').click(function(){
        $('.Bomb1').hide();
        $('.Bomb').show();
    });
});