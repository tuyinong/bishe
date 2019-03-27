<?php
namespace Home\Controller;
use Think\Controller;

class GoodsController extends Controller{
    // 商品详情
    public function details(){
        $gid = I('gid');
        if(!$gid)die;
        $goods = M('Goods');
        $res = $goods->table("tyn_goods g")->field("g.*,u.u_nickname,u.u_uptime,u.u_credit")->join("tyn_users as u on g.from_id=u.id")->find();
        // if($res['u_credit']>90){
        //     $res['u_credit']="信用极好";
        // }
        if((time()-strtotime($res['u_uptime']))<=1800){
            $res['u_uptime']="刚刚活跃";
        }else{
            $res['u_uptime']="近期活跃";
        }
        // dump($res);
        $this->assign('details',$res);
        $this->display();
    }
    // 留言(未完)
    public function words(){
        $uid = $_SESSION['uid'];
        $gid = $_POST['gid'];
        // 判断用户是否登录
        if(!$uid){
            $this->ajaxReturn(array("code"=>1));
        }else{
            $goods = M('goods');
            $res = $goods->where("id = $gid and from_id = $uid")->find();
        }
        // var_dump($gid);
    }
    // 收藏(未完)
    public function collect(){
        $info['uid'] = $uid = $_SESSION['uid'];
        $info['gid'] = $gid = $_POST['gid'];

        // 判断用户登录
        if(!$uid){
            $this->ajaxReturn(array("code"=>1));//用户未登录
        }else{
            $collect = M("collexts");
            $res = $collect->where($info)->find();
            if($res){
                $this->ajaxReturn(array("code"=>2));//商品已收藏
            }else{
                $res = $collect->add($info);
                if($res){
                    $this->ajaxReturn(array("code"=>3));//商品收藏成功
                }
            }
        }
    }
    // 取消收藏(未完)
    public function cancel(){
        $gid = $_POST['gid'];
        dump($gid);
    }
    // 购买
    public function buy(){
        $this->display();
    }
    // 用户界面 我的发布
    public function usergoodslist(){
        // $uid = $_SESSION['uid'];
        $uid = 1;
        $goods = M('goods');
        $res = $goods->where("from_id=".$uid)->select();
        foreach ($res as $key => $val) {
            if($val['g_state']==0){
                $res[$key]['g_state']="审核过程中";
            }else if($val['g_state']==1){
                $res[$key]['g_state']="发布中";
            }else if($val['g_state']==2){
                $res[$key]['g_state']="审核失败";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }
    public function fabu(){
        $uid = $_SESSION['uid'];
        if(empty($uid)){
            $this->error('用户尚未登录',U('Login/index'));
        };
        if(IS_GET){
            $gc = M('goodsclass');
            $res = $gc->select();
            $this->assign('list',$res);
            $this->display();
        }
        if(IS_AJAX){
            $data = $_POST['data'];
            $info['g_name'] = $name = $data[0]['value'];
            $info['g_price'] = $price = $data[1]['value'];
            $info['g_type'] = $type = $data[3]['value'];
            $info['g_time'] = $time = date('Y-m-d H:i:s');
            $info['from_id'] = $uid;
            $g = M('goods');
            $res = $g->add($info);
            if($res){   
                $this->ajaxReturn(array('code'=>100,'gid'=>$res));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
    // 商品分类菜单页面
    public function goodsmenu(){
        $gc = M('goodsclass');
        $res = $gc->select();
        $this->assign('list',$res);
        $this->display();
    }
}