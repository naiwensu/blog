<?php
namespace app\home\controller;

use think\Controller;

/**
* 
*/
class Mail extends Controller
{	
	public function mail()
	{
		return $this->fetch();
	}

	public function sendMail()
	{
		$email = input('email');
		$subject = input('subject');
		$message = input('message');
		mail("1872937640@qq.com", $subject,
		$message, "From:" . $email);
		return $this->display("邮件发送成功");
	}
}