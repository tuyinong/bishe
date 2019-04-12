<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的积分</title>
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
        .msqd{
            position: absolute;
            top: 26px;
            right: 0;
            margin: 5px;
            background-color: #ff9900;
            padding: 5px 10px;
            border-radius: 5px;
        }

        #luckyDiv{
            width: 350px;
            height: 350px;
            margin: 0 auto;
            /* padding-top: 30px; */
        }
        #luckyDiv>div{
            width: 90px;
            height: 90px;
            float: left;
            margin: 13px;
            cursor: pointer;
        }
        .normalDiv{
            background-image: url(/Application/Public/img/awad.jpg);
            background-size: 100% 100%;
            /*background-color: gainsboro;*/				
        }
        .hoverDiv{
            background-image: url(/Application/Public/img/awad.jpg);
            background-size: 120% 120%;
            background-position: center;
            /*background-color: gray;*/
        }
        .luckyDiv{
            background-image: url(/Application/Public/img/awa2.jpg);
            background-size: 120% 120%;
            background-position: center;
        }
        #luckyshow{
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            position: fixed;
            top: 0;
            left: 0;
            display: none;
        }
        .luckyshowImg{
            text-align: center;
            width: 350px;
            height: 350px;
            position: absolute;
            left: 50%;
            margin-left: -175px;
            margin-top: 200px;
        
        }
        #closelogin{
            position: absolute;
            right: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 10px;
            border: 1px solid gray;
            color: gray;
        }
        .luckyshowImg img{
            position: absolute;
            right: 50%;
            top: 50%;
            margin-right: -150px;
            margin-top: -150px;
            background-size: 100% 100%;
            width: 300px;
            height: 300px;
        }
        .luckyshowImg span{
            position: absolute;
            right: 50%;
            top: 0;
            margin-right: -150px;
            width: 300px;
            height: 100px;
            text-align: center;
            font-size: 20px;
            color: white;	
        }
        .text{
            padding: 10px;
            text-align: center;
            background: burlywood;
        }
    </style>
</head>
<body>
    <!-- <div class="pagetitle">我的积分</div> -->
    <div class="jumbotron" style="margin-bottom:0">
        <div class="media">
            <div class="media-left">
                <img src="/Application/Public/img/toxiang.png" class="media-object" style="width:60px">
            </div>
            <div class="media-body">
                <p id="snum" class="media-heading" style="margin-bottom:0"><?php echo ($all); ?></p>
                <p id="bill" style="font-size:13px">积分明细 &gt;</p>
                <button id="sign" class="msqd">马上签到</button>                
            </div>
        </div>
    </div>
    <div>
        <div class="text">10积分一次</div>
        <!--九宫格-->
		<div class="first_main" id="first_main">
            <div id="luckyDiv">
                <!-- <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['user_id']; ?>" /> -->
                <div id="luckyBox1" class="normalDiv"></div>
                <div id="luckyBox2" class="normalDiv"></div>
                <div id="luckyBox3" class="normalDiv"></div>
                <div id="luckyBox8" class="normalDiv"></div>
                <div id="luckyBtn">
                    <div style="width: 100px;height: 100px; border-radius: 50px;background-color: indianred;text-align: center;">
                        <span style="line-height: 100px; color: white;">点击抽奖</span><br />
                        <!-- <span id="word" style="font-size: 15px;">10积分一次</span> -->
                    </div>
                </div>
                <div id="luckyBox4" class="normalDiv"></div>
                <div id="luckyBox7" class="normalDiv"></div>
                <div id="luckyBox6" class="normalDiv"></div>
                <div id="luckyBox5" class="normalDiv"></div>					
            </div>
        </div>
<!--  =========奖品遮罩框==========  -->
        <div id="luckyshow">
            
            <div class="luckyshowImg">
                <input type="button" id="closelogin" value="X" />
                <span id="luckyshowword"></span>
                <img id="luckyImg" src=""/>
            </div>
        </div>
    </div>
</body>
<script>
    $("#bill").click(function(){
        document.location.href='/index.php/Home/Score/info';
    })
    $("#sign").click(function(){
        $.ajax({
            url:"<?php echo U('Score/addscore');?>",
            async:true,
            type:'post',
            data:'',
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    layer.msg('签到成功');
                    // document.location.href='/index.php/Home/Evaluation/index';
                    // history.go(-1);
                }else if(res.code==200){
                    layer.msg('今日签到已成功，不能重复签到');
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
<!-- 抽奖 -->
<script>
    // 关闭遮罩框
    $("#closelogin").click(function(){
        $("#luckyshow").css("display","none");
        document.location.reload();
    })
    var clickFlag =true;
    $("#luckyBtn").click(function(){
        // var jsonStr='{"user_id":"'+$("#user_id").val()+'"}';
        if (clickFlag) {
            var num = $("#snum").html();
            $.ajax({
                type:"post",
                url:"<?php echo U('Score/decscore');?>",
                async:true,
                dataType:"json",
                data:{num:num},
                success:function(res) {
                    if (res.code==100) {
                        clickFlag=false;
                        res--;
                        //产生一个随机数
                        var index=Math.ceil(Math.random()*8);
                        index+=24;
                        for (var m=1;m<=index;m++) {	//样式切换次数
                            setTimeout(changecolor(m),6*m*m);
                        }			
                        // $("#word").html("剩余抽奖次数"+res);
                        setTimeout(function(){
                            document.getElementById('luckyBox'+(index-24)).className='luckyDiv';			
                        },6*index*index+10);
                        setTimeout(function(){
                            getaward(index);	
                            clickFlag=true;
                        },6*index*index+200);		
                    }else{
                        // $("#word").html("暂无抽奖次数");
                        layer.msg("暂无抽奖次数")
                    }
                },
                error:function(res) {
                    
                }
            });		
        }
    })
    function getaward (index) {
        // var jsonStr='{"user_id":"'+$("#user_id").val()+'"}';
        $.ajax({
            type:"post",
            url:"<?php echo U('Score/getaward');?>",
            async:true,
            dataType:"json",
            data:{},
            success:function (res) {
                console.log(res);
                $("#luckyshow").css("display","block");
                
                if (res.code==200) {
                    $("#luckyImg").attr("src","/Application/Public/img/kong.png");
                    $("#luckyshowword").html("很遗憾没有中奖");
                }else{
                    $("#luckyImg").attr("src",res.info['img']);
                    $("#luckyshowword").html(res.info['award_name']);
                }
            },
            error:function (res) {
                
            }
        });
    }

    function changecolor(index){
        return function(){
            if(index%8==0){
                    index=8;
                }
            if(index>8){				
                index%=8;
            }
            for (var i=1;i<=8;i++) {
                document.getElementById('luckyBox'+i).className="normalDiv";
            }
            document.getElementById('luckyBox'+index).className="hoverDiv";
        }		
    }
</script>
</html>