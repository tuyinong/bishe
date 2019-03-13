<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页
    public function index(){
        $admin=M('admins');
        if (isset($_SESSION['ainfo'])) {
            $this->display();
        }else{
            $this->error("登录失败",U("Login/index"));
        }
    }
    
}