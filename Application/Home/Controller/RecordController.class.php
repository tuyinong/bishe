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
                $res[$key]['r_state']="确认收货";
            }elseif($val['r_state']==0){
                $res[$key]['r_state']="未收货";
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
                ->field('r.*,g.g_name')
                ->join('tyn_goods g on g.id=r.r_gid')
                ->join('tyn_users u on g.from_id=u.id')
                ->where('r_userid='.$uid)
                ->select();
        foreach($res as $key=>$val){
            if($val['r_state']==1){
                $res[$key]['r_state']="确认收货";
            }elseif($val['r_state']==0){
                $res[$key]['r_state']="未收货";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }
    // 购买商品
    public function add(){
        $info['r_userid'] = $uid = $_SESSION['uid'];
        $data = $_POST['data'];
        $r = M('records');
        $info['r_gid'] = $gid = intval($data[0]['value']);
        $info['r_price'] = $price = doubleval($data[1]['value']);
        $info['r_time'] = $time = date('Y-m-d H:i:s',time());
        $res = $r->add($info);
        if($res){
            $goods = M('goods');
            $goods->where('id='.$gid)->setDec('g_num');
            $fidres = $goods->where('id='.$gid)->find();
            $snfo2['s_userid'] = $fidres['from_id'];
            $snfo1['s_time'] = $snfo2['s_time'] = $time;
            $snfo1['s_userid'] = $_SESSION['uid'];
            $snfo1['s_num'] = $snfo2['s_num'] = $price;
            $snfo1['s_reason'] = 2;
            $snfo2['s_reason'] = 3;
            $s = M('score');
            $s->add($snfo1);
            $s->add($snfo2);
            $this->ajaxReturn(array('code'=>100));
        }
    }
    // 确认收货
    public function take(){
        $rid = $_POST['rid'];
        $r = M('records');
        $res = $r->where('id='.$rid)->setInc('r_state');
        if(res){
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
}