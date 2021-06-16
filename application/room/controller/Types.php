<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/7/5
 * Time: 16:04
 */

namespace app\room\controller;
use app\room\model\Types as TypesModel;
class Types extends Base
{
    public function index()
    {
        return $this->fetch('index');
    }
    public function typesform()
    {
        return $this->fetch('typesform');
    }
    public  function getTypeList(){
        $page = $_GET['page']?$_GET['page']:1;
        $limit = $_GET['limit']?$_GET['limit']:10;
        return TypesModel::getTypeList($page,$limit);
    }

    public function addType()
    {
        $post = request()->instance()->post();
        return TypesModel::addType($post);
    }

    public function delType()
    {
        $post = request()->instance()->post();
        return TypesModel::delType($post);
    }
}