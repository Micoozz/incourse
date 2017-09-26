
var typeString = ["单选题","多选题","填空题","判断题","连线题","排序题","完形填空","画图题","计算题","简答题","解答题","听力题","阅读题","作文题","综合题"];

/***************** 出题 *******************/
$(function () {
    /*单选题选中*/
    $("body").on("click", ".dan-xuan-only .ic-radio", function (event) {
        event.preventDefault();
       
        if($(this).attr('class')!='ic-radio border p-r f-l active'){
        	$(this).parents(".dan-xuan-options").find(".ic-radio").removeClass("active");
			$(this).addClass("active");
			$(this).children("input").prop("checked",true);
        }else{
        	$(this).removeClass("active");
        	$(this).children("input").prop("checked",false);
        }
        
		
    });

    /*多选题选中*/
    $("body").on("click", ".duo-xuan-only .ic-radio", function (event) {
        event.preventDefault();
        $(this).toggleClass("active");
    });

    /*动态生成的三级联动*/
    $("body").on("click", ".exercise-box .select-form .ic-text-exer", function () {
        var is_collapse = $(this).children(".fa").hasClass("fa-angle-down");
        $(".select-action-box .select-form .ic-text-exer .fa").removeClass("fa-angle-up").addClass("fa-angle-down");
        $(".select-action-box .select-form .lists-exer").hide();

        if (is_collapse) {
            $(this).children(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");
            $(this).next("ul").show();
        } else {
            $(this).children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
            $(this).next("ul").hide();
        }
    });
    $("body").on("click", ".exercise-box .select-form .lists-exer>li", function () {
        var $p = $(this).parent().prev();
        $p.children("span").text($(this).text());
        $p.children(".fa").toggleClass("fa-angle-down fa-angle-up");
        $p.next("ul").toggle();
    });

	//删除每道题
	$("body").on("click",".admin-container .type .ic-close-icon",function(){
		$(this).parent(".type").parent(".exercise").remove();
	});
});


/*选中题型*/
$(function () {
    /****问题****/
    //一般问题
    var common_Q = '<div class="question clear">\
		<span class="f-l fs14">问题：</span>\
	<div class="ic-editor border f-l">\
	<div class="tools clear">\
	<button class="f-l p-r of-h addFileTool">\
	<i class="tool"></i>\
	<span>添加附件</span>\
	<input class="addFile" type="file" />\
	</button>\
	<b class="vertical-line f-l"></b>\
	<button class="f-l blank d-n">\
	<i class="tool"></i>\
	<span>插入空格</span>\
	</button>\
	<button class="f-l dotted">\
	<i class="tool"></i>\
	<span>下标点</span>\
	</button>\
	<button class="f-l up-dotted">\
	   <i class="tool"></i>\
	   <span>上标点</span>\
	</button>\
	<button class="f-l underline">\
	<i class="tool"></i>\
	<span>下划线</span>\
	</button>\
	</div>\
	<div class="editor-content" contenteditable="true"></div>\
	</div>\
	</div>';

    //听力题问题
    var ting_li_Q = '<div class="question clear">\
	<p class="fs14 text">根据听力，回答问题</p>\
	<div class="listen">\
	<p>\
	<span class="fs14">听力：</span>\
	<button class="p-r of-h ic-blue addFileTool">\
	<i class="tool"></i>\
	<span>添加附件</span>\
	<input class="addFile" type="file" />\
	</button>\
	</p>\
	<div class="mp3-box"></div>\
	</div>\
	</div>';

    //阅读题问题
    var yue_du_Q = '<div class="question clear">\
	<span class="f-l fs14">正文：</span>\
	<div class="ic-editor border f-l">\
	<div class="tools clear">\
	<button class="f-l p-r of-h addFileTool">\
	<i class="tool"></i>\
	<span>添加附件</span>\
	<input class="addFile" type="file" />\
	</button>\
	<b class="vertical-line f-l"></b>\
	<button class="f-l blank">\
	<i class="tool"></i>\
	<span>插入空格</span>\
	</button>\
	<button class="f-l dotted">\
	<i class="tool"></i>\
	<span>下标点</span>\
	</button>\
	<button class="f-l up-dotted">\
		<i class="tool"></i>\
	<span>上标点</span>\
	</button>\
	<button class="f-l underline">\
	<i class="tool"></i>\
	<span>下划线</span>\
	</button>\
	</div>\
	<div class="editor-content" contenteditable="true"></div>\
	</div>\
	</div>';


    /****答案****/
    var dan_xuan = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l">\
				<div class="dan-xuan">\
                        <div class="dan-xuan-options dan-xuan-only"></div>\
    					<span class="addOptionBtn addXzOptionBtn c-d ic-blue">\
    						<i class="uploadExerIcons"></i>\
    						<span>添加选项</span>\
    					</span>\
    				</div>\
	</div>';

    var duo_xuan = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l">\
		<div class="duo-xuan">\
						<div class="dan-xuan-options duo-xuan-only"></div>\
							<span class="addOptionBtn addXzOptionBtn c-d ic-blue">\
								<i class="uploadExerIcons"></i>\
								<span>添加选项</span>\
					</div>\
					</div>';

    var duo_kong = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l">\
		<div class="duo-kong" data-num="0"></div>\
		</div>';

    var pan_duan = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l"><div class="pan-duan no-active">\
						<i class="uploadExerIcons right"></i>\
						<i class="uploadExerIcons wrong"></i>\
					</div></div>';

    var lian_xian = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l"><div class="lian-xian">\
						<div class="lian-xian-options"></div>\
							<span class="addOptionBtn addLxOptionBtn c-d ic-blue">\
								<i class="uploadExerIcons"></i>\
								<span>添加选项</span>\
							</span>\
						</div></div>';

    var pai_xu = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l"><div class="pai-xu">\
					<div class="pai-xu-options"></div>\
						<span class="addOptionBtn addPxOptionBtn c-d ic-blue">\
							<i class="uploadExerIcons"></i>\
							<span>添加选项</span>\
						</span>\
					</div></div>';

    var wan_xing_tk = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l"><div class="wan-xing-tk">\
							<div class="wan-xing-tk-only" data-num="0"></div>\
						</div></div>';

    var jian_da = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l"><div class="jian-da">\
                        <div class="ic-editor border">\
                            <div class="tools clear">\
                                <div class="f-l p-r of-h addFileTool">\
                                     <i class="tool"></i>\
                                    <span>添加附件</span>\
                                    <input class="addFile" type="file" />\
                                </div>\
                            </div>\
                            <div class="editor-content" contenteditable="true"></div>\
                        </div>\
                    </div></div>';

    var zuo_wen = '<span class="f-l fs14">答案：</span>\
		<div class="answer-box f-l"><div class="zuo-wen">略</div></div>';

    var ting_li = '<div class="mul-answer-box"></div>\
		<button class="addExerBtn addChildExer ic-blue c-d">\
	<i class="uploadExerIcons"></i>\
	<span>添加子题目</span>\
	</button>';

    var yue_du = '<div class="mul-answer-box"></div>\
		<button class="addExerBtn addChildExer ic-blue c-d">\
	<i class="uploadExerIcons"></i>\
	<span>添加子题目</span>\
	</button>';


    $("body").on("click", ".exercise-box .type .lists-exer>li", function () {
        var text = $(this).text();
        console.log(text);

		//问题
		if(text === "听力题"){
			$(this).parents(".select-action-box").siblings(".question-box").html(ting_li_Q);
		}else if(text === "阅读题" || text === "综合题"){
			$(this).parents(".select-action-box").siblings(".question-box").html(yue_du_Q);
		}else {
			$(this).parents(".select-action-box").siblings(".question-box").html(common_Q);
			if(text === "填空题" || text === "完形填空"){
				$(this).parents(".select-action-box").siblings(".question-box").find(".blank").show();
			}
		}

		//答案
		if (text === "单选题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(dan_xuan);
		} else if (text === "多选题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(duo_xuan);
		} else if (text === "填空题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(duo_kong);
		} else if (text === "判断题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(pan_duan);
		} else if (text === "连线题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(lian_xian);
		} else if (text === "排序题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(pai_xu);
		} else if (text === "完形填空") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(wan_xing_tk);
		} else if (text === "简答题" || text === "画图题" || text === "解答题" || text === "计算题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(jian_da);
		} else if (text === "作文题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(zuo_wen);
		} else if (text === "听力题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(ting_li);
		} else if (text === "阅读题" || text === "综合题") {
			$(this).parents(".select-action-box").siblings(".answer-wrap").html(yue_du);
		}
    });

	
	
	

	//编辑题的基本框架
	var editorHtml = '<div class="exercise">\
            <div class="type select-action-box p-r fs14">\
                <span class="f-l">题型：</span>\
                <span class="ic-text-exer">\
                	<span class="editor-type">1</span>\
                </span>\
                <i class="common-icon ic-close-icon p-a"></i>\
            </div>\
            <div class="question-box"></div>\
            <div class="answer-wrap clear"></div>\
        </div>';


	/*"我上传的"里的“编辑”功能*/
	$("body").on("click",".myUpload .editor-icon",function(){
		$(".ic-modal").show();
		$.ajax({
			type: "get",
			url: "template/editorExerPage.html",
			async: false,
			cache: false,
			success: function(data){
				$(".exer-room").append(data);
				$(".hw-list").css("z-index","180");
			}
		});

		var exerId = $(this).parents(".exer-in-list").attr("data-id");
		
		//测试数据
		var a = {
		"answer": [{"answer": ["a","b"],"categroy": 3,"option": [],"subject": "1111"}],
		"categroy": 12,
		"option": [],
		"material": [[{"name":"Jim","size":1024}]],
		"subject": '111<span class="blank-item" contenteditable="false">空1</span>&nbsp;111<span class="blank-item" contenteditable="false">空2</span>&nbsp;'
		};
		
		editorExer(a);
	});


	/*编辑题目调用的函数*/
	function editorExer(obj) { 
		//["单选题1","多选题2","填空题3","判断题4","连线题5","排序题6","完形填空7","画图题8","计算题9","简答题10","解答题11","听力题12","阅读题13","作文题14","综合题15"];
		var typeNum = Number(obj.categroy);
		
		$($(".editor-type")[$(".editor-type").length-1]).text(typeString[typeNum-1]);
		var queBox = $($(".editorExerModal .question-box")[$(".editorExerModal .question-box").length-1]);
		var ansBox = $($(".editorExerModal .answer-wrap")[$(".editorExerModal .answer-wrap").length-1]);
		
		//问题显示
		if(typeNum===12){
			queBox.html(ting_li_Q);
			ansBox.html(ting_li);
			
			var files = obj.material[0];
			var size = (files[0].size / 1024 / 1024).toFixed(2);
			$(".editorExerModal .listen .mp3-box").addClass("border").append('<div>\
					<i class="uploadExerIcons p-r"></i>\
					<input class="p-a audio-child" type="file"/>\
					<span class="gray">听力  <span class="audio-name">' + files[0].name + '</span> ' + size + 'M </span>\
					<button class="f-r ic-blue delete">删除</button>\
				</div>');
			
			obj.answer.forEach(function(item,i){
				$(".editorExerModal .mul-answer-box").append(editorHtml);
				editorExer(item);
			});
		}else if(typeNum===13 || typeNum===15){
			queBox.html(yue_du_Q);
			ansBox.html(yue_du);
			
			$(".editorExerModal .editor-content").html(obj.subject);
			obj.answer.forEach(function(item,i){
				$(".editorExerModal .mul-answer-box").append(editorHtml);
				editorExer(item);
			});
		}else {
			queBox.html(common_Q);
			if(typeNum===3 || typeNum===7){
				$($(".editorExerModal .ic-editor .blank")[$(".editorExerModal .ic-editor .blank").length-1]).show();
			}
			$($(".editorExerModal .editor-content")[$(".editorExerModal .editor-content").length-1]).html(obj.subject);
		}

		//答案显示
		var html = "", letter;
		if(typeNum===1){
			ansBox.html(dan_xuan);
			
			obj.option.forEach(function(item,i){
				letter = String.fromCharCode(65 + i);
				html += '<div class="radio-wrap dan-xuan-option">\
																<label class="ic-radio border p-r' + (Number(obj.answer)===i ? ' active' : '') + '">\
																	<i class="ic-blue-bg p-a"></i>\
																	<input type="radio" name="radio" value="' + letter + '"/>\
																</label>\
																<div class="radio-ipt p-r">\
																	<span class="p-a">' + letter + '：</span>\
																	<input class="ic-input" type="text" value="' + item + '"/>\
																</div>\
																<i class="delete uploadExerIcons"></i>\
															</div>';
			});
			$($(".editorExerModal .dan-xuan-only")[$(".editorExerModal .dan-xuan-only").length-1]).html(html);
		}else if(typeNum===2){
			ansBox.html(duo_xuan);
			
			obj.option.forEach(function(item,i){
				letter = String.fromCharCode(65 + i);
				html += '<div class="radio-wrap dan-xuan-option">\
																<label class="ic-radio border p-r' + (obj.answer.indexOf(i+'')!==-1 ? ' active' : '') + '">\
																	<i class="ic-blue-bg p-a"></i>\
																	<input type="radio" name="radio" value="' + letter + '"/>\
																</label>\
																<div class="radio-ipt p-r">\
																	<span class="p-a">' + letter + '：</span>\
																	<input class="ic-input" type="text" value="' + item + '"/>\
																</div>\
																<i class="delete uploadExerIcons"></i>\
															</div>';
			});
			$($(".editorExerModal .duo-xuan-only")[$(".editorExerModal .duo-xuan-only").length-1]).html(html);
		}else if(typeNum===3){
			ansBox.html(duo_kong);

			obj.answer.forEach(function(item,i){
				html += '<div class="blank-answer p-r">\
 					<span>答案' + (i+1) + '：</span>\
 					<input type="text" value="' + item + '"/>\
 				</div>';
			});
			$($(".editorExerModal .duo-kong")[$(".editorExerModal .duo-kong").length-1]).html(html);
		}else if(typeNum===4){
			ansBox.html(pan_duan);
			if(obj.answer==="正确"){
				$($(".editorExerModal .pan-duan")[$(".editorExerModal .pan-duan").length-1]).addClass("rightActive");
			}else {
				$($(".editorExerModal .pan-duan")[$(".editorExerModal .pan-duan").length-1]).addClass("wrongActive");
			}
		}else if(typeNum===5){
			ansBox.html(lian_xian);

			obj.option[0].forEach(function(item,i){
				html += '<div class="lian-xian-option">\
								<input class="ic-input" type="text" value="' + item + '"/>\
								<input class="ic-input" type="text" value="' + obj.option[1][i] + '"/>\
								<i class="uploadExerIcons delete p-r"></i>\
							</div>';
			});
			$($(".editorExerModal .lian-xian-options")[$(".editorExerModal .lian-xian-options").length-1]).html(html);
		}else if(typeNum===6){
			ansBox.html(pai_xu);

			obj.option.forEach(function(item,i){
				letter = String.fromCharCode(65 + i);
				html += '<div class="radio-wrap pai-xu-option">\
							<div class="radio-ipt p-r">\
								<span class="p-a">排序' + letter + '：</span>\
								<input class="ic-input" type="text" value="' + item + '"/>\
							</div>\
							<i class="delete uploadExerIcons"></i>\
						</div>';
			});
			$($(".editorExerModal .pai-xu-options")[$(".editorExerModal .pai-xu-options").length-1]).html(html);
		}else if(typeNum===7){
			ansBox.html(wan_xing_tk);

			obj.option.forEach(function(item,i){
				var options = "";
				item.forEach(function(n,j){
					letter = String.fromCharCode(65 + j);
					options += '<div class="radio-wrap">\
									<label class="ic-radio border p-r' + (Number(obj.answer[i])===j ? ' active' : '') + '">\
										<i class="ic-blue-bg p-a"></i>\
										<input type="radio" name="radio' + (i+1) + '" value="' + letter + '"/>\
									</label>\
									<div class="radio-ipt p-r">\
										<span class="p-a">' + letter + '：</span>\
										<input class="ic-input" type="text" value="' + n + '"/>\
									</div>\
								</div>';
				});
				html += '<div class="wan-xing-tk-option clear">\
								<span class="f-l id">' + (i+1) + '.</span>\
								<div class="f-l wan-xing-tk-box dan-xuan-options dan-xuan-only">' + options + '</div>\
							</div>';
			});
			$($(".editorExerModal .wan-xing-tk-only")[$(".editorExerModal .wan-xing-tk-only").length-1]).html(html).attr("data-num",obj.option.length);
		}else if(typeNum===8 || typeNum===9 || typeNum===10 || typeNum===11){
			ansBox.html(jian_da);
			
			$($(".editorExerModal .jian-da .editor-content")[$(".editorExerModal .jian-da .editor-content").length-1]).html(obj.answer);
		}else if(typeNum===14){
			ansBox.html(zuo_wen);
		}
	}
});



