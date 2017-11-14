<div class="screen_job border clear">
    <label class="d-b clear" style="padding-left: 70px;">
        <span class="f-l label_span" style="margin-left: -70px;">条件：</span>
        <div class="f-l">
            @if(empty($action))
            <div class="areaSelect">
                <p class="ic-text-exer">
                    <span>所有教材</span>
                    <i class="fa fa-angle-down"></i>
                </p>
                <ul class="lists-exer" style="display: none;">
                <li data="" class="exer-li">所有教材</li>
                @foreach($version_list as $id => $title)
                    <li data="{{ $id }}" class="exer-li">{{ $title }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <div class="areaSelect">
                <p class="ic-text-exer">
                    <span>第一章</span>
                    <i class="fa fa-angle-down"></i>
                </p>
                <ul class="lists-exer" style="display: none;">
                </ul>
            </div>
            <div class="areaSelect">
                <p class="ic-text-exer">
                    <span>第一小节</span>
                    <i class="fa fa-angle-down"></i>
                </p>
                <ul class="lists-exer" style="display: none;">
                </ul>
            </div>
            <div class="areaSelect">
                <p class="ic-text-exer">
                    <span>单选题</span>
                    <i class="fa fa-angle-down"></i>
                </p>
                <ul class="lists-exer" style="display: none;">
                </ul>
            </div>
        </div>
    </label>
    @if($action != "my-upload")
    <label class="d-b clear">
        <span class="f-l label_span">作者：</span>
        <div class="f-l">
            <div class="areaSelect">
                <p class="ic-text-exer">
                    <span>全部学校</span>
                    <i class="fa fa-angle-down"></i>
                </p>
                <ul class="lists-exer" style="display: none;">
                    <li data="" class="exer-li">全部学校</li>
                    @foreach($school_list as $id => $title)
                        <li data="{{ $id }}" class="exer-li">{{ $title }}</li>
                    @endforeach
                </ul>
            </div>
            @if($action != "my-conllection")
            <div class="areaSelect">
                <p class="ic-text-exer">
                    <span>全部老师</span>
                    <i class="fa fa-angle-down"></i>
                </p>
                <ul class="lists-exer" style="display: none;">
                </ul>
            </div>
            @endif
        </div>
    </label>
    @endif
    <label class="d-b clear" for="">
        <span class="f-l label_span">关键字：</span>
        <div class="f-l">
            <input class="screen_input input_focus" type="text" name="key_words" placeholder="请填写关键词">
        </div>
    </label>
    <span  class="f-r btn_span">
        <button class="btn_seek btn_select">查找</button>
        <button class="btn_empty btn_select" type="submit" id="btn-empty-select">清空</button>
    </span>
</div>