<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\phpStudy\WWW\blog\public/../app/home\view\tags\getalltags.html";i:1502626876;s:62:"D:\phpStudy\WWW\blog\public/../app/home\view\index\common.html";i:1502861584;}*/ ?>
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
		<div class="col-sm-2 column" align="center" style="margin-top:25px; ">
			<?php if(session('username') != ''): ?>
			<p style="color: ;font-size: 17px">欢迎您:<?php echo  session('username');?> !</p>
			<?php endif; ?>
			
		</div>
		<div class="col-sm-7 column">
			<h1 style="background:;margin-top: 0px;margin-left: 0px;padding-left: 50%; padding-top: 15px;padding-bottom: 15px">
				文的博客
			</h1>
		</div>
		<?php if(session('username') == ''): ?>
		<div class="col-sm-1 column" align="center" style="margin-top:25px; ">
			<a href="__ROOT__/Login/login" style="color:red ;font-size: 17px">【登录】</a>
		</div>
		<div class="col-sm-1 column" align="center" style="margin-top:25px; ">
			<a href="__ROOT__/Login/register" style="color:red ;font-size: 17px">【注册】</a>
		</div>
		<div id="checkout" class="col-sm-1 column" align="center" style="margin-top:15px; ">		
			<a href="<?php echo url('home/Login/dologout');?>">
	          	<button type="button" class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="right" title="退出">
	  				<span class="glyphicon glyphicon-off"></span>
				</button>
	        </a>
        </div>
		<?php else: ?>
		<div id="checkout" class="col-sm-3 column" align="center" style="margin-top:15px; ">		
			<a href="<?php echo url('home/Login/dologout');?>">
	          	<button type="button" class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="right" title="退出">
	  				<span class="glyphicon glyphicon-off"></span>
				</button>
	        </a>
        </div>
		<?php endif; ?>

			<div class="col-sm-1 column" align="center" style="margin-top:20px; ">
				
			</div>
	</div>
</header>
<body style="background: white;padding-left:0px;padding-bottom:;height: 100%">
<div  class="container" style="background:;padding-bottom: 0px;padding-right:;margin-left: -10px;margin-right: 0px; height: ;width: 100% ">
	
	<div class="row clearfix">
	<div class="col-sm-12 column" style="background: #3B2F2C;height:700px ">
		<div class="col-sm-3 column" style="background: #3B2F2C;height: ;margin-right: 0px;margin-bottom: 10px; padding-left: 0px;padding-right: 0px;">
			<div style="background: #BFBFBF;margin-right: 10px ">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="__ROOT__/Index/index"><span class="glyphicon glyphicon-home"></span>首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
				  	<li><a href="#"><span class="glyphicon glyphicon-user"></span>我的信息</a></li>

					<li>
							<a href="__ROOT__/Tags/getalltags"><span class="glyphicon glyphicon-tag"></span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签</b></a>
					</li>				           	
					<li>
							<a href="__ROOT__/about/about"><span class="glyphicon glyphicon-cog"></span>关&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;于</a>
					</li>

				</ul>
			</div>

			<div style="margin: 0px;margin-right: 10px; margin-top:10px;margin-bottom: 0px; height: 525px;background: white" align="center">
				<img src="__ROOT__/static/image/xq.jpg" class="img-rounded" alt="Cinque Terre" width="150" height="110" style="margin-top: 30px"><br>
				<h3><?php echo \think\Session::get('username'); ?><br><small>我的目标很明确！</small></h3><br>
				<a class="btn btn-default btn-xs" href="https://github.com/naiwensu" role="button"><img src="__ROOT__/static/image/github.png" class="img-.img-rounded" alt="github" width="30px" height="30px">github</a>
			</div>
		</div>

		<div  class="col-sm-9 column"  style="background:#BFBFBF;height: 700px;  overflow-y:scroll; overflow-x:scroll;">
		
	<h1 align="center">所有标签</h1>
		<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<a href="__ROOT__/Articles/tagarticles?tag=<?php echo $vo['tag']; ?>"/><?php echo $vo['tag']; ?></a><br>			
		<?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
		</div>
	</div>	
</div>

</body>

<footer style="height: 40px;background:#DFDFDF ;bottom: 0px;text-align: center;padding-top: 15px">
	2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文|<a href="__ROOT__/mail/mail">给我留言</a>

</footer>

</html>