<?php
namespace Home\Controller;
use Think\Controller;

class AddressController extends Controller{
    // 收货地址列表
    public function index(){
        $uid = $_SESSION['uid'];
        $address = M('address');
        $res = $address->where('a_userid='.$uid)->select();
        $this->assign('list',$res);
        $this->display();
    }
    // 添加收货地址
    public function add(){
        if(IS_GET){
            $this->display();
        }
        if(IS_AJAX){
            $uid = $_SESSION['uid'];
            $address = M('address');
            $data = $_POST['data'];
            $info['a_province'] = $province = $data[0]['value'];//省份
            $info['a_city'] = $city = $data[1]['value'];//市
            $info['a_area'] = $area = $data[2]['value'];//区
            $info['a_street'] = $street = $data[3]['value'];//街道
            $info['a_addr'] = $addr = $data[4]['value'];//详细地址
            $info['a_name'] = $name = $data[5]['value'];//收件人
            $info['a_phone'] = $phone = $data[6]['value'];//收件人电话
            $info['a_post'] = $post = $data[7]['value'];//邮编
            $info['a_userid'] = $uid;
            $res = $address->add($info);
            if($res){
                $this->ajaxReturn(array('code'=>100));
            }else{
                $this->ajaxReturn(array('code'=>200));
            }
        }
    }
    // 编辑收货地址
    public function update(){
        $aid = $_GET['aid'];
        $address = M('address');
        $res = $address->where('id = '.$aid)->find();
        $this->assign('info',$res);
        $this->display();
    }
    // 删除地址
    public function delete(){
        $aid = intval($_POST['aid']);
        $address = M('address');
        $res = $address->where('id = '.$aid)->delete();
        if(res){
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
}