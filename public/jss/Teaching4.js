/**
 * Created by Administrator on 2016/6/23.
 */
$(function(){
    var a=$(window).height();
    var b=$(window).width();
    $('.opca').css({
        width:b,
        height:a
    });
    $('.nei>div:last-child>span').click(function(){
        $('.opca').show();
        $('.prompt').show();
    });
    $('.prompt span:last-child').click(function(){
        $('.opca').hide();
        $('.prompt').hide();
    });
    $('.prompt span').first().click(function(){
        $('.opca').hide();
        $('.prompt').hide();
        $(this).parents('.reward').hide();
    });
});
$(function(){
    var a=0;
    var f=$('#myCarousel .active img').width();
    var h=$('#myCarousel .active img').length-3;
    var j=-(f+15)*h+'px';
    $('#myCarousel>.left').click(function(){
        if($('#myCarousel .active').css('marginLeft')!=j &&  $('#myCarousel .active img').length>3) {
            a = a - 172;
            $('#myCarousel .active').css('marginLeft', a)
        }
    });
        $('#myCarousel>.right').click(function () {
            if($('#myCarousel .active').css('marginLeft')<'0px'){
                a = a + 172;
                $('#myCarousel .active').css('marginLeft', a)
            }
        });
});
$(function(){
    $("#myCarouselt").carousel('pause');
    $('#myCarousel>.carousel-inner img').click(function(){
        $('.rewardt').show();
        $('.opca').show()
    });
    $('.opca').click(function(){
        $('.rewardt').hide();
        $('.opca').hide();
        $('.prompt').hide()
    });
    $('.rewardt>div:last-child span').click(function(){
        $('.reward').hide();
        $('.rewardt').hide();
        $('.opca').hide()
    });
});