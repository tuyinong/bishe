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
    public function add(){
        $data = $_POST['data'];
        $data = json_decode($data,true);
        $info['n_title'] = $title = $data[0]['value'];
        $info['n_type'] = $object = intval($data[1]['value']);
        if($object==0){
            $info['n_content'] = $content = $data[2]['value'];
            $info['n_sendtime'] = $time = $data[3]['value'];
            $info['n_time'] =date('Y-m-d H:i:s',time());
        }else{
            $info['n_userid'] = $userid = intval($data[2]['value']);
            $info['n_content'] = $content = $data[3]['value'];
            $info['n_sendtime'] = $time = $data[4]['value'];
            $info['n_time'] = date('Y-m-d H:i:s',time());
        }
        $n = M('notices');
        $res = $n->add($info);
        if($res){
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
    // 
    public function sendjs(){
        $now = time();
        $n = M('notices');
        $res = $n->where("UNIX_TIMESTAMP(n_sendtime)<$now")->select();
        foreach($res as $key=>$val){
            $nid = $val['id'];
            $res1 = $n->where("id=$nid")->setInc('n_state');
        }
        $this->ajaxReturn(array('code'=>100));
    }
}