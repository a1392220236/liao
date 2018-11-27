<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/27
 * Time: 11:11
 */

namespace app\admin\model;

use \think\Model;
class App extends Model
{
    public function admincate()
    {
        //关联角色表
        return $this->belongsTo('AdminCate');
    }

    public function article()
    {
        //关联文章表
        return $this->hasOne('Article');
    }

    public function log()
    {
        //关联日志表
        return $this->hasOne('AdminLog');
    }

    public function attachment()
    {
        //关联附件表
        return $this->hasOne('Attachment');
    }

}