/*单选题*/
$(function () {
    //添加选项
    $("body").on("click", ".addXzOptionBtn", function () {
        var len = $(this).prev(".dan-xuan-options").children(".dan-xuan-option").length;
        var letter = String.fromCharCode(65 + len);

        $(this).prev(".dan-xuan-options").append('<div class="radio-wrap dan-xuan-option">\
																<label class="ic-radio border p-r">\
																	<i class="ic-blue-bg p-a"></i>\
																	<input type="radio" name="radio" value="' + letter + '"/>\
																</label>\
																<div class="radio-ipt p-r">\
																	<span class="p-a">' + letter + '：</span>\
																	<input class="ic-input" type="text" />\
																</div>\
																<i class="delete uploadExerIcons"></i>\
															</div>');
    });

    //删除选项
    $("body").on("click", ".dan-xuan-option .delete", function () {
        var num = $(this).prev(".radio-ipt").children("span").text().slice(0, 1).charCodeAt();
        $(this).parents(".radio-wrap").nextAll().each(function (i, item) {
            $(item).children(".radio-ipt").children("span").text(String.fromCharCode(num) + "：");
            num++;
        });
        $(this).parent(".radio-wrap").remove();
    });
});

/*排序题*/
$(function () {
    //添加选项
    $("body").on("click", ".pai-xu .addPxOptionBtn", function () {
        var len = $(this).prev(".pai-xu-options").children(".pai-xu-option").length;
        var letter = String.fromCharCode(65 + len);

        $(this).prev(".pai-xu-options").append('<div class="radio-wrap pai-xu-option">\
																<div class="radio-ipt p-r">\
																	<span class="p-a">排序' + letter + '：</span>\
																	<input class="ic-input" type="text" />\
																</div>\
																<i class="delete uploadExerIcons"></i>\
															</div>');
    });

    //删除选项
    $("body").on("click", ".pai-xu-option .delete", function () {
        var num = $(this).prev(".radio-ipt").children("span").text().slice(2, 3).charCodeAt();
        $(this).parents(".radio-wrap").nextAll().each(function (i, item) {
            $(item).children(".radio-ipt").children("span").text("排序" + String.fromCharCode(num) + "：");
            num++;
        });
        $(this).parent(".radio-wrap").remove();
    });
})


