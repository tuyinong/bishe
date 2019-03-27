<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>收货地址</title>
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
</head>
<body>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="margin:5px;" onclick="javascript:document.location.href='/index.php/Home/Address/update?aid=<?php echo ($vo["id"]); ?>'">
            <div class="col-xs-12" style="box-shadow: darkgrey 1px 2px 5px 0px;">
                <div>
                    <div class="text">
                        <h3>收货人:<?php echo ($vo["a_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><?php echo ($vo["a_phone"]); ?></small></h3>
                        <p>收货地址:<?php echo ($vo["a_province"]); echo ($vo["a_city"]); echo ($vo["a_area"]); echo ($vo["a_street"]); echo ($vo["a_addr"]); ?></p>
                    </div>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="addrfooter" onclick="javascript:document.location.href='/index.php/Home/Address/add'">
        新增收货地址
    </div>
</body>
</html>