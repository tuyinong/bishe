<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理系统入口</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap-datetimepicker.min.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>
<script src="/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
<script src="/Application/Public/js/echarts.min.js"></script>
<!-- 表格 -->
<style>
    .body{
        width: 100%;
        padding: 50px 0 0 280px;
    }
    .box {
        height: 100%;
        border: 1px solid black;
        margin: 7px;
    }
    @font-face {
        font-family: myttf;
        src: url("/Application/Public/fonts/Kim's GirlType.ttf");
    }
    .rowbox {
        height: 100%;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .rowbox .title {
        height: 50px;
        border-bottom: 1px solid #e8e8e8;
        font-size: 16px;
        /* line-height: 50px; */
        font-weight: 700;
        font-family: myttf;
        padding: 20px;
    }
     /* 表单样式 */
    label {
        font-family: myttf;
        margin: 0 20px 0 5px;
    }
    .mybtn {
        margin-left: 20px;
    }
    /* 表格 */
    .tablebox {
        margin: 5px;
        padding: 5px;
        border: 1px solid #999999;
    }
    .tablebox th {
        text-align: center;
    }
    .tablebox tr>td {
        font-size: 20px;
        text-align: center;
    }
</style>

<!-- 分页 -->
<style>
    .page{
        height: 30px;
    }
    .page>div{
        float: right;
    }
    .page span {
        font-size: 18px;
        padding: 5px 10px;
        cursor: pointer;
        border: 1px solid #dfdfdf;
        border-radius: 3px;
    }
    .page span:hover {
        font-size: 18px;
        padding: 5px 10px;
    }

    .page span::after {
        font-size: 18px;
        padding: 5px 10px;
    }
    .page a {
        font-size: 18px;
        padding: 5px 10px;
        text-decoration: none;

    }
    .page a:hover,
    .page a:active,
    .page a:visited {
        font-size: 18px;
        padding: 5px 10px;
        margin: 0;
        line-height: 100%;
        text-decoration: none;
        color: #acacaf;
    }
    .page a::after {
        font-size: 18px;
        padding: 5px 10px;
        text-decoration: none;
        color: #acacaf;
    }
</style>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .head{
            width: 100%;
            height: 50px;
            background-color: black;
            min-width: 1000px;
        }
        .base{
            width: 1000px;
            position:relative;
            margin: 0 auto;
        }
        .base-box{
            width:360px;
            position:absolute;
            right:0;
            top: 185px;
        }
        .base-box h3{
            font-size: 40px;
            margin-bottom: 10px;
        }
        .base-box form{
            border: 1px solid;
            margin-bottom: 10px;
            background-color: white;
            border-radius: 5px;
            padding: 15px 0;
        }
        .base-box input{
            width: 87%;
            display: block;
            margin: 10px auto;
            padding: 10px;
        }
        .base-box input[type='button']{
            width:87%;
            height:38px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div id="head" class="head"></div>
    <div class="base">
        <div class="base-box">
            <h3>
                登录
                <small>Login</small>
            </h3>
            <form id="log_form" action="">
                <input type="text" id="account" name="account" value="" placeholder="账号">
                <input type="password" id="pwd" name="pwd" value="" placeholder="密码">
                <input type="button" id="subbtn" value="登&nbsp;&nbsp;&nbsp;录" >
            </form>
            <span>Technical support from tyn</span>
        </div>
    </div>
</body>
<script>
    // 登录事件
    $("#subbtn").click(function(){
        if($("#account").val()==""){
            layer.msg('账号不能为空');
        }else{
            if ($("#pwd").val()=="") {
                layer.msg('密码不能为空');
            }else{
                var formdata = $("#log_form").serializeArray();
                $.ajax({
                    url:"<?php echo U('Login/index');?>",
                    async:true,
                    type:"POST",
                    data:"data="+JSON.stringify(formdata),
                    dataType: "json",
                    success:function(res){
                        console.log(res);
                        if(res==1){
                            location.href="/index.php/Admin/Index/index";
                        }else{
                            layer.msg('账号或密码错误');
                        }
                    },
                    error:function(res){
                        console.log(res);
                    }
                });
            }
        }
    })
    // 按钮绑定回车事件
    $("body").keydown(function () {
        if (event.keyCode == 13) {
            $("#subbtn").click();
        }
    })
</script>
</html>