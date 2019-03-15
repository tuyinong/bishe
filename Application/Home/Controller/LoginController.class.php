<?php
    namespace Home\Controller;
    use Think\Controller;

    class LoginController extends Controller{
        public function index(){
            if(IS_GET){
                $this->display();die;
            }
            if(IS_AJAX){
                $data=$_POST['data'];
                $data = stripslashes(html_entity_decode($data)); //$data是传递过来的json字符串
                $data = json_decode($data,TRUE);
                $where['u_account']=$account=$data[0]['value'];
                $where['u_pwd']=$pwd=$data[1]['value'];
                $user=M('users');
                $res=$user->where($where)->find();
                $id = intval($res['id']);
                $name = $res['u_nickname'];
                if($res){
                    $time = date('Y-m-d H:i:s',time());
                    $res = $user->where("id = ".intval($res['id']))->save(array("u_uptime"=>$time));                  
                   if($res){
                        $_SESSION['uid']=$id;
                        $_SESSION['uname']=$name;
                        $logflag=1;
                        $this->ajaxReturn($logflag);
                   }
                }else{
                    $logflag=2;
                    $this->ajaxReturn($logflag);
                }
            }
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
                $user = M('users');
                $account = $data[0]['value'];
                $pd=$user->where("account = $account")->find();
                if($pd){
                    $this->ajaxReturn(array('regflag'=>2));
                }else{
                    $res=$user->add($info);
                    if($res){
                        $_SESSION['uid']=intval($res);
                        // dump($_SESSION['uid']);
                        $this->ajaxReturn(array('regflag'=>1));
                    }else{
                        $this->ajaxReturn(array('regflag'=>2));
                    }
                }      
            } 
        }
    }
    