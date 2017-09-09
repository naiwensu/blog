<?php
namespace app\admin\controller;

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

	public function addtags()
	{
		return $this->fetch();
	}

	public function doaddtags()
	{
		$tag=input('post.tagname');
		$res=db('tags')->insert(['tag'=>$tag]);
		if ($res) {
			return $this->success('添加成功');
		}else{
			return $this->error('添加失败');
		}

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