<div class="clear answer-box">
    <span class="f-l">答案：</span>
    <div class="f-l">
        <ul class="{{$exercise->categroy_id == 1 || $exercise->categroy_id == 2 ? 'radio-wrap' : ''}} exer-list-ul">

            <!-- 单选题 -->
            @if($exercise->categroy_id == 1)
            @foreach($exercise->options as $option)
            <li>
                <label class="ic-radio border p-r f-l {{in_array(key($option),$exercise->answer) ? "active" : ""}}">
                    <i class="ic-blue-bg p-a"></i>
                    <input type="radio" name="radio" value="{{key($option)}}" {{in_array(key($option),$exercise->answer) ? "checked" : ""}}/>
                </label>
                <span class="f-l"></span>
                <p class="f-l option">{{$option[key($option)]}}</p>
            </li>
            @endforeach

            <!-- 多选题 -->
            @elseif($exercise->categroy_id == 2)
            @foreach($exercise->options as $option)
            <li>
                <label class="ic-radio border p-r f-l {{in_array(key($option),$exercise->answer) ? "active" : ""}}">
                    <i class="ic-blue-bg p-a"></i>
                    <input type="checkbox" name="checkbox" value="{{key($option)}}" {{in_array(key($option),$exercise->answer) ? "checked" : ""}}/>
                </label>
                <span class="f-l"></span>
                <p class="f-l option">{{$option[key($option)]}}</p>
            </li>
            @endforeach

            <!-- 填空题 -->
            @elseif($exercise->categroy_id == 3)
            @foreach($exercise->answer as $answers)
            <li>
                <span class="f-l exer-ans-order">{{$loop->index + 1}}.</span>
                <p class="f-l option">{{$answers}}</p>
            </li>
            @endforeach

            <!-- 判断题 -->
            @elseif($exercise->categroy_id == 4)
            @foreach($exercise->answer as $answers)
            <li>
                <span data-answer="{{$answers == 1 ? 1 : 0 }}" class="f-l exer-ans-order TOrF_img" style="{{$answers == 1 ? 'background-position:-22px -86px' : 'background-position:-70px -86px'}}">
                </span>
            </li>
            @endforeach

            <!-- 连线题 -->
            @elseif($exercise->categroy_id == 5)

            <!-- 排序题 -->
            @elseif($exercise->categroy_id == 6)
            @foreach($exercise->options as $key => $option)
            <li class="sort_list">
                @foreach($option as $optionList)
                <span class="f-l exer-ans-order"></span>
                <p class="f-l option">{{$optionList}}</p>
                @endforeach
            </li>
            @endforeach
            @endif
        </ul>
    </div>
</div>