/*填空题,多空题,完形填空*/
$(function () {
    //插入空格
    $("body").on("click", ".exercise .blank", function () {
        $(this).parents(".ic-editor").children(".editor-content").focus();
        var initNum = $(this).parents(".ic-editor").find(".editor-content .blank-item").length + 1;
        document.execCommand("insertHTML", "false", '<span class="blank-item">空' + initNum + '</span>&nbsp;');
        $(this).parents(".ic-editor").find(".blank-item").attr("contenteditable", false);

        //获取题型
        var type = $(this).parents(".question-box").prev(".type").find(".ic-text-exer span").text();
        if (type === "完形填空") {
			//var options = "";

            var html_dom = '<div class="wan-xing-tk-option clear">\
																<span class="f-l id">' + initNum + '.</span>\
																<div class="f-l wan-xing-tk-box dan-xuan-options dan-xuan-only">\
																	<div class="radio-wrap">\
																		<label class="ic-radio border p-r">\
																			<i class="ic-blue-bg p-a"></i>\
																			<input type="radio" name="radio' + initNum + '" value="A"/>\
																		</label>\
																		<div class="radio-ipt p-r">\
																			<span class="p-a">A：</span>\
																			<input class="ic-input" type="text" />\
																		</div>\
																	</div>\
																	<div class="radio-wrap">\
																		<label class="ic-radio border p-r">\
																			<i class="ic-blue-bg p-a"></i>\
																			<input type="radio" name="radio' + initNum + '" value="B"/>\
																		</label>\
																		<div class="radio-ipt p-r">\
																			<span class="p-a">B：</span>\
																			<input class="ic-input" type="text" />\
																		</div>\
																	</div>\
																	<div class="radio-wrap">\
																		<label class="ic-radio border p-r">\
																			<i class="ic-blue-bg p-a"></i>\
																			<input type="radio" name="radio' + initNum + '" value="C"/>\
																		</label>\
																		<div class="radio-ipt p-r">\
																			<span class="p-a">C：</span>\
																			<input class="ic-input" type="text" />\
																		</div>\
																	</div>\
																	<div class="radio-wrap">\
																		<label class="ic-radio border p-r">\
																			<i class="ic-blue-bg p-a"></i>\
																			<input type="radio" name="radio' + initNum + '" value="D"/>\
																		</label>\
																		<div class="radio-ipt p-r">\
																			<span class="p-a">D：</span>\
																			<input class="ic-input" type="text" />\
																		</div>\
																	</div>\
																</div>\
															</div>';
														
            var wan_xing_tk_dom = $(this).parents(".question-box").next(".answer-wrap").find(".wan-xing-tk-only");
            wan_xing_tk_dom.append(html_dom);
            wan_xing_tk_dom.attr("data-num", Number(wan_xing_tk_dom.attr("data-num")) + 1);
        } else {
            var duo_kong_dom = $(this).parents(".question-box").next(".answer-wrap").find(".duo-kong");
            duo_kong_dom.append('<div class="blank-answer p-r">\
 					<span>答案' + initNum + '：</span>\
 					<input type="text"/>\
 				</div>');

            duo_kong_dom.attr("data-num", Number(duo_kong_dom.attr("data-num")) + 1);
        }
    });

    //删除空格时删除答案
    $("body").on("keyup", ".exercise .editor-content", function (event) {
        var blank_len = $(this).find(".blank-item").length;
        $(this).find(".blank-item").each(function (i, item) {
            $(item).text("空" + (i + 1));
        });
        var html = "";

        //获取题型
        var type = $(this).parents(".question-box").prev(".type").find(".ic-text-exer span").text();
        if (type === "完形填空") {
            var wan_xing_tk_dom = $(this).parents(".question-box").next(".answer-wrap").find(".wan-xing-tk-only");
            if ((event.keyCode === 8) && (blank_len < Number(wan_xing_tk_dom.attr("data-num")))) {
                wan_xing_tk_dom.attr("data-num", blank_len);
                for (var i = 0; i < blank_len; i++) {
                    html += '<div class="wan-xing-tk-option clear">\
				<span class="f-l id">' + (i + 1) + '.</span>\
				<div class="f-l wan-xing-tk-box dan-xuan-options dan-xuan-only">\
				<div class="radio-wrap">\
				<label class="ic-radio border p-r">\
				<i class="ic-blue-bg p-a"></i>\
				<input type="radio" name="radio' + (i + 1) + '" value="A"/>\
				</label>\
				<div class="radio-ipt p-r">\
				<span class="p-a">A：</span>\
				<input class="ic-input" type="text" />\
				</div>\
				</div>\
				<div class="radio-wrap">\
				<label class="ic-radio border p-r">\
				<i class="ic-blue-bg p-a"></i>\
				<input type="radio" name="radio' + (i + 1) + '" value="B"/>\
				</label>\
				<div class="radio-ipt p-r">\
				<span class="p-a">B：</span>\
				<input class="ic-input" type="text" />\
				</div>\
				</div>\
				<div class="radio-wrap">\
				<label class="ic-radio border p-r">\
				<i class="ic-blue-bg p-a"></i>\
				<input type="radio" name="radio' + (i + 1) + '" value="C"/>\
				</label>\
				<div class="radio-ipt p-r">\
				<span class="p-a">C：</span>\
				<input class="ic-input" type="text" />\
				</div>\
				</div>\
				<div class="radio-wrap">\
				<label class="ic-radio border p-r">\
				<i class="ic-blue-bg p-a"></i>\
				<input type="radio" name="radio' + (i + 1) + '" value="D"/>\
				</label>\
				<div class="radio-ipt p-r">\
				<span class="p-a">D：</span>\
				<input class="ic-input" type="text" />\
				</div>\
				</div>\
				</div>\
				</div>';
                }
                wan_xing_tk_dom.html(html);
            }
        } else {
            var duo_kong_dom = $(this).parents(".question-box").next(".answer-wrap").find(".duo-kong");
            if ((event.keyCode === 8) && (blank_len < Number(duo_kong_dom.attr("data-num")))) {
                duo_kong_dom.attr("data-num", blank_len);
                for (var i = 0; i < blank_len; i++) {
                    html += '<div class="blank-answer p-r">\
 								<span>答案' + (i + 1) + '：</span>\
 								<input type="text"/>\
 						</div>';
                }
                duo_kong_dom.html(html);
            }
        }
    });
})


