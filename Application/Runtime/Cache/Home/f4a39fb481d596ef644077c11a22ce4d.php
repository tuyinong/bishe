<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我发布的商品</title>
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
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="margin:5px;">
            <div class="col-xs-12" style="box-shadow: darkgrey 1px 2px 5px 0px;">
                <div>
                    <div class="usergoodsbox-top">
                        <div class="img"></div>
                        <div class="text">
                            <h3><?php echo ($vo["g_name"]); ?></h3>
                            <p>￥&nbsp;<?php echo ($vo["g_price"]); ?></p>
                            <p><?php echo ($vo["g_state"]); ?></p>
                        </div>
                    </div>
                    <div class="usergoodsbox-footer">
                        <button onclick="cancelfabu('<?php echo ($vo["id"]); ?>')">取消发布</button>
                        <button onclick="lookwords('<?php echo ($vo["id"]); ?>')">查看留言</button>
                    </div>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
<script>
    // 取消发布
    function cancelfabu(gid){
        $.ajax({
            url:"<?php echo U('Goods/cancelfabu');?>",
            async:true,
            type:'post',
            data:{gid:gid},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.reload();
                    layer.msg("取消成功");
                }else{
                    layer.msg("操作失败，请再次尝试");
                }
            },error:function(res){
                console.log(res)
            }
        })
    }
    // 查看留言
    function lookwords(gid){
        document.location.href="/index.php/Home/Words/index?gid="+gid;
    }
</script>
</html>