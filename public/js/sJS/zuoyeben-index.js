$(function(){
	const id = sessionStorage.getItem("homeworkId"); //保存是作业几
	console.log(id)
	$.get("showWorkDetail/" + id + '/1').success(function(data){
		var data = JSON.parse(data).exercises;
		console.log(data)
		var html = "";
        //作文题只能出
		data.forEach(function(item,i){
			if(item.cate_title === "单选题") {
				html += '';
			}else if(item.cate_title === "填空题") {
                html += '';
            }else if(item.cate_title === "多空题") {
                html += '';
            }else if(item.cate_title === "多选题") {
                html += '';
            }else if(item.cate_title === "判断题") {
                html += '';
            }else if(item.cate_title === "排序题") {
                html += '';
            }else if(item.cate_title === "连线题") {
                html += '';
            }else if(item.cate_title === "简答题") {
                html += '';
            }else if(item.cate_title === "综合题") {
                html += '';
            }else if(item.cate_title === "作文题") {
                html += '';
            }else if(item.cate_title === "连线题") {
                html += '';
            }
		})
	});
	
	//控制排序题只能输入数字
	$(".questionOrderAnswerWrap .questionOrderAnswer").keyup(function(){
		if(!(/\d{1}/.test($(this).val()))) {
			$(this).val('');
		}
	});
	

    /******************* 作文题 ************************/
    var comp_photo = "";

    //统计作文字数
    $("#composition").keyup(function(){
        const txt = $("#composition").val().replace(/\s/g,'');
        const len = txt.length;
        $("#answerInput .words>span").text(len);
    });
    
    //取消上传照片
    $("#photo-cancel").click(function(){
        $(".photo-upload-modal-header .uploadPhoto").val("");
        $(".photo-upload-content .photo-center").html('<div class="photo-center-1">1.请选择JPG图片</div><div class="photo-center-2">2.大小不超过1M</div>');
        comp_photo = "";
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
            $(".photo-upload-content .photo-center").html(img);
            comp_photo = formData;
        };
    });


	//提交作业
	$("#submit-btn").click(function(){
		/*参数格式
		{
			"work_id":111,
			data: {
				{"题号":"答案", "题号":"答案"}
			}
		}
		*/
        
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
        }

		$.post("",param).success(function(data){
//			if() {
//				window.location.href='/danrenzuoye-chengji';
//			}
		});
        window.location.href='/danrenzuoye-chengji';
	});
})

//简答题
$(function(){
	var current = 0;
	$(".jianDaTi").click(function(){
        var msg = $(this).next(".d-n").text();
        $(".jianDaTi-txar").val(msg ? msg : "");
    	$("#f-modal,.jianDaTi-modal").fadeIn();
    	current = $(this).attr("data-num");
    });
    $("#jianDaTi-close").click(function(){
		$("#f-modal, .jianDaTi-modal").fadeOut();
	});
	//保存
	$("#jianDaTi-save").click(function(){
		var value = $(".jianDaTi-txar").val();
		$(".jianDaTi-answer"+current).text(value);
        $("#f-modal, .jianDaTi-modal").fadeOut();
	})
})


/*********** 连线题 ************/
    $(function(){
        //动态生成对应LI的数据
        var dist={
            liHeight:30, //保存每个LI的高度
            borderWidth:1,  //保存每个LI的边框宽度
            marginBottom:10, //保存每个LI的下外边距
            y1:0,   //保存第一个LI的y坐标
            D:0,     //保存每个LI y坐标之间相差的距离
            canvasW:300,  //保存canvas的宽度
            canvasH:0,   //保存canvas的高度
            question:[],    //保存问题的坐标数据
            answer:[]       //保存答案的坐标数据
        }
        dist.y1=dist.borderWidth+dist.liHeight/2;
        dist.D=dist.liHeight+2*dist.borderWidth+dist.marginBottom;
        trends();
        //动态设置canvas的高度和生成数据
        function trends(){
            dist.canvasH=$(".question_hpb").height();
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
        //重置
        $(".reset_hpb").click(function(){
            event.preventDefault();
            ctx1.clearRect(0,0,dist.canvasW,dist.canvasH);
            for(var i=0; i<dist.question.length; i++){
                dist.question[i].can="yes";
                dist.answer[i].can="yes";
            }
            exist=[];
            $(".lxt-answer").text("");
        });
        //回退
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
            $(".lxt-answer").text(answer.join(", "));
        }
    });