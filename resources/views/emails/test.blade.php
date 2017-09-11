<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>InCourse</title>
    <style type="text/css">

    	.incource-email-wrap {
		    width: 800px;
		    margin: 50px auto;
		    background-color: #fff;
		    font-size: 14px;
		    color: #333;
		    font-family: "Helvetica Neue", Helvetica, Arial, "Hiragino Sans GB", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
		}
		.incource-email-main {
		    padding: 20px 40px 30px;
		    min-height: 590px;
		    border-radius: 4px;
		    border: 1px solid #d9d9d9;
		}
		.incource-logo {
		    width: 220px;
		    display: block;
		    margin: 40px auto;
		}
		.incource-msg {
		    line-height: 35px;
		}
		.incource-btn {
		    display: block;
		    margin: 40px auto;
		    font-size: 14px;
		    border-radius: 4px;
		    border: none;
		    padding: 0;
		    background: #168bee;
		}
		.incource-btn:hover {
		    background: #1681DC;
		}
		.incource-another-way {
		    margin-top: 60px;
		    padding-top: 40px;
		    border-top: 1px solid #d9d9d9;
		}
		.incource-footer {
		    margin-top: 24px;
		}
		.incource-footer b {
		    font-size: 30px;
		    float: left;
		}
		.incource-footer .incource-address {
		    float: right;
		    font-size: 12px;
		    list-style: none;
		}
		.incource-footer .incource-address li {
		    text-align: right;
		    margin-bottom: 10px;
		}
		.incource-address .incource-gray-address {
		    color: #c9c9c9;
		}
		.incource-email-main .incource-btn a {
			width: 110px;
            height: 36px;
            text-align: center;
            line-height: 36px;
            display: block;
            color: #fff;
            text-decoration: none !important;
		}
        .incource-email-main .incource-btn a:hover {
            background-color: #168bee;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="incource-email-wrap">
        <div class="incource-email-main">
            <img class="incource-logo" src="{{ asset('images/LOGO.png') }}" alt=""/>
            <p class="incource-msg">{{$name}}  您好， <br/>
                欢迎您注册 InCourse ，点击此链接来验证您的 Email，这是你么？
            </p>
            <button class="incource-btn"><a href="{{ $email }}">通过验证</a></button>
            <p class="incource-msg incource-another-way">如若按钮无效，请复制粘贴下面的链接至游览器地址打开：{{ $email }}</a></p>
        </div>
        <div class="incource-footer">
            <b>InCourse</b>
            <ul class="incource-address">
                <li class="incource-gray-address">吉林市.长春市也不知道在哪里的地址就随便乱写</li>
                <li>电子邮箱设置</li>
            </ul>
        </div>
    </div>
</body>
</html>