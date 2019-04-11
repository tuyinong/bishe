<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页</title>
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
            width: 100%;
        }
        #log_form{
            width: 70%;
            margin: 0 auto;
        }
        #log_form .form_div{
            width: 100%;
            height: 50px;
            text-align: center;
            border-radius: 25px;
            border: 1px solid;
            margin-bottom: 20px;
            
        }
        #log_form input{
            text-align: center;
            padding: 0;
            margin: 0;
            border: 0;
            background-color: white;
            line-height: 48px;
        }
        #log_form .inpname{
            float: left;
            margin-left: 20px;
        }
        #log_form .inpinfo{
            /* height: 50px; */
            float: left;
            margin-left: 5px;
            outline: none;
        }
        .other{
            width: 70%;
            margin: 0 auto;
            text-align: center;
            color: black;
        }
        a,a:hover,a:active,a:visited{
            text-decoration: none;
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
    <div>
        <form id="log_form" method="post" action="">
            <div class="form_div" style="border:0;">
                <h4 style="font-weight:700;">用户登录</h4>
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="用户" disabled>
                <input class="inpinfo" type="text" name="account" id="account">
            </div>
            <div class="form_div">
                <input class="inpname" type="button" value="密码" disabled>
                <input class="inpinfo" type="password" name="password" id="password">
            </div>
            <div id="logbtn" class="form_div" style="margin-top:60px;">
                <h4 style="line-height:30px;">登&nbsp;&nbsp;&nbsp;录</h4>
            </div>          
        </form>
    </div>
    <a href="<?php echo U('Login/register');?>">
        <div class="other">
            ——————注册新用户——————
        </div>
    </a>
    <div id="allmap"></div>
</body>
<!-- 获取当前地理位置 -->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=KLfQyVLqNaKwuyw69FMTQdIG9gRsaLsc"></script>
<script>
    // 用户名验证先不做
    // 用户登录ajax提交
    $("#logbtn").click(function(){
        var account=$("#account").val();
        var pwd=$("#password").val();
        if(account!="" && pwd!=""){
            var form_data = $("#log_form").serializeArray()
            console.log(form_data)
            $.ajax({
                url: "<?php echo U('Login/index');?>",
                async: true,
                data: { data: JSON.stringify(form_data) },
                dataType: "json",
                type: "POST",
                success: function (res) {
                    console.log(res)
                    if (res == 1) {
                        console.log('登录成功');
                        // location.href="/index.php/Home/User/index";
                        // history.go(-1);location.reload();
                        // 获取当前地理位置
                        var map = new BMap.Map("allmap");
                        var point = new BMap.Point(116.331398,39.897445);
                        map.centerAndZoom(point,12);

                        var geolocation = new BMap.Geolocation();
                        geolocation.getCurrentPosition(function(r){
                            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                                // var mk = new BMap.Marker(r.point);
                                // map.addOverlay(mk);
                                // map.panTo(r.point);
                                // alert('您的位置：'+r.point.lng+','+r.point.lat);
                                // var gc = new BMap.Geocoder();
                                
                                // var map = new BMap.Map("allmap");
                                // var point = new BMap.Point(r.point.lng,r.point.lat);
                                // map.centerAndZoom(point,12);
                                var geoc = new BMap.Geocoder();    

                                geoc.getLocation(r.point, function(rs){
                                    var addComp = rs.addressComponents;
                                    // alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                                    // $("#addr").html(addComp.province+" "+addComp.city);
                                    $.ajax({
                                        url:"<?php echo U('User/address');?>",
                                        async:true,
                                        type:'post',
                                        data:{province:addComp.province,city:addComp.city},
                                        dataType:'json',
                                        success:function(res){
                                            if(res.code==100){
                                                // document.location.reload()
                                                // history.go(-1);
                                            }
                                            console.log(res)
                                        },error:function(res){
                                            console.log(res)
                                        }
                                    })
                                });
                            }
                            else {
                                alert('failed'+this.getStatus());
                            }        
                        });
                        // 结束获取当前地理位置
                        setTimeout('self.location=document.referrer;',500)// 返回上一页并刷新上一页
                    }
                    if (res == 2) {
                        console.log('登录失败');
                    }
                },
                error: function (res) {

                }
            })
        }else{
            console.log("账号密码不能为空");
        }
        
    })

    // 按钮绑定回车事件
    $("body").keydown(function(){
        if(event.keyCode == 13){
            $("#logbtn").click();
        }
    })
</script>
<!-- 获取当前地理位置 -->
<!-- <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=KLfQyVLqNaKwuyw69FMTQdIG9gRsaLsc"></script>
<script>
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.331398,39.897445);
    map.centerAndZoom(point,12);

    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            // var mk = new BMap.Marker(r.point);
            // map.addOverlay(mk);
            // map.panTo(r.point);
            // alert('您的位置：'+r.point.lng+','+r.point.lat);
            // var gc = new BMap.Geocoder();
             
            // var map = new BMap.Map("allmap");
            // var point = new BMap.Point(r.point.lng,r.point.lat);
            // map.centerAndZoom(point,12);
            var geoc = new BMap.Geocoder();    

            geoc.getLocation(r.point, function(rs){
                var addComp = rs.addressComponents;
                // alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
                // $("#addr").html(addComp.province+" "+addComp.city);
                $.ajax({
                    url:"<?php echo U('User/address');?>",
                    async:true,
                    type:'post',
                    data:{province:addComp.province,city:addComp.city},
                    dataType:'json',
                    success:function(res){
                        // if(res.code==100){
                        //     // document.location.reload()
                        //     // history.go(-1);
                        // }
                        console.log(res)
                    },error:function(res){
                        console.log(res)
                    }
                })
            });
        }
        else {
            alert('failed'+this.getStatus());
        }        
    }); 
</script> -->
<!-- 结束获取当前地理位置 -->
</html>