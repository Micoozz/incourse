@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}" />
<style>
	.box{
		color: #1681DC;
	}
				.radio-wrap{
		margin-left:40px;
	}
	.rido{
		display: flex;
		position: relative;	
		top: -30px;
	}
	.rido>div{
		margin-left: 92px;
		display: flex;
		width: 858px;		
				}
	.rido>div span{
		flex: 1;
		cursor: pointer;
	}
	.do-hw .view {
	    height: 250px;
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
		<div id="main" style="width: 1000px;height:340px;"></div>
		<div class="rido">
			<span>正确答案</span>
			<div class="ic-blue">
				<span><i class="fa fa-circle-o"></i></span>
				<span><i class="fa fa-circle-o"></i></span>
				<span><i class="fa fa-circle-o"></i></span>
				<span><i class="fa fa-circle-o"></i></span>
			</div>
		</div>
		<div class="ta-c">
			<a href="/courseWare/showSolutionFreedom"><button class="ic-btn">确认答案</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script>
	$(function(){
		$('.rido i').click(function(){
			$('.rido i').attr('class','fa fa-circle-o')
			$(this).attr('class','fa fa-dot-circle-o')
		})
	})			
	
	// 基于准备好的dom，初始化echarts实例
	var myChart = echarts.init(document.getElementById('main'));

	// 指定图表的配置项和数据
	var option = {
		title: {
			text: '人数'
		},
		grid: {
			left: '5%',
		},
		/*tooltip:{
			formatter: '<div style="color:#168bee">提交答案名单</div>',
			backgroundColor:'#fff',
			padding:5,
		},*/
		color: ['#168bee'],
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
			data: [88, 77, 66, 55],
			//顶部数字展示pzr
			itemStyle: {
				normal: {
					//柱形图圆角，初始化效果
					barBorderRadius: [10, 10, 10, 10],
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