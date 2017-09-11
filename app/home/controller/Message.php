<?php
namespace app\home\controller;

use think\Controller;

/**
* 
*/
class message extends Controller
{	
	public function message()
	{
		return $this->fetch();
	}

	public function sendMessage()
	{
		header("Content-type: text/html; charset=utf-8"); 
		$size=1024*1024;
		$allowedtype = array('gif','png','jpg','zip' );
		$title = input('title');
		$message = input('message');
		if($_FILES["myfile"]["error"]>0 && $_FILES["myfile"]["error"]!=4){
			switch ($_FILES["myfile"]["error"]) {
				case 1:
					echo '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。';
					break;
				case 2:
					echo '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。';
					break;
				case 3:
					echo '文件只有部分被上传。';
					break;
				// case 4:
				// 	echo '没有文件被上传。';
				// 	break;				
				default:
					echo "未知错误。";
					break;
			}
		}else{
				$time=time();
				if($_FILES["myfile"]["error"]==4){
					$filename=0;
				}else{
					if ($_FILES["myfile"]["size"]>$size) {
						$size=($size/1024);
						die("超过允许的<b>{$size}kb</b>大小");
					}
					$arr=explode('.', $_FILES["myfile"]["name"]);
					$hz=$arr[count($arr)-1];
					if(!(in_array($hz, $allowedtype))){
						die("上传文件后缀<b>{$hz}</b>不被允许");
					}
					$filename=$time.'.'.$hz;
					$res=move_uploaded_file($_FILES["myfile"]["tmp_name"], ROOT_PATH.'public/static/uploads/'.$filename);
					if (!$res) {
						return $this->error('文件上传失败！');
					}
				}
			}
			$data=[
				'title'=>$title,
				'message'=>$message,
				'filename'=>$filename,
				'create_time'=>$time
			];
			$res=db('leave_message')->insert($data);
			if ($res) {
				return $this->success('留言成功！');
			}
	}
}