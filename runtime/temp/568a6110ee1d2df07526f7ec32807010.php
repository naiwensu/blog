<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\phpStudy\WWW\blog\public/../app/admin\view\group\addgroup.html";i:1502191554;s:63:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\common.html";i:1502114506;}*/ ?>
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
				  	<li><a href="__ROOT__/User/user"><span class="glyphicon glyphicon-user"></span>我的信息</a></li>
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
					<li data-toggle="collapse" data-target="#tags" >
							<a href="#"><span class="glyphicon glyphicon-tag"></span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签<b class="caret"></b></a>
					</li>
					<ul id="tags" class="nav panel-collapse collapse">
						  	<li><a href="__ROOT__/Tags/getalltags">&nbsp;&nbsp;<span class="glyphicon glyphicon-tags"></span>所有标签</a></li>
						  	<li><a href="__ROOT__/Tags/addtags">&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-circle"></span>添加标签</a></li>
				  	</ul>            	
					<li data-toggle="collapse" data-target="#ceshi" >
							<a href="#"><span class="glyphicon glyphicon-pencil"></span>编辑用户 <b class="caret"></b></a>
					</li>
					<ul id="ceshi" id="collapseThree" class="nav panel-collapse collapse">
		                    <li><a href="__ROOT__/User/adduser">&nbsp;&nbsp;<span class="glyphicon glyphicon-plus-sign"></span> 添加用户</a></li>
		                    <li><a href="__ROOT__/User/getallusers">&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span> 删除用户</a></li>
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
		
			<form class="form-horizontal" style="background: #BFBFBF"  action="doaddgroup" method="post" role="form">
				  <div class="form-group">
				    <label for="groupname" class=" col-sm-2 control-label">用户组名</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="groupname" name="groupname" placeholder="请输入用户组名">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="description" class=" col-sm-2 control-label" >用户组描述</label>
				    <div class="col-sm-6">
				      	<textarea class="form-control" rows="4" name="description" placeholder="请输入用户组描述"></textarea>
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
				$("#groupname").blur(function(){
					if(! $("#groupname").val().length>0 ){
						if(!$("#groupname1").length>0){
							$('#gmessage').remove();
							$("#groupname").after('<p id="groupname1" style="color:red">请输入用户组名！</p>');
						}
						$("#submit").attr("disabled","disabled");	
						//alert('aaa');																		
					}else{
						$('#groupname1').remove();
						var groupname=$(this).val();
						$.get('__ROOT__/Group/check',{'groupname':groupname},function(data){
							if(data=='0'){
									$("#submit").attr("disabled","disabled");
									if(!$("#gmessage").length>0){
										$("#groupname").after('<p id="gmessage" style="color:red">该用户组已经存在</p>');
									}
							}else{
								$('#gmessage').remove();
								$("#submit").removeAttr("disabled");
							//alert('aaa');							
							}
						});
					}			
				});

		});		
	</script>

</body>

<footer style="height: 50px;background:#DFDFDF ;bottom: 0px;text-align: center;padding-top: 15px">
	2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文
</footer>

</html>