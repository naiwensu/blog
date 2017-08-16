<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\phpStudy\WWW\blog\public/../app/home\view\login\register.html";i:1502772776;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>注册页面</title>
	<link rel="shortcut icon" href="__ROOT__/static/image/blog1.ico"/>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
			$(function(){
				var check=new Array();
				$("#username").blur(function(){
					if(! $("#username").val().length>0 ){
						check['username']='';
						if(!$("#username1").length>0){
							$("#username").after('<p id="username1" style="color:red">请输入用户名！</p>');
						}
						$("#submit").attr("disabled","disabled");	
						//alert('aaa');																		
					}else{
						$('#username1').remove();
						var username=$(this).val();
						$.get('__ROOT__/Login/check',{'username':username},function(data){
							if(data=='0'){
									$("#submit").attr("disabled","disabled");

									if(!$("#umessage").length>0){
										$("#username").after('<p id="umessage" style="color:red">该用户名已经注册</p>');
									}
							}else{
								check['username']='aaa';
								$('#umessage').remove();
							//alert('aaa');							
							}
						});
					}			
				});

				$("#password").blur(function(){
		
					if(! $("#password").val().length>0 ){
						check['password']='';
						if(!$("#password1").length>0){
							$("#password").after('<p id="password1" style="color:red">请输入密码！</p>');
						}
						$("#submit").attr("disabled","disabled");																			
					}else{
						$('#password1').remove();
						//alert('aaa');
						check['password']='zzz';
					}
				});


				$("#confirmpassword").blur(function(){		
					if(! $("#confirmpassword").val().length>0 ){
						if(!$("#confirmpassword1").length>0){
							$("#confirmpassword").after('<p id="confirmpassword1" style="color:red">请输入确认密码！</p>');
						}
						check['confirmpassword']='';
						$("#submit").attr("disabled","disabled");																			
					}else{
						$('#confirmpassword1').remove();
						//alert($('input[name="confirmpassword"]').val());
						check['confirmpassword']='ddd';
					}
				});

				$('#code').blur(function(){
					if(!$("#code").val().length>0){
						if(!$("#code1").length>0){
							$("#code").after('<p id="code1" style="color:red">请输入验证码！</p>');
						}
						check['code']='';
						$("#submit").attr("disabled","disabled");
					}else{
						$('#code1').remove();
						check['code']='1';
					}
				});



				$("#username").blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd' && check['code']=='1'){
						$("#submit").removeAttr("disabled");
					}else{
						$("#submit").attr("disabled","disabled");
					}
				});

				$("#password").blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						if ($("#confirmpassword").val()==$("#password").val()) {
								if (check['code']=='1') {
									$("#submit").removeAttr("disabled");
								}
								$("#password2").remove();
						}else{
							$("#submit").attr("disabled","disabled");
							if(!$("#password2").length>0){
							$("#password").after('<p id="password2" style="color:red">密码与确认密码不匹配！</p>');
							}
						}						
					}
				});

				$("#confirmpassword").blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						if ($("#confirmpassword").val()==$("#password").val()) {
								if (check['code']=='1') {
									$("#submit").removeAttr("disabled");
								}
								$("#confirmpassword2").remove();
						}else{
							$("#submit").attr("disabled","disabled");
							if(!$("#confirmpassword2").length>0){
							$("#confirmpassword").after('<p id="confirmpassword2" style="color:red">密码与确认密码不匹配！</p>');
							}
						}
					}
				});

				$("#code").blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd' && check['code']=='1'){
						$("#submit").removeAttr("disabled");
					}else{
						$("#submit").attr("disabled","disabled");
					}
				});				
					

		});		
	</script>
</head>
<body style="background: ;margin: 0px;padding-top: 0px; padding-bottom: 0px">

<div style="background:gray ;margin-right: 0px; padding-left:;padding-right: ; padding-top: 150px;padding-bottom: 200px">
	<div class="container" >

					<form class="form-horizontal" style="background: " action="doreg" method="post" role="form">

						<label for="name" class="col-sm-offset-5"><h1>用户注册</h1></label>

						  <div class="form-group">
							
						    <label for="username" class="col-sm-offset-2 col-sm-2 control-label">名&nbsp;&nbsp;&nbsp;&nbsp;字</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="username" name="username" placeholder="请输入名字">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="password" class="col-sm-offset-2 col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
						    <div class="col-sm-4">
						      <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="password" class="col-sm-offset-2 col-sm-2 control-label">确认密码</label>
						    <div class="col-sm-4">
						      <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="请输入确认密码">
						    </div>
						  </div>						  
						  <div class="form-group">
						    <label for="password" class="col-sm-offset-2 col-sm-2 control-label">验证码</label>
						    <div class="col-sm-2">
						      <input type="text" class="form-control" id="code" name="code" placeholder="请输入验证码">
						    </div>
						    <div><img src="captcha" onclick="javascript:this.src=this.src+'?tm='+Math.random();" alt="captcha" /></div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-4 col-sm-10">
						      <button type="submit" id="submit" disabled="disabled" class="btn btn-primary">注册</button>
						      <button type="button" onclick="{location.href='__ROOT__/Login/login'}" class="btn btn-primary">登录</button>
						    </div>
						  </div>				  
					</form>

</div>
</div>
</body>
</html>