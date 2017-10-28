function toCanvas(id , progressNow ,progress,t){
    //canvas进度条
    var canvas = document.getElementById(id),
    ctx = canvas.getContext("2d"),
    percent = progress?progress:0,  //最终百分比
    circleX = canvas.width / 2,  //中心x坐标
    circleY = canvas.height / 2,  //中心y坐标
    textX = canvas.width / 2 - 10,  //中心x坐标
    textX1 = canvas.width / 2 + 75,  //中心x坐标
    textY = canvas.height / 2 + 20,  //中心y坐标
    textY1 = canvas.height / 2 + 35,  //中心y坐标
    textY2 = canvas.height / 2 - 55,  //中心y坐标
    radius = 120, //圆环半径
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
        if(process >= 100){
            num = process.toFixed(0)
        }else{
            num = process.toFixed(2)
        }
        if (process >= percent) {
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
        ctx.fillText(t+'正确率', circleX, textY2);
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
        // process += 0.01;
        if(percent>60){
        	if (process / percent < 0.5){
        		process += 0.7
        	}else if(process / percent < 0.995){
        		process += 0.3
        	}else{
                process += 0.01
            }
        }else if(percent<60 && percent>20){
        	if(process / percent < 0.99){
        		process += 0.4
        	}else{
        		process += 0.01
        	}
        }else{
        	if (process / percent < 0.9){
            	process += 0.3;
            }else if (process / percent < 0.5){
            	process += 0.5;
            }else{
            	process += 0.01;
            }
        }
    }
    var process = progressNow;  //进度
    var circleLoading = window.setInterval(function () {
        loading();
    }, 20);
}