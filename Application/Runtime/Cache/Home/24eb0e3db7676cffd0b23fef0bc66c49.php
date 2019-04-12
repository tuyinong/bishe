<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品列表</title>
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
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
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
</head>
<body>
    <?php session_start(); ?>
    <div class="container">
        <div class="input-group" style="padding:20px 10px 10px" value="">
            <input id="searchtext" type="text" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" onclick="search()">搜索</button>
            </div>
        </div>
    </div>
</body>
<script>
    var val = "<?php echo session('val');?>";
    console.log(val);
    $("#searchtext").val(val);
    // 搜索按键
    function search() {
        var val = $("#searchtext").val();
        console.log(val)
        location.href = "/index.php/Home/Index/goodslist?family=200&val=" + val;
    }
</script>
</html>
    

    <?php if($_GET['family']== 58): ?><div class="container">
            <div style="border: 1px solid #cccccc;margin: 0 10px;padding: 5px;">
                <span style="padding-right: 5px;border-right: 1px solid #cccccc;">当前定位城市</span>
                <span id="addr"><?php echo (session('province')); ?>&nbsp;&nbsp;&nbsp;<?php echo (session('city')); ?></span>
            </div>
        </div><?php endif; ?>

    <div class="container" style="margin-bottom:75px;">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
                <div class="goodslist" onclick="todetails(<?php echo ($vo["id"]); ?>)">
                    <!-- <input type="hidden" name="gid" value="<?php echo ($vo["id"]); ?>" id="gid"> -->
                    <div class="goodsimg">
                        <img src="/Application/Public/img/shili1.jpg" style="width:100%">
                    </div>
                    <div class="info">
                        <div class="info_top">
                            <?php echo ($vo["g_name"]); ?>
                        </div>
                        <div class="info_mid">
                            <?php echo ($vo["g_price"]); ?>
                        </div>
                        <div class="info_bottom">
                            <img src="/Application/Public/img/toxiang.png" alt=""> <?php echo ($vo["u_nickname"]); ?>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="con_footer col-xs-12">
            到底了
        </div>
    </div>
</body>

<script>
    // setInterval(function(){
    //     document.location.reload();
    // },2000);
    // 点击商品跳转到详情页
    function todetails(gid){
        // console.log(gid);
        document.location.href="/index.php/Home/Goods/details?gid="+gid;
    }
</script>
</html>