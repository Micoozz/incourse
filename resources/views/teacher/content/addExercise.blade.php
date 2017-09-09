<div class="admin-container">
	<div class="filter-box-upload select-action-box">
		<div>
			<div class="chapter">
				<span class="f-l fs14">章节：</span>
				<div class="select-form clear">
					<div class="ic-text-lg">
						<p class="ic-text">
							<span>{{empty($data["exercise"]) ? "选择章篇" : $data['unit_list'][$data["exercise"]->unit_id]}}</span>
							<i class="fa fa-angle-down"></i>
						</p>
						<ul class="lists unit-ul">
							@foreach($data['unit_list'] as $id => $title)
							<li class="unit-li" data="{{$id}}">{{$title}}</li>
							@endforeach
						</ul>
					</div>
					<div class="ic-text-lg">
						<p class="ic-text">
							<span>{{empty($data["exercise"]) ? "选择小节" : $data['section_list'][$data["exercise"]->section_id]}}</span>
							<i class="fa fa-angle-down"></i>
						</p>
						<ul class="lists section-ul">
							@if(!empty($data['section_list']))
							@foreach($data['section_list'] as $id => $title)
							<li class="section-li" data="{{$id}}">{{$title}}</li>
							@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="big-box">
		<div class="exercise-box">
			<div class="exercise">
				<div class="type select-action-box p-r">
					<span class="f-l fs14">题型：</span>
					<div class="select-form clear">
						<div>
							<p class="ic-text-exer">
								<span>{{$data['categroy_list'][empty($data["exercise"]) ? 1 : $data["exercise"]->categroy_id]}}</span>
								<i class="fa fa-angle-down"></i>
							</p>
							<ul class="lists-exer">
								@foreach($data['categroy_list'] as $id => $title)
								<li data="{{$id}}" class="exer-li">{{$title}}</li>
								@endforeach
								<!-- <li>单选题</li>
								<li>多选题</li>
								<li>填空题</li>
								<li>多空题</li>
								<li>听力题</li>
								<li>判断题</li>
								<li>连线题</li>
								<li>排序题</li>
								<li>完形填空</li>
								<li>画图题</li>
								<li>计算题</li>
								<li>简答题</li>
								<li>解答题</li>
								<li>阅读题</li>
								<li>作文题</li> -->
							</ul>
						</div>
					</div>
					<i class="common-icon ic-close-icon p-acommon-icon ic-close-icon p-a"></i>
				</div>
				<!--问题框-->
				<div class="question-box">
					<div class="question clear">
						<span class="f-l fs14">问题：</span>
						<div class="ic-editor border f-l">
							<div class="tools clear">
								<button class="f-l p-r of-h addFileTool">
									<i class="tool"></i>
									<span>添加附件</span>
									<input class="addFile" type="file" />
								</button>
								<b class="vertical-line f-l"></b>
								<button class="f-l blank d-n">
									<i class="tool"></i>
									<span>插入空格</span>
								</button>
								<button class="f-l dotted">
									<i class="tool"></i>
									<span>下标点</span>
								</button>
								<button class="f-l up-dotted">
								   <i class="tool"></i>
								   <span>上标点</span>
								</button>
								<button class="f-l underline">
									<i class="tool"></i>
									<span>下划线</span>
								</button>
							</div>
							<div class="editor-content" contenteditable="true">
							{!!!empty($data["exercise"]) ? $data["exercise"]->subject : null!!}
							</div>
						</div>
					</div>
				</div>
				<!--答案框-->
				<div class="answer-wrap clear">
					<span class="f-l fs14">答案：</span>
					<div class="answer-box f-l">
						<!--单选题-->
						<div class="dan-xuan">
							<div class="dan-xuan-options dan-xuan-only">
								@if(!empty($data["exercise"]))
								@foreach($data["exercise"]->answer as $answer)
								<div class="radio-wrap dan-xuan-option>
									<label class="ic-radio border p-r">
										<i class="ic-blue-bg p-a"></i>
										<input type="radio" name="radio" value="{{$answer}}"/>
									</label>
									<div class="radio-ipt p-r">
										<span class="p-a">A：</span>
										<input class="ic-input" type="text" />
									</div>
									<i class="delete uploadExerIcons"></i>
								</div>
								@endforeach
								@endif
							</div>
							<span class="addOptionBtn addXzOptionBtn c-d ic-blue">
								<i class="uploadExerIcons"></i>
								<span>添加选项</span>
							</span>
						</div>
						<!--多选题-->
						<div class="duo-xuan d-n">
							<div class="dan-xuan-options duo-xuan-only"></div>
							<span class="addOptionBtn addXzOptionBtn c-d ic-blue">
								<i class="uploadExerIcons"></i>
								<span>添加选项</span>
							</span>
						</div>
						<!--填空题，多空题-->
						<div class="duo-kong d-n">
							<!--<div class="blank-answer p-r" data-num="1">
								<span>答案1：</span>
								<input type="text" />
							</div>-->
							@if(!empty($data["exercise"]))
							@foreach($data["exercise"]->answer as $answer)
							<div class="blank-answer p-r" data-num="1">
								<span>答案1：</span>
								<input type="text" />
							</div>
							@endforeach
							@endif
						</div>
						<!--判断题-->
						<div class="pan-duan no-active d-n">
							<ul class="ic-inline">
								<li>
									<i class="uploadExerIcons right"></i>
								</li>
								<li>
									<i class="uploadExerIcons wrong"></i>
								</li>
							</ul>
						</div>
						<!--口语题-->
						<!--
						<div class="kou-yu d-n">
							<div class="listen">
								<button class="p-r of-h ic-blue addFileTool">
									<i class="tool"></i>
									<span>添加附件</span>
									<input class="addFile" type="file" />
								</button>
								<div class="mp3-box">
									<div>
                                        <i class="uploadExerIcons p-r"></i>
                                        <span class="gray">听力（大苏打过）.mp3 （1.9M）</span>
                                        <button class="f-r ic-blue delete">删除</button>
                                    </div>
								</div>
							</div>
						</div>-->
						<!--连线题-->
						<div class="lian-xian d-n">
							<div class="lian-xian-options">
								<!--<div class="lian-xian-option">
									<input class="ic-input" type="text" />
									<input class="ic-input" type="text" />
									<i class="uploadExerIcons delete p-r"></i>
								</div>-->
							</div>
							<span class="addOptionBtn addLxOptionBtn c-d ic-blue">
								<i class="uploadExerIcons"></i>
								<span>添加选项</span>
							</span>
						</div>
						<!--排序题-->
						<div class="pai-xu d-n">
							<div class="pai-xu-options">
							<!--<div class="radio-wrap pai-xu-option">
									<div class="radio-ipt p-r">
										<span class="p-a">排序A：</span>
										<input class="ic-input" type="text" />
									</div>
									<i class="delete uploadExerIcons"></i>
								</div>-->
							</div>
							<span class="addOptionBtn addPxOptionBtn c-d ic-blue">
								<i class="uploadExerIcons"></i>
								<span>添加选项</span>
							</span>
						</div>
						<!--完形填空-->
						<div class="wan-xing-tk d-n">
							<div class="wan-xing-tk-only">
								<!--
								<div class="wan-xing-tk-option clear">
									<span class="f-l id">1.</span>
									<div class="f-l wan-xing-tk-box dan-xuan-options dan-xuan-only">
										<div class="radio-wrap">
											<label class="ic-radio border p-r">
												<i class="ic-blue-bg p-a"></i>
												<input type="radio" name="radio" value="A"/>
											</label>
											<div class="radio-ipt p-r">
												<span class="p-a">A：</span>
												<input class="ic-input" type="text" />
											</div>
										</div>
										<div class="radio-wrap">
											<label class="ic-radio border p-r">
												<i class="ic-blue-bg p-a"></i>
												<input type="radio" name="radio" value="B"/>
											</label>
											<div class="radio-ipt p-r">
												<span class="p-a">B：</span>
												<input class="ic-input" type="text" />
											</div>
										</div>
										<div class="radio-wrap">
											<label class="ic-radio border p-r">
												<i class="ic-blue-bg p-a"></i>
												<input type="radio" name="radio" value="C"/>
											</label>
											<div class="radio-ipt p-r">
												<span class="p-a">C：</span>
												<input class="ic-input" type="text" />
											</div>
										</div>
										<div class="radio-wrap">
											<label class="ic-radio border p-r">
												<i class="ic-blue-bg p-a"></i>
												<input type="radio" name="radio" value="D"/>
											</label>
											<div class="radio-ipt p-r">
												<span class="p-a">D：</span>
												<input class="ic-input" type="text" />
											</div>
										</div>
									</div>
								</div>-->
							</div>
							<div class="addFileBox">
								<button class="p-r of-h ic-blue addFileTool">
									<i class="tool"></i>
									<span>添加附件</span>
									<input class="addFile addFileCommon" type="file" />
								</button>
								<div class="imgs clear">
									<!--<div class="p-r f-l one-img">
										<img src="../../../images/Hpb_schoolLogo.png"/>
										<i class="common-icon p-a delete d-n"></i>
									</div>-->
								</div>
							</div>
						</div>
						<!--简答题,画图题,计算题-->
						<div class="jian-da d-n">
							<div class="ic-editor border">
								<div class="tools clear">
									<div class="f-l p-r of-h addFileTool">
										<i class="tool"></i>
										<span>添加附件</span>
										<input class="addFile" type="file" />
									</div>
								</div>
								<div class="editor-content" contenteditable="true"></div>
							</div>
						</div>
						<!--作文题-->
						<div class="zuo-wen d-n">略</div>
					</div>
				</div>
			</div>
		</div>
		<div class="addExerBtn-box">
			<button class="addExerBtn ic-blue c-d">
				<i class="uploadExerIcons"></i>
				<span>添加题目</span>
			</button>
		</div>
		<div class="btns">
			<button class="ic-btn" id="upload-btn">上 传</button>
			<button class="btn-white">返 回</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	var categroy_list = "";
	@foreach($data['categroy_list'] as $id => $title)
	categroy_list += '<li class="exer-li" data="{{$id}}">{{$title}}</li>';
	@endforeach
</script>
