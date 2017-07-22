<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Index extends Base{
	public function index()
	{	
		//$this->adminn=input('post.');
		//return $this->display(var_dump(session('username')));
		$this->assign('username',session('username'));
		return $this->fetch('index/usermessage');
	}

	//修改用户信息
	
	public function usermessage()
	{
		$this->assign('username',session('username'));
		return $this->fetch();
	}

	public function changeuser()
	{
		$data=array();
		$data['password']=input('post.oldpassword');
		$data['username']=session('username');
		$newpassword=input('post.newpassword');
		$confirmpassword=input('post.confirmpassword');
		$res=db('user')->where($data)->find();
		if (!$res) {
			return $this->error('原密码输入错误！');
		}
		if ($newpassword=="") {
			return $this->error('新密码不能为空！');
		}
		if ($newpassword==$confirmpassword) {
			$res=db('user')->where('username',session('username'))->update(['password' => $newpassword]);
				if (!$res) {
					return $this->error('修改密码失败！');
				}
				return $this->success('修改密码成功！','Index/usermessage');
		}
		return $this->error('新密码与确认密码不匹配，请重新输入！');
	}

	//发表(添加)文章
	public function publish()
	{
		return $this->fetch('Index/publish');
	}

	public function add()
	{
		//$this->success('添加成功','Index/publish');
		$title=input('post.title');
		$content=input('post.content');
		$tag=input('post.tag');
		$author=session('username');
		$uid=session('id');
		$time=time();
		$data=[
			'title'=>$title,
			'content'=>$content,
			'tag'=>$tag,
			'author'=>$author,
			'time'=>$time,
			'uid'=>$uid,
		];
		$res=db('article')->insert($data);
		//return $this->display(var_dump($res=db('article')->insert($data)));
		if ($res) {
			return $this->success('发表成功','Index/publish');
		}
		return $this->error('发表失败');
	} 

	//编辑文章
	public function edit()
	{
		$data=$this->getArticle();
		$this->assign('article',$data);
		//return $this->display(var_dump($data));
		return $this->fetch('Index/edit');
	}

	//编辑页面
	public function doedit()
	{
		$this->assign('title',input('get.title'));
		return $this->fetch();
	}

	public function update()
	{
		$title=input('get.title');
		//return $this->display(var_dump($title));
		$newtitle=input('post.title');
		$newcontent=input('post.content');
		$res=db('article')->where('title',$title)->update(['title' => $newtitle ,'content' => $newcontent]);
		if ($res) {
			$this->success('修改成功！','Index/edit');
		}
				$this->error('修改失败');

	}

	//删除文章
	public function delete()
	{
		$title=input('get.title');
		$res=db('article')->where('title',$title)->delete();
		if ($res) {
			$this->success('修改成功！','Index/edit');
		}
				$this->error('修改失败');

	}

	//添加用户
	public function adduser()
	{
		if (session('username')!='snw') {
			return $this->error('你没有权限进行此操作！');
		}
		return $this->fetch();
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

	public function doadduser()
	{
		$username=input('post.username');
		$password=input('post.password');
		$confirmpassword=input('post.confirmpassword');
		if ($username=="") {
			return $this->error('请填写用户名！');
		}
		if ($password=="") {
			return $this->error('请填写密码！');
		}
		if ($password!=$confirmpassword) {
			return $this->error('密码跟确认密码不匹配！');
		}
		$data=array();
		$data['username']=$username;
		$data['password']=md5($password);
		$res=db('user')->insert($data);
		if (!$res) {
			return $this->error('添加用户失败！');
		}
		return $this->success('添加用户成功！','Index/adduser');
	}

	//获取所有用户
	public function getallusers()
	{
		$data=db('user')->select();
		//return $this->display(var_dump($data));
		$this->assign('allusers',$data);
		return $this->fetch('index/getallusers');
	}

	//删除用户
	public function deleteuser()
	{
		$username=input('get.username');
		$res=db('user')->where('username',$username)->delete();
		if ($res) {
			return $this->success('删除成功','Index/getallusers');
		}
			return $this->error('删除失败');

	}

	//删除指定文章
	public function deletearticle()
	{
		$title=input('get.title');
		$res=db('article')->where('title',$title)->delete();
		if ($res) {
			return $this->success('删除成功');
		}
			return $this->error('删除失败');

	}

	//获取某个用户发表的所有文章
	public function getuserarticle()
	{
		$userid=input('get.id');
		$data=db('article')->where('uid',$userid)->select();
		//return $this->display(var_dump($data));
		$this->assign('userarticle',$data);
		return $this->fetch();

	}


	

	protected function getArticle()
	{
		return $article=db('article')->select();
	}
}