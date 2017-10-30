function toCanvas(id , progressStart ,progressEnd){
    //canvas进度条
    var canvas = document.getElementById(id),
    ctx = canvas.getContext("2d"),
    percent = progressEnd?(progressEnd == 0? 0.000001:progressEnd):0.000001,  //最终百分比
    circleX = canvas.width / 2,  //中心x坐标
    circleY = canvas.height / 2,  //中心y坐标
    textX = canvas.width / 2 - 10,  //文字x坐标
    textX1 = canvas.width / 2 + 85,  //%x坐标
    textY = canvas.height / 2 + 10,  //文字y坐标
    textY1 = canvas.height / 2 + 25,  //%y坐标
    textY2 = canvas.height / 2 - 75,  //得分比y坐标
    radius = 150, //圆环半径
    lineWidth = 15,  //圆形线条的宽度
    fontSize = 60; //字体大小

  // 画圆
    function circle(cx, cy, r) {
        ctx.beginPath();
        //ctx.moveTo(cx + r, cy);
        ctx.lineWidth = lineWidth;
        ctx.strokeStyle = '#eee';
        ctx.arc(cx, cy, r, Math.PI*2.5, Math.PI * 4.5);
        ctx.stroke();
    }

  // 画弧线
    function sector(cx, cy, r, startAngle, endAngle, anti) {
        ctx.beginPath();
      //ctx.moveTo(cx, cy + r); // 从圆形底部开始画
        ctx.lineWidth = lineWidth;
      // 渐变色 - 可自定义
        /*var linGrad = ctx.createLinearGradient(
            circleX-radius-lineWidth, circleY, circleX+radius+lineWidth, circleY
        );
        linGrad.addColorStop(0.0, '#06a8f3');
        linGrad.addColorStop(0.5, '#9bc4eb');
        linGrad.addColorStop(1.0, '#00f8bb');*/
        ctx.strokeStyle = '#3DBD7D';
      // 圆弧两端的样式
        ctx.lineCap = 'round';
      // 圆弧
        ctx.arc(cx, cy, r,(Math.PI*2.5),(Math.PI*2.5) + endAngle/100 * (Math.PI*2),false);
        ctx.stroke();
    }

    // 刷新
    function loading() {
        var num
        if(progressEnd < 100){
            num = progressEnd.toFixed(2)
        }else{
            num = 100;
        }
        if (progressEnd >= percent) {
            clearInterval(circleLoading);
            return;
        }

      // 清除canvas内容
        ctx.clearRect(0, 0, circleX * 2, circleY * 2);

      // 中间的字
        // 预习正确率
        ctx.font = 24 + 'px April';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillStyle = '#999';
        ctx.fillText('得分比', circleX, textY2);
        //%
        ctx.font = 20 + 'px April';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillStyle = '#333';
        ctx.fillText('%', textX1, textY1);
         //数字
        ctx.font ='500 ' + fontSize + 'px PingFangSC-Regular';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillStyle = '#333';
        ctx.fillText(num, textX, textY);
        // 圆形
         circle(circleX, circleY, radius);
        //  圆弧
         sector(circleX, circleY, radius, Math.PI*2/3, num);
        // 控制结束时动画的速度
        if((percent - progressEnd) > 90){
            progressEnd += 18;
        }else if((percent - progressEnd) > 80){
            progressEnd += 16;
        }else if((percent - progressEnd) > 70){
            progressEnd += 14;
        }else if((percent - progressEnd) > 60){
            progressEnd += 12;
        }else if((percent - progressEnd) > 50){
            progressEnd += 10;
        }else if((percent - progressEnd) > 40){
            progressEnd += 8;
        }else if((percent - progressEnd) > 30){
            progressEnd += 6;
        }else if((percent - progressEnd) > 20){
            progressEnd += 4;
        }else if((percent - progressEnd) > 10){
            progressEnd += 2;
        }else if((percent - progressEnd) > 5){
            progressEnd += 1;
        }else if((percent - progressEnd) > 1){
            progressEnd += 0.2;
        }else if((percent - progressEnd) > 0.5){
            progressEnd += 0.1;
        }else if((percent - progressEnd) > 0.01){
            progressEnd += 0.01;
        }else{
            progressEnd += 0.001;
        }
    }
    var progressEnd = progressStart;  //进度
    var circleLoading = window.setInterval(function () {
        loading();
    }, 20);
}