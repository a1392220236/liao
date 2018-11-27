<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/27
 * Time: 11:09
 */

namespace app\admin\controller;

use \think\Db;
use \think\Cookie;
use \think\Session;
use app\admin\model\App as appModel;//app模型
use app\admin\model\AdminMenu;
use app\admin\controller\Permissions;
class App extends Permissions
{
    public function index()
    {
        $model =new appModel();

        $post = $this->request->param();


        $info = empty($where) ? $model->order('创建时间 desc')->paginate(20) : $model->where($where)->order('创建时间 desc')->paginate(20,false,['query'=>$this->request->param()]);

        $this->assign('info',$info);
        //$info['cate'] = Db::name('admin_cate')->select();
      //  $this->assign('info',$info);
        return $this->fetch();


    }

}