<?php
namespace Home\Controller;
use Think\Controller;

class CollectsController extends Controller{
    // 我收藏的
    public function index(){
        $uid = $_SESSION['uid'];
        $co = M('collects');
        $res = $co->alias('c')->join('tyn_goods g on c.gid=g.id')
                ->where('c.uid='.$uid.' and g.g_num>0')
                ->select();
        $this->assign('list',$res);
        $this->display();
    }
    // 取消收藏
    public function cancelshoucang(){
        $uid = $_SESSION['uid'];
        $cid = $_POST['cid'];
        $gid = $_POST['gid'];
        $c = M('collects');
        if($cid){
            $res = $c->where("id=$cid")->delete();
        }else{
            $res = $c->where("gid=$gid and uid=$uid")->delete();
        }
        
        if($res){   
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
}