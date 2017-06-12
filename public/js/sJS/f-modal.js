//单人作业
$(function(){
	$(".q-block-trigger").click(function(){
		$("#f-modal").fadeIn();
		$("#answerInput").fadeIn();
	})
})
$(function(){
	$(".answerInput-close").click(function(){
		$("#answerInput").fadeOut();
		$("#f-modal").fadeOut();
	})
})

$(function(){
	//统计作文字数
	$("#composition").keyup(function(){
		const txt = $("#composition").val().replace(/\s/g,'');
		const len = txt.length;
		$("#answerInput .words>span").text(len);
	})
	
	//作文上传照片
	//safari5.0.4不支持FileReader和file.files.item(0).getAsDataURL方法
	$('.photo-upload-modal-header .uploadPhoto').change(function(){
        input = $(this)[0];
        if (!input['value'].match(/.jpg|.png|.bmp/i)) {   //判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择");
        }
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(e) {
//          $('#t1_m .headImg>img').attr('src',this.result);
            var img = "<img src='" + this.result + "'/>"
            console.log(img)
            $(".photo-upload-content .photo-center").html(img);
        };
    });
})