/*判断题*/
$(function () {
    $("body").on("click", ".answer-box .pan-duan .right", function () {
        $(this).parents(".pan-duan").removeClass("no-active wrongActive").addClass("rightActive");
    });
    $("body").on("click", ".answer-box .pan-duan .wrong", function () {
        $(this).parents(".pan-duan").removeClass("no-active rightActive").addClass("wrongActive");
    });
})

/*连线题*/
$(function () {
    //添加选项
    $("body").on("click", ".lian-xian .addLxOptionBtn", function () {
        $(this).prev(".lian-xian-options").append('<div class="lian-xian-option">\
																<input class="ic-input" type="text" />\
																<input class="ic-input" type="text" />\
																<i class="uploadExerIcons delete p-r"></i>\
															</div>');
    });

    //删除选项
    $("body").on("click", ".lian-xian-option .delete", function () {
        $(this).parent().remove();
    });
})


/*听力题*/
$(function () {
    //添加录音
    $("body").on("change", ".listen .addFile", function () {
        var input = $(this)[0];
        var files = input.files || [];
        if (files.length === 0) {
            return;
        }
        if (!input["value"].match(/\.mp3|\.cd|\.ape|\.wma/i)) {
            return alert("上传的音频格式不正确，请重新选择");
        }
      console.log(files);
//      console.log(files[0].name);
        var size = (files[0].size / 1024 / 1024).toFixed(2);
        $(this).parents(".listen").find(".mp3-box").append('<div>\
															   <i class="uploadExerIcons p-r"></i>\
															   <input class="p-a audio-child" type="file"/>\
															   <span class="gray">听力  <span class="audio-name">' + files[0].name + '</span> ' + size + 'M </span>\
															   <button class="f-r ic-blue delete">删除</button>\
														   </div>');
		$(this).parents(".listen").find(".audio-child").last().get(0).files = files;												   
														   
        $(this).parents(".listen").find(".mp3-box").addClass("border");
//      $(this).val("");
    });

    //删除mp3
    $("body").on("click", ".mp3-box .delete", function () {
        var mp3 = $(this).parents(".mp3-box").children().length;
        if (mp3 === 1) {
            $(this).parents(".mp3-box").removeClass("border");
        }
        $(this).parent().remove();
    });
});

