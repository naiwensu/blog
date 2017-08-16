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
	 	Cookie::init(['expire'=>3600,'path'=>'/']);
	 }
}