<?php
namespace app\admin\controller;

use think\Db;
use fenye\Page;

class Group extends Base
{
	//修改用户所属组
	public function changeusergroup()
	{
		$groups=db('group')->select();
		$id=input('post.id');
		$gid=input('post.gid');
		$res=db('user')->where('id',$id)->update(['gid' => $gid]);
		//session('gid',$gid);
		//扩展分页类查询
		$res=Db::name('user')->select();
		$rows=10;
		$page = new Page(count($res), $rows);
		$limit=$page->limit();
		$list = Db::table('user')->alias('u')->join('group g','u.gid=g.id')->field('u.id,u.username,u.password,u.gid,g.groupname,g.description')->where('g.id','>',1)->limit($limit[0],$limit[1])->select();
		//return $this->display(var_dump($list));
		$this->assign('groups',$groups);
		$this->assign('fenye',$page->links());
		$this->assign('allusers',$list);
		return $this->fetch('group/getallgroupusers');
	}

	//获取所有用户(除超级管理员外)
	public function getallgroupusers()
	{
		$groups=db('group')->select();
		//扩展分页类查询
		$res=Db::name('user')->select();
		$rows=10;
		$page = new Page(count($res), $rows);
		$limit=$page->limit();
		$list = Db::table('user')->alias('u')->join('group g','u.gid=g.id')->field('u.id,u.username,u.password,u.gid,g.groupname,g.description')->where('g.id','>',1)->limit($limit[0],$limit[1])->select();
		//return $this->display(var_dump($list));
		$this->assign('groups',$groups);
		$this->assign('fenye',$page->links());
		$this->assign('allusers',$list);
		return $this->fetch();

/*
		$data=Db::name('user')->paginate(2);
		//return $this->display(var_dump($data));
		$this->assign('allusers',$data);
		return $this->fetch();
*/
	}

	//获取所有用户组
	public function groupauthorization()
	{
		$data=db('group')->select();
		//return $this->display(var_dump($res));
		$this->assign('groups',$data);
		return $this->fetch();
	}

	//进入修改用户组名、描述界面
	public function updateauthorization()
	{
		$id=input('get.id');
		$data=db('group')->where('id',$id)->find();
		$this->assign('group',$data);
		return $this->fetch();
	}
	//更新用户组名、描述
	public function doupdateauthorization()
	{
		$id=input('post.id');
		$groupname=input('post.groupname');
		$description=input('post.description');
		if (!empty($groupname) && !empty($description)) {
			db('user_role_priv')->where('gid',$id)->update(['groupname'=>$groupname]);
			$res=db('group')->where('id',$id)->update(['groupname'=>$groupname,'description'=>$description]);

		}else{
			return $this->error('组名或租描述不能为空');
		}

		if (!$res) {
			return $this->error('更新失败');
		}
		
		$data=db('group')->select();
		//return $this->display(var_dump($res));
		$this->assign('groups',$data);
		return $this->fetch('group/groupauthorization');
	}

	//修改超级用户组名、信息
	public function updatesuperauthorization()
	{
		$id=input('get.id');
		$this->assign('id',$id);
		return $this->fetch();	
	}
	public function doupdatesuperauthorization()
	{
		$id=input('post.id');
		$groupname=input('post.groupname');
		$description=input('post.description');
		if (!empty($groupname) && !empty($description)) {
			$oldgroupname=db('group')->where('id',$id)->value('groupname');
			$res=db('group')->where('id',$id)->update(['groupname'=>$groupname,'description'=>$description]);
			$result=db('user_role_priv')->where('groupname',$oldgroupname)->update(['groupname'=>$groupname]);
		}else{
			return $this->error('组名或组描述不能为空');
		}

		if (!$res) {
			return $this->error('更新失败');
		}
		
		$data=db('group')->select();
		//return $this->display(var_dump($res));
		$this->assign('groups',$data);
		return $this->fetch('group/groupauthorization');
	}

