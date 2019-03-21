<?php
namespace Home\Controller;
use Think\Controller;

class CollectsController extends Controller{
    // 我收藏的
    public function index(){
        $uid = 1;
        $co = M('collects');
        $res = $co->alias('c')->join('tyn_goods g on c.gid=g.id')
                        ->where('c.uid='.$uid)->select();
        $this->assign('list',$res);
        $this->display();
    }
}