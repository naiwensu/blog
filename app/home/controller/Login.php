<?php
namespace app\home\controller;

use think\Controller;
use think\captcha\Captcha;
use think\Cookie;

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
		//return $this->display(var_dump($res));
		
		if (!$res) {
					$this->error('验证码错误！');
			}	

		//数据库取数据，验证用户名和密码
		$user=db('blog_user')->where('username',$admin['username'])->find();

		if($user){
			if(md5($admin['password'])==$user['password']){
					session('username',$user['username']);
					session('id',$user['id']);
					//return $this->display(session('username'));
					$this->success('登录成功', 'index/index');
			}else{
				$this->error('密码错误！！');
			}

		}else{
			$this->error('用户名错误！！');
		}
	}

	//注册账户
	public function register()
	{
		return $this->fetch();
	}

	public function check()
	{
		$username=input('username');
		$res=db('blog_user')->where('username',$username)->find();
		if($res){
			echo  "0";
		}else{
			echo "1";
		}
	}
	//写入注册信息
	public function doreg()
	{
		$username=input('post.username');
		$password=md5(input('post.password'));
		$confirmpassword=md5(input('post.confirmpassword'));
		$code=input('post.code');
		$res=$this->check_verify($code,'');
		if (!$password==$confirmpassword) {
			return $this->error('密码与确认密码不匹配！');
		}elseif(!$res){
			return $this->error('验证码错误aa！');
		}
		$data=['username'=>$username,'password'=>$password];
		$res=db('blog_user')->insert($data);
		if($res){
			return $this->success('注册成功！','login/login');
		}else{
			return $this->error('注册失败！');
		}
	}

	//退出登录
	public function dologout()
	{
		//return $this->display('aaa');
		session(null);
		//var_dump(Cookie::get(session_name()));
		if (Cookie::has(session_name())) {
			Cookie::delete(session_name());
		}
		//echo "<hr>";
		//var_dump(Cookie::get(session_name()));
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
}