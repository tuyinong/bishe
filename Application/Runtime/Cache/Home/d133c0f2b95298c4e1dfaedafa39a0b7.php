<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心</title>
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
            background-color: #eeeeee;
        }
        .big{
            width: 100%;
            height: 250px;
            position: relative;
            background-color: #ffec13;
            border-bottom-left-radius: 4%;
            border-bottom-right-radius: 4%;
            font-family: cursive;
        }
        .big .touxiang{
            width: 100px;
            height: 100px;
            border: 1px solid white;
            position: absolute;
            left: 15px;
            top: 15px;
            border-radius: 10px;
            overflow: hidden;
        }
        .big .name{
            position: absolute;
            left: 125px;
            top: 30px;
            font-size: 20px;
            font-weight: 600;
        }
        .touxiang img{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="big">
        <div class="touxiang">
            <img src="/Application/Public/img/toxiang.png" alt="">
        </div>
        <div class="name"><?php echo (session('uname')); ?></div>
    </div>
    <div class="container" style="position:relative;margin-top:-90px;">
        <div class="panel">
            <!-- <div class="panel-heading">
                卖在二爪
            </div> -->
            <div class="panel-body">
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/Goods/usergoodslist'">
                    <div><img src="/Application/Public/img/ufabu.png" alt=""></div>
                    <span>我的发布</span>
                </div>
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/Record/index'">
                    <div><img src="/Application/Public/img/umaichu.png" alt=""></div>
                    我的卖出
                </div>
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/Record/buy'">
                    <div><img src="/Application/Public/img/umaidao.png" alt=""></div>
                    我买到的
                </div>
                <!-- <div class="col-xs-4">
                    收到评价
                </div> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel">
            <!-- <div class="panel-heading">
                买在二爪
            </div> -->
            <div class="panel-body">
                
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/Collects/index'">
                    <div><img src="/Application/Public/img/ushoucang.png" alt=""></div>
                    我收藏的
                </div>
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/User/personal'">
                    <div><img src="/Application/Public/img/uziliao.png" alt=""></div>
                    个人资料
                </div>
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/User/score'">
                    <div><img src="/Application/Public/img/ujifen.png" alt=""></div>
                    我的积分
                </div>
                <!-- <div class="col-xs-4">
                    我评价的
                </div> -->
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom:70px;">
        <div class="panel">
            <!-- <div class="panel-heading">
                其他工具
            </div> -->
            <div class="panel-body">
                
                <div class="col-xs-4" onclick="javascript:window.location.href='/index.php/Home/User/setup'">
                    <div><img src="/Application/Public/img/ushezhi.png" alt=""></div>
                    设置
                </div>
            </div>
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
</html>