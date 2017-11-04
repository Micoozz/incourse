//开始
    $("#answerInstrument ul li").eq(0).css({left:0});
    $("#answerInstrument li").each(function(){
        $(this).find("button").eq(0).css({marginLeft:0});
    })

//答题中
    var myChartPie = echarts.init(document.getElementById('mainPie'));
    var a = 0;
    var sumStudents = parseInt($(".notSubmitted").find("b").text());
    var num = parseInt($("#countDowns b").text());
    var p = $("#showStatistics").parent();
    $(".ta-c .btnStart").click(function(){
        $(this).parents("li").animate({left:'-1000px'},500);
        $(this).parents("li").next().animate({left:0},500);
        setTimeout(function(){
            answerIng();
            var st = setInterval(function(){
                echartsPie(st,t)
            },1000);
            var t = setInterval(function(){
                countDown(st,t)
            },1000)
            $("#terminationTime").on("click",function(){
                terminationTime(st,t)
            });
        },510);
    })
    function terminationTime(st,t){
        $("#showStatistics").removeClass("noEnd");
        p.attr("href",p.attr("d-href"));
        $("#countDowns b").text(0);
        clearInterval(st);
        clearInterval(t);
    }
    function countDown(st,t){
        if(num<=0){
            num = 0;
            $("#showStatistics").removeClass("noEnd");
            p.attr("href",p.attr("d-href"));
            clearInterval(t);
            clearInterval(st);
            return;
        }
        num--;
        $("#countDowns b").text(num);
    };
    function answerIng(){
        $(".isSubmitted b").text(a);
        $(".notSubmitted b").text(sumStudents);
        echartsPie();
    }
    function echartsPie(st,t){
        if(a>(sumStudents+a)){
            terminationTime(st,t);
            return;
        };
        $(".isSubmitted b").text(a);
        $(".notSubmitted b").text(sumStudents);
        var option = {
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
                        value: sumStudents
                    },
                    {
                        value: a
                    }
                ],
                //顶部数字展示pzr
                itemStyle: {
                    normal: {
                        //每个柱子的颜色即为colorList数组里的每一项，如果柱子数目多于colorList的长度，则柱子颜色循环使用该数组
                        color: function(params) {
                            var colorList = ['#FF2b55', '#168bee'];
                            return colorList[params.dataIndex];
                        }
                    }
                }
            }]
        };
        // 使用刚指定的配置项和数据显示图表。
        myChartPie.setOption(option);
        a++;
        sumStudents--;
    };

//答题后
    //数据
    var json = {
        'options':[
            {
                'option':'A',
                'value':88,
            },
            {
                'option':'B',
                'value':77,
            },
            {
                'option':'C',
                'value':66,
            },
            {
                'option':'D',
                'value':55,
            }
        ],
        'answer':'B'
    };
    //根据数据提取x轴的数组
    function json_x(){
        var arr = [];
        for(var i = 0;i<json.options.length;i++){
            arr.push("选项"+json.options[i].option)
        }
        return arr;
    }

    $("#showStatistics").click(function(){
        if($(this).hasClass("noEnd")){
            return;
        }
        $(this).parents("li").animate({left:'-1000px'},500);
        $(this).parents("li").next().animate({left:0},500);
        setTimeout(barBlue,510)
    })

    var newOption = {
        title: {
            text: '人数'
        },
        grid: {
            left: '5%',
        },
        xAxis: {
            axisLine: {
                show: false,
                lineStyle:{
                    color:'rgba(0,0,0,0.43)'
                },
            },
            splitLine: {
                show: false
            },
            axisTick: {
                show: false
            },
            data: json_x()
        },
        yAxis: {
            //控制y轴线是否显示
            axisLine: {
                show: false,
                lineStyle:{
                    color:'rgba(0,0,0,0.43)'
                },
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
    }
    var myChartBarBlue = echarts.init(document.getElementById('mainBarBlue'));
    function barBlue(){
        $(".rido").css({display:'block'})
        newOption.tooltip = "";
        newOption.series = [{
            type: 'bar',
            barWidth: '10%',
            data: json.options,
            //顶部数字展示pzr
            itemStyle: {
                normal: {
                    //柱形图圆角，初始化效果
                    barBorderRadius: [10, 10, 10, 10],
                    color:'#168bee',
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

        // 使用刚指定的配置项和数据显示图表。
        myChartBarBlue.setOption(newOption);
    }




//展示答案
    //echarts悬浮层是否显示及显示的内容
    function echartsHtml(data,option){
        var html='';
        if(data.answer == option){
            html = $("#echarts_tip").html();
        }else{
            html = '';
        }
        return html;
    };
    $('.rido i').click(function(){
        $('.rido i').attr('class','fa fa-circle-o')
        $(this).attr('class','fa fa-dot-circle-o');
        var index = $(this).parent().index()
        console.log(json.options[index].option)
    })
    $("#showAnswer").click(function(){
        if($(this).hasClass("noEnd")){
            return;
        }
        $(this).parents("li").animate({left:'-1000px'},500);
        $(this).parents("li").next().animate({left:0},500);
        setTimeout(echartsBar,510)
    })
    var myChartBar = echarts.init(document.getElementById('mainBar'));
    function echartsBar(){
        $(".rido").css({display:'none'})
        // 指定图表的配置项和数据
        newOption.tooltip = {
                formatter: function(datas){
                    var h = echartsHtml(json,datas.data.option);
                    return h;
                },
                backgroundColor:'#fff',
            },
        newOption.series = [{
            type: 'bar',
            barWidth: '10%',
            data: json.options,
            //顶部数字展示pzr
            itemStyle: {
                normal: {
                    //柱形图圆角，初始化效果
                    barBorderRadius: [10, 10, 10, 10],
                    //每个柱子的颜色即为colorList数组里的每一项，如果柱子数目多于colorList的长度，则柱子颜色循环使用该数组
                    color:function(d){
                        var c = 'rgba(255,91,91,0.5)';
                        if(d.data.option == json.answer){
                            c = '#168bee';
                        }
                        return c;
                    },
                    label: {
                        show: true, //是否展示
                        position: 'top',
                        formatter: function(datas){
                            var sum = 0
                            for(var j = 0;j<json.options.length;j++){
                                sum += json.options[j].value;
                            }
                            var acc = (datas.data.value/sum*100).toFixed(2);
                            if(datas.data.option == json.answer){
                                return "正确率 "+ acc + "%" + '\n \n'+datas.data.value+'人';
                            }else{
                                return datas.data.value+'人';
                            }
                        },
                        textStyle: {
                            fontSize: '12',
                            fontFamily: '微软雅黑',
                            color: '#333'
                        }
                    }
                }
            }
        }]

        // 使用刚指定的配置项和数据显示图表。
        myChartBar.setOption(newOption);
    }