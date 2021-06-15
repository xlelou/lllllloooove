<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/19
 * Time: 16:52
 */

namespace app\room\controller;
use app\room\model\User as UserModel;
use app\room\model\Role as RoleModel;

class User extends Base
{
    public  function  index(){
        return $this->fetch();
    }

    public  function userForm()
    {
        $id = $_GET['id'];
        if($id===0){
            $roleList = [];
        }else{
            $roleList = UserModel::getRole($id);
        }
        $role = RoleModel::select();
        $this->assign("role",$role);

        $this->assign('roleList',$roleList);
        return $this->fetch('userform');
    }

    public function userLists()
    {
        $page = $_GET['page']?$_GET['page']:1;
        $limit = $_GET['limit']?$_GET['limit']:10;
        return UserModel::getUserLists($page,$limit);
    }

    public  function addUser()
    {
        $post = request()->instance()->post();
        return UserModel::addUser($post);
    }

    public  function  delUser()
    {
        $post = request()->instance()->post();
        return UserModel::delUser($post);
    }
}