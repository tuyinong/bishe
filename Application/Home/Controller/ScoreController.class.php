<?php
namespace Home\Controller;
use Think\Controller;

class ScoreController extends Controller{
    // 积分签到
    public function addscore(){
        if(IS_AJAX){
            $s = M('score');
            $uid = $_SESSION['uid'];
            $info['s_userid'] = $uid;
            $info['s_num'] = 5;
            $info['s_reason'] = 1;
            $info['s_time'] = date('Y-m-d H:i:s',time());
            $res = $s->add($info);
            if(res){
                $this->ajaxReturn(array('code'=>100));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
    // 积分明细
    public function info(){
        $uid = $_SESSION['uid'];
        $s = M('score');
        $res = $s->where('s_userid='.$uid)->order('s_time desc')->select();
        foreach($res as $key=>$val){
            if($val['s_reason'] == 1){
                $res[$key]['s_reason'] ="签到成功！";
            }elseif ($val['s_reason'] == 2) {
                $res[$key]['s_reason'] ="购买宝贝获得积分";
            }elseif ($val['s_reason'] == 3) {
                $res[$key]['s_reason'] ="卖出宝贝获得积分";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }
}