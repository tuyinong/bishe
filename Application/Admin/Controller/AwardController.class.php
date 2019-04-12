<?php
namespace Admin\Controller;
use Think\Controller;

class AwardController extends Controller{
    // 列表
    public function awardlist(){
        $a = M("award");
        $res = $a->select();
        $this->assign('list',$res);
        $this->display();
    }
    // 删除奖品
    public function awarddel(){
        $aid = $_POST['aid'];
        $a = M('award');
        // dump($aid);
        $res = $a->where("id=$aid")->delete();
        if($res){   
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
    // // 添加图片
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
    // 添加奖品
    public function add(){
        $data = $_POST['data'];
        // dump($data);
        $infoall['award_name'] = $name = $data[0]['value'];
        $infoall['price'] = $price = $data[1]['value'];
        $infoall['info'] = $info = $data[2]['value'];
        $infoall['img'] = $photo = $data[3]['value'];
        $a=M('award');
        // dump($infoall);
        $res = $a->add($infoall);
        if($res){   
            $this->ajaxReturn(array('code'=>100));
        }else{
            $this->ajaxReturn(array('code'=>200));
        }
    }
}