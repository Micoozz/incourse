$(function(){
	const id = sessionStorage.getItem("homeworkId"); //保存是作业几
	console.log(id)
	$.post("",{"homeworkId":id, "_token":{{csrf_token()}}}).success(function(data){
		
	});
	
	//控制排序题只能输入数字
	$(".questionOrderAnswerWrap .questionOrderAnswer").keyup(function(){
		if(!(/\d{1}/.test($(this).val()))) {
			$(this).val('');
		}
	});
	
	//提交作业
	$("#submit-btn").click(function(){
		window.location.href='/danrenzuoye-chengji';
		/*参数格式
		{"题号":"答案", "题号":"答案"}
		
		{"data": [
			{"id": "题号", "answer": "答案"}	,
			{"id": "题号", "answer": "答案"}	
		]}
		
		*/
		$.post("",{}).success(function(data){
//			if() {
//				window.location.href='/danrenzuoye-chengji';
//			}
		});
	});
	
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
    });
})

$(function(){
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
        console.log(files[0])
        var file = files[0];
        var filename = file.name || '';
        var fileType = file.type || '';
        
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
        	var base64 = e.target.result || this.result;
            var formData = new FormData();
            formData.append("upload_file", convertBase64UrlToBlob(base64, fileType), filename);
            console.log(formData)
            
            var img = "<img src='" + this.result + "'/>"
//          console.log(img)
            $(".photo-upload-content .photo-center").html(img);
        };
    });
})