$(function () {
    //默认添加单选题
    var html = '<div class="exercise">\
											<div class="type select-action-box p-r">\
												<span class="f-l fs14">题型：</span>\
												<div class="select-form clear">\
													<div>\
														<p class="ic-text-exer">\
															<span>单选题</span>\
															<i class="fa fa-angle-down"></i>\
														</p>\
														<ul class="lists-exer">\
															<li>单选题</li>\
															<li>多选题</li>\
															<li>填空题</li>\
															<li>判断题</li>\
															<li>连线题</li>\
															<li>排序题</li>\
															<li>完形填空</li>\
															<li>画图题</li>\
															<li>计算题</li>\
															<li>简答题</li>\
															<li>解答题</li>\
															<li>听力题</li>\
															<li>阅读题</li>\
															<li>作文题</li>\
															<li>综合题</li>\
														</ul>\
													</div>\
												</div>\
												<i class="common-icon ic-close-icon p-a"></i>\
											</div>\
											<div class="question-box">\
											<div class="question clear">\
												<span class="f-l fs14">问题：</span>\
												<div class="ic-editor border f-l">\
													<div class="tools clear">\
														<button class="f-l p-r of-h addFileTool">\
															<i class="tool"></i>\
															<span>添加附件</span>\
															<input class="addFile" type="file" />\
														</button>\
														<b class="vertical-line f-l"></b>\
														<button class="f-l blank d-n">\
															<i class="tool"></i>\
															<span>插入空格</span>\
														</button>\
														<button class="f-l dotted">\
														<i class="tool"></i>\
														<span>下标点</span>\
														</button>\
														<button class="f-l up-dotted">\
															<i class="tool"></i>\
															<span>下标点</span>\
														</button>\
														<button class="f-l up-dotted">\
														   <i class="tool"></i>\
														   <span>上标点</span>\
														</button>\
														<button class="f-l underline">\
															<i class="tool"></i>\
															<span>下划线</span>\
														</button>\
													</div>\
													<div class="editor-content" contenteditable="true"></div>\
												</div>\
											</div>\
											</div>\
											<div class="answer-wrap clear">\
												<span class="f-l fs14">答案：</span>\
												<div class="answer-box f-l">\
													<div class="dan-xuan">\
														<div class="dan-xuan-options dan-xuan-only"></div>\
														<span class="addOptionBtn addXzOptionBtn c-d ic-blue">\
															<i class="uploadExerIcons"></i>\
															<span>添加选项</span>\
														</span>\
													</div>\
												</div>\
											</div>\
										</div>';

    //添加题目
	$("body").on("click",".addExerBtn-box .addExerBtn",function () {
		$(".exercise-box").append(html);
	});

    //添加子题目
	$("body").on("click",".exercise .addChildExer",function () {
		$(this).prev(".mul-answer-box").append(html);
	});

	//上传
	$("body").on("click","#upload-btn",function(){
		var allExer = uploadExer();  //保存需要上传的题目
		console.log(allExer.exercise);

		//判断题目是否漏填
		if(isFillFunc(allExer)){
			//向后台发送题目
		}else {
			$(".ic-tip-box").show();
			setTimeout(function(){
				$(".ic-tip-box").fadeOut();
			},1000);
			alert("客观题没填充完整。");
		}
	});
});



