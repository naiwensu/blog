<<<<<<< HEAD
<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\admin\model\User;
use app\admin\model\Article;

class Articles extends Base{
	//public $userid;
	public function user()
	{	
		//$this->adminn=input('post.');
		//return $this->display(var_dump(session('username')));
		$this->assign('username',session('username'));
		return $this->fetch('index/usermessage');
	}

	//修改用户密码，更新时间自动完成	
	public function usermessage()
	{	
		//$res=db('user')->where(['username'=>session('username')])->find();
		$this->assign('username',session('username'));
		return $this->fetch();
	}

	public function changeuser()
	{
		$data=array();
		$data['password']=md5(input('post.oldpassword'));
		$data['username']=session('username');
		$newpassword=md5(input('post.newpassword'));
		$confirmpassword=md5(input('post.confirmpassword'));
		$res=db('user')->where($data)->find();
		if (!$res) {
			return $this->error('原密码输入错误！');
		}
		if ($newpassword=="") {
			return $this->error('新密码不能为空！');
		}
		if ($newpassword==$confirmpassword) {
			$user=new User;
			//$user->password=$newpassword;
			$data=db('user')->where(['username'=>session('username')])->find();
			$res=$user->save(['password'=>$newpassword],['id' => $data['id']]);
			//$res=db('user')->where('username',session('username'))->update(['password' => $newpassword]);
				if (!$res) {
					return $this->error('修改密码失败！');
				}
				return $this->success('修改密码成功！','Index/usermessage');
		}
		return $this->error('新密码与确认密码不匹配，请重新输入！');
	}

	//发表(添加)文章
	public function publish()
	{
		$data=db('tags')->select();
		//return $this->display(var_dump($data));
		$this->assign('tags',$data);
		return $this->fetch();
	}

	public function add()
	{
		//$this->success('添加成功','Index/publish');
		$title=input('post.title');
		$content=input('post.content');
		$tag=input('post.tag');
		$author=session('username');
		$uid=session('id');

		$article=new Article;
		$article->data([
			'title'=>$title,
			'content'=>$content,
			'tag'=>$tag,
			'author'=>$author,
			'uid'=>$uid,
		]);
		$res=$article->save();
		//$res=db('article')->insert($data);
		//return $this->display(var_dump($res=db('article')->insert($data)));
		if ($res) {
			return $this->success('发表成功','Articles/publish');
		}
		return $this->error('发表失败');
	} 

	//编辑文章
	public function edit()
	{
		$data=$this->getArticle();
		$this->assign('article',$data);
		//return $this->display(var_dump($data));
		return $this->fetch('articles/edit');
	}

	//编辑页面
	public function doedit()
	{
		$tags=db('tags')->select();
		//return $this->display(var_dump($data));
		$data=Db::table('article')->where('id',input('get.id'))->find();
		//return $this->display(var_dump($data));
		$this->assign('tags',$tags);
		$this->assign('article',$data);
		return $this->fetch();
	}

	public function update()
	{
		$id=input('get.id');
		//return $this->display(var_dump($title));
		$newtitle=input('post.title');
		$newcontent=rtrim(input('post.content'));
		//return $this->display(var_dump($newcontent));
		$newtag=input('post.tag');
		$article=new Article;	
		$res=$article->save([
				'title'=>$newtitle,
				'content'=>$newcontent,
				'tag'=>$newtag,
			],['id'=>$id]);
		//$res=db('article')->where('id',$id)->update(['title' => $newtitle ,'content' => $newcontent]);
		if ($res) {
			$this->success('修改成功！','Articles/edit');
		}
				$this->error('修改失败');

	}

	//删除文章
	public function delete()
	{
		$id=input('get.id');
		$res=db('article')->where('id',$id)->delete();
		if ($res) {
			$this->success('删除成功！','Articles/edit');
		}
				$this->error('删除失败');

	}

