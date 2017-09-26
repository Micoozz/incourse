/*****************************个人资料***************************************/

/*上传头像*/
//safari5.0.4不支持FileReader和file.files.item(0).getAsDataURL方法
$(function(){
    $('#form_m .unloadHeadImg').change(function(){
        input = $(this)[0];
        if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)) {   //判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择");
        }
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
            $('#t1_m .headImg>img').attr('src',this.result);
        };
    });
});


/***点击“修改资料”模态框中的保存效果**/
$('#t11_m [type="submit"]').click(function(){
    $('#password').modal("toggle");
    $('.change .unloadStatus').show();
    var timer=setTimeout(function(){
        $('.change .unloadStatus').hide();
    },1000);
});


/***************************修改密码验证**************************/
$(function(){
    var password = false;
    var repassword = false;
    var sepassword = false;
    //原密码 password
    $('input[name="password"]').focus(function(){
        $(this).parent().siblings().find('span').text('6-20位字符,字母开头,只包含字母数字下划线!').removeClass().addClass('state2');
    }).blur(function(){
        var reg = /^[a-z | A-Z]\w{5,19}$/;
        if(reg.test($(this).val())){
            $(this).parent().siblings().find('span').text('密码输入正确!').removeClass().addClass('state4');
            password = true;
        }else{
            $(this).parent().siblings().find('span').text('密码输入错误,请重新输入!').removeClass().addClass('state3');
        }
    })
    //新密码 repassword
    $('input[name="repassword"]').focus(function(){
        $(this).parent().siblings().find('span').text('6-20位字符,字母开头,只包含字母数字下划线!').removeClass().addClass('state2');
    }).blur(function(){
        var reg = /^[a-z | A-Z]\w{5,19}$/;
        var reg1=/^\w{0,5}$/;
        var reg2=/^\w{20,}$/;
        var reg3=/^\^(\w)$/;
        if(reg.test($(this).val())){
            $(this).parent().siblings().find('span').text('密码输入正确!').removeClass().addClass('state4');
            repassword = true;
        }else{
            if(reg1.test($(this).val())){
                $(this).parent().siblings().find('span').text('密码输入低于6位,请重新输入!').removeClass().addClass('state3');
            }else if(reg2.test($(this).val())){
                $(this).parent().siblings().find('span').text('密码输入超过20位,请重新输入!').removeClass().addClass('state3');
            } else{
                $(this).parent().siblings().find('span').text('请以字母开头或只允许包含字母数字下划线!').removeClass().addClass('state3');
            }
        }
    })
    //再次输入新密码 sepassword
    $('input[name="sepassword"]').focus(function(){
        $(this).parent().siblings().find('span').text('请再次输入新密码!').removeClass().addClass('state2');
    }).blur(function(){
        var reg = /^[a-z | A-Z]\w{5,19}$/;
        if(reg.test($(this).val()) && $(this).val() == $('input[name="repassword"]').val()){
            $(this).parent().siblings().find('span').text('确认密码输入正确!').removeClass().addClass('state4');
            sepassword = true;
        }else{
            $(this).parent().siblings().find('span').text('两次输入不一致或输入错误!').removeClass().addClass('state3');
        }
    })
    //提交 submit
    $('input[type="submit"]').click(function(){
        if(password && repassword && sepassword){
            $("#form_p").submit();
        }else{
            return false;
        }
    });
})
