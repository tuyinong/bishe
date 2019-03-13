<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户列表</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/TYN/tyn/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/TYN/tyn/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/TYN/tyn/Application/Public/css/bootstrap-datetimepicker.min.css">
<!-- js操作 -->
<script src="http://127.0.0.1/TYN/tyn/Application/Public/js/jquery.js"></script>
<script src="http://127.0.0.1/TYN/tyn/Application/Public/js/bootstrap.js"></script>
<script src="/TYN/tyn/Application/Public/layer/layer.js"></script>
<script src="/TYN/tyn/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/TYN/tyn/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
<style>
    .body{
        width: 100%;
        padding: 50px 0 0 280px;
    }
    .box {
        height: 100%;
        border: 1px solid black;
        margin: 7px;
    }
    @font-face {
        font-family: myttf;
        src: url("/TYN/tyn/Application/Public/fonts/Kim's GirlType.ttf");
    }
    .rowbox {
        height: 100%;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .rowbox .title {
        height: 50px;
        border-bottom: 1px solid #e8e8e8;
        font-size: 16px;
        /* line-height: 50px; */
        font-weight: 700;
        font-family: myttf;
        padding: 20px;
    }
     /* 表单样式 */
    label {
        font-family: myttf;
        margin: 0 20px 0 5px;
    }
    .mybtn {
        margin-left: 20px;
    }
    /* 表格 */
    .tablebox {
        margin: 5px;
        padding: 5px;
        border: 1px solid #999999;
    }
    .tablebox th {
        text-align: center;
    }
    .tablebox tr>td {
        vertical-align: middle;
        font-size: 20px;
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
    <title>导航栏控件</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/TYN/tyn/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/TYN/tyn/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/TYN/tyn/Application/Public/css/bootstrap-datetimepicker.min.css">
<!-- js操作 -->
<script src="http://127.0.0.1/TYN/tyn/Application/Public/js/jquery.js"></script>
<script src="http://127.0.0.1/TYN/tyn/Application/Public/js/bootstrap.js"></script>
<script src="/TYN/tyn/Application/Public/layer/layer.js"></script>
<script src="/TYN/tyn/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/TYN/tyn/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
<style>
    .body{
        width: 100%;
        padding: 50px 0 0 280px;
    }
    .box {
        height: 100%;
        border: 1px solid black;
        margin: 7px;
    }
    @font-face {
        font-family: myttf;
        src: url("/TYN/tyn/Application/Public/fonts/Kim's GirlType.ttf");
    }
    .rowbox {
        height: 100%;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .rowbox .title {
        height: 50px;
        border-bottom: 1px solid #e8e8e8;
        font-size: 16px;
        /* line-height: 50px; */
        font-weight: 700;
        font-family: myttf;
        padding: 20px;
    }
     /* 表单样式 */
    label {
        font-family: myttf;
        margin: 0 20px 0 5px;
    }
    .mybtn {
        margin-left: 20px;
    }
    /* 表格 */
    .tablebox {
        margin: 5px;
        padding: 5px;
        border: 1px solid #999999;
    }
    .tablebox th {
        text-align: center;
    }
    .tablebox tr>td {
        vertical-align: middle;
        font-size: 20px;
        text-align: center;
    }
</style>
    <style>
        .top{
            width: 100%;
            height:50px;
            position: absolute;
            z-index: 500;
            background-color: #e8e8e8;
            border-bottom: 1px solid #dcdcdc;
        }
        .top img{
            position: absolute;
            right: 20px;
            top: 50%;
            margin-top: -12px;
            width: 25px;
        }
        .left{
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100%;
            background-color: #20222a;
            color:#acacaf;
        }
        .tx-info{
            margin-top:50px;
            width: 100%;
            height: 160px;
            position: relative;
        }
        .tx-info .txbox{
            position: absolute;
            width: 70px;
            height: 70px;
            border-radius: 35px;
            top: 50%;
            left:15px;
            margin-top: -35px;
            border: 1px solid;
            /* background-image: url("/TYN/tyn/Application/Public/img/toxiang.png"); */
            overflow: hidden;
        }
        .txbox img{
            width: 100%;
        }
        .namebox{
            position: absolute;
            width: 160px;
            height: 34px;
            top: 50%;
            margin-top: -17px;
            right: 20px;
        }
        .namebox span{
            line-height: 34px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
        }

        /* 下拉列表的样式 */
        .listbox ul{
            margin: 0;
            padding: 0;
        }
         .listbox li{
            list-style: none;
            font-size: 16px;
            border-top: 1px solid #16181d;
            cursor: pointer;
        }
        .listbox a,a:active,a:visited{
            margin-left: 15px;
            line-height: 36px;
            text-decoration: none;
            color: #acacaf;
        }
        a:hover{
            color:aliceblue;
        }
        li ul{
            margin: 0;
            padding: 0;
        }
        li li{
            height: 36px;
            /* border-top: 1px solid #16181d; */
            background-color: #16181d;
            display: none;
        }
        .on{   
            background-color: #1ea296;
        }
        .on a{
            color:aliceblue;
        }
    </style>
</head>
<body>
    <?php session_start(); ?>
    <div class="top">
        <a href="<?php echo U('Login/logout');?>"><img id="logout" src="/TYN/tyn/Application/Public/img/logout.png" alt="" data-toggle="tooltip" title="退出"></a>
    </div>
    <div class="left">
        <div class="tx-info">
            <div class="txbox">
                <img src="/TYN/tyn/Application/Public/img/toxiang.png" alt="">
            </div>
            <div class="namebox">
                <span>管理员：<?php echo ($_SESSION['ainfo']['a_nickname']); ?></span>
                <!-- <span></span> -->
            </div>
        </div>
        <div class="listbox">
            <ul>
                <li><a href="<?php echo U('Index/index');?>" style="padding:0;">首页</a></li>
                <li>
                    <a>用户管理</a>
                    <ul>
                        <li><a href="<?php echo U('User/userlist');?>">用户列表</a></li>
                        <li><a href="<?php echo U('User/erruserlist');?>">异常用户列表</a></li>
                    </ul>
                </li>
                <li>
                    <a>商品管理</a>
                    <ul>
                        <li><a href="<?php echo U('Goods/index');?>">商品审核</a></li>
                        <li><a href="<?php echo U('Goods/goodslist');?>">上架商品</a></li>
                        <li><a href="">查询商品</a></li>
                        <li><a href="<?php echo U('Goods/errgoodslist');?>">异常商品</a></li>
                    </ul>
                </li>
                <li>
                    <a>公告管理</a>
                    <ul>
                        <li><a href="<?php echo U('Notices/index');?>">消息列表</a></li>
                        <li><a href="<?php echo U('Notices/sendnotice');?>">发送消息</a></li>
                    </ul>
                </li>
                <li>
                    <a>评价管理</a>
                    <ul>
                        <li><a href="<?php echo U('Evaluations/index');?>">新评价信息</a></li>
                        <li><a href="">查询评价信息</a></li>
                    </ul>
                </li>
                <li><a href="" style="padding:0;">管理员列表</a></li>
            </ul>
        </div>
    </div>
</body>
<script>
    //下拉列表
    $(".listbox a").click(function(){
        // $(this).parent().siblings().first().nextAll().hide();
        $(this).nextAll().children().toggle();//如果元素隐藏则显示，如果元素显示则隐藏
    })
    //列表选中样式
    $("li").removeClass("on");
    var url = window.location.pathname;
    for (var i = 0; i < $("li a").length; i++) {
        if ($("li a").eq(i).attr('href') == url) {
            var index = i;
            $("li a").eq(index).parent().addClass("on");
            $("li a").eq(index).parent().show();
            $("li a").eq(index).parent().siblings().show();
        }         
    }
</script>
</html>
    <div class="body">
        <div class="box">
            <div class="rowbox">
                <div class="title">
                    您目前所在的位置 > 用户管理 > 用户列表
                </div>
            </div>
            <div class="rowbox">
               <div class="col-xs-12">
                    <form action="" class="form-inline">
                        <label for="account">用户账号:</label>
                        <input type="text" name="account" id="account" placeholder="输入要搜索的用户账号" value="" class="form-control">
                        <label for="">用户状态:</label>
                        <select name="status" id="status" class="select-input form-control">
                            <option value="" >全部</option>
                            <option value="1">正常</option>
                            <option value="0">冻结中</option>
                        </select>  
                        <button class="mybtn btn btn-primary">搜&nbsp;&nbsp;索</button>       
                    </form>
               </div>
            </div>
            <div class="rowbox">
                <div class="tablebox">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>用户账号</th>
                                <th>用户上次登录时间</th>
                                <th>所在省</th>
                                <th>所在市</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($vo["u_account"]); ?></td>
                                    <td><?php echo ($vo["u_uptime"]); ?></td>
                                    <td><?php echo ($vo["u_provite"]); ?></td>
                                    <td><?php echo ($vo["u_city"]); ?></td>
                                    <td>
                                        <button id="userinfobtn" class="btn btn-primary" onclick="send('<?php echo ($vo["id"]); ?>')">发送通知</button>
                                        <button id="accfreebtn" class="btn btn-primary" onclick="dongjie('<?php echo ($vo["id"]); ?>')">账号冻结</button>
                                    </td>
                               </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="page" >
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    //发送通知
    function send(uid){
        location.href = "/TYN/tyn/index.php/Admin/Notices/sendnotice?uid="+uid;
    }
    //账号冻结
    function dongjie(uid){
        layer.confirm('确认冻结该用户', {icon: 3, title: '提示'},function(index){
            location.href = "/TYN/tyn/index.php/Admin/User/dongjie?id="+uid;
            layer.close(index);
        })
    }
</script>

</html>