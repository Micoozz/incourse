
        $(function () {
            $(":radio").click(function () {
                if (this.checked) {
                    if ($(this).attr("id") == "radio_1") {
                        $("#cQuestion").show();
                        $("#fBlank").hide();
                        $("#aQuestion").hide();
                    }
                    if ($(this).attr("id") == "radio_2") {
                        $("#cQuestion").hide();
                        $("#fBlank").show();
                        $("#aQuestion").hide();
                    }
                    if ($(this).attr("id") == "radio_3") {
                        $("#cQuestion").hide();
                        $("#fBlank").hide();
                        $("#aQuestion").show();
                    }
                }
            });
        });