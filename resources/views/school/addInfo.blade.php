<div class="col-xs-12 col-sm-12 addInfo" id="centery">
	<div class="ic-container">
		<div class="step-change-box">@include('school.include.stepChange')</div>

		<form class="myForm">
			<table>
				<tr>
					<td>学校名称：</td>
					<td>
						<div class="select-wrap select-action-box">
							<div class="select-form clear">
								<div class="province">
									<p class="ic-text">
										<span>选择省份</span>
										<i class="fa fa-angle-down"></i></p>
									<ul class="lists province-ul">
									@foreach($provinces as $province)
										<li data='{{$province->id}}' class="province-li">{{ $province->name }}</li>
									@endforeach
									</ul>
								</div>
								<div class="city">
									<p class="ic-text">
										<span id="city_id" ref="">市区</span>
										<i class="fa fa-angle-down"></i></p>
									<ul class="lists">
									</ul>
								</div>
								<div class="school">
									<p class="ic-text">
										<span>学校</span>
										<i class="fa fa-angle-down"></i></p>
									<ul class="lists">
										<li>小学</li>
										<li>初中</li>
										<li>高中</li>
										<li>大学</li>
									</ul>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr class="schoolName">
					<td>学校名称：</td>
					<td>
						<input class="ic-input schoolName-input" type="text"/>
					</td>
				</tr>
				<tr class="email-box">
					<td>电子邮箱：</td>
					<td class="p-r">
						<input id="email" class="ic-input" type="text" placeholder="123456@163.com"/>
						<i class="isRight"></i>
						<span class="p-a tip red email-tip d-n">邮箱格式不正确</span>
					</td>
				</tr>
				<tr>
					<td>验证码：</td>
					<td>
						<input class="ic-input code" type="text" placeholder="请输入验证码"/>
						<i class="isRight"></i>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="tip">请输入图中字符，不区分大小写</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<img class="code" src="{{ URL('kit/captcha/1') }}" alt="验证码" id="kitCode" />
						<span class="ic-blue another-code"><a id="change" href="javascript:;">看不清，换一张<a></span>
					</td>
				</tr>
			</table>
			<div class="btns">
				<button id="bind-email-btn" class="ic-btn">绑定邮箱</button>
				<button onclick="window.history.go(-1);"" class="btn-white">返 回</button>
			</div>
		</form>
		<div class="bind-email-box fs14 d-n">
			<div>
				<p class="clear">
					<i class="fa fa-envelope-open-o f-l p-r"></i>
					<span class="f-l">
						感谢绑定！邮件已发送到您的邮箱：
						<span class="ic-blue email"></span>
						。请进入邮箱查看邮件，<br/>完成身份验证。
					</span>
				</p>
				<button class="ic-btn check-email">立刻查看邮件</button>
			</div>
			<div class="not-receive">
				<b class="fs14">没有收到邮箱？</b>
				<ul>
					<li>1、请检查邮箱地址是否正确，你可以返回
						<span id="rewrite" class="ic-blue c-d">重新填写</span>
						。
					</li>
					<li>2、请检查是否在垃圾邮件内。如果还未收到，请
						<span id="resend" class="ic-blue c-d">重新发送</span>
						。
					</li>
					<li class="gray time-send">（60秒后重新发送邮件）</li>
				</ul>
			</div>
		</div>
	</div>
</div> 