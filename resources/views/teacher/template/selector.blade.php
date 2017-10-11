<div class="screen_job border">
    <form action="" class="clear">
        @if($action != "my-upload")
        <label class="d-b clear">
            <span class="f-l label_span">地区：</span>
            <div class="f-l">

                <div class="{{$action != 'my-conllection' ? 'areaSelect':''}}">
                    <p class="ic-text-exer">
                        <span>全国</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="11">北京市</li>
                        <li data="12">天津市</li>
                    </ul>
                </div>
                <div class="{{$action != 'my-conllection' ? 'areaSelect':''}}">
                    <p class="ic-text-exer">
                        <span>全省</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="1" class="exer-li">单选题</li>
                        <li data="2" class="exer-li">多选题</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text-exer">
                        <span>全部学校</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="1" class="exer-li">单选题</li>
                        <li data="2" class="exer-li">多选题</li>
                    </ul>
                </div>
                @if($action != "my-conllection")
                <div>
                    <p class="ic-text-exer">
                        <span>全部老师</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="1" class="exer-li">单选题</li>
                        <li data="2" class="exer-li">多选题</li>
                    </ul>
                </div>
                @endif
            </div>
        </label>
        @endif
        <label class="d-b clear" style="padding-left: 70px;">
            <span class="f-l label_span" style="margin-left: -70px;">条件：</span>
            <div class="f-l">
                @if(empty($action))
                <div>
                    <p class="ic-text-exer">
                        <span>所有教材</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="11">北京市</li>
                        <li data="12">天津市</li>
                    </ul>
                </div>
                @endif
                <div>
                    <p class="ic-text-exer">
                        <span>第一章</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="1" class="exer-li">单选题</li>
                        <li data="2" class="exer-li">多选题</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text-exer">
                        <span>第一小节</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="1" class="exer-li">单选题</li>
                        <li data="2" class="exer-li">多选题</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text-exer">
                        <span>单选题</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists-exer" style="display: none;">
                        <li data="1" class="exer-li">单选题</li>
                        <li data="2" class="exer-li">多选题</li>
                    </ul>
                </div>
            </div>
        </label>
        <label class="d-b clear" for="">
            <span class="f-l label_span">关键字：</span>
            <div class="f-l">
                <input class="screen_input input_focus" type="text" name="key_words" placeholder="请填写关键词">
            </div>
        </label>
        <span  class="f-r btn_span">
            <button class="btn_seek btn_select">查找</button>
            <button class="btn_empty btn_select">清空</button>
        </span>
    </form>
</div>