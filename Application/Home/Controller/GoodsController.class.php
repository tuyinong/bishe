<?php
namespace Home\Controller;
use Think\Controller;

class GoodsController extends Controller{
    // 商品详情
    public function details(){
        $gid = I('gid');
        if(!$gid)die;
        $goods = M('Goods');
        $goods->where('id='.$gid)->setInc('g_hot');
        $res = $goods->table("tyn_goods g")->field("g.*,u.u_nickname,u.u_uptime,u.u_credit")->join("tyn_users as u on g.from_id=u.id")->where("g.id=$gid")->find();
        // if($res['u_credit']>90){
        //     $res['u_credit']="信用极好";
        // }
        if((time()-strtotime($res['u_uptime']))<=1800){
            $res['u_uptime']="刚刚活跃";
        }else{
            $res['u_uptime']="近期活跃";
        }
        // dump($res);
        $this->assign('details',$res);
        $this->display();
    }
    // 取消发布
    public function cancelfabu(){
        $gid = $_POST['gid'];
        $g = M('goods');
        $res = $g->where("id=$gid")->delete();
        if($res){   
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
    // 留言(未完)
    // public function words(){
    //     $uid = $_SESSION['uid'];
    //     $gid = $_POST['gid'];
    //     // 判断用户是否登录
    //     if(!$uid){
    //         $this->ajaxReturn(array("code"=>1));
    //     }else{
    //         $goods = M('goods');
    //         $res = $goods->where("id = $gid and from_id = $uid")->find();
    //     }
    //     // var_dump($gid);
    // }
    // 收藏
    public function collect(){
        $info['uid'] = $uid = $_SESSION['uid'];
        $info['gid'] = $gid = $_POST['gid'];

        // 判断用户登录
        if(!$uid){
            $this->ajaxReturn(array("code"=>1));//用户未登录
        }else{
            $collect = M("collects");
            $res = $collect->where($info)->find();
            if($res){
                $this->ajaxReturn(array("code"=>2));//商品已收藏
            }else{
                $info['c_time'] = $time = date('Y-m-d H:i:s',time());
                $res = $collect->add($info);
                if($res){
                    $this->ajaxReturn(array("code"=>3));//商品收藏成功
                }
            }
        }
    }
    // 购买界面
    public function buy(){
        $gid = I('gid');
        $uid = $_SESSION['uid'];
        $aid = I('aid');
        $goods = M('Goods');
        $goods->where('id='.$gid)->setInc('g_hot');
        $res = $goods->where('id='.$gid)->find();
        $time = date('Y-m-d H:i:s',time());
        $add = M('address');
        if($aid){
            $adres = $add->where("id=$aid")->find();
        }else{
            $adres = $add->where("a_userid=$uid")->find();
        }
        $this->assign('info',$res);
        $this->assign('time',$time);
        $this->assign('address',$adres);
        $this->display();
    }
    // 用户界面 我的发布
    public function usergoodslist(){
        // $uid = $_SESSION['uid'];
        $uid = 1;
        $goods = M('goods');
        $res = $goods->where("from_id=".$uid)->select();
        foreach ($res as $key => $val) {
            if($val['g_state']==0){
                $res[$key]['g_state']="审核过程中";
            }else if($val['g_state']==1){
                $res[$key]['g_state']="发布中";
            }else if($val['g_state']==2){
                $res[$key]['g_state']="审核失败";
            }
        }
        $this->assign('list',$res);
        $this->display();
    }
    public function fabu(){
        $uid = $_SESSION['uid'];
        if(empty($uid)){
            $this->error('用户尚未登录',U('Login/index'));
        };
        if(IS_GET){
            $gc = M('goodsclass');
            $res = $gc->select();
            $this->assign('list',$res);
            $this->display();
        }
        if(IS_AJAX){
            $data = $_POST['data'];
            $info['g_name'] = $name = $data[0]['value'];
            $info['g_img'] = $img = $data[1]['value'];
            $info['g_price'] = $price = $data[2]['value'];
            $info['g_type'] = $type = $data[3]['value'];
            $info['g_time'] = $time = date('Y-m-d H:i:s');
            $info['from_id'] = $uid;
            $g = M('goods');
            $res = $g->add($info);
            if($res){   
                $this->ajaxReturn(array('code'=>100,'gid'=>$res));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
    // 商品分类菜单页面
    public function goodsmenu(){
        $gc = M('goodsclass');
        $res = $gc->select();
        $this->assign('list',$res);
        $this->display();
    }
    // 添加图片
    public function addimg(){
        $file = $_FILES;
        $infopath = [];
        // dump($file);
        // $file=$this->buildInfo($file);
        foreach($file as $key=>$val){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Application'; // 设置附件上传根目录
            $upload->savePath  =     '/Uploads/'; // 设置附件上传（子）目录
            $upload->autoSub=false;
            $info=$upload->uploadOne($val);
            if(!$info) {
                // 上传错误提示错误信息
                $this->error($upload->getError());
            }else{
                // 上传成功 获取上传文件信息
                $infopath[].='/Application'.$info['savepath'].$info['savename'];
            }
        }
        $this->ajaxReturn(array('data'=>$infopath));
    }
    // 消息
    public function chat(){
        $gid = $_POST['gid'];
        $g = M('goods');
        $res = $g->where("id=$gid")->find();
        $info['sellerid'] = $oid = $res['from_id'];
        $info['buyerid'] = $uid = $_SESSION['uid'];
        $m = M('messagetable');
        $res1 =$m->where("sellerid=$oid and buyerid=$uid")->find(); 
        if($res1){   
            $name = $res1['tablename'];
            $this->ajaxReturn(array('code'=>100,'name'=>$name));
        }else{
            $info['add_time'] = $time = time();
            $info['tablename'] = $name = "chat".$oid."000".$uid.$time;
            $sql = "CREATE TABLE `tyn_".$name."`(
                id INT(10) NOT NULL auto_increment primary key,
                content varchar(500) NOT NULL ,
                type int(2) NOT NULL DEFAULT '0',
                userid INT(10) NOT NULL,
                sendtime datetime,
                FOREIGN KEY (`userid`) REFERENCES `tyn_users` (`id`)
            )";
            $res = M()->execute($sql,true);
            $m->add($info);

            if($res==0){   
                $this->ajaxReturn(array('code'=>100,'name'=>$name));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
}