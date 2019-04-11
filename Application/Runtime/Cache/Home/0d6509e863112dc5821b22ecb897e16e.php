<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
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
        .changelist {
            height: 75px;
            /* border: 1px solid #dcdcdc; */
            border-radius: 10px;
            text-align: center;
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
    <title>Document</title>
    <style>
        .logo {
            width: 100%;
            text-align: center;
            line-height: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div id="logo" class="logo">
        <img src="/Application/Public/img/logo2.png" alt="logo" style="height:145%;">
        <!-- logo -->
    </div>
</body>
</html>
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
    <div class="container">
        <div class="jumbotron" style="margin-bottom:0">
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide="1"></li>
                    <li data-target="#myCarousel" data-slide="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
                    </div>
                </div>
                <a href="#myCarousel" class="carousel-control left" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a href="#myCarousel" class="carousel-control right" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-left:0;margin-right:0;">
            <div class="col-xs-3">
                <div class="changelist" onclick="javascript:window.location.href='/index.php/Home/Index/goodslist?family=58'">
                    <img src="/Application/Public/img/bendi.png" alt="First slide" style="width:98%;">
                    <span>同城商品</span>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="changelist" onclick="javascript:window.location.href='/index.php/Home/User/score'">
                    <img src="/Application/Public/img/jifen.png" alt="First slide" style="width:98%;">
                    我的积分
                </div>
            </div>
            <div class="col-xs-3">
                <div class="changelist" onclick="javascript:window.location.href='/index.php/Home/Index/goodslist?family=555'">
                    <img src="/Application/Public/img/remai.png" alt="First slide" style="width:98%;">
                    热卖商品
                </div>
            </div>
            <div class="col-xs-3">
                <div class="changelist" onclick="javascript:window.location.href='/index.php/Home/Goods/goodsmenu'">
                    <img src="/Application/Public/img/fenlei.png" alt="First slide" style="width:98%;">
                    商品分类
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom:75px;">
        <?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
                <div class="goodslist" onclick="todetails(<?php echo ($vo["id"]); ?>)">
                    <!-- <input type="hidden" name="gid" value="<?php echo ($vo["id"]); ?>" id="gid"> -->
                    <div class="goodsimg">
                        <img id="gimg" src="/Application/Public/img/shili1.jpg" style="width:100%">
                        <input type="hidden" id="gg" value="<?php echo ($vo["g_img"]); ?>">
                        <script>
                            var imgstr = $("#gg").val();
                            var imgarr = imgstr.split(" ");
                            var img = $("#gimg");
                            img.attr('src',imgarr[1]);
                        </script>
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
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        .footer{
            position: fixed;
            width: 100%;
            height: 70px;
            bottom: 0;
            left: 0;
            border-top: 1px solid #dcdcdc;
            background-color: #ffffff;
        }
        .footer ul{
            width: 100%;
            height: 100%;
            padding: 0px;
        }
        .footer a,a:hover,a:active,a:visited{
            float: left;
            list-style: none;
            padding: 0px;
            width: 25%;
            color: #27506d;
        }
        .footer li{
            text-align: center;
            font-size: 14px;
        }
        .footer img{
            display: block;
            margin: 0 auto;
            padding: 5px;
        }
        /* 回到顶部 */
        .totop{
            width: 30px;
            height: 30px;
            position: fixed;
            right: 10px;
            bottom: 80px;
            border: 1px solid;
            border-radius: 50%;
            overflow: hidden;
        }
        .totop img{
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- 回到顶部 -->
    <div id="totop" class="totop">
        <img src="/Application/Public/img/totop.png" alt="">
    </div>
    <!-- 底部标签栏 -->
    <div class="footer">
        <ul>
            <a href="<?php echo U('Index/index');?>">
                <img src="/Application/Public/img/tubiao1.png" alt="">
                <li>首页</li>
            </a>
            <a href="<?php echo U('Goods/fabu');?>">
                <img src="/Application/Public/img/tubiao2.png" alt="">
                <li>发布</li>
            </a>
            <a href="<?php echo U('Index/messagelist');?>">
                <img src="/Application/Public/img/tubiao3.png" alt="">
                <li id="xiaoxiid">消息</li>
            </a>
            <a href="<?php echo U('User/index');?>">
                <img src="/Application/Public/img/tubiao4.png" alt="">
                <li>我的</li>
            </a>
        </ul>
    </div>
</body>
<script>
    var flag = <?php echo (session('newmess')); ?>;
    // console.log(<?php echo (session('newmess')); ?>)
    if(flag==1){
        $("#xiaoxiid").css('color','red');
        $("#xiaoxiid").html("有新消息");
    }
    setInterval(function(){
        $("#xiaoxiid").load(location.href+" #xiaoxiid");
    },3000);
</script>
<script>
    //返回顶部按钮
    $(function () {
        $('#totop').hide();        //隐藏按钮
        $(window).scroll(function () {
            //当window的scrolltop距离大于300时
            if ($(this).scrollTop() > 300) {
                $('#totop').fadeIn();
            } else {
                $('#totop').fadeOut();
            }
        });
        $('#totop').click(function () {
            $('html,body').animate({ scrollTop: 0 }, 200);
            return false;
        });
    });
</script>
</html>
</body>
<script>
    // 点击商品跳转到详情页
    function todetails(gid){
        // console.log(gid);
        document.location.href="/index.php/Home/Goods/details?gid="+gid;
    }
</script>
</html>