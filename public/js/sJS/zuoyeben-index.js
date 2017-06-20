$(function(){
    var id = sessionStorage.getItem("homeworkId"); //保存是作业几
    var current = 0;  //保存当前题号
    var lxt_options = 0;  //保存连线题的对数
    var jdt_answer = {};  //保存简答题的答案
    var comp_photo = {};  //保存作文的照片

    //把填空题的题目空格格式化
    function tkChange(str) {
        var obj = {};
        var tk_reg = /&空\d+&/g;
        var tk_arr = str.split(tk_reg);
        var result = "";
        
        for(var i=0; i<tk_arr.length-1; i++) {
            result += tk_arr[i] + '<span class="question-blank">空' + (i+1) + '</span>';
        }
        result += tk_arr[tk_arr.length-1];
        obj.data = result;
        if(str.match(tk_reg)) {
            obj.n = str.match(tk_reg).length;
        }

        return obj;
    }

    /********* 显示题目列表 ********/
    $.ajax({
        type: "GET",
        url: "showWorkDetail/" + id,
        async: false,
        success: function(data){
        var data = JSON.parse(data);
        console.log(data)
        var html = "";  //保存整个题目列表
        var n = 0;   //保存填空题空格的个数
        var px_index = ["①","②","③","④","⑤","⑥","⑦","⑧","⑨","⑩"];   //排序题序号

        data.forEach(function(item,i){
            if(item.cate_title === "单选题") {
                var dx_options = "";
                item.options.forEach(function(item){
                    var key_name = "";
                    for(var key in item) {
                        key_name = key;
                    }
                    dx_options += '<div class="radio">\
                                        <label>\
                                            <input type="radio" name="questionSelect" class="questionSelect" value="' + key_name + '"/>\
                                            <span class="select-wrapper"></span>' + key_name + '.\
                                            <span class="question-content">' + item[key_name] + '</span>\
                                        </label>\
                                    </div>';
                });
                
                html += '<div class="homework-content" data-type="单选题" data-id="' + item.id+ '">\
                                <p class="question-head">\
                                    <span class="order">' + (i+1) + '.</span>\
                                    单选题：' + item.subject + '\
                                </p>\
                                <form class="select" id="myForm">' + dx_options + '</form>\
                                <div class="line"></div>\
                                <div class="question-foot">\
                                    <span>你的答案：</span>\
                                    <span class="answerOrder"></span>\
                                    <span class="col-line"></span>\
                                    <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                        <span class="search-wiki-span">查看资料</span></a>\
                                        <span class="question-fault">报错</span>\
                                    </div>\
                                </div>';
            }else if(item.cate_title === "填空题") {
                var tk_obj = tkChange(item.subject);
                var tk_answerInput = "";
                for(var j=0; j<tk_obj.n; j++) {
                    tk_answerInput += '<input type="textarea" class="questionBlankAnswer" placeholder="答案' + (j+1) + '">'
                }
                
                html += '<div class="homework-content" data-type="填空题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>\
                                                填空题：' + tk_obj.data + '\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span id="" class="questionBlankAnswerWrap">' + tk_answerInput + '</span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "多空题") {
                html += '';
            }else if(item.cate_title === "多选题") {
                var dux_options = "";
                item.options.forEach(function(item){
                    var key_name = "";
                    for(var key in item) {
                        key_name = key;
                    }
                    dux_options += '<div class="radio">\
                                                <label>\
                                                    <input type="checkbox" name="questionMultiSelect" class="questionMultiSelect" value="' + key_name + '"/>\
                                                    <span class="select-wrapper"></span>' + key_name + '.\
                                                    <span class="question-content">' + item[key_name] + '</span>\
                                                </label>\
                                            </div>';
                });

                html += '<div class="homework-content" data-type="多选题" data-id="' + item.id+ '">\
                                        <p class="question-head">\
                                            <span class="order">' + (i+1) + '.</span>\
                                            多选题：' + item.subject + '\
                                        </p>\
                                        <form class="select" id="myForm">' + dux_options + '</form>\
                                        <div class="line"></div>\
                                        <div class="question-foot">\
                                            <span>你的答案：</span>\
                                            <span class="answerOrder"></span>\
                                            <span class="col-line"></span>\
                                            <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "判断题") {
                html += '<div class="homework-content" data-type="判断题" data-id="' + item.id+ '">\
                                    <p class="question-head">\
                                        <span class="order">' + (i+1) + '.</span>\
                                        判断题：' + item.subject + '\
                                    </p>\
                                     <div class="line"></div>\
                                     <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span class="right-or-wrong">\
                                                    <label>对\
                                                        <input type="radio" name="chooseTi" vlaue="1">\
                                                    </label>\
                                                    <label>错\
                                                        <input type="radio" name="chooseTi" vlaue="0">\
                                                    </label>\
                                                </span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                    </div>';
            }else if(item.cate_title === "排序题") {
                var px_options = "";
                var px_answerInput = "";
                item.options.forEach(function(k,i){
                    px_options += px_index[i] + k[i+1] + (i === item.options.length-1 ? "" : "<br/>");
                    px_answerInput += '<input type="text" class="questionOrderAnswer" placeholder="答案' + (i+1) + '" maxlength="1">';
                });

                html += '<div class="homework-content" data-type="排序题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>排序题：' + item.subject + '\
                                                <div class="questionOrderContent">' + px_options + '</div>\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <span>你的答案：</span>\
                                                <span class="questionOrderAnswerWrap">' + px_answerInput + '</span>\
                                             <span class="col-line"></span>\
                                             <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>\
                                                <span class="search-wiki-span">查看资料</span></a>\
                                                <span class="question-fault">报错</span>\
                                            </div>\
                                        </div>';
            }else if(item.cate_title === "连线题") {
                lxt_options = item.options.length;
                html += '';
            }else if(item.cate_title === "简答题") {
                html += '<div class="homework-content" data-type="简答题" data-id="' + item.id+ '">\
                               <p class="question-head">\
                                <span class="order">' + (i+1) + '.</span>简答题：' + item.subject + '\
                            </p>\
                            <div class="line"></div>\
                            <div class="question-foot">\
                                <a class="hover-blue jianDaTi" href="javascript:;">点击输入答案</a>\
                                <span class="col-line"></span>\
                                <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>查看资料</a>\
                                    <span class="question-fault">报错</span>\
                                </div>\
                            </div>';
            }else if(item.cate_title === "综合题") {
                html += '';
            }else if(item.cate_title === "作文题") {
                html += '<div class="homework-content" data-type="作文题" data-id="' + item.id+ '">\
                                            <p class="question-head">\
                                                <span class="order">' + (i+1) + '.</span>作文题：' + item.subject + '\
                                            </p>\
                                            <div class="line"></div>\
                                            <div class="question-foot">\
                                                <a class="q-block-trigger hover-blue zuoWenTi" href="javascript:;">点击输入答案</a>\
                                                <p class="d-n composition-answer"></p>\
                                                <span class="answer-photo">\
                                                 <a href="#" data-toggle="modal" data-target="#getPhoto">\
                                                  <img src="images/homework/subject/photo.png" style="position: relative;top:-2px;"/>\
                                                  <span class="photo hover-blue">拍照上传</span>\
                                              </a>\
                                          </span>\
                                          <span class="col-line"></span>\
                                          <a href="javascript:;" class="search-wiki"><img src="images/homework/subject/link.png" alt=""/>查看资料</a>\
                                            <span class="question-fault">报错</span>\
                                </div>';
            }
        });

        // $(".exercise-box").html(html);
    }
    });
	// $.get("showWorkDetail/" + id).success();
	
	//控制排序题只能输入数字
	$(".questionOrderAnswerWrap .questionOrderAnswer").keyup(function(){
		if(!(/\d{1}/.test($(this).val()))) {
			$(this).val('');
		}
	});

    lianXianTiFunc(lxt_options);
    jianDaTiFunc();
    compositionFunc();

	//提交作业
	$("#submit-btn").click(function(){
		/*参数格式*/
        //1-单选题，2-填空题，3-判断题，4-多选题，5-排序题, 6-连线题，7-简答题, 8-作文题
		var param = {
			"work_id":111,
            '_token':'{{csrf_token()}}',
			data: [
                {id:1, answer:2},
                {id:2, answer:["李白","杜甫"]},
                {id:3, answer:1},
                {id:4, answer:[2,3]},
                {id:5, answer:[5,3,1,4,2]},
                {id:6, answer:[{1:3},{2:1},{3:2}]},
                {id:7, answer:"我是简答题"},
                {id:8, answer:"我是作文题"},
            ]
		}
		
        /*
        var obj = {};
        $(".homework-content").each(function(i,item){
            // console.log(this);
            var type = $(item).attr("data-type");
            var id = $(item).attr("data-id");
            if(type === "单选题") {
                obj[id] = $(this).find(".answerOrder").text();
            }else if(type === "填空题") {
                var tk_arr = [];
                $(this).find(".questionBlankAnswer").each(function(i,item){
                    tk_arr.push($(item).val());
                })
                obj[id] = tk_arr;
            }else if(type === "多选题") {
                var dx_arr = $(this).find(".answerOrder").text().split(",");
                obj[id] = dx_arr;
            }else if(type === "排序题") {
                var px_arr = [];
                $(this).find(".questionOrderAnswer").each(function(i,item){
                    px_arr.push($(item).val());
                });
                obj[id] = px_arr;
            }else if(type === "简答题") {
                obj[id] = $(this).find(".jianDaTi-answer"+id).text();
            }else if(type === "作文题") {
                var composition = {};
                composition.title = $(this).find(".title").val();
                composition.content = $(this).find(".composition").val();
                composition.photo = comp_photo;
                obj[id] = composition;
            }
        });

        var param = {
            "work_id": id,
            "data": obj
        }  */

		// $.post("subWork",param).success(function(data){
//			if() {
//				window.location.href='/danrenzuoye-chengji';
//			}
		// });
        // window.location.href='/danrenzuoye-chengji';
	});


/********** 简答题 *********/
function jianDaTiFunc(){
    $(".exercise-box").on("click",".jianDaTi",function(){
        current = $(this).parents(".homework-content").attr("data-id");
        var msg = jdt_answer[current];
        if(msg) {
            $(".jianDaTi-txar").val(msg);
        }
        $("#f-modal,.jianDaTi-modal").fadeIn();
    });
    $("#jianDaTi-close").click(function(){
        $("#f-modal, .jianDaTi-modal").fadeOut();
    });

    //保存
    $("#jianDaTi-save").click(function(){
        jdt_answer[current] = $(".jianDaTi-txar").val();
        $("#f-modal, .jianDaTi-modal").fadeOut();
    })
}

/********** 作文题 *********/
function compositionFunc(){
    $(".exercise-box").on("click",".zuoWenTi",function(){
        current = $(this).parents(".homework-content").attr("data-id");
        var title = sessionStorage.getItem("incourse"+current+"title");
        var content = sessionStorage.getItem("incourse"+current+"content");
        if(title) {
            $(".answerInput .title").val(title);
        }
        if(content) {
            $("#composition").val(content);
        }

        $("#f-modal, #answerInput").fadeIn();
    });
    
    $(".exercise-box").on("click","#takePhoto",function(){
        current = $(this).parents(".homework-content").attr("data-id");
        var photo = sessionStorage.getItem("incourse"+current+"photo");
        if(photo) {
            $(".photo-upload-content .photo-center").html("<img src='" + this.result + "'/>");
        }
    });

    //保存作文
    $(".exercise-box").on("click","#posi-save",function(){
        var title = $(".homework-content .title").val();
        var content = $("#composition").val();
        //作文题目 incourse+题号+title, 作文正文 incourse+题号+content，作文照片 incourse+题号+photo
        sessionStorage.setItem("incourse"+current+"title",title);
        sessionStorage.setItem("incourse"+current+"content",content);
    });

    //作文上传照片
    // -------- 将以base64的图片url数据转换为Blob --------
    function convertBase64UrlToBlob(urlData, filetype){
        //去掉url的头，并转换为byte
        var bytes = window.atob(urlData.split(',')[1]);
        
        //处理异常,将ascii码小于0的转换为大于0
        var ab = new ArrayBuffer(bytes.length);
        var ia = new Uint8Array(ab);
        var i;
        for (i = 0; i < bytes.length; i++) {
            ia[i] = bytes.charCodeAt(i);
        }
        return new Blob([ab], {type : filetype});
    }
    
    //safari5.0.4不支持FileReader和file.files.item(0).getAsDataURL方法
    $('.photo-upload-modal-header .uploadPhoto').change(function(){
        var input = $(this)[0];
        var files = input.files || [];
        if (files.length === 0) {
            return;
        }
        if (!input['value'].match(/.jpg|.png|.bmp/i)) {   //判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择");
        }
        var file = files[0];
        var filename = file.name || '';
        var fileType = file.type || '';
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
            var base64 = e.target.result || this.result;
            var formData = new FormData();
            formData.append("upload_file", convertBase64UrlToBlob(base64, fileType), filename);
            var img = "<img src='" + this.result + "'/>";
            sessionStorage.setItem("incourse"+current+"photo",this.result);
            $(".photo-upload-content .photo-center").html(img);
            comp_photo[current] = formData;
        };
    });

    //取消上传照片
    $("#photo-cancel").click(function(){
        $(".photo-upload-modal-header .uploadPhoto").val("");
        $(".photo-upload-content .photo-center").html('<div class="photo-center-1">1.请选择JPG图片</div><div class="photo-center-2">2.大小不超过1M</div>');
        comp_photo[current] = "";
    });

    //统计作文字数
    $("#composition").keyup(function(){
        const txt = $("#composition").val().replace(/\s/g,'');
        const len = txt.length;
        $("#answerInput .words>span").text(len);
    });

    //关闭作文模态框
    $(".answerInput-close").click(function(){
        $("#answerInput, #f-modal").fadeOut();
    });
}


/********** 连线题 *********/
    function lianXianTiFunc(n){
        var n = 5;
        console.log(n)
        //动态生成对应LI的数据
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
            dist.question=[];
            dist.answer=[];
            for(var i=0; i<$(".question_hpb>li").length; i++){
                dist.question.push({"x":0,"y":dist.y1+i*dist.D,"can":"yes"});
                dist.answer.push({"x":dist.canvasW-$(".answer_hpb>li").width()-2,"y":dist.y1+i*dist.D,"can":"yes"});
            }
        }
        var ctx1=$("#canvas1")[0].getContext("2d");
        var ctx2=$("#canvas2")[0].getContext("2d");
        var pos={
            x1:0,    //保存起始的X坐标
            y1:0,     //保存起始的Y坐标
            x2:0,    //保存结束的X坐标
            y2:0,    //保存结束的Y坐标
            start:0, //保存起始的选项序号
            canDraw:false,   //保存画布上能不能画出线条
            COLOR:"orange" //保存画笔的颜色
        }
        var exist=[];   //保存已经用过的坐标点以便回退时用
        //鼠标开始点击的时候获取起始坐标
        $(".question_hpb").on("click","li",function() {
            var n = $(".question_hpb>li").index(this);
            if (dist.question[n].can === "yes") {
                pos.start = n;
                pos.canDraw = true;
                pos.x1 = dist.question[n].x;
                pos.y1 = dist.question[n].y;
            }
        });
        //字数超过6个的LI被hover时的效果
        $(".question_hpb>li, .answer_hpb>li").hover(function(){
            if($(this).text().length >= 6) {
                $(this).addClass("active");
            }
        },function(){
            $(this).removeClass("active");
        });

        //鼠标在画布上移动时显示实时画线
        $("#canvas2").mousemove(function(){
            if(pos.canDraw){
                ctx2.strokeStyle=pos.COLOR;
                ctx2.clearRect(0,0,dist.canvasW,dist.canvasH);
                var mouseX=event.offsetX;
                var mouseY=event.offsetY;
                ctx2.beginPath();
                ctx2.moveTo(pos.x1,pos.y1);
                ctx2.lineTo(mouseX,mouseY);
                ctx2.stroke();
                ctx2.closePath();
            }
        });
        $(".answer_hpb").mousemove(function(){
            if(pos.canDraw){
                ctx2.strokeStyle=pos.COLOR;
                ctx2.clearRect(0,0,dist.canvasW,dist.canvasH);
                var mouseX=event.pageX-$("#canvas2").offset().left;
                var mouseY=event.pageY-$("#canvas2").offset().top;
                ctx2.beginPath();
                ctx2.moveTo(pos.x1,pos.y1);
                ctx2.lineTo(mouseX,mouseY);
                ctx2.stroke();
                ctx2.closePath();
            }
        });
        //用户点击答案触发的事件
        $(".answer_hpb").on("click","li",function(){
            var n=$(".answer_hpb>li").index(this);
            if((pos.canDraw===true) && (dist.answer[n].can==="yes")){
                ctx1.strokeStyle=pos.COLOR;
                pos.x2=dist.answer[n].x;
                pos.y2=dist.answer[n].y;
                ctx2.clearRect(0,0,dist.canvasW,dist.canvasH);
                ctx1.beginPath();
                ctx1.moveTo(pos.x1,pos.y1);
                ctx1.lineTo(pos.x2,pos.y2);
                ctx1.stroke();
                ctx1.closePath();
                dist.question[pos.start].can="no";
                dist.answer[n].can="no";
                exist.push({"start":pos.start,"end":n});
                pos.canDraw=false;
            }
            changeToAnswer(exist);
        });
        //撤销
        $(".return_hpb").click(function(){
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
            changeToAnswer(exist);
        });
        //把连线转化成字符串
        function changeToAnswer(exist) {
            var answer = [];
            exist.forEach(function(item){
                answer.push((item.start+1) + "-" + (item.end+1));
            });
        }
    };
})

