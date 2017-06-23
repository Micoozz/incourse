//把填空题的题目空格格式化
    function tkChange(str) {
        var obj = {};
        var tk_reg = /&空\d+&/g;
        var tk_arr = str.split(tk_reg);
        var result = "";
        
        for(var i=0; i<tk_arr.length-1; i++) {
            result += tk_arr[i] + '<span class="question-blank">空' + (i+1) + '</span>';
        }
        result += tk_arr[tk_arr.length-1];
        obj.data = result;
        if(str.match(tk_reg)) {
            obj.n = str.match(tk_reg).length;
        }

        return obj;
    }