$(function(){
    /***** 点亮顶部导航对应项 ******/
    $(".head_nav>li:first-child>a, .head_nav>li:last-child>a").addClass("blue");

    /****** 顶部搜索栏点击向下箭头的效果 ****/
    $("#fixedTop>.mediaDown>img").hover(function(){
        $("#searchBar").show();
        $(this).hide();
    })
    $("#searchBar").mouseleave(function(){
        $("#searchBar").hide();
        $("#fixedTop>.mediaDown>img").show();
    })
})



/**********************瀑布流**********************/
/*判断文章正文的内容长度是否显示“查看全文”*/
$(function(){
    var str=$('#article_01 .content>.articleBox').text();
    var n=$('#article_01 .content>.articleBox').text().length;
    if(n>135){
        str=str.slice(0,135).concat("...");
        $('#article_01 .content>.articleBox').text(str);
    }
})
$(function(){
    var str=$('#article_02 .content>.articleBox').text();
    var n=$('#article_02 .content>.articleBox').text().length;
    if(n>135){
        str=str.slice(0,135).concat("...");
        $('#article_02 .content>.articleBox').text(str);
    }
})
$(function(){
    var str=$('#article_03 .content>.articleBox').text();
    var n=$('#article_03 .content>.articleBox').text().length;
    if(n>135){
        str=str.slice(0,135).concat("...");
        $('#article_03 .content>.articleBox').text(str);
    }
})
/**图片的显示宽度**/
$(function(){
    var n=$('#article_01 .content>.mediaBox>img').length;
    switch (n){
        case 1:$('#article_01 .content>.mediaBox>img').css('width','100%');break;
        case 2:$('#article_01 .content>.mediaBox>img').css('width','49.5%');break;
        default:$('#article_01 .content>.mediaBox>img').css('width','32.8%');
    }
})
$(function(){
    var n=$('#article_02 .content>.mediaBox>img').length;
    switch (n){
        case 1:$('#article_02 .content>.mediaBox>img').css('width','100%');break;
        case 2:$('#article_02 .content>.mediaBox>img').css('width','49.5%');break;
        default:$('#article_02 .content>.mediaBox>img').css('width','32.8%');
    }
})

/**点击收藏、评论、分享、点赞的效果**/
$(function() {
    /*点击评论的效果*/
    $('.waterfallFoot>.appraise').click(function () {
        $(this).toggleClass("current");
        $(this).parent().next(".appraiseBox").toggle();
    });
})

/********************AJAX提交表单**************
$(function(){
    $('#searchNav').submit(function(){
        $.ajax({
            url:" ",
            data:$('#searchNav').serialize(),
            type: "POST",
            success:function(data){

            }
        });
        return false;
    });
})**********/




