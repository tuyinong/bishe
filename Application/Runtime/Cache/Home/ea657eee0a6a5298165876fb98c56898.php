<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人资料</title>
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
</head>
<body>
    <div class="list">
        <span class="span1">头像</span>
        <span><img style="height:100%;" src="/Application/Public/img/toxiang.png" alt=""></span>
        <span class="span2">&gt;</span>
        <!-- <div></div> -->
    </div>
    <div class="list">
        <span class="span1">会员名</span>
        <span><?php echo ($info["u_account"]); ?></span>
        <span class="span2">&gt;</span>
    </div>
    <div class="list">
        <span class="span1">昵称</span>
        <span><input id="nickname" type="text" value="<?php echo ($info["u_nickname"]); ?>" style="outline:none"></span>
        <span class="span2">&gt;</span>
    </div>
    <div class="dropdown">
        <div class="list" id="sex" data-toggle="dropdown">
            <span class="span1">性别</span>
            <span><?php echo ($info["u_sex"]); ?></span>
            <span class="span2">&gt;</span>
        </div>
        <ul class="dropdown-menu" role="menu" aria-labelledby="sex" style="right:0;text-align:center">
            <li role="presentation" onclick="changesex('男')">
                <a role="menuitem" tabindex="-1" href="#">男</a>
            </li>
            <li role="presentation" onclick="changesex('女')">
                <a role="menuitem" tabindex="-1" href="#">女</a>
            </li>
            
        </ul>
    </div>
    
    <div class="list">
        <span class="span1">生日</span>
        <span><input size="16" type="text" value="<?php echo ($info["u_birthday"]); ?>" readonly class="form_datetime"></span>
        <span class="span2">&gt;</span>
    </div>
    <div class="list" onclick="javascript:window.location.href='/index.php/Home/Address/index'">
        <span class="span1">收货地址</span>
        <span class="span2">&gt;</span>
    </div>
</body>
<script>
    $("#nickname").blur(function(){
        var name = $("#nickname").val();
        $.ajax({
            url:"<?php echo U('User/personal');?>",
            async:true,
            type:'post',
            data:{name:name,type:3},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.reload();
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd',autoclose:true,minView: "month"})
    .on('changeDate', function(ev){
        var time =ev.date.valueOf()/1000;
        $.ajax({
            url:"<?php echo U('User/personal');?>",
            async:true,
            type:'post',
            data:{birth:time,type:1},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.reload();
                }
            },error:function(res){
                console.log(res)
            }
        })
    });
</script>  
<script>
    function changesex(res){
        $.ajax({
            url:"<?php echo U('User/personal');?>",
            async:true,
            type:'post',
            data:{sex:res,type:2},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.reload();
                }
            },error:function(res){
                console.log(res)
            }
        })
    }
</script>
</html>