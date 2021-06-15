<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/7/5
 * Time: 14:46
 */

namespace app\room\controller;
use app\room\controller\JsonTrait ;

class Upload extends Base
{
    public function uploads(){
        $filesList = array();
        $files = request()->file();
        foreach ($files as $file) {
            $info = $file->move(ROOT_PATH . 'public\uploads');
            $nowUrl = $info->getSaveName();
            if ($info) {
                array_push($filesList, $nowUrl);
            } else {
                return JsonTrait::JsonData(401,'上传失败');
            }
        }
        return JsonTrait::JsonData(200,'上传成功',$filesList);
    }
}