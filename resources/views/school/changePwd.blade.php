<div class="col-xs-12 col-sm-12" id="centery">
	<div class="ic-container">
		<div class="step-change-box">@include('school.include.stepChange')</div>
		<form id="myForm" class="myForm" name="myForm">
			<table>
				<tr>
					<td>新用户名：</td>
					<td>
						<input id="account-input" class="ic-input" name="username" type="text" placeholder="请输入用户名"/>
						<i class="isRight"></i>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="tip account-tip">用户名格式为4-15位英文、数字的组合，区分大小写</td>
				</tr>
				<tr>
					<td>当前密码：</td>
					<td>
						<input class="ic-input" name="pwd" type="password" placeholder="请输入原密码"/>
						<i class="isRight d-n"></i>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="tip">为了提高您的密码安全性，请输入原密码。</td>
				</tr>
				<tr>
					<td>新密码：</td>
					<td>
						<input id="newPwd" class="ic-input" name="newPwd" type="password" placeholder="请输入密码"/>
						<i class="isRight d-n"></i>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="tip newPwd-tip">密码由6-16个字母、数字组成，区分大小写（不能是9位以下的纯数字）</td>
				</tr>
				<tr>
					<td>密码强度：</td>
					<td class="pw-strong">
						<span></span>
						<span></span>
						<span></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="tip">为了提高您的密码安全性，建议使用英文字母加数字的混合密码</td>
				</tr>
				<tr>
					<td>确认新密码：</td>
					<td>
						<input class="ic-input" name="againPwd" type="password" placeholder="请再次输入密码"/>
						<i class="isRight d-n"></i>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="tip againPwd-tip">请输入一致的密码</td>
				</tr>
				<tr>
					<td>验证码：</td>
					<td>
						<input class="ic-input" name="code" type="text" placeholder="请输入验证码"/>
						<i class="isRight d-n"></i>
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
			<input id="submit" class="ic-btn d-b" type="submit" value="提 交"/>
		</form>
	</div>
</div>