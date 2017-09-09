<?php
namespace app\home\controller;

use think\Controller;

/**
* 
*/
class About extends Controller
{
	
	public function about()
	{
		return $this->fetch();
	}
}