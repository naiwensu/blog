<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	$data=db('article')->where('id',1)->select();
    	$this->assign('article',$data);

        return $this->fetch();
    }

    public function demo()
    {
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

