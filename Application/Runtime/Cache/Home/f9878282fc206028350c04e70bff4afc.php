<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品分类</title>
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
        .fenleidiv{
            background-image: url(/Application/Public/img/xtwzk.jpg);
            background-size: 100%;
            text-align: center;
            padding: 55px;
            font-family: cursive;
            font-size: 18px;
            border-radius: 50%;
            margin: 5px 0;
        }
        .fenleidiv span{
            position: absolute;
            top: 45px;
            left: 40px;
        }
    </style>
</head>
<body>
    <div class="row">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-4">
                <div class="fenleidiv" onclick="javascript:window.location.href='/index.php/Home/Index/goodslist?family=100&ggggg=<?php echo ($vo["id"]); ?>'">
                    <span><?php echo ($vo["type"]); ?></span>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>
</html>