<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\publish.html";i:1500469944;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>后台首页</title>
	<style>
		.page{
			background: #F8F8F8;
			position: relative;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 1000px;
		}

		.head{
			background: #909090;
			position: absolute;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100px;
		}

		.head h1{
			text-align:  center;
			cursor: pointer;
		}

		.left{
			background: #E8E8E8;
			position: absolute;
			left: 0px;
			top: 100px;
			width: 15%;
			height: 900px;
		}




		li{
			display: block;
			height:30px;
			line-height: 30px;
			padding-left: 12px;
			cursor: pointer;
			font-size: 18px;
			position:relative;
		}
		
		.page .right{
			background: #F0F0F0;
			position: absolute;
			left: 15%;
			top: 100px;
			width: 85%;
			height: 900px;
		}

	</style>
</head>
<body>
	<div class="page">
		<div class="head">
			<h1>后台管理页面</h1>

			<div class="left">
			<ul>
				<a href="index"><li>用户信息</li></a>
				<a href="publish"><li>发表文章</li></a>
				<a href="edit"><li>编辑文章</li></a>
			</ul>
			</div>

		</div>

		

		<div class="right">
			<form>
				文章标题：<input type="text" name="title"><br>
				文章内容：<br><textarea rows="10" cols="30"></textarea><br>
				<input type="submit" name="提交">
			</form>
		</div>


	</div>
</body>
</html>