@extends('teacher.theAnswer_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/communal.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/eduAdmin/releaseNotes.css') }}" />
<link rel="stylesheet" type="text/css" href="/js/layui/css/layui.css">
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
<link rel="stylesheet" href="/css/teacher/addHomeWork.css">
<title>InCourse</title>
<style>
	.uploadCourseware {
		margin-top: 60px;
		font-size: 12px;
	}
	.uploadCourseware .upLoadCourse .label-input {
		display: block;
		margin-bottom: 10px;
	}
	.uploadCourseware #course_title{
	    padding: 2px 5px;
	    height: 24px;
	    line-height: 20px;
	    border-radius: 2px;
	    border: 1px solid #d9d9d9;
	}
	.uploadCourseware .time {
		background: #FFFFFF;
		border: 1px solid #D9D9D9;
		border-radius: 4px;
		width: 488px;
		height: 28px;
		text-indent: 10px;
	}
	.uploadCourseware .flex {
		display: flex;
	}
	.uploadCourseware .flex span>span {
		display: block;
		border-right: 1px solid #eee;
		margin: 10px;
		width: 80px;
		cursor: pointer;
	}
	.uploadCourseware .flex span>textarea {
		width: 100%;
		height: 100%;
		border: 0;
		border-top: 1px solid #ccc;
		padding: 10px;
		outline: none;
	}
	.uploadCourseware .flex>div>span{
		background: #FFFFFF;
		border: 1px solid #D9D9D9;
		border-radius: 4px;
		height: 182px;
		width: 100%;
		overflow: hidden;
		display: block;
	}
	.uploadCourseware .time {
		width: 100px;
		display: inline-block;
	}
	.uploadCourseware .time input {
		width: 78%;
		border: 0;
		height: 26px;
		outline: none;
	}
	.uploadCourseware .flex input {
		width: 80px;
		position: absolute;
		margin-top: -23px;
		margin-left: -8px;
		opacity: 0;
	}
	.uploadCourseware .parpers span{
		cursor: pointer;
	}
	.uploadCourseware .person-exer-list{
		font-size: 12px!important;
		border-bottom: 1px solid #d9d9d9;
		border-radius: 4px;
	}
	.uploadCourseware .time_down{
		margin-top: 20px;
	}
	.uploadCourseware .disSelsectBox {
	    width: 540px;
	    margin-left: -130px;
	    position: relative;
	    padding-left: 130px;
	    overflow: hidden;
	    margin-right: -100px;
	    padding-right: 100px;
	}
	.uploadCourseware .disSelsect ul{
		height: auto;
		overflow: hidden;
	}
	.uploadCourseware .person-exer-list .tfoot-module tr td{
		padding: 0;
		border-bottom: 0;
	}
	.uploadCourseware .tfoot-module,.work_tbody{
		border: none;
	}
	.uploadCourseware .tfootTd{
		display: inline-block;
	}
	.uploadCourseware .tfootTd:nth-child(2){
		text-align: center;
		margin-left: 32.5%;
	}
	.uploadCourseware .tfootTd:nth-child(3){
		text-align: right;
	}
	.uploadCourseware .btn:active{
		box-shadow: none;
	}
	.uploadCourseware .tfootTd button{
		width: auto;
	}
	.uploadCourseware .tfootTd a{
		display: block;
		height: 16px;
		line-height: 16px;
	}
	.uploadCourseware .btn:hover{
		color: #168BEE;
	}
	.uploadCourseware .uploadFile span{
		width: 70px;
		display: block;
		float: left;
	}
	.uploadCourseware .uploadFile .parpers{
		width: 490px;
		float: left;
	}
	.uploadCourseware .uploadFile .parpers p{
		margin-bottom: 0;
		float: left;
	}
	.uploadCourseware .uploadFile .parpers b{
		float: left;
		margin-right: 20px;
		display: inline-block;
		max-width: 390px;
		width: auto;
		white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
	}
	.uploadCourseware .uploadFile .parpers span{
		text-align: center;
	}
