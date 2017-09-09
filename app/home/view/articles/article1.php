{extend name="index/common" /}
{block name="right"}		
	<div>
		<p style="color: ;text-align: left;font-size: 20px">标题：{$article.title}</p>
		<p style="color: ;text-align: left;font-size: 10px">标签：{$article.tag}</p>
		<p style="color: text-align: left;font-size: 15px">{$article.content}</p>
		<p id="aid" hidden="hidden">{$article.id}</p>
		<p>20{$article.create_time|date="y-m-d h:m:s",###}&nbsp;&nbsp;&nbsp; {$article.rnum}人阅读&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收藏&nbsp;&nbsp;&nbsp;举报</p>
		<hr>
		{if condition="session('username')==''"}
			<div id="checkLog">
			您还没有登录，请<a href="__ROOT__/Login/login" style="color:red ;font-size: 17px">【登录】</a>或<a href="__ROOT__/Login/register" style="color:red ;font-size: 17px">【注册】</a>
			</div>
			<hr>
		{else/}
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
		{/if}
		<p id="comment"><a href="#">查看评论({$article.cnum})</a></p>
		<div id="info"></div>
		<hr>
			<!--<div>
				{volist name="comment" id="vo"}
				<p style="color: ;text-align: left;font-size: 15px">评论人：{$vo.uid}</p>
				<p style="color: text-align: left;font-size: 15px">时间：{$vo.create_time}</p>
				<p style="color: ;text-align: left;font-size: 15px">内容：{$vo.content}</p>						
				{/volist}
			</div>-->
	</div>

{/block}
{block name="js"}
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
{/block}