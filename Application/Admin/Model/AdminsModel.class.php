<?php
namespace Admin\Model;
use Think\Model;

class AdminsModel extends Model{
    // 列表
    public function list_admins($head=0,$end=0){
        $admin = M('admins','tyn_');
        if($head!=0 && $end=0){
            $res = $admin->where('a_level=2')->limit($head,$end)->select();
        }else{
            $res = $admin->where('a_level=2')->select();
        }
        foreach($res as $key=>$val){
            if($val['a_state']==1){
                $res[$key]['a_state']="<p style='color:green;'>在线</p>";
            }elseif($val['a_state']==0){
                $res[$key]['a_state']="<p style='color:grey;'>离线</p>";
            }
        }
        return $res;
    }
    // 数量
    public function num_admins(){
        $admin = M('admins','tyn_');
        $res = $admin->where('a_level=2')->count();
        return $res;
    }
}