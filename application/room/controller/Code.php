<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/7/5
 * Time: 16:04
 */

namespace app\room\controller;
use app\room\model\Code as CodeModel;
use app\room\model\Types as TypesModel;
class Code extends Base
{
    public function index()
    {
        return $this->fetch('index');
    }
    public function codeform()
    {
        $getTypes = TypesModel::getTypes();
        $this->assign('types',$getTypes);
        return $this->fetch('codeform');
    }
    public  function getCodeList(){
        $page = $_GET['page']?$_GET['page']:1;
        $limit = $_GET['limit']?$_GET['limit']:10;
        return CodeModel::getCodeList($page,$limit);
    }

    public function addCode()
    {
        $post = request()->instance()->post();
        return CodeModel::addCode($post);
    }
   
    public function delCode()
    {
        $post = request()->instance()->post();
        return CodeModel::delCode($post);
    }

}