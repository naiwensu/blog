<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/home/wwwroot/default/blog/blog/public/../app/home/view/articles/article.html";i:1504973473;s:73:"/home/wwwroot/default/blog/blog/public/../app/home/view/index/common.html";i:1505032361;}*/ ?>
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
		        <li class="active"><a href="__ROOT__/index/index">首页</a></li>
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
				
	<div>
		<p style="color: ;text-align: left;font-size: 20px">标题：<?php echo $article['title']; ?></p>
		<p style="color: ;text-align: left;font-size: 10px">标签：<?php echo $article['tag']; ?></p>
		<p style="color: text-align: left;font-size: 15px"><?php echo $article['content']; ?></p>
		<p id="aid" hidden="hidden"><?php echo $article['id']; ?></p>
		<p>20<?php echo date("y-m-d h:m:s",$article['create_time']); ?>&nbsp;&nbsp;&nbsp; <?php echo $article['rnum']; ?>人阅读&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php if(session('username')!=''): ?>
		<sapn id="collection"><a href="#"><?php echo $collect; ?></a></sapn>
		<?php else: ?>
		<sapn id="iscollection"><a >收藏(<?php echo $article['cnum']; ?>)</a></sapn>
		<?php endif; ?>
		&nbsp;&nbsp;&nbsp;举报</p>
		<hr>
		<?php if(session('username')==''): ?>
			<div id="checkLog">
			您还没有登录，请<a href="__ROOT__/Login/login" style="color:red ;font-size: 17px">【登录】</a>或<a href="__ROOT__/Login/register" style="color:red ;font-size: 17px">【注册】</a>
			</div>
			<hr>
		<?php else: ?>
			<form class="form-horizontal" style="background: "  action="#" method="post" role="form">
				<p id="uid" hidden="hidden"><?php echo session('id') ?></p>

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
				      <button id="docomment" type="submit" class="btn btn-primary">评论</button>
				    </div>
				 </div>	  
			</form>
		<?php endif; ?>
		<p id="comment"><a href="#">查看评论(<?php echo $article['cnum']; ?>)</a></p>
		<div id="info"></div>
		<hr>
			<!--<div>
				<?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<p style="color: ;text-align: left;font-size: 15px">评论人：<?php echo $vo['uid']; ?></p>
				<p style="color: text-align: left;font-size: 15px">时间：<?php echo $vo['create_time']; ?></p>
				<p style="color: ;text-align: left;font-size: 15px">内容：<?php echo $vo['content']; ?></p>						
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>-->
	</div>

		<hr />
			<footer style="height: 40px;background:;bottom: 0px;text-align: center;padding-top: 15px">
				<span id="time"></span><span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文|<a href="__ROOT__/message/message">给我留言</a>
			</footer>
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
				//alert('1');
				$("#info").html("");//清空info内容
		      	$.each(data, function(i, item){
		            $("#info").append(		            	
		            	"<div>"+"<a href=''>"+item.username+"</a>: "+$.trim(item.content)+"</div>" +"发表于 "+getCommonTime(item.create_time*1000)+'<br/><hr/>');
		        });					
	
			});
		});
	});

	//提交评论
	$('document').ready(function(){
		$('#docomment').click(function(){
			//alert('aaa');
			var ue = UE.getEditor('container');
			var content=ue.getContent();
			var uid=$('#uid').text();
			var aid=$('#aid').text();
			$.get('__ROOT__/Comment/doComment',{'content':content,'uid':uid,'aid':aid},function(data){
				if (data=='1') {
					alert('添加成功');
				}else{
					alert('添加失败');
				}
			});
		});
	});

	//收藏、取消收藏
	$('document').ready(function(){
		$('#collection').click(function(){
			var status=$('#collection').text();
			var aid=$('#aid').text();
			$.get('__ROOT__/User/collect',{'status':status,'aid':aid},function(data){
				if (data=='1') {
					$('#collection').html('<a href="#">取消收藏</a>');
				}else{
					$('#collection').html('<a href="#">收藏</a>');
				}
			});
		});
	});

/*
 * milliseconds:时间戳，毫秒
 * */
function getCommonTime(milliseconds) {
    var date = new Date(milliseconds),
        time = date.toLocaleString(),//这种方法获取的时间格式根据电脑的不同而有所不同
        formatTime = getFormatDate(date);//获取格式化后的日期
    return formatTime;
}

function getFormatDate(timeStr, dateSeparator, timeSeparator) {
    dateSeparator = dateSeparator ? dateSeparator : ".";
    timeSeparator = timeSeparator ? timeSeparator : ":";
    var date = new Date(timeStr),
        year = date.getFullYear(),// 获取完整的年份(4位,1970)
        month = date.getMonth(),// 获取月份(0-11,0代表1月,用的时候记得加上1)
        day = date.getDate(),// 获取日(1-31)
        hour = date.getHours(),// 获取小时数(0-23)
        minute = date.getMinutes(),// 获取分钟数(0-59)
        seconds = date.getSeconds(),// 获取秒数(0-59)
        Y = year + dateSeparator,
        M = ((month + 1) > 9 ? (month + 1) : ('0' + (month + 1))) + dateSeparator,
        D = (day > 9 ? day : ('0' + day)) + ' ',
        h = (hour > 9 ? hour : ('0' + hour)) + timeSeparator,
        m = (minute > 9 ? minute : ('0' + minute)) + timeSeparator,
        s = (seconds > 9 ? seconds : ('0' + seconds)),
        formatDate = Y + M + D + h + m + s;
    return formatDate;
}
</script>

</body>
</html>