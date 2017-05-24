//条件筛选按钮切换
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

});
//条件筛选条件切换
$(function(){
    $('.choose li:first-child').next().addClass('fi');
    $('.choose ul').eq(0).find('li').not(':first-child').click(function(){
            $('.choose ul').eq(0).find('li').attr('class','');
           $(this).addClass('fi');
    });
    $('.choose ul').eq(1).find('li').not(':first-child').click(function(){
        $('.choose ul').eq(1).find('li').attr('class','');
        $(this).addClass('fi');
    });
    $('.choose ul').eq(2).find('li').not(':first-child').click(function(){
        $('.choose ul').eq(2).find('li').attr('class','');
        $(this).addClass('fi');
    });
    $('.choose ul').eq(3).find('li').not(':first-child').click(function(){
        $('.choose ul').eq(3).find('li').attr('class','');
        $(this).addClass('fi');
    });

});
//全选checkbox
$(function() {
    $('#choose-all').click(function () {
        if (this.checked) {
            $('input[type=checkbox]').prop('checked', true);
        } else {
            $('input[type=checkbox]').prop('checked', false);

        }
    });
});
//一键分配
$(".fp").click(function () {
    // console.log(1)
        $(".fix").toggle()
    }
);
$(".fix>a").mouseover(function () {
    console.log(1);
    $(this).addClass('on').siblings().removeClass('on');
});
// <img src="images/Zhj_setting-black.png" <img src="images/Zhj_account-black.png" alt="分配账号">&nbsp分配账号</a>
//更改图片hover
$(function(){
    $('.hover-effect3').hover(function() {
        $(this).css({
            "color": "#168bee"
        }).children("img").attr('src', 'images/delete1.png');
    }, function() {
        $(this).css({
            "color": "#666666"
        }).children("img").attr('src', 'images/delete_black.png');
    });
    $('.hover-effect1').hover(function() {
        $(this).css({
            "color": "#168bee"
        }).children("img").attr('src', 'images/Zhj_setting-blue.png');
    }, function() {
        $(this).css({
            "color": "#666666"
        }).children("img").attr('src', 'images/Zhj_setting-black.png');
    });
    $('.hover-effect2').hover(function() {
        $(this).css({
            "color": "#168bee"
        }).children("img").attr('src', 'images/Zhj_account-blue.png');
    }, function() {
        $(this).css({
            "color": "#666666"
        }).children("img").attr('src', 'images/Zhj_account-black.png');
    });
});

//下拉条件筛选
$(function() {
    var requireUp = true;
    $('.require-filter').click(function(){
        $('#search_hide').slideToggle();
        if(requireUp){
            $('.require-filter .glyphicon').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down');
            requireUp = false;
        }else{
            $('.require-filter .glyphicon').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up');
            requireUp = true;
        }
    });
    $("#more").click(
        function() {
            $("#search_hide").slideToggle("slow");
        }
    );
    $(".size_more").click(
        function() {
            $("#size_more").slideToggle("slow");
        }
    );
    $('.type_select span').click(function() {
        $('.type_select span').removeClass('item-clicked');
        $(this).addClass('item-clicked');
    });
    $('.type_select span').click(function() {
        $('.type_select span').removeClass('item-clicked');
        $(this).addClass('item-clicked');
    });
    $('.size_select span').click(function() {
        $('.size_select span').removeClass('item-clicked');
        $(this).addClass('item-clicked');
    });
    $('.chapter_select span').click(function() {
        $('.chapter_select span').removeClass('item-clicked');
        $(this).addClass('item-clicked');
    });
});
