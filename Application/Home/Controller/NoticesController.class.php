<?php
namespace Home\Controller;
use Think\Controller;

class NoticesController extends Controller{
    //消息
    public function show(){
        $n = M('Notices');
        $uid = $_SESSION['uid'];
        $res = $n->where("n_state=1")->where("n_type=0 or n_userid=$uid")->order("n_sendtime desc")->select();
        $this->assign('list',$res);
        $this->display();
    }
}