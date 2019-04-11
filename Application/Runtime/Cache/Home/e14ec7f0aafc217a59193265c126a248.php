<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>交易支付</title>
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
        .zhui{
            padding: 5px;
            border-bottom: 1px solid #d0d0d0;
            font-weight: 700;
        }
        .ss{
            width: 100%;
            height: 38px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="jumbotron" style="margin-bottom:0;padding-top: 10px;padding-bottom: 10px;">
        <div class="media" style="background-color: white;">
            <div class="media-left">
                <img id="gimg" src="/Application/Public/img/toxiang.png" class="media-object" style="width:60px">
                <script>
                    var imgstr = <?php echo json_encode($info['g_img']);?>;
                    var imgarr = imgstr.split(" ");
                    var img = $("#gimg");
                    img.attr('src',imgarr[1]);
                </script>
            </div>
            <div class="media-body">
                <div class="ss">
                    <h4 class="media-heading"><?php echo ($info["g_name"]); ?></h4>
                </div>
                <p style="font-size:13px"><?php echo ($info["g_time"]); ?></p>
            </div>
        </div>
    </div>
    <form action="" id="buyform">
        <input type="hidden" name="gid" id="gid" value="<?php echo ($info["id"]); ?>">
        <div class="list" style="height: 80px;" onclick="buyaddr()">
            <span class="span1" style="line-height: 80px;">收货地址</span>
            <span class="span2" style="margin-top: 10px;line-height: 20px;"><?php echo ($address["a_name"]); echo ($address["a_phone"]); ?></span>
            <span class="span2" style="line-height: 20px;"><?php echo ($address["a_province"]); echo ($address["a_city"]); echo ($address["a_area"]); echo ($address["a_street"]); ?></span>
            <span class="span2" style="line-height: 20px;"><?php echo ($address["a_addr"]); ?></span>
            <!-- <span class="span2">&gt;</span> -->
        </div>
        <div class="list">
            <span class="span1">需付款</span>
            <span class="span2"><?php echo ($info["g_price"]); ?></span>
        </div>
        <input type="hidden" name="price" id="price" value="<?php echo ($info["g_price"]); ?>">
        <div class="list">
            <span class="span1">创建时间</span>
            <span class="span2"><?php echo ($time); ?></span>
        </div>
        <div class="addrfooter" id="buybtn">付款</div>
    </form>
</body>
<script>
    // 地址
    function buyaddr(){
        document.location.href="/index.php/Home/Address/choose?gid="+<?php echo ($_GET['gid']); ?>;
    }
    // 购买
    $("#buybtn").click(function(){
        var form_data = $("#buyform").serializeArray();
        $.ajax({
            url:"<?php echo U('Record/add');?>",
            async:true,
            type:'post',
            data:{data:form_data},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.href="/index.php/Home/Record/buy";
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>