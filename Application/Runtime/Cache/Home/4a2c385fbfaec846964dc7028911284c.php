<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>

    <style>
        body{
            width: 100%;
        }
        #log_form{
            width: 70%;
            margin: 0 auto;
        }
        #log_form .form_div{
            width: 100%;
            height: 50px;
            text-align: center;
            border-radius: 25px;
            border: 1px solid;
            margin-bottom: 20px;
            
        }
        #log_form input{
            text-align: center;
            padding: 0;
            margin: 0;
            border: 0;
            background-color: white;
            line-height: 48px;
        }
        #log_form .inpname{
            float: left;
            margin-left: 20px;
        }
        #log_form .inpinfo{
            /* height: 50px; */
            float: left;
            margin-left: 5px;
            outline: none;
        }
        .other{
            width: 70%;
            margin: 0 auto;
            text-align: center;
            color: black;
        }
        a,a:hover,a:active,a:visited{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .logo {
            width: 100%;
            text-align: center;
            line-height: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div id="logo" class="logo">
        logo
    </div>
</body>
</html>
    <div>
        <form id="log_form" method="post" action="">
            <div class="form_div" style="border:0;">
                <h4 style="font-weight:700;">用户登录</h4>
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="用户" disabled>
                <input class="inpinfo" type="text" name="account" id="account">
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="密码" disabled>
                <input class="inpinfo" type="password" name="password" id="password">
            </div>
            <div id="logbtn" class="form_div" style="margin-top:60px;">
                <h4 style="line-height:30px;">登&nbsp;&nbsp;&nbsp;录</h4>
            </div>          
        </form>
    </div>
    <a href="<?php echo U('Login/register');?>">
        <div class="other">
            ———————注册新用户———————
        </div>
    </a>
</body>
<script>
    // 用户名验证先不做
    // 用户登录ajax提交
    $("#logbtn").click(function(){
        var account=$("#account").val();
        var pwd=$("#password").val();
        if(account!="" && pwd!=""){
            var form_data = $("#log_form").serializeArray()
            console.log(form_data)
            $.ajax({
                url: "<?php echo U('Login/index');?>",
                async: true,
                data: { data: JSON.stringify(form_data) },
                dataType: "json",
                type: "POST",
                success: function (res) {
                    console.log(res)
                    if (res == 1) {
                        console.log('登录成功');
                        
                        location.href="/index.php/Home/Index/index";
                    }
                    if (res == 2) {
                        console.log('登录失败');
                    }
                },
                error: function (res) {

                }
            })
        }else{
            console.log("账号密码不能为空");
        }
        
    })

    // 按钮绑定回车事件
    $("body").keydown(function(){
        if(event.keyCode == 13){
            $("#logbtn").click();
        }
    })
</script>
</html>