//判断题目中有没有漏填的
function isFillFunc(obj){
	//判断科目，年级是否为空
	if(obj.subject==="" || !obj.grade===""){ return false; }
	//判断章节是否为空
	
	for(var i=0; i<obj.chapter.length; i++){
		if(obj.chapter[i]===""){ return false; }
	}

	return exerIsFill(obj.exercise);
}

//["单选题1","多选题2","填空题3","判断题4","连线题5","排序题6","完形填空7","画图题8","计算题9","简答题10","解答题11","听力题12","阅读题13","作文题14","综合题15"];
//判断题目是否为空(主观题可以不上传答案，填空题上传答案是客观题，不上传答案是主观题)
function exerIsFill(arr){
	if(arr.length===0){
		return false;
	}

	for(var i=0; i<arr.length; i++){
		var item = arr[i];
		var categroy = item.categroy;	//保存题型

		if(item.subject===""){ return false; }

		if(categroy===1 || categroy===2 || categroy===6){
			if(item.option.length===0){ return false; }
			item.option.forEach(function(n){
				if(n===""){ return false; }
			});
			if(item.answer===""){ return false; }
		}

		if(categroy===3){
			item.answer.forEach(function(n){
				if(n===""){ return false; }
			});
		}

		if(categroy===4){
			if(item.answer===""){ return false; }
		}

		if(categroy===5){
			if(item.option[0].length===0){ return false; }
			item.option.forEach(function(n){
				n.forEach(function(m){
					if(m===""){ return false; }
				})
			});
			if(item.answer===""){ return false; }
		}

		if(categroy===7){
			if(item.option.length===0){ return false; }
			item.option.forEach(function(n){
				n.forEach(function(m){
					if(m===""){ return false; }
				})
			});
			item.answer.forEach(function(n){
				if(n===""){ return false; }
			});
		}

		if(categroy===12){
			if(item.material.length===0){ return false; }
			exerIsFill(item.answer);
		}

		if(categroy===13 || categroy===15){
			exerIsFill(item.answer);
		}
	}

	return true;
}


