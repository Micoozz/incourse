$(function(){
    var a=$(window).height();
    var b=$(window).width();
    $('.opca').css({
        width:b,
        height:a
    });
    $('#table td:last-child').click(function(){
        $('.detailed').show();
        $('.opca').show();
    });
    $('.detailed>div:first-child>div:last-child').click(function(){
        $('.detailed').hide();
        $('.opca').hide();
    });
});

$(function(){
var a=$('.td').html();
    $('.detailed>div:first-child>div:first-child').html(a)
});