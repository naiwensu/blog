<?php
namespace app\home\controller;

use think\Request;
use think\Db;
use fenye\Page;

/**
* 
*/
class Tags extends Base
{
	public function getalltags()
	{
		$data=db('Tags')->select();
		$this->assign('tags',$data);
		return $this->fetch();
	}

	public function check()
	{
		$tag=input('tagname');
		$res=db('tags')->where('tag',$tag)->find();
		if($res){
			echo  "0";
		}else{
			echo "1";
		}
	}
}