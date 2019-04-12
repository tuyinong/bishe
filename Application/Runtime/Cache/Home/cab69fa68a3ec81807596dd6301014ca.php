<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>消息列表</title>
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
    <style>
        .messagelistbox{
            margin: 5px;
            padding: 5px;
            box-shadow: darkgrey 1px 2px 5px 0px;
        }
        .quan{
            width: 26px;
            height: 26px;
            position: absolute;
            background-color: red;
            color: white;
            right: 0;
            border-radius: 50%;
            top: 0px;
            
        }
    </style>
</head>
<body>
    <div id="shuaxinid">
        <div class="messagelistbox" onclick="tonotice()">
            <div class="media">
                <div class="media-left">
                    <img src="/Application/Public/img/shezhi.jpg" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading" style="margin-top: 20px;">系统消息</h4>
                </div>
            </div>
        </div>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="messagelistbox" onclick="toinfo('<?php echo ($vo["tablename"]); ?>')" style="position: relative">
                <?php if($vo["type"] == 0): ?><div class="quan"></div><?php endif; ?>
                
                <div class="media">
                    <div class="media-left">
                        <img src="/Application/Public/img/toxiang.png" class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo ($vo["othernn"]); ?></h4>
                        <p><?php echo ($vo["info"]); ?></p>
                        <p style="font-size:13px"><?php echo ($vo["sendtime"]); ?></p>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div style="width:100%;height:70px;"></div>
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
    setInterval(function(){
        $("#shuaxinid").load(location.href+" #shuaxinid");
    },3000);
    // 查看系统记录
    function tonotice(){
        window.location.href="/index.php/Home/Notices/show";
    }
    // 查看聊天记录
    function toinfo(name){
        window.location.href="/index.php/Home/Index/messageinfo?mm778899="+name;
    }
</script>
</html>