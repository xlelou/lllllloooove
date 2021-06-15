<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/6/20
 * Time: 14:23
 */

namespace app\room\controller;

use app\room\model\Right as RightModel;
use app\room\model\Menu as MenuModel;
class Right extends Base
{
    public  function  index(){
        return $this->fetch();
    }

    public function rightform(){
        $menu = MenuModel::select();
        $this->assign('menu',$menu);
        return $this->fetch('rightform');
    }

    public function getAllRights(){
        $page = $_GET['page']?$_GET['page']:1;
        $limit = $_GET['limit']?$_GET['limit']:10;
        return RightModel::getAllRights($page,$limit);
    }

    public function addRight(){
        $post = request()->instance()->post();
        return RightModel::addRight($post);
    }

    public function delRight()
    {
        $post = request()->instance()->post();
        return RightModel::delRight($post);
    }
}