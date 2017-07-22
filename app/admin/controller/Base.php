<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

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

	 		 $this->error('请先登录', 'Login/login');
	 	}

	 }
}