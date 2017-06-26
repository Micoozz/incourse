$(function () {
    //点亮顶部导航和左侧导航栏对应项
    $(".head_nav>li:nth-child(2)>a, .head_nav>li:last-child>a").addClass("blue");
    $("#nav1>li:first-child>a").addClass("box");
    sessionStorage.removeItem("inCourse-course");

	//重写Date的toLocalString
	Date.prototype.toLocaleString = function() {
		var h = this.getHours();
		var m = this.getMinutes();
		h = h.toString().length===1 ? ("0"+h) : h;
		m = m.toString().length===1 ? ("0"+m) : m;
		return (this.getMonth() + 1) + '-' + this.getDate() + ' ' + h + ':' + m;
	}
	//格式化日期
	function changeTime(param) {
		var time = new Date(param*1000);
		return time.toLocaleString();
	}
	//耗时计算
	function takeTime(start,end) {
		var take = end - start;
		var h = parseInt(take/3600);
		var m = (take - h*3600) / 60;
		return h +　"时" + m + "分";
	}
	



    //加载作业列表内容
    function loadResource(courseID) {
        //语文-1，数学-2，物理-3，化学-4，英语-5
        $.get("showWorkList/" + courseID + "/1").success(function(data){
        var data = JSON.parse(data).works;
        var html = '';
        data.forEach(function(item) {
            var pub_time = changeTime(item.pub_time);
            var deadline = changeTime(item.deadline);
            var take = item.sub_time===0 ? "计算中" : takeTime(item.start_time, item.sub_time);
            if(item.type === 1) {
                html += '<div class="homework-list row">\
                            <a class="homework-type-link" data-id="' + item.work_id + '">\
                                <img src="images/homework/engage/single.png" class="homework-type-select-img"/>\
                                <span class="homework-order">' + item.title + '</span>\
                            </a>\
                            <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0" cellspacing="0">\
                                <tr>\
                                    <td>\
                                        <div class="homework-list-circle-single">\
                                        <span class="circle-value1">' + pub_time + '</span>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class="homework-list-circle-single">\
                                        <span class="circle-value2">' + deadline + '</span>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class="homework-list-circle-single">\
                                        <span class="circle-value3">' + take + '</span>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class="homework-list-circle-single">\
                                        <span class="circle-value4">' + item.score + '</span>\
                                        </div>\
                                    </td>\
                                    <td>\
                                        <div class="homework-list-circle-single">\
                                        <span class="circle-value5">' + item.status + '</span>\
                                        </div>\
                                    </td>\
                                </tr>\
                                <tr>\
                                    <td>发布时间</td>\
                                    <td>截止时间</td>\
                                    <td>耗时</td>\
                                    <td>得分</td>\
                                    <td>状态</td>\
                                </tr>\
                            </table>\
                        </div>';
                $(".homework-list-box").html(html);
            }
        })
    });
    }
    loadResource(1);

    //点击学科显示相应学科的作业
    var courseID = ["语文","数学","物理","化学","英语"];
    $("#cent_nav ul>li:not(:first-child").click(function(){
        var course = $(this).text();
        sessionStorage.setItem("inCourse-course",course);
        $("#col").text(course);
        var id = (courseID.indexOf(course)) + 1;
        console.log(id);
        loadResource(id);
    });
    
	
	//点击作业保存作业ID
	$(".homework-list-box").on("click",".homework-type-link",function(){
		const id = $(this).attr("data-id");
		sessionStorage.setItem("homeworkId",id);
		window.location.href = "/zuoyeben-index";
	})

    $(".not-open").click(function () {
        $(".not-open-tips").fadeIn().fadeOut(2000);
    });
})
