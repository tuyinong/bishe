<?php
namespace Admin\Controller;
use Think\Controller;

class AdminsController extends Controller{
    // 管理员列表
    public function index(){
        $ainfo = $_SESSION['ainfo'];
        if($ainfo['a_level']!=1)die;
        $ad = D('Admins');
        $count = $ad->num_admins();
        $Page = new \Think\Page($count,10);
        $show = $Page->show();
        $res = $ad->list_admins($Page->firstRow,$Page->listRows);
        $this->assign('page',$show);
        $this->assign('list',$res);
        $this->display();
    }
    //添加管理员
    public function add(){
        if(IS_GET){
            $this->display();
        }
        if(IS_POST){
            $data = $_POST;
            $ad = M('admins');
            $res = $ad->where("a_account='".$data['a_account']."'")->find();
            if($res){
                $this->error('生成失败，账号已存在');
            }else{
                $data['a_time'] = $time = date('Y-m-d H:i:s',time());
                $result = $ad->add($data);
                if($result){
                    $this->success('生成管理员成功',U('Admins/index'));
                }else{
                    $this->error('生成失败，重新尝试');
                }
            }
        }
    }
    // 管理员信息
    public function info(){
        $ainfo = $_SESSION['ainfo'];
        $aid = $ainfo['id'];
        if(IS_AJAX){
            $ad = M('admins');
            $data = $_POST['data'];
            $data = stripslashes(html_entity_decode($data));
            $data = json_decode($data,true);
            $info['a_pwd'] = $pwd =$data[0]['value'];
            $info['a_nickname'] = $nickname =$data[1]['value'];
            $info['a_phone'] = $phone =intval($data[2]['value']);
            $res = $ad->where('id='.$aid)->save($info);
            if($res){
                $_SESSION['ainfo'] = $info = $ad->where('id='.$aid)->find();
                $this->ajaxReturn(array('code'=>100));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
        $this->assign('info',$ainfo);
        $this->display();
    }
}