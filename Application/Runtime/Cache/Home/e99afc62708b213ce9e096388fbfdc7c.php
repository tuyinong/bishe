<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>发布商品</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>

    <style>
        body{
            width: 100%;
        }
        .returnBtn{
            position: fixed;
            top: 30px;
            left: 30px;
        }
        .camera{
            width: 100%;
            height: 580px;
            border: 1px solid;
        }
    </style>
</head>
<body>
    <div id="returnBtn" class="returnBtn">
        X
    </div>
    <div id="camera" class="camera"></div>
</body>
</html>