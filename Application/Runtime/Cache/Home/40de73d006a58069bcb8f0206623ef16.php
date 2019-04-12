<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册页</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/goodslist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/usergoodslist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>
<script src="/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
<!-- <script src="/Application/Public/js/jquery.mobile-1.4.5.js"></script> -->

<style>
    /* 页面标题显示 */
    .pagetitle{
        text-align: center;
        line-height: 50px;
        /* background-color: #ffec13; */
        position: fixed;
        width: 100%;
        top: 0;
        /* box-shadow: darkgrey 0px 2px 10px 0px; */
    }
</style>
    <style>
        body{
                width: 100%;
            }
            #reg_form{
                width: 70%;
                margin: 0 auto;
            }
            #reg_form .form_div{
                width: 100%;
                height: 50px;
                text-align: center;
                border-radius: 25px;
                border: 1px solid;
                margin-bottom: 20px;
                
            }
            #reg_form input{
                text-align: center;
                padding: 0;
                margin: 0;
                border: 0;
                background-color: white;
                line-height: 48px;
            }
            #reg_form .inpname{
                float: left;
                margin-left: 20px;
            }
            #reg_form .inpinfo{
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
        <img src="/Application/Public/img/logo2.png" alt="logo" style="height:145%;">
        <!-- logo -->
    </div>
</body>
</html>
    <div>
        <form id="reg_form" method="post" action="">
            <div class="form_div" style="border:0;">
                <h4 style="font-weight:700;">用户注册</h4>
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="用户名" disabled>
                <input class="inpinfo" type="text" name="account" id="account">
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="密码" disabled>
                <input class="inpinfo" type="password" name="password" id="password" placeholder="">
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="确认密码" disabled>
                <input class="inpinfo" type="password" name="passwordR" id="passwordR" placeholder="">
            </div>
            <div id="regbtn" class="form_div" style="margin-top:60px;">
                <h4 style="line-height:30px;">注&nbsp;&nbsp;&nbsp;册</h4>
            </div>
            
        </form>
    </div>
    <a href="<?php echo U('Login/index');?>">
        <div class="other">
            ——————立即登录——————
        </div>
    </a>
</body>
<script>
    $("#regbtn").click(function(){
        var account=$("#account").val();
        var pwd=$("#password").val();
        var pwdR=$("#passwordR").val();
        if(account==""){
            layer.msg("账号不能为空");
        }else{
            if(pwd==""){
                layer.msg("密码不能为空");
            }else{
                if(pwdR==""){
                    layer.msg("确认密码不能为空");
                }else{
                    if(pwd!=pwdR){
                        layer.msg("确认密码与密码不一致");
                    }else{
                        var form_data = $("#reg_form").serializeArray();
                        console.log(form_data)
                        $.ajax({
                            url:"<?php echo U('Login/register');?>",
                            async:true,
                            data:{data:JSON.stringify(form_data)},
                            dataType:'json',
                            type:'POST',
                            success:function(res){
                                 console.log(res)
                                if(res.regflag==1){
                                    layer.msg('注册成功，即将跳转', {
                                        icon: 16,
                                        shade: 0.01
                                    });
                                    setTimeout(function () {
                                        location.href = "/index.php/Home/Index/index";
                                    }, 1500);
                                }
                                if(res.regflag==2){
                                    layer.msg('注册失败,账号已存在');
                                }
                            },
                            error:function(res){

                            }
                        })
                        
                    }
                }
            }
        }
    })
</script>
</html>