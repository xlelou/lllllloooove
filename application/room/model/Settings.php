<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/19
 * Time: 13:53
 */

namespace app\room\model;
use app\room\controller\JsonTrait;

class Settings extends Base
{
    protected $table = 'pro_settings';

    public static function getSettings()
    {
        $settings = self::get(1);
        return $settings;
    }

    public static function saveSettings($data)
    {
        $systemName = $data['systemName'];
        $keywords = $data['keywords'];
        $describe = $data['describe'];
        $info = self::where('id',1)->find();
        if($info){
            $result = self::where('id',1)->update([
                'systemName' => $systemName,
                'keywords' => $keywords,
                'describe' =>$describe
            ]);
        }else{
            $result = self::create([
                'systemName' => $systemName,
                'keywords' => $keywords,
                'describe' =>$describe,
                'id' => 1
            ]);
        }

        if($result!==false){
            return JsonTrait::JsonData(200,'保存成功');
        }else{
            return JsonTrait::JsonData(401,'保存失败');
        }
    }
}