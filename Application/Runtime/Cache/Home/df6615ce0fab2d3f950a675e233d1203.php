<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品详情</title>
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
            <img src="/Application/Public/img/zuoye1.png" alt="First slide">
        </div>
        <div class="name"><?php echo ($details["u_nickname"]); ?><br><small><?php echo ($details["u_uptime"]); ?></small></div>
    </div>
    <div class="detailsbox">
        <h4 style="color:red;">当前价：￥<?php echo ($details["g_price"]); ?></h4>
        <p>新华社北京3月3日电 综合新华社驻外记者报道：随着全国政协十三届二次会议3日下午在北京开幕，中国进入一年一度的“两会时间”。今年是新中国成立70周年，也是决胜全面建成小康社会关键之年。中国在确保经济持续健康发展、进一步扩大开放等方面将推出哪些新政策、新举措，成为国际舆论对今年两会的关注焦点。
        　　美国彭博新闻社网站刊文说，两会为来自世界各地的记者提供了一个听取中国领导层人士发言并与其互动的难得机会。中国经济发展预期目标、外商投资法草案等是今年两会的主要看点。 　　美联社对两会相关背景、今年两会日程、重点议题和与会代表委员情况等内容进行了较为详细的报道。报道说，在两会上，中国政府将总结过去一年取得的成绩，并规划未来一年的工作重点。两会还为海外了解中国领导人如何治国理政提供了又一个窗口。此外，报道还特别关注外商投资法草案相关情况，认为该法旨在促进外商投资。</p>
        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
        <div class="footer">
             浏览<?php echo ($details["g_hot"]); ?>次&nbsp;•&nbsp;<?php echo ($details["g_like"]); ?>人想要
        </div>
    </div>
    <div class="change">
        <span id="words" onclick="words(<?php echo ($_GET['gid']); ?>)">留言</span>
        <span onclick="collect(<?php echo ($_GET['gid']); ?>)">收藏</span>
        <button class="btn btn-danger right" style="float:right;" onclick="want('<?php echo (session('uid')); ?>','<?php echo ($_GET['gid']); ?>')">我想要</button>
    </div>
</body>
<script>
    // 点击留言
    function words(gid){
        $.ajax({
            url: "<?php echo U('Goods/words');?>",
            async: true,
            type: "post",
            data: {gid:gid},
            dataType: "json",
            success: function (res) {
                console.log(res.code)
                if (res.code == 1) {
                    layer.msg("用户还未登录",{ icon: 5 });
                }
            }, error: function (res) {

            }
        })
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
                            url:"<?php echo U('Goods/cancel');?>",
                            async:true,
                            type:"post",
                            data:{gid:gid},
                            dataType:"json",
                            success:function(res){
                                console.log(res)
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
    // 购买,我想要按钮
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