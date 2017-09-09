<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\phpStudy\WWW\blog\public/../app/admin\view\Index\publish.html";i:1501841568;s:63:"D:\phpStudy\WWW\blog\public/../app/admin\view\index\common.html";i:1501920527;}*/ ?>
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
					<li class="active"><a href="index"><span class="glyphicon glyphicon-home"></span>首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
				  	<li><a href="__ROOT__/Index/user"><span class="glyphicon glyphicon-user"></span>用户信息</a></li>
				  	<li><a href="__ROOT__/Index/publish"><span class="glyphicon glyphicon-upload"></span>发表文章</a></li>
				  	<li><a href="__ROOT__/Index/edit"><span class="glyphicon glyphicon-edit"></span>编辑文章</a></li>
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
		                    <li><a href="__ROOT__/Index/adduser">&nbsp;&nbsp;<span class="glyphicon glyphicon-plus-sign"></span> 添加用户</a></li>
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
		
			<form class="form-horizontal" style="background: #BFBFBF"  action="add" method="post" role="form">
				  <div class="form-group">
				    <label for="title" class=" col-sm-2 control-label">文章标题</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="title" name="title" placeholder="请输入文章标题">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="content" class=" col-sm-2 control-label" >文章内容</label>
				    <div class="col-sm-9">

					    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.config.js"></script>
					    <!-- 编辑器源码文件 -->
					    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.all.js"></script>
					    <!-- 实例化编辑器 -->
					    <script type="text/javascript">
					        var editor = UE.getEditor('container',{ toolbars: [
													        [
													            'fullscreen', 'source', '|', 'undo', 'redo', '|',
													            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
													            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
													            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
													            'directionalityltr', 'directionalityrtl', 'indent', '|',
													            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
													            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
													            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
													            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
													            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
													            'print', 'preview', 'searchreplace', 'drafts', 'help'
													        ]
													    ],
					        							initialFrameWidth:500
        												,initialFrameHeight:320 })
					    </script>
					    <script id="container" name="content" type="text/plain" ></script>

				      	<!--<textarea class="form-control" rows="4" name="content" placeholder="请输入文章内容"></textarea>-->
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="confirmpassword" class=" col-sm-2 control-label" >标签</label>
					    <div class="col-sm-3">
						    <select class="form-control" name="tag">
  								<option value ="css">CSS</option>
			  					<option value ="HTML">HTML</option>
			  					<option value="PHP">PHP</option>
			 					<option value="MySQL">MySQL</option>
						    </select>
					    </div>
				  </div>									 
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">提交</button>
				    </div>
				  </div>	  
			</form>

		</div>
	</div>	
</div>

</body>

<footer style="height: 50px;background:#DFDFDF ;bottom: 0px;text-align: center;padding-top: 15px">
	2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文
</footer>

</html>