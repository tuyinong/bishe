<?php
namespace Admin\Controller;
use Think\Controller;

class EvaluationsController extends Controller{
    // 评价列表
    public function index(){
        $evaluation = M('evaluations');
        $sql = "select e.*,r.r_gid,u.u_nickname from tyn_evaluations as e 
        left join tyn_records as r on e.e_rid = r.id 
        left join tyn_users as u on e.e_userid = u.id order by e.e_time desc limit 20";
        $res = $evaluation->query($sql);
        $this->assign('evaluationlist',$res);
        // dump($res);
        $this->display();
    }
    // 查询评价
    public function queryeva(){
        if(IS_GET){
            $this->display();
            die;
        }
        $info=[];
        $info['name'] = $name = $_POST['name'];//买家昵称
        $where['u_nickname']=array('like','%%'.$name.'%%');
        $info['content'] = $content = $_POST['content'];//评价内容
        $where['e_info']=array('like','%%'.$content.'%%');
        $e = M('evaluations');
        $res = $e->alias('e')
                ->field('e.*,r.r_gid,u.u_nickname')
                ->join('tyn_users u on e.e_userid=u.id')
                ->join('tyn_records r on e.e_rid = r.id ')
                ->where($where)
                ->select();
        $this->assign('info',$info);
        $this->assign('list',$res);
        $this->display();
    }
    // 删除
    public function deleva(){
        if(IS_AJAX){ 
            $eid = $_POST['eid'];
            $eva = M('evaluations');
            $res = $eva->where("id=$eid")->delete();
            if($res){
                $this->ajaxReturn(array('code'=>100));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
}