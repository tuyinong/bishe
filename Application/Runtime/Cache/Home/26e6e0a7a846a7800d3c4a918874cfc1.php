<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>发布商品</title>
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
    <style>
        textarea{
            width: 100%;
            font-size: 17px;
            padding: 5px;
            line-height: 30px;
            outline: none;
        }
        .fsbtn{
            float: right;
            padding: 5px;
            margin: 10px;
            outline: none;
        }
        .in{
            background-color: #fff4ee;
            color: #ff663a;
        }
        select{
            outline: none;
            -webkit-appearance: none;
            position: absolute;
            width: 80%;
        }
    </style>
</head>
<body>
    <form id="fabuform">
        <div>
            <textarea id="info" name="name" id="name" cols="30" rows="6" placeholder="描述宝贝的转手原因、入手聚到和使用感受"></textarea>
        </div> 
        <div class="list">
            <span class="span1">价格</span>
            <span>
                <input type="text" name="price" placeholder="" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">分类</span>
            <span>
                <!-- <input type="text" name="type" placeholder="" value=""> -->
                <select name="type">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </span>
            <span class="span2">&gt;</span>
        </div> 
        <div class="list">
            <span class="span1">交易方式</span>
            <input type="hidden" id="type" name="type" value="">
            <button type="button" class="fsbtn" style="outline:none;">同城交易</button><button type="button" class="fsbtn" style="outline:none;">邮寄</button>
        </div>              
    </form>
    <div id="fabudiv" class="addrfooter" style="background-color:#ff9900;color:black">
        确认发布
    </div>
</body>
<script>
    // 按钮切换状态
    $(".fsbtn").click(function(){
        var index = $(".fsbtn").index(this);
        if($('.fsbtn').eq(index).hasClass('in')){
            $('.fsbtn').eq(index).removeClass('in');
        }else{
            $('.fsbtn').removeClass('in');
            $('.fsbtn').eq(index).addClass('in');
            $("#type").val(index);
        }
    })
    $("#fabudiv").click(function(){
        var form_data = $("#fabuform").serializeArray();
        $.ajax({
            url:"<?php echo U('Goods/fabu');?>",
            async:true,
            type:'post',
            data:{data:form_data},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.href="/index.php/Home/Goods/details?gid="+res.gid;
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>