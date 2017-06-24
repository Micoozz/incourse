$(function(){
	//点亮顶部导航和左侧导航栏对应项
    $(".head_nav>li:nth-child(2)>a, .head_nav>li:last-child>a").addClass("blue");
    $("#nav1>li:first-child>a").addClass("box");

	
	const id = sessionStorage.getItem("homeworkId");
	var lxt_options = 0;  //保存连线题的对数

	$.ajax({
		type: "GET",
		url: "showWorkObjectiveDetail/" + id,
        async: false,
        success: function(data){
		var data = JSON.parse(data);
		console.log(data)

		var html = "";
		var px_index = ["①","②","③","④","⑤","⑥","⑦","⑧","⑨","⑩"];   //排序题序号
		for(var key in data) {
			var child = data[key];
			if(child.cate_title === "单选题") {
				var dx_options = "";
				child.options.forEach(function(item){
					for(var key in item) {
						dx_options += '<div class="radio">\
                                        <label>\
                                            <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect"/><span\
                                                    class="select-wrapper"></span>' + key + '.\
                                            <span class="question-content">' + item[key] + '</span>\
                                        </label>\
                                    </div>';
					}
				});

				html += '<div class="homework-content">\
                                <p class="question-head">\
                                    <span class="order">' + (parseInt(key)+1) + '.</span>单选题：' + child.subject + '\
                                </p>\
                                <form class="select" id="myForm">' + dx_options + '</form>\
                                <div class="line"></div>\
                                <div class="question-foot">\
                                    <div>你的答案：<span class="' + (child.answer[0].user_answer===child.answer[0].standard ? "correctAnswer" : "falseAnswer") + '">' + child.answer[0].user_answer + '</span></div>\
                                    <div>正确答案：<span class="correctAnswer">' + child.answer[0].standard + '</span></div>\
                                </div>\
                            </div>';
			}else if(child.cate_title === "填空题") {
				var tk_myAnswer = "";
				var tk_correctAnswer = "";
				child.answer[0].user_answer.forEach(function(item,i){
					tk_myAnswer += '<span class="' + (item===child.answer[0].standard[i] ? "correctAnswer" : "falseAnswer") + '">' + item + '</span>';
				});
				child.answer[0].standard.forEach(function(item){
					tk_correctAnswer += '<span class="correctAnswer">' + item + '</span>';
				});

				html += '<div class="homework-content">\
                                <p class="question-head">\
			                        <span class="order">' + (parseInt(key)+1) + '.</span>\
                                    填空题：' + tkChange(child.subject).data + '\
                                </p>\
                                <div class="line"></div>\
                                <div class="question-foot">\
                                    <span>你的答案：</span>\
                                    <span class="questionBlankAnswerWrap">' + tk_myAnswer + '</span>\
                                    <div>正确答案：' + tk_correctAnswer + '</div>\
                                </div>\
                            </div>';
			}else if(child.cate_title === "多选题") {
				var dux_options = "";
				child.options.forEach(function(item){
					for(var key in item) {
						dux_options += '<div class="radio">\
                                        <label>\
                                            <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect"/><span\
                                                    class="select-wrapper"></span>' + key + '.\
                                            <span class="question-content">' + item[key] + '</span>\
                                        </label>\
                                    </div>';
					}
				});
				var dux_myAnswer = [];
				var tk_correctAnswer = [];
				child.answer.forEach(function(item){
					dux_myAnswer.push(item.user_answer);
					tk_correctAnswer.push(item.standard);
				});

				html += '<div class="homework-content">\
                                <p class="question-head">\
			                        <span class="order">' + (parseInt(key)+1) + '.</span>\
                                    多选题：' + child.subject + '\
                                </p>\
                                <form class="select" id="myForm">' + dux_options + '</form>\
                                <div class="line"></div>\
                                <div class="question-foot">\
                                    <div>你的答案：<span class="' + (dux_myAnswer.join("")===tk_correctAnswer.join("") ? "correctAnswer" : "falseAnswer") + '">' + dux_myAnswer.join(",") + '</span></div>\
                                    <div>正确答案：<span class="correctAnswer">' + tk_correctAnswer.join(",") + '</span></div>\
                                </div>\
                            </div>';
			}else if(child.cate_title === "判断题") {
				var pd_myAnswer = child.answer[0].user_answer[0] === "1" ? "对" : "错";
				var pd_correctAnswer = child.answer[0].standard[0] === "1" ? "对" : "错";

				html += '<div class="homework-content">\
                                <p class="question-head">\
                                    <span class="order">' + (parseInt(key)+1) + '.</span>\
                                    判断题：' + child.subject + '\
                                </p>\
                                <div class="line"></div>\
                                <div class="question-foot" style="margin-top: 5px;">\
                                    <div>你的答案：<span class="' + (pd_myAnswer === pd_correctAnswer ? "correctAnswer" : "falseAnswer") + '">' + pd_myAnswer + '</span></div>\
                                    <div>正确答案：<span class="correctAnswer">' + pd_correctAnswer + '</span></div>\
                                </div>\
                            </div>';
			}else if(child.cate_title === "排序题") {
				var px_options = "";
				child.options.forEach(function(item,i){
					for(var key in item) {
						px_options += px_index[i] + item[key] + (i === child.options.length-1 ? "" : "<br/>");
					}
				});
				var px_myAnswer = child.answer[0].user_answer.join(",");
				var px_correctAnswer = child.answer[0].standard.join(",");

				html += '<div class="homework-content">\
                                <p class="question-head">\
			                        <span class="order">' + (parseInt(key)+1) + '.</span>\
                                    排序题：' + child.subject + '\
                                <div class="questionOrderContent">' + px_options + '</div>\
                                </p>\
                                <div class="line"></div>\
                                <div class="question-foot">\
                                    <div>你的答案：\
                                        <span class="' + (px_myAnswer === "1,2,3,4" ? "correctAnswer" : "answer-users" ) +'">' + px_myAnswer + '</span>\
                                    </div>\
                                    <div>正确答案：<span class="correctAnswer">' + px_correctAnswer + '1,2,3,4</span></div>\
                                </div>\
                            </div>';
			}else if(child.cate_title === "连线题") {
				lxt_options = child.options.length;
				var lxt_myAnswer = child.answer[0].user_answer;
                var lxt_left = "";
                var lxt_right = "";
                const Height = 54;
                child.options.forEach(function(k,i){
                    for(var key in k) {
                        lxt_left += '<li style="top:' + 54*i + 'px;"><span>' + (i+1) + '</span><div>' + k[key] + '</div></li>';
                    }
                });
                child.answer[0].standard.forEach(function(k,i){
                    lxt_right += '<li style="top:' + 54*i + 'px;"><span>' + (i+1) + '</span><div>' + k + '</div></li>';
                });

				html += '<div class="homework-content">\
                                <p class="question-head">\
                                    <span class="order">' + (parseInt(key)+1) + '.</span>\
                                    连线题：' + child.subject + '\
                                </p>\
                                <div class="box_hpb">\
                                    <div class="line_hpb">\
                                        <ul class="question_hpb">' + lxt_left + '</ul>\
                                        <div class="container_hpb">\
                                            <canvas id="canvas1" width="368">您的浏览器暂不支持Canvas！</canvas>\
                                            <canvas id="canvas2" width="368">您的浏览器暂不支持Canvas！</canvas>\
                                        </div>\
                                        <ul class="answer_hpb">' + lxt_right + '</ul>\
                                    </div>\
                                </div>\
                                <div class="line"></div>\
                                <div class="question-foot" style="margin-top: 5px;">\
                                    <div>你的答案：<span class="' + (lxt_myAnswer.join(", ") ==="1:1, 2:2, 3:3" ? "correctAnswer" : "falseAnswer") + '">' + lxt_myAnswer.join(", ") + '</span></div>\
                                    <div>正确答案：<span class="correctAnswer">1:1, 2:2, 3:3</span></div>\
                                </div>\
                            </div>';
			}else if(child.cate_title === "综合题") {
				html += '';
			}
		}

		$("#cQuestion").html(html);
	}
	});

	
	lianXianTiFunc(lxt_options);

	function lianXianTiFunc(n){
		var dist={
            liHeight:38, //保存每个LI的高度
            borderWidth:1,  //保存每个LI的边框宽度
            marginBottom:14, //保存每个LI的下外边距
            y1:0,   //保存第一个LI的y坐标
            D:0,     //保存每个LI y坐标之间相差的距离
            canvasW:368,  //保存canvas的宽度
            canvasH:0,   //保存canvas的高度
            question:[],    //保存问题的坐标数据
            answer:[]       //保存答案的坐标数据
        }

        dist.y1=dist.borderWidth+dist.liHeight/2;
        dist.D=dist.liHeight+2*dist.borderWidth+dist.marginBottom;
        trends();
        //动态设置Canvas高度和生成数据
        function trends(){
            dist.canvasH = (dist.liHeight + 2*dist.borderWidth + dist.marginBottom) * n - dist.marginBottom;
            $(".question_hpb, .answer_hpb").height(dist.canvasH);
            $(".container_hpb>canvas").attr("height",dist.canvasH);
        }

        //字数超过6个的LI被hover时的效果
        $(".question_hpb>li>div, .answer_hpb>li>div").hover(function(){
            if($(this).text().length >= 6) {
                $(this).addClass("active");
            }
        },function(){
            $(this).removeClass("active");
        });
	}
})