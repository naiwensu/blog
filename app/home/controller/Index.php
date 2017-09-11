<?php
namespace app\home\controller;
use think\Controller;
use fenye\Page;
use think\Db;

class Index extends Controller
{
	private $allArticles;

    public function index()
    {
    	//连接redis，首页文章缓存10s刷新一次
    	$redis = new \Redis();
   		$redis->connect('127.0.0.1', 6379);
    	//var_dump(json_decode($redis->get('name'),true));exit;
    	$allArticles=$redis->get('allarticles');
    	if (!$allArticles) {
    		$allArticles=db('article')->order('create_time desc')->select();
    		$redis->set('allarticles',json_encode($allArticles),10);
    		$allArticles=$redis->get('allarticles');
    	}   	
    	$allArticles=json_decode($allArticles,true);
    	//$data=db('article')->order('create_time desc')->select();
        $rows = 4;//每页显示数据量
        $page = new Page(count($allArticles), $rows);
        $limit=$page->limit();
        $list = Db::table('article')->limit($limit[0],4)->select();
        if(!$list){
                    return $this->fetch("articles/notagarticle");
        }
        $this->assign('article',$list);
        $this->assign('fenye',$page->links());
        //return $this->display(var_dump($data));
        return $this->fetch();
    }

    public function tags()
    {
    	$data=db('article')->where('id',1)->select();
    	$this->assign('article',$data);
    	return $this->fetch();
    }

    public function about()
    {
    	return $this->fetch();
    }

    public function searchtag($tag)
    {
    	$data=db('article')->where('tag',$tag)->select();
    	$this->assign('article',$data);
    	return $this->fetch();
    }
}
