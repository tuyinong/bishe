<?php
namespace Admin\Controller;
use Think\Controller;

class EvaluationsController extends Controller{
    // 评价列表
    public function index(){
        $evaluation = M('evaluations');
        $sql = "select e.*,g.g_name,u.u_nickname from tyn_evaluations as e 
        left join tyn_goods as g on e.e_goodsid = g.id 
        left join tyn_users as u on e.e_userid = u.id order by e.e_time desc";
        $res = $evaluation->query($sql);
        $this->assign('evaluationlist',$res);
        // dump($res);
        $this->display();
    }
}