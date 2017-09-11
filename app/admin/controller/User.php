<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
//use app\admin\model\User as Users;
//use app\admin\model\User;
use app\admin\model\Article;

class User extends Base{
	public function user()
	{	
		//$this->adminn=input('post.');
		//return $this->display(var_dump(session('username')));
		$this->assign('username',session('username'));
		$create_time=db('user')->where('id',session('id'))->field('create_time')->find();
		$this->assign('create_time',$create_time['create_time']);
		return $this->fetch('user/usermessage');
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
			$user=new \app\admin\model\User;
			//$user->password=$newpassword;
			$data=db('user')->where(['username'=>session('username')])->find();
			$res=$user->save(['password'=>$newpassword],['id' => $data['id']]);
			//$res=db('user')->where('username',session('username'))->update(['password' => $newpassword]);
				if (!$res) {
					return $this->error('修改密码失败！');
				}
				return $this->success('修改密码成功！','User/usermessage');
		}
		return $this->error('新密码与确认密码不匹配，请重新输入！');
	}

	//添加用户
	public function adduser()
	{
		if (session('username')!='snw') {
			return $this->error('你没有权限进行此操作！');
		}
		$data=db('group')->select();
		$this->assign('group',$data);
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

		$user=new \app\admin\model\User;
		$user->username=$username;
		$user->password=md5($password);
		$user->gid=$gid;
		$res=$user->save();
		
		if (!$res) {
			return $this->error('添加用户失败！');
		}
		return $this->success('添加用户成功！','User/adduser');
	}

	public function check()
	{
		$username=input('username');
		$res=db('user')->where('username',$username)->find();
		if($res){
			echo  "0";
		}else{
			echo "1";
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
		return $this->fetch('user/getallusers');

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
			return $this->success('删除成功','User/getallusers');
		}
			return $this->error('删除失败');

	}

}