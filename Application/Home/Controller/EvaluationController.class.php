<?php
namespace Home\Controller;
use Think\Controller;

class EvaluationController extends Controller{
    // 评价信息
    public function index(){
        $rid = $_GET['rid'];
        $eva = M('evaluations');
        $res1 = $eva->alias('e')
                    ->field('e.*,u.u_nickname')
                    ->join('tyn_users u on e_userid=u.id')
                    ->where('e_rid='.$rid)->order('e_time asc')->find();
        $res2 = $eva->alias('e')
                    ->field('e.*,u.u_nickname')
                    ->join('tyn_users u on e_userid=u.id')
                    ->where('e_rid='.$rid)->limit(1,99)->order('e_time asc')->select();
        if($res1){
            $this->assign('flag',1);
        }else{
            $this->assign('flag',0);
        }
        $this->assign('info',$res1);
        $this->assign('list',$res2);
        $this->display();
    }
    // 添加评价
    public function add(){
        if(IS_GET){
            $this->display();
        }
        if(IS_AJAX){ 
            $info['e_userid'] = $uid = $_SESSION['uid'];
            $info['e_info'] = $evainfo = $_POST['info'];
            $info['e_time'] = date('Y-m-d H:i:s',time());
            $info['e_rid'] = $rid = $_POST['rid'];
            $eva = M('evaluations');
            $res = $eva->add($info);
            if($res){
                $this->ajaxReturn(array('code'=>100,'rid'=>$rid));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
}