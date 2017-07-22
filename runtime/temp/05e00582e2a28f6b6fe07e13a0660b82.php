<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\phpStudy\WWW\blog\public/../app/admin\view\login\login.html";i:1500390070;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>登录页面</title>
</head>
<body style="background: #FFFFFF">
	<div align="center" style="background: #C0C0C0;height:1000px;margin: 20px 20px 0px 20px;padding: 80px 500px 40px 500px">
		<div style="background: #E0E0E0;padding: 5px 5px 5px 5px">
		<div>
				<h1>后台登录</h1>
		</div>

		<div style="color: gray;width:250px;height: 150px;padding: 5px 5px 5px 5px">

			<form action="dologin" method="post">
				登录到用户中心<br>
				用户名：<input type="text" name="username" value=""><br>
				密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" value=""><br>
				验证码：<input type="text" name="code"><div>
				<div><img src="captcha" onclick="javascript:this.src=this.src+'?tm='+Math.random();" alt="captcha" /></div>

				<!--<div><img src="<?php echo captcha_src(); ?>" onclick="javascript:this.src='<?php echo captcha_src(); ?>?tm='+Math.random();" alt="captcha" /></div>-->

				
				<p><input type="submit" name="submit" value="登录"></p>

			</form>
		</div>
		
	</div>
	</div>


</body>
</html>