<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>

<p>该实例演示了如何使用 HTML DOM 向 body 元素添加 "onbeforeunload" 事件。</p>
<p>关闭当前窗口，按下 F5 或点击以下链接触发 onbeforeunload 事件。</p>
<a href="http://www.runoob.com">点击调整到菜鸟教程</a>
<script language="javascript"> 
	window.addEventListener("beforeunload", function (event) {
	  // var confirmationMessage = "\o/";

	  // (e || window.event).returnValue = confirmationMessage;     // Gecko and Trident
	  // return confirmationMessage;                                // Gecko and WebKit
	  console.log(event.clientX);
	  console.log(document.body.clientWidth);
	  console.log(event.clientY);
	  console.log(event.altKey);
	  console.log(window.event.screenX);
	  console.log(event);
	  event.preventDefault();
	  event.returnValue = '';
	});
</script>

</body>
</html>