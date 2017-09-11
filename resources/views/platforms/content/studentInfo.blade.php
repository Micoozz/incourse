<div class="col-xs-12 col-sm-12 addInfo" id="centery">
	<div class="ic-container">
		<div class="step-change-box terrace">@include('school.include.stepChange')</div>
		<form class="myForm terrace-form">
			<table>
				<tr class="email-box">
					<td>学生姓名：</td>
					<td class="p-r">
						<input id="email" class="ic-input" type="text" placeholder="请输入姓名" />
					</td>
				</tr>
				<tr class="sexuality">
					<td>
						<div class="f-l radio-box">
							<span class="f-l">性别：</span>
							<label class="man p-r f-l">
					<p class="radio active sex">
						<i></i>
					</p>
					<input class="d-n" type="radio" name="gender" value="1" /> 男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</label>
							<label class="p-r f-l">
					<p class="radio sex">
						<i></i>
					</p>
					<input class="d-n" type="radio" name="gender" value="0"  /> 女
				</label>
						</div>
					</td>
				</tr>
			<!-- 	<tr class="account">
					<td>科目：</td>
					<td class="p-r">
						<select name="">
							<option value="">语文</option>
						</select>
					</td>
				</tr>			 -->							
				<tr>
					<td><button class="ic-btn submit">完&nbsp;&nbsp;&nbsp;成</button></td>
				</tr>
				<tr>
					<td>
						<div class="class-box">
							<div>
								
							</div>
							<button class="ic-btn">完&nbsp;&nbsp;&nbsp;成</button>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>