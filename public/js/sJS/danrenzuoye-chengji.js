$(function(){
	//点亮顶部导航和左侧导航栏对应项
    $(".head_nav>li:nth-child(2)>a, .head_nav>li:last-child>a").addClass("blue");
    $("#nav1>li:first-child>a").addClass("box");
    var course = sessionStorage.getItem("inCourse-course");
    if(course) {
        $("#col").text(course);
    }
    $("#cent_nav ul>li").each(function(){
        if($(this).text() === course) {
            $("#cent_nav ul>li").removeClass("offt");
            $(this).addClass("offt");
        }
    });

	const id = sessionStorage.getItem("homeworkId");
	$.get("/showScore/" + id).success(function(data){
		var data = JSON.parse(data);
		console.log(data);
		
		$(".objective-grade, .objective-box .circle").text(data.objective.score);  //客观题总分
		$(".positive-grade").text(data.subjective.score);    //主观题总分
		$(".sum-grade").text(data.score);    //综合得分
		$(".objective-total").text(data.objective.total);
		$(".positive-total").text(data.subjective.total);

/*
		var objective = "";
		var subjective = "";
		for(var key in data.objective) {
				if(key!=="cate" && key!=="score") {
					objective += '<div class="row count2">\
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>\
                                    <div class="ta-r col-lg-4 col-md-4 col-sm-4 col-xs-4">' + data.objective[key].cate + '</div>\
                                    <div class="ta-c col-lg-3 col-md-3 col-sm-3 col-xs-3">得分：<span\
                                        class="q-select-grade">' + data.objective[key].score + '</span>分\
                                    </div>\
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>\
                                </div>';
				}
		}

		for(var kw in data.subjective) {
			if(key!=="cate" && key!=="score") {
				subjective += '<div class="row count2">\
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>\
                                    <div class="ta-r col-lg-4 col-md-4 col-sm-4 col-xs-4">' + data.subjective[key].cate + '</div>\
                                    <div class="ta-c col-lg-3 col-md-3 col-sm-3 col-xs-3">得分：<span\
                                        class="q-select-grade">' + data.subjective[key].score + '</span>分\
                                    </div>\
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>\
                                </div>';
			}
		}


		$(".objective-box").html(objective);
		$(".subjective").html(subjective);
		*/
	});
})