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
        $g = M("goods");        
        $flag = $_GET['family'];
        if($flag==100){
            $type = $_GET['ggggg'];
            $res = $g->where('g_num>0 and g_state=1 and g_type ='.$type)->order('g_hot')->select(); 
            $gc = M('goodsclass');
            $val = $gc->where('id ='.$type)->find();
            $info = $val['type'];
        }elseif($flag==58){
            $city = $_SESSION['ucity'];
            if($city){
                $res = $g->alias('g')
                        ->join('tyn_users u on g.from_id=u.id')
                        ->where("g_num>0 and g_state=1 and u_city ='".$city."'")->order('g_hot')->select();
            }else{
                $res=[];
            }
        }elseif($flag==555){
            $res = $g->where('g_num>0 and g_state=1')->order('g_hot desc')->select();
        }elseif($flag==200){
            $info = $val = $_GET['val'];
            $res = $g->where("g_num>0 and g_state=1 and g_name like '%%".$val."%%'")->order('g_hot desc')->select();
        }
        $_SESSION['val'] = $info;
        $this->assign('list',$res);
        $this->display();
    }
}