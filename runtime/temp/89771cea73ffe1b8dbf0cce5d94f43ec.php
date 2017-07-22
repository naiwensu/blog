<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\doedit.html";i:1500468478;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>提交编辑</title>
</head>
<body>
	<form action="update?title=<?php echo $title; ?>" method="post">
		标题：<input type="text" name="title"><br>
		内容：<input type="text" name="content"><br>
		<input type="submit" name="提交">
	</form>
</body>
</html>