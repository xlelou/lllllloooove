<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/5/6
 * Time: 17:15
 */

namespace app\room\controller;
use app\room\model\Role as roleModel;
use app\room\model\Right as RightModel;

class Role extends Base
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function roleForm()
    {
        $id = $_GET['id'];
        if($id===0){
            $rightlist = [];
        }else{
            $rightlist = roleModel::getRight($id);
        }

        $this->assign('rightlist',$rightlist);
        $rights = RightModel::select();
        $this->assign('rights',$rights);
        return $this->fetch('roleform');
    }

    public  function getRoleList()
    {
        $page = $_GET['page']?$_GET['page']:1;
        $limit = $_GET['limit']?$_GET['limit']:10;
        return roleModel::getRoleList($page,$limit);
    }

    public function addRole()
    {
        $post = request()->instance()->post();
        return roleModel::addRole($post);
    }

    public function delRole()
    {
        $post = request()->instance()->post();
        return roleModel::delRole($post);
    }

}