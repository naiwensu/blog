<?php
namespace app\home\controller;

use fenye\Page;
use think\Controller;
use app\home\model\BlogUser;

class User extends Base{
	//我的信息
	public function mymessage()
	{
		if (session('id') == null) {
			return $this->fetch('user/nousermessage');
		}
		$id=session('id');
		$user=db('blog_user')->where('id',$id)->find();
		//var_dump($user);exit;
		$this->assign('user',$user);
		return $this->fetch();
	}

	//详细信息
	public function mymessages()
	{
		$id=session('id');
		//$user=db('blog_user')->where('id',$id)->find();
		$user = BlogUser::get($id);
		//$user = get_object_vars (  $user );
		//var_dump($user);
		$this->assign('user',$user);
		return $this->fetch();
	}

	//我的留言
	public function mycomment()
	{
		$res=db('blog_user')->alias('b')->where('b.id',session('id'))->join('comment c','b.id=c.uid')->join('article a','c.aid=a.id')->field('b.username,b.headimage,a.title,a.content,a.create_time,a.cnum,a.rnum,c.id as c_id,c.content as c_content,c.create_time as c_create_time')->order('c_create_time desc')->select();
		//var_dump($res);
		$rows = 4;//每页显示数据量
		$page = new Page(count($res), $rows);
		$limit = $page->limit();
		$offset = $limit[0];
		$res=array_slice($res,$offset,$rows);
		$this->assign('fenye',$page->links());
		$this->assign('comment',$res);
		return $this->fetch();
	}

	//收藏、取消收藏
	public function collect()
	{
		$status=input('get.status');
		$aid=input('get.aid');
		if ($status=='收藏') {
			db('article')->where('id', $aid)->setInc('cnum');
			$id=session('id');
			$user=db('blog_user')->where('id',$id)->field('collection')->find();
			$user['collection'].=(','.$aid);
			$res=db('blog_user')->where('id',$id)->setField('collection',ltrim($user['collection'],','));
			if ($res) {
				echo '1';
			}
		}else{
			$id=session('id');
			db('article')->where('id', $aid)->setDec('cnum');
			$user=db('blog_user')->where('id',$id)->field('collection')->find();
			$user['collection']=str_replace(','.$aid,'',',',$user['collection']);
			$res=db('blog_user')->where('id',$id)->setField('collection',ltrim($user['collection'],','));
			if ($res) {
				echo '0';
			}
		}
	}

	//我的收藏
	public function mycollection()
	{
		$id=input('get.id');
		$res=db('blog_user')->where('id',$id)->field('collection')->find();
			$data=explode(',',$res['collection']);
			$arr=array();
			foreach($data as $key=>$value){
				$arr[$key]=db('article')->where('id',$value)->find();
			}
			$rows = 4;//每页显示数据量
			$page = new Page(count($arr), $rows);
			$limit = $page->limit();
			$offset = $limit[0];
			$arr=array_slice($arr,$offset,$rows);
			$this->assign('collection',$arr);
			$this->assign('fenye',$page->links());
			//var_dump($arr);
			return $this->fetch();
	}

	//账号管理，用户信息设置
	public function setting()
	{
		$arr=db('blog_user')->where('id',session('id'))->field('headimage')->find();
		if ($arr) {
			$headimage='__ROOT__/static/headimage/'.$arr['headimage'];
		}else{
			$headimage='__ROOT__/static/default/0.jpg';
		}
		//var_dump($headimage);
		$this->assign('headimage',$headimage);
		return $this->fetch();
	}

	//修改用户头像
	public function changeheadimage()
	{
		header("Content-type: text/html; charset=utf-8");
		$maxsize=1024*1024;//字节
		$allowedtype = array('gif','png','jpg','jpeg');
		//$file = request()->file('headimage');
		if($_FILES["headimage"]["error"]>0 && $_FILES["headimage"]["error"]!=4){
			switch ($_FILES["headimage"]["error"]) {
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
				if($_FILES["headimage"]["error"]==4){
					$filename=0;
					return $this->error('没有图片上传！');
				}else{
					if ($_FILES["headimage"]["size"]>$maxsize) {
						$size=($size/1024);
						die("超过允许的<b>{$size}kb</b>大小");
					}
					$arr=explode('.', $_FILES["headimage"]["name"]);
					$hz=$arr[count($arr)-1];
					if(!(in_array($hz, $allowedtype))){
						die("上传文件后缀<b>{$hz}</b>不被允许");
					}
					$filename=$time.'.'.$hz;
					$res=move_uploaded_file($_FILES["headimage"]["tmp_name"], ROOT_PATH.'public/static/headimage/'.$filename);
					if (!$res) {
						return $this->error('文件上传失败！');
					}
				}
			}
			$data=[				
				'headimage'=>$filename,
				'update_time'=>$time
			];
			//删除原头像
			$arr=db('blog_user')->where('id',session('id'))->field('headimage')->find();
			$oldheadimage=$arr['headimage'];
			if($oldheadimage){
				$fullpath=ROOT_PATH.'public/static/headimage/'.$oldheadimage;
				unlink($fullpath);
			}			
			$res=db('blog_user')->where('id',session('id'))->update($data);
			if ($res) {
				return $this->success('修改头像成功！');
			}
	}
	//修改用户信息
	public function changeusermessage()
	{
		return $this->success('修改用户信息成功！');
	}
}