<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的积分</title>
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
    <style>
        .msqd{
            position: absolute;
            top: 26px;
            right: 0;
            margin: 5px;
            background-color: #ff9900;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="jumbotron" style="margin-bottom:0">
        <div class="media">
            <div class="media-left">
                <img src="/Application/Public/img/zuoye1.png" class="media-object" style="width:60px">
            </div>
            <div class="media-body">
                <p class="media-heading" style="margin-bottom:0">2115</p>
                <p id="bill" style="font-size:13px">积分明细 &gt;</p>
                <button id="sign" class="msqd">马上签到</button>                
            </div>
        </div>
    </div>
</body>
<script>
    $("#bill").click(function(){
        document.location.href='/index.php/Home/Score/info';
    })
    $("#sign").click(function(){
        $.ajax({
            url:"<?php echo U('Score/addscore');?>",
            async:true,
            type:'post',
            data:'',
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    layer.msg('签到成功');
                    // document.location.href='/index.php/Home/Evaluation/index';
                    // history.go(-1);
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>