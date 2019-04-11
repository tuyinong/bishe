<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>系统消息</title>
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
    <script>
        
        window.onload = function(){

            var list = <?php echo json_encode($list);?>;
            console.log(list[0])
            var uid = <?php echo (session('uid')); ?>;
            console.log(uid)

            // var arrIcon = ['http://www.xttblog.com/icons/favicon.ico','http://www.xttblog.com/wp-content/uploads/2016/03/123.png'];
            var iNow = -1;    //用来累加改变左右浮动
            var content = document.getElementsByTagName('ul')[0];
            var img = content.getElementsByTagName('img');
            var span = content.getElementsByTagName('span');
            var btn = document.getElementById('btn');
            var text = document.getElementById('text');

            for(var i=0;i<list.length;i++){
                content.innerHTML += '<li><span>'+list[i].content+'</span></li>';
                iNow++;
                console.log(list[i].userid==uid)
                if(list[i].userid==uid){
                    // img[iNow].className += 'imgright';
                    span[iNow].className += 'spanright';
                }else {
                    // img[iNow].className += 'imgleft';
                    span[iNow].className += 'spanleft';
                }
                text.value = '';
                // 内容过多时,将滚动条放置到最底端
                content.scrollTop=content.scrollHeight;  
            }

            // setInterval(function(){
            //     document.location.reload();
            // },2000)
            btn.onclick = function(){
                if(text.value ==''){
                    alert('不能发送空消息');
                }else {
                    var name = '<?php echo ($_GET['mm778899']); ?>';
                    $.ajax({
                        url:"<?php echo U('Index/messageadd');?>",
                        async:true,
                        type:'post',
                        data:{val:text.value,name:name},
                        dataType:'json',
                        success:function(res){
                            if(res.code==100){
                                // document.location.href="/index.php/Home/Goods/details?gid="+res.gid;
                                document.location.reload();
                            }
                        },error:function(res){
                            console.log(res)
                        }
                    })
                }
            }
        }
    </script>
</head>
<body>
    <div style="height:10px;width:100%;"></div>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="container">
            <div class="panel" style="border: 1px solid #dddddd;">
                <div class="panel-heading" style="font-weight:700">
                    <?php echo ($vo["n_title"]); ?>
                </div>
                <div class="panel-body">
                    <p><?php echo ($vo["n_content"]); ?></p>
                </div>
                <div class="panel-footer">
                    <?php echo ($vo["n_sendtime"]); ?>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>