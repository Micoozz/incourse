@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}" />
<style type="text/css">
.do-homework-wrap .exer-num .time {
	font-size: 14px;
	margin-left: 30px;
}

.do-homework-wrap .exer-num .time b {
	color: #168BEE;
	font-size: 28px;
	margin-left: 10px;
}

.mains div:first-child span:first-child b {
	color: #168BEE;
	font-size: 58px;
}

.mains div:first-child span:last-child b {
	color: #FF5B5B;
	font-size: 58px;
}

.mains div:first-child span {
	display: block;
	width: 50%;
	text-align: center;
	float: left;
}

.mains {
	position: relative;
}

.mains>div:first-child {
	position: absolute;
	z-index: 100;
	top: 50%;
	left: 50%;
	margin: -45px 0 0 -9%;
	width:18%;
}
.radio-wrap{
	margin-left:40px;
}
.do-hw .view {
    height: 250px;
}
.exer-num #countDowns{
	display: block;
}
</style>
@endsection
@section('COURSEWARE_CONTENT')

<!--内容主体-->
<div class="do-hw-wrap clear">
	<div class="f-l change-exer">
		<button id="fa-angle-left" class="fa fa-angle-left d-n"></button>
	</div>
	<!--中间内容-->
	<div class="f-l do-hw">
		<div class="of-h p-r view">
			<ul class="ic-inline p-a exercise-box">
				<!--单选题-->
				<li data-id="1" class="exer-in-list dan-xuan-only">

                    @include('teacher.template.courseware_answer')
                    
				</li>
			</ul>
		</div>
		<div class="mains">
			<div>
				<span><b>30</b>人已提交</span>
				<span><b>30</b>人已提交</span>
			</div>
			<div id="main" style="width: 1000px;height:400px;"></div>
		</div>
		<div class="ta-c">
			<a href="/courseWare/answerEndFreedom"><button class="ic-btn">查看统计</button></a>
		</div>
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script>
	$(function(){
		var num = parseInt($("#countDowns b").text());
		function countDown(){
			if(num<=0){
				num = 0;
				clearInterval(t)
				return;
			}
			num--;
			$("#countDowns b").text(num)
		}
		var t = setInterval(countDown,1000)
		// 基于准备好的dom，初始化echarts实例
		var myChart = echarts.init(document.getElementById('main'));

		option = {
			series: [{
				name: '访问来源',
				type: 'pie',
				radius: ['60%', '70%'],
				avoidLabelOverlap: false,
				label: {
					normal: {
						show: false,
						position: 'center'
					},
					emphasis: {
						show: true,
						textStyle: {
							fontSize: '30',
							fontWeight: 'bold'
						}
					}
				},
				labelLine: {
					normal: {
						show: false
					}
				},
				data: [{
						value: 535
					},
					{
						value: 1548
					}
				],
				//顶部数字展示pzr
				itemStyle: {
					normal: {
						//每个柱子的颜色即为colorList数组里的每一项，如果柱子数目多于colorList的长度，则柱子颜色循环使用该数组
						color: function(params) {
							var colorList = ['#FF5B5B', '#168bee'];
							return colorList[params.dataIndex];
						}
					}
				}
			}]
		};
		// 使用刚指定的配置项和数据显示图表。
		myChart.setOption(option);
	})
</script>
@endsection