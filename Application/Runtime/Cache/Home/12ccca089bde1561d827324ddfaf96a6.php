<?php if (!defined('THINK_PATH')) exit();?><!-- css样式 -->
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
    .footer {
        width: 100%;
        height: 60px;
        background: #666;
        position: absolute;
        bottom: -9px;
        padding: 10px;
    }
    .footer input {
        width: 90%;
        height: 40px;
        outline: none;
        font-size: 20px;
        text-indent: 10px;
        position: absolute;
        border-radius: 3px;
        /* right: 20px; */
    }
    .footer span {
        display: inline-block;
        width: 100%;
        height: 40px;
        background: #ccc;
        font-weight: 900;
        line-height: 40px;
        cursor: pointer;
        text-align: center;
        position: absolute;
        right: 10px;
        border-radius: 3px;
        font-size: 20px;
    }
    .footer span:hover {
        color: #fff;
        background: #999;
    }
</style>
<div class="footer">
    <div class="row">
        <div class="col-xs-10">
            <input id="text" type="text" placeholder="说点什么吧...">
        </div>
        <div class="col-xs-2">
            <span id="btn">发送</span>
        </div>
    </div>
</div>