</style>
@endsection
@section('THEANSWER')
<div class="row">
	<!--左侧栏-->
	<div class="col-xs-2" id="left">
		@include('teacher.template.courseware_left')
	</div>
	<!--内容-->
	<div class="col-xs-12 col-sm-12" id="centery">
		<div class="files_nav">
			<span class="col-xs-3 col-sm-3"></span>
			<span class="col-xs-6 col-sm-6">课程大纲</span>
			<span class="col-xs-3 col-sm-3 add"></span>
		</div>
		<div class="ic-container">
			<div class="uploadCourseware">
				<form class="upLoadCourse">
					<label class="label-input">课件名称：<input type="" name="" id="course_title" value=""/></label>
					<label for="" class="flex label-input">
						<div>
							<div class="uploadFile">
								<span>课件内容：</span>
								<div class="parpers"></div>
							</div>
							<span>
								<span class="addFileTool">
									<i class="fa fa-paperclip"></i>&nbsp;添加附件
								</span>
								<input type="file" name="" class="addFile" value="" />
								<textarea name="" rows="" id="course_textarea" cols="" placeholder="请输入内容"></textarea>
							</span>
						</div>
					</label>
					<label class="label-input" style="margin-bottom: 10px;">
						习题练习：<!-- <a href="/exercise/{{$class_id}}/{{$course_id}}/addCourseware"><span class="blue"><i class="fa fa-plus-circle"></i>&nbsp;添加习题</span></a> -->
					</label>
					<table class="d-b of-h border person-exer-list">
						<thead>
							<tr>
								<th>
									<input id="all-checked" type="checkbox"/>
                    				<span>序号</span>
								</th>
								<th>题型</th>
			                    <th>题目</th>
			                    <th class="jobNum"></th>
							</tr>
						</thead>
						<tbody class="work_tbody"></tbody>
						<tfoot class="tfoot-module">
						    <tr>
						      	<td colSpan='4'>
						      		<div>
						      			<span class="tfootTd"><button type="button" class="btn blue" id="delete-personHw">删除</button></span>
							      		<span class="tfootTd">
							      			<button class="btn btn-white" type="button">
							      				<a href="/exercise/{{$class_id}}/{{$course_id}}/addCourseware" class="addCourseJob"><span class="gray"><i class="fa fa-plus-circle"></i>&nbsp;添加习题</span></a>
							      			</button>
							      		</span>
						      		</div>
						      	</td>
						    </tr>
						</tfoot>
					</table>
					<label class="label-input time_down">
						倒计时：<span  class="time"><input type="" name="" id="input_number" value="" onpaste="inputOnafterpaste(this)"/>s</span>&nbsp;&nbsp;<img src="/images/cautionImg.png" style="width: 3%;" />
					</label>
					<label for="" class="submit label-input">
						<button type="button" class="ic-btn" id="save_Jobs">保存</button>
						<button class="btn-white"><a href="/courseWare/main/{{$class_id}}/{{$course_id}}">返回</a></button>
					</label>
				</form>
			</div>
		</div>
	</div>
	<!--右侧栏-->
	<div class="col-xs-2 left">
		@include('teacher.header.right_nav')
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<!--script-->
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
<script src="/js/layui/layui.js" charset="utf-8"></script>
<script>
	$(function() {
		var ENNum = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
		var course_id = '{{$course_id}}';
		getLocalData()
		delJob()
		//选中的习题的展示HTML框架
		function htmlModule(ENNum,data,i){
		    var html;
		    html = "<tr data-id='"+data.id+"' class='spread tdBtn'>" +
		           "<td>" +
		               "<input class='checkJob' type='checkbox' id='deleteJob"+i+"'/>" +
		               "<label class='deleteText' for='deleteJob"+i+"'>"+(i+1)+"</label>" +
		           "</td>";
		    html += "<td class='personHw-type'>"+data.cate_title+"</td>";
		    html += "<td>" +
		        "<span class='subject_box subject_box_noActive'>"+data.subject+"</span><div class='disSelsectBox' style='height: 0;'>" +
		        "<div class='disSelsect active'>" +
		        "<ul class='radio-wrap exer-list-ul'>";
		        if(data.cate_title == "单选题" || data.cate_title == "多选题"){
		            var num = 0;
		            for(var s=0;s<data.options.length;s++){
		                for(var j in data.options[s]){
		                    var item = data.options[s][j];
		                    var classTrue=false;
		                    for(var k = 0; k<data.answer.length;k++){
		                        if(j == data.answer[k]){
		                            classTrue=true;
		                        }
		                    }
		                    if(classTrue){
		                        html += "<li>"+
		                            "<label class='ic-radio border p-r f-l active'>"+
		                                "<i class='ic-blue-bg p-a'></i>"+
		                                "<input type='radio' name='radio' value='"+j+"'/>"+
		                            "</label>"+
		                            "<span class='f-l'>"+ENNum[num]+"：</span>"+
		                            "<p class='f-l option'>"+item+"</p>"+
		                        "</li>";
		                    }else{
		                        html += "<li>"+
		                            "<label class='ic-radio border p-r f-l'>"+
		                                "<i class='ic-blue-bg p-a'></i>"+
		                                "<input type='radio' name='radio' value='"+j+"'/>"+
		                            "</label>"+
		                            "<span class='f-l'>"+ENNum[num]+"：</span>"+
		                            "<p class='f-l option'>"+item+"</p>"+
		                        "</li>";
		                    }
		                    num++;
		                }
		            }
		            num=0
		        }else if(data.cate_title == "判断题" || data.cate_title == "填空题"){
		            html += "<li>";
		            if(data.cate_title == "填空题"){
		                for(var l = 0;l<data.answer.length;l++){
		                    html += "<span class='answer_span'>答案"+ENNum[l]+":"+data.answer[l]+"</span>";
		                }
		            }else if(data.cate_title == "判断题"){
		                if(data.answer[0]==1){
		                    html += "<div class='pan-duan rightActive'>";
		                }else{
		                    html += "<div class='pan-duan wrongActive'>";
		                }
		                html += "<i class='uploadExerIcons right' style='top:0;'></i><i class='uploadSuccessIcon wrong' style='top:0;'></i></div>";
		            }
		            html += "</li>";
		        }else if(data.cate_title == "排序题"){
		            html += "<li>";
		            for(var x = 0; x<data.options.length;x++){
		                for(var key in data.options[x]){
		                    html += "<span class='answer_span'>排序"+(x+1)+":"+data.options[x][key]+"</span>";
		                }
		            }
		            html += "</li>";
		        }
		    html += "</ul>"+
		        "</div>"+
		        "<div class='chapterBox'><span class='chapterBtn' style='width: 70px;'><span  class='chapterTitle'>知识点</span><span class='chapterContent'>"+data.chapter_ttile+"</span><span  class='fa chapterIcon fa-angle-double-right'></span></span></div></div>"+
		        "</td>"+
		        "<td valign='top'><i class='fa is-spread fa-angle-down'></i></td>"+
		        "</tr>";
		    return html;
		}
		//获取本地数据函数
		function getLocalData(){
			var datas = JSON.parse(window.sessionStorage.getItem("course_ware"));
			var getWork={"id_list":datas,"_token":token}
		    $.ajax({
		        url:"/getExerciseList",
		        data:getWork,
		        type:"POST",
		        success:function(data){
		            data = JSON.parse(data);
		            $(".work_tbody").html("")
		            for(var i=0;i<data.length;i++){
		                $(".work_tbody").append(htmlModule(ENNum,data[i],i));
		            }
		            $(".jobNum").text(datas.length+"/15题")
		            $(".disSelsect").each(function(){
		                $(this).css({height:($(this).find("ul").height()+10)});
		            });
		            $(".tdBtn").click(function(e){
		                e.stopPropagation();
		                $(".disSelsect").click(function(){
		                    return false;
		                });
		                $(this).find(".disSelsect").toggleClass("active");
		                if($(this).find(".disSelsect").hasClass("active")){
		                    $(this).find(".chapterBox").css({display:"none"});
		                    $(this).find(".fa.is-spread").removeClass("fa-angle-up").addClass("fa-angle-down");
		                    $(".subject_box").removeClass("subject_box_active").addClass("subject_box_noActive");
		                    $(this).find(".chapterBtn").css({width:'70px'},500);
		                    $(this).find(".chapterIcon").removeClass('fa-angle-double-left').addClass("fa-angle-double-right");
		                    $(this).find(".disSelsectBox").animate({height:0},500);
		                }else{
		                    $(this).find(".fa.is-spread").removeClass("fa-angle-down").addClass("fa-angle-up");
		                    $(".subject_box").removeClass("subject_box_noActive").addClass("subject_box_active");
		                    $(this).find(".disSelsectBox").animate({height:($(this).find("ul").height()+45)},500);
		                    var that = this;
		                    setTimeout(function(){
		                        $(that).find('.chapterBox').css({display:'block'});
		                    },500)
		                }
		            });
		            $(".chapterBox").on("click",".chapterIcon",function(e){
		                e.stopPropagation();
		                if($(this).hasClass("fa-angle-double-right")){
		                    $(this).parent().animate({width:'370px'},500);
		                    $(this).removeClass('fa-angle-double-right').addClass("fa-angle-double-left");
		                }else{
		                    $(this).parent().animate({width:'70px'},500);
		                    $(this).removeClass('fa-angle-double-left').addClass("fa-angle-double-right");
		                }
		            })
		            $("#all-checked").click(function(){
		                if($(this).is(":checked")){
		                    $(".spread.tdBtn").each(function(j,trList){
		                        $(trList).find(".checkJob").prop("checked",true);
		                    })
		                }else{
		                    $(".spread.tdBtn").each(function(j,trList){
		                        $(trList).find(".checkJob").prop("checked",false);
		                    })
		                }

		            })
		            $(".checkJob,.chapterBox").click(function(e){
		                e.stopPropagation();
		            	var isNoAllChecked = true;
		                $(".spread.tdBtn").each(function(i,trList){
				            if(!$(trList).find(".checkJob").is(":checked")){
				            	isNoAllChecked = false
				            }
				        })
				        if(isNoAllChecked){
				        	$("#all-checked").attr("checked",true);
				        }else{
				        	$("#all-checked").attr("checked",false);
				        }
		            })
		        }
		    })
		    var parent_ul = $(".trifle").parent().next(".lists.section-ul");
		    parent_ul.html("");
		}
		//删除习题函数
		function delJob(sessionStorageData){
		    var exerciseArr = JSON.parse(window.sessionStorage.getItem("course_ware"));
		    $(".jobNum").text(exerciseArr.length+"/15题")
		    //删除习题
		    $("#delete-personHw").click(function(){
		        var newArr = exerciseArr;
		        $(".spread.tdBtn").each(function(i,trList){
		            if($(trList).find(".checkJob").is(":checked")){
		                for(var j = 0;j<exerciseArr.length;j++){
		                    if(exerciseArr[j] == $(trList).attr("data-id")){
		                        newArr.splice(j,1)
		                    }
		                }
		                $(trList).remove();
		            }
		        })
		        if(newArr == 0){
		            $("#all-checked").attr("checked",false);
		        }
		        sessionStorage.removeItem("course_ware");
		        sessionStorage.setItem("course_ware",JSON.stringify(newArr))
		        $(".jobNum").text(newArr.length+"/15题");
		        getLocalData()
		    })
		}


		var parpers = [] //上传文件
		$('.uploadCourseware .flex input').change(function() {
			parpers.push($(this).val());
			$('.parpers').html('');
			for(var i = 0; i < parpers.length; i++) {
				$('.parpers').append('<p><b>' + parpers[i] + '</b>&nbsp;&nbsp;<span class="blue">删除</span></p>')
			}
		});
		$('body').on('click','.parpers>p>span',function(){
			$(this).parent().remove();
			var text=$('.parpers>b').text();
			parpers=text.split('');
		})



		$("#input_number").keyup(function(){
			inputOnkeyup(this)
		})
		function inputOnkeyup(obj){
			if($(obj).val().length==1){
				$(obj).val($(obj).val().replace(/[^1-9]/g,''))
			}else{
				$(obj).val($(obj).val().replace(/\D/g,''))
			}
		}
		function inputOnafterpaste(obj){
			if($(obj).val().length==1){
				$(obj).val($(obj).val().replace(/[^1-9]/g,''))
			}else{
				$(obj).val($(obj).val().replace(/\D/g,''))
			}
		}
	    $(".addFileTool").click(function(){
	        $(this).parent().find(".addFile").click();
	    })
	    $("#save_Jobs").click(function(){
	    	var title = $("#course_title").val();
	    	var textarea = $("#course_textarea").val();
	    	var time = $("#input_number").val();
	    	var isNull = true;
	    	if(datas.length>0){
	    		if(time == ''){
    				layui.use('layer', function(){
                   		layer.msg('请输入倒计时！', {
	                        offset: 't'
	                    })
                    });
	    		}
	    	}
	    	if(!isNull){
	    		return;
	    	}
	    	var data = {
	    		'_token':token,
	    		'title':title,
	    		'content':textarea,
	    		'exercise_id':datas,
	    		'file':'',
	    		'count_down':time,
	    		'course_id':course_id
	    	}
	    	$.ajax({
	    		url:'/courseWare/createCourseware',
	    		type:'POST',
	    		data:data,
	    		success:function(data){
	    			layui.use('layer',function(){
	    				layer.msg('保存成功！', {
	                        offset: 't'
	                    })
	    			})
	    			sessionStorage.removeItem("course_ware");
	    		}
	    	})
	    })
	})
</script>
@endsection