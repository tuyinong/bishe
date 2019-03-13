<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页
    public function index(){
        // 商品显示
        $goods = M('goods');
        $sql = "select g.*,u.u_nickname from tyn_goods as g join tyn_users as u on g.from_id = u.id order by g.g_time desc limit 15";
        $res = $goods->query($sql);
        $this->assign("goodslist",$res);
        $this->display();
    }
    //发布商品
    public function issuance(){
        $this->display();
    }
    // 商品列表
    public function goodslist(){
        $_SESSION['val'] =$_GET['val'];
        $this->display();
    }
}