<?php
namespace Home\Controller;
use Think\Controller;

class ScoreController extends Controller{
    // 积分签到
    public function addscore(){
        if(IS_AJAX){
            $s = M('score');
            $uid = $_SESSION['uid'];
            $panduan = $s->where("s_userid=$uid")->order("s_time desc")->find();
            $times = $panduan['s_time'];
            if(substr($times,0,10)==date('Y-m-d',time())){
                $this->ajaxReturn(array('code'=>200));
            }else{
                $info['s_userid'] = $uid;
                $info['s_num'] = 5;
                $info['s_reason'] = 1;
                $info['s_time'] = date('Y-m-d H:i:s',time());
                $res = $s->add($info);
                if($res){
                    $this->ajaxReturn(array('code'=>100));
                }else{
                    $this->ajaxReturn(array('code'=>200));
                }
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
            }elseif ($val['s_reason'] == -1) {
                $res[$key]['s_reason'] ="抽奖扣除积分";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }
    // 抽奖减积分
    public function decscore(){
        $info['s_userid'] = $uid = $_SESSION['uid'];
        $info['s_num'] = -10;
        $info['s_reason'] = -1;
        $info['s_time'] = date('Y-m-d H:i:s',time());
        $s = M("score");
        $num = $_POST['num'];
        if($num>=10){
            $res = $s->add($info);
            if($res){
                $this->ajaxReturn(array('code'=>100));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
    // 抽奖
    public function getaward(){
        $num=rand(1,10);
        $uid = $_SESSION['uid'];
        $award = M("award");
        $count = $award->count();
        if($num==1){
            $id = rand(1,$count);
            $res = $award->where("id=$id")->find();
            if($res){
                $ua = M('useraward');
                $info['awardid']=$id;
                $info['userid']=$uid;
                $info['addtime']=date('Y-m-d H:i:s',time());
                $ua->add($info);
                $this->ajaxReturn(array('code'=>100,'info'=>$res));
            }else{
                $this->ajaxReturn(array('code'=>200,'info'=>$re));
            }
        }else{
            $this->ajaxReturn(array('code'=>200,'info'=>$re));
        }
    }
}