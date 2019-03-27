<?php
namespace Home\Controller;
use Think\Controller;

class RecordController extends Controller{
    
    // 用户卖出商品列表
    public function index(){
        $uid = $_SESSION['uid'];
        $r = M('records');
        $res = $r->alias('r')
                    ->join('tyn_goods g on g.id=r.r_gid')
                    ->join('tyn_users u on g.from_id=u.id')
                    ->where('from_id='.$uid)
                    ->select();
        foreach($res as $key=>$val){
            if($val['r_state']==1){
                $res[$key]['r_state']="交易成功";
            }elseif($val['r_state']==0){
                $res[$key]['r_state']="正在交易";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }

    // 用户买到的商品列表
    public function buy(){
        $uid = $_SESSION['uid'];
        $r = M('records');
        $res = $r->alias('r')
                ->join('tyn_goods g on g.id=r.r_gid')
                ->join('tyn_users u on g.from_id=u.id')
                ->where('r_userid='.$uid)
                ->select();
        foreach($res as $key=>$val){
            if($val['r_state']==1){
                $res[$key]['r_state']="交易成功";
            }elseif($val['r_state']==0){
                $res[$key]['r_state']="正在交易";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }
}