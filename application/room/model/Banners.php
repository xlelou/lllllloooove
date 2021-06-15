<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/7/5
 * Time: 16:04
 */

namespace app\room\model;
use app\room\controller\JsonTrait;


class Banners extends Base
{
    protected $table = 'banners';
    public static function addBanners($data){
        $path = $data['path'];
        $time =date('Y-m-d H:i:s');
        $id = (int)$data['id'];
        $sort = $data['sort'];
        $path =  str_replace('\\','/',$path);
        if($id !== 0){
            $result = self::where('id',$id)->update([
                'sort' => $sort,
                'editTime' =>$time
            ]);
            if($result){
                return JsonTrait::JsonData(200,'更新成功');
            }else{
                return JsonTrait::JsonData(401,'更新失败');
            }
        }else{
            $result = self::create([
                'picPath' => $path,
                'sort' => $sort,
                'addTime' =>$time
            ]);
            if($result){
                return JsonTrait::JsonData(200,'保存成功');
            }else{
                return JsonTrait::JsonData(401,'保存失败');
            }
        }
    }

    public static function getBanners(){
        $banners = self::order('sort')->select();
        $count = count($banners);
        return JsonTrait::TableData(0,'获取成功',$count,$banners);
    }

    public static function delBanners($data){
        $id = $data['id'];
        $info = self::where('id',$id)->delete();
        if($info!==false){
            return JsonTrait::JsonData(200,'删除成功');
        }else{
            return JsonTrait::JsonData(401,'删除失败');
        }
    }
}