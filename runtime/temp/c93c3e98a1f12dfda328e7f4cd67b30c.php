<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\edit.html";i:1500469147;}*/ ?>
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
				<table align="left" width="400px" border="1" cellspacing="0">
				<caption><h3>编辑文章</h3></caption>
					<tr><th>文章标题</th><th>文章内容</th><th colspan="2">操作</th></tr>
					<?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>			
						<tr><td align="center"><?php echo $vo['title']; ?></td><td align="center"><?php echo $vo['content']; ?></td><td align="center"><a href="doedit?title=<?php echo $vo['title']; ?>">编辑</a></td><td align="center"><a href="delete?title=<?php echo $vo['title']; ?>">删除</a></td></tr><br>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
	
			
	

		</div>


	</div>
</body>
</html>