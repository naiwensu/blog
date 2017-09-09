<<<<<<< HEAD
<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\admin\model\User;
use app\admin\model\Article;

class Index extends Base{
	public $userid;

	//首页，根据发表时间降序获取所有文章
	public function index()
	{
		$article=db('article')->order('create_time desc')->select();
		$this->assign('article',$article);
		return $this->fetch();
	}
=======
<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\admin\model\User;
use app\admin\model\Article;

class Index extends Base{
	public $userid;

	//首页，根据发表时间降序获取所有文章
	public function index()
	{
		$article=db('article')->order('create_time desc')->select();
		$this->assign('article',$article);
		return $this->fetch();
	}
>>>>>>> eb1c85eb6aec921952158591ccb8b7335130ffbe
}