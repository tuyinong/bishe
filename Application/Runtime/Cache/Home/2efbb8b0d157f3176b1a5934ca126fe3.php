<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加评论</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/usergoodslist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>
<script src="/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
    <style>
        textarea{
            width: 100%;
            font-size: 17px;
            padding: 5px;
            line-height: 30px;
        }
    </style>
</head>
<body>
    <form>
        <textarea id="info" name="evainfo" id="evainfo" cols="30" rows="6" placeholder="你想说点啥"></textarea>                
    </form>
    <div id="evadiv" class="addrfooter" style="background-color:#ff9900;color:black">
        发表评价
    </div>
</body>
<script>
    $("#evadiv").click(function(){
        var info = $("#info").val();
        var rid = <?php echo ($_GET['rid']); ?>;
        console.log(rid)
        $.ajax({
            url:"<?php echo U('Evaluation/add');?>",
            async:true,
            type:'post',
            data:{info:info,rid:rid},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.href='/index.php/Home/Evaluation/index';
                    // history.go(-1);
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>