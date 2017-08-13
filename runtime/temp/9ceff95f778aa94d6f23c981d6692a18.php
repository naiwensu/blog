<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\phpStudy\WWW\blog\public/../app/admin\view\articles\doedit.html";i:1502160370;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>提交编辑</title>
	<link rel="shortcut icon" href="__ROOT__/static/image/edit.ico"/>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="col-sm-12 column" >

			<form class="form-horizontal" style="background: ;"  action="update?id=<?php echo $article['id']; ?>" method="post" role="form">

				  <div class="form-group" style="margin-top: 20px">
				    <label for="title" class=" col-sm-2 control-label">文章标题</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" id="title" name="title" placeholder="请输入文章标题" value="<?php echo $article['title']; ?>">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="content" class=" col-sm-2 control-label" >文章内容</label>
				    <div class="col-sm-6">
			        <!-- 加载编辑器的容器 -->
			        <script id="container" name="content" type="text/plain"> <?php echo rtrim($article['content']); ?>        
			        </script>
				    <!-- 配置文件 -->
				    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.config.js"></script>
				    <!-- 编辑器源码文件 -->
				    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.all.js"></script>
				    <!-- 实例化编辑器 -->
				    <script type="text/javascript">
				        var editor = UE.getEditor('container');
				    </script>
<!--				      <textarea class="form-control" rows="4" name="content" placeholder="请输入文章内容" ><?php echo $article['content']; ?></textarea>  -->	
			    	</div>
				  </div>

				   <div class="form-group">
				    <label for="confirmpassword" class=" col-sm-2 control-label" >标签</label>
					    <div class="col-sm-2">
						    <select class="form-control" name="tag">
						    	<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						    		<option value =<?php echo $vo['tag']; ?>><?php echo $vo['tag']; ?></option>
						    	<?php endforeach; endif; else: echo "" ;endif; ?>
						    </select>
					    </div>
				  </div>
				 								 
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-2">
				      <button type="submit" class="btn btn-primary">提交</button>
				    </div>
				  </div>



     		</form>

		</div>
	</div>
</body>
</html>