<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\phpStudy\WWW\blog\public/../app/admin\view\tools\ueditor.html";i:1501409739;}*/ ?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>ueditor demo</title>
</head>

<body>
    <form action="<?php echo url('tools/ueditor'); ?>" method="post">
        <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain">
          
        </script>
        <input type="submit" value="提交">
    </form>
    <!-- 配置文件 -->
    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="__ROOT__/static/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>
</body>

</html>