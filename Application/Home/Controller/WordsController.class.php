<?php
namespace Home\Controller;
use Think\Controller;

class WordsController extends Controller{
    // 留言详情
    public function index(){
        $gid = $_GET['gid'];
        $w = M('words');
        $g = M('goods');
        $res = $w->alias('w')
                    ->field('w.*,u.u_nickname')
                    ->join('tyn_users u on w_userid=u.id')
                    ->where('w_gid='.$gid)->order('w_time asc')->select();
        $ginfo = $g->where("id=$gid")->find();
        if($res){
            $this->assign('flag',1);
        }else{
            $this->assign('flag',0);
        }
        $this->assign('list',$res);
        $this->assign('info',$ginfo);
        $this->display();
    }
    // 添加留言
    public function add(){
        if(IS_GET){
            $this->display();
        }
        if(IS_AJAX){ 
            $info['w_userid'] = $uid = intval($_SESSION['uid']);
            $info['w_info'] = $winfo = $_POST['info'];
            $info['w_time'] = date('Y-m-d H:i:s',time());
            $info['w_gid'] = $gid = intval($_POST['gid']);
            $w = M('words');
            $res = $w->add($info);
            if(!$uid){
                $this->ajaxReturn(array('code'=>200));
            }else{
                if($res){
                    $this->ajaxReturn(array('code'=>100,'gid'=>$gid));
                }else{
                    $this->ajaxReturn(array('code'=>200));
                }
            }
        }
    }
}