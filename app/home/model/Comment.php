<?php
namespace app\home\model;

use think\Model;

class Comment extends Model
{
	protected $insert = ['create_time'];
  protected function setCreateTimeAttr()
    {
        return request()->time();
    }
}