<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页
    public function index(){
        $admin=M('admins');
        if (isset($_SESSION['ainfo'])) {
            $users = $this->usercount();
            $goods = $this->goodscount();
            $goodsall = $this->goodsall();
            $goodsok = $this->goodsok();
            $userall = $this->userall();
            $userhy = $this->userhy();
            $this->assign('users',$users);
            $this->assign('goods',$goods);
            $this->assign('goodsall',$goodsall);
            $this->assign('goodsok',$goodsok);
            $this->assign('userall',$userall);
            $this->assign('userhy',$userhy);
            $this->display();
        }else{
            $this->error("登录失败",U("Login/index"));
        }
    }
    // 七天用户数
    public function usercount(){
        $user = M('users');
        $time = strtotime( '- 7 days', time());

        for($i=0;$i<7;$i++){
            $res['count'][] = $user->where("UNIX_TIMESTAMP(u_time)>=UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL ".(6-$i)." DAY)) and UNIX_TIMESTAMP(u_time)<UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL ".(5-$i)." DAY))")
                         ->count();
            $time = strtotime( '+ 1 days', $time);
            $date = date('m-d',$time);
            $res['time'][] = $date;
        }
        return $res;
    }
    // 七天用户数
    public function goodscount(){
        $g = M('goods');
        $time = strtotime( '- 7 days', time());

        for($i=0;$i<7;$i++){
            $res['count'][] = $g->where("UNIX_TIMESTAMP(g_time)>=UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL ".(6-$i)." DAY)) and UNIX_TIMESTAMP(g_time)<UNIX_TIMESTAMP(DATE_SUB(CURDATE(),INTERVAL ".(5-$i)." DAY))")
                         ->count();
            $time = strtotime( '+ 1 days', $time);
            $date = date('m-d',$time);
            $res['time'][] = $date;
        }
        return $res;
    }
    // 商品总数
    public function goodsall(){
        $g = M('goods');
        $res = $g->sum('g_num');
        return $res;
    }
    // 商品成交记录数
    public function goodsok(){
        $r = M('records');
        $res = $r->count();
        return $res;
    }
    // 用户总数
    public function userall(){
        $u = M('users');
        $res = $u->count();
        return $res;
    }
    // 近期活跃数(30天)
    public function userhy(){
        $u = M('users');
        $time = strtotime( '- 30 days', time());
        $res = $u->where('UNIX_TIMESTAMP(u_uptime)>'.$time)->count();
        return $res;
    }
}