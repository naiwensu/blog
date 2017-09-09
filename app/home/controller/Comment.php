<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\home\model\Comment as Comm;

class Comment extends Base{
	//获取文章评论
	public function comment()
	{
		$aid=input('aid');
		//$data=db('comment')->where('aid',$aid)->select();
		$data=Db::table('comment')->alias('c')->join('blog_user u','c.uid=u.id')->where('c.aid',$aid)->field('c.id,c.aid,c.content,c.create_time,u.username')->select();
		//echo $aid;
		//echo $data;
		echo json_encode($data);
	}

	//评论
	public function doComment()
	{
		$comm=new Comm;
		$content=input('content');
		$uid=input('uid');
		$aid=input('aid');
		$comm->data(['content'=>$content,'uid'=>$uid,'aid'=>$aid]);
		$res=$comm->save();
		if ($res) {
			$cnum=count($comm->where('aid',$aid)->select());
			db('article')->where('id',$aid)->update(['cnum'=>$cnum]);
			echo "1";
		}else{
			echo "0";
		}
	}

	//删除评论
	public function delcomment()
	{
		$cid=input('get.id');
		$res=db('comment')->where('id',$cid)->delete();
		if ($res) {
			return $this->success('删除成功！');
		}else{
			return $this->error('删除失败！');
		}
		
	}

}
