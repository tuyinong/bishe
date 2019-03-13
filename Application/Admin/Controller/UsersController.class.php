<?php
namespace Admin\Controller;
use Think\Controller;

class UsersController extends Controller{
    //用户列表
    public function userlist(){
        // 判断管理员是否登录
        if (isset($_SESSION['ainfo'])) {
            $user=D('Users');
            $map['account']=$account = empty($_GET['account'])?"":$_GET['account'];
            $map['state']=$state = $_GET['status'];
            $count=$user->num_list($account,$state);//返回用户数量
            $Page = new \Think\Page($count,12);
            foreach($map as $key=>$val){
                $Page->parameter[$key] = urlencode($val);
            }
            $show = $Page->show();//显示分页导航
            $res = $user->show_list($account,$state,$Page->firstRow,$Page->listRows);//返回用户信息数组
            $this->assign("userlist",$res);//输出用户列表 
            $this->assign("page",$show);//输出分页导航  
            $this->assign("map",$map);//搜索条件
            $this->display();
        }else{
            $this->error("登录失败",U("Login/index"));
        }
    }
    //异常用户列表
    public function erruserlist(){
        // 判断管理员是否登录
        if (isset($_SESSION['ainfo'])) {
            $user=D('Users');
            $map['account']=$account = empty($_GET['account'])?"":$_GET['account'];
            $map['state'] = 0;
            $count=$user->num_list($account,"0");//返回用户数量
            $Page = new \Think\Page($count,12);
            foreach($map as $key=>$val){
                $Page->parameter[$key] = urlencode($val);
            }
            $show = $Page->show();//显示分页导航
            $res = $user->show_list($account,"0",$Page->firstRow,$Page->listRows);//返回用户信息数组
            $this->assign("userlist",$res);//输出用户列表 
            $this->assign("page",$show);//输出分页导航   
            $this->assign("map",$map);//搜索条件
            $this->display();
        }else{
            $this->error("登录失败",U("Login/index"));
        }
        
    }
    //冻结用户
    public function dongjie(){
        $uid = I('id');
        $user = M('users');
        $info['u_state'] = 0;
        $res = $user->where("id = $uid")->save($info);
        if ($res) {
            $this->success('操作成功',U('Users/userlist'));
        }else{
            $this->error('账号已冻结，请勿重复操作',U('Users/userlist'));
        }
    }
    // 解冻用户
    public function jiedong(){
        $uid = I('id');
        $user = M('users');
        $info['u_state'] = 1;
        $res = $user->where("id = $uid")->save($info);
        if ($res) {
            $this->success('操作成功',U('Users/erruserlist'));
        }else{
            $this->error('账号已解冻，请勿重复操作',U('Users/erruserlist'));
        }
    }
}