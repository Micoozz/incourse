<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/incourseReset.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/foundClass.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/student/questionTypes.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/school/step.css') }}" />
        <title>InCourse</title>
    </head>{{-- dd($workCount) --}}
        <style>
            .step-change>li:first-child span {
                color: #333;
            }
            .step-change .fa-user-o {
                color: #168bee;
            }

            #left .origin>li>a {
                color: #333;
            }
            /* 步骤 */
            @if($func == 'student-pwd')
             .step-change .fa-file-text-o {
                color: #979797;
            }
            @endif

            @if($func != 'student-pwd')
            .step-change li:nth-child(2) span {
                color: #333;
            }
            .step-change .fa-user-o, .step-change .fa-file-text-o {
                color: #168bee;
            }
            .step-change li:nth-child(2) .line {
                border-color: #168bee;
            }
            @endif
            .accout {
                padding-top: 100px;
            }
            .atitle>p{
                font-size: 16px;
                margin-bottom: 35px;
            }
            .atitle>button{
                margin-left: 45%;
            }
        </style>
    <body>
        <!-- 顶部导航 -->
        <div class="question navbar">@include('student.template.pupilHead')</div>

        @if($func != 'student-pwd' && $func != 'student-name')
        <div class="found_class question-found_class">@include('student.template.pupilClass')</div>
        @endif

        <div class="content">
            <div id="center">
                <div class="container">
                    <div class="row question-row">
                        @if($func == 'student-pwd' || $func == 'student-name')
                       <div class="col-xs-12 pupilleft" id="left"></div>
                        <!--内容--> 
                            @if($func == 'student-pwd')  
                                @include('student.content.changePwd')  
                            @elseif($func == 'student-name')  
                                @include('student.content.managerName')  
                            @endif
                        <!--右侧栏-->
                        <div class="col-xs-12 left"></div>
                        @else
                         <div class="col-xs-12 col-sm-12 question-center" id="centery">
                            @if($func == 1)
                                @include('student.content.toDayWorkList')
                            @elseif($func == 2)
                                @include('student.content.routineWork')
                            @elseif($func == 'student-pwd')  
                                @include('student.content.changePwd')  
                            @elseif($func == 'student-name')  
                                @include('student.content.managerName')  
                           @endif
                          </div>                           
                        @endif
                        <!-- 聊天窗口 -->
                      
                        <div class="chatRoom"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--高亮部分-->
        <div class="p-a part part2 d-n">
            <i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>
            <p class="f-l">快去添加校长噢～</p>
            <button class="ic-btn p-a">我知道了</button>
        </div>
        <!--遮罩层-->
        <div class="shad"></div>
        <!--script-->
        <script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/student/questionTypes.js') }}"></script>
        <script src="{{ asset('/js/student/step.js') }}" charset="utf-8"></script>
        <script>
        var token = "{{csrf_token()}}";
        var workCount = "{{ isset($workCount[0]->work_id)? $workCount[0]->work_id : NULL }}";
        console.log(workCount)
            if (!workCount) {
                $(function() {
                    setTimeout(function() {
                        $('.part2').show().addClass('position').css({
                            'top': '130px',
                            'left': '22%'
                        });

                        //遮罩层
                        $('.shad').show().height(window.innerHeight)

                        $('.question-found_class').css({
                            'z-index': '101',
                            'color': '#fff',
                            'position': 'relative'
                        });

                        $('.position').find('p').text('快去今日作业做题吧')

                        var nav; //引导
                        $('.ic-btn').on('click', function() {
                            if(nav == 1) {
                                $('.part2,.shad').hide();
                                nav=null;
                                
                            }else{
                                $('.position').find('p').text('点击科目进入科目栏')
                            $('.part2').show().addClass('position').css({
                                'top': '130px',
                                'left': '30%'
                            });
                            nav = 1
                            }
                        })
                    }, 10)
                })
            }
        $("#change").click(function() { 
           $url = "{{ URL('/kit/captcha/') }}";  
           $url = $url + "/" + Math.random();
           document.getElementById('kitCode').src=$url;
        });
        </script>
    </body>

</html>