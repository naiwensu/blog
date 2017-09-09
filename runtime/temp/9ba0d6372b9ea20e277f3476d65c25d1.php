<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/home/wwwroot/default/blog/blog/public/../app/home/view/about/about.html";i:1504324651;s:73:"/home/wwwroot/default/blog/blog/public/../app/home/view/index/common.html";i:1504851097;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>苏苏的博客</title>
	<link rel="shortcut icon" href="__ROOT__/static/image/blog1.ico"/>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="__ROOT__/static/css/app.css">

	<style>
		.btn{

			border: none;
	
		}

		.btn-primary {
		  	color: white;
		  	background: #222;

		}

		.btn-primary:hover, .btn-primary:focus, .btn-primary:active:hover{
		 	color: blue;
		 	background: #222;
		  	
		}

	</style>

	<script>
		$(function () { 
			$("[data-toggle='tooltip']").tooltip(); 
		});
		$('document').ready(function(){
			$('#time').append(
				myDate()
				);
		});

		function myDate(){
				var myDate=new Date();
				return myDate.toLocaleDateString();       //获取日期		
		}

		$(function () { $("[data-toggle='popover']").popover({
				delay:{show:100, hide:1000},
				content: function() {  
		          	return content();    
		        } 
			}); 
		});

		function content(){
			var data="<h4><image style='width: 25px;height: 25px;' src='__ROOT__/static/image/xq.jpg' alt='tupian'></image> <?php echo  session('username');?>"+
				"</h4><br><h4><a href='__ROOT__/user/mymessage'>个人信息</a></h4>";
			return data;
		}
	</script>
</head>
<header>
</header>
<body style="background: white;padding-left:0px;padding-bottom:;height: 100%">
	<nav class="navbar navbar-inverse  navbar-fixed-top">
	  <div class="container-fluid ">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">文的博客</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
		        <li class="active"><a href="#">首页</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      	<?php if(session('username') != ''): ?>
		      	<li>
			      	<a href="">
						<span class="btn-primary" style="font-size: 17px">欢迎您:<?php echo  session('username');?> !</span>
					</a>
				</li>
				<li>
					<a href="<?php echo url('home/Login/dologout');?>">
			          	<span data-toggle="tooltip" data-placement="left" title="退出">
			  				<span class="btn-primary glyphicon glyphicon-off"></span>
						</span>
			        </a>
		        </li>
		        <li>
					<a>&nbsp;&nbsp;</a>
		        </li>
		        <li>
			        <a href="#" id="mypicture" class="navbar-brand"  title=""
            data-container="body" data-trigger="hover | manual" data-toggle="popover" data-placement="left"
             data-html='true'>
			        	<image style="width: 25px;height: 25px;" src="__ROOT__/static/image/xq.jpg"/>
			        </a>
		        </li>
		        <?php else: ?>
		        <li>
					<a href="__ROOT__/Login/login" style="color:red ;font-size: 17px">【登录】</a>
				</li>
				<li>
					<a href="__ROOT__/Login/register" style="color:red ;font-size: 17px">【注册】</a>	
				</li>	
				<?php endif; ?>
			</ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid --> 
	</nav>

	<div  class="container-fluid" >	
	<div class="row clearfix">
		<div class="col-sm-3 column sidebar" style="background: #F2EEED;height: ;margin-right: 0px;margin-bottom: 10px; padding-left: 0px;padding-right: 0px;">
			<div style="background: white;margin-right: 10px ">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="__ROOT__/Index/index"><span class="glyphicon glyphicon-home"></span>首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
					<li>
						<a href="__ROOT__/Tags/getalltags"><span class="glyphicon glyphicon-tag"></span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签</b></a>
					</li>
					<li>
				  		<a href="__ROOT__/user/mymessage"><span class="glyphicon glyphicon-user"></span>我的信息</a>
				  	</li>				           	
					<li>
						<a href="__ROOT__/about/about"><span class="glyphicon glyphicon-cog"></span>关&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;于</a>
					</li>
				</ul>
			</div>

			<div style="margin: 0px;margin-right: 10px; margin-top:10px;background: white" align="center">
				<img src="__ROOT__/static/image/xq.jpg" class="img-rounded" alt="Cinque Terre" width="150" height="110" style="margin-top: 30px"><br>
				<h3><?php echo \think\Session::get('username'); ?><br><small>我的目标很明确！</small></h3><br>
				<a class="btn btn-default btn-xs" href="https://github.com/naiwensu" role="button"><img src="__ROOT__/static/image/github.png" class="img-.img-rounded" alt="github" width="30px" height="30px">github</a>
			</div>
		</div>

		<div  class="col-sm-9 col-sm-offset-3 column sidebar"  style="background:;height: ;  overflow-y:scroll;">
		
	
	<div align="center">
		<p><h3>江雪</h3><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;柳宗元</small></p>
			<div style="font-size: 20px;font">
				<p>千山鸟飞绝，</p>
				<p>万径人踪灭。</p>
				<p>孤舟蓑笠翁，</p>
				<p>独钓寒江雪。</p>
			</div>
	</div>

		<hr />
			<footer style="height: 40px;background:;bottom: 0px;text-align: center;padding-top: 15px">
				<span id="time"></span><span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文|<a href="__ROOT__/mail/mail">给我留言</a>
			</footer>
		</div>
	</div>	
</div>


</body>
</html>