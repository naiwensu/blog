<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\phpStudy\WWW\blog\public/../app/home\view\articles\article.html";i:1502880805;s:62:"D:\phpStudy\WWW\blog\public/../app/home\view\index\common.html";i:1502861584;}*/ ?>
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
					<form class="form-horizontal" style="background: #BFBFBF"  action="#" method="post" role="form">
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
				//alert('1');
				$("#info").html("");//清空info内容
		      	$.each(data, function(i, item){
		            $("#info").append(
		            	
		            	"<div>"+"<a href=''>"+item.username+"</a>: "+$.trim(item.content)+"</div>" +"发表于 "+getCommonTime(item.create_time*1000));
		        });					
	
			});
		});
	});

	//提交评论
	$('doucument').ready(function(){
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

<footer style="height: 40px;background:#DFDFDF ;bottom: 0px;text-align: center;padding-top: 15px">
	2017<span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文|<a href="__ROOT__/mail/mail">给我留言</a>

</footer>

</html>