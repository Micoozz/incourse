/**
 * Created by tl20160420 on 2016/6/12.
 */
/*******************************修改密码**************************************/
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
/*******************************************上传资料*************************************************/
$(function(){
    $('#form_m .unloadHeadImg').change(function(){
        input = $(this)[0];
        if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)) {
            return alert("格式不正确");
        }
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
            $('#t1_m>td>a>img').attr('src',this.result);
        };
    });
});
/*******************************************修改资料****************************************************/

$(function(){
    //修改姓名
     $("#t2_m input").attr("disabled",true).css({"background":"#fff","border":"1px solid #aaa"});
    //出生年月日
    $("#t5_m select").attr("disabled",true);
    $("#t5_m option[value='1995']").attr("selected","selected");
    $("#t5_m option[value='005']").attr("selected","selected");
    $("#t5_m option[value='04']").attr("selected","selected");
    //所在学校
    $("#t8_m input").attr("disabled",true).css({"background":"#fff","border":"1px solid #aaa"});
    //职位
    $("#t10_m input").attr("disabled",true).css({"background":"#fff","border":"1px solid #aaa"});
    //学籍号
    $("#t12_m input").attr("disabled",true).css({"background":"#fff","border":"1px solid #aaa"});
    //性别
    $("#t4_m input").attr("disabled",true).css("background","#fff");
    $("#t4_m input[value='女']").attr("checked","checked");
})

/********************************************保存*******************************************************/
$(function(){
    $('#t11_m [type="submit"]').click(function(){
        $('#password').modal("toggle");
        $('.change .unloadStatus').show();
        var timer=setTimeout(function(){
             $('.change .unloadStatus').hide();
         },1000);
    });
})
/*****************************************FYG上传照片验证***************************************************/
$(function(){
    $('.uploadPhoto').change(function(){
        input = $(this)[0];
        if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)) {
            return alert("格式不正确 , 请重新上传！");
        }
    });
});