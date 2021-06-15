<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/19
 * Time: 9:59
 */

namespace app\room\controller;


trait  JsonTrait
{
    public static function JsonData($code, $msg, $data = [])
    {
        return json([
            'code' => $code,//
            'msg' => $msg,
            'data' => $data //{ }
        ]);
    }


    public static function TableData($code,$msg,$count,$data)
    {
        $code = 0;
        return json([
            'code' => $code,
            'msg' => $msg,
            'count' => $count,
            'data' => $data
        ]);
    }

}