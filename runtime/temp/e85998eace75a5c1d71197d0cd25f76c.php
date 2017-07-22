<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\usermessage.html";i:1500526908;s:63:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\common.html";i:1500642810;}*/ ?>
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
			background: #202020;
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
	<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script>
	$(function(){
	$("#adduser").click(function(){
		//alert('qqq');
		if(typeof($("#user").attr('hidden'))=='undefined'){
			//alert('qqq');
			$("#user").attr("hidden","hidden");
		}else{
			//alert('www');
		$("#user").removeAttr("hidden");			
		}

		
	});

	});





	</script>
</head>
<body>
	<div class="page">
		<div class="head">
			<h1>后台管理页面</h1>
			<a href="<?php echo url('admin/Login/dologout');?>">退出</a>
			<div class="left">
			<ul>
				<a href="index"><li>用户信息</li></a>
				<a href="publish"><li>发表文章</li></a>
				<a href="edit"><li>编辑文章</li></a>
				<div id="adduser"><li>添加用户</li></div>
					<div id="user" hidden="hidden">
						<div><a href="adduser">添加用户</a></div>
						<div><a href="getallusers">删除用户</a></div>
					</div>	
			</ul>
			</div>

		</div>

		

		<div class="right">
			用&nbsp;&nbsp;户&nbsp;&nbsp;名：<?php echo $username; ?><br>
			修改密码><br>
			<form action="changeuser" method="post">
			原&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" name="oldpassword"><br>
			新&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" name="newpassword"><br>
			确认密码：<input type="password" name="confirmpassword"><br>
			<input type="submit" name="提交"><br>
			</form>
		</div>


	</div>
</body>
</html>