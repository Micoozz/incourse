$(function() {
	var a = $(window).height();
	var b = $(window).width();
	$('.opca').css({
		width: b,
		height: a
	});
	$('form>input').last().click(function() {
		$('.succeed').show();
		$('.opca').show();
		var time = setInterval(function() {
			$('.succeed').hide();
			$('.opca').hide();
			url = location.href; //�ѵ�ǰҳ��ĵ�ַ������� url
			self.location.replace(url); //ˢ��ҳ��
			clearInterval(time)
		}, 1000)
	});
});
$(function() {
	$('.affi').click(function() {
		$('#last_1').show();
		$('.opca').show();
	});
	$('.opca').click(function() {
		$('#last_1').hide();
		$(this).hide();
	});
});
$(function() {
	$('.select').change(function() {
		var a = $(this).val();
		$('#last_1>h2').text(a)
	});
})