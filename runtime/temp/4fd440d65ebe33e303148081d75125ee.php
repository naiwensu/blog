<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\adduser.html";i:1500606614;s:63:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\common.html";i:1500642810;}*/ ?>
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
			<form action="doadduser" method="post">
				用&nbsp;&nbsp;户&nbsp;&nbsp;名：<input type="text" name="username" ><br>
				密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"><br>
				确认密码：<input type="password" name="confirmpassword"><br>
				<input type="submit" name="submit" disabled="disabled" value="提交">
			</form>
		</div>

	</div>

	<script>
		$(function(){
			var check=new Array();
					$('input[name="username"]').blur(function(){

					if(! $('input[name="username"]').val().length>0 ){
						check['username']='';
						if(!$("#username").length>0){
							$('input[name="username"]').after('<p id="username" style="color:red">请输入确认密码！</p>');
						}
						$('input[name="submit"]').attr("disabled","disabled");	
						//alert('aaa');																		
					}else{
						$('#username').remove();
						var username=$(this).val();
						$.get('check',{'username':username},function(data){
							if(data=='不允许'){
									$('input[name="submit"]').attr("disabled","disabled");

									if(!$("#umessage").length>0){
										$('input[name="username"]').after('<p id="umessage" style="color:red">该用户名已经注册</p>');
									}
								}else{
									check['username']='aaa';
									$('#umessage').remove();
								//alert('aaa');							
						}
					});

					}
					

				});


//$('input[name="submit"]').removeAttr("disabled");
				$('input[name="password"]').blur(function(){
		
					if(! $('input[name="password"]').val().length>0 ){
						check['password']='';
						if(!$("#password").length>0){
							$('input[name="password"]').after('<p id="password" style="color:red">请输入密码！</p>');
						}
						$('input[name="submit"]').attr("disabled","disabled");																			
					}else{
						$('#password').remove();
						//alert('aaa');
						check['password']='zzz';
					}
				});


				$('input[name="confirmpassword"]').blur(function(){		
					if(! $('input[name="confirmpassword"]').val().length>0 ){
						if(!$("#confirmpassword").length>0){
							$('input[name="confirmpassword"]').after('<p id="confirmpassword" style="color:red">请输入确认密码！</p>');
						}
						check['confirmpassword']='';
						$('input[name="submit"]').attr("disabled","disabled");																			
					}else{
						$('#confirmpassword').remove();
						//alert($('input[name="confirmpassword"]').val());
						check['confirmpassword']='ddd';
					}
				});



				$('input[name="username"]').blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						$('input[name="submit"]').removeAttr("disabled");
					}
				});

/*				$('input[name="password"]').blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						$('input[name="submit"]').removeAttr("disabled");
					}
				});

				$('input[name="confirmpassword"]').blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						$('input[name="submit"]').removeAttr("disabled");
					}
				});
*/
				$('input[name="password"]').blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						if ($('input[name="confirmpassword"]').val()==$('input[name="password"]').val()) {
								$('input[name="submit"]').removeAttr("disabled");
						}else{
							alert('密码与确认密码不匹配！');
						}
						
					}
				});

				$('input[name="confirmpassword"]').blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						if ($('input[name="confirmpassword"]').val()==$('input[name="password"]').val()) {
								$('input[name="submit"]').removeAttr("disabled");
						}else{
								alert('密码与确认密码不匹配！');
						}
					}
				});
					
		


			});



		
	</script>
</body>
</html>




$('input[name="password"]').blur(function(){
								if( !$('input[name="password"]').val().length>0 ){	
									$('input[name="submit"]').attr("disabled","disabled");														
									

								}else{
									$('input[name="confirmpassword"]').blur(function(){
									if( !$('input[name="confirmpassword"]').val().length>0 ){	
										$('input[name="submit"]').attr("disabled","disabled");														
									

									}else{

									
										$('input[name="submit"]').removeAttr("disabled");
									}
									});

									
								}
							});


							//$('input[name="submit"]').removeAttr("disabled");
							$('#umessage').remove();