//获取所有题目的信息，并赋值给obj.exercise
function getExercises(obj){
	var exer,exer_child,type,arr,str; //保存单题的信息
	$(".exercise-box>.exercise").each(function(i,item){
		type = $(item).children(".type").find(".ic-text-exer>span").text();

		/*
		 //连线题
		 exer = {type": type, "subject": "", "option": [["11","22"],["11","22"]], answer": "" };

		 //听力题
		 exer = {"type": type, "subject": "", "option": [["11","22"],["11","22"]], "answer": [{},{}], "material": []};
		 */

		//最外层题型保存信息
		exer = {
			"categroy": typeString.indexOf(type) + 1,
			"subject": "",
			"option": [],
			"answer": ""
		};

		arr = []; //单题借用的数组
		str = ""; //单题借用的保存答案

		if(type==="单选题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			$(item).find(".answer-box .dan-xuan-option .radio-ipt>input").each(function(i,item){
				exer.option.push($(item).val());
			});
			exer.answer = strToNum($(item).find(".ic-radio.active input").val());
		}else if(type==="多选题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			$(item).find(".answer-box .dan-xuan-option .radio-ipt>input").each(function(i,item){
				exer.option.push($(item).val());
			});
			$(item).find(".radio-wrap .ic-radio.active input").each(function(i,n){
				arr.push(strToNum($(n).val()));
			});
			exer.answer = arr;
		}else if(type==="填空题" || type==="多空题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			$(item).find(".duo-kong .blank-answer>input").each(function(i,n){
				arr.push($(n).val());
			});
			exer.answer = arr;
		}else if(type==="判断题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			exer.answer = $(item).find(".pan-duan").hasClass("rightActive") ? "正确" : $(item).find(".pan-duan").hasClass("wrongActive") ? "错误" : "";
		}else if(type==="连线题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			var right = [];
			$(item).find(".lian-xian-option").each(function(i,n){
				arr.push($(n).children("input").first().val());
				right.push($(n).children("input").last().val());
			});
			exer.option.push(arr);
			exer.option.push(right);
		}else if(type==="排序题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			$(item).find(".pai-xu-option input").each(function(i,n){
				exer.option.push($(n).val());
			});
		}else if(type==="完形填空"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			$(item).find(".wan-xing-tk-option").each(function(i,n){
				var child = [];
				$(n).find(".radio-ipt>input").each(function(j,m){
					child.push($(m).val());
				});
				exer.option.push(child);
			});

			$(item).find(".wan-xing-tk-box").each(function(i,n){
				var answer = $(n).find(".ic-radio.active");
				str = answer.length===0 ? "" : strToNum(answer.children("input").val());
				arr.push(str);
			});
			exer.answer = arr;
		}else if(type==="画图题" || type==="简答题" || type==="解答题" || type==="计算题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			exer.answer = $(item).find(".answer-wrap .editor-content").html();
		}else if(type==="作文题"){
			exer.subject = $(item).find(".question-box .editor-content").html();
			exer.answer = $(item).find(".answer-wrap .zuo-wen").text();
		}else if(type==="听力题" || type==="阅读题" || type==="综合题"){

			if(type==="听力题"){
				exer.subject = $(item).find(".question-box .text").text();
				exer.material = [];
				$(item).find(".question-box .audio-child").each(function(i,n){
					exer.material.push(n.files);
				});
			}else {
				exer.subject = $(item).find(".question-box .editor-content").html();
			}

			//获取子题
			$(item).find(".mul-answer-box .exercise").each(function(i,n){
				//听力题子题只能是单选题，填空题，作文题
				var type_child = $(n).find(".ic-text-exer>span").text();

				//里面子题保存信息
				exer_child = {
					"categroy": typeString.indexOf(type_child) + 1,
					"subject": "",
					"option": [],
					"answer": ""
				};
				var arr_child = []; //多题借用的数组

				if(type_child === "单选题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					$(n).find(".answer-box .dan-xuan-option .radio-ipt>input").each(function(i,n){
						exer_child.option.push($(n).val());
					});
					exer_child.answer = strToNum($(n).find(".ic-radio.active input").val());
				}else if(type_child === "多选题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					$(n).find(".answer-box .dan-xuan-option .radio-ipt>input").each(function(i,n){
						exer_child.option.push($(n).val());
					});
					$(n).find(".radio-wrap .ic-radio.active input").each(function(i,n){
						arr_child.push(strToNum($(n).val()));
					});
					exer_child.answer = arr_child;
				}else if(type_child === "填空题" || type_child === "多空题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					$(n).find(".duo-kong .blank-answer>input").each(function(i,n){
						arr_child.push($(n).val());
					});
					exer_child.answer = arr_child;
				}else if(type_child === "判断题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					exer_child.answer = $(n).find(".pan-duan").hasClass("rightActive") ? "正确" : $(n).find(".pan-duan").hasClass("wrongActive") ? "错误" : "";
				}else if(type_child === "排序题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					$(n).find(".pai-xu-option input").each(function(i,n){
						exer_child.option.push($(n).val());
					});
				}else if(type_child==="画图题" || type_child==="计算题" || type_child === "简答题" || type_child === "解答题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					exer_child.answer = $(n).find(".answer-wrap .editor-content").html();
				}
				else if(type_child === "作文题"){
					exer_child.subject = $(n).find(".question-box .editor-content").html();
					exer_child.answer = $(n).find(".answer-wrap .zuo-wen").text();
				}
				arr.push(exer_child);
			});
			exer.answer = arr;
		}

		obj.exercise.push(exer);
	});
}

//教师上传习题获取所有添加的题目
function uploadExer(){
	//保存所有要保存的数据
	var obj = {
		"subject": "",
		"grade": "",
		"chapter": [],
		"exercise": []
	};

	var subject = $(".filter-box-upload .subject-text").text();
	obj.subject = subject==="选择科目" ? "" : subject;

	var grade = $(".filter-box-upload .grade-text").text();
	obj.grade = grade==="选择年级" ? "" : grade;

	var chapter1 = $(".filter-box-upload .chapter-text").text();
	obj.chapter.push(chapter1==="选择章篇" ? "" : chapter1);

	if($(".filter-box-upload .matter-text")[0]){
		var chapter2 = $(".filter-box-upload .matter-text").text();
		obj.chapter.push(chapter2==="选择小节" ? "" : chapter2);
	}

	getExercises(obj);

	return obj;
}




//ABC..转换成012..
function strToNum(str){
	if(str){
		var num = str.charCodeAt();
		return num - 65 + "";
	}else {
		return "";
	}
}











