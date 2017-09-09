<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/home/wwwroot/default/blog/blog/public/../app/admin/view/group/getallgroupusers.html";i:1504418981;s:74:"/home/wwwroot/default/blog/blog/public/../app/admin/view/index/common.html";i:1504416860;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>苏苏的博客</title>
	<link rel="shortcut icon" href="__ROOT__/static/image/blog1.ico"/>
	<link rel="stylesheet" href="__ROOT__/static/css/app.css"/>
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
		  	background-color: #222;
		}

		.btn-primary:hover, .btn-primary:focus, .btn-primary:active:hover{
		 	color: blue;
		  	background-color:#222;
		}
	  .sidebar {
	    top: 0px;  
	  }

	</style>

	<script>
		$(function () { $("[data-toggle='tooltip']").tooltip(); });
	</script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">后台管理页面</a>
	    </div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">首页</a></li>
	      </ul>

		<a href="<?php echo url('admin/Login/dologout');?>">
	      	<button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="tooltip" data-placement="left" title="退出">
					<span class="glyphicon glyphicon-off"></span>
			</button>
	    </a>

	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<div class="container-fluid"">
	
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3  sidebar" style="background: #f5f5f5">
			<div  style="background: #f5f5f5">
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


			<div style="margin-top: 20px;height: ;background: white" align="center">
				<img src="__ROOT__/static/image/xq.jpg" class="img-rounded" alt="Cinque Terre" width="150" height="110" style="margin-top: 30px"><br>
				<h3><?php echo \think\Session::get('username'); ?><br><small>我的目标很明确！</small></h3><br>
				<a class="btn btn-default btn-xs" href="https://github.com/naiwensu" role="button"><img src="__ROOT__/static/image/github.png" class="img-.img-rounded" alt="github" width="30px" height="30px">github</a>
			</div>
		</div>

		<div class="col-sm-9 col-md-9 col-lg-9 column" style="background:#f5f5f5">
			
	<?php if(is_array($allusers) || $allusers instanceof \think\Collection || $allusers instanceof \think\Paginator): $i = 0; $__LIST__ = $allusers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<div class="row clearfix">
		<div class="col-sm-offset-1 col-sm-10 ">
			用户名：<?php echo $vo['username']; ?><br>
			所属组：<?php echo $vo['groupname']; ?><br>
		</div>
	</div>
	<div class="row clearfix">
		<form class="form-horizontal" style="background: #f5f5f5"  action="__ROOT__/Group/changeusergroup" method="post" role="form">	
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $vo['id']; ?>">
			</div>	 
			<div class="form-group">
				<label for="confirmpassword" class=" col-sm-1 control-label" >修改组</label>
			    <div class="col-sm-3">
				    <select class="form-control" name="gid">
				    	<?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($vo['id'] != '1')): ?>
				    			<option value =<?php echo $vo['id']; ?>><?php echo $vo['groupname']; ?></option>
				    		<?php endif; ?>
				    		}
				    	<?php endforeach; endif; else: echo "" ;endif; ?>
				    </select>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
				  <button type="submit" id="submit" class="btn btn-primary">提交</button>
				</div>
				<hr>
			</div>
		</form>
	</div>	
	<?php endforeach; endif; else: echo "" ;endif; ?>
	<?php echo $fenye; ?>

			<hr />
			<footer class="col-sm-12 col-md-12 col-lg-12 column" style="width: 100%; height: 50px;background:#f5f5f5 ;bottom: 0px;text-align: center;padding-top: 15px">
				2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文
			</footer>
		</div>
	</div>	
</div>

</body>



</html>