<?php
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{
    // 商品列表
    public function show_list($g_name,$u_account,$state,$head=0,$end=0){
        $goods = M('goods','tyn_');
        $where = "g.g_state=$state";
        if($g_name!=""){
            $where.=" and g.g_name like '%%".$g_name."%%'";
        }
        if($u_account!=""){
            $where.=" and u.u_account like '%%".$u_account."%%'";
        }
        if($end!=0){
            $res = $goods->table('tyn_goods g')
            ->join('left join tyn_users u on g.from_id=u.id')
            ->field('g.*,u.u_account,u.u_nickname')
            ->limit($head,$end)
            ->where($where)
            ->order('g.g_time')
            ->select();
        }else{
            $res = $goods->table('tyn_goods g')
            ->join('left join tyn_users u on g.from_id=u.id')
            ->field('g.*,u.u_account,u.u_nickname')
            ->where($where)
            ->order('g.g_time')
            ->select();
        }
        return $res;
    }
    // 列表数
    public function num_list($g_name,$u_account,$state){
        $goods = M('goods','tyn_');
        $where = "g.g_state=$state";
        if($g_name!=""){
            $where.=" and g.g_name like '%%".$g_name."%%'";
        }
        if($u_account!=""){
            $where.=" and u.u_account like '%%".$u_account."%%'";
        }
        $num = $goods->table('tyn_goods g')
        ->join('left join tyn_users u on g.from_id=u.id')
        ->field('g.*,u.u_account,u.u_nickname')
        ->where($where)
        ->order('g.g_time')
        ->count();
        return $num;
    }
}