	//获取某个用户发表的所有文章
	public function getuserarticle()
	{
		//扩展分页类
		$a=!empty(input('get.id'))?input('get.id'):session('userid');
		session('userid',$a);
		$list = Db::table('article')->where('uid',session('userid'))->select();
		//$arr = [...];//数据数组
		$rows = 2;//每页显示数据量
		$page = new Page(count($list), $rows);
		//return $this->display(var_dump($page->limit()));
		$limit=$page->limit();
		//return $this->display(var_dump($limit));
		//$nowpage=$page->getActivePage()
		//$list = Db::name('article')->where('uid',session('userid'))->select($limit['0'],$limit['1']);
		$list = Db::table('article')->where('uid',session('userid'))->limit($limit[0],2)->select();
		//return $this->display(var_dump($list));
		if(!$list){
					return $this->fetch("articles/nouserarticle");
		}
		$this->assign('fenye',$page->links());
		$this->assign('userarticle', $list);
		return $this->fetch();
		//简单分页（只有‘上一页’，‘下一页’）
		//$page->simpleLinks();
		
/*
		//自带分页类

		//分页URL无法传入参数，将参数存于session中
		$a=!empty(input('get.id'))?input('get.id'):session('userid');
		session('userid',$a);

		//$this->userid = !empty($this->userid)?$this->userid:input('get.id');
		// 查询状态为1的用户数据 并且每页显示10条数据
		$list = Db::name('article')->where('uid',session('userid'))->paginate(2);


		// 把分页数据赋值给模板变量list
		$this->assign('userarticle', $list);
		// 渲染模板输出
		return $this->fetch();
		
		//$userid=input('get.id');
		//$data=db('article')->where('uid',$userid)->select();
		//return $this->display(var_dump($data));
		//$this->assign('userarticle',$data);
		//return $this->fetch();
*/
	}

	//删除指定文章
	public function deletearticle()
	{

		$id=input('get.id');
		$res=db('article')->where('id',$id)->delete();
		if ($res) {
			return $this->success('删除成功');
		}
			return $this->error('删除失败');

	}

	//获取所有文章
	protected function getArticle()
	{
		return $article=db('article')->select();
	}

	//获取tag标签文章
	public function tagarticles()
	{
		$tag=input('get.tag');
		$data=db('article')->where('tag',$tag)->select();
		$this->assign('article',$data);
		return $this->fetch('tags/tagarticle');
	}

	public function deltagarticles()
	{
		$id=input('get.id');
		db('article')->where('id',$id)->delete();
		$tag=input('get.tag');
		$data=db('article')->where('tag',$tag)->select();
		$this->assign('article',$data);
		return $this->fetch('tags/tagarticle');
	}

=======
<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use fenye\Page;
use app\admin\model\User;
use app\admin\model\Article;

class Articles extends Base{
	//public $userid;
	public function user()
	{	
		//$this->adminn=input('post.');
		//return $this->display(var_dump(session('username')));
		$this->assign('username',session('username'));
		return $this->fetch('index/usermessage');
	}

	//修改用户密码，更新时间自动完成	
	public function usermessage()
	{	
		//$res=db('user')->where(['username'=>session('username')])->find();
		$this->assign('username',session('username'));
		return $this->fetch();
	}

	public function changeuser()
	{
		$data=array();
		$data['password']=md5(input('post.oldpassword'));
		$data['username']=session('username');
		$newpassword=md5(input('post.newpassword'));
		$confirmpassword=md5(input('post.confirmpassword'));
		$res=db('user')->where($data)->find();
		if (!$res) {
			return $this->error('原密码输入错误！');
		}
		if ($newpassword=="") {
			return $this->error('新密码不能为空！');
		}
		if ($newpassword==$confirmpassword) {
			$user=new User;
			//$user->password=$newpassword;
			$data=db('user')->where(['username'=>session('username')])->find();
			$res=$user->save(['password'=>$newpassword],['id' => $data['id']]);
			//$res=db('user')->where('username',session('username'))->update(['password' => $newpassword]);
				if (!$res) {
					return $this->error('修改密码失败！');
				}
				return $this->success('修改密码成功！','Index/usermessage');
		}
		return $this->error('新密码与确认密码不匹配，请重新输入！');
	}

	//发表(添加)文章
	public function publish()
	{
		$data=db('tags')->select();
		//return $this->display(var_dump($data));
		$this->assign('tags',$data);
		return $this->fetch();
	}

	public function add()
	{
		//$this->success('添加成功','Index/publish');
		$title=input('post.title');
		$content=input('post.content');
		$tag=input('post.tag');
		$author=session('username');
		$uid=session('id');

		$article=new Article;
		$article->data([
			'title'=>$title,
			'content'=>$content,
			'tag'=>$tag,
			'author'=>$author,
			'uid'=>$uid,
		]);
		$res=$article->save();
		//$res=db('article')->insert($data);
		//return $this->display(var_dump($res=db('article')->insert($data)));
		if ($res) {
			return $this->success('发表成功','Articles/publish');
		}
		return $this->error('发表失败');
	} 

