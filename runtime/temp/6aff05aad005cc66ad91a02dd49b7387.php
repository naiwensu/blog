<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\phpStudy\WWW\blog\public/../app/home\view\Articles\article.html";i:1502789848;s:62:"D:\phpStudy\WWW\blog\public/../app/home\view\index\common.html";i:1502780249;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>苏苏的博客</title>
	<link rel="shortcut icon" href="__ROOT__/static/image/blog1.ico"/>
	<link rel="shortcut icon" href="__ROOT__/static/image/blog1.ico"/>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
		$(function () { 
			$("[data-toggle='tooltip']").tooltip(); 
		});
	</script>
</head>
<header>
	<div class="row clearfix" style="margin: 0px;height: 75px; background: gray">
		<div class="col-sm-11 column">
			<h1 align="center" style="background:;margin-top: 0px;margin-left: 0px;padding-top: 15px;padding-bottom: 15px">
				文的博客
			</h1>
		</div>
		<div id="checkout" class="col-sm-1 column" align="center" style="margin-top:15px; ">
		<a href="<?php echo url('home/Login/dologout');?>">
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
				  	<li><a href="#"><span class="glyphicon glyphicon-user"></span>我的信息</a></li>

					<li>
							<a href="__ROOT__/Tags/getalltags"><span class="glyphicon glyphicon-tag"></span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签</b></a>
					</li>				           	
					<li>
							<a href="#"><span class="glyphicon glyphicon-cog"></span>关&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;于</a>
					</li>

				</ul>
			</div>

			<div style="margin-top: 20px;height: 500px;background: white" align="center">
				<img src="__ROOT__/static/image/xq.jpg" class="img-rounded" alt="Cinque Terre" width="150" height="110" style="margin-top: 30px"><br>
				<h3><?php echo \think\Session::get('username'); ?><br><small>我的目标很明确！</small></h3><br>
				<a class="btn btn-default btn-xs" href="https://github.com/naiwensu" role="button"><img src="__ROOT__/static/image/github.png" class="img-.img-rounded" alt="github" width="30px" height="30px">github</a>
			</div>
		</div>

		<div class="col-sm-9 column" style="background:#BFBFBF">
				
			<div>
				<p style="color: ;text-align: left;font-size: 20px">标题：<?php echo $article['title']; ?></p>
				<p style="color: ;text-align: left;font-size: 10px">标签：<?php echo $article['tag']; ?></p>
				<p style="color: text-align: left;font-size: 15px"><?php echo $article['content']; ?></p>
				<p id="aid" hidden="hidden"><?php echo $article['id']; ?></p>
				<p>20<?php echo date("y-m-d h:m:s",$article['create_time']); ?>&nbsp;&nbsp;&nbsp; <?php echo $article['rnum']; ?>人阅读&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收藏&nbsp;&nbsp;&nbsp;举报</p>
				<hr>
				<?php if(session('username')==''): ?>
					<div id="checkLog">
					您还没有登录，请<a href="__ROOT__/Login/login" style="color:red ;font-size: 17px">【登录】</a>或<a href="__ROOT__/Login/register" style="color:red ;font-size: 17px">【注册】</a>
					</div>
					<hr>
				<?php else: ?>
					<form class="form-horizontal" style="background: #BFBFBF"  action="__ROOT__/Comment/doComment" method="post" role="form">		 
						  <div class="form-group">
						    <div class="col-sm-9">
							    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.config.js"></script>
							    <!-- 编辑器源码文件 -->
							    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.all.js"></script>
							    <!-- 实例化编辑器 -->
							    <script type="text/javascript">
							        var editor = UE.getEditor('container',{ toolbars: [
										['fullscreen', 'source', 'undo', 'redo'],
									    ['bold', 'italic','emotion', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
										],
		    							initialFrameWidth:500,
										initialFrameHeight:120 })
							    </script>
							    <script id="container" name="content" type="text/plain" ></script>
						      	<!--<textarea class="form-control" rows="4" name="content" placeholder="请输入文章内容"></textarea>-->
						    </div>
						  </div>						 									 
						  <div class="form-group">
						    <div class="col-sm-offset- col-sm-10">
						      <button type="submit" class="btn btn-primary">评论</button>
						    </div>
						  </div>	  
					</form>
				<?php endif; ?>
				<p id="comment"><a href="#">查看评论(<?php echo $article['cnum']; ?>)</a></p>
				<div id="info"></div>
				<hr>
					<div>
						<?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<p style="color: ;text-align: left;font-size: 15px">评论人：<?php echo $vo['uid']; ?></p>
						<p style="color: text-align: left;font-size: 15px">时间：<?php echo $vo['create_time']; ?></p>
						<p style="color: ;text-align: left;font-size: 15px">内容：<?php echo $vo['content']; ?></p>						
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
			</div>


		</div>
	</div>	
</div>

<script type="text/javascript">
	$('document').ready(function(){
		$("#comment").click(function(){
			var aid=$("#aid").text();
			//alert(aid);
			$.getJSON('__ROOT__/Comment/comment',{'aid':aid},function(data){
				//var json = {"comments":[{"content":"很不错嘛","id":1,"nickname":"纳尼"},{"content":"哟西哟西","id":2,"nickname":"小强"}]};
				//alert(json);
				$("#info").html("");//清空info内容
		      	$.each(data, function(i, item){
		            $("#info").append(
		                    "<div>评论文章：" + item.aid + "</div>" + 
		                    "<div>评论内容：" + item.content + "</div>"+
		                    "<div>评论id：" + item.id + "</div>" +
		                    "<div>评论人：" + item.uid + "</div>" +
		                    "<div>评论时间：" + item.create_time + "</div><hr/>" );
		        });					
	
			});
		});
	});

</script>

</body>

<footer style="height: 80px;background:#DFDFDF ;bottom: 0px;text-align: center;padding-top: 15px">
	<p>2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文</p>
	<p><a href="">给我留言</a></p>
</footer>

</html>