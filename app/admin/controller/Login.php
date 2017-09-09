<<<<<<< HEAD
<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;

class Login extends Base
{
	//登录页面
	public function login()
	{
		return $this->fetch();
	}

	//登录验证
	public function dologin()
	{
		//输入验证
		$admin=input('post.');
		if(!$admin){
			$this->redirect('Login/login');
		}

		if(!$admin['username']){
			$this->error('请输入用户名！');
		}

		if(!$admin['password']){
			$this->error('请输入密码！');
		}

		if(!$admin['code']){
			$this->error('请输验证码！');
		}
		$res=$this->check_verify($admin['code'],'');
		
		if (!$res) {
					$this->error('验证码错误！');
			}	

		//数据库取数据，验证用户名和密码
		$user=db('user')->where('username',$admin['username'])->find();

		if($user){
			if(md5($admin['password'])==$user['password']){
					session('username',$user['username']);
					session('id',$user['id']);
					session('gid',$user['gid']);
					//return $this->display(session('username'));
					$this->success('登录成功', 'Index/index');
			}else{
				$this->error('密码错误！！');
			}

		}else{
			$this->error('用户名错误！！');
		}
	}

	//退出登录
	public function dologout()
	{
		//return $this->display('aaa');
		session(null);
		return $this->fetch('login/login');
	}

	//验证码
	public function captcha()
	{
		$config =    [
    		// 验证码字体大小
    		'fontSize'    =>    15,    
    		// 验证码位数
    		'length'      =>    4,   
    		// 关闭验证码杂点
    		'useNoise'    =>    false, 
		];
		$captcha = new Captcha($config);
		return $captcha->entry();
	}

	//验证验证码
	public function check_verify($code, $id = ''){
    $captcha = new Captcha();
    return $captcha->check($code, $id);
	}
=======
<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;

class Login extends Base
{
	//登录页面
	public function login()
	{
		return $this->fetch();
	}

	//登录验证
	public function dologin()
	{
		//输入验证
		$admin=input('post.');
		if(!$admin){
			$this->redirect('Login/login');
		}

		if(!$admin['username']){
			$this->error('请输入用户名！');
		}

		if(!$admin['password']){
			$this->error('请输入密码！');
		}

		if(!$admin['code']){
			$this->error('请输验证码！');
		}
		$res=$this->check_verify($admin['code'],'');
		
		if (!$res) {
					$this->error('验证码错误！');
			}	

		//数据库取数据，验证用户名和密码
		$user=db('user')->where('username',$admin['username'])->find();

		if($user){
			if(md5($admin['password'])==$user['password']){
					session('username',$user['username']);
					session('id',$user['id']);
					session('gid',$user['gid']);
					//return $this->display(session('username'));
					$this->success('登录成功', 'Index/index');
			}else{
				$this->error('密码错误！！');
			}

		}else{
			$this->error('用户名错误！！');
		}
	}

	//退出登录
	public function dologout()
	{
		//return $this->display('aaa');
		session(null);
		return $this->fetch('login/login');
	}

	//验证码
	public function captcha()
	{
		$config =    [
    		// 验证码字体大小
    		'fontSize'    =>    15,    
    		// 验证码位数
    		'length'      =>    4,   
    		// 关闭验证码杂点
    		'useNoise'    =>    false, 
		];
		$captcha = new Captcha($config);
		return $captcha->entry();
	}

	//验证验证码
	public function check_verify($code, $id = ''){
    $captcha = new Captcha();
    return $captcha->check($code, $id);
	}
>>>>>>> eb1c85eb6aec921952158591ccb8b7335130ffbe
}