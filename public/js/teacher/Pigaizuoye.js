$(function() {
    setTimeout(function() {
        $('.homeWork-head li a').removeClass('box').find('i').remove();
        $('.homeWork-head li:last-child a').addClass('box').append('<sub style="font-size: 12px; color: #FFFFFF;line-height: 18px;width: 17px;height: 18px;display: inline-block;background-color: #F56A00;border-radius: 10px;position: relative;top: 5px;">��</sub>');
    }, 10);

    //�ѷ�����δ�����л�
    var estimate = true;
    $('.estate>span').click(function() {
        $('.estate>span').attr('class', '');
        $(this).attr('class', 'blue last');
        $('.pigaizuoye').hide()
        $('.pigaizuoye:nth-of-type(' + $(this).attr("num") + ')').show()
        if(estimate) {
            $('.Panel-selection').hide()
            estimate = false;
        } else {
            $('.Panel-selection').show()
            estimate = true;
        }
    });

    //ɾѡ����

    $('body').on('click', '.Panel-selection>div>span', function() {
        $(this).parent().find('span').removeClass('entirely');
        $(this).addClass('entirely');
        if($(this).attr("num") != '3') {
            $('.pigaizuoye:nth-of-type(2)').show()
            $('.pigaizuoye:nth-of-type(3)').hide()
            $('.Panel-selection>div').show()
        }
    })
})


//С��
$('body').on('click', '.group', function() {
    $('.pigaizuoye').hide()
    $('.pigaizuoye:nth-of-type(' + $(this).attr("num") + ')').show()
    $(this).parent().nextAll().hide()
})

//������ҵ����
$('body').on('click', '.correction_pg', function() {
    $('.manageAdmin-wrap').hide()
    $('.work-correction').show()
    $('.work-correction .pigaizuoye').show()
    return false;
})
$('body').on('click', '.work-correction>button', function() {
    $('.manageAdmin-wrap').show()
    $('.work-correction').hide()
    return false;
})

//С������
$('body').click(function() {
    $('.Group-search>span ul').hide()
})
$('body').on('click', '.Group-search>span', function() {

    if($(this).find('ul').css('display')!='block') {
        $('.Group-search>span ul').hide()
        $(this).find('ul').show()
    } else {
        $('.Group-search>span ul').hide()
    }
    return false
})
$('body').on('click','.Group-search>span ul>li',function(){
    $(this).parent().parent().prevAll('.member').text($(this).text())
})

//С����ҵ����
$('body').on('click', '.Group', function() {
    $('.manageAdmin-wrap').hide()
    $('.Group-correction').show()
    $('.Group-correction .pigaizuoye').show()
    return false;
})
$('body').on('click', '.Group-correction>button', function() {
    $('.manageAdmin-wrap').show()
    $('.Group-correction').hide()
    return false;
})

//�鿴
$('body').on('click','.see',function(){
    window.location.href='jobView.html'
})

//����
$('body').on('click','.issuance',function(){
    $('.estate>span').attr('class', '');
    $('.estate>span:first-child').attr('class', 'blue last');
    $('.pigaizuoye,.Panel-selection>div').hide();
    $('.group').attr('class','entirely group').next().attr('class','')
    $('.pigaizuoye:nth-of-type(3),.Panel-selection,.Panel-selection>div:first-child').show()
})