/****************** 显示题目 ********************/
/*连线题*/
$(function () {
	//字数超过6个的LI被hover时的效果
	$("body").on("mouseover",".question_hpb>li,.answer_hpb>li",function () {
		if ($(this).text().length >= 10) {
			$(this).addClass("active");
		}
	});
	$("body").on("mouseleave",".question_hpb>li,.answer_hpb>li",function () {
		$(this).removeClass("active");
	});

	//参数依次为序号、对数和正确答案
    function lianXianTiFunc(order,n,ans) {
        //动态生成对应LI的数据
        var dist = {
            liHeight: 38, //保存每个LI的高度
            borderWidth: 1, //保存每个LI的边框宽度
            marginBottom: 14, //保存每个LI的下外边距
            y1: 0, //保存第一个LI的y坐标
            D: 0, //保存每个LI y坐标之间相差的距离
            canvasW: 322, //保存canvas的宽度
            canvasH: 0, //保存canvas的高度
            question: [], //保存问题的坐标数据
            answer: [] //保存答案的坐标数据
        };

        dist.y1 = dist.borderWidth + dist.liHeight / 2;
        dist.D = dist.liHeight + 2 * dist.borderWidth + dist.marginBottom;
        trends();
        //动态设置Canvas高度和生成数据
        function trends() {
            dist.canvasH = (dist.liHeight + 2 * dist.borderWidth + dist.marginBottom) * n - dist.marginBottom;
            $(".lian-xian-"+order+" .question_hpb,.lian-xian-"+order+" .answer_hpb").height(dist.canvasH + 14);
            $(".lian-xian-" + order + " .container_hpb>canvas").attr("height", dist.canvasH);
            dist.question = [];
            dist.answer = [];
            for (var i = 0; i < $(".lian-xian-" + order + " .question_hpb>li").length; i++) {
                dist.question.push({
                    "x": 0,
                    "y": dist.y1 + i * dist.D,
                    "can": "yes"
                });
                dist.answer.push({
                    "x": dist.canvasW - $(".lian-xian-" + order + " .answer_hpb>li").width() - 2,
                    "y": dist.y1 + i * dist.D,
                    "can": "yes"
                });
            }
        }

        if (!$(".lian-xian-" + order + " .canvas1")[0]) {
            return;
        }
        var ctx1 = $(".lian-xian-" + order + " .canvas1")[0].getContext("2d");
        var ctx2 = $(".lian-xian-" + order + " .canvas2")[0].getContext("2d");
        var pos = {
            x1: 0, //保存起始的X坐标
            y1: 0, //保存起始的Y坐标
            x2: 0, //保存结束的X坐标
            y2: 0, //保存结束的Y坐标
            start: 0, //保存起始的选项序号
            canDraw: false, //保存画布上能不能画出线条
            COLOR: "orange" //保存画笔的颜色
        }
        var exist = []; //保存已经用过的坐标点以便回退时用
        if (ans) {
            //正确答案假数据
            //var answer = [{
				//"left": 1,
				//"right": 2
            //},
				//{
				//	"left": 2,
				//	"right": 1
				//},
				//{
				//	"left": 3,
				//	"right": 3
				//}
            //];

			var answer = ["1:1","2:2","3:3"];
			//var answer = ans;

            /*按照答案画出连线*/
            ctx1.strokeStyle = pos.COLOR;
            answer.forEach(function (item) {
                ctx1.beginPath();
                //ctx1.moveTo(dist.question[item.left - 1].x, dist.question[item.left - 1].y);
                //ctx1.lineTo(dist.answer[item.right - 1].x, dist.answer[item.right - 1].y);

				var lines = item.split(":");
				ctx1.moveTo(dist.question[lines[0] - 1].x, dist.question[lines[0] - 1].y);
				ctx1.lineTo(dist.answer[lines[1] - 1].x, dist.answer[lines[1] - 1].y);
                ctx1.stroke();
                ctx1.closePath();
            });
        } else {
            //鼠标开始点击的时候获取起始坐标
			$("body").on("click",".lian-xian-"+order+" .question_hpb li",function () {
				var n = $(this).parent(".question_hpb").children("li").index(this);
				if (dist.question[n].can === "yes") {
					pos.start = n;
					pos.canDraw = true;
					pos.x1 = dist.question[n].x;
					pos.y1 = dist.question[n].y;
				}
			});

            //鼠标在画布上移动时显示实时画线
			$("body").on("mousemove",".lian-xian-"+order+" .canvas2",function () {
				if (pos.canDraw) {
					ctx2.strokeStyle = pos.COLOR;
					ctx2.clearRect(0, 0, dist.canvasW, dist.canvasH);
					var mouseX = event.offsetX;
					var mouseY = event.offsetY;
					ctx2.beginPath();
					ctx2.moveTo(pos.x1, pos.y1);
					ctx2.lineTo(mouseX, mouseY);
					ctx2.stroke();
					ctx2.closePath();
				}
			});

			$("body").on("mousemove",".lian-xian-"+order+" .answer_hpb",function () {
				if (pos.canDraw) {
					ctx2.strokeStyle = pos.COLOR;
					ctx2.clearRect(0, 0, dist.canvasW, dist.canvasH);
					var mouseX = event.pageX - $(".lian-xian-"+order+" .canvas2").offset().left;
					var mouseY = event.pageY - $(".lian-xian-"+order+" .canvas2").offset().top;
					ctx2.beginPath();
					ctx2.moveTo(pos.x1, pos.y1);
					ctx2.lineTo(mouseX, mouseY);
					ctx2.stroke();
					ctx2.closePath();
				}
			});
            //用户点击答案触发的事件
			$("body").on("click",".lian-xian-"+order+" .answer_hpb li",function () {
				var n = $(this).parent(".answer_hpb").children("li").index(this);
                if ((pos.canDraw === true) && (dist.answer[n].can === "yes")) {
                    ctx1.strokeStyle = pos.COLOR;
                    pos.x2 = dist.answer[n].x;
                    pos.y2 = dist.answer[n].y;
                    ctx2.clearRect(0, 0, dist.canvasW, dist.canvasH);
                    ctx1.beginPath();
                    ctx1.moveTo(pos.x1, pos.y1);
                    ctx1.lineTo(pos.x2, pos.y2);
                    ctx1.stroke();
                    ctx1.closePath();
                    dist.question[pos.start].can = "no";
                    dist.answer[n].can = "no";
                    exist.push({"start": pos.start, "end": n});
                    pos.canDraw = false;
                }
				//console.log(changeToAnswer(exist));
				sessionStorage.setItem("ic_lianXianTi"+order,JSON.stringify(changeToAnswer(exist)));
				//console.log(sessionStorage.getItem("ic_lianXianTi"+order));
          	});

			//回退
			$("body").on("click",".lian-xian-"+order+" .return_hpb",function(){
				event.preventDefault();
				if(exist.length !== 0){
					ctx1.clearRect(0,0,dist.canvasW,dist.canvasH);
					var del=exist.pop();
					dist.question[del.start].can="yes";
					dist.answer[del.end].can="yes";
					ctx1.beginPath();
					for(var i=0; i<exist.length; i++){
						var start=exist[i].start;
						var end=exist[i].end;
						ctx1.moveTo(dist.question[start].x,dist.question[start].y);
						ctx1.lineTo(dist.answer[end].x,dist.answer[end].y);
					}
					ctx1.stroke();
					ctx1.closePath();
				}
        	});

            //连线题答案格式化并输出
            function changeToAnswer(exist) {
                var answer = [];      //保存连线题的答案
                exist.forEach(function (item) {
                    answer.push((item.start + 1) + "连" + (item.end + 1));
                });

				return answer;
            }
        }
    }
   if (typeof(ligature) != "undefined") {
   		lianXianTiFunc(matching,ligature);
	}else{	
		lianXianTiFunc(exercise_id,exercise_length,answer);   
	}
})
























