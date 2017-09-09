<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\phpStudy\WWW\blog\public/../app/index\view\index\tags.html";i:1500361721;s:63:"D:\phpStudy\WWW\blog\public/../app/index\view\index\common.html";i:1500443857;}*/ ?>

	<!DOCTYPE html>
<html>
<head>
	<title>苏乃文的博客</title>
	<style>
		.all{
			position:relative;
			width:100%;
			height: 1000px;
			left:0px;
			top:0px;
			background: white;
		}

		.about{
			position:absolute;
			width:1000px;
			height: 500px;
			left:200px;
			top:0px;
			background: white;
		}

		.index{
			position:absolute;
			width:200px;
			height: 500px;
			left:0px;
			top:0px;
			background: gray;
		}

		.user{
			width: 200px;
			height: 40px;
			position: absolute;
			border: 1px solid #f7f7f7;
			background: #f7f7f7;
			box-shadow: 2px 0 5px rgba(0,0,0,.3);
			left:0px;
			top: 0;
			box-sizing: border-box;
			margin: 0;
			padding: 10px;
			background: gray;
			font-size: 20px;
			cursor: pointer;
		}


		.tit{
			width: 200px;
			position: absolute;
			border: 1px solid #f7f7f7;
			background: #f7f7f7;
			box-shadow: 2px 0 5px rgba(0,0,0,.3);
			left:0px;
			top: 40px;
			box-sizing: border-box;
			margin: 0;
			padding: 10px;
			background: gray;
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

		.con{
			width: 1000px;
			position: absolute;
			border: 1px solid #f7f7f7;
			background: #f7f7f7;
			box-shadow: 2px 0 5px rgba(0,0,0,.3);
			left:200px;
			top: 0px;
			box-sizing: border-box;
			margin: 0;
			padding: 10px;
			background: gray;
		}

		.footer{
			width:1200px;
			position: absolute;
			left:0px;
			top:900px;
			text-align: center;
		}



	</style>
</head>
<body>
<div class="all">
	<DIV class="index">
		
		<div class="user">
			苏乃文的博客
		</div>

		<div class="tit">
			<ul>
				<a href="index" ><li>首页</li></a>
				<a href="tags"><li>标签</li></a>
				<a href="about"><li>关于</li></a>
			</ul>
		</div>
	</DIV>
		<div align="center">
				<a href="searchtag?tag=html">html</a>
				<a href="">css</a>
		</div>

	</div>
</body>
</html>