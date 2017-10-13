@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}" />
<style>
	.radio-wrap{
		margin-left:40px;
	}
	.do-hw .view{
		height: 250px;
	}
	.echar-title{
		background-color:rgba(255,255,255,0.45);
		box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
		border-radius: 4px;
		color:#168bee;
		font-size: 12px;
		width: 90px;
		text-align: center;
		padding-bottom: 10px;
	}
	.echar-title span{
		position: relative;
		display: block;
		width: 100%;
		color: #333;
		margin-top: 5px;
		text-indent: 16px;
	}
	.echar-title b{
		display: block;
	    position: absolute;
	    width: 15px;
	    height: 15px;
	    overflow: hidden;
	    background: url(/images/uploadExerIcons.png) no-repeat;
	    background-position: -107px -112px;
	    left: 15px;
	}
	.echar-title span:nth-of-type(2) b{
	    background-position: -89px -112px;
	}	
	.echar-title span:nth-of-type(3) b{
	    background-position: -70px -112px;
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
		<div id="main" style="width: 1000px;height:400px;"></div>
		<div class="ta-c">
			<button class="ic-btn">上一步</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="ic-btn" style="width: 82px;">编辑下一题</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/courseWare/coursewareDetail"><button class="btn-white ">返回课件</button></a>
		</div>
	</div>
	@include('teacher.template.courseware_echarts_tips')
</div>
@endsection

@section('JS:OPTIONAL')
<script>
	// 基于准备好的dom，初始化echarts实例
	var myChart = echarts.init(document.getElementById('main'));
	var data = [
		{
			'value':88,
			'type': false
		},
		{
			'value':77,
			'type':true
		},
		{
			'value':66,
			'type':false
		},
		{
			'value':55,
			'type':false
		}
	];
	var dataArr = [88, 77, 66, 55];
	function echartsHtml(data,value){
		var html = '';
		for(var i = 0;i<data.length;i++){
			if(data[i].value == value){
				if(data[i].type == true){
					html = $("#echarts_tip").html()
				}else{
					html = ''
				}
			}
		}
		return html;
	}
	// 指定图表的配置项和数据
	var option = {
		title: {
			text: '人数'
		},
		grid: {
			left: '5%',
		},
		tooltip:{
			formatter: function(datas){
				console.log(datas)
				return echartsHtml(data,datas.data.value)
            },
			backgroundColor:'#fff',
		},
		xAxis: {
			//控制y轴线是否显示
			axisLine: {
				show: false
			},
			// 控制网格线是否显示
			splitLine: {
				show: false
			},
			// 去除y轴上的刻度线
			axisTick: {
				show: false
			},
			data: ["选A", "选B", "选C", "选D"]
		},
		yAxis: {
			//控制y轴线是否显示
			axisLine: {
				show: false
			},
			// 控制网格线是否显示
			splitLine: {
				show: true
			},
			// 去除y轴上的刻度线
			axisTick: {
				show: false
			},
			type: 'value',
			offset: 0,
			min: 0,
			max: 100,
			interval: 20,
			axisLabel: {
				formatter: '{value} 人'
			}
		},
		series: [{
			type: 'bar',
			barWidth: '10%',
			data: data,
			//顶部数字展示pzr
			itemStyle: {
				normal: {
					//柱形图圆角，初始化效果
					barBorderRadius: [10, 10, 10, 10],
					　　　　　　　　　　　　 //每个柱子的颜色即为colorList数组里的每一项，如果柱子数目多于colorList的长度，则柱子颜色循环使用该数组
					color: function(params) {
						var colorList = ['rgba(255,91,91,0.5)', '#168bee', 'rgba(255,91,91,0.5)', 'rgba(255,91,91,0.5)'];
						return colorList[params.dataIndex];
					},
					label: {
						show: true, //是否展示
						position: 'top',
						formatter: '{c}人',
						textStyle: {
							fontSize: '12',
							fontFamily: '微软雅黑',
							color: '#333'
						}
					}
				}
			}
		}]
	};

	// 使用刚指定的配置项和数据显示图表。
	myChart.setOption(option);
</script>
@endsection