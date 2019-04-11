<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品详情</title>
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
        body{
            margin: 0;
            padding: 0;
            border: 0;
        }
        .infobox{
            height: 81px;
            padding: 10px;
            border-bottom: 1px solid #e8e8e8;
            background-color: gold;
        }
        .infobox .head{
            float: left;
            width: 60px;
            height: 60px;
            overflow: hidden;
            /* border: 1px solid #e8e8e8; */
        }
        .head img{
            min-width: 100%;
            height: 100%;
        }
        .infobox .name{
            float: left;
            padding: 5px;
        }
        .detailsbox{
            padding: 10px;
            margin-bottom: 45px;
        }
        .detailsbox p{
            line-height: 40px;
        }
        .detailsbox img{
            width: 100%;
            padding: 5px 0;
        }
        .change{
            width: 100%;
            padding: 5px 10px;
            position: fixed;
            left: 0;
            bottom: 0;
            border-top: 1px solid #e8e8e8;
            background-color: white;
        }
        .change span{
            float: left;
            padding: 7px;
        }
        .detailsbox .footer{
            width: 100%;
            text-align: right;
            font-size: 12px;
            line-height: 40px;
        }
    </style>
</head>
<body>
    <div class="infobox">
        <div class="head">
            <img src="/Application/Public/img/toxiang.png" alt="First slide">
        </div>
        <div class="name"><?php echo ($details["u_nickname"]); ?><br><small><?php echo ($details["u_uptime"]); ?></small></div>
    </div>
    <div class="detailsbox">
        <h4 style="color:red;">当前价：￥<?php echo ($details["g_price"]); ?></h4>
        <p><?php echo ($details["g_name"]); ?></p>
        <div id="goodsimgdiv"></div>
        <script>
            var imgstr = <?php echo json_encode($details['g_img']);?>;
            var imgarr = imgstr.split(" ");
            for(var i=0;i<imgarr.length;i++){
                var img = $("<img>");
                img.attr('src',imgarr[i]);
                $("#goodsimgdiv").append(img);
            }
        </script>
        <div class="footer">
             浏览<?php echo ($details["g_hot"]); ?>次&nbsp;•&nbsp;<?php echo ($details["g_like"]); ?>人想要
        </div>
    </div>
    <div class="change">
        <span id="words" onclick="words(<?php echo ($_GET['gid']); ?>)">留言</span>
        <span onclick="collect(<?php echo ($_GET['gid']); ?>)">收藏</span>
        <span onclick="chat(<?php echo ($_GET['gid']); ?>)">发送消息</span>
        <button class="btn btn-danger right" style="float:right;" onclick="want('<?php echo (session('uid')); ?>','<?php echo ($_GET['gid']); ?>')">我想要</button>
    </div>
</body>
<script>
    // 点击留言
    function words(gid){
        document.location.href="/index.php/Home/Words/index?gid="+gid;
    }
    // 点击收藏
    function collect(gid){
        $.ajax({
            url:"<?php echo U('Goods/collect');?>",
            async:true,
            type:"post",
            data:{gid:gid},
            dataType:"json",
            success:function(res){
                console.log(res)
                if(res.code==1){                    
                    layer.confirm('用户尚未登录，是否跳转登录', { icon: 3 }, function () {
                        // 确定
                        document.location.href = "/index.php/Home/Login/index"
                    });
                }else if(res.code==2){
                    layer.confirm('该商品已收藏，是否取消收藏', {
                        btn: ['确定', '取消']
                    }, function () {
                        // 确定
                        $.ajax({
                            url:"<?php echo U('Collects/cancelshoucang');?>",
                            async:true,
                            type:"post",
                            data:{gid:gid},
                            dataType:"json",
                            success:function(res){
                                console.log(res)
                                if(res.code==100){
                                    layer.msg("取消成功");
                                }else{
                                    layer.msg("操作失败，请再次尝试");
                                }
                            },error:function(res){
                                console.log(res)
                            }
                        })
                        // layer.msg('取消成功', { icon: 1 });
                    });
                }else if(res.code==3){
                    layer.msg('收藏成功', { icon: 1 });
                }
            },error:function(res){

            }
        })
    }
    // 发送消息
    function chat(gid){
        $.ajax({
            url:"<?php echo U('Goods/chat');?>",
            async:true,
            type:'post',
            data:{gid:gid},
            dataType:'json',
            success:function(res){
                console.log(res)
                if(res.code==100){
                    window.location.href="/index.php/Home/Index/messageinfo?mm778899="+res.name;
                    // history.go(-1);
                }
            },error:function(res){
                console.log(res)
            }
        })
    }
    // 购买
    function want(uid,gid){
        if(!uid || uid==""){
            alert("weidengl");
        }else{
            document.location.href="/index.php/Home/Goods/buy?uid="+uid+"&gid="+gid;
            console.log(uid);
        }
    }
</script>
</html>