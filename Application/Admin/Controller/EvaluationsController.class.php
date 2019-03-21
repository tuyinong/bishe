<?php
namespace Admin\Controller;
use Think\Controller;

class EvaluationsController extends Controller{
    // 评价列表
    public function index(){
        $evaluation = M('evaluations');
        $sql = "select e.*,r.r_gid,u.u_nickname from tyn_evaluations as e 
        left join tyn_records as r on e.e_rid = r.id 
        left join tyn_users as u on e.e_userid = u.id order by e.e_time desc";
        $res = $evaluation->query($sql);
        $this->assign('evaluationlist',$res);
        // dump($res);
        $this->display();
    }
}