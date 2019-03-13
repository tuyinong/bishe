<?php
namespace Admin\Controller;
use Think\Controller;

class NoticesController extends Controller{
    //消息列表
    public function index(){
        $notice = M('notices');
        $sql = "select n.n_time,n.n_title,n.n_content,n.n_type,n.n_sendtime,u.u_account from tyn_notices as n left join tyn_users as u on n.n_userid=u.id order by n.n_time desc";
        $res = $notice->query($sql);
        $data = [];
        foreach($res as $key=>$val){
            $info['n_sendtime'] =$val['n_sendtime'];
            $time = Date('Y-m-d H:i:s',time());
            if(($time-$info['n_sendtime'])>0){
                $info['n_state'] = 1;
            }else{
                $info['n_state'] = 0;
            }
            $info['n_title'] = $val['n_title'];
            $info['n_content'] = $val['n_content'];
            if($val['n_type'] == "0"){
                $info['object'] = "全体用户";
            }else{
                $info['object'] = $val['u_account'];
            }
            $data[] = $info;
        }
        $this->assign('noticelist',$data);
        $this->display();
    }
    //发送消息
    public function sendnotice(){
        $this->display();
    }
}