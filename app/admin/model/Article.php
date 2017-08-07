<?php
namespace app\admin\model;

use think\Model;

class Article extends Model
{
  	protected $insert = ['create_time'];
  	protected $update = ['update_time'];

    protected function setCreateTimeAttr()
    {
          return request()->time();
    }

    protected function setUpdateTimeAttr()
    {
          return request()->time();
    }
}