<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\adduser.html";i:1501584672;s:63:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\common.html";i:1502106788;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>苏苏的博客</title>
	<link rel="shortcut icon" href="__ROOT__/static/image/blog1.ico"/>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>

	<style>
		.btn{

			border: none;
	
		}

		.btn-primary {
		  	color: white;
		  	background-color: gray;
		}

		.btn-primary:hover, .btn-primary:focus, .btn-primary:active:hover{
		 	color: blue;
		  	background-color:gray;
		}

	</style>

	<script>
		$(function () { $("[data-toggle='tooltip']").tooltip(); });
	</script>
</head>
<header>
	<div class="row clearfix" style="margin: 0px;height: 75px; background: gray">
		<div class="col-sm-11 column">
			<h1 align="center" style="background:;margin-top: 0px;margin-left: 0px;padding-top: 15px;padding-bottom: 15px">
				后台管理页面
			</h1>
		</div>
		<div class="col-sm-1 column" align="center" style="margin-top:15px; ">
		<a href="<?php echo url('admin/Login/dologout');?>">
          	<button type="button" class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="right" title="退出">
  				<span class="glyphicon glyphicon-off"></span>
			</button>
        </a>
        </div>
	</div>
	</div>
</header>
<body style="background: white;padding-left:0px;padding-bottom:;height: 100%">
<div class="container" style="background:;padding-bottom: 0px;padding-right:;height: ;width: 100% ">
	
	<div class="row clearfix">
		<div class="col-sm-3 column" style="background: black">
			<div style="background: #BFBFBF">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="__ROOT__/Index/index"><span class="glyphicon glyphicon-home"></span>首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
				  	<li><a href="__ROOT__/Index/user"><span class="glyphicon glyphicon-user"></span>我的信息</a></li>
					<li data-toggle="collapse" data-target="#article" >
							<a href="#"><span class="glyphicon glyphicon-book"></span>处理文章<b class="caret"></b></a>
					</li>
					<ul id="article" class="nav panel-collapse collapse">
						  	<li><a href="__ROOT__/Articles/publish">&nbsp;&nbsp;<span class="glyphicon glyphicon-upload"></span>发表文章</a></li>
						  	<li><a href="__ROOT__/Articles/edit">&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span>编辑文章</a></li>
				  	</ul>
<!--					<li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                    <span class="glyphicon glyphicon-pencil"></span>编辑用户 <b class="caret"></b>
		                </a>
		                <ul class="dropdown-menu">
		                    <li><a href="adduser"><span class="glyphicon glyphicon-plus-sign"></span> 添加用户</a></li>
		                    <li><a href="getallusers"><span class="glyphicon glyphicon-trash"></span> 删除用户</a></li>
		                </ul>
	            	</li>
-->	            	
					<li data-toggle="collapse" data-target="#ceshi" >
							<a href="#"><span class="glyphicon glyphicon-pencil"></span>编辑用户 <b class="caret"></b></a>
					</li>
					<ul id="ceshi" id="collapseThree" class="nav panel-collapse collapse">
		                    <li><a href="__ROOT__/Users/adduser">&nbsp;&nbsp;<span class="glyphicon glyphicon-plus-sign"></span> 添加用户</a></li>
		                    <li><a href="__ROOT__/Index/getallusers">&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span> 删除用户</a></li>
					</ul>

					<li data-toggle="collapse" data-target="#quanxian" >
							<a href="#"><span class="glyphicon glyphicon-cog"></span>修改权限 <b class="caret"></b></a>
					</li>
					<ul id="quanxian" class="nav panel-collapse collapse">
		                    <li><a href="__ROOT__/Group/getallgroupusers">&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign"></span> 用户权限</a></li>
		                    <li><a href="__ROOT__/Group/groupauthorization">&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign"></span> 组&nbsp;&nbsp;权&nbsp;&nbsp;限</a></li>
					</ul>
				</ul>
			</div>

			<script id="EditorId" style='height: 400px; width: 800px;'   name="exams_analytica" type="text/plain"></script>


			<div style="margin-top: 20px;height: 500px;background: white" align="center">
				<img src="__ROOT__/static/image/xq.jpg" class="img-rounded" alt="Cinque Terre" width="150" height="110" style="margin-top: 30px"><br>
				<h3><?php echo \think\Session::get('username'); ?><br><small>我的目标很明确！</small></h3><br>
				<a class="btn btn-default btn-xs" href="https://github.com/naiwensu" role="button"><img src="__ROOT__/static/image/github.png" class="img-.img-rounded" alt="github" width="30px" height="30px">github</a>
			</div>
		</div>

		<div class="col-sm-9 column" style="background:#BFBFBF">
		
			<form class="form-horizontal" style="background: #BFBFBF"  action="doadduser" method="post" role="form">
					<label for="name" class="col-sm-offset-2"><h3>添加用户</h3></label><br>
				  <div class="form-group">
				    <label for="username" class=" col-sm-2 control-label">用&nbsp;&nbsp;户&nbsp;&nbsp;名</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class=" col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</label>
				    <div class="col-sm-6">
				      <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="confirmpassword" class=" col-sm-2 control-label">确认密码</label>
				    <div class="col-sm-6">
				      <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="请输入确认密码">
				    </div>
				  </div>									 
				  <div class="form-group">
				    <label for="confirmpassword" class=" col-sm-2 control-label" >标签</label>
					    <div class="col-sm-3">
						    <select class="form-control" name="gid">
  								<option value ="1">超级管理员</option>
			  					<option value ="2">普通管理员</option>
			  					<option value="3">普通用户</option>
						    </select>
					    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="submit" disabled="disabled" class="btn btn-primary">提交</button>
				    </div>
				  </div>
			</form>
		

		</div>
	</div>	
</div>

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
						$.get('check',{'username':username},function(data){
							if(data=='不允许'){
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

//$('input[name="submit"]').removeAttr("disabled");
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



				$("#username").blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						$("#submit").removeAttr("disabled");
					}else{
						$("#submit").attr("disabled","disabled");
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
				$("#password").blur(function(){
					if(check['username']=='aaa' && check['password']=='zzz' && check['confirmpassword']=='ddd'){
						if ($("#confirmpassword").val()==$("#password").val()) {
								$("#submit").removeAttr("disabled");
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
								$("#submit").removeAttr("disabled");
								$("#confirmpassword2").remove();
						}else{
							$("#submit").attr("disabled","disabled");
							if(!$("#confirmpassword2").length>0){
							$("#confirmpassword").after('<p id="confirmpassword2" style="color:red">密码与确认密码不匹配！</p>');
							}
						}
					}
				});
					

		});		
	</script>

</body>

<footer style="height: 50px;background:#DFDFDF ;bottom: 0px;text-align: center;padding-top: 15px">
	2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文
</footer>

</html>