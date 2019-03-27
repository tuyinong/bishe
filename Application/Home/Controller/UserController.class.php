<?php
 namespace Home\Controller;
 use Think\Controller;

 class UserController extends Controller{
    public function index(){
        if($_SESSION['uid']){
            $this->display();
        }else{
            $this->error('用户尚未登录',U('Login/index'));
        }
        
    }
    public function personal(){
        $uid = $_SESSION['uid'];
        $user = M('users');
        if(IS_GET){
            $res = $user->where('id = '.$uid)->find();
            $this->assign('info',$res);
            $this->display();
        }
        if(IS_AJAX){
            $type = $_POST['type'];
            if($type==1){   //修改生日
                $time = $_POST['birth'];
                $info['u_birthday'] = $birth = date('Y-m-d',$time);
                $res = $user->where('id = '.$uid)->save($info);
                if(res){
                    $this->ajaxReturn(array('code'=>100));
                }else{
                    $this->ajaxReturn(array('code'=>200));
                }
            }elseif($type==2){  //修改性别
                $info['u_sex'] = $data = $_POST['sex'];
                $res = $user->where('id = '.$uid)->save($info);
                if(res){
                    $this->ajaxReturn(array('code'=>100));
                }else{
                    $this->ajaxReturn(array('code'=>200));
                }
            }elseif($type==3){  //修改昵称
                $info['u_nickname'] = $data = $_POST['name'];
                $res = $user->where('id = '.$uid)->save($info);
                if(res){
                    $this->ajaxReturn(array('code'=>100));
                }else{
                    $this->ajaxReturn(array('code'=>200));
                }
            }
        }
    }
    // 设置
    public function setup(){
        if(IS_GET){
            $this->display();
        }
        if(IS_AJAX){
            session_unset();
            $this->ajaxReturn(array('code'=>100));
        }
    }
 } 