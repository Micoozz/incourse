var restract = function(option) {
    var $position = option.wrap;
    var $toRestract = option.toRestract;
    var flag = option.flag;
    $position.bind("click", function() {
        $toRestract.slideToggle();
        if (flag) {
            $position.html('展开' + '<span class="caret"></span>')
            flag = false;
        } else {
            $position.html('收起' + '<span class="caret"></span>')
            flag = true;
        }
    });
};
$(function() {
    restract({
        wrap: $('#info_retract'),
        toRestract: $('#stu_info'),
        flag: true
    });
    restract({
        wrap: $('#eval_retract'),
        toRestract: $('#stu_eval'),
        flag: false
    });
    restract({
        wrap: $('#pos_retract'),
        toRestract: $('#stu_pos'),
        flag: false
    });
    restract({
        wrap: $('#pos_retract'),
        toRestract: $('#stu_pos1'),
        flag: false
    });
    restract({
        wrap: $('#family_retract'),
        toRestract: $('#family_pos'),
        flag: false
    });
});
