$(function() {
	var th;
	$('.time>div>span').on('click', function() {
		$('.pull-down').hide();
		$(this).find('.pull-down').show();
		th = $(this);
	})

	//选择
	$('.pull-down>b').on('click', function() {
		th.find('span:first-child').text($(this).text());
		$(this).parent().hide();
		return false;
	});

	//添加课程
	var add = 0;
	$('.add-course>span').on('click', function() {
		add++;
		$(this).prev().append('<input draggable="true"/>')
		$(this).prev().find('input:first-child').attr('id', 'drag1')
	});

	$('.add-course>div').on('blur', 'input', function() {
		if($(this).val() != '' && $('.and>div').html() == '') {
			console.log('a')
			$(this).attr('disabled', 'disabled').addClass('bj' + parseInt(Math.random() * 3) + '')
		}
	});
	$('.add-course>div').on('mousedown', 'input', function() {
		$('.add-course>div>input').prop('id', '');
		$(this).prop('disabled', '').prop('id', 'drag1')
		box()
	});

	//拖动	

	function box() {

		document.getElementById('drag1').addEventListener('dragstart', function(event) {
			event.dataTransfer.setData("Text", event.target.id);
		})
		for(var i = 0; i < document.getElementsByClassName('and_a').length; i++) {
			document.getElementsByClassName('and_a')[i].addEventListener('drop', function(event) {
				event.preventDefault();
				var data = event.dataTransfer.getData("Text");
				$(this).append('<input draggable="true" disabled="disabled" value=' + $('#' + data).val() + ' class="' + $('#' + data).attr('class') + '" />')

			})

			document.getElementsByClassName('and_a')[i].addEventListener('dragover', function(event) {
				event.preventDefault();
			})
		}
	}

	//休息日
	function off() {
		$('.fie-right>div:last-child').css({
			height: $('.fie-right>div').height(),
			'line-height': $('.fie-right>div').height() + 'px',
		});
	};
	off();

	//选择时间

	$('body').on('click', '.actives', function() {
		$('.hourHsDate').hide();
		$(this).find('.hourHsDate').show()
	})

	for(var i = 1; i <= 24; i++) {
		if(i < 10) {
			i = '0' + i
		}
		$('.hourHsDate>span:first-child').append('<b>' + i + '</b>')
	};

	var h; //小时
	for(var j = 1; j <= 60; j++) {
		if(j < 10) {
			j = '0' + j
		}
		$('.hourHsDate>span:last-child').append('<b>' + j + '</b>')
	};

	$('body').on('click', '.hourHsDate>span:first-child>b', function() {
		$('.hourHsDate>span:first-child>b').css({
			'background-color': '#fff',
			'color': '#333'
		});
		$(this).css({
			'background-color': '#168BEE',
			'color': '#fff'
		})
		h = $(this).text();
	});

	$('body').on('click', '.hourHsDate>span:last-child>b', function() {
		if(h == undefined) {
			alert('请选择小时')
		} else {
			$(this).parents('.hourHsDate').prevAll('.active').text(h + ':' + $(this).text())
			$(this).parents('.hourHsDate').hide();
			return false;
		}
	});

	//添加时间
	var numbers = '一',
		_jia = 1;
	$('body').on('click', '.append', function() {
		_jia++;
		switch(_jia) {
			case 2:
				numbers = '二'
				break;
			case 3:
				numbers = '三'
				break;
			case 4:
				numbers = '四'
				break;
			case 5:
				numbers = '五'
				break;
			case 6:
				numbers = '六'
				break;
			case 7:
				numbers = '七'
				break;
			case 8:
				numbers = '八'
				break;
			case 9:
				numbers = '九'
				break;
			case 10:
				numbers = '十'
				break;
			default:
				numbers = '十一'
		};
		$('.fie-left').append('<div><span id="h1"><span>第' + numbers + '堂课</span><i class="fa fa-plus-circle append"></i><i class="fa fa-trash-o remove" num="' + _jia + '"></i></span><div class="times">' + $('.fie-left>div:first-child>.times').html() + '</div></div>');
		$('.fie-right>div:first-child').append('<div class="and" id="and' + _jia + '"><div class="and_a"></div><div class="and_a"></div><div class="and_a"></div><div class="and_a"></div><div class="and_a"></div></div>')
		$('.append').remove();
		if(_jia <= 10) {
			$('.fie-left>div:last-child>#h1>span').after('<i class="fa fa-plus-circle append">&nbsp;&nbsp;');
		}
		off();
	});

	//删除课程
	$('body').on('click', '#h1>.remove', function() {
		if($('.fie-left>div').length == 1) {
			alert('最少保存一条')
		} else {
			$('#and' + $(this).attr('num')).remove();
			$(this).parent().parent().remove();
		}
		off();
	});

	setTimeout(function() {
		//引导页
		$('.time').addClass('one');
		$('.part2').find('p').text('先去选择日期吧~')
		$('.guide>div').show();
		$('.guide>div:first-child').css({
			top: '280px',
			left: '50%'
		})
		var step = 0
		$('.guide>div:last-child').height(window.innerHeight)

		$('.guide').on('click', '.ic-btn', function() {
			if(step == 0) {
				$('.guide>div:first-child').css({
					top: '335px',
					left: '60%'
				});
				$('.part2').find('p').text('点击新建课程进行课程添加');
				$('.add-course').addClass('one');
				$('.time').removeClass('one');
				step = 1
			} else if(step == 1) {
				$('.guide>div:first-child').css({
					top: '495px',
					left: '46%'
				});
				$('.add-course>div').append('<input draggable="true" value="语文" class="bj0"/>')
				$('.part2').find('p').text('点击新建课程名，拖拽至下边区域，进行课程设置噢~');
				$('body').append('<img src="../../../images/admin/eduAdmin/symbols.png" class="one_img" />')
				
				step = 2
			} else if(step == 2){
				$('.guide>div:first-child').css({
					top: '470px',
					left: '38%'
				});
				$('.fie-left').addClass('one');
				$('.part2').find('p').text('点击第一堂课程设置时间~');
				$('.add-course>div').html('');
				$('.one_img').remove();
				step=3
			}else{
				$('.guide>div').hide();
				$('.fie-left').removeClass('one')
			}
		});

	}, 10)

})