	//编辑文章
	public function edit()
	{
		$data=$this->getArticle();
		$this->assign('article',$data);
		//return $this->display(var_dump($data));
		return $this->fetch('articles/edit');
	}

	//编辑页面
	public function doedit()
	{
		$tags=db('tags')->select();
		//return $this->display(var_dump($data));
		$data=Db::table('article')->where('id',input('get.id'))->find();
		//return $this->display(var_dump($data));
		$this->assign('tags',$tags);
		$this->assign('article',$data);
		return $this->fetch();
	}

	public function update()
	{
		$id=input('get.id');
		//return $this->display(var_dump($title));
		$newtitle=input('post.title');
		$newcontent=rtrim(input('post.content'));
		//return $this->display(var_dump($newcontent));
		$newtag=input('post.tag');
		$article=new Article;	
		$res=$article->save([
				'title'=>$newtitle,
				'content'=>$newcontent,
				'tag'=>$newtag,
			],['id'=>$id]);
		//$res=db('article')->where('id',$id)->update(['title' => $newtitle ,'content' => $newcontent]);
		if ($res) {
			$this->success('修改成功！','Articles/edit');
		}
				$this->error('修改失败');

	}

	//删除文章
	public function delete()
	{
		$id=input('get.id');
		$res=db('article')->where('id',$id)->delete();
		if ($res) {
			$this->success('删除成功！','Articles/edit');
		}
				$this->error('删除失败');

	}

	//获取某个用户发表的所有文章
	public function getuserarticle()
	{
		//扩展分页类
		$a=!empty(input('get.id'))?input('get.id'):session('userid');
		session('userid',$a);
		$list = Db::table('article')->where('uid',session('userid'))->select();
		//$arr = [...];//数据数组
		$rows = 2;//每页显示数据量
		$page = new Page(count($list), $rows);
		//return $this->display(var_dump($page->limit()));
		$limit=$page->limit();
		//return $this->display(var_dump($limit));
		//$nowpage=$page->getActivePage()
		//$list = Db::name('article')->where('uid',session('userid'))->select($limit['0'],$limit['1']);
		$list = Db::table('article')->where('uid',session('userid'))->limit($limit[0],2)->select();
		//return $this->display(var_dump($list));
		if(!$list){
					return $this->fetch("articles/nouserarticle");
		}
		$this->assign('fenye',$page->links());
		$this->assign('userarticle', $list);
		return $this->fetch();
		//简单分页（只有‘上一页’，‘下一页’）
		//$page->simpleLinks();
		
/*
		//自带分页类

		//分页URL无法传入参数，将参数存于session中
		$a=!empty(input('get.id'))?input('get.id'):session('userid');
		session('userid',$a);

		//$this->userid = !empty($this->userid)?$this->userid:input('get.id');
		// 查询状态为1的用户数据 并且每页显示10条数据
		$list = Db::name('article')->where('uid',session('userid'))->paginate(2);


		// 把分页数据赋值给模板变量list
		$this->assign('userarticle', $list);
		// 渲染模板输出
		return $this->fetch();
		
		//$userid=input('get.id');
		//$data=db('article')->where('uid',$userid)->select();
		//return $this->display(var_dump($data));
		//$this->assign('userarticle',$data);
		//return $this->fetch();
*/
	}

	//删除指定文章
	public function deletearticle()
	{

		$title=input('get.title');
		$res=db('article')->where('title',$title)->delete();
		if ($res) {
			return $this->success('删除成功');
		}
			return $this->error('删除失败');

	}

	//获取所有文章
	protected function getArticle()
	{
		return $article=db('article')->select();
	}

	//获取tag标签文章
	public function tagarticles()
	{
		$tag=input('get.tag');
		$data=db('article')->where('tag',$tag)->select();
		$this->assign('article',$data);
		return $this->fetch('tags/tagarticle');
	}

	public function deltagarticles()
	{
		$id=input('get.id');
		db('article')->where('id',$id)->delete();
		$tag=input('get.tag');
		$data=db('article')->where('tag',$tag)->select();
		$this->assign('article',$data);
		return $this->fetch('tags/tagarticle');
	}

>>>>>>> eb1c85eb6aec921952158591ccb8b7335130ffbe
}