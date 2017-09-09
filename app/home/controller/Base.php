<?php
namespace app\home\controller;

use think\Controller;
use think\Session;
use think\Db;
use think\Cookie;

class Base extends Controller{

	 public function _initialize()
	 {
	 	$request = \think\Request::instance();	 	
	 	//Cookie::set(session_name(),Cookie::get(session_name()),30);
	 	Cookie::init(['expire'=>0,'path'=>'/']);
	 	//echo session_name();
	 	//var_dump(Cookie::get(session_name()));exit;
	 }
}