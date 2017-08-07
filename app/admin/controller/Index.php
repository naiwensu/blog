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

	public function user()
	{	
		//$this->adminn=input('post.');
		//return $this->display(var_dump(session('username')));
		$this->assign('username',session('username'));
		return $this->fetch('index/usermessage');
	}

	//修改用户密码，更新时间自动完成	
	public function usermessage()
	{	
		//$res=db('user')->where(['username'=>session('username')])->find();
		$this->assign('username',session('username'));
		return $this->fetch();
	}

	public function changeuser()
	{
		$data=array();
		$data['password']=md5(input('post.oldpassword'));
		$data['username']=session('username');
		$newpassword=md5(input('post.newpassword'));
		$confirmpassword=md5(input('post.confirmpassword'));
		$res=db('user')->where($data)->find();
		if (!$res) {
			return $this->error('原密码输入错误！');
		}
		if ($newpassword=="") {
			return $this->error('新密码不能为空！');
		}
		if ($newpassword==$confirmpassword) {
			$user=new User;
			//$user->password=$newpassword;
			$data=db('user')->where(['username'=>session('username')])->find();
			$res=$user->save(['password'=>$newpassword],['id' => $data['id']]);
			//$res=db('user')->where('username',session('username'))->update(['password' => $newpassword]);
				if (!$res) {
					return $this->error('修改密码失败！');
				}
				return $this->success('修改密码成功！','Index/usermessage');
		}
		return $this->error('新密码与确认密码不匹配，请重新输入！');
	}

	//获取所有用户
	public function getallgroupusers()
	{
		//扩展分页类查询
		$res=Db::name('user')->select();
		$rows=10;
		$page = new Page(count($res), $rows);
		$limit=$page->limit();
		$list = Db::table('user')->limit($limit[0],$limit[1])->select();
		//return $this->display(var_dump($list));
		$this->assign('fenye',$page->links());
		$this->assign('allusers',$list);
		return $this->fetch();

/*
		$data=Db::name('user')->paginate(2);
		//return $this->display(var_dump($data));
		$this->assign('allusers',$data);
		return $this->fetch();
		*/
	}




}