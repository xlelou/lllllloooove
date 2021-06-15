<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/6/24
 * Time: 14:22
 */

namespace app\room\controller;

use app\room\model\Menu as MenuModel;

class Menu extends Base
{
    public function index(){
        return $this->fetch('index');
    }

    public function getMenu(){
        $page = $_GET['page']??1;
        $limit = $_GET['limit']??10;
        $lists = MenuModel::getController($page,$limit);
        return $lists;
    }

    public function menuform(){
        return $this->fetch('menuform');
    }

    public function addMenu(){
        $post = request()->instance()->post();
        return MenuModel::addController($post);
    }

    public  function  delMenu()
    {
        $post = request()->instance()->post();
        return MenuModel::delMenu($post);
    }
}