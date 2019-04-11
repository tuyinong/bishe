<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>设置</title>
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
        .logout{
            background-color: red;
            padding: 10px;
            color: white;
            text-align: center;
            margin: 30px;
        }
    </style>
</head>
<body>
    <div id="logout" class="logout">退&nbsp;&nbsp;&nbsp;&nbsp;出</div>
</body>
<script>
    $("#logout").click(function(){
        $.ajax({
            url:"<?php echo U('User/setup');?>",
            async:true,
            type:'post',
            data:'',
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.href="/index.php/Home/Index/index";
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>