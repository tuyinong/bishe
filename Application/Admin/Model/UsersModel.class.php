<?php
namespace Admin\Model;
use Think\Model;

class UsersModel extends Model{
    // 返回完整的用户列表
    public function show_list($account,$state,$head=0,$end=0){
        $users = M('users','tyn_');
        $where = "1=1";
        if($account!=""){
            $where.=" and u_account like '%%".$account."%%'";
        }
        if($state!=""){
            $where.=" and u_state=$state";
        }
        if($end!=0){
            $list = $users->limit($head,$end)->where($where)->order('u_time desc')->select();
        }else{
            $list = $users->where($where)->order('u_time desc')->select();
        }
        return $list;
    }
    // 返回用户数
    public function num_list($account,$state){
        $users = M('users','tyn_');
        $where = "1=1";
        if($account!=""){
            $where.=" and u_account like '%%".$account."%%'";
        }
        if($state!=""){
            $where.=" and u_state=$state";
        }
        $count = $users->where($where)->count();
        return $count;
    }
}