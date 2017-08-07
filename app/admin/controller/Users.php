<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\admin\model\User;
use app\admin\model\Article;

class Users extends Base{
	//添加用户
	public function adduser()
	{
		if (session('username')!='snw') {
			return $this->error('你没有权限进行此操作！');
		}
		return $this->fetch();
	}

	public function doadduser()
	{
		$username=input('post.username');
		$password=input('post.password');
		$confirmpassword=input('post.confirmpassword');
		$gid=input('post.gid');
		if ($username=="") {
			return $this->error('请填写用户名！');
		}
		if ($password=="") {
			return $this->error('请填写密码！');
		}
		if ($password!=$confirmpassword) {
			return $this->error('密码跟确认密码不匹配！');
		}

		//$data=array();
		//$data['username']=$username;
		//$data['password']=md5($password);
		//$res=db('user')->insert($data);

		$user=new User;
		$user->username=$username;
		$user->password=md5($password);
		$user->gid=$gid;
		$res=$user->save();
		
		if (!$res) {
			return $this->error('添加用户失败！');
		}
		return $this->success('添加用户成功！','Users/adduser');
	}

	public function check()
	{
		$username=input('username');
		$res=db('user')->where('username',$username)->find();
		if($res){
			echo  "不允许";
		}else{
			echo "允许";
		}
	}

	//获取所有用户
	public function getallusers()
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
		return $this->fetch('users/getallusers');

/*
		$data=Db::name('user')->paginate(2);
		//return $this->display(var_dump($data));
		$this->assign('allusers',$data);
		return $this->fetch('index/getallusers');
*/
	}

	//删除用户,同时删除用户所有文章
	public function deleteuser()
	{
		$username=input('get.username');
		db('article')->where('author',$username)->delete();
		$res=db('user')->where('username',$username)->delete();
		if ($res) {
			return $this->success('删除成功','Users/getallusers');
		}
			return $this->error('删除失败');

	}

}