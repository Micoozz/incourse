@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{asset('css/student/errorReports.css')}}" />
<style>
    .error-book-title {
        font-size: 18px;
    }
    .error-book-date {
        margin-left: 15px;
    }
    #wrongTopic {
		width: 90%;
		margin: 35px auto;
		font-size: 14px;
		padding-bottom: 10px;
	}
	.view-resolution {
		position: absolute;
		right: 50px;
		color: #168BEE;
		cursor: pointer;
	}
	#wrongTopic .proper {
		display: none;
	}
</style>
@endsection

@section('NOTEBOOK')
<div id="wrongTopic" class="pageType" data-type="4">
	<!--题目类型-->
	<!--单选题-->
	<div class="questions">
		<p>
			<span class="blue">（2016 湖南工程）</span>下列句子中，没有语病的一项是（）
			<span class="f-r gray">难易程度:
					<span>
						<i class="fa fa-star bj-yellow"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</span>
			</span>
		</p>
		<div class="optionse">
			<span><i class="fa fa-dot-circle-o red"></i>&nbsp;&nbsp;A：南宁市区各县在端午节到来之际，开展了特色鲜明、丰富多彩的传播壮乡文化。</span>
			<span><i class="fa fa-circle-o"></i>&nbsp;&nbsp;B：人们津津乐道地谈论今年年初广西姑娘石房里撞倒老人后积极救治的事迹。</span>
			<span><i class="fa fa-circle-o"></i>&nbsp;&nbsp;C：高考期间，一些爱心送考车为考生准备了考试所需的文具、风油精等提神药物。</span>
			<span><i class="fa fa-dot-circle-o bj-green"></i>&nbsp;&nbsp;D：我市越来越多的市民积极参与到“为礼让斑马线点赞”大型公益活动中来。</span>
		</div>
	</div>

	<!--判断题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
					<span>
						<i class="fa fa-star bj-yellow"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</span>
			</span>
			<div class="clear"></div>
			鲁滨孙是英国作家笛福写的小说《鲁滨孙漂流记》中的主人公。他具有勇敢、坚强、面对困难不屈不挠的精神。（）
		</p>
		<div class="optionse">
			<span><img src="{{asset('images/school/right.png')}}"/>&nbsp;&nbsp;正确</span>
			<span><img src="{{asset('images/school/wrong.png')}}"/>&nbsp;&nbsp;错误</span>
		</div>
	</div>

	<!--阅读题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
					<span>
						<i class="fa fa-star bj-yellow"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</span>
			</span>
			<div class="clear"></div>
			阅读《三峡》和《观潮》，回答下列各小题
		</p>
		<div class="optionse">
			<span>
				①四十年前，南方农村甚至小城，如果吃上一顿饺子，一定是最深刻的记忆之一。那时需要从买面粉、猪肉等原料开始，而这些都不易办到。好不容易材料齐了，头一关是和面，干了不行，稀了也不行。然后要将和好的面切成一个个小面团，再擀成饺子皮。这个难度同样不小，饺子皮要薄且圆，但太薄则易烂，太厚又煮不熟。
				<br />
				<br />
				②可以想见，这是一个浩大工程，全家分工，每个人都要撸起袖子加油干，还得提前几天就做准备。然而，全家总动员忙上大半天，做出来的饺子很可能并不好吃。
				<br />
				<br />
				③若干年后，终于有饺子皮卖了，包饺子瞬间简化了大半。渐渐地，城镇有人包饺子卖了，人们花几元钱就可以吃一顿。但不方便存放，必须现买现吃，且味道平平。
				<br />
				<br />
				④速冻饺子的出现则是一场革命。各种口味、各种品牌，高中低档，琳琅满目。平时买几袋冻在冰箱里，需要的时候，往锅里倒上水，烧开后放入饺子，几分钟捞起来就行，没有任何技术含量，时间成本、体力成本都可忽略不计。不想做饭的时候，许多人就煮饺子吃。
				<br />
				<br />
				⑤到底发生了什么，将饺子这一不可承受的浩大工程变成了懒人的首选？
				<br />
				<br />
				⑥这无论如何都是个奇迹！它不是来自伟大君王的高瞻远瞩、英雄人物的丰功伟业，也没有谁像家长那样去安排调度，统一指挥，而是源于普通人之间的合作。没错，源于平凡如你我的人之间通力合作。
				<br />
				<br />
				⑦在家庭范围内，合作的过程显而易见。有人擀皮，有人剁馅，包的包，煮的煮。然而，这种合作的范围极其有限，凭借的是管事人的安排、组织和协调。合作范围有限，意味着知识和技能有限，所能动用的资源也有限，因此，花费大量人力物力，成果却不如人意。后来，合作的范围不断扩大，从家庭到社区（小区门口包饺子卖），进而到全国（速冻水饺）。而且，速冻水饺的生产、运输和销售过程，必然会用到其他国家的技术、设备或人才。小小的饺子，可以说是全世界合作的产物。
				<br />
				<br />
				⑧合作范围的扩大产生了惊人的效果。现在，我们能够利用十倍百倍的人手，百倍千倍的知识技能，在全世界范围内调动资源，效率千倍万倍地增加，产量和质量极大提高 。人们利用素不相识甚至远在天边的人的成果，参与其中的每一个人都弄不懂完整的过程，只须做好经手的那一点工作。没有人能弄明白整个过程，但一切井井有条，各就各位，简单高效，仿佛有一只“看不见的手”在操控。
				<br />
				<br />
				⑨这就是扩展秩序及其显著成效。而且，由于合作范围扩大、合作方式更多样，我们更加独立了。任何商品，这家店没有，还有另一家；这个牌子没有，还有别的牌子。市场上买得到的任何东西都是如此，价格或许有涨跌，但供给不是问题。
				<br />
				<br />
				⑩饺子从古传到今，被封为民族特色美食，但为什么以前没有大规模生产？实际上，这并不涉及多么高精尖的技术难题，而只是因为出现了促进扩展秩序的制度环境。
			</span>
			<span>
				用“／”为文中画线句子标出停顿（每一句划一处）
				<br />
				<span>
					（1）常 有 高 猿 长 啸
				</span>
				<br />
				<span>
					（2）常 有 高 猿 长 啸
				</span>
			</span>
			<span>
				请在纸上作答，拍照上传，以便老师查看
				<br />
				<img src="{{asset('images/Cj_bg1.png')}}" style="width: 100%;"/>
			</span>
		</div>
	</div>

	<!--作文题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
			<div class="clear"></div>
			一些中学僧过生日，流行“送礼物”、“搞聚会”……你希望自己过生日能够有一个怎么样的情景？请描述你所希望的过生日的情景。（不少于100字）
		</p>
		<div class="optionse">
			<span>
				<img src="{{asset('images/Cj_bg1.png')}}" style="width: 100%;"/>
			</span>
		</div>
	</div>

	<!--简答题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
					<span>
						<i class="fa fa-star bj-yellow"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</span>
			</span>
			<div class="clear"></div>
			一些中学僧过生日，流行“送礼物”、“搞聚会”……你希望自己过生日能够有一个怎么样的情景？请描述你所希望的过生日的情景。（不少于100字）
		</p>
		<div class="optionse">
			<span>
				<img src="{{asset('images/Cj_bg1.png')}}" style="width: 100%;"/>
			</span>
		</div>
	</div>

	<!--排序题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>请把对应的题目连上线：
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
		</p>
		<div class="optionse">
			<span><span class="blue">排序A</span>&nbsp;&nbsp;当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</span>
			<span><span class="blue">排序E</span>&nbsp;&nbsp;种子在这块土地上的生活并不那么顺利，周围的各种杂草都嘲笑它，排挤它，认为它只是一粒平凡的种子</span>
			<span><span class="red">排序D</span>&nbsp;&nbsp;虽然它经受着黑暗的恐惧，暴雨的侵袭，但是它依然努力地生长着。</span>
			<span><span class="red">排序C</span>&nbsp;&nbsp;从此，它变得沉默，只有它知道它在努力，它在默默地汲取土壤中的养</span>
			<span><span class="blue">排序B</span>&nbsp;&nbsp;不久，它从泥土里探出了小脑袋，渐渐地，种子变成了嫩芽。</span>

		</div>
	</div>

	<!--多空题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
		</p>
		<div class="optionse">
			There has been much hand-writing about how unprepared American students are for college. Graff reverses this perspective, suggesting that colleges are unprepared for students.<b class="red">___</b> In his analysis, the university culture is largely entering students because academic culture fails to make connections to the kinds of arguments and cultural references that students grasp. Understandably, man students view academic life as ritual.
		</div>
	</div>

	<!--填空题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
		</p>
		<div class="optionse">
			There has been much hand-writing about how unprepared American students are for college. Graff reverses this perspective, suggesting that colleges are unprepared for students.<b class="red">___</b> In his analysis, the university culture is largely entering students because academic culture fails to make connections to the kinds of arguments and cultural references that students grasp. Understandably, man students view academic life as ritual.
		</div>
	</div>

	<!--画图题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
			<div class="clear"></div>
			一个运动场的形状是：中间是个长方形，长是40米，宽20米；两头是以宽为直径的各一个半圆形。请你有1：1000的比例尺画出这个运动场。请你先计算出长宽所需数据，后在下面画图。
		</p>
		<div class="optionse">
			<img src="{{asset('images/Cj_bg1.png')}}" style="width: 100%;" />
		</div>
	</div>

	<!--听力题-->
	<div class="questions" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
		</p>
		<div class="optionse">
			There has been much hand-writing about how unprepared American students are for college. Graff reverses this perspective, suggesting that colleges are unprepared for students.<b class="red">___</b> In his analysis, the university culture is largely entering students because academic culture fails to make connections to the kinds of arguments and cultural references that students grasp. Understandably, man students view academic life as ritual.
			<div>
				<audio src="" controls></audio>
			</div>
		</div>
	</div>

	<!--连线题-->
	<div class="questions lian-xian-1" style='display: none;'>
		<p>
			<span class="blue">（2016 湖南工程）</span>请把对应的题目连上线：
			<span class="f-r gray">难易程度:
				<span>
					<i class="fa fa-star bj-yellow"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</span>
		</p>
		<div class="optionse">
			<div class="box_hpb">
				<div class="line_hpb">
					<ul class="question_hpb">
						<li style="top:0;">湖广会馆放到奋斗奋斗方法</li>
						<li style="top:54px;">大妈</li>
						<li style="top:108px;">大嫂</li>
					</ul>
					<div class="container_hpb">
						<canvas class="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
						<canvas class="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
					</div>
					<ul class="answer_hpb">
						<li style="top:0;">哥哥</li>
						<li style="top:54px;">大姨</li>
						<li style="top:108px;">大妈</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="view-resolution">查看解析 <i class="fa fa-angle-down"></i></div>

	<div class="proper">
		<!--连线题-->
		<div style='display: none;'>
			<p>正确答案是1连3 2连2 3连4 4连1</p>
			<p>回答错误，作答用时1秒。</p>
		</div>

		<!--听力题-->
		<div style='display: none;'>
			<p>得分5分，总分10分，回答错误，作答用时1秒。</p>
			<p>本题备作答次数261738次，正确率为68%，易错项为错误。</p>
		</div>

		<!--排序题-->
		<div style='display: none;'>
			<p>正确答案是AEBCDF，你的答案是AEDCB</p>
			<p>回答错误，作答用时1秒。</p>
		</div>

		<!--单选题-->
		<div>
			<p>正确答案是<b class="bj-green">D</b>，你的答案是 <span class="red">A</span>。回答错误，作答用时1秒。</p>
			<p>本题备作答次数261738次 本题正确率:68% 易错项:B</p>
		</div>

		<!--判断题-->
		<div style='display: none;'>
			<p>正确答案是正确，你的答案是错误。回答错误，作答用时1秒。</p>
			<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p>
		</div>

		<!--阅读题-->
		<div style='display: none;'>
			<p>回答错误，作答用时1秒。</p>
			<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p>
		</div>

		<!--多空题题-->
		<div style='display: none;'>
			<p>正确答案是 so science 你的答案是<span class="red">as education</span>
			</p>
			<p>得分4分，总分10分</p>
			<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p>
		</div>

		<!--画图题题-->
		<div style='display: none;'>
			<p>正确答案是 <img src="../../images/Cj_bg1.png" style="width: 100%;" /></span>
			</p>
			<p>得分4分，总分10分</p>
			<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p>
		</div>

		<div class="proper_div">
			<p>解析：</p>
			<span>A项目，成分残缺，“展开”后面缺宾语。应改为“开展了特色鲜明、丰富多彩的活动来传播壮乡文化。”选项有语病病</span>
			<span>B项目，成分累赘，“津津乐道”指很有兴趣地说个不停，喝“谈论”词语重复。应改为“人们谈论着今年年初广西姑娘石房里撞倒老人后积极救治的事迹”。选项有语病。</span>
			<span>C项目，概念误用，“文具”不是提神药物。应改为“一些爱心送考车为考生准备了考试所需要的风油精等提神药品”。选项有语病。</span>
			<span>D项目，选项没有语病。</span>
			<br />
			<span>本题要求选择没有语病的一项。</span>
			<br />
			<span>综上所述，本题答案为D项。</span>
		</div>
		<p>来源：2017年湖南工程学院初中毕业升学考试：第三章病句解析与修改，第四题。</p>
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="{{asset('js/index.js')}}" charset="utf-8"></script>
<script>
	$(function() {
		var trues = 1;
		$('.view-resolution').click(function() {
			if(trues == 1) {
				$(this).find('i').attr('class','fa fa-angle-up')
				$('#wrongTopic .proper').show();
				trues = 0
			} else {
				$(this).find('i').attr('class','fa fa-angle-down')
				$('#wrongTopic .proper').hide()
				trues = 1
			}
		})

	})
</script>
@endsection