<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;
use think\Db;

class Base extends Controller{



	 public function _initialize()
	 {
	 	$request = \think\Request::instance();
        $action_name=$request->action();
	 	if(in_array($action_name,array('login','logout','captcha','dologin')) )
	 	{
	 		return;
	 	}
	 	if (!session('?username') || session('username') == "") {

	 		return $this->error('请先登录', 'Login/login');
	 	}
	 	//权限判断
	 	if (session('gid')=='1') {
	 		return;
	 	}
	 	$uri=explode('/',$_SERVER["REQUEST_URI"]);
	 	$data=array('controller'=>$uri['1'],'method'=>$uri['2']);
	 	$res=Db::table('user_role_priv')->field('controller,method')->where(['statue'=>'0','gid'=>session('gid')])->select();
	 	//return $this->display(var_dump($data));
	 	if ($uri['1']=="Group") {
	 		return $this->error('您无权进行此操作','Index/index');
	 	}
	 	if (in_array($data,$res)) {
	 		//return $this->display(var_dump('1'));
	 		return $this->error('您无权进行此操作','Index/index'); 		
	 	}
	 		//return $this->display(var_dump('0'));
	 }
}