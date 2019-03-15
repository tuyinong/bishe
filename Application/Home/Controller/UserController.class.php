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
        $this->display();
    }
 } 