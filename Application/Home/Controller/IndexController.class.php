<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页
    public function index(){
        // 商品显示
        $goods = M('goods');
        $sql = "select g.*,u.u_nickname from tyn_goods as g join tyn_users as u on g.from_id = u.id where g_num>0 and g_state=1 order by g.g_time desc limit 15";
        $res = $goods->query($sql);
        $this->assign("goodslist",$res);
        $this->display();
    }
    //发布商品
    public function issuance(){
        $this->display();
    }
    // 商品列表
    public function goodslist(){
        $g = M("goods");        
        $flag = $_GET['family'];
        // $uid = $_SESSION['uid'];
        if($flag==100){
            $type = $_GET['ggggg'];
            $res = $g->where('g_num>0 and g_state=1 and g_type ='.$type)->order('g_hot')->select(); 
            $gc = M('goodsclass');
            $val = $gc->where('id ='.$type)->find();
            $info = $val['type'];
        }elseif($flag==58){
            if($_SESSION['uid']){
                $province = $_SESSION['province'];
                $city = $_SESSION['city'];
                if($city){
                    $res = $g->alias('g')
                            ->join('tyn_users u on g.from_id=u.id')
                            ->where("g_num>0 and g_state=1 and u_provice ='".$province."' and u_city='".$city."'")->order('g_hot')->select();
                    // dump($res);
                }else{
                    $res=[];
                }
            }else{
                $this->error('用户尚未登录',U('Login/index'));
            }
            
        }elseif($flag==555){
            $res = $g->where('g_num>0 and g_state=1')->order('g_hot desc')->select();
        }elseif($flag==200){
            $info = $val = $_GET['val'];
            $res = $g->where("g_num>0 and g_state=1 and g_name like '%%".$val."%%'")->order('g_hot desc')->select();
        }
        $_SESSION['val'] = $info;
        $this->assign('list',$res);
        $this->display();
    }
    //消息列表
    public function messagelist(){
        $uid = $_SESSION['uid'];
        if(!$uid){
            $this->error('用户尚未登录',U('Login/index'));
        }
        
        $m = M('messagetable');
        $res = $m->where("sellerid=$uid or buyerid=$uid")->select();
        foreach($res as $key=>$val){
            // 获取昵称
            if($val['sellerid']==$uid){
                $oid = $val['buyerid'];
                $u = M('users');
                $name = $u->where("id=$oid")->find();
                $res[$key]['othernn'] = $name['u_nickname'];
            }elseif($val['buyerid']==$uid){
                $oid = $val['sellerid'];
                $u = M('users');
                $name = $u->where("id=$oid")->find();
                $res[$key]['othernn'] = $name['u_nickname'];
            }
            // 获取最新聊天信息
            $tablename = $val['tablename'];
            $t = M($tablename);
            $mres = $t->order('sendtime desc')->find();
            $res[$key]['info'] = $mres['content'];
            $res[$key]['sendtime'] = $mres['sendtime'];

            $typeres = $t->where("userid!=$uid and type=0")->order('sendtime desc')->find();
            if($typeres){
                $res[$key]['type'] = 0;
            }else{
                $res[$key]['type'] = 1;
            }
            
            // dump($mres);
        }
        // dump($res);
        $this->assign('list',$res);
        $this->display();
    }

    // 消息记录
    public function messageinfo(){
        if(IS_GET){
            $tn = $_GET['mm778899'];
            $uid = $_SESSION['uid'];
    
            $time = date('H:i',time());// 时间
            
            $mt = M('messagetable'); //昵称
            $val = $mt->where("tablename='".$tn."'")->find();
            if($val['sellerid']==$uid){
                $oid = $val['buyerid'];
                $u = M('users');
                $name = $u->where("id=$oid")->find();
            }else{
                $oid = $val['sellerid'];
                $u = M('users');
                $name = $u->where("id=$oid")->find();
            }
    
            $t = M($tn);
            $t->where("type=0 and userid!=$uid")->setInc('type');
            $res = $t->select();
            // dump($res);
            
            $this->assign('time',$time);
            $this->assign('name',$name['u_nickname']);
            $this->assign('list',$res);
            $this->display();
        }
        if(IS_AJAX){
            $tn = $_GET['mm778899'];
            $t = M($tn);
            $res1 = $t->select();
            $this->ajaxReturn(array('code'=>100,'list'=>$res1));
        }
    }
    // 发送信息
    public function messageadd(){
        $tn = $_POST['name'];
        $t = M($tn);

        $info['sendtime'] = $time = date('Y-m-d H:i:s',time());// 时间
        $info['userid'] = $uid = $_SESSION['uid'];
        $info['content'] = $val = $_POST['val'];
        $res = $t->add($info);
        if($res){
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }

    }
    // 提示消息
    public function tipmess(){
        $_SESSION['newmess']=0;
        $uid = $_SESSION['uid'];
        $m = M('messagetable');
        $res = $m->where("sellerid=$uid or buyerid=$uid")->select();
        foreach($res as $key=>$val){
            $tablename = $val['tablename'];          
            $t = M($tablename);
            $count = $t->where("type=0 and userid!=$uid")->count();
            if($count>0){
                $_SESSION['newmess']=1;break;
            }
        }
        echo $_SESSION['newmess'];
    }
}