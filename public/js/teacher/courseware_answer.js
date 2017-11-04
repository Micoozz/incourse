//开始
    $("#answerInstrument ul li").eq(0).css({left:0});
    $("#answerInstrument li").each(function(){
        $(this).find("button").eq(0).css({marginLeft:0});
    })
    var ENnum = ["A","B","C","D","E","F","G","H"];
//答题中
    var myChartPie = echarts.init(document.getElementById('mainPie'));
    var sumStudents = parseInt($(".notSubmitted").find("b").text());
    var num = parseInt($("#countDowns b").text());
    var p = $("#showStatistics").parent();
    var dataJson,dataValue;
    var json;
    var newOption;
    var newNums = 0;
    $(".ta-c #btnStart").click(function(){
        $(this).parents("li").animate({left:'-1000px'},500);
        $(this).parents("li").next().animate({left:0},500);
        $.ajax({
            url:"http://127.0.0.1:60003/beginanswer/1",
            type:"GET",
            success:function(){
                setTimeout(function(){
                    echartsPie(st,t,newNums)
                    var st = setInterval(function(){
                        $.ajax({
                            url:'http://127.0.0.1:60003/getanswer',
                            type:'GET',
                            success:function(data){
                                var data = JSON.parse(data);
                                var nums = newNums;
                                var arrs = [];
                                for(var i in data.value){
                                    nums++;
                                }
                                echartsPie(st,t,nums)
                                answerIng(st,t,nums);
                            }
                        })
                    },1000);
                    var t = setInterval(function(){
                        countDown(st,t)
                    },1000)
                    $("#terminationTime").on("click",function(){
                        terminationTime(st,t)
                    });
                },510);
            }
        })
    })
    function stopAnswer(){
        $.ajax({
            url:'http://127.0.0.1:60003/getanswer',
            type:'GET',
            success:function(data){
                var data = JSON.parse(data);
                var d = {};
                var options = [];
                var arrss = [];
                for(var i in data.value){
                    var key;
                    var obj = {
                        "value":'',
                        'id':[],
                    }
                    if(arrss.length<=0){
                        key = '';
                        obj.value = data.value[i];
                        obj.id.push(i);
                        arrss.push(obj)
                    }else{
                        var isTrue = true
                        for(var s = 0;s< arrss.length;s++){
                            key = arrss[s].value
                            if(key == data.value[i]){
                                if(arrss[s].id.indexOf(i)<0){
                                    arrss[s].id.push(i);
                                    isTrue = false;
                                }
                            }
                        }
                        if(isTrue){
                            obj.value = data.value[i];
                            obj.id.push(i);
                            arrss.push(obj);
                        }
                    }
                }
                for(var k = 0;k<arrss.length;k++){
                    var optionJ = {
                        "option":arrss[k].value,
                        "value":arrss[k].id.length,
                        'id':arrss[k].id
                    }
                    options.push(optionJ);
                    d.options = options;
                }
                d.answer = JSON.parse($("#answerInstrument").attr("data-r-answer"));
                json = d
            }
        })
    }
    function terminationTime(st,t){
        $("#showStatistics").removeClass("noEnd");
        p.attr("href",p.attr("d-href"));
        $("#countDowns b").text(0);
        stopAnswer()
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
    function answerIng(st,t,a){
        $(".isSubmitted b").text(a);
        $(".notSubmitted b").text(sumStudents-a);
        echartsPie(st,t,a);
    }
    function echartsPie(st,t,a){
        $(".isSubmitted b").text(a);
        $(".notSubmitted b").text(sumStudents-a);
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
    };

//答题后
    //根据数据提取x轴的数组
    function json_x(json){
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
        setTimeout(barBlue,510);
        $.ajax({
            url:"http://127.0.0.1:60003/beginanswer/1",
            type:"GET",
            success:function(){}
        });
    })
    function newOptionFun(){
        newOption = {
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
                data: json_x(json)
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
                max: sumStudents,
                interval: 20,
                axisLabel: {
                    formatter: '{value} 人'
                }
            },
        }
        return newOption;
    }

    var myChartBarBlue = echarts.init(document.getElementById('mainBarBlue'));
    function barBlue(){
        newOptionFun()
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
        for(var d = 0;d<data.answer.length;d++){
            if(ENnum[parseInt(data.answer[d])-1] == option){
                html = $("#echarts_tip").html();
            }else{
                html = '';
            }
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
        setTimeout(echartsBar,510);
        upAnswerData(json)
    })
    function upAnswerData(data){
        var cardList = [];
        var answerEn = [];
        var optionArr = [];
        var isright = true;
        var rightAnswer;
        for(var i = 0;i< data.answer.length;i++){
            answerEn.push(ENnum[parseInt(data.answer[i])-1]);
        }
        for(var j = 0;j<data.options.length;j++){
            for(var k = 0;k<data.options[j].option.length;k++){
                if(answerEn.indexOf(data.options[j].option[k])<0){
                    isright=false;
                }
            }
            if(isright){
                rightAnswer = data.options[j].id;
            }
        }
        $.ajax({
            url:"http://127.0.0.1:60003/beginanswer/1",
            type:"POST",
            data:{"card_list":rightAnswer,"_token":token},
            success:function(){
                alert(1)
            }
        });
    }
    var myChartBar = echarts.init(document.getElementById('mainBar'));
    function echartsBar(){
        newOptionFun()
        $(".rido").css({display:'none'})
        // 指定图表的配置项和数据
        /*newOption.tooltip = {
                formatter: function(datas){
                    var h = echartsHtml(json,datas.data.option);
                    return h;
                },
                backgroundColor:'#fff',
            },*/
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
                        for(var i = 0;i<json.answer.length;i++){
                            if(d.data.option == ENnum[parseInt(json.answer[i])-1]){
                                c = '#168bee';
                            }
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
                            for(var i = 0;i<json.answer.length;i++){
                                if(datas.data.option == ENnum[parseInt(json.answer[i])-1]){
                                    return "正确率 "+ acc + "%" + '\n \n'+datas.data.value+'人';
                                }else{
                                    return datas.data.value+'人';
                                }
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