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
        .msqd{
            position: absolute;
            top: 26px;
            right: 0;
            margin: 5px;
            background-color: #ff9900;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="jumbotron" style="margin-bottom:0">
        <div class="media">
            <div class="media-left">
                <img src="/Application/Public/img/toxiang.png" class="media-object" style="width:60px">
            </div>
            <div class="media-body">
                <p class="media-heading" style="margin-bottom:0"><?php echo ($all); ?></p>
                <p id="bill" style="font-size:13px">积分明细 &gt;</p>
                <button id="sign" class="msqd">马上签到</button>                
            </div>
        </div>
    </div>
    <div>
        <!--九宫格-->
		<div class="first_main" id="first_main">
            <div class="safewidth">
                <div id="luckyDiv">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['user_id']; ?>" />
                    <div id="luckyBox1" class="normalDiv"></div>
                    <div id="luckyBox2" class="normalDiv"></div>
                    <div id="luckyBox3" class="normalDiv"></div>
                    <div id="luckyBox8" class="normalDiv"></div>
                    <div id="luckyBtn">
                        <div style="width: 100px;height: 100px; border-radius: 50px;background-color: indianred;text-align: center;margin: 50px;">
                            <span style="line-height: 100px; color: white;">点击抽奖</span><br />
                            <span id="word" style="font-size: 15px;"></span>
                        </div>
                    </div>
                    <div id="luckyBox4" class="normalDiv"></div>
                    <div id="luckyBox7" class="normalDiv"></div>
                    <div id="luckyBox6" class="normalDiv"></div>
                    <div id="luckyBox5" class="normalDiv"></div>					
                </div>
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
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
<!-- 抽奖 -->
<script>
    var clickFlag =true;
    $("#luckyBtn").click(function(){
        var jsonStr='{"user_id":"'+$("#user_id").val()+'"}';
        if (clickFlag) {
            $.ajax({
                type:"post",
                url:"../Controller/showController.php?action=lucky",
                async:true,
                dataType:"text",
                data:"data="+jsonStr,
                success:function(res) {
                    if (res>0) {
                        clickFlag=false;
                        res--;
                        //产生一个随机数
                        var index=Math.ceil(Math.random()*8);
                        index+=24;
                        for (var m=1;m<=index;m++) {	//样式切换次数
                            setTimeout(changecolor(m),6*m*m);
                        }			
                        $("#word").html("剩余抽奖次数"+res);
                        setTimeout(function(){
                            document.getElementById('luckyBox'+(index-24)).className='luckyDiv';			
                        },6*index*index+10);
                        setTimeout(function(){
                            getaward(index);	
                            clickFlag=true;
                        },6*index*index+200);		
                    }else{
                        $("#word").html("暂无抽奖次数");
                    }
                },
                error:function(res) {
                    
                }
            });		
        }
    })
    function getaward (index) {
        var jsonStr='{"user_id":"'+$("#user_id").val()+'"}';
        $.ajax({
            type:"post",
            url:"../Controller/showController.php?action=showlucky",
            async:true,
            dataType:"json",
            data:"data="+jsonStr,
            success:function (res) {
                console.log(res);
                console.log(res[0]);
                console.log(res[1]);
                $("#luckyshow").css("display","block");
                $("#luckyshowword").html(res[0]);
                if (res[1]=="") {
                    $("#luckyImg").attr("src","../../Back/img/kong.png");
                }else{
                    $("#luckyImg").attr("src","../../Back/"+res[1]);
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