	//权限分配
	public function authorization()
	{
		$gid=input('get.gid');
		$groupname=input('get.groupname');
		$res=$this->all($groupname);
		//return $this->display(var_dump($res));
	/*	$data="";
		//return $this->display(var_dump($res));
		for ($i=0; $i <count($res) ; $i++) { 
			$data=$data."<tr><td><a href=''>".$res[$i]."</a></td><td><input type='checkbox' name='pid[]' value='1'  checked /></td></tr>";
		}
		$data="<table><tr><th>menu</th><th>quanxian</th></tr>".$data."</table>";
		
	*/
		$this->assign('gid',$gid);
		$this->assign('groupname',$groupname);
		$this->assign('aut',$res);

		return $this->fetch();
	}

	//递归查询
	public function all(&$groupname="",$id=0,&$module_data=array(), $spac=0)
	{
		$spac=$spac+4;
		$data=db('module_menu')->alias('m')->join('user_role_priv u',['m.controller=u.controller','m.method=u.method'])->where('u.groupname',$groupname)->where('m.parent_id',$id)->field('u.groupname,u.statue,m.controller,m.method,m.menu_name,m.id,m.module')->select();
		if($data){
			foreach ($data as $key => $value) {
				$value["menu_name"]=str_repeat("&nbsp;",$spac)."|--".$value['menu_name'];
				//查询当前组权限
				//$value['groupname']=$groupname;
				$module_data[]=$value;
				$id=$value['id'];
				$this->all($groupname,$id,$module_data,$spac);
			}
		}
		return $module_data;		
	}

	//修改组权限
	public function updaterole()
	{	
		$data=input('param.');
		//return $this->display(var_dump($data));
		foreach ($data as $key => $value) {		
				foreach ($value as $key => $value) {
					$res=db('user_role_priv')->where(['groupname'=>$value['groupname'],'module'=>$value['module'],'controller'=>$value['controller'],'method'=>$value['method']])->find();
					if (!$res) {
						db('user_role_priv')->insert($value);
					}else{
						$res=db('user_role_priv')->where(['groupname'=>$value['groupname'],'module'=>$value['module'],'controller'=>$value['controller'],'method'=>$value['method']])->update(['statue'=>$value['statue'],'gid'=>$value['gid']]);				
					}
					
				}		
		}
		return $this->success('权限修改成功');
		//return $this->display(var_dump($data));
		//return $this->fetch();	
	}

	//添加组
	public function addgroup()
	{
		return $this->fetch();
	}

	public function check()
	{
		$groupname=input('groupname');
		$res=db('group')->where('groupname',$groupname)->find();
		if ($res) {
			echo "0";
		}else{
			echo "1";
		}
	}

	public function doaddgroup()
	{
		$data=input('param.');
		$num=Db('group')->where('groupname',$data['groupname'])->select();
		if (!$num) {
		Db::transaction(function(){
			$data=input('param.');
			Db::table('group')->insert($data);
			$gid = Db::name('user')->getLastInsID();
			//添加权限（statue=0）
			$res=Db::name('module_menu')->select();
			foreach ($res as $key => $value) {
				$list['groupname']=$data['groupname'];
				$list['controller']=$value['controller'];
				$list['method']=$value['method'];
				$list['module']=$value['module'];
				$list['statue']=0;
				$list['gid']=$gid;
				Db::name('user_role_priv')->insert($list);
			}
		});
		return $this->success('添加组成功！');			
		}else{
			return $this->error('组名已存在');
		}
		//return $this->display(var_dump($data));

/*		Db::startTrans();
		try{
			Db::name('group')->insert($data);
			//添加权限（statue=0）
			$res=Db::name('module_menu')->select();
			foreach ($res as $key => $value) {
				$list['groupname']=$data['groupname'];
				$list['controller']=$value['controller'];
				$list['method']=$value['method'];
				$list['module']=$value['module'];
				$list['statue']=0;
				Db::name('user_role_priv')->insert($list);
			}
		    // 提交事务
		    Db::commit();    
		} catch (\Exception $e) {
		    // 回滚事务
		    Db::rollback();
		}
		*/	
	}

	//删除组
	public function deletegroup()
	{
		$groupname=input('get.groupname');
		$res=db('group')->where('groupname',$groupname)->delete();
		$result=db('user_role_priv')->where('groupname',$groupname)->delete();
		if ($res) {
			return $this->success('删除组成功');
		}
	}
}