<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/home/wwwroot/default/blog/blog/public/../app/home/view/mail/mail.html";i:1505020971;s:73:"/home/wwwroot/default/blog/blog/public/../app/home/view/index/common.html";i:1504973238;}*/ ?>
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
		
<form class="form-horizontal" method='post' enctype="multipart/form-data" action='__ROOT__/mail/sendMail'>
    <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="title">标题</label>    
                <input type="text" class="form-control" id="title" name="title" placeholder="title">
                <p id="havetitle" style="color: red"></p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="content">内容</label>
                <textarea id="content" name="message" class="form-control col-xs-6" rows="3"></textarea>
                <p id="havecontent" style="color: red"></p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="myfile">添加附件</label>
                <input type="file" id="myfile" name="myfile" onchange="fileChange(this);">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <button type="submit" id="submit" disabled="disabled" class="btn btn-primary">提交</button>
            </div>
        </div>
    </div>
</form>

		<hr />
			<footer style="height: 40px;background:;bottom: 0px;text-align: center;padding-top: 15px">
				<span id="time"></span><span style="color:red;"><span class="glyphicon glyphicon-heart" ></span></span>乃文|<a href="__ROOT__/mail/mail">给我留言</a>
			</footer>
		</div>
	</div>	
</div>


<script type="text/javascript">
    var check = new Array();
    check['file'] = 1;
    $(document).ready(function(){
        $('#title').blur(function(){
            if ($('#title').val()=='') {
                check['title'] = 0;
                $('#submit').attr("disabled","disabled");
                if ($('#havetitle').text() == '') {
                    $('#havetitle').text('*请输入标题！');                  
                }
            }else{
                check['title'] = 1;
                $('#havetitle').empty();
            }
            if(check['title'] == 1 && check['content'] == 1 && check['file'] == 1){
                $('#submit').removeAttr("disabled"); 
            }
        });

        $('#content').blur(function(){
            if ($('#content').val() == '') {
                check['content'] = 0;
                $('#submit').attr("disabled","disabled");
                if ($('#havecontent').text() =='') {
                    $('#havecontent').text('*请输入内容！');                  
                }
            }else{
                check['content'] = 1;
                $('#havecontent').empty();
            }
            if(check['title'] == 1 && check['content'] && check['file'] == 1){
                $('#submit').removeAttr("disabled"); 
            }
        });
    });

    var isIE = /msie/i.test(navigator.userAgent) && !window.opera;
    function fileChange(target){
        var fileSize = 0;
        if (isIE && !target.files) {    // IE浏览器
            var filePath = target.value; // 获得上传文件的绝对路径
            var fileSystem = new ActiveXObject("Scripting.FileSystemObject");
            // GetFile(path) 方法从磁盘获取一个文件并返回。
            var file = fileSystem.GetFile(filePath);
            fileSize = file.Size;    // 文件大小，单位：b
        }
        else {    // 非IE浏览器
            fileSize = target.files[0].size;
        }
        var size = fileSize / 1024 / 1024;
        if (size > 1) {
            alert("附件不能大于1M");
            check['file'] = 0;
            $('#submit').attr("disabled","disabled"); 
        }else{
            check['file'] = 1;
            if(check['title'] == 1 && check['content']==1 && check['file'] == 1){
                $('#submit').removeAttr("disabled"); 
            }
            //$('#submit').removeAttr("disabled"); 
        }
    }
</script>

</body>
</html>