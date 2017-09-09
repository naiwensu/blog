<?php
namespace app\home\model;

use think\Model;

class BlogUser extends Model 
{
    public function getSexAttr($value)
    {
        $sex = [0=>'女',1=>'男'];
        return $sex[$value];
    }
}