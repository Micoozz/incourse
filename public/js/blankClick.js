$(function(){
    $("body").click(function(event) {
        //console.log(event.target);

        //����հ׹ر�����������
        if(!$(event.target).hasClass("ic-text") && !$(event.target).parent().hasClass("ic-text")){
            $(".select-action-box .select-form .ic-text .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
            $(".select-action-box .select-form .lists").hide();
        }

        //����հ׹رն�̬����������
        if(!$(event.target).hasClass("ic-text-exer") && !$(event.target).parent().hasClass("ic-text-exer")){
            $(".select-action-box .select-form .ic-text-exer .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
            $(".select-action-box .select-form .lists-exer").hide();
        }
    });
})
