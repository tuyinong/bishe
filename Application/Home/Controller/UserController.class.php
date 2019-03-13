<?php
 namespace Home\Controller;
 use Think\Controller;

 class UserController extends Controller{
    public function index(){
        $this->display();
    }
    public function personal(){
        $this->display();
    }

    // 我的发布
    public function fabu(){
        // $uid = $_SESSION['uid'];
        $uid = 1;
        $goods = M('goods');
        $res = $gooods->where("from_id=".$uid)->select();
        dump($res);
        $this->assign('list',$res);
        $this->display();
    }
 } 