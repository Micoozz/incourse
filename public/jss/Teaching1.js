/**
 * Created by Administrator on 2016/6/22.
 */
$(function(){
    $('.candidates>.col-md-2').click(function(){
        if($('.choose').is(':hidden')){
            $('.choose').slideDown();
            $(this).css('background','url("images/class_3(1).jpg") no-repeat #55acee 12px center')
        }else{
            $('.choose').slideUp();
            $(this).css('background','url("images/class_3.jpg") no-repeat #55acee 15px center')
        }
    });
    $('.choose li:first-child').next().addClass('fi')
});
//�л���������ɸѡ����

$(function(){
    $('.choose ul li a').css({
        backgroundColor:'#fff',
        color:'#333',
        borderRadius:'4px',
        padding:'2px'
    });
    $('.choose li:first-child ').next().find('a').css({
        backgroundColor:'#168bee',
        color:'#fff'
    });
    $('.choose ul li a').click(function(){
        $(this).parent().siblings().find('a').css({
            backgroundColor:'#fff',
            color:'#333'
        })
        $(this).css({
            backgroundColor:'#168bee',
            color:'#fff'
        });
    });
});