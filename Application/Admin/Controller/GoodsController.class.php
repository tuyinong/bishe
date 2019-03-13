<?php
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends Controller{
    //商品列表
    public function index(){
        $goods = D('Goods');
        $map['g_name'] = $g_name = empty($_GET['name'])?"":$_GET['name'];
        $map['u_account'] = $u_account = empty($_GET['account'])?"":$_GET['account'];
        $count = $goods->num_list($g_name,$u_account,0);
        $Page = new \Think\Page($count,12);
        foreach($map as $key=>$val){
            $Page->parameter[$key]=urlencode($val);
        }
        $show = $Page->show();
        $res = $goods->show_list($g_name,$u_account,0,$Page->firstRow,$Page->listRows);
        $this->assign('page',$show);// 分页导航
        $this->assign('map',$map);
        $this->assign('goodslist',$res);
        $this->display();
    }
    //上架商品
    public function goodslist(){
        $goods = D('Goods');
        $map['g_name'] = $g_name = empty($_GET['name'])?"":$_GET['name'];
        $map['u_account'] = $u_account = empty($_GET['account'])?"":$_GET['account'];
        $count = $goods->num_list($g_name,$u_account,1);
        $Page = new \Think\Page($count,12);
        foreach($map as $key=>$val){
            $Page->parameter[$key]=urlencode($val);
        }
        $show = $Page->show();
        $res = $goods->show_list($g_name,$u_account,1,$Page->firstRow,$Page->listRows);
        $this->assign('page',$show);// 分页导航
        $this->assign('map',$map);
        $this->assign('goodslist',$res);
        $this->display();
    }
    //异常商品列表
    public function errgoodslist(){
        $goods = D('Goods');
        $map['g_name'] = $g_name = empty($_GET['name'])?"":$_GET['name'];
        $map['u_account'] = $u_account = empty($_GET['account'])?"":$_GET['account'];
        $count = $goods->num_list($g_name,$u_account,2);
        $Page = new \Think\Page($count,12);
        foreach($map as $key=>$val){
            $Page->parameter[$key]=urlencode($val);
        }
        $show = $Page->show();
        $res = $goods->show_list($g_name,$u_account,2,$Page->firstRow,$Page->listRows);
        $this->assign('page',$show);// 分页导航
        $this->assign('map',$map);
        $this->assign('goodslist',$res);
        $this->display();
    }
    //商品审核
    public function goodspass(){
        $goods = M('goods');
        $data = $_POST['data'];
        // $data = stripslashes(html_entity_decode($data));
        $data = json_decode($data,true);
        $gid = intval($data['gid']);
        $type = $data['type'];
        
        // 商品通过
        if($type ==1){
            $time = Date('Y-m-d H:i:s',time());
            $info['g_state'] = 1;
            $info['g_time'] = $time;
            $res = $goods->where("id = $gid")->save($info);
            if($res){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
        // 商品未通过
        if($type ==2){
            $time = Date('Y-m-d H:i:s',time());
            $info['g_state'] = 2;
            $info['g_time'] = $time;
            $res = $goods->where("id = $gid")->save($info);
            if($res){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
    
}