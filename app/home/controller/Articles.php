<?php
namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\admin\model\Comment;

class Articles extends Base{
	//阅读全文，评论
	public function article()
	{
		//return $this->display(var_dump($_COOKIE[session_name()]));
        $aid=input('get.id');
        Db::table('article')
	    ->where('id', $aid)
	    ->setInc('rnum');
        $data=db('article')->where('id',$aid)->find();
        $this->assign('article',$data);
		$data=db('comment')->where('aid',$aid)->select();
		$this->assign('comment',$data);
		$res=db('blog_user')->where('id',session('id'))->field('collection')->find();
		$arr=explode(',',$res['collection']);
		//var_dump(in_array(session('id'), $arr));exit;
		if (in_array($aid, $arr)) {
			$this->assign('collect','取消收藏');
		}else{
			$this->assign('collect','收藏');
		}
		//var_dump($arr);exit;
		//$data=json_encode($data);
		//$data=json_decode($data,true);
        //return $this->display(var_dump($data));
        return $this->fetch();
	}

	//获取某个用户发表的所有文章
	public function getuserarticle()
	{
		//扩展分页类
		$a=!empty(input('get.id'))?input('get.id'):session('userid');
		session('userid',$a);
		$list = Db::table('article')->where('uid',session('userid'))->select();
		//$arr = [...];//数据数组
		$rows = 2;//每页显示数据量
		$page = new Page(count($list), $rows);
		//return $this->display(var_dump($page->limit()));
		$limit=$page->limit();
		//return $this->display(var_dump($limit));
		//$nowpage=$page->getActivePage()
		//$list = Db::name('article')->where('uid',session('userid'))->select($limit['0'],$limit['1']);
		$list = Db::table('article')->where('uid',session('userid'))->limit($limit[0],2)->select();
		//return $this->display(var_dump($list));
		if(!$list){
					return $this->fetch("articles/nouserarticle");
		}
		$this->assign('fenye',$page->links());
		$this->assign('userarticle', $list);
		return $this->fetch();
		//简单分页（只有‘上一页’，‘下一页’）
		//$page->simpleLinks();
		
/*
		//自带分页类

		//分页URL无法传入参数，将参数存于session中
		$a=!empty(input('get.id'))?input('get.id'):session('userid');
		session('userid',$a);

		//$this->userid = !empty($this->userid)?$this->userid:input('get.id');
		// 查询状态为1的用户数据 并且每页显示10条数据
		$list = Db::name('article')->where('uid',session('userid'))->paginate(2);


		// 把分页数据赋值给模板变量list
		$this->assign('userarticle', $list);
		// 渲染模板输出
		return $this->fetch();
		
		//$userid=input('get.id');
		//$data=db('article')->where('uid',$userid)->select();
		//return $this->display(var_dump($data));
		//$this->assign('userarticle',$data);
		//return $this->fetch();
*/
	}


	//获取所有文章
	protected function getArticle()
	{
		return $article=db('article')->select();
	}

	//获取tag标签文章
	public function tagarticles()
	{
		$tag=input('get.tag');
		$data=db('article')->where('tag',$tag)->select();
		$rows = 4;//每页显示数据量
		$page = new Page(count($data), $rows);
		//return $this->display(var_dump($page->limit()));
		$limit=$page->limit();
		//return $this->display(var_dump($limit));
		//$nowpage=$page->getActivePage()
		//$list = Db::name('article')->where('uid',session('userid'))->select($limit['0'],$limit['1']);
		$list = Db::table('article')->where('tag',$tag)->limit($limit[0],4)->select();
		if(!$list){
					return $this->fetch("articles/notagarticle");
		}
		$this->assign('fenye',$page->links());
		$this->assign('article',$list);
		return $this->fetch('tags/tagarticle');
	}
}