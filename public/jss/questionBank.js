/**
 * Created by Administrator on 2016/6/20.
 */
$(function(){
    $('.candidates>.col-md-2').click(function(){
        if($('.choose').is(':hidden')){
            $('.choose').slideDown();
            $(this).css('background','url("images/class_3(1).jpg") no-repeat #55acee 15px center')
        }else{
            $('.choose').slideUp();
            $(this).css('background','url("images/class_3.jpg") no-repeat #55acee 15px center')
        }
    });
    $('.choose li:first-child').next().addClass('fi')
});
$(function(){
$('.choose ul li').click(function(){
      $(this).siblings().attr('class','');
        $(this).addClass('fi');
   });
   
// 12.9
//$('.select-wrapper').click(function(){
//	//单选
//	$('.select-wrapper').css('background-color','#fff')
//	$('.questionSelect').attr('checked',false)
//	$(this).css('background-color','#168bee');
//	$('.questionSelect[value="'+$(this).next().text()+'"]').attr('checked',true)
//})
//序号
$('.question-types>ol>li').each(function(i){
	$(this).find('.RadioButtonList_issue>.order-number').text(i+1+'.');
})
});