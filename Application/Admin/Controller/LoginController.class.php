<?php
    namespace Admin\Controller;
    use Think\Controller;

    class LoginController extends Controller{
        // 管理员登录界面
        public function index(){
            if(IS_GET){
                $this->display();die;
            }
            if(IS_AJAX){
                $data=$_POST['data'];
                // $data = stripslashes(html_entity_decode($data)); //$data是传递过来的json字符串
                $data = json_decode($data,true);

                $where['a_account']=$account=$data[0]['value'];
                $where['a_pwd']=$pwd=$data[1]['value'];
                $admin=M('admins');
                $res=$admin->where($where)->find();
                // dump($res);
                if($res){
                    $_SESSION['ainfo']=$res;
                    $logflag=1;
                    $this->ajaxReturn($logflag);
                }else{
                    $logflag=2;
                    $this->ajaxReturn($logflag);
                }
            }
        }
        // 退出
        public function logout(){
            session_destroy();
            $this->success("退出成功",U("Login/index"));
        }
        // 用户注册
        public function register(){
             if(IS_GET){
                $this->display();die;
             }
             if(IS_AJAX){
                $data = I('data');
                $data = stripcslashes(html_entity_decode($data));
                $data = json_decode($data,true);
                $info['account'] = $data[0]['value'];
                $info['u_pwd'] = $data[1]['value'];
                $time = date("Y-m-d H:i:s",time());
                $info['u_time'] = $time;
                $user = M('user');
                $account = $data[0]['value'];
                $pd=$user->where("account = $account")->find();
                if($pd){
                    $this->ajaxReturn(array('regflag'=>2));
                }else{
                    $res=$user->add($info);
                    if($res){
                        $_SESSION['aid']=intval($res);
                        // dump($_SESSION['uid']);
                        $this->ajaxReturn(array('regflag'=>1));
                    }else{
                        $this->ajaxReturn(array('regflag'=>2));
                    }
                }      
            } 
        }
    }
    