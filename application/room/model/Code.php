<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/5/6
 * Time: 17:03
 */

namespace app\room\model;
use app\room\controller\JsonTrait;
use app\room\model\RightAccess as RightAccessModel;

class Code extends Base
{
    protected $table = 'Pro_code';


    public static function getCodeList($page,$limit)
    {
        $result = self::page($page)->limit($limit)->order("order")->select();
        $count = count( self::select());
        if($result!==false){
            return JsonTrait::TableData(0,'获取成功',$count,$result);
        }else{
            return JsonTrait::JsonData(401,'保存失败');